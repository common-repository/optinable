<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://optinable.com/
 * @since      1.0.0
 *
 * @package    Optinable
 * @subpackage Optinable/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0 
 * @package    Optinable
 * @subpackage Optinable/includes
 * @author     optinable <support@optinable.com>
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Optinable {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Optinable_Loader    $loader    Maintains and registers all hooks for the plugin.
	*/
	
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	*/

	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	*/
	
	protected $version;

	protected $popups;

	protected $embed;

	protected $placement;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	*/
	
	public function __construct() {

		if ( defined( 'OPTINABLE_PLUGIN_VERSION' ) ) {
			$this->version = OPTINABLE_PLUGIN_VERSION;
		} 
		else {

			$this->version = '1.0.0';
		}
		
		$this->plugin_name = 'optinable';
		$this->load_dependencies();
		$this->set_locale();


		if ( is_admin() ) {
		    $this->define_admin_hooks();
		}

		$this->define_public_hooks();	
	}

	function optinable_content_embed($content) {

	    $location = $this->placement;
		// append the form to the appropriate location
		switch ($location) {
		    case 'top':
		        $content = $this->embed . $content;
		        break;
		    case 'middle':
		        $content = substr_replace($content, $this->embed, strlen($content) / 2, 0);
		        break;
		    case 'both':
		    	$content = $this->embed . $content . $this->embed;
		    	 break;
		    case 'bottom':
		    default:
		        $content .= $this->embed;
		        break;
		}

	    return $content;
	}

	/**
	 * Load the required dependencies for this plugin.
	 * Include the following files that make up the plugin:
	 * - Optinable_Loader. Orchestrates the hooks of the plugin.
	 * - Optinable_i18n. Defines internationalization functionality.
	 * - Optinable_Admin. Defines all hooks for the admin area.
	 * - Optinable_Public. Defines all hooks for the public side of the site.
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 * @since  1.0.0
	 * @access private
	*/
	
	private function load_dependencies() {
		
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-optinable-loader.php';
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-optinable-i18n.php';
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		*/
		
		// admin class need to be loaded in admin side only. 
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-optinable-admin.php';
		
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		*/
		
		// include plugin dependencies: admin and public
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/core-functions.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-optinable-popups.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-optinable-public.php';

		$this->loader = new Optinable_Loader();
		
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Optinable_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	*/
	
	private function set_locale() {
		
		$plugin_i18n = new Optinable_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	*/
	
	private function define_admin_hooks() {
		
		$plugin_admin = new Optinable_Admin( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu_page' );
		
		// custom actions
		$this->loader->add_action( 'wp_ajax_opable_create_campaign_draft', $plugin_admin, 'opable_create_campaign_draft' );
		$this->loader->add_action( 'wp_ajax_opable_save_campaign_draft', $plugin_admin, 'opable_save_campaign_draft' );

		$this->loader->add_action( 'wp_ajax_optinable_publish_campaign', $plugin_admin, 'optinable_publish_campaign' );

		$this->loader->add_action( 'wp_ajax_update_option_joining_list_optinable', $plugin_admin, 'update_option_joining_list_optinable' );
		$this->loader->add_action( 'wp_ajax_opable_select_template', $plugin_admin, 'opable_select_template' );
		$this->loader->add_action( 'wp_ajax_optinable_confirm_action', $plugin_admin, 'optinable_confirm_action' );
		$this->loader->add_action( 'wp_ajax_optinable_save_settings', $plugin_admin, 'optinable_save_settings' );

		$this->loader->add_action( 'wp_ajax_optinable_copy_campaigns', $plugin_admin, 'optinable_copy_campaigns' );

		$this->loader->add_action( 'wp_ajax_export_email_list', $plugin_admin, 'optinable_export_email_list');
		
		$this->loader->add_action( 'wp_ajax_optinable_get_visibility_options', $plugin_admin, 'optinable_get_visibility_options' );
		
		$this->loader->add_filter( 'safe_style_css', $plugin_admin, 'optinable_safe_css_attributes' );
		$this->loader->add_filter( 'wp_kses_allowed_html', $plugin_admin, 'optinable_kses_allowed_html_filter');

		$this->loader->add_filter('show_admin_bar', $plugin_admin, '__return_false');

		$this->loader->add_filter( 'tiny_mce_before_init', $plugin_admin, 'mytheme_tinymce_settings' );

		// check version
		$this->loader->add_action( 'admin_init', $plugin_admin, 'optinable_check_upgrade' );

	    // Check if we are in the admin area
	    if ( is_admin() ) {
    	    if ( isset( $_GET['page'] ) && strpos( $_GET['page'], 'optinable' ) !== false ) {
	            $this->loader->add_filter( 'admin_footer_text', $plugin_admin, 'replace_footer_text' );
	        }
	    }
		
	}


	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	*/

	function embedCampaign(){

		if(is_single()) 
		{
			$this->popups = new Optinable_Popups( $this->get_plugin_name(), $this->get_version() );

			$embed = $this->popups->init(1);

			if($embed){

				$this->embed = $embed['output'];
				$this->placement = $embed['placement'];

				$optinable = new Optinable_Public( $this->get_plugin_name(), $this->get_version() );
				$page_id = get_queried_object_id();

				foreach($embed['campaign_ids'] as $id){

					$optinable->track_impression_callback( false, $id, $page_id );
				}

				add_filter( 'the_content', array( $this, 'optinable_content_embed'), 99 );
			}
		}
	}

	private function define_public_hooks() {

		$plugin_public = new Optinable_Public( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

		$this->loader->add_action('wp_ajax_track_impression_callback', $plugin_public, 'track_impression_callback');
		$this->loader->add_action('wp_ajax_nopriv_track_impression_callback', $plugin_public, 'track_impression_callback');

		$this->loader->add_action( 'wp_ajax_optinable_form_entry', $plugin_public, 'optinable_form_entry' );
		$this->loader->add_action('wp_ajax_nopriv_optinable_form_entry', $plugin_public, 'optinable_form_entry'); // For non-authenticated users

		add_action( 'template_redirect', array( $this, 'embedCampaign') );

		add_filter( 'excerpt_more', array( $this, 'op_disable_the_content_for_excerpts') );

		add_action ( 'wp_head' , array( $this , 'optinable_get_popups' ) , 9999 );
	}

	public function optinable_get_popups(){

		$this->popups = new Optinable_Popups( $this->get_plugin_name(), $this->get_version() );
		
		echo $this->popups->init();
	}


	function op_disable_the_content_for_excerpts( $more ) {

	    if( ! is_single() && !is_page()) {
	        remove_filter( 'the_content', 'custom_function' );
	    }
	    
	    return $more;
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	*/
	
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	*/
	
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Optinable_Loader    Orchestrates the hooks of the plugin.
	*/
	
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	*/
	
	public function get_version() {
		return $this->version;
	}
}