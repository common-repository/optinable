<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<div class="optinablewrapper">
 
    <div class="optinableadmin-head">
    	<div class="optinablelogo">
            <a href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable">
                <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH. "assets/img/logo/logo-16.png"); ?>">
            </a>
        </div>
    	<ul class="optinable-breadcrumbs">
        	<li class="">
                <a class="<?php echo esc_attr($opz_plugin_menu_db); ?>" href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable" style="">
                	<i class="fa-solid fa-house-chimney"></i> <span><?php esc_html_e( 'Dashboards', 'optinable' ); ?></span>
                </a>
            </li>
			<li class="">
            	<a class="<?php echo esc_attr($opz_plugin_menu_pp); ?>" href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-lightbox" style="">
                	<i class="fa fa-rocket" aria-hidden="true"></i> <span><?php esc_html_e( 'Popups', 'optinable' ); ?></span>
                </a>
            </li>
            <li class="">
                <a class="<?php echo esc_attr($opz_plugin_menu_stb); ?>" href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-stickybar" style="">
                    <i class="fa fa-rocket" aria-hidden="true"></i> <span><?php esc_html_e( 'Sticky-bars', 'optinable' ); ?></span>
                </a>
            </li>
            <li class="">
                <a class="<?php echo esc_attr($opz_plugin_menu_sldn); ?>" href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-slidein" style="">
                    <i class="fa fa-rocket" aria-hidden="true"></i> <span><?php esc_html_e( 'Slide-ins', 'optinable' ); ?></span>
                </a>
            </li>
            <li class="">
                <a class="<?php echo esc_attr($opz_plugin_menu_embd); ?>" href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-embed" style="">
                    <i class="fa fa-rocket" aria-hidden="true"></i> <span><?php esc_html_e( 'Embeds', 'optinable' ); ?></span>
                </a>
            </li>

            <span class="optinable-frm-tag type-contentlocker op_v_admin">
               v: <?php echo OPTINABLE_PLUGIN_VERSION;?>
            </span>
        </ul>
        <div class="opable_clear"></div>
    </div>
    
     
    