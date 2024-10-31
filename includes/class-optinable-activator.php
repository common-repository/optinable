<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Fired during plugin activation
 *
 * @link       https://optinable.com/
 * @since      1.0.0
 *
 * @package    Optinable
 * @subpackage Optinable/includes
 */
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0 
 * @package    Optinable 
 * @subpackage Optinable/includes
 * @author     optinable <support@optinable.com>
*/

class Optinable_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since 1.0.0
	*/

	public function __construct() {

	}

	public static function activate() {
		
		global $wpdb;
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries";
		
		$sql = "CREATE TABLE {$table} (
				`entry_id` bigint(20) NOT NULL AUTO_INCREMENT,
				`campaign_id` bigint(20) NOT NULL,
				`campaign_type` varchar(250) NOT NULL,
				`version` tinyint(2) NULL DEFAULT 0,
				`created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY (entry_id),
				KEY campaign_type (campaign_type),
				KEY campaign_id (campaign_id)
			) DEFAULT CHARSET=utf8;";

		dbDelta($sql);

		// 	echo $sql;
		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_entries_meta";

		$sql = "CREATE TABLE {$table} (
				`meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
				`entry_id` bigint(20) NOT NULL,
				`meta_key` varchar(250) NOT NULL,
				`meta_value` longtext DEFAULT NULL,
				`created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				`updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY  (meta_id),
				KEY meta_key (meta_key)

			) DEFAULT CHARSET=utf8;";
		
		dbDelta($sql);

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

		$sql = "CREATE TABLE {$table} (
				`campaign_id` bigint(20) NOT NULL AUTO_INCREMENT,
				`campaign_name` varchar(250) NOT NULL,
				`campaign_type` varchar(90) NOT NULL,
				`campaign_content` longtext DEFAULT NULL,
				`campaign_mode` varchar(100) DEFAULT NULL,
				`campaign_prop` varchar(100) DEFAULT NULL,
				`user_id` bigint(20) DEFAULT NULL ,
				`archived` tinyint(4) DEFAULT 0,
				`active` tinyint(4) DEFAULT 0,
				`created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY (campaign_id)

			) DEFAULT CHARSET=utf8;";
		
		dbDelta($sql);

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaign_meta";

		$sql = "CREATE TABLE {$table} (
				`meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
				`campaign_id` bigint(20) NOT NULL,
				`meta_key` varchar(250) NOT NULL,
				`meta_value` longtext DEFAULT NULL,
				PRIMARY KEY  (meta_id),
				KEY meta_key (meta_key)
			) DEFAULT CHARSET=utf8;";

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_log";

		dbDelta($sql);

		$sql = "CREATE TABLE {$table} (
				`log_id` bigint(20) NOT NULL AUTO_INCREMENT,
				`campaign_id` bigint(20) NOT NULL,
				`campaign_type` varchar(250) NOT NULL,
				`page_id` bigint(20) DEFAULT 0,
				`status` varchar(111) NOT NULL,
				`ip` varchar(250) NOT NULL,
				`counter` INT DEFAULT 1,
				`created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				`updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY  (log_id),
				KEY status (status),
				KEY log_created (created DESC)

			) DEFAULT CHARSET=utf8;";
		
		dbDelta($sql);

		$table_template = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_templates";

		$sql = "CREATE TABLE {$table_template} (
				`id` bigint(20) NOT NULL AUTO_INCREMENT,
				`template_id` bigint(20) NOT NULL,
				`template_name` varchar(250) DEFAULT NULL,
				`content` longtext DEFAULT NULL,
				`created` datetime NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (id)
			) DEFAULT CHARSET=utf8;"; // ALTER TABLE `wp_optinable_templates` CHANGE `created` `created` DATETIME NULL DEFAULT CURRENT_TIMESTAMP;

		dbDelta($sql);

		// Update DB Version...
		update_option('optinable_db_version',  OA_DB_VERSION);
		update_option('optinable_version',  OPTINABLE_PLUGIN_VERSION);
		// exit;

		$installed_date = get_option('optinable_installed_date');
		
		if (!$installed_date) {
	        // Plugin is being activated for the first time
	        $installed_date = time();
	        update_option('optinable_installed_date', $installed_date);
	    }

	    ########## Template Insertion ##########
	    
	    // Check if the records already exist
		$existing_records = $wpdb->get_var("SELECT COUNT(*) FROM {$table_template}");
		
		if ($existing_records == 0) {
		    // Insert the records
		    for ($k = 1; $k <= 25; $k++) {
		        
		        $template_url = plugin_dir_path(__DIR__) . 'assets/templates/' . $k . '.txt';

		        $response = wp_remote_head($template_url);

		        if (file_exists($template_url)) {

		            // File exists
		            $content = @file_get_contents($template_url);
		            $data = array(
		                'template_id' => $k,
		                'template_name' => 'Template ' . $k,
		                'content' => $content,
		                'created' => date_i18n("Y-m-d H:i:s"),
		            );

		            $wpdb->insert($table_template, $data);
		        }
		    }

		    for($k = 111; $k<=114; $k++)
		    {
			    $template_url = plugin_dir_path(__DIR__) . 'assets/templates/' . $k . '.txt';
				
				$response = wp_remote_head($template_url);

				if (file_exists($template_url)) {
				   
				    // File exists
				    $content = @file_get_contents($template_url);
					$data = array(
								'template_id' => $k,
								'template_name' => 'Blank '.$k,
								'content' => $content,
								'created' => date_i18n("Y-m-d H:i:s"),
							);

					$wpdb->insert($table_template, $data);
				}
			}
		}
	}
}?>