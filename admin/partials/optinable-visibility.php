<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="optinable_optin_display_rules_area_inner">

    <div class="optinable_steps_page_upper_head" style="position: relative;padding: 40px 30px 10px;">
        <h2><?php esc_html_e( 'Campaign Visibility', 'optinable' ); ?></h2>
        <br>
        <div class="op_visib_settings_alert">
            <div class="targeted_visi">
               <div class="div"><i class="fa fa-exclamation"></i> </div>
               <p>
                    <b><?php esc_html_e( 'Targeted Visibility', 'optinable' ); ?>:</b>
                    <?php esc_html_e( 'The campaign will only be visible in certain areas of the website based on the visibility settings chosen/enabled below.', 'optinable' ); ?></p>
            </div>
            <div class="global_visi" style="">
               <div class="div"><i class="fa fa-check"></i> </div>
                <p>
                    <b><?php esc_html_e( 'Global Visibility', 'optinable' ); ?>:</b>
                    <?php esc_html_e( 'The campaign will be displayed on the entire website and the visibility settings below will also be applied if enabled.', 'optinable' ); ?></p>
            </div>
        </div>

        <div class="optinable-radio-active">
            <input class="tgl tgl-flat optinable_global_visibility_toggle" id="cb4" type="checkbox" checked />
            <span class="op_restricted_visi op_tooltip left opz_info_tip" data-tip="<?php esc_html_e( 'Targeted Visibility: The campaign will only be visible in certain areas of the website based on the visibility settings chosen below.', 'optinable' );?>">
                <i class="fa fa-info-circle"></i>
                <?php esc_html_e( 'Targeted Visibility', 'optinable' ); ?> 
            </span>
            <span class="op_full_visi op_tooltip left opz_info_tip" data-tip="<?php esc_html_e( 'Global Visibility: The campaign will be displayed on the entire website and the visibility settings below will also be applied.', 'optinable' );?>">
                <i class="fa fa-info-circle "></i>
                <?php esc_html_e( 'Global Visibility', 'optinable' ); ?> 
            </span>
            <label class="tgl-btn" for="cb4"></label>  
        </div>
    </div>

    <div class="optinable-tabs _nooutline">

        <div class="optinable-tabs_panel optinable_visibility_step" style="display:block;min-height: 250px;">

            <h3><?php esc_html_e( 'Basic Settings', 'optinable' ); ?></h3>
            
            <!-- Posts -->
            <div class="optinable_configuration_tabs t1_2" data-tab-class="t1_2">
                <b><?php esc_html_e( 'Posts', 'optinable' ); ?></b>
                <p><?php esc_html_e( 'Show on all or specific posts.', 'optinable' ); ?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>
                
                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="posts" data-op_rules_config="t1_2">
                </div>
            </div>

            <div class="optinable_configuration_tabs_panel t1_2">
                <div class="optinable_configuration_tabs_panel_label">
                    <div class="optinable-radio-group posts">
                        <input type="radio" id="option-post1" name="post" value="target_all_except" checked>
                        <label for="option-post1"><?php esc_html_e( 'Target all posts except', 'optinable' ); ?>
                        </label>
                        <input type="radio" id="option-post2" name="post" value="target_only_these">
                        <label for="option-post2"><?php esc_html_e( 'Target only these posts', 'optinable' ); ?>
                        </label>
                    </div>
                    <br clear="all">
                    <select class="optinable-data-list-ajax" multiple placeholder="Search post here" data-select-type="post">
                    </select>
                </div>
            </div>

            <!-- Pages  -->
            <div class="optinable_configuration_tabs t2_2" data-tab-class="t2_2">
                <b><?php esc_html_e( 'Pages', 'optinable' ); ?></b>
                <p><?php esc_html_e( 'Show on all or specific pages.', 'optinable' ); ?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>

                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="pages" data-op_rules_config="t2_2">
                </div>
            </div>
            <div class="optinable_configuration_tabs_panel t2_2">
                <div class="optinable_configuration_tabs_panel_label">
                    <div class="optinable-radio-group pages">
                        <input type="radio" id="option-page1" name="page" value="target_all_except" checked>
                        <label for="option-page1"><?php esc_html_e( 'Target all pages except', 'optinable' ); ?>
                        </label>
                        <input type="radio" id="option-page2" name="page" value="target_only_these">
                        <label for="option-page2"><?php esc_html_e( 'Target only these pages', 'optinable' ); ?>
                        </label>
                    </div>
                    <br clear="all">
                    <select class="optinable-data-list-ajax" multiple placeholder="Search page here" data-select-type="page">
                    </select>
                </div>
            </div>

            <!-- Static Pages  -->
            <div class="optinable_configuration_tabs t12_2 op_remon_<?php echo esc_attr($campType)?>" data-tab-class="t12_2">
                <b><?php esc_html_e( 'Static Pages', 'optinable' ); ?></b>
                <p><?php esc_html_e( 'Show on all or specific static pages.', 'optinable' ); ?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>
                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="static" data-op_rules_config="t12_2">
                </div>
            </div>
            <div class="optinable_configuration_tabs_panel t12_2 op_remon_<?php echo esc_attr($campType)?>">
                <div class="optinable_configuration_tabs_panel_label">
                    <div class="optinable-radio-group static">
                        <input type="radio" id="option-page11" name="static" value="target_all_except" checked>
                        <label for="option-page11"><?php esc_html_e( 'Target all static pages except', 'optinable' ); ?></label>
                        <input type="radio" id="option-page12" name="static" value="target_only_these">
                        <label for="option-page12"><?php esc_html_e( 'Target only these static pages', 'optinable' ); ?></label>
                    </div>
                    <br clear="all">
                    <select class="optinable-data-list-ajax" multiple placeholder="<?php esc_html_e( 'Search page here', 'optinable' ); ?>" data-select-type="static">
                    </select>
                </div>
            </div>

            <!-- Categories  -->
            <div class="optinable_configuration_tabs t3_2 " data-tab-class="t3_2">
                <b><?php esc_html_e( 'Categories', 'optinable' ); ?></b>
                <p><?php esc_html_e( 'Show on all or specific categories.', 'optinable' ); ?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>

                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="categories" data-op_rules_config="t3_2">
                </div>
            </div>

            <div class="optinable_configuration_tabs_panel t3_2">
                <div class="optinable_configuration_tabs_panel_label">
                    <div class="optinable-radio-group categories">
                        <input type="radio" id="option-categories1" name="categories" value="target_all_except" checked>
                        <label for="option-categories1"><?php esc_html_e( 'Target all categories except', 'optinable' ); ?></label>
                        <input type="radio" id="option-categories2" name="categories" value="target_only_these">
                        <label for="option-categories2"><?php esc_html_e( 'Target only these categories', 'optinable' ); ?></label>
                    </div>
                    <br clear="all">
                    <select class="optinable-data-list-ajax" multiple placeholder="Search categories here" data-select-type="categories">
                    </select>
                </div>
            </div>
        </div>

        <div class="optinable-tabs_panel optinable_visibility_step" style="display:block;min-height: 280px;">
            <div class="optinable-radio-active" style="top:20px">
                <input class="tgl tgl-flat optinable_advanced_visi_override" value="override" id="cb12" type="checkbox"  />
                <span class=" op_tooltip left opz_info_tip" data-tip="<?php esc_html_e( "When 'Override Basic Settings' is enabled, then advanced settings will override the basic settings. ", 'optinable' );?>">
                    <i class="fa fa-info-circle"></i>
                    <?php esc_html_e( 'Override Basic Settings', 'optinable' ); ?>
                </span>
                <label class="tgl-btn" for="cb12"></label>  
            </div> 

            <h3><?php esc_html_e( 'Advanced Settings', 'optinable' ); ?></h3>
            <!-- <p>The advanced settings will override the Basic Settings. </p> -->

            <!-- Specific Query  -->
            <div class="optinable_configuration_tabs t5_3" data-tab-class="t5_3">
                <b><?php esc_html_e( 'Specific Query', 'optinable' ); ?></b>
                <p><?php esc_html_e( 'Show or hide this campaign on URLs with specific queries.', 'optinable' ); ?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>

                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="queries" data-op_rules_config="t5_3">
                </div>
            </div>
            <div class="optinable_configuration_tabs_panel t5_3">

                <div class="optinable_configuration_tabs_panel_label">

                    <div class="op_query_option_block_wrap_show" style="margin-bottom:10px;">
                        <span class="op_query_option_block_wrap_heading"><?php esc_html_e( 'the URL contains following queries', 'optinable' ); ?>:</span>
                        <div class="op_query_option_block_wrap_append">

                        </div>
                    </div>
                    <div class="op_query_option_block_wrap_hide">
                        <span class="op_query_option_block_wrap_heading"><?php esc_html_e( 'the URL contains following queries', 'optinable' ); ?>:</span>
                        <div class="op_query_option_block_wrap_append">

                        </div>
                    </div>
                    
                    <br clear="all">
                    <h3 style="display:inline-block;"><?php esc_html_e( 'The campaign should', 'optinable' ); ?></h3>
                    <select class="optinable_visi_query_setting op_visi_show_hide_select" data-op_rules_config="">
                        <option value="show">
                            <?php esc_html_e( 'Show', 'optinable' ); ?>
                        </option>
                        <option value="hide">
                            <?php esc_html_e( 'Hide', 'optinable' ); ?>
                        </option>
                    </select>
                    <h3 style="display:inline-block;"><?php esc_html_e( 'if URL has following query', 'optinable' ); ?></h3>
                </div>

                <label class="optinable_configuration_tabs_panel_label" style="padding: 10px 20px 20px;">
                    <input type="input" name="op_query_key" class="op_visi_q_field op_query_key" value="" 
                        placeholder="<?php esc_html_e( 'Set query key', 'optinable' ); ?>"> 
                    <span style="display: inline-block;"> <?php esc_html_e( 'matches', 'optinable' ); ?></span>
                    <input type="input" name="op_query_value" class="op_visi_q_field op_query_value" value="" 
                        placeholder="<?php esc_html_e( 'Set query value', 'optinable' ); ?>"> 
                    <button type="button" class="op_visi_query_add op_add_btn_visi">
                        <?php esc_html_e( 'Add', 'optinable' ); ?>
                    </button>
                </label>
            </div>

            <!-- Referral  -->
            <div class="optinable_configuration_tabs t4_3 " data-tab-class="t4_3">
                <b><?php esc_html_e( 'Referral / Source', 'optinable' ); ?></b>
                <p><?php esc_html_e( 'Show or hide this campaign from visitors coming from any of the specific source.', 'optinable' ); ?></p> 
                <i class="fa-solid fa-chevron-down"></i>
                <i class="fa-solid fa-chevron-up"></i>

                <div class="opable_toggle_box">
                    <input type="checkbox" class="optinable_visibility_settings_toggle" value="source" data-op_rules_config="t4_3">
                </div>
            </div>

            <div class="optinable_configuration_tabs_panel t4_3">

                <div class="optinable_configuration_tabs_panel_label">
                    <div class="op_query_option_block_wrap_reff_show" style="margin-bottom:10px;">
                        <span class="op_query_option_block_wrap_heading"><?php esc_html_e( 'the URL contains following queries', 'optinable' ); ?>:</span>
                        <div class="op_query_option_block_wrap_append_reff">
                        </div>
                    </div>
                    <div class="op_query_option_block_wrap_reff_hide">
                        <span class="op_query_option_block_wrap_heading"><?php esc_html_e( 'the URL contains following queries', 'optinable' ); ?>:</span>
                        <div class="op_query_option_block_wrap_append_reff">
                        </div>
                    </div>
                    <br clear="all">
                    <h3 style="display:inline-block;"><?php esc_html_e( 'The campaign should', 'optinable' ); ?> </h3>
                    <select class="optinable_visi_reff_select op_visi_show_hide_select" data-op_rules_config="">
                        <option value="show">
                            <?php esc_html_e( 'Show', 'optinable' ); ?>
                        </option>
                        <option value="hide">
                            <?php esc_html_e( 'Hide', 'optinable' ); ?>
                        </option>
                    </select>
                    <h3 style="display:inline-block;"><?php esc_html_e( 'Add', 'optinable' ); ?>if referral source is</h3>
                </div>

                <div class="optinable_configuration_tabs_panel_label" style="padding:20px">
                    <select class="op_visi_referral" autocomplete="off" name="op_visi_referral">
                        <option value="facebook"><?php esc_html_e( 'Facebook', 'optinable' ); ?></option>
                        <option value="twitter"><?php esc_html_e( 'Twitter', 'optinable' ); ?></option>
                        <option value="linkedin"><?php esc_html_e( 'LinkedIn', 'optinable' ); ?></option>
                        <option value="google"><?php esc_html_e( 'Google', 'optinable' ); ?></option>
                        <option value="instagram"><?php esc_html_e( 'Instagram', 'optinable' ); ?></option>
                        <option value="pinterest"><?php esc_html_e( 'Pinterest', 'optinable' ); ?></option>
                        <option value="youtube"><?php esc_html_e( 'Youtube', 'optinable' ); ?></option>
                        <option value="reddit"><?php esc_html_e( 'Reddit', 'optinable' ); ?></option>
                        <option value="custom"><?php esc_html_e( 'Custom Value', 'optinable' ); ?></option>
                    </select>
                    <input type="input" name="op_custom_ref_source" class="op_custom_ref_source op_visi_q_field" value="">
                    <button type="button" class="op_visi_ref_add op_add_btn_visi"><?php esc_html_e( 'Add', 'optinable' ); ?></button>
                </div>
            </div>
        </div>
    </div>
</div><!-- optinable_optin_display_rules_area_inner -->
