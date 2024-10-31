<?php
/**
 * The public-facing functionality of the plugin.
 * 
 * @link       https://optinable.com/
 * @since      1.0.0
 * 
 * @package    Optinable 
 * @subpackage /public 
*/

/**
 * The public-facing functionality of the plugin.
 * 
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 * 
 * @package    Optinable
 * @subpackage Optinable/public
 * @author     optinable <support@optinable.com>
*/ 

class Optinable_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	*/

	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	*/

	private $version;

	private $popups; // Define the $popups property explicitly
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	*/

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->popups = new Optinable_Popups($this->plugin_name, $this->version);
		add_shortcode('optinable', array($this->popups, 'embed_campaign_shortcode'));
	}

	function load_popups(){
		$this->popups->init();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	*/

	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Optinable_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Optinable_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		*/

		wp_enqueue_style( $this->plugin_name.'-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' );
		wp_enqueue_style( $this->plugin_name.'-stylesheet', plugin_dir_url( __DIR__ ) . 'assets/css/stylesheet.css' );
		wp_enqueue_style( $this->plugin_name.'-stylesheet-themes', plugin_dir_url( __DIR__ ) . 'assets/css/stylesheet-themes.css' );
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/optinable-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	*/

	public function enqueue_scripts() {

	    wp_enqueue_script('jquery');
	    
	    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/optinable-public.js', array( 'jquery' ), $this->version, true );
	    wp_enqueue_script( $this->plugin_name.'_remodal_min', plugin_dir_url( __DIR__ ) . 'assets/js/remodal.min.js');

	    $page_id = get_queried_object_id();
	    $optinable_disable_tracking = get_option( 'optinable_disable_tracking' );

	    wp_localize_script( $this->plugin_name, 'optinable_script_vars', array(
	        'ajax_url' => esc_url( admin_url( 'admin-ajax.php' ) ),
	        'optinable_disable_tracking' => $optinable_disable_tracking,
	        'optinable_page_id' => absint( $page_id ),
	    ) );
	}

	public function optinable_form_entry() {

		global $wpdb;
		
		if ( isset( $_REQUEST['id'] ) && ! empty( $_REQUEST['id'] ) ) {
			$id = sanitize_text_field( $_REQUEST['id'] );
		}
		if ( isset( $_REQUEST['email'] ) && ! empty( $_REQUEST['email'] ) ) {
			$email = sanitize_email( $_REQUEST['email'] );
		}

		if ( isset( $_REQUEST['name'] ) ) {
			$name = sanitize_text_field( $_REQUEST['name'] );
		}

		$campaign_type = '';

		if ( isset( $_REQUEST['campaign_type'] ) && ! empty( $_REQUEST['campaign_type'] ) ) {
			$campaign_type = sanitize_text_field( $_REQUEST['campaign_type'] );
		}

		if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( sanitize_text_field($_POST['nonce']), 'optinable_form_email_'.$id ) ) {
		}
		else{
			$result['message'] = "Error ".sanitize_text_field($_POST['nonce']);
			$result['type'] = "error";
			wp_send_json($result);
			die();
		}

		// active integrations
		$active_integrations = optinable_get_custom_table_meta("optinable_campaign_meta", $id, "active_integrations");

		if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') && !empty($active_integrations) ) {
			
			// active integrations
			$active_integrations = explode(",", $active_integrations);

			foreach($active_integrations as $row){

				if($row == "local_db_list")
				{
					$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries";
					$campaign = array(
					   'campaign_id'	=> $id,
					   'campaign_type' => $campaign_type,
					   'created'	=> gmdate('Y-m-d H:i:s'),
					); 
					
					$wpdb->insert( $table, $campaign );
					$entry_id = $wpdb->insert_id;

					$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries_meta";

					$campaign = array(
					   'entry_id'	=> $entry_id,
					   'meta_key' => 'email',
					   'meta_value' => $email,
					   'created'	=> gmdate('Y-m-d H:i:s'),
					);
					
					$wpdb->insert($table, $campaign);
					$entry_meta_id = $wpdb->insert_id;

					if($name)
					{
						$campaign = array(
						   'entry_id'	=> $entry_id,
						   'meta_key' => 'name',
						   'meta_value' => $name,
						   'created'	=> gmdate('Y-m-d H:i:s'),
						);

						$wpdb->insert($table, $campaign);
					}

					$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) : '';
					$ip = esc_attr( $ip );

					$campaign = array(
					   'entry_id'	=> $entry_id,
					   'meta_key' => 'ip_address',
					   'meta_value' => $ip,
					   'created'	=> gmdate('Y-m-d H:i:s'),
					);
					
					$wpdb->insert($table, $campaign);

					$page_id = isset($_POST['page_id']) ? intval($_POST['page_id']) : 0;

					$wpdb->insert(
						$wpdb->prefix . 'optinable_log',
						array(
							'campaign_id' => $id,
							'campaign_type' => $campaign_type,
							'page_id' => $page_id,
							'status' => 'conversion', //view conversion CTA
							'ip' => $ip,
							'counter' => 1,
							'created' => current_time('mysql'),
							'updated' => current_time('mysql'),
						)
					);
				}
			}

			$result['type'] = "success";
			wp_send_json($result);
		}
		else {
			$result['type'] = "error";
			wp_send_json($result);
		}

		die();
	}

	public function track_impression_callback($ajax = true, $campaign_id = 0, $page_id = 0) {

		global $wpdb;

		// Get the necessary data from the AJAX request
		$campaign_id = isset( $_POST['campaign_id'] ) ? sanitize_text_field( $_POST['campaign_id'] ) : intval($campaign_id);

		$page_id = isset( $_POST['page_id'] ) ? sanitize_text_field( $_POST['page_id'] ) : intval($page_id);
		$status = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : "view";

		$ip = sanitize_text_field( $_SERVER['REMOTE_ADDR'] );

		$current_date = gmdate('Y-m-d');
		$campaign_type = "";

		// Check if a record already exists for the current date, campaign, and page
		$existing_record = $wpdb->get_row($wpdb->prepare(
			"SELECT * FROM {$wpdb->prefix}optinable_log
			 WHERE campaign_id = %d AND page_id = %d AND DATE(created) = %s AND status = %s",
			$campaign_id, $page_id, $current_date, $status
		));

		if ($existing_record) {
			// Update the existing record
			$updated_counter = $existing_record->counter + 1;
			$wpdb->update(
			  $wpdb->prefix . 'optinable_log',
			  array(
			    'counter' => $updated_counter,
			    'updated' => current_time('mysql'),
			  ),
			  array('log_id' => $existing_record->log_id)
			);
		}
		else {
			// Insert a new record
			$wpdb->insert(
				$wpdb->prefix . 'optinable_log',
				array(
					'campaign_id' => $campaign_id,
					'campaign_type' => $campaign_type,
					'page_id' => $page_id,
					'status' => $status, //view conversion CTA
					'ip' => $ip,
					'counter' => 1,
					'created' => current_time('mysql'),
					'updated' => current_time('mysql'),
				)
			);
		}
		// Return a response if needed
	}
	
}
