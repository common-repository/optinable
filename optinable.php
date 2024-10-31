<?php
/**
 * Plugin Name:       OptinAble
 * Plugin URI:        https://optinable.com/?utm_campaign=plugin-info&utm_source=plugin-header&utm_medium=plugin-uri
 * Description:       The ultimate Free WP plugin for collecting email subscribers. With our easy-to-use interface, and built in templates, you can create beautiful popups, stickybars, slide-ins, and embed forms to grow your email list in no time.
 * Version:           1.0.4
 * 
 * Author:            OptinAble Popup Builder Team
 * Author URI:        https://optinable.com/
 * 
 * Text Domain:       optinable
 * Domain Path: 	  /languages
 * License:     	  GPLv2 or later 
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/

// Disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'OPTINABLE_PLUGIN_VERSION', '1.0.4' );
define( 'OA_DB_VERSION', '1.1' );
define( 'OPTINABLE_HASH_STRING', 'OPTINABLEV1' );
define( 'OPTINABLE_DB_TABLE_INITIAL', 'optinable' );
define( 'OPTINABLE_NUMBER_OF_ROWS_PER_PAGE', 20 );

$plugin_root_url = esc_url(plugins_url('/', __FILE__));
define( 'OPTINABLE_PLUGIN_PATH', $plugin_root_url );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-optinable-activator.php
*/

function optinable_activate() {
	ob_start();
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-optinable-activator.php';
	Optinable_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-optinable-deactivator.php
*/

function optinable_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-optinable-deactivator.php';
	Optinable_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'optinable_activate' );
register_deactivation_hook( __FILE__, 'optinable_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
*/

require plugin_dir_path( __FILE__ ) . 'includes/class-optinable.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since	1.0.0
*/

function optinable_run() {
	$plugin = new Optinable();
	$plugin->run();

}

optinable_run();


