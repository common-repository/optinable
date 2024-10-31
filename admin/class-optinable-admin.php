<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

ob_start(); // Start output buffering

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://optinable.com/
 * @since      1.0.0
 *
 * @package    Optinable
 * @subpackage Optinable
*/ 

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 * 
 * @package    Optinable 
 * @author     Optinable <support@optinable.com>
*/

class Optinable_Admin {

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
	private $hook;
	private $version;

	private $content_post;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since	1.0.0
	 * @param	string    $plugin_name	The name of this plugin.
	 * @param	string    $version	The version of this plugin.
	*/
	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function op_plugin_meta($plugin_meta, $plugin_file){

		if ( "optinable/optinable.php" === $plugin_file ) {

			$row_meta = array();

			$row_meta['support'] = '<a href="" target="_blank">Support</a>';

			$plugin_meta = array_merge( $plugin_meta, $row_meta );	
		}

		return $plugin_meta;
	}

	public function my_submenu_settings_page(){}

	public function add_menu_page() {
		
		 add_menu_page(
			'Optinable', 
			__( 'OptinAble', 'optinable' ),
			'manage_options',
			'optinable',
			array( $this, 'display_options_page' ),
			OPTINABLE_PLUGIN_PATH . 'assets/img/logo/optinable-20x20.png'
		);

		 add_submenu_page(
			'optinable',
			__( 'Dashboard', 'optinable' ),
			__( 'Dashboard', 'optinable' ),
			'manage_options',
			'optinable',
			''
		);

		add_submenu_page(
			'optinable',
			__( 'Popups', 'optinable' ),
			__( 'Popups', 'optinable' ),
			'manage_options',
			'optinable-campaign-list-lightbox',
			array( $this, 'optinable_list_campaigns' )
		);

		add_submenu_page(
			'optinable',
			__( 'Sticky-bars', 'optinable' ),
			__( 'Sticky-bars', 'optinable' ),
			'manage_options',
			'optinable-campaign-list-stickybar',
			array( $this, 'optinable_list_campaigns' )
		);

		add_submenu_page(
			'optinable',
			__( 'Slide-ins', 'optinable' ),
			__( 'Slide-ins', 'optinable' ),
			'manage_options',
			'optinable-campaign-list-slidein',
			array( $this, 'optinable_list_campaigns' )
		);

		add_submenu_page(
			'optinable',
			__( 'Embeds', 'optinable' ),
			__( 'Embeds', 'optinable' ),
			'manage_options',
			'optinable-campaign-list-embed',
			array( $this, 'optinable_list_campaigns' )
		);

		add_submenu_page(
			'optinable',
			__( 'Subscribers', 'optinable' ),
			__( 'Subscribers', 'optinable' ),
			'manage_options',
			'optinable-campaign-subscribers',
			array( $this, 'optinable_subscribers' )
		);

		add_submenu_page(
			'optinable',
			__( 'Settings', 'optinable' ),
			__( 'Settings', 'optinable' ),
			'manage_options',
			'optinable-settings',
			array( $this, 'optinable_settings' )
		);
	}

	public function template_external_link() {
	    // Redirect to the external link
	    wp_redirect('https://optinable.com/templates/');
	    exit;
	}

	public function optinable_subscribers(){

		global $wpdb;

		$subscribers_arr = '';

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries";
		$table_meta = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries_meta";

		$campaign_id = isset( $_REQUEST['campaign_id'] ) ? sanitize_text_field( $_REQUEST['campaign_id'] ) : 0;

		$empty = false;

		if($campaign_id != 0)
	    	$subscribers_arr = $this->render_subscribers_list($campaign_id);
	    else
	    	$empty = true;

	    $campaign_options = '';
		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";
		
		$campaign_options = '<option value="0"></option>';

		$campaigns = $wpdb->get_results(
					    $wpdb->prepare(
					        "SELECT c.campaign_name, c.campaign_id, c.campaign_type
					         FROM {$table} c
					         ORDER BY c.campaign_type DESC ;"
					    ),
					    ARRAY_A
					);

		foreach($campaigns as $row)
        {	
        	$checked = '';
        	$checked = (($campaign_id == $row['campaign_id']) ? 'selected' : '');

        	$campaign_options .= '<option value="' . $row['campaign_id']. '" data-type="' . $row['campaign_type']. '" ' . $checked . '>' .  '' . $row['campaign_type'] . ' - ' . $row['campaign_name'] . '</option>';
       	}

		include_once 'partials/optinable-admin-campaign-subscribers.php';
	}

	public function render_subscribers_list($campaign_id) {
	    
	    global $wpdb;

	    $table = $wpdb->prefix . 'optinable_entries';
	    $table_meta = $wpdb->prefix . 'optinable_entries_meta';

	    $per_page = OPTINABLE_NUMBER_OF_ROWS_PER_PAGE; // Number of subscribers per page
	    
	    $paged = isset( $_REQUEST['paged'] ) ? sanitize_text_field( $_REQUEST['paged'] ) : 1;

	    $offset = ($paged - 1) * $per_page; // Offset for pagination

	    $subscribers = $wpdb->get_results($wpdb->prepare("
		    SELECT
		        e.campaign_type,
		        e.campaign_id,
		        e.entry_id,
		        m1.meta_value AS email,
		        m2.meta_value AS ip,
		        m2.meta_id AS meta_id,
		        m2.created AS created
		    FROM
		        {$table} AS e
		    INNER JOIN
		        {$table_meta} AS m1 ON e.entry_id = m1.entry_id AND m1.meta_key = 'email'
		    INNER JOIN
		        {$table_meta} AS m2 ON e.entry_id = m2.entry_id AND m2.meta_key = 'ip_address'
		    WHERE e.campaign_id = %d
		    ORDER BY e.entry_id DESC
		    LIMIT %d OFFSET %d",
		    $campaign_id,
		    $per_page,
		    $offset
		), ARRAY_A);


	    $subscribers_arr = array();
		$subscribers_arr['empty'] = false;
		$subscribers_arr['table'] = $subscribers_arr['paging'] = '';

	    if (!empty($subscribers)) {
	    	
	        foreach ($subscribers as $row) {

	        	$datetime = date_i18n('d F Y - h:i A', strtotime($row['created']));
	            // Display subscriber information here
	            $subscribers_arr['table'] .='
					            	<div class="pure-g optinable-dashboard-table-row">
				                        <div class="pure-u-1-3">
				                            <div class="optinablecampaign-stats-row" align="left" style="width:50px">
				                                <span>'.$row["entry_id"].'</span>
				                            </div>

				                            <div class="optinablecampaign-stats-row" align="left">
				                                <span>' . (($row["ip"]) ? $row["ip"] : "N/A") . '</span>
				                            </div>
				                        </div>
				                        <div class="pure-u-1-3">
				                            <div class="optinablecampaign-stats-row" align="left">
				                                <span>
				                                   '.$row["email"].'
				                                </span>
				                            </div>
				                        </div>
				                        <div class="pure-u-1-3">
				                            <div class="optinablecampaign-stats-row" align="left">
				                                <span>
				                                    '.$datetime.'
				                                </span>
				                            </div>
				                        </div>
				                    </div>';

				$campaign_id = $row["campaign_id"];
	        }

	        // Pagination
	        $total_subscribers = $wpdb->get_var($wpdb->prepare("
			    SELECT COUNT(*) FROM {$table} AS e
			    INNER JOIN {$table_meta} AS m1 ON e.entry_id = m1.entry_id 
			    AND m1.meta_key = 'email'
			    INNER JOIN {$table_meta} AS m2 ON e.entry_id = m2.entry_id 
			    AND m2.meta_key = 'ip_address'
			    WHERE e.campaign_id = %d", $campaign_id)
			);
			
	        $total_pages = ceil($total_subscribers / $per_page);

	        if ($total_pages > 1) {

	            $subscribers_arr['paging'] .= '<div class="optinable_pagination">';

				$subscribers_arr['paging'] .= paginate_links(array(
															    'base' => add_query_arg('paged', '%#%', admin_url('admin.php?page=optinable-campaign-subscribers&campaign_id='.$campaign_id)),
															    'format' => '&paged=%#%',
															    'current' => $paged,
															    'total' => $total_pages,
															));
	            $subscribers_arr['paging'] .=  '</div>';
			}
	    } 
	    else {
	        // No subscribers found
	        $subscribers_arr['table'] .=  '<div class="op_norecord_div">No subscribers found.</div>';
	        $subscribers_arr['empty'] = true;
	    }

	    return $subscribers_arr;
	}

	public function optinable_export_email_list() {

		if (!current_user_can('manage_options')) {
			exit;
		}

	    global $wpdb;

		$campaign_id = isset( $_REQUEST['campaign_id'] ) ? sanitize_text_field( $_REQUEST['campaign_id'] ) : 0;

	    $table = $wpdb->prefix . 'optinable_entries';
	    $table_meta = $wpdb->prefix . 'optinable_entries_meta';

	    // Get the subscribers' data
	    $subscribers = $wpdb->get_results($wpdb->prepare("
		    SELECT e.entry_id, m1.meta_value AS email, m2.meta_value AS ip, m2.created AS date_time
		    FROM {$table} AS e
		    INNER JOIN {$table_meta} AS m1 ON e.entry_id = m1.entry_id AND m1.meta_key = 'email'
		    INNER JOIN {$table_meta} AS m2 ON e.entry_id = m2.entry_id AND m2.meta_key = 'ip_address'
		    WHERE e.campaign_id = %d
		", $campaign_id));

	    // Create the CSV file
	    $file = fopen('php://output', 'w');
	    fputcsv($file, ['meta_id', 'ip', 'email', 'date_time']); // Add header row

	    foreach ($subscribers as $subscriber) {
	        fputcsv($file, [
	            $subscriber->entry_id,
	            $subscriber->ip,
	            $subscriber->email,
	            $subscriber->date_time,
	        ]);
	    }

	    // Close the file
	    fclose($file);

	    $domain = parse_url(home_url(), PHP_URL_HOST);

	    // Set the appropriate headers for CSV download - optinable-localhost-subscribers-list-144444403982
	    header('Content-Type: text/csv');

	    header('Content-Disposition: attachment; filename="optinable-' . $domain . '-subscribers-list-' . time() . '.csv"');

	    header('Pragma: no-cache');
	    exit;
	}

	public function optinable_settings(){

		global $wpdb;

		$response = isset( $_GET['response'] ) ? sanitize_text_field( $_GET['response'] ) : '';

		if($response == 'reset'){
			$success_message = 'The plugin was successfully reset.';
		}
		else if($response == 'saved'){
			$success_message = 'The settings are successfully updated.';
		}
		else if($response == 'error'){
			$error_message = 'Something went wrong, please try again.';
		}

		$optinable_remove_data_uninstall  = get_option( "optinable_remove_data_uninstall" );
		$optinable_remove_data_uninstall = ($optinable_remove_data_uninstall ? "checked" : "");
		$optinable_data_sharing  = get_option( "optinable_data_sharing" );
		$optinable_data_sharing = ($optinable_data_sharing ? "checked" : "");

		$optinable_disable_tracking  = get_option( "optinable_disable_tracking" );
		$optinable_disable_tracking = ($optinable_disable_tracking ? "checked" : "");

	    include_once 'partials/optinable_settings.php';
	}

	public function optinable_list_campaigns(){

		//if ( ! current_user_can( 'manage_options' ) ) return;
		global $wpdb;

		$mod = $opz_plugin_menu_sldn = $opz_plugin_menu_stb = $opz_plugin_menu_db = $opz_plugin_menu_embd = $opz_hide_property_bar = $opz_plugin_menu_pp = $opInput = false;

		$opz_property_bar_initial = $response = ''; $archived = 0; $active = 1;

		$init_heading =  "All";

		$page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';
		$action = isset( $_GET['action'] ) ? sanitize_text_field( $_GET['action'] ) : '';
		$campaign_type = isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : '';
		$response = isset( $_GET['response'] ) ? sanitize_text_field( $_GET['response'] ) : '';

		$all = 'ALL';

		if ( isset( $_GET['mod'] ) && ! empty( $_GET['mod'] ) ) {

			$mod = sanitize_text_field( $_GET['mod'] );
			$all = '';
			$archived = ($mod == 'archived') ? 1 : 0;
			$active = ($mod == 'live') ? 1 : 0;

			$init_heading = ($mod == 'archived') ? "Archived" : (($mod == 'unpublished') ? "UnPublished" : "Live") ;
		}

		if($response == 'archived'){
			$success_message = 'The '.$campaign_type.' campaign is successfully archived. <a href="'.esc_url(get_site_url().'/wp-admin/admin.php?page=optinable-campaign-list-'.$campaign_type.'&mod=archived').'">View Archive List</a>';
		}
		else if($response == 'unarchived'){
			$success_message = 'The '.$campaign_type.' campaign is successfully removed from Archived list to <a href="'.esc_url(get_site_url().'/wp-admin/admin.php?page=optinable-campaign-list-'.$campaign_type.'&mod=unpublished').'">UnPublished</a>.';
		}
		else if($response == 'published')
				$success_message = 'The '.$campaign_type.' campaign is successfully published.';
		else if($response == 'unpublished')
			$success_message = 'The '.$campaign_type.' campaign is marked as unpublished.';
		else if($response == 'reset')
				$success_message = "The ".$campaign_type." campaign's analytics data is reset.";
		else if($response == 'removed-subscribers')
				$success_message = "The subscribers are removed for the campaign.";
		else if($response == 'deleted')
				$success_message = "The campaign is removed successfully.";

		//optinable-campaign-list-slidein&response=deleted&type=slidein

		if($page == 'optinable-campaign-list-lightbox')
		{
			$campaign_type = 'lightbox';
			$subview = 'Lightbox';
			$opz_plugin_menu_pp = 'active';
			//echo $active;
			$campaign_lightbox = $this->optinable_campaigns_fetch($all, $campaign_type, $archived, $active);
		}
		else if($page == 'optinable-campaign-list-stickybar')
		{
			$campaign_type = 'stickybar';
			$subview = 'Stickybar';
			$opz_plugin_menu_stb = 'active';

			$campaign_stickybar = $this->optinable_campaigns_fetch($all, $campaign_type, $archived, $active);
		}
		else if($page == 'optinable-campaign-list-slidein')
		{
			$campaign_type = 'slidein';
			$subview = 'Slidein';
			$opz_plugin_menu_sldn = 'active';

			$campaign_slidein = $this->optinable_campaigns_fetch($all, $campaign_type, $archived, $active);
		}
		else if($page == 'optinable-campaign-list-embed')
		{
			$campaign_type = 'embed';
			$subview = 'Embed';
			$opz_plugin_menu_embd = 'active';

			$campaign_embed = $this->optinable_campaigns_fetch($all, $campaign_type, $archived, $active);
		}

		include_once 'partials/optinable-admin-campaign-list.php';
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	*/
	
	public function display_options_page() {
		
		global $wpdb;

		$mod = $opz_show_wizard = $opz_plugin_menu_cm = $opz_plugin_menu_db = $step = $opz_hide_property_bar = $opz_plugin_menu_pp = $opInput = false;
		$opz_property_bar_initial = $response = ''; $init_heading =  "All";
		
		if ( isset( $_GET['mod'] ) && ! empty( $_GET['mod'] ) ) {
			$mod = sanitize_text_field( $_GET['mod'] );
		}

		if ( isset( $_GET['response'] ) && ! empty( $_GET['response'] ) ) {
			$response = sanitize_text_field( $_GET['response'] );
		}
		
		$opz_plugin_menu_cls = empty( $mod ) ? 'optinable-dashboard' : 'optinable-'.$mod;
		$PrefixV = "optinable-admin";

		$opz_show_wizard = $opz_create_campaign = false;
		$success_message = $action = $campaign_type = '';

		if ( isset( $_GET['_pid'] ) && ! empty( $_GET['_pid'] ) ) {
			$campaign_id = sanitize_text_field( $_GET['_pid'] );
		}
		
		if ( isset( $_GET['type'] ) && ! empty( $_GET['type'] ) ) {
			$campaign_type = sanitize_text_field( $_GET['type'] );
		}

		$location = admin_url( 'admin.php?page=optinable-campaign-list-'.$campaign_type );

		if($mod == "")
		{
			$page = $PrefixV.'-dashboard';
			$opz_plugin_menu_db = 'active';

			if ( isset( $_GET['action'] ) && ! empty( $_GET['action'] ) ) {
				$action = sanitize_text_field( $_GET['action'] );
			}

			if($response == 'archived'){

				$success_message = 'The '.$campaign_type.' campaign is successfully archived. <a href="'.esc_url(get_site_url().'/wp-admin/admin.php?page=optinable-campaign-list-'.$campaign_type.'&mod=archived').'">View Archive List</a>';
			}
			else if($response == 'unarchived')
			{
				$urlsuc = get_site_url().'/wp-admin/admin.php?page=optinable-campaign-list-'.$campaign_type.'&mod=unpublished';

				$success_message = 'The '.$campaign_type.' campaign is successfully removed from Archived list to <a href="'.esc_url($urlsuc).'">UnPublished</a>.';
			}
			else if($response == 'published')
				$success_message = 'The '.$campaign_type.' campaign is successfully published.';
			else if($response == 'unpublished')
				$success_message = 'The '.$campaign_type.' campaign is marked as unpublished.';
			else if($response == 'reset')
				$success_message = "The ".$campaign_type." campaign's analytics data is reset.";
			else if($response == 'removed-subscribers')
				$success_message = "The subscribers are removed for the campaign.";
			else if($response == 'deleted')
				$success_message = "The ".$campaign_type." campaign is removed successfully.";

			$campaign_lightbox = $this->optinable_campaigns_fetch("ALL", "lightbox", 0, 0, true);
			$campaign_stickybar = $this->optinable_campaigns_fetch("ALL", "stickybar", 0, 0, true);
			$campaign_slidein = $this->optinable_campaigns_fetch("ALL", "slidein", 0, 0, true);
			$campaign_embed = $this->optinable_campaigns_fetch("ALL", "embed", 0, 0, true);
			// print_r($campaign_slidein);

			$optinable_pingdom = get_option('optinable_pingdom');
		    $pingstatcall = 0;
		    if (!$optinable_pingdom) {
				update_option('optinable_pingdom', 1);
				$pingstatcall = 1;
			}
		}
		else if($mod == "campaign-manager")
		{
			$page = $PrefixV.'-manage-campaign';
			$opz_plugin_menu_cm = 'active';
		}
		else if($mod == "edit-campaign")
		{
			$page = $PrefixV.'-edit-campaign';
			$opz_show_wizard = true;
			$opz_plugin_menu_cm = 'active';

			if ( isset( $_GET['_pid'] ) && ! empty( $_GET['_pid'] ) ) {
				$postID = sanitize_text_field( $_GET['_pid'] );
			}

			$campType = '';
			if ( isset( $_GET['step'] ) && ! empty( $_GET['step'] ) ) {
				$step = sanitize_text_field( $_GET['step'] );
			}
			
			$popups = new Optinable_Popups( $this->plugin_name, $this->version );

			$campaign = $this->optinable_saved_template($postID);
			//print_r($campaign);
			$template = $campaign[0]["campaign_content"];

			if($template){
				$template = str_replace("{{campaign_id}}", $campaign_id, $template );
				$plugin_url = plugins_url( );
				$template = str_replace("{{op_plugin_media_url}}", OPTINABLE_PLUGIN_PATH."assets/img", $template );
			}
			
			$temp_select = ($template) ? 0:1;
			$campName = $campaign[0]["campaign_name"];
			$campType = $campaign[0]["campaign_type"];
			$campStatus = $campaign[0]["active"];
			
			$campFonts = optinable_get_custom_table_meta("optinable_campaign_meta", $postID, "fonts");

			if ($campFonts) {
				$campFonts = maybe_unserialize($campFonts);
				if (is_array($campFonts)) {
					$campFonts = implode('|', $campFonts);
				} 
			}

			wp_localize_script('optinable-admin-custom', 'optinable_vars_fonts', array(
	            'campFonts' => $campFonts,
	        ));

			$fontawesome = $this->optinable_fontawesome_parse();
			
			$powerbyTag = $popups->powerbyTag();
			$template = $popups->replace_text_wps("{{powerby}}", $popups->powerbyTag(), $template);

			// load fonts
			$google_fonts = $this->optinable_googlefonts_select("heading");
			// load other optins
			$related_optins = $this->optinable_campaigns_select($postID);
			//print_r($related_optins);
			$OPZHash = wp_hash( $postID, OPTINABLE_HASH_STRING); 

			if(!$step) // or if its editing or selecting another template
				$opz_property_bar_initial = 'optinable-inital';
		}
		else if($mod == "archive-campaign")
		{
			if($campaign_id)
			{
				$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

				$wpdb->query( $wpdb->prepare(
							        "UPDATE {$table}
							        SET archived = 1, active = 0
							        WHERE campaign_id = %s",
							        $campaign_id
							    ));
			}
			
			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			if ( ! empty( $location ) ) {
			    ob_start();
			    wp_safe_redirect( add_query_arg( array(
			        'response' => 'archived',
			        'type' => $campaign_type,
			    ), $location ) );
			    ob_end_flush(); // End output buffering and send output to the browser
			}

			exit;
		}
		else if($mod == "unarchive-campaign")
		{
			if($campaign_id)
			{
				$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

				$wpdb->query( $wpdb->prepare("UPDATE {$table} 
								                SET archived = 0
											    WHERE campaign_id = %s", $campaign_id)
										    );
			}
			
			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			if ( ! empty( $location ) ) {
			    ob_start();
			    wp_safe_redirect( add_query_arg( array(
			        'response' => 'unarchived',
			        'type' => $campaign_type,
			    ), $location ) );
			    ob_end_flush(); // End output buffering and send output to the browser
			}

			exit;
		}
		else if($mod == "publish-campaign")
		{
			if($campaign_id)
			{
				$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

				$wpdb->query( $wpdb->prepare("UPDATE {$table} 
								                SET archived = 0, active = 1
											    WHERE campaign_id = %s", $campaign_id)
										    );
			}
			
			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			if ( ! empty( $location ) ) {
			    ob_start();
			    wp_safe_redirect( add_query_arg( array(
			        'response' => 'published',
			        'type' => $campaign_type,
			    ), $location ) );
			    ob_end_flush(); // End output buffering and send output to the browser
			}

			exit;
		}
		else if($mod == "unpublish-campaign")
		{
			if($campaign_id)
			{
				$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

				$wpdb->query( $wpdb->prepare("UPDATE {$table} 
								                SET archived = 0, active = 0
											    WHERE campaign_id = %s", $campaign_id)
										    );
			}
			
			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			if ( ! empty( $location ) ) {
			    ob_start();
			    wp_safe_redirect( add_query_arg( array(
			        'response' => 'unpublished',
			        'type' => $campaign_type,
			    ), $location ) );
			    ob_end_flush(); // End output buffering and send output to the browser
			}

			exit;
		}
		else if($mod == "reset-log")
		{
			if($campaign_id)
			{
				$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_log";

				$result = $wpdb->delete(
									    $table,
									    array(
									        'campaign_id' => $campaign_id
									    )
									);
			}
			
			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			if ( ! empty( $location ) ) {
			    ob_start();
			    wp_safe_redirect( add_query_arg( array(
			        'response' => 'reset',
			        'type' => $campaign_type,
			    ), $location) );
			    ob_end_flush(); // End output buffering and send output to the browser
			}
			exit;
		}
		else if($mod == "purge-subscribers")
		{
			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			if ( ! empty( $location ) ) {
			    ob_start();
			    wp_safe_redirect( add_query_arg( array(
			        'response' => 'removed-subscribers',
			        'type' => $campaign_type,
			    ), $location ) );
			    ob_end_flush(); // End output buffering and send output to the browser
			}

			exit;
		}
		
		include_once 'partials/'.$page.'.php';
	}
	
	public function optinable_campaigns_fetch( $get = 'ALL', $type = 'lightbox', $archived = 0, $active = 1, $dashboard = false){

		global $wpdb;

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";
		$table_log = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_log";

		$active_qry = 'AND c.active = '.$active;

		if($dashboard || $get == 'ALL')
			$active_qry = 'AND (c.active = 1 OR c.active = 0)';
		
		$campaign = $wpdb->get_results(
				    $wpdb->prepare(
				        "SELECT c.campaign_name, c.campaign_id, c.active, 
				            c.campaign_type, c.archived, c.campaign_content,
				            SUM(CASE WHEN cl.status = 'view' THEN cl.counter ELSE 0 END) AS impressions,
				            SUM(CASE WHEN cl.status = 'conversion' THEN cl.counter ELSE 0 END) AS conversions,
				            SUM(CASE WHEN cl.status != 'view' THEN cl.counter ELSE 0 END) AS engagements
				        FROM {$table} c
				        LEFT JOIN {$table_log} cl ON c.campaign_id = cl.campaign_id 
				        WHERE c.campaign_type = %s AND c.archived = %s {$active_qry}
				        GROUP BY c.campaign_id
				        ORDER BY c.active desc, conversions desc ;",
				        $type,
				        $archived
				    ),
				    ARRAY_A
				);

		return $campaign;
	}

	public function optinable_campaigns_select($campaign_id){

		global $wpdb;

		$options = '';

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";
		
		$campaigns = $wpdb->get_results($wpdb->prepare("SELECT c.campaign_name, c.campaign_id, c.campaign_type
														FROM {$table} c
														WHERE c.active = 1 AND c.campaign_type != 'embeds'
														AND c.campaign_id != %s 
														ORDER BY c.campaign_id desc ;", $campaign_id), ARRAY_A); 
		foreach($campaigns as $row)
        {
        	$options .= '<option value="' . $row['campaign_id']. '" data-type="' . $row['campaign_type']. '">' . $row['campaign_name'] . ' ( ' . $row['campaign_type'] . ')' . '</option>';
       	}

		return $options;
	}

	public function optinable_saved_template($campaign_id){

		global $wpdb;

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

		$campaign = $wpdb->get_results(
			    $wpdb->prepare(
			        "SELECT campaign_name, campaign_type, campaign_content, active FROM {$table} where campaign_id = %s;",
			        $campaign_id
			    ),
			    ARRAY_A
			);

		//print_r($campaign);
		return $campaign;
	}

	public function optinable_googlefonts_select($type = "") {
	    
	    // host it on server
	    $url = plugin_dir_url( __DIR__ ) . 'assets/fonts/googlefonts.json';
	    $google_fonts_json = wp_remote_get($url)['body'];
	    $google_fonts_data = json_decode($google_fonts_json, true);

	    // Create an empty select field
	    $dropdown = '<select id="opable_googlefonts_dropdown_'.$type.'" class="opable_fonts_dropdown">';
	    $dropdown .= '<option value="" disabled selected>Select a font</option>';
	    // Iterate through the fonts array
	    foreach ($google_fonts_data['items'] as $font) {
	        $dropdown .= '<option value="' . $font['family'] . '">' . $font['family'] . '</option>';
	    }

	    // Close the select field
	    $dropdown .= '</select>';
	    // Return the completed dropdown
	    return $dropdown;
	}

	public function optinable_fontawesome_parse($type = "") {

		// host it on server
		$url = plugin_dir_url( __DIR__ ) . 'assets/fonts/fontawesome.json';
	    $context = stream_context_create([
		    'ssl' => [
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		    ],
		]);

		$google_fonts_json = file_get_contents($url, false, $context);
		$google_fonts_data = explode(",", $google_fonts_json);

		foreach ($google_fonts_data as $font) {
			$dropdown .= '<div class="optinable-font-wrapper" data-filter-item data-filter-name='.($font).' data-fontawe-code='.($font).' data-faw_target="icon"><i class='.($font).'></i></div>';
		}
		// Return the completed dropdown
		return $dropdown;
	}

	/**
	 * Register the stylesheets for the admin area.
	* 
	 * @since 1.0.0
	*/

	public function enqueue_styles($hook) {

		$this->hook = $hook;
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/optinable-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name.'-purecss', plugin_dir_url( __FILE__ ) . 'css/pure-min.css' );

		wp_enqueue_style( $this->plugin_name.'-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' );

		wp_enqueue_style( $this->plugin_name.'-stylesheet', plugin_dir_url( __DIR__ ) . 'assets/css/stylesheet.css' );
		wp_enqueue_style( $this->plugin_name.'-stylesheet-themes', plugin_dir_url( __DIR__ ) . 'assets/css/stylesheet-themes.css' );
		
		wp_enqueue_style('wp-color-picker');

		wp_enqueue_script('wp-color-picker', admin_url('js/color-picker.min.js'), array('iris'), false, true);

		$colorpicker_arr = array('clear' => __('Clear'), 'defaultString' => __('Default'), 'pick' => __('Select Color'));
		wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_arr ); 
		
		wp_enqueue_style('select2-css', plugin_dir_url( __FILE__ ) . 'css/select2.min.css' );

		wp_enqueue_style( 'optinable-googlefonts', "https://fonts.googleapis.com/css?family=Open+Sans%3A400italic%2C600italic%2C700italic%2C400%2C600%2C700&display=swap" );

		// Check if the user is on the top-level menu page with mod=edit-campaign
	    if (isset($_GET['page']) && $_GET['page'] === 'optinable' && isset($_GET['mod']) && $_GET['mod'] === 'edit-campaign') {
	        // Enqueue your styles for the specific page
	        wp_enqueue_style($this->plugin_name.'-edit-campaign-styles', plugin_dir_url(__FILE__).'css/optinable-edit-campaign-styles.css');
	    }
	}

	/**
	 * Register the JavaScript for the admin area.
	* 
	 * @since	1.0.0
	*/
	
	public function enqueue_scripts($hook) {
		
		wp_enqueue_media();
		
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
		
		wp_enqueue_script( $this->plugin_name.'_remodal_min', plugin_dir_url( __DIR__ ) . 'assets/js/remodal.min.js');

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/optinable-admin.js', array( 'jquery' ), $this->version, false );

		if (!wp_script_is('select2', 'registered')) {

			wp_enqueue_script( "select2", plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array( 'jquery' ), $this->version, false );
		}

		if (isset($_GET['page']) && $_GET['page'] === 'optinable' && isset($_GET['mod']) && $_GET['mod'] === 'edit-campaign') {
	       	wp_enqueue_script($this->plugin_name.'-admin-custom', plugin_dir_url(__FILE__) . 'js/optinable-admin-custom.js', array('jquery'), '1.0', true);
	    }
	    else if (isset($_GET['page']) && $_GET['page'] === 'optinable-settings' ) {
	       	wp_enqueue_script($this->plugin_name.'-admin-custom', plugin_dir_url(__FILE__) . 'js/optinable-settings-custom.js', array('jquery'), '1.0', true);
	    }
	}
	
	public function mytheme_tinymce_settings( $tinymce_init_settings ) {
	    $tinymce_init_settings['wpautop'] = false;
	    $tinymce_init_settings['forced_root_block'] = false;
	    $tinymce_init_settings['force_br_newlines'] = true;
	    $tinymce_init_settings['force_p_newlines'] = false;
	    $tinymce_init_settings['min_height'] = 150;
	    return $tinymce_init_settings;
	}
	
	/**
	 * Register the campaign functions .
	*
	 * @since    1.0.0
	*/
	
	public function opable_create_campaign_draft() {

		global $wpdb;

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['nonce'] ) ) , 'opable_create_camp' ) ){
			exit("");
		}
		
		$name = $type = '';

		if ( isset( $_REQUEST['type'] ) && ! empty( $_REQUEST['type'] ) ) {
			$type = sanitize_text_field( $_REQUEST['type'] );
		}

		if ( isset( $_POST['name'] ) && ! empty( $_POST['name'] ) ) {
			$name = wp_strip_all_tags( $_POST['name'] );
		}

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

		$campaign = array(
		  'campaign_name'    => $name,
		  'campaign_type' => $type,
		  'active'   => 0,
		  'created'	=> gmdate('Y-m-d H:i:s'),
		);

		$wpdb->insert($table, $campaign);
		$result['campaign_id'] = $wpdb->insert_id;
		
		if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') && ($result['campaign_id'] && ! is_wp_error( $result['campaign_id'] )) ) {
			
			$result['type'] = "success";
			
			$OPZHash = wp_hash($result['campaign_id'], OPTINABLE_HASH_STRING); 
			$result['redirect'] = admin_url('admin.php?page=optinable&mod=edit-campaign&type='.$type.'&_pid='.$result['campaign_id'].'&_secure='.$OPZHash.'#Design');
			
			wp_send_json( ( $result ) );
		}
		else {
			$result['type'] = "error";
			
			wp_send_json( ( $result ) );
		}
		die();
	}

	public function optinable_publish_campaign(){

		global $wpdb;

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['nonce'] ) ) , 'opable_save_camp' ) ){
			exit("");
		}   

		if ( isset( $_POST['postID'] ) && ! empty( $_POST['postID'] ) ) {
			$campaign_id = intval( $_POST['postID'] );
		}

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

		$wpdb->query( $wpdb->prepare("UPDATE {$table} 
	                SET  active = 1 - active 
	             	WHERE campaign_id = %s", $campaign_id)
	    );

  		// save html of the designed form, with no strip html tags. 
		if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) {
			
			$result['type'] = "success";
			
			wp_send_json($result);
		}
		else {
			$result['type'] = "error";
			
			wp_send_json($result);
		}

		die();
	}
	
	public function optinable_sanitize_activation_prop($value) {

        return is_array($value) ? array_map(array($this, 'optinable_sanitize_activation_prop'), $value) : wp_kses_post($value);
    }

  	public function opable_save_campaign_draft() {
		
		global $wpdb;
 		
 		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['nonce'] ) ) , 'opable_save_camp' ) ){
			exit("");
		}
		
		if ( isset( $_POST['campaign_name'] ) && ! empty( $_POST['campaign_name'] ) ) {
			$campaign_name = sanitize_text_field( $_POST['campaign_name'] );
		}

		if ( isset( $_POST['postID'] ) && ! empty( $_POST['postID'] ) ) {
			$postID = intval( $_POST['postID'] );
		}

		// Escape the HTML input
		if ( isset( $_POST['campdata'] ) ) {

			$globalProp = array();

			if ( isset( $_POST['globalProp'] ) ) {
				$globalProp = array_map(array($this, 'optinable_sanitize_activation_prop'), $_POST['globalProp']);
			}

			$campaign_data = stripslashes_deep( $_POST['campdata'] );
		}
		
		$eleProps = array();

		if ( isset( $_POST['eleProps'] ) ) {
			$eleProps = array_map(array($this, 'optinable_sanitize_activation_prop'), $_POST['eleProps']);
		}

		$eleIDs = array();

		if ( isset( $_POST['eleIDs'] ) ) {
		    $eleIDs = array_map(array($this, 'optinable_sanitize_activation_prop'), $_POST['eleIDs']);
		}

		$activationProp = array();

		if ( isset( $_POST['activationProp'] ) ) {
			$activationProp = array_map(array($this, 'optinable_sanitize_activation_prop'), $_POST['activationProp']);
		}

		$visibilityProp = array();
		
		if ( isset( $_POST['visibilityProp'] ) ) {
			$visibilityProp = array_map(array($this, 'optinable_sanitize_activation_prop'), $_POST['visibilityProp']);
		}

		##########

		if ( isset( $_POST['optinable_local_list_name'] ) && ! empty( $_POST['optinable_local_list_name'] ) ) {
			
			$optinable_local_list_name = sanitize_text_field( $_POST['optinable_local_list_name'] );
			$localListSettings = "{listname: ".$optinable_local_list_name."}";
			// handle thirdparty apps here
			$active_integrations = "local_db_list";
		}

		if ( isset( $_POST['todo'] ) && ! empty( $_POST['todo'] ) ) {
			$todo = sanitize_text_field( $_POST['todo'] );
		}

		$fonts = '';

		if ( isset( $_POST['fonts'] ) && is_array( $_POST['fonts'] ) ) {
			$fonts = array_map(array($this, 'optinable_sanitize_activation_prop'), $_POST['fonts']);
		}

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

		if($todo == "save"){

		    $wpdb->query( $wpdb->prepare("UPDATE {$table} 
		                SET campaign_content = %s, campaign_name = %s
		             	WHERE campaign_id = %s", $campaign_data, $campaign_name, $postID)
		    );
	    }

	    optinable_delete_custom_table_meta("optinable_campaign_meta", $postID);
	    optinable_update_custom_table_meta("optinable_campaign_meta", $postID, "global_prop", serialize($globalProp));
	    optinable_update_custom_table_meta("optinable_campaign_meta", $postID, "visibility", serialize($visibilityProp));
	    optinable_update_custom_table_meta("optinable_campaign_meta", $postID, "activation", serialize($activationProp));
	    optinable_update_custom_table_meta("optinable_campaign_meta", $postID, "fonts", serialize($fonts));

	    // local list settings
	    optinable_update_custom_table_meta("optinable_campaign_meta", $postID, "optinable_local_list_settings", ($localListSettings));

	    // handle local list and thirdparty apps here
	    optinable_update_custom_table_meta("optinable_campaign_meta", $postID, "active_integrations", $active_integrations);

	    foreach($eleIDs as $index => $eleID )
	    {
	    	optinable_update_custom_table_meta("optinable_campaign_meta", $postID, $eleID, $eleProps[$index]);
	    }

		$OPZHash = wp_hash($postID, OPTINABLE_HASH_STRING); 

  		// save html of the designed form, with no strip html tags. 
		if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) {
			
			$result['type'] = "success";
			$result['activationProp'] = $this->content_post;

			$result['redirect'] = admin_url('admin.php?page=optinable&mod=edit-campaign&_pid='.$postID.'&_secure='.$OPZHash.'#Design');

			wp_send_json($result);
		}
		else {
			$result['type'] = "error";
			wp_send_json($result);
		}

		die();
	}

	public function opable_select_template(){

		global $wpdb;
		
		$template_id = 0;

		if ( isset( $_POST['template_id'] ) && ! empty( $_POST['template_id'] ) ) {
			$template_id = sanitize_text_field( $_POST['template_id'] );
		}

		if ( isset( $_POST['campaign_id'] ) && ! empty( $_POST['campaign_id'] ) ) {
			$campaign_id = absint( $_POST['campaign_id'] );
		}

		if ( isset( $_POST['type'] ) && ! empty( $_POST['type'] ) ) {
			$type = sanitize_text_field( $_POST['type'] );
		}

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_templates";

		// Use placeholders and $wpdb->prepare() to construct your SQL query.
		$content = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT content FROM $table where template_id = %d;",
		        $template_id
		    )
		);

		if ( $content !== null ) {
		    // Replace placeholders in the retrieved content.
		    $content = str_replace("{{campaign_id}}", $campaign_id, $content);
		    $content = str_replace("{{op_plugin_media_url}}", OPTINABLE_PLUGIN_PATH."assets/img", $content );
		
			$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

			$wpdb->query(
			    $wpdb->prepare(
			        "UPDATE $table
			        SET campaign_content = %s, campaign_type = %s
			        WHERE campaign_id = %d",
			        $content,
			        $type,
			        $campaign_id
			    )
			);
	    }

	    $OPZHash = wp_hash($campaign_id, OPTINABLE_HASH_STRING); 

	    if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) {
			
			$result['type'] = "success";
			$result['redirect'] = admin_url('admin.php?page=optinable&mod=edit-campaign&_pid='.$campaign_id.'&_secure='.$OPZHash.'#Design');
			
			wp_send_json($result);
		}
		else {
			$result['type'] = "error";
			
			wp_send_json($result);
		}

		die();
	}

	public function optinable_save_settings(){

		if ( ! current_user_can( 'manage_options' ) ) return;

		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['_wpnonce'] ) ) , 'optinable_setting_page' ) ){
			exit("");
		}

		$op_remove_data_uninstall = $op_data_sharing = $op_disable_tracking = 0;

		if ( isset( $_REQUEST['op_remove_data_uninstall'] ) && ! empty( $_REQUEST['op_remove_data_uninstall'] ) ) {
			$op_remove_data_uninstall = 1;
		}

		if ( isset( $_REQUEST['op_disable_tracking'] ) && ! empty( $_REQUEST['op_disable_tracking'] ) ) {
			$op_disable_tracking = 1;
		}

		if ( isset( $_REQUEST['op_data_sharing'] ) && ! empty( $_REQUEST['op_data_sharing'] ) ) {
			$op_data_sharing = 1;
			optinable_share_data_api();
		}

		update_option( "optinable_remove_data_uninstall", $op_remove_data_uninstall );
		update_option( "optinable_data_sharing", $op_data_sharing );
		update_option( "optinable_disable_tracking", $op_disable_tracking );


		if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) {
			
			$result['type'] = "success";
			$result['redirect'] = admin_url('admin.php?page=optinable-settings&response=saved');

			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			wp_send_json($result);
		}
		else {
			$result['type'] = "error";
			$result['redirect'] = admin_url('admin.php?page=optinable-settings&response=error');

			setcookie('op_admin_error_message_cookie', '1', time() + 3600, '/');

			wp_send_json($result);
		}

		die();
	}

	public function optinable_confirm_action(){

		if ( ! current_user_can( 'manage_options' ) ) return;
		global $wpdb;

		if ( isset( $_REQUEST['todo'] ) && ! empty( $_REQUEST['todo'] ) ) {
			$todo = sanitize_text_field( $_REQUEST['todo'] );
		}

		if ( isset( $_REQUEST['optinable_c_id'] ) && ! empty( $_REQUEST['optinable_c_id'] ) ) {
			$campaign_id = intval( $_REQUEST['optinable_c_id'] );

			$campaign_type = isset( $_REQUEST['optinable_page_type'] ) ? sanitize_text_field( $_REQUEST['optinable_page_type'] ) : '';
		}

		if($todo == "op_reset_plugin")
		{
			$table1 = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";
			$wpdb->query( "TRUNCATE TABLE $table1" );

			$table2 = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaign_meta";
			$wpdb->query( "TRUNCATE TABLE $table2" );

			$table3 = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries";
			$wpdb->query( "TRUNCATE TABLE $table3" );

			$table4 = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries_meta";
			$wpdb->query( "TRUNCATE TABLE $table4" );

			$table5 = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_log";
			$wpdb->query( "TRUNCATE TABLE $table5" );

			global $wp_object_cache;
    		$wp_object_cache->flush();

    		$return = 'reset';

    		$redirect = admin_url('admin.php?page=optinable-settings&response='.$return);
		}
		else if( $todo == "op_remove_subscribers")
		{
			$childTable = $wpdb->prefix . 'optinable_entries_meta';
			$parentTable = $wpdb->prefix . 'optinable_entries';

			$wpdb->query(
				$wpdb->prepare(
					"DELETE FROM $childTable WHERE entry_id IN 
					(SELECT entry_id FROM $parentTable WHERE campaign_id = %d)",
					$campaign_id
				)
			);

			$wpdb->delete(
				$parentTable,
				array(
					'campaign_id' => $campaign_id
				)
			);

			//if already exist response then dont add redirect
			$redirect = admin_url( 'admin.php?page=optinable-campaign-list-'.$campaign_type.'&response=reset&type='.$campaign_type );
		}
		else if($todo == "op_delete_campaign")
		{
			$table1 = "{$wpdb->prefix}" . OPTINABLE_DB_TABLE_INITIAL . "_campaigns";
			$wpdb->delete(
			    $table1,
			    array(
			        'campaign_id' => $campaign_id
			    )
			);

			$table1 = "{$wpdb->prefix}" . OPTINABLE_DB_TABLE_INITIAL . "_campaign_meta";
			$wpdb->delete(
			    $table1,
			    array(
			        'campaign_id' => $campaign_id
			    )
			);

			$childTable = $wpdb->prefix . 'optinable_entries_meta';
			$parentTable = $wpdb->prefix . 'optinable_entries';

			$wpdb->query(
			    $wpdb->prepare(
			        "DELETE FROM $childTable WHERE entry_id IN 
			        (SELECT entry_id FROM $parentTable WHERE campaign_id = %d)",
			        $campaign_id
			    )
			);

			$wpdb->delete(
			    $parentTable,
			    array(
			        'campaign_id' => $campaign_id
			    )
			);

			$table1 = "{$wpdb->prefix}" . OPTINABLE_DB_TABLE_INITIAL . "_log";
			$wpdb->delete(
			    $table1,
			    array(
			        'campaign_id' => $campaign_id
			    )
			);

    		$redirect = admin_url( 'admin.php?page=optinable-campaign-list-'.$campaign_type.'&response=deleted&type='.$campaign_type );
		}
		
	    if( (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ) {
			
			$result['type'] = "success";
			
			$result['redirect'] = $redirect;

			setcookie('op_admin_success_message_cookie', '1', time() + 3600, '/');

			wp_send_json($result);
		}
		else 
		{
			$result['type'] = "error";

			$result['redirect'] = admin_url('admin.php?page=optinable-settings&response=error');

			setcookie('op_admin_error_message_cookie', '1', time() + 3600, '/');

			wp_send_json($result);
		}

		die();
	}

	public function update_option_joining_list_optinable(){

		update_option( "_optinable_joined_list", 1 );
	}

	public function optinable_kses_allowed_html_filter($allowedposttags) {

		$allowedposttags['input'] = array(
			'placeholder' => TRUE,
			'autocomplete' => TRUE,
	        'name'        => TRUE,
	        'value'       => TRUE,
	        'size'        => TRUE,
	        'maxlength'   => TRUE,
	        'type'        => TRUE,
	        'required'    => TRUE
		);

		return $allowedposttags;
	}

	// Function to whitelist safe html attributes
	public function optinable_safe_css_attributes( $array ){

		$array[] = 'display';
		$array[] = 'visibility';
		$array[] = 'placeholder';
		$array[] = 'position';
		$array[] = 'top';
		$array[] = 'left';
		$array[] = 'background';
		$array[] = 'background-color';
		$array[] = 'text-align';
		$array[] = 'background-color:rgba';
        $array[] = 'background-color:rgb';
        // Allow background-image property
        $array[] = 'background-image';

		return $array;
	}

	public function optinable_get_visibility_options() {
		
		global $wpdb;

		$search = $ids = $type = '';
		
		if ( isset( $_REQUEST['type'] ) && ! empty( $_REQUEST['type'] ) ) {
			$type = sanitize_text_field( $_REQUEST['type'] );
		}

		if ( isset( $_REQUEST['search'] ) && ! empty( $_REQUEST['search'] ) ) {
			$search = sanitize_text_field( $_REQUEST['search'] );
		}

		$ids = isset( $_REQUEST['ids'] ) ? (array) $_REQUEST['ids'] : array();

		if ( isset( $_REQUEST['ids'] ) ) 
			$ids = array_map( 'sanitize_text_field', $_REQUEST['ids'] );
		else
			$ids = array();

		// Show post titles
		$options = '';
		$results = $result = []; 
		$category_list = array();

		if($type == "categories")
		{
			if($search){

				$args = array(
				    'taxonomy' => 'category',
				    //'hide_empty' => true,
				    'name__like' => $search
				);

				$categories = get_terms($args);
			}
			else{

				$args = array(
				    'include' => $ids,
				);

				$categories = get_categories($args);
			}
			// You can iterate over the list of objects returned by `get_categories` 
			// to achieve list of categories in required format.
			foreach( $categories as $category ) {
				$data = [];
			 	$data['id'] = $category->term_id;
			 	$data['text'] = $category->name;
				array_push($results, $data);
			}
		}
		else if($type == "static")
		{
			if(!$ids)
				$ids = [1,2,3];

			if(in_array(1, $ids))
			{
				$data = [];
			 	$data['id'] = 1;
			 	$data['text'] = 'Front Page';
				array_push($results, $data);
			}

			if(in_array(2, $ids))
			{
				$data = [];
			 	$data['id'] = 2;
			 	$data['text'] = '404 Page';
				array_push($results, $data);
			}

			if(in_array(3, $ids))
			{
				$data = [];
			 	$data['id'] = 3;
			 	$data['text'] = 'Search Result Page';
				array_push($results, $data);
			}
		}
		else if($type == "browser")
		{
			$browsers = [1 => "Chrome", 2 => "Edge" ,3 => "Firefox", 4 => "Internet Explorer" ,5 => "Opera" ,6 => "Safari"];

			if(!empty($ids))
			{
				foreach($ids as $val)
				{
					if(array_key_exists($val, $browsers))
					{
						$data = [];
					 	$data['id'] = $val;
					 	$data['text'] = $browsers[$val];
						array_push($results, $data);
					}
				}
			}
			else
			{
				for($p=1; $p<=6; $p++)
				{
					$data = [];
				 	$data['id'] = $p;
				 	$data['text'] = $browsers[$p];
					array_push($results, $data);
				}
			}
		}
		else
		{
			$args = array(
			  'post_type' => array($type),
			  'post__in' => $ids,
			  's' => $search,
			  'post_status' => 'publish',
			  'posts_per_page' => -1,
			  'ignore_sticky_posts' => true,
			);

			$qry = new WP_Query($args);
			foreach ($qry->posts as $p) {
				$data = [];
			 	$data['id'] = $p->ID;
			 	$data['text'] = $p->post_title;
				// [{id:123,text:”Select me please”},{id:456,text:'Or Select Me!'}]
				array_push($results, $data);
			}
		}

		$result['items'] = $results;
		$result['search'] = $browsers;
		wp_send_json($result);
		die();
	}

	/**
	 * Register all of the hooks related to the admin
	 * of the plugin.
	 *
	 * @since    1.0.2
	 * @access   private
	*/

	public function optinable_check_upgrade() {
	    // Get the current plugin version saved in the database
	    $current_version_in_db = get_option('optinable_version');
	   
	    // Compare the current version with the new version
	    if (version_compare($current_version_in_db, OPTINABLE_PLUGIN_VERSION, '<')) {
	        // Perform the upgrade
	        update_option('optinable_rating_data', '');
	        
			// Update the optinable_db_version option
		    update_option('optinable_db_version', OA_DB_VERSION);
		    // Update the optinable_version option
		    update_option('optinable_version', OPTINABLE_PLUGIN_VERSION);
	    }
	}

	/**
	 * Add footer text to the WordPress admin screens.
	 *
	 * @since    1.0.2
	 *
	 * @return void
	*/

	public function replace_footer_text() {
		$link_text = esc_html__( 'Give us a 5-star rating!', 'optinable' );
		$href      = 'https://wordpress.org/support/plugin/optinable/reviews/?filter=5#new-post';
		$link1     = sprintf(
			'<a href="%1$s" target="_blank" title="%2$s">&#9733;&#9733;&#9733;&#9733;&#9733;</a>',
			$href,
			$link_text
		);
		$link2     = sprintf(
			'<a href="%1$s" target="_blank" title="%2$s">WordPress.org</a>',
			$href,
			$link_text
		);

		printf(
			esc_html__(
				'Please rate %1$s %2$s on %3$s to help us spread the word.',
				'optinable'
			),
			sprintf( '<strong>%1$s</strong>', 'OptinAble' ),
			wp_kses_post( $link1 ),
			wp_kses_post( $link2 )
		);

		global $wp_version;
		printf(
			wp_kses_post( '<p class="alignright">%1$s</p>' ),
			sprintf(
				esc_html__( 'WordPress %1$s | OptinAble %2$s', 'optinable' ),
				esc_html( $wp_version ),
				esc_html( OPTINABLE_PLUGIN_VERSION )
			)
		);

		remove_filter( 'update_footer', 'core_update_footer' );
	}

}