<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<?php require_once( 'optinable-admin-head.php' );?>   

<div class="optinableadmin-campaign-edit-bar" <?php echo (!$opz_show_wizard) ? 'style="display:none"' : '';?>>
    <div> 
        <div class="optinable-campaign-name-wizard op_20x" style="position: relative;">
            <div class="optinable-sidebartab-head" tabindex="-1">
                <span class="dashicons dashicons-wordpress" onclick="javascript: jQuery('.optinable_close_editmode').trigger('click');"></span>
                <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/logo/logo-16.png"); ?>"> 
            </div>

            <a id="optinable_template_gallery" 
                class="optinable_type_btn opable-popup-trigger" 
                data-optinable_alert_type="op_template_gallery_popup" 
                data-optinable_alert_use="op_template_gallery_popup">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="#717171" d="M192 80c0-26.5-21.5-48-48-48H48C21.5 32 0 53.5 0 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80zm0 256c0-26.5-21.5-48-48-48H48c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336zM256 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H304c-26.5 0-48 21.5-48 48zM448 336c0-26.5-21.5-48-48-48H304c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336z"></path>
                </svg>
            </a>
        </div>
        <?php 
        $nonce = wp_create_nonce("opable_save_camp"); ?>

        <div class="op_80x opable-relative" <?php echo ($opz_create_campaign) ? 'style="display:none"' : '';?> style="border-top:1px solid #f0f0f0;">
            <ul class="optinable-campaign-steps-ui-bar pure-u-3-4 ">
                <li class="opable_stepbox">
                   <a href="#Design" class="opable_wizard_panel optinable-nav-wizard" data-opable-wizard-id="1">
                    <span>
                        <?php esc_html_e( 'STEP 1', 'optinable' );?>
                    </span> 
                    <?php esc_html_e( 'Design', 'optinable' );?></a>
                </li>
                
                <li class="opable_stepbox">
                    <a href="#Activation" class="opable_wizard_panel optinable-nav-wizard" data-opable-wizard-id="2">
                        <span>
                            <?php esc_html_e( 'STEP 2', 'optinable' );?>
                        </span> 
                        <label style="display: block;" class="op_remon_<?php echo esc_attr($campType)?>"><?php esc_html_e( 'Activation', 'optinable' );?></label>
                        <label style="display: block;" class="op_rem_on_<?php echo esc_attr($campType)?>"><?php esc_html_e( 'Placement', 'optinable' );?></label>
                    </a>
                </li>
                <li class="opable_stepbox">
                   <a href="#Visibility" class="opable_wizard_panel optinable-nav-wizard" data-opable-wizard-id="3">
                    <span>
                        <?php esc_html_e( 'STEP 3', 'optinable' );?>
                    </span> 
                    <?php esc_html_e( 'Visibility', 'optinable' );?></a>
                </li>
                <li class="opable_stepbox">
                   <a href="#Integration" class="opable_wizard_panel optinable-nav-wizard" data-opable-wizard-id="4">
                    <span>
                        <?php esc_html_e( 'STEP 4', 'optinable' );?>
                    </span> 
                    <?php esc_html_e( 'Integration', 'optinable' );?></a>
                </li>

                <li class="opzli_right" style="margin: 8px 3px 0 20px;">
                    <a href="javascript:;" class="opable-popup-trigger optinable_close_editmode" data-optinable_c_cancel="op_exit" data-optinable_c_action="op_save_exit" data-optinable_alert_use="optinable_for_close_edit" data-optinable_alert_type="optin-able-close-edit" data-op_text="<?php esc_html_e( 'Are you sure you want to close this page?', 'optinable' );?>" data-op_ok_text="<?php esc_html_e( 'Save & Exit', 'optinable' );?>" data-op_no_text="<?php esc_html_e( 'Exit without Saving', 'optinable' );?>">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </li>

                <li class="opzli_right __save">
                    <span class="optinable_unsaved_changes " title="Unsaved changes">
                        <i class="fa-solid fa-rotate"></i>
                    </span>
                    <div class="op_inner_crud_mesg" style="">
                    </div>

                    <button class="op__button _opz_has_loader opable-save-desg-camp-btn" data-type="save" data-nonce="<?php echo esc_attr($nonce)?>" id="opSave">
                        <i class="fa-regular fa-floppy-disk"></i> <?php esc_html_e( 'Save', 'optinable' );?> 
                    </button>
                    <!-- <label class="op_camp_save_arrow_togle">
                        <i class="fa-solid fa-angle-down"></i>
                    </label> -->
                </li>
                <li class="opzli_right __publish">
                    <div style="margin: 17px 8px 15px;">
                        <input class="tgl tgl-flat optinable_publish_campaign" data-nonce="<?php echo esc_attr($nonce)?>" value="override" id="cb11" <?php echo ($campStatus) ? "checked" : ""?> type="checkbox" />
                        <div class=" op_tooltip left opz_info_tip" data-tip="<?php  esc_html_e( "Publish. ", 'optinable' );?>">
                        </div>
                        <label class="tgl-btn" for="cb11" ></label>  
                    </div> 
                </li>
                <br clear="all">
            </ul>
        </div>
    </div>
</div>
 
<div class="optinable-campaign-wizard-body">

	<div class="optinable-campaign-wizard-left-panel op_20x" style="">
		<div class="optinablescroll opable_sidebaredit_wrap optinable-templatelist">
            <?php $_wpnonce = wp_create_nonce("optinable_edit_campaign"); ?>
            <input type="hidden" name="_wpnonce" id="_wpnonce" value="<?php echo esc_attr($_wpnonce)?>">

            <div class="opable-panel__body __opened" style="padding-bottom: 100px;">

                <div class="opable-panel-accordian_owner">
                    
                    <div class="opable-panel-accordian-child opable_wizard_panel _open" data-opable-wizard-id="1">
                    	<div id="optinable_html_controls_container">
                            <div class="opable_designprop_box">
                                <ul class="optinable-campaign-steps-element-container pure-u-3-4">
                                    <li class="active">
                                        <a href="javascript:;" class="optinable-nav opable_container_link" data-opable-cont-element-id="3" style="padding: 22px 10px 18px 25px;">
                                        <i class="fa-regular fa-square-plus"></i>&nbsp;&nbsp;<?php esc_html_e( 'Add Blocks', 'optinable' ); ?>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="javascript:;" class="optinable-nav opable_container_link opable_global_prop_load" data-opable-cont-element-id="1" data-optinable_row_col_type="global">
                                        <i class="fa-solid fa-gear"></i>&nbsp;&nbsp;<?php esc_html_e( 'Global Settings', 'optinable' ); ?>
                                        </a>
                                    </li>
                                    <br clear="all">
                                </ul>

                                <div class="optinable_el_col_row_head">
                                    <div class="optinable_el_head" data-optinable_el_col_row_type="ele">
                                        <button type="button" class="op_goback_editor"><i class="fa-solid fa-xmark"></i></button> 
                                        <?php esc_html_e( 'Edit Block', 'optinable' ); ?> <span class="op_block_type"></span>
                                    </div>
                                    <div class="optinable_col_head" data-optinable_el_col_row_type="col">
                                        <button type="button" class="op_goback_editor"><i class="fa-solid fa-xmark"></i></button> 
                                        <?php esc_html_e( 'Edit Column', 'optinable' ); ?>
                                    </div>
                                    <div class="optinable_row_head" data-optinable_el_col_row_type="row">
                                        <button type="button" class="op_goback_editor"><i class="fa-solid fa-xmark"></i></button> 
                                        <?php esc_html_e( 'Edit Row', 'optinable' ); ?>
                                    </div>
                                    <i class="opable_blockid"></i>

                                    <div id="optinable_el_col_row_content" style="" class="campaign-element-container">
                                        <?php include_once( 'edit-campaign-block-prop.php' );?> 
                                        <?php include_once( 'edit-campaign-col-prop.php' );?> 
                                        <?php include_once( 'edit-campaign-row-prop.php' );?> 
                                    </div>
                                </div>

                                <!--  new blocks  -->
                                <div id="container_element_3" class="campaign-element-container">
                                    <?php include_once( 'edit-campaign-new-blocks.php' );?> 
                                </div>

                                <div id="container_element_1" class="campaign-element-container" style="display:none;">
                                    <?php include_once( 'edit-campaign-global-prop.php' );?> 
                                </div>
                                
                                <!-- popup list to add elements -->
                                <div class="optinable_addblocks_list">
                                </div>
                            </div>
                            
                            <div class="opable_behavior_box" style=" display:none">
                                <!-- behavior content goes here  -->
                            </div>
                            
                            <div class="opable_customcss_box" style=" display:none">
                                <!--  custom css here  -->
                            </div>
                        </div>
                        <br>
                    </div>
                    
                    <div class="opable-panel-accordian-child opable_wizard_panel" data-opable-wizard-id="3">
                        <ul class="optinable-campaign-display-rules pure-u-3-4 _nooutline">
                            <li class="active">
                                <a href="javascript:;" class="optinable-nav " data-opable-cont-element-id="3" style="">
                                <i class="fa-regular fa-eye"></i>&nbsp;&nbsp;
                                <?php esc_html_e( 'Visibility', 'optinable' ); ?> 
                                <i class="fa-solid fa-chevron-down"></i>
                                <i class="fa-solid fa-chevron-right"></i>
                                </a>
                                <p style="padding: 0 50px 30px; background: #f7f9fc; margin: 0;font-weight: 300;">
                                    <?php esc_html_e( 'Configure the campaign visibility settings. For example, on which pages you want this campaign to be appeared.', 'optinable' ); ?>

                                    <a href="https://optinable.com/docs-category/campaign-visibility/" target="_blank" class="op_rules_help_link"><?php esc_html_e( 'Learn more', 'optinable' ); ?> </a>
                                </p>
                            </li>
                            <br clear="all">
                        </ul>
                    </div>    

                    <div class="opable-panel-accordian-child opable_wizard_panel" data-opable-wizard-id="2">
                        <ul class="optinable-campaign-display-rules pure-u-3-4 _nooutline">
                            <li class="active">
                                <a href="javascript:;" class="optinable-nav " data-opable-cont-element-id="2" style="">
                                <i class="fa-regular fa-clock"></i>&nbsp;&nbsp;
                                <label class="op_remon_<?php echo esc_attr($campType)?>"><?php esc_html_e( 'Activation', 'optinable' ); ?> </label>
                                <label class="op_rem_on_<?php echo esc_attr($campType)?>"><?php esc_html_e( 'Placement', 'optinable' );?></label>

                                <i class="fa-solid fa-chevron-down"></i>
                                <i class="fa-solid fa-chevron-right"></i>
                                </a>
                                <p style="padding: 0 50px 30px; background: #f7f9fc; margin: 0;font-weight: 300;" class="op_remon_<?php echo esc_attr($campType)?>">
                                    <?php esc_html_e( 'Configure the campaign activation or trigger settings. For example, when and how you want this campaign to be triggered? ', 'optinable' ); ?>
                                    
                                    <a href="https://optinable.com/docs-category/campaign-activation/" target="_blank" class="op_rules_help_link"><?php esc_html_e( 'Learn more', 'optinable' ); ?></a>
                                </p>
                                <p style="padding: 0 50px 30px; background: #f7f9fc; margin: 0;font-weight: 300;" class="op_rem_on_<?php echo esc_attr($campType)?>">
                                    <?php esc_html_e( 'Configure the campaign placement. For example, where in the post this campaign should be placed or embeded via shortcode.', 'optinable' ); ?>
                                     
                                    <a href="https://optinable.com/docs/introduction/" target="_blank" 
                                        class="op_rules_help_link"><?php esc_html_e( 'Learn more', 'optinable' );?>
                                    </a>
                                </p>
                            </li>
                            <br clear="all">
                        </ul>
                    </div>    
                    
                    <div class="opable-panel-accordian-child opable_wizard_panel" data-opable-wizard-id="4">
                    	
                        <ul class="optinable-campaign-display-rules pure-u-3-4 _nooutline">
                            <li class="active">
                                <a href="javascript:;" class="optinable-nav " data-opable-cont-element-id="4" style="">
                                <i class="fa-regular fa-envelope"></i>&nbsp;&nbsp;
                                <?php esc_html_e( 'Integration', 'optinable' ); ?> 
                                <i class="fa-solid fa-chevron-down"></i>
                                <i class="fa-solid fa-chevron-right"></i>
                                </a>
                                <p style="padding: 0 50px 30px; background: #f7f9fc; margin: 0;font-weight: 300;">
                                    <?php esc_html_e( 'Connect the campaign with local email list or to other third party applications.', 'optinable' ); ?>

                                    <a href="https://optinable.com/docs/introduction/" target="_blank" class="op_rules_help_link"><?php esc_html_e( 'Learn more', 'optinable' ); ?></a>
                                </p>
                            </li>
                            <br clear="all">
                        </ul>

                    </div>
                </div><!--opable-panel-accordian_owner-->
            </div>
			<div class="optinable-force-overflow"></div>
		</div>
        <?php include_once( 'edit-campaign-menu-bottom.php' );?> 
	</div>

	<div class="optinable-campaign-wizard-right-panel op_80x ">
        <div class="optinable_optin_design_area optinable_ui_play" data-optinable_ui_play="1">
            <div class="_editmodezilla" data-nonce="<?php echo esc_attr($nonce)?>" style="">
                <?php 
                if($template){ echo ($template); }?>
            </div>
        </div> <!-- optinable_optin_design_area -->

        <div class="optinable_optin_display_rules_area optinable_ui_play" data-optinable_ui_play="3" >
            <?php include_once( 'optinable-visibility.php' );?> 
        </div>

        <div class="optinable_optin_display_rules_area optinable_ui_play" data-optinable_ui_play="2" >
            <?php include_once( 'optinable-activation.php' );?> 
        </div>

        <div class="optinable_optin_integration_area optinable_ui_play" data-optinable_ui_play="4" >
            <?php include_once( 'optinable-campaign-integration.php' );?> 
        </div>
	</div>

    <input type="hidden" name="op_campaign_name" id="op_campaign_name" value="<?php echo esc_attr($campName)?>">
    <input type="hidden" name="op_campaign_type" id="op_campaign_type" value="<?php echo esc_attr($campType)?>">

	<div class="opable_clear"></div>
    
    <!-- drag area with column block html  -->
    <div id="opable_prop_row_drop_area" style="display: none; visibility: hidden;">
        <div class="opable_prop_row_drop_area op_skip" style=""> 
            
        </div>
    </div>

    <!-- on repopulate - attach this with form html - row -->
    <!-- each row has a layer to show some buttons on hover -->
    <div id="opable_row_hover_prop_layer" style="display: none; visibility: hidden;">
        <div class="opable_row_hover_prop_layer op_skip">
            <button class="op_prop_layer_drag_btn" type="button" data-optinable_row_col_type="row"><i class="fa-solid fa-arrows-up-down-left-right"></i></button>
            <button class="opable_prop_row_setting_btn" type="button" data-optinable_row_col_type="row"><i class="fa-solid fa-gear"></i></button>
            <button class="opable_prop_row_delete_btn" type="button" data-optinable_row_col_type="row"><i class="fa-regular fa-trash-can"></i></button>
        </div>
    </div>

    <!-- each col has prop buttons -->
    <div id="opable_col_hover_prop_layer" style="display:none; visibility:hidden;">
        <div class="opable_col_hover_prop_layer op_skip" style="">
            <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col">
                <i class="fa-solid fa-gear"></i>
            </a>
        </div>
    </div>
</div>

<!--  popup icons -->
<div class="cd-popup optin-able-icons-list-popup" role="alert">
    <div class="cd-popup-container" style="max-width:800px; width:90%; border-radius: 17px;">
        <div class="optinable-font-search-box _nooutline">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Fontawesome icon search..." class="optinable-fonts-search-bar">
        </div>
        <div class="optin-able-icons-list-popup-inner">
            <?php echo wp_kses_post($fontawesome);?>
        </div>
        <a href="javascript:;" class="cd-popup-close img-replace"><i class="fa-solid fa-xmark"></i></a>
    </div> 
</div>

<?php include_once( 'placeholders/templates.php' );?> 

<div id="optinable_admin_loader_wrap" style="display:block;">
    <div class="op_loader_admin"></div>
</div>

<!--  insert layout -->
<div class="remodal optinable-horizontal-1" data-remodal-id="insert-optin-layout" role="dialog" style="min-width:460px; width: 60%; max-width: 650px;" data-remodal-options="hashTracking: false">
    <div class="animated fadeInUp faster">
        <div class="wp-optinable-left-wrap sor__two" style="">
            <div class="opable_prop_row_templates">
                <p><b><?php esc_html_e( 'Choose your desired layout', 'optinable' ); ?> :</b></p>
                <ul>
                    <li>
                        <button class="opable_row_drop" data-row-block-type="100" type="button">
                            <div class="op-100 op_before">
                            </div>
                        </button>
                    </li>
                    <li>
                        <button class="opable_row_drop" data-row-block-type="50-50" type="button">
                            <div class="op-50 op-col op_before" data-col_default_width="50" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col" data-optinable_row_col_setting_id=""><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-50 op-col op_before" data-col_default_width="50" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="opable_clear"></div>
                        </button>
                    </li>
                    <li>
                        <button class="opable_row_drop" data-row-block-type="25-75" type="button">
                            <div class="op-25 op-col op_before" data-col_default_width="25" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-75 op-col op_before" data-col_default_width="75" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="opable_clear"></div>
                        </button>
                    </li>
                    <li>
                        <button class="opable_row_drop" data-row-block-type="75-25" type="button">
                            <div class="op-75 op-col op_before" data-col_default_width="75" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-25 op-col op_before" data-col_default_width="25" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="opable_clear"></div>
                        </button>
                    </li>
                    <li>
                        <button class="opable_row_drop" data-row-block-type="33-3" type="button">
                            <div class="op-33 op-col op_before" data-col_default_width="33" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-33 op-col op_before" data-col_default_width="33" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-33 op-col op_before" data-col_default_width="33" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="opable_clear"></div>
                        </button>
                    </li>

                    <li>
                        <button class="opable_row_drop" data-row-block-type="25-50-25" type="button">
                            <div class="op-25 op-col op_before" data-col_default_width="25" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col" data-optinable_row_col_setting_id=""><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-50 op-col op_before" data-col_default_width="50" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col"><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="op-25 op-col op_before" data-col_default_width="25" data-opable-ele-type="column">
                                <div class="opable_col_hover_prop_layer op_skip" style="">
                                    <a href="javascript:;" class="opable_prop_col_setting_btn" data-optinable_row_col_type="col" data-optinable_row_col_setting_id=""><i class="fa-solid fa-gear"></i></a>
                                </div>
                            </div>
                            <div class="opable_clear"></div>
                        </button>
                    </li>

                    <div class="opable_clear"></div>
                </ul>
            </div>
            <!-- opable_prop_row_templates -->
        </div>
    </div>
</div>

<?php  
// Localize script with variables
wp_localize_script('optinable-admin-custom', 'optinable_vars', array(
    'postID' => esc_js($postID),
    'temp_select' => esc_js($temp_select),
    'optinablePHURL' => esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"),
));?>
<?php include_once( 'optinable-admin-foot.php' );?> 
    
