<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="optinable_optin_display_rules_area_inner">

    <div class="optinable_steps_page_upper_head">
        <h2><?php esc_html_e( 'Campaign', 'optinable' );?> 
            <span class="op_remon_<?php echo esc_attr($campType)?>"><?php esc_html_e( 'Activation', 'optinable' );?></span>
            <span class="op_rem_on_<?php echo esc_attr($campType)?>"><?php esc_html_e( 'Placement', 'optinable' );?></span>
        </h2>
    </div>

    <div class="optinable-tabs _nooutline">

        <input checked="checked" class="optinable-tabs_input" id="tab-1" name="tabs" type="radio">

        <label class="optinable-tabs_label op_remon_<?php echo esc_attr($campType);?>" for="tab-1">
            <?php esc_html_e( 'Trigger Settings', 'optinable' );?> 
        </label>

        <div class="optinable-tabs_panel optinable_activation_step op_remon_<?php echo esc_attr($campType)?>">
            <h2><?php esc_html_e( 'Trigger Settings', 'optinable' );?> </h2>
            <p><?php esc_html_e( 'You must enable at least one trigger for your campaign to appear.', 'optinable' );?> </p>

            <div class="optinable_configuration_tabs t1 " data-tab-class="t1">
                <b><?php esc_html_e( 'Time', 'optinable' );?> </b>
                <p><?php esc_html_e( 'Show when the visitor has been on the page for more than X seconds.', 'optinable' );?> </p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>
                
                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_triggle_settings_toggle" value="time" data-op_rules_config="t1">
                </div>
            </div>
            <div class="optinable_configuration_tabs_panel t1">
                
                <label class="optinable_configuration_tabs_panel_label">
                    <h3 style="display:inline-block;"><?php esc_html_e( 'Show campaign after', 'optinable' );?>:</h3>
                    <input type="number" name="op_trigger_time_field" class="op_trigger_time_field" value="0" min="0"> 
                    <em class="__sec"><?php esc_html_e( 'seconds', 'optinable' );?></em>
                </label>
                <!-- <p>Leave the input empty or enter 0 if you want the pop-up appears as soon as the page finishes loading.</p>  -->
            </div>
            <div class="optinable_configuration_tabs t2 " data-tab-class="t2">
                <b><?php esc_html_e( 'Exit Intent', 'optinable' );?></b>
                
                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_triggle_settings_toggle" value="exit_intent" data-op_rules_config="t2">
                </div>
            </div>
            <!-- <div class="optinable_configuration_tabs_panel t2">
            </div> -->
            
            <div class="optinable_configuration_tabs t3 " data-tab-class="t3">
                <b>OptinLinks&#8482; [<?php esc_html_e( 'On-Click', 'optinable' );?>]</b>
                <p><?php esc_html_e( 'Copy the shortcode and paste to render a button to trigger the campaign.', 'optinable' );?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>

                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_triggle_settings_toggle" value="click" data-op_rules_config="t3">
                </div>
            </div>
            <div class="optinable_configuration_tabs_panel t3">
                <label class="optinable_configuration_tabs_panel_label">
                    <h3><?php esc_html_e( 'Shortcode', 'optinable' );?>:</h3>
                    <label class="op_trigger_shortcode_wrap ">
                        <input type="text" name="op_trigger_shortcode" 
                        readonly class="op_trigger_shortcode" 
                        value='<a href="javascript:;" class="optinable-optinlink-trigger" data-type="<?php echo esc_attr($campType);?>" data-optinable-id="<?php echo esc_attr($postID);?>"><?php esc_html_e( 'Click here', 'optinable' );?></a>' > 
                        <i class="fa-regular fa-copy op_copy_shortcode_js" id=""></i>
                    </label>
                </label>
            </div>
           
            <div class="optinable_configuration_tabs_panel t5">

            </div>
        </div>

        <input class="optinable-tabs_input" id="tab-2" name="tabs" type="radio">
        <label class="optinable-tabs_label op_remon_<?php echo esc_attr($campType);?>" for="tab-2">
            <?php esc_html_e( 'Closing Methods', 'optinable' );?>
        </label>

        <!--  closing methods -->
        <div class="optinable-tabs_panel op_remon_<?php echo esc_attr($campType);?>">
            <h2><?php esc_html_e( 'Closing Methods', 'optinable' );?></h2>
            <p><?php esc_html_e( 'Configure how you want the campaign to close.', 'optinable' );?></p>

            <div class="op_clobeh_row" >
                <div class="opable_toggle_box">
                    <input class="optinable_closingbehav_toggle" id="op_auto_hide" value="1" type="checkbox" data-op_rules_config="op_auto_hide"> 
                </div>
                <b><?php esc_html_e( 'Auto-Close pop-up', 'optinable' );?></b>
                <div class="optinable_closing_tabs_panel op_auto_hide">
                    <p><?php esc_html_e( 'Automatically close campaign after x seconds.', 'optinable' );?></p> 
                    <div style="position:relative; overflow: hidden;">
                        <p><?php esc_html_e( 'Close campaign after', 'optinable' );?>:</p>
                        <input type="number" name="op_auto_hide_time" class="op_auto_hide_time" value="0" min="0"> 
                        <em class="__sec"><?php esc_html_e( 'seconds', 'optinable' );?></em>
                    </div>
                    <!-- 
                        "op_auto_hide": "0",
                        "op_auto_hide_unit": "seconds",
                        "op_auto_hide_time": 5,
                     -->
                </div>
            </div>
            
            <div class="op_clobeh_row" >
                <div class="opable_toggle_box">
                    <input class="optinable_closingbehav_toggle" id="op_after_conversion_close" value="op_after_conversion_close" type="checkbox" data-op_rules_config="op_after_conversion_close">
                </div>
                <b><?php esc_html_e( 'Close pop-up after Optin conversion', 'optinable' );?></b>
                <div class="optinable_closing_tabs_panel op_after_conversion_close">
                    <p><?php esc_html_e( 'If user has submitted email then automatically close campaign after x seconds.', 'optinable' );?></p>
                    <div style="position:relative; overflow: hidden;">
                        <p><?php esc_html_e( 'Close campaign after', 'optinable' );?>:</p>
                        <input type="number" name="op_after_conversion_close_time" class="op_after_conversion_close_time" value="0" min="0"> 
                        <em class="__sec"><?php esc_html_e( 'seconds', 'optinable' );?></em>
                    </div>
                    <!-- op_after_conversion_close -->
                </div>
            </div>
            <div class="op_clobeh_row show_only_on_<?php echo esc_attr($campType);?>">
                <div class="opable_toggle_box">
                    <input class="optinable_closingbehav_toggle" id="op_on_bgclick_close" value="1" type="checkbox" data-op_rules_config="op_on_bgclick_close">
                </div>
                <b><?php esc_html_e( 'Close pop-up when visitor click outside', 'optinable' );?></b>
                <!-- op_on_bgclick_close -->
            </div>
        </div>

        <input class="optinable-tabs_input op_<?php echo esc_attr($campType);?>_trigger_checked" 
            id="tab-4" name="tabs" type="radio">
        <label class="optinable-tabs_label op_rem_on_<?php echo esc_attr($campType);?>" for="tab-4">
            <?php esc_html_e( 'Placement', 'optinable' );?>
        </label>
        <!-- Placement Embed -->
        <div class="optinable-tabs_panel op_rem_on_<?php echo esc_attr($campType);?>">
            <h3><?php esc_html_e( 'Embed Campaign', 'optinable' );?></h3>
            <p><?php esc_html_e( 'The placement of Embed campaign type is possible in two ways given below.', 'optinable' );?></p> 
            <div class="optinable_configuration_tabs t111" data-tab-class="t111">
                <b><?php esc_html_e( 'Inline/After Post', 'optinable' );?></b>
                <p><?php esc_html_e( 'Embed the campaign inside post or pages on different positions.', 'optinable' );?></p> 
                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="inline_post" data-op_rules_config="t111">
                </div>
            </div>
            <div class="optinable_configuration_tabs_panel t111">
                <br>
                <div style="display:block !important;">
                    <select class="optinable_embed_placement_rule" data-op_rules_config="t111">
                        <option value="">
                        </option>
                        <option value="top">
                            <?php esc_html_e( 'Embed on top of the post', 'optinable' );?>
                        </option>
                        <option value="middle">
                            <?php esc_html_e( 'Embed on middle of the post', 'optinable' );?>
                        </option>
                        <option value="bottom">
                            <?php esc_html_e( 'Embed on bottom of the post', 'optinable' );?>
                        </option>
                        <option value="both">
                            <?php esc_html_e( 'Embed on top and bottom of the post', 'optinable' );?>
                        </option>
                    </select>
                </div>
            </div>

            <div class="optinable_configuration_tabs t112" data-tab-class="t112">
                <b><?php esc_html_e( 'Embed', 'optinable' );?></b>
                <p><?php esc_html_e( 'Embed the campaign anywhere through shortcode.', 'optinable' );?></p> 
                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="embed_shortcode" data-op_rules_config="t112">
                </div>
            </div>

            <div class="optinable_configuration_tabs_panel t112">
                <br>
                <label class="">
                    <h3><?php esc_html_e( 'Shortcode', 'optinable' );?>:</h3>
                    <label class="op_trigger_shortcode_wrap">
                        <input type="text" name="op_trigger_shortcode" 
                        readonly class="op_trigger_shortcode" 
                        value='[optinable id="<?php echo esc_attr($postID);?>" type="embed"]' style="width: 300px !important;"> 
                        <i class="fa-regular fa-copy op_copy_shortcode_js" id=""></i>
                    </label>
                </label>
            </div>
        </div>

        <input class="optinable-tabs_input" id="tab-3" name="tabs" type="radio">
        <label class="optinable-tabs_label op_remon_<?php echo esc_attr($campType);?>" for="tab-3">
            <?php esc_html_e( 'Visibility Behavior', 'optinable' );?>
        </label>

        <!-- Visibility Behavior -->
        <div class="optinable-tabs_panel">
            <h3><?php esc_html_e( 'Visibility Behavior', 'optinable' );?></h3>
            <p>
                <?php esc_html_e( 'Configure the post visibility behavior once a campaign is closed or converted.', 'optinable' );?>
            </p>

            <div class="op_visi_beh_row op_remon_<?php echo esc_attr($campType);?>">
                <b> <?php esc_html_e( 'When closed by visitors or auto closed', 'optinable' );?></b>
                <div class="optinable_closing_tabs_panel" style="display:block !important;">
                    <label style="position:relative; overflow: hidden;">
                        <select class="optinable_visi_after_option" data-op_rules_config="op_after_close_visibility">
                            <option value="keep_showing">
                                <?php esc_html_e( 'Keep showing this campaign', 'optinable' );?> 
                            </option>
                            <option value="dont_show_on_site">
                                <?php esc_html_e( "Don't show this campaign again", 'optinable' );?>
                            </option>
                            <!-- <option value="dont_show_on_page">
                                <?php //esc_html_e( "Don't show this pop-up on this page/post", 'optinable' );?>
                            </option> -->
                        </select>
                        <div class="op_after_close_visibility_suboption __op_suboption">
                            <p><?php esc_html_e( 'Reset this after', 'optinable' );?></p>
                            <input type="number" name="op_after_close_visibility_expiration" class="op_after_close_visibility_expiration" value="0" min="0"> 
                            <em class="__sec"> <?php esc_html_e( 'days', 'optinable' );?></em>
                        </div>
                    </label>
                </div>
            </div>

            <div class="op_visi_beh_row">
                <b><?php esc_html_e( 'After a visitor is converted to subscriber (Opted-In)', 'optinable' );?></b>
                <div class="optinable_closing_tabs_panel" style="display:block !important;">
                    <label style="position:relative; overflow: hidden;">
                        <select class="optinable_visi_after_option" data-op_rules_config="op_after_optin_visibility">
                            <option value="keep_showing">
                                <?php esc_html_e( 'Keep showing this campaign', 'optinable' );?>
                            </option>
                            <option value="dont_show_on_site">
                                <?php esc_html_e( "Don't show this campaign again", 'optinable' );?>
                            </option>
                            <!-- <option value="dont_show_on_page">
                                <?php //esc_html_e( "Don't show this pop-up on this page/post", 'optinable' );?>
                            </option> -->
                        </select>
                        <div class="op_after_optin_visibility_suboption __op_suboption">
                            <p><?php esc_html_e( 'Reset this after', 'optinable' );?></p>
                            <input type="number" name="op_after_optin_visibility_expiration" class="op_after_optin_visibility_expiration" value="0" min="0"> 
                            <em class="__sec"> <?php esc_html_e( 'days', 'optinable' );?></em>
                        </div>
                    </label>
                </div>
            </div>
        </div><!-- Visibility Behavior -->

    </div><!-- optinable-tabs _nooutline -->

</div><!-- optinable_optin_display_rules_area_inner -->
