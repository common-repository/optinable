<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<?php require_once( 'optinable-admin-head.php' ); ?>    

<div class="optinablebody">  
    <div class="optinablecampaigns-wrap">
        <div class="pure-g">
            <div class="pure-u-3-4">
                <?php if(isset($success_message)){?>
                    <div class="op_alert_db_success" style="display:none;">
                        <strong><?php esc_html_e( 'Success', 'optinable' );?>:</strong>
                        <p><?php echo esc_html($success_message)?></p>
                    </div>
                    <?php
                }?>
                <?php if(isset($error_message)){?>
                    <div class="op_alert_db_error" style="display:none;">
                        <strong><?php esc_html_e( 'Error', 'optinable' );?>:</strong>
                        <p><?php echo esc_html($error_message)?></p>
                    </div>
                    <?php
                }?>
                <div class="op_dashboard_cards op_setting_page_form">
                    <form id="op_form_settings_page" method="post">
                        <div class="op_inner_card">
                            <h2><?php esc_html_e( 'Settings', 'optinable' );?></h2>
                            <!-- <p>Manage your plugin settings.</p> -->
                            <h3><?php esc_html_e( 'Remove data upon Uninstall?', 'optinable' );?></h3>
                            <label>
                                <span><?php esc_html_e( 'Yes, Remove', 'optinable' );?> </span> 
                                <input type="checkbox" style="" name="op_remove_data_uninstall" class="optinable_setting_page_chkbx" <?php echo esc_attr( $optinable_remove_data_uninstall );?>>
                                <div class="op_setting_page_div"><?php esc_html_e( 'Check this checkbox if you want OptinAble plugin to delete all of its data (campaigns, submissions, user data) when uninstall. We suggest to keep it unchecked though.', 'optinable' );?></div>
                            </label>

                            <br clear="all">
                            
                            <h3><?php esc_html_e( 'Allow usage tracking', 'optinable' );?></h3>
                            <label>
                                <span><?php esc_html_e( 'Allow', 'optinable' );?> </span> 
                                <input type="checkbox" name="op_data_sharing" class="optinable_setting_page_chkbx" <?php echo esc_attr( $optinable_data_sharing );?>>
                                [<?php esc_html_e( 'Recommended', 'optinable' );?>]
                                <div class="op_setting_page_div"><?php esc_html_e( "Help us make OptinAble even better by allowing us to collect anonymous usage statistics (PHP version, active plugin's names) from your site. It's completely optional and non-personal data, but it would help us better understand how our plugin is being used in the real world.", 'optinable' );?></div>
                            </label>

                            <br clear="all">

                            <h3><?php esc_html_e( 'Disable Tracking', 'optinable' );?></h3>
                            <label>
                                <span><?php esc_html_e( 'Disable', 'optinable' );?> </span> 
                                <input type="checkbox" name="op_disable_tracking" class="optinable_setting_page_chkbx" <?php echo esc_attr( $optinable_disable_tracking );?>>
                               
                                <div class="op_setting_page_div"><?php esc_html_e( 'The plugin tracks popup impressions and clicks to provide insights about visitors and how well your campaign is performaing. Disabling the tracking will stop analytics.', 'optinable' );?></div>
                            </label>

                            <br clear="all"><hr class="solid"><br clear="all">

                            <h3><?php esc_html_e( 'Reset Plugin', 'optinable' );?></h3>
                            <div style="float: left; width: 55%; padding: 5px 14px;">
                                <button type="button" class="opable-popup-trigger optinable_close_editmode" data-optinable_c_cancel="op_reset_cancel" data-optinable_c_action="op_reset_plugin" data-optinable_alert_use="optinable_for_close_edit" data-optinable_alert_type="optin-able-close-edit" data-op_text="<?php esc_html_e( 'Are you sure you want to reset the plugin? This will delete all your campaigns and user submissions.', 'optinable' );?>" data-op_ok_text="<?php esc_html_e( 'Yes, Reset', 'optinable' );?>" data-op_no_text="<?php esc_html_e( 'No, Cancel', 'optinable' );?>">
                                    <?php esc_html_e( 'Reset', 'optinable' );?>
                                    
                                </button>

                                <div class="op_setting_page_div" style="padding:5px 0 0"><?php esc_html_e( 'Click the reset button to wipe all data and reset settings. It will clear all the submissions, user data and campaigns in case you want a fresh start.', 'optinable' );?>
                                </div>
                            </div>

                            <br clear="all"><br clear="all">
                            <hr class="solid"><br clear="all">

                            <?php wp_nonce_field('optinable_setting_page')?>

                            <div align="right">
                                <input type="hidden" name="action" value="optinable_save_settings">
                                <button class="op_setting_save_btn _opz_has_loader" >
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    <?php esc_html_e( 'Save  Settings', 'optinable' );?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- op_dashboard_cards -->
            </div>
            <?php include_once( 'optinable-admin-sidebar.php' ); ?>
        </div>
    </div>
    <?php include_once( 'placeholders/CampaignCreate.php' ); ?>
</div>
<?php include_once( 'optinable-admin-foot.php' ); ?>

<div id="optinable_admin_loader_wrap" style="display:block;">
    <div class="op_loader_admin"></div>
</div>