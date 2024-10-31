<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 * 
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://optinable.com/
 * @since      1.0.0
 *
 * @package    Optinable
*/

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

$optinable_remove_data_uninstall = get_option('optinable_remove_data_uninstall');

if($optinable_remove_data_uninstall == 1){

    delete_option("optinable_remove_data_uninstall");
    delete_option("optinable_db_version");
    delete_option("optinable_version");
    delete_option("optinable_rating_data");
    
    delete_option("optinable_disable_tracking");
    delete_option("optinable_data_sharing");

    $table1 = "{$wpdb->prefix}optinable_campaigns";
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table1));

    $table2 = "{$wpdb->prefix}optinable_campaign_meta";
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table2));

    $table3 = "{$wpdb->prefix}optinable_entries";
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table3));

    $table4 = "{$wpdb->prefix}optinable_entries_meta";
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table4));

    $table5 = "{$wpdb->prefix}optinable_log";
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table5));

    $table6 = "{$wpdb->prefix}optinable_templates";
    $wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $table6));

   // $wpdb->print_error();
}
