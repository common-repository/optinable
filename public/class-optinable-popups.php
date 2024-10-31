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
 * @subpackage public
 * @author     optinable <support@optinable.com>
*/

class Optinable_Popups {

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

	private $popups;

	protected $embed;

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
	}

	/**
	 * Inititate the popups for the public-facing side of the site.
	 *
	 * @since    1.0.0
	*/

	function init($embed = 0, $campaign_id = 0) {

		global $wpdb;

		$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaigns";

		// post embed 
		if($embed == 1){

			$custom_posts = $wpdb->get_results(
			    $wpdb->prepare(
			        "SELECT * FROM $table WHERE campaign_type = %s AND active = %d;",
			        'embed',
			        1
			    )
			);
		}
		else if($embed == 2)// shortcode embed
			$custom_posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table where campaign_type = 'embed' AND campaign_id =  %d AND active = 1;", $campaign_id)); 
		else{
			
			$custom_posts = $wpdb->get_results(
			    $wpdb->prepare(
			        "SELECT * FROM $table WHERE campaign_type != %s AND active = %d;",
			        'embed',
			        1
			    )
			);
		}

		$output = $jsoutput = '';

		if( ! empty( $custom_posts ) ){
			
			$jsoutput = '['; 

			$kk = 1; $campFontsArr = '';

			$embedOut = array();
			$embedOut['campaign_ids'] = array();

			foreach ( $custom_posts as $p ) : 
				
				$optinableCampaign = true;

				#### Visibility filter
				$visibility_settings = optinable_get_custom_table_meta("optinable_campaign_meta", $p->campaign_id, "visibility");

				if($visibility_settings)
				{
					$op_visibility_target_id_posts = []; 
					$visibility_settings = unserialize($visibility_settings);

					// Posts
					$op_visibility_on_posts = isset($visibility_settings['op_visibility_on_posts']) ? $visibility_settings['op_visibility_on_posts'] : 0;
					$op_visibility_target_type_post = isset($visibility_settings['op_visibility_target_type_post']) ? $visibility_settings['op_visibility_target_type_post'] : ''; // target_only_these = target_all_except

					$op_visibility_target_id_posts = isset($visibility_settings['op_visibility_target_id_post']) ? $visibility_settings['op_visibility_target_id_post'] : array();
					$optin_global_visibility = $visibility_settings['optin_global_visibility']; // Global Visibility = Targeted Visibility

					// Pages
					$op_visibility_on_pages = isset($visibility_settings['op_visibility_on_pages']) ? $visibility_settings['op_visibility_on_pages'] : 0; 
					$op_visibility_target_type_page = isset($visibility_settings['op_visibility_target_type_page']) ? $visibility_settings['op_visibility_target_type_page'] : '';  // target_only_these = target_all_except
					$op_visibility_target_id_page = isset($visibility_settings['op_visibility_target_id_page']) ? $visibility_settings['op_visibility_target_id_page'] : array(); // IDs

					// Categories
					$op_visibility_on_categories = isset($visibility_settings['op_visibility_on_categories']) ? $visibility_settings['op_visibility_on_categories'] : 0; 

					$op_visibility_target_type_categories = isset($visibility_settings['op_visibility_target_type_categories']) ? $visibility_settings['op_visibility_target_type_categories'] : '';  // target_only_these = target_all_except

					$op_visibility_target_id_categories = isset($visibility_settings['op_visibility_target_id_categories']) ? $visibility_settings['op_visibility_target_id_categories'] :  array(); // IDs

					// Static
					$op_visibility_on_static = isset($visibility_settings['op_visibility_on_static']) ? $visibility_settings['op_visibility_on_static'] : 0; // static ON

					$op_visibility_target_type_static = isset($visibility_settings['op_visibility_target_type_static']) ? $visibility_settings['op_visibility_target_type_static'] : '';  // target_only_these = target_all_except

					$op_visibility_target_id_static = isset($visibility_settings['op_visibility_target_id_static']) ? $visibility_settings['op_visibility_target_id_static'] :  array(); // IDs

					// Specific query
					$op_visibility_on_queries = isset($visibility_settings['op_visibility_on_queries']) ? $visibility_settings['op_visibility_on_queries'] : 0; // query ON
					$op_override_basic_settings = isset($visibility_settings['op_override_basic_settings']) ? $visibility_settings['op_override_basic_settings'] : 0;  // ON/Off

					// Refferal source
					$op_visibility_on_source = isset($visibility_settings['op_visibility_on_source']) ? $visibility_settings['op_visibility_on_source'] : 0; // source ON

					// Browser
					$op_visibility_on_browser = isset($visibility_settings['op_visibility_on_browser']) ? $visibility_settings['op_visibility_on_browser'] : 0; // browser ON

					$op_visibility_on_inline_post = isset($visibility_settings['op_visibility_on_inline_post']) ? $visibility_settings['op_visibility_on_inline_post'] : 0; 

					$embed_placement_in_content = isset($visibility_settings['embed_placement_in_content']) ? $visibility_settings['embed_placement_in_content'] : '';

					$op_visibility_on_embed_shortcode = isset($visibility_settings['op_visibility_on_embed_shortcode']) ? $visibility_settings['op_visibility_on_embed_shortcode'] : 0; 

					$optinable_device_visibility = isset($visibility_settings['optinable_device_visibility']) ? $visibility_settings['optinable_device_visibility'] : ''; // optinable_mobile_hide = optinable_desktop_hide

					// if embeds, and enabled for inline
					if($embed == 1 && $op_visibility_on_inline_post == 0) continue;
					else if($embed == 2 && $op_visibility_on_embed_shortcode == 0) continue;

					if($optin_global_visibility == 0)
						$optinableCampaign = false;

					if(is_single()) // if single post 
					{
						$post_ID = get_the_ID();
						
						if( $op_visibility_on_categories == 1 ){ // include/exclude posts based on categories 

							$categories = get_the_category();
							$category_array = array();

							foreach ($categories as $category) {

							    $category_array[] = $category->cat_ID;
							}

							// print_r($category_array);
							if( $op_visibility_target_type_categories == "target_all_except")
							{
								$found = $this->findArrayInArray($category_array, $op_visibility_target_id_categories);

								if(isset($op_visibility_target_id_categories) && $found) {

									$optinableCampaign = false;
								}
								else
									$optinableCampaign = true;
							}
							else if( $op_visibility_target_type_categories == "target_only_these" ){

								if(isset($op_visibility_target_id_categories)) {
									
									$optinableCampaign = $this->findArrayInArray($category_array, $op_visibility_target_id_categories);
								}
								else
									$optinableCampaign = false;
							}
							else
								$optinableCampaign = true;
						}

						if( ($op_visibility_on_posts == 1 && $op_visibility_on_categories == 0) || ($op_visibility_on_posts == 1 && $op_visibility_on_categories == 1 && $optinableCampaign) )  // it passed the category 
						{
							//print_r($op_visibility_target_id_posts);// $post_ID;
							if( $op_visibility_target_type_post == "target_all_except" )
							{
								if(isset($op_visibility_target_id_posts) && in_array($post_ID, $op_visibility_target_id_posts))
								{
									$optinableCampaign = false;
								}
								else
									$optinableCampaign = true;
							}
							else if( $op_visibility_target_type_post == "target_only_these" ){

								if(isset($op_visibility_target_id_posts) && in_array($post_ID, $op_visibility_target_id_posts))
								{
									$optinableCampaign = true;
								}
								else
									$optinableCampaign = false;
							}
							else
								$optinableCampaign = true;
						}

						// ?campaign=1
						if( $op_visibility_on_queries == 1 )	// query option is enabled, 
						{
							$optinableCampaign = $this->findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}

						// source = referrer - google 
						if( $op_visibility_on_source == 1 )	// reff option is enabled, 
						{
							$optinableCampaign = $this->findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}
						
					}//
					else if(is_singular()){// // is_page for page, if single post, page, attachment etc. embed post type. the_content()

						if (get_post_type() === 'page') { //$op_visibility_on_pages == 1 && 

							$post_ID = get_the_ID();

							if($op_visibility_on_pages == 1)
							{
							    if( $op_visibility_target_type_page == "target_all_except" )
								{

									if(isset($op_visibility_target_id_page) && in_array($post_ID, $op_visibility_target_id_page))
									{
										$optinableCampaign = false;
									}
									else
										$optinableCampaign = true;
								}
								else if( $op_visibility_target_type_page == "target_only_these" ){

									if(isset($op_visibility_target_id_page) && in_array($post_ID, $op_visibility_target_id_page))
									{
										$optinableCampaign = true;
									}
									else
										$optinableCampaign = false;
								}
								else
									$optinableCampaign = true;
							}

							// ?campaign=1
							if( $op_visibility_on_queries == 1 )// query option is enabled, 
							{
								$optinableCampaign = $this->findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
							}

							// source = referrer - google 
							if( $op_visibility_on_source == 1 )// reff option is enabled, 
							{
								$optinableCampaign = $this->findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
							}
						}
						else {

							$pageID = get_option('page_on_front'); 
						}
					}
					else if ( is_front_page() && is_home() ) { //  homepage
								
						if( $op_visibility_on_static == 1 ){ // include/exclude posts based on static 

							$optinableCampaign = $this->staticPageVisibility( $op_visibility_target_type_static, $op_visibility_target_id_static, 1 );
						}

						// ?campaign=1
						if( $op_visibility_on_queries == 1 ) // query option is enabled, 
						{
							$optinableCampaign = $this->findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}

						// source = referrer - google 
						if( $op_visibility_on_source == 1 ) // reff option is enabled, 
						{
							$optinableCampaign = $this->findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}

						// browser = chrome .. 
						if( $op_visibility_on_browser == 1 ) // browser option is enabled, 
						{
						}
					}
					elseif ( is_front_page()){ // Static homepage
						
						if( $op_visibility_on_static == 1 ){ // include/exclude posts based on static 

							$optinableCampaign = $this->staticPageVisibility( $op_visibility_target_type_static, $op_visibility_target_id_static, 1);
						}

						// ?campaign=1
						if( $op_visibility_on_queries == 1 )// query option is enabled, 
						{
							$optinableCampaign = $this->findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}

						// source = referrer - google 
						if( $op_visibility_on_source == 1 )// reff option is enabled, 
						{
							$optinableCampaign = $this->findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}
					}
					elseif(is_404()){

						if( $op_visibility_on_static == 1 ){ // include/exclude posts based on static 

							$optinableCampaign = $this->staticPageVisibility( $op_visibility_target_type_static, $op_visibility_target_id_static, 2);
						}

						// ?campaign=1
						if( $op_visibility_on_queries == 1 )// query option is enabled, 
						{
							$optinableCampaign = $this->findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}

						// source = referrer - google 
						if( $op_visibility_on_source == 1 )// reff option is enabled, 
						{
							$optinableCampaign = $this->findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}
					}
					elseif(is_search()){

						if( $op_visibility_on_static == 1 ){ // include/exclude posts based on static 

							$optinableCampaign = $this->staticPageVisibility( $op_visibility_target_type_static, $op_visibility_target_id_static, 3);
						}

						// ?campaign=1
						if( $op_visibility_on_queries == 1 )// query option is enabled, 
						{
							$optinableCampaign = $this->findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}

						// source = referrer - google 
						if( $op_visibility_on_source == 1 )// reff option is enabled, 
						{
							$optinableCampaign = $this->findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign );//
						}
					}
					elseif ( is_home()){ // Blog page

					}
					else if ($op_visibility_on_pages == 1 && get_post_type() === 'page') { // pages

					}
					else {

						$pageID = get_option('page_on_front'); 
					}
				}

				if(!$optinableCampaign) continue;

				$jsoutput .= '{
								"settings": {';

				$table = "{$wpdb->prefix}".OPTINABLE_DB_TABLE_INITIAL."_campaign_meta";

				$meta_value = $wpdb->get_var(
										    $wpdb->prepare(
										        "SELECT meta_value FROM $table 
										        WHERE campaign_id = %s AND meta_key = %s",
										        $p->campaign_id,
										        'activation'
										    )
										);
				if($meta_value)
				{
					$meta_value = unserialize($meta_value);
					$triggers = $meta_value['triggers'];
					
					if (is_array($triggers) && sizeof($triggers) > 0) {
						$array_string = "'" . implode ( "', '", $triggers ) . "'";
						$jsoutput .= ' "triggers": ['.$array_string.'],';
					}

					foreach ( $meta_value as $key => $value )
					{
						if($key == "triggers")continue;

						$jsoutput .= ' "'.$key.'": "'.$value.'",';

						if($key == "op_on_bgclick_close")
						{
							if( $value == 1)$op_on_bgclick_close = 'true'; else $op_on_bgclick_close = 'false';
						}
					}
				}
				
				$OPZHash = wp_hash($p->campaign_id, OPTINABLE_HASH_STRING);

				if($p->campaign_type == "lightbox")
					$output .= 	$this->lightboxHead($OPZHash, $p->campaign_id, $op_on_bgclick_close, $optinable_device_visibility);
				else if($p->campaign_type == "slidein")
					$output .= 	$this->slideInHead($OPZHash, $p->campaign_id);

				$campaign_content = $this->replace_text_wps('draggable="true"', "", $p->campaign_content);
				$campaign_content = $this->replace_text_wps("{{optinable_nonce_field}}", wp_create_nonce( 'optinable_form_email_'.$p->campaign_id ), $campaign_content);
				$output .= $this->replace_text_wps("{{powerby}}", $this->powerbyTag(), $campaign_content);

				// $plugin_url = plugins_url();
				// $output .= $this->replace_text_wps("{{op_plugin_media_url}}", $plugin_url, $output);
				
				// check if powerby label is enabled by user for this popup
				if($p->campaign_type == "lightbox"){

						$output .= '</div>';
					$output .= '</div>';
				}

				$campFonts = optinable_get_custom_table_meta("optinable_campaign_meta", $p->campaign_id, "fonts");

				if ($campFonts) {
				    $campFonts = unserialize($campFonts);

				    if (is_array($campFonts) && sizeof($campFonts) > 0) {
				        if (sizeof($campFonts) > 1) {
				            $campFontsArr .= implode('|', $campFonts);
				        } else {
				            $campFontsArr .= $campFonts[0] . '|';
				        }
				    }
				}
				
				$jsoutput .= ' 
							},
							"op_campaign_id": "'.$p->campaign_id.'",
							"op_encrypted_id": "'.$OPZHash.'",
							"optinable_device_visibility": "'.$optinable_device_visibility.'",
							"op_campaign_name": "'.$p->campaign_name.'",	
							"op_campaign_type": "'.$p->campaign_type.'",	
							"active": "1",	
							"op_campaign_mode": "optin"
						},';

				if($p->campaign_type == "embed")
					array_push($embedOut['campaign_ids'], $p->campaign_id);

			endforeach;
			
			if(isset($campFontsArr)){

				$camp_fonts_arr = isset($campFontsArr) ? $campFontsArr : '|';

				wp_localize_script($this->plugin_name, 'optinable_vars_fonts', array(
		            'campFonts' => $campFontsArr,
		        ));

		        $inline_script = "
		            jQuery(document).ready(function () {
		                if (optinable_vars_fonts.campFonts !== '|' && optinable_vars_fonts.campFonts !== undefined) {
		                    var fontLink = document.createElement('link');
		                    fontLink.href = 'https://fonts.googleapis.com/css?family=' + optinable_vars_fonts.campFonts;
		                    fontLink.rel = 'stylesheet';
		                    fontLink.type = 'text/css';
		                    document.head.appendChild(fontLink);
		                }
		            });
		        ";

        		wp_add_inline_script($this->plugin_name , $inline_script);
	        }

			// return html if embeds. 
			if($embed == 1 || $embed == 2)
			{
				$embedOut['output'] = $output; // here
				$embedOut['placement'] = $embed_placement_in_content;

				return $embedOut;
			}

			$jsoutput .= ']'; 
			
			wp_reset_postdata();
		}

		wp_localize_script($this->plugin_name, 'optinable_vars_data_array', array(
		            'Optinables' => $jsoutput,
		        ));
		
		return $output;
	}

	function findBrowserInArray( $op_visibility_target_type_browser, $op_visibility_target_id_browser, $browser_id, $optinableCampaign){
		// print_r($refferalPropArr);
		if( $op_visibility_target_type_browser == "target_all_except")
		{
			// echo ' <br>target_all_except browser';
			if(isset($op_visibility_target_id_browser) && !empty($op_visibility_target_id_browser) && in_array($browser_id, $op_visibility_target_id_browser)){
				
				$optinableCampaign = false;
			}
			else if($op_override_basic_settings == 1)// override
			{
				$optinableCampaign = true;
			}
		}
		else if( $op_visibility_target_type_browser == "target_only_these" ){

			// echo ' <br>target_only_these browser';
			if(isset($op_visibility_target_id_browser) && !empty($op_visibility_target_id_browser) && in_array(1, $op_visibility_target_id_browser)){

				$optinableCampaign = true;
			}
			else
				$optinableCampaign = false;
		}

		return $optinableCampaign;
	}

	function findSourceInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign ){

		$refferalPropArr = $visibility_settings['refferalPropArr']; // refferalPropArr json

		$referring_url = esc_url( $_SERVER['HTTP_REFERER'] );
		
		if(isset($referring_url) && !empty($refferalPropArr))
		{
			//echo $referring_url;
			foreach($refferalPropArr as $data)
			{	
				if(substr($referring_url, 0 - strlen($data["key"])) == $data["key"]) {
					
					// echo $data["key"]; echo $op_override_basic_settings;
					if($data["action"] == "hide" && $optinableCampaign == true){
						// echo "false";
						$optinableCampaign = false;
					}
					else if($data["action"] == "show" && $optinableCampaign == false && $op_override_basic_settings == 1){
						// echo "true";
						$optinableCampaign = true;
					}
				}
			}
		}

		return $optinableCampaign;
	}

	function findQueryInArray( $visibility_settings, $op_override_basic_settings, $optinableCampaign ){

		$url = sanitize_text_field( $_SERVER['REQUEST_URI'] );
		$query_string = parse_url($url, PHP_URL_QUERY);

		if ($query_string !== null) {
			parse_str($query_string, $params);
			// Now you can use the $params array as needed
		}

		$queryPropArr = $visibility_settings['queryPropArr']; // queries json

		if(!empty($params) && !empty($queryPropArr))// query string is available as well as in settings
		{
			foreach($queryPropArr as $data)
			{
				if(array_key_exists($data["key"], $params) && $data["value"] === $params[$data["key"]]){
					//echo $params[$data["key"]];

					if($data["action"] == "hide" && $optinableCampaign == true){
						//echo "false";
						$optinableCampaign = false;
					}
					else if($data["action"] == "show" && $optinableCampaign == false && $op_override_basic_settings == 1){
						//echo "true";
						$optinableCampaign = true;
					}
				}
			}

			return $optinableCampaign;

			if(!empty($hideCampArr) && $optinableCampaign == true){ // if its visible, check if query has hide query
			}

			if(!empty($showCampArr) && $optinableCampaign == false){ // if its hidden, check if query has show query
			}
		}
		else
			return $optinableCampaign;
	}

	function staticPageVisibility( $op_visibility_target_type_static, $op_visibility_target_id_static, $static_id ){

		if( $op_visibility_target_type_static == "target_all_except")
		{
			if(isset($op_visibility_target_id_static) && !empty($op_visibility_target_id_static) && in_array($static_id, $op_visibility_target_id_static)){

				$optinableCampaign = false;
			}
			else
				$optinableCampaign = true;
		}
		else if( $op_visibility_target_type_static == "target_only_these" ){

			if(isset($op_visibility_target_id_static) && !empty($op_visibility_target_id_static) && in_array(1, $op_visibility_target_id_static)){

				$optinableCampaign = true;
			}
			else
				$optinableCampaign = false;
		}

		return $optinableCampaign;
	}

	function findArrayInArray($array1, $array2){

		$return = false;

		if(is_array($array2)){
			
			foreach($array1 as $value) {
				
			    if(in_array($value, $array2)) {
			    	$return = true;
			    }
			}
		}
		
		return $return;
	}
	
	function slideInHead($OPZHash, $campaign_id){
		return '';
	}

	function lightboxHead($OPZHash, $campaign_id, $op_on_bgclick_close, $optinable_device_visibility = '') {

	    return '<div class="">
	                <div class="optinable-wp optinable-lightbox--campaign '. esc_attr($optinable_device_visibility) . ' remodal" data-remodal-id="' . esc_attr($campaign_id) . '" role="dialog" data-optinable-model-attrib="' . esc_attr($campaign_id) . '" data-remodal-options="hashTracking: false, closeOnOutsideClick:' . esc_attr($op_on_bgclick_close) . ', closeOnEscape: false">';
	}

	function replace_text_wps($find, $replace, $text){
		// OR 
		$text = str_replace($find, $replace, $text);
		return $text;
	}

	function embed_campaign_shortcode($atts) {

		extract( shortcode_atts( array(
            'id' => '',
        ), $atts ) );

		$this->popups = new Optinable_Popups( $this->plugin_name, $this->version );

		$embed = $this->popups->init( 2, $id );

		if(!empty($embed))
		{
			$this->embed = $embed['output'];
			return $this->embed;
		}
	}

	function powerbyTag() {

	    $image_src =  OPTINABLE_PLUGIN_PATH . 'assets/img/logo/poweredbylogo.png';
	    return '<a href="http://optinable.com/" target="_blank"><img src="' . esc_url($image_src) . '"></a>';
	}
}
