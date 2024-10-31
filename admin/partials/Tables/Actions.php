<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="pure-u-1-5">
     <div class="optinablecampaign-stats-row" style="padding: 8px 10px 10px 35px;">
        
        <a href="<?php echo esc_url( get_site_url() ) ?>/wp-admin/admin.php?page=optinable&mod=edit-campaign&type=<?php echo esc_attr( $row['campaign_type'] ) ?>&_pid=<?php echo esc_attr( $row['campaign_id'] ) ?>&_secure=<?php echo esc_attr( $OPZHash ) ?>#Design" class="pure-button optinable-admin-tbl-edit-btn" title="<?php esc_html_e( 'Edit Campaign', 'optinable' ); ?>">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <div style="display:inline-block; position: relative;">
            <a class="pure-button op_dashboad_list_menu_toggle" title="">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>
            <div class="op_dashboard_list_menus">
                <?php 
                $pub_disabled = 'javascript:;';
                $pub_disabled_css = 'op_pub_disabled_css';

                if($row['active'] == 1){
                    $published = "UnPublish";
                    $st_published = "Live";

                    $pub_action = 'unpublish';
                }
                else{ 
                    $published = "Publish";
                    $st_published = "UnPublished";

                    $pub_action = 'publish';
                }

                if($row['campaign_content']){

                    $pub_disabled = esc_url( get_site_url() ) . '/wp-admin/admin.php?page=optinable&mod=' . esc_attr( $pub_action ) . '-campaign&_pid=' . esc_attr( $row['campaign_id'] ) . '&type=' . esc_attr( $row['campaign_type'] );

                    $pub_disabled_css = ''; 
                }?>
                
                <a class="pure-button op_db_list_btn <?php echo esc_attr( $pub_disabled_css ); ?>" href="<?php echo esc_url( $pub_disabled ); ?>" title="">
                    <i class="fa-solid fa-wifi"></i>
                    <?php 
                    if($row['active'] == 1){
                        esc_html_e("UnPublish", 'optinable');
                    }
                    else{ 
                        esc_html_e("Publish", 'optinable');
                    }?>
                </a>
                <a href="<?php echo esc_url( get_site_url() );?>/wp-admin/admin.php?page=optinable-campaign-subscribers&campaign_id=<?php echo esc_attr( $row['campaign_id'] );?>&type=<?php echo esc_attr( $row['campaign_type'] );?>" class="pure-button op_db_list_btn" title="">
                    <i class="fa-solid fa-user-group"></i>
                    <?php esc_html_e( 'View Subscribers', 'optinable' ); ?>
                </a>
                <hr>
                <a href="<?php echo esc_url( get_site_url() );?>/wp-admin/admin.php?page=optinable&mod=reset-log&_pid=<?php echo esc_attr( $row['campaign_id'] ) ?>&type=<?php echo esc_attr( $row['campaign_type'] );?>" class="pure-button op_db_list_btn" title="">
                    <i class="fa-solid fa-arrow-rotate-right"></i>
                    <?php esc_html_e( 'Reset Analytics', 'optinable' );?>
                </a>

                <button type="button" class="pure-button op_db_list_btn opable-popup-trigger optinable_close_editmode" data-optinable_c_cancel="op_reset_cancel" data-optinable_c_id="<?php echo esc_attr($row['campaign_id']);?>" data-optinable_c_action="op_remove_subscribers" data-optinable_page_type="<?php echo esc_attr( $row['campaign_type'] );?>" data-optinable_alert_use="optinable_for_close_edit" data-optinable_alert_type="optin-able-close-edit" data-op_text="You are going to clear the subscribers of this campaign?" data-op_ok_text="Yes, Clear" data-op_no_text="No, Cancel"><i class="fa-solid fa-trash-arrow-up"></i> Purge Subscriber List</button>
                
                <?php 
                if($row['archived'] == 1){
                    $archived = "UnArchive";
                    $ac_archive = 'unarchive';
                }
                else{ 
                    $archived = "Archive";
                    $ac_archive = 'archive';
                }?>
                <a href="<?php echo esc_url( get_site_url() ) ?>/wp-admin/admin.php?page=optinable&mod=<?php echo esc_attr( $ac_archive ) ?>-campaign&_pid=<?php echo esc_attr( $row['campaign_id'] ) ?>&type=<?php echo esc_attr( $row['campaign_type'] ) ?>" class="pure-button op_db_list_btn" title="">
                    <i class="fa-regular fa-folder-open"></i>
                    <?php 
                    if($row['archived'] == 1){
                        esc_html_e( 'UnArchive', 'optinable' );
                    }
                    else{ 
                        esc_html_e( 'Archive', 'optinable' );
                    }?>
                </a>

                <button type="button" class="pure-button op_dashboard_del_btn opable-popup-trigger optinable_close_editmode" data-optinable_c_cancel="op_reset_cancel" data-optinable_c_id="<?php echo esc_attr( $row['campaign_id'] ) ?>" data-optinable_c_action="op_delete_campaign" data-optinable_page_type="<?php echo esc_attr( $row['campaign_type'] );?>" data-optinable_alert_use="optinable_for_close_edit" data-optinable_alert_type="optin-able-close-edit" data-op_text="<?php esc_html_e( 'You are going to delete this campaign?', 'optinable' ); ?>" data-op_ok_text="<?php esc_html_e( 'Yes, Clear', 'optinable' ); ?>" data-op_no_text="<?php esc_html_e( 'No, Cancel', 'optinable' ); ?>" style="width: 100%;">
                    <i class="fa-solid fa-trash-arrow-up"></i> 
                    <?php esc_html_e( 'Delete', 'optinable' ); ?>
                </button>
            </div>
        </div>

        <span class="op_campaign_online <?php echo esc_attr($published)?>" title="<?php 
        if($row['active'] == 1){
            esc_html_e("Live", 'optinable' );
        }
        else{ 
            esc_html_e("UnPublished", 'optinable' );
        }?>">  
            <span class="op_tooltip top opz_info_tip" data-tip="<?php 

        if($row['active'] == 1){
            esc_html_e("Campaign is Live", 'optinable' );
        }
        else{ 
            
            esc_html_e("Campaign is UnPublished", 'optinable' );
        }?>">
                <i class="fa-solid fa-wifi"></i>
            </span>
        </span>
    </div>
</div>