<?php // Core Functionality

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function optinable_update_custom_table_meta($table, $campaign_id, $meta_key, $meta_value) {
   
    global $wpdb;

    $table_name = $wpdb->prefix . $table;

    // Check if the record exists in the custom table
    $query = $wpdb->prepare(
	    "SELECT * FROM $table_name WHERE meta_key = %s AND campaign_id = %s",
	    $meta_key,
	    $campaign_id
	);
	$record = $wpdb->get_row($query);

    if (!$record) {
        // Record doesn't exist,
        $data = array(
            'campaign_id' => $campaign_id,
            'meta_key' => $meta_key,
            'meta_value' => ($meta_value),
            //'meta_data' => serialize(array($meta_key => $meta_value)),
        );

        $wpdb->insert($table_name, $data);
		// die();
    }
    else
    {
		// Record exists, update its meta data
        $data = array(
        	'meta_key' => $meta_key,
        	'meta_value' => (($meta_value)),
            //'meta_data' => serialize($meta_data),
        );

        $where = array(
            'meta_key' => $meta_key,
            'campaign_id' => $campaign_id,
		);

        $wpdb->update($table_name, $data, $where);
    }

    // Return true to indicate that the update was successful
    return true;
}

function optinable_get_custom_table_meta($table, $campaign_id, $meta_key) {

	global $wpdb;

    $table_name = $wpdb->prefix . $table;
    // Check if the record exists in the custom table

    $meta_value = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT meta_value FROM $table_name WHERE meta_key = %s AND campaign_id = %s",
		        $meta_key,
		        $campaign_id
		    )
		);

    return $meta_value;
}

function optinable_delete_custom_table_meta($table, $campaign_id) {
	
	global $wpdb;
	
	$table_name = $wpdb->prefix . $table;
	
    $wpdb->query(
	    
	    $wpdb->prepare(
	        "DELETE FROM $table_name WHERE campaign_id = %d",
	        $campaign_id
	    )
	);
}

function optinable_handle_background_image_url($matches) {
    
    // Ensure that $matches[1] contains the URL
    $url = isset($matches[1]) ? $matches[1] : '';

    // If the URL is not empty, return the modified property
    if (!empty($url)) {
        return "background-image: url('$url')";
    }

    // If the URL is empty, return the original property
    return $matches[0];
}

function optinable_render_shortcode($atts, $content = null) {
  
	extract(shortcode_atts(array(
	'type' => 'lightbox',
	'id' => '',
	), $atts));

	// Generate the HTML code for the OptinAble shortcode
	$html = '<a href="javascript:;" class="optinable-optinlink-trigger" data-type="'.$type.'" data-optinable-id="' . $id . '">'.$content.'</a>';
	return $html;
}

function optinable_sanitize_serialize_input($serialized_data){
	
	// Unserialize the data
	$sanitized_serialized_data = $serialized_data;
	$unserialized_data = maybe_unserialize($serialized_data);
	// Check if unserialization is successful
	if ($unserialized_data !== false) {
		$sanitized_serialized_data = '';
	    // Loop through each value and sanitize it
	    $sanitized_data = array_map('sanitize_text_field', $unserialized_data);
	    // Serialize the sanitized data
	    $sanitized_serialized_data = serialize($sanitized_data);
	}

	return $sanitized_serialized_data;
}

function optinable_share_data_api() {
    // Collect necessary data about the user's website
    $site_url = get_site_url();
    $admin_email = get_option('admin_email');
    $plugin_version = OPTINABLE_PLUGIN_VERSION; // Replace with your actual plugin version

    // Get information about active theme
    $active_theme = wp_get_theme();
    $active_theme_name = $active_theme->get('Name');

    // Get information about active plugins
    $active_plugins = get_option('active_plugins');

    $plugin_data = array();
    
    foreach ($active_plugins as $plugin) {
        $plugin_data[] = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
    }

    // Get server information
    $locale = get_locale();
    $php_version = phpversion();
    $mysql_version = $GLOBALS['wpdb']->db_version();

    // Prepare the data to be sent
    $data = array(
        'site_url' => $site_url,
        'admin_email' => $admin_email,
        'plugin_version' => $plugin_version,
        'active_theme' => $active_theme_name,
        'active_plugins' => $plugin_data,
        'locale' => $locale,
        'php_version' => $php_version,
        'mysql_version' => $mysql_version,
        // Include any other relevant data you want to collect
    );

    // Convert the data to JSON format
    $json_data = json_encode($data);

    // Make an API call to submit the data to your desired endpoint
    $api_url = 'https://optinable.com/wp-json/optinable_web_api/plugin_usage_sharing'; // Replace with your actual API endpoint
    $args = array(
        'body' => $json_data,
    );

    $response = wp_remote_post($api_url, $args);

    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        error_log( "API request failed: $error_message" );
    } else {
        $response_body = wp_remote_retrieve_body( $response );
        error_log( "API response: $response_body" );
    }
}

