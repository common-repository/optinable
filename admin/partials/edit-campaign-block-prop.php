<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="optinable_prop_wrap opable_ele_properties" data-optinable_el_col_row_type="ele">

    <form name="optinable-campaign-form" id="optinable-campaign-form" action="" data-form-id="0">

    <div class="_v_list _v_heading _v_paragraph __pvl">
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_block_content">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle"> 
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Content', 'optinable' ); ?> </em>
            </button>     
        </div>
        <!--  editor  -->
        <div class="op_block_content op_blocks_box ">
            <?php
            $content = '';
            $editor_id = 'tinymce_editor';
            $settings =   array(
                'media_buttons' => false, // show media buttons?
                'textarea_name' => $editor_id, // id of the target textarea
                //'textarea_rows' => 30, // This is equivalent to rows="" in HTML
                'tabindex' => '',
                //'inline'  => true,
                //'editor_css' => '', //  additional styles for Visual and Text editor,
                //'editor_class' => '', // sdditional classes to be added to the editor
                //'teeny' => true, // show minimal editor
                //'dfw' => false, // replace the default fullscreen with DFW
                'tinymce' => array(
                    // Items for the Visual Tab
                    //formatselect we cant add para and heading in dropdown here, coz it creates another heading element inside existing. so we need to create heading buttnos like h1, h2, h3, h4 separate
                    'toolbar1'=> 'bold,italic,underline,strikethrough,link,forecolor,backcolor,fontsizeselect,undo,redo,',//alignleft,aligncenter,alignright
                    'toolbar2'=> '',
                    'fontsize_formats' =>
                    "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
                ),
                'quicktags' => array(
                    // Items for the Text Tab
                )
            );
            wp_editor( $content, $editor_id, $settings ); ?>
        </div>
    </div>

    <!-- fields  -->
    <div class="_v_optin __pvl">
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_block_fields">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Optin Fields', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class="op_block_fields op_opened_panel" style="position:relative">
            <ul class="optinable_toggle_tabs_btn _nooutline">
                <li class="active">
                    <a href="javascript:;" class="" data-opable-toggle-id="style_field">
                    <i class="fa-solid fa-fill-drip"></i>&nbsp;<?php esc_html_e( 'Style', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="content_field" style="">
                    <i class="fa-solid fa-pen"></i>&nbsp;<?php esc_html_e( 'Content', 'optinable' ); ?>
                    </a>
                </li>
                <div class="opable_clear"></div>
            </ul>

            <div class="optinable_toggle_tabs_div" id="content_field" style="display:none">
                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Email Field Placeholder', 'optinable' ); ?>: </span>
                    <div>
                        <input type="text" placeholder="" name="opable_optin_email" class="opable_input_admin opable_optin_email" data-field_type="email">
                        <span><?php esc_html_e( 'Email Field Width', 'optinable' ); ?>:</span>
                        <input class="optin_field_width_slider" style="width: 100%;" type="range" min="1" max="100" step="1" value="" data-field_target="email">
                    </div>
                </div>
                <div class="opable_edit_mode_heading_type " style=" position:relative;">
                    <div class="opable_control_overlay op_overlay_11" style=""></div>
                    <span><?php esc_html_e( 'Name Field Placeholder', 'optinable' ); ?>: 
                        <div class="opable_toggle_box" style="top:11px">
                            <input type="checkbox" class="opable_toggle_input" value="op_overlay_11" checked data-op_exclude_prop="optin_name_field">
                        </div>
                    </span>

                    <div><input type="text" placeholder="" name="opable_optin_name" class="opable_input_admin opable_optin_name" data-field_type="text"> 
                        <span><?php esc_html_e( 'Name Field Width', 'optinable' ); ?>:</span>
                    <input class="optin_field_width_slider" style="width: 100%;" type="range" min="1" max="100" step="1" value="" data-field_target="text"></div>
                </div>
            </div>

            <div class="optinable_toggle_tabs_div" id="style_field" style="">
                <div class="opable_edit_mode_heading_type opable_redu_1">
                    <span><?php esc_html_e( 'Background Color', 'optinable' ); ?></span>
                    <input type="text" value="#bada55" class="opable_bg_color _colorpicker" data-opable_assign_color='bg_col' data-default-color="#effeff" />
                </div>

                <div class="opable_edit_mode_heading_type opable_redu_1">
                    <span><?php esc_html_e( 'Input Text Color', 'optinable' ); ?></span>
                    <input type="text" value="#bada55" class="optin_field_color _colorpicker" data-opable_assign_color='optin_field_color' data-default-color="#effeff" />
                </div>

                <div style="position: relative">
                    <div class="opable_toggle_box" style="right: 10px;">
                        <input type="checkbox" class="opable_toggle_input" value="op_overlay_12" checked data-op_exclude_prop="border-color">
                    </div>
                    <div class="opable_edit_mode_heading_type opable_redu_1" style="width:125px;float:left;">
                        <span><?php esc_html_e( 'Border Color', 'optinable' ); ?></span>
                        <input type="text" value="#bada55" class="opable_border_color _colorpicker" data-opable_assign_color='col_border' data-default-color="#effeff" />
                    </div>
                    <div class="opable_edit_mode_heading_type opable_redu_1 opable_border_width" style="width:125px;float: left;">
                        <span><?php esc_html_e( 'Border Width (px)', 'optinable' ); ?></span>
                        <input type="number" placeholder="" name="" class="opable_border_width_field" data-width="1">
                    </div>
                    <div class="opable_clear"></div>
                    <div class="opable_control_overlay op_overlay_12"></div>
                </div>

                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Fields Padding', 'optinable' ); ?></span>
                    <div class="opable_pad_marg" style=" padding: 0;" data-padding_target_type="field">
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-field-padding-top" data-padding="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-field-padding-right" data-padding="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-field-padding-bottom" data-padding="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-field-padding-left" data-padding="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                        <div class="opable_clear"></div>
                    </div>
                </div> 

                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Fields Margin', 'optinable' ); ?></span>
                    <div class="opable_pad_marg  op_blocks_box_2 " style="display: block !important;">
                        <span><input type="number" placeholder="" name="opable_marg_optin_field" class="opable_marg_optin_field op-field-margin-top" data-margin="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_marg_optin_field" class="opable_marg_optin_field op-field-margin-right" data-margin="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_marg_optin_field" class="opable_marg_optin_field op-field-margin-bottom" data-margin="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_marg_optin_field" class="opable_marg_optin_field op-field-margin-left" data-margin="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                        <div class="opable_clear"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Buttons  -->
    <div class="_v_optin _v_button __pvl">
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_block_buttons">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Button', 'optinable' );?> </em>
            </button>     
        </div>

        <div class="op_block_buttons op_opened_panel" style="position:relative;">
           
            <ul class="optinable_toggle_tabs_btn _nooutline">
                <li class="active">
                    <a href="javascript:;" class="" data-opable-toggle-id="advance_btn">
                    <i class="fa-solid fa-fill-drip"></i>&nbsp;<?php esc_html_e( 'Style', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="basic_btn" style="">
                    <i class="fa-solid fa-pen"></i>&nbsp;<?php esc_html_e( 'Content', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="_v_button __pvl" data-opable-toggle-id="templates_btn">
                    <i class="fa-solid fa-folder-open"></i>&nbsp;<?php esc_html_e( 'Templates', 'optinable' ); ?>
                    </a>
                </li>
                <div class="opable_clear"></div>
            </ul>

            <div class="optinable_toggle_tabs_div" id="basic_btn" style="display:none">

                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Button Label', 'optinable' ); ?>: </span>
                    <div>
                        <input type="text" placeholder="" name="opable_optin_button" class="opable_input_admin opable_optin_button" data-field_type="button">
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type _v_button __pvl">
                    <span><?php esc_html_e( 'Button Sub Heading (Optional)', 'optinable' ); ?>: </span>
                    <div>
                        <input type="text" placeholder="" name="optineble_btn_subheading_field" class="opable_input_admin optineble_btn_subheading_field" data-field_type="button">
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type _nooutline _v_button __pvl">
                    <span><?php esc_html_e( 'Button Action', 'optinable' ); ?>:</span>
                    <select class="optinable_button_action_type" data-hash_id="<?php echo esc_attr($OPZHash);?>" data-type="<?php echo esc_attr($campType);?>">
                        <option value="">
                        </option>
                        <option value="redirect">
                            <?php esc_html_e( 'Redirect to URL', 'optinable' ); ?>
                        </option>
                        <option value="close">
                            <?php esc_html_e( 'Close the Popup', 'optinable' ); ?>
                        </option>
                        <option value="open">
                            <?php esc_html_e( 'Open another Campaign', 'optinable' ); ?>
                        </option>
                    </select>
                    <div class="op_button_action_wrap" style="display:none;">
                        <div class="op_btn_action_redirect" style="display: none;">
                            <span style=";"><?php esc_html_e( 'Action URL', 'optinable' ); ?>: </span>
                            <input type="text" placeholder="https://" name="opable_btn_url" class="opable_input_admin opable_btn_url" data-field_type="button">
                        </div>
                        <div class="op_btn_action_linkto" style="display: none;">
                            <span style=";"><?php esc_html_e( 'Link to campaign', 'optinable' ); ?>: </span>
                            <select class="optinable_button_action_link_to">
                                <option value="">
                                </option>
                                <?php 
                                $allowed_tags = array(
                                    'option' => array(
                                        'value' => array(),
                                    ),
                                );
                                echo wp_kses($related_optins, $allowed_tags);?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type _v_button __pvl" align="left">
                    <button type="button" class="optin_able_list_icon_change_btn opable-popup-trigger" data-optinable_alert_type="optin-able-icons-list-popup" data-optinable_alert_use="optinable_icon_for_button">
                        <i class="fa-regular fa-font-awesome"></i> <?php esc_html_e( 'Add Icon in Button', 'optinable' ); ?>
                    </button>
                </div>

                <div class="opable_edit_mode_heading_type _v_button __pvl" style="display:none">
                    <span><?php esc_html_e( 'Icon Alignment', 'optinable' ); ?>: </span>
                    <div>
                        <input class="optin_field_width_slider" style="width: 100%;" type="range" min="1" max="95" step="1" value="" data-field_target="btn_icon_alignment">
                    </div>
                </div>
                
            </div>

            <div class="optinable_toggle_tabs_div" id="advance_btn">
                <div class="opable_edit_mode_heading_type opable_redu_1" style="position:relative;">
                    <span><?php esc_html_e( 'Background Color', 'optinable' ); ?>
                        <div class="opable_toggle_box">
                            <input type="checkbox" class="opable_toggle_input" value="op_overlay_88" checked data-op_exclude_prop="button-background-color">
                        </div>
                    </span>
                    <div class="opable_control_overlay op_overlay_88"></div>
                    <input type="text" value="#0503ff" class="opable_button_bg_color _colorpicker" data-opable_assign_color='button_bg_color' data-default-color="#0503ff" />
                </div>
                <div class="opable_edit_mode_heading_type opable_redu_1">
                    <span><?php esc_html_e( 'Button Text Color', 'optinable' ); ?></span>
                    <input type="text" value="#0503ff" class="button_txt_color _colorpicker" data-opable_assign_color='button_txt_color' data-default-color="#0503ff" />
                </div>
                
                <div class="opable_edit_mode_heading_type ">
                    <span>
                        <em><?php esc_html_e( 'Font Size', 'optinable' ); ?>:</em> 
                        <input type="number" placeholder="" name="optin_button_font_size" class="op_font_size_field optin_button_font_size"> (px)
                    </span>
                    <div class="opable_clear"></div>
                </div>
                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Button Width', 'optinable' ); ?>: </span>
                    <div>
                        <input class="optin_field_width_slider" style="width: 100%;" type="range" min="1" max="100" step="1" value="" data-field_target="optin">
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type" data-align_way="">
                    <span><?php esc_html_e( 'Display Inline', 'optinable' ); ?>:</span>
                    <div class="opable_toggle_box" style="position: relative;">
                        <input type="checkbox" class="opable_toggle_input" value="op_overlay_16" checked data-op_exclude_prop="display_inline_btn">
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type" style="position:relative;" data-align_way="horizontal">
                    <div class="opable_control_overlay op_overlay_16 __visible" style=""></div>
                    <span><?php esc_html_e( 'Button Alignment', 'optinable' ); ?>:</span>
                    <button type="button" class="op_content_align" data-align-type='0 auto 0 0'><i class="fa-solid fa-align-left"></i></button>
                    <button type="button" class="op_content_align" data-align-type='auto'><i class="fa-solid fa-align-center"></i></button>
                    <button type="button" class="op_content_align" data-align-type='0 0 0 auto'><i class="fa-solid fa-align-right"></i></button>
                    <div class="opable_clear"></div>
                </div>
                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Button Padding', 'optinable' ); ?></span>
                    <div class="opable_pad_marg  " style=" padding: 0;" data-padding_target_type="button">
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-btn-padding-top" data-padding="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-btn-padding-right" data-padding="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-btn-padding-bottom" data-padding="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_btn_fields" class="opable_padd_btn_fields op-btn-padding-left" data-padding="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                        <div class="opable_clear"></div>
                    </div>
                </div>   
            </div>    

            <div class="optinable_toggle_tabs_div _v_button __pvl" id="templates_btn" style="display:none; background: #ffffff; padding: 0;">
                <button type="button" class="op_simple_fancy_btn _opened_opable opable_nested_toggle_btn" data-opable-toggle-id="op_button_template_simple">
                    <i class="fa-regular fa-circle-dot"></i> <?php esc_html_e( 'Simple Buttons', 'optinable' ); ?>
                </button>
                <button type="button" class="op_simple_fancy_btn opable_nested_toggle_btn" data-opable-toggle-id="op_button_template_fancy">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> <?php esc_html_e( 'Fancy Buttons', 'optinable' ); ?>
                </button>
                <?php include_once( 'placeholders/Buttons.php' );?> 
            </div>
        </div>
    </div>

    <!-- Optin Form  -->
    <div class="_v_optin  __pvl">
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="op_block_form">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Optin Form', 'optinable' );?> </em>
            </button>     
        </div>

        <div class="op_block_form op_opened_panel op_blocks_box" style="position:relative; padding: 0;display: none;">

            <ul class="optinable_toggle_tabs_btn _nooutline">
                <li class="active">
                    <a href="javascript:;" class="" data-opable-toggle-id="style_form">
                    <i class="fa-solid fa-spinner"></i>&nbsp;<?php esc_html_e( 'Submission', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="success_form" style="">
                    <i class="fa-solid fa-check"></i>&nbsp;<?php esc_html_e( 'Success', 'optinable' ); ?>
                    </a>
                </li>
                <div class="opable_clear"></div>
            </ul>

            <div class="optinable_toggle_tabs_div" id="style_form">
                <div class=" _nooutline ">
                    <span class="op_span_class"><?php esc_html_e( 'After Form Submission', 'optinable' ); ?>:</span>
                    <select class="optinable_form_submission_type" data-hash_id="<?php echo esc_attr($OPZHash);?>">
                        <option value="same_window">
                            <?php esc_html_e( 'Show success in same window', 'optinable' ); ?>
                        </option>
                        <option value="redirect">
                            <?php esc_html_e( 'Redirect to URL', 'optinable' ); ?>
                        </option>
                    </select>
                    <div class="op_form_submission_type_wrap" style="display:none;">
                        <span class="op_span_class"> <?php esc_html_e( 'URL', 'optinable' ); ?>: </span>
                        <div>
                            <input type="text" placeholder="https://" name="opable_form_success_url" class="opable_input_admin opable_form_success_url" data-field_type="button">
                        </div>
                    </div>
                </div>
            </div>

            <div class="optinable_toggle_tabs_div" id="success_form" style="display:none">

                <textarea class="optin_form_success_mesg" name="optin_form_success_mesg" placeholder="<?php esc_html_e( 'Success message here..', 'optinable' ); ?>">
                <?php esc_html_e( 'Thank you for joining our email list.', 'optinable' ); ?></textarea>

            </div>
        </div>
    </div>
    <!-- <div class="op_edit_mode_head_lbl">Style: </div> -->

    <div class="_v_optin _v_list _v_heading _v_icon _v_paragraph _v_image __pvl">

        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="op_block_style">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Style', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class="op_block_style op_blocks_box" style="display: none;">

            <div class="opable_edit_mode_heading_type _v_icon __pvl">
                <span> <?php esc_html_e( 'Icon', 'optinable' ); ?>: </span>
                <button type="button" 
                    class="optin_able_icon_change_btn opable-popup-trigger" 
                    data-optinable_alert_type="optin-able-icons-list-popup" 
                    data-optinable_alert_use="optinable_for_icons" >
                    <i class="fa-solid fa-bullhorn" style=""></i>
                </button>
            </div>

            <div class="opable_edit_mode_heading_type op_listIstyle _v_list __pvl op_faw_list_icons" style="display:none">
                <span><?php esc_html_e( 'List Icon Style', 'optinable' ); ?>:</span>
                <!-- <i class="fa-solid fa-list-ol"></i>
                <i class="fa-solid fa-list-ul"></i>
                <i class="fa-solid fa-list"></i> -->
                <i class="fa-solid fa-minus"></i>
                <i class="fa-regular fa-square-check"></i>
                <i class="fa-solid fa-check-double"></i>
                <i class="fa-solid fa-check"></i>
                <i class="fas fa-check-square"></i>
                <i class="fa-regular fa-circle-check"></i>
                <i class="fa-solid fa-circle-right"></i>

                <i class="fa-regular fa-star"></i>
                <i class="fa-solid fa-arrow-right"></i>
                <i class="fa-solid fa-xmark"></i>
                <i class="fa-solid fa-circle-info"></i>
                <i class="fa-solid fa-plus"></i>

                <i class="fa-solid fa-thumbs-up"></i>
                <i class="fa-regular fa-thumbs-up"></i>
                <i class="fa-solid fa-thumbs-down"></i>
                <i class="fa-regular fa-thumbs-down"></i>
                <i class="fa-solid fa-chevron-right"></i>
                <i class="fa-solid fa-caret-right"></i>
                <i class="fa-solid fa-angles-right"></i>
                <i class="fa-regular fa-square-caret-right"></i>
                <div class="opable_clear"></div>

                <div align="right">
                    <button type="button" class="optin_able_list_icon_change_btn opable-popup-trigger" data-optinable_alert_type="optin-able-icons-list-popup" data-optinable_alert_use="optinable_for_list">
                        <i class="fa-regular fa-font-awesome"></i> <?php esc_html_e( 'Icon', 'optinable' ); ?>Show More Icons
                    </button>
                </div>
            </div>

            <div class="opable_edit_mode_heading_type _v_heading __pvl" style="display:none">
                <span><?php esc_html_e( 'Heading', 'optinable' ); ?>:</span>
                <button type="button" class="op_headings" data-heading-type='H1'>H1</button>
                <button type="button" class="op_headings" data-heading-type='H2'>H2</button>
                <button type="button" class="op_headings" data-heading-type='H3'>H3</button>
                <button type="button" class="op_headings" data-heading-type='H4'>H4</button>
                <button type="button" class="op_headings" data-heading-type='H5'>H5</button>
                <button type="button" class="op_headings" data-heading-type='H6'>H6</button>
                <div class="opable_clear"></div>
            </div>

            <div class="opable_edit_mode_heading_type _v_optin __pvl" style="">
                <span><?php esc_html_e( 'Button Size', 'optinable' ); ?>:</span>
                <select class="optinable_button_size">
                    <option value="__small">
                        <?php esc_html_e( 'Small', 'optinable' ); ?>
                    </option>
                    <option value="__medium">
                        <?php esc_html_e( 'Medium', 'optinable' ); ?>
                    </option>
                    <option value="__large">
                        <?php esc_html_e( 'Large', 'optinable' ); ?>
                    </option>
              </select>
            </div>

            <div class="opable_edit_mode_heading_type _v_icon __pvl" >
                <span> <?php esc_html_e( 'Color', 'optinable' ); ?>: </span>
                <input type="text" value="#bada55" class="optinable_fonawe_icon_color _colorpicker" data-opable_assign_color='optinable_fonawe_icon_color' data-default-color="#effeff" />
            </div>

            <div class="opable_edit_mode_heading_type" style="" data-align_way="inline">
                <span><?php esc_html_e( 'Alignment', 'optinable' ); ?>:</span>
                <button type="button" class="op_content_align" data-align-type='left'><i class="fa-solid fa-align-left"></i></button>
                <button type="button" class="op_content_align" data-align-type='center'><i class="fa-solid fa-align-center"></i></button>
                <button type="button" class="op_content_align" data-align-type='right'><i class="fa-solid fa-align-right"></i></button>
                <div class="opable_clear"></div>
            </div>

            <div class="opable_edit_mode_heading_type " style="">
                <span><?php esc_html_e( 'Display', 'optinable' ); ?>:</span>
                <select class="optinable_display_property">
                    <option value="initial">
                       initial
                    </option>
                    <option value="block">
                       block
                    </option>
                    <option value="inline-block">
                        inline-block
                    </option>
                    <option value="inline">
                        inline
                    </option>
                    <option value="flex">
                        flex
                    </option>
                    <option value="inline-flex">
                        inline-flex
                    </option>
                    <option value="grid">
                        grid
                    </option>
                    <option value="inline-grid">
                        inline-grid
                    </option>
                    <option value="flow-root">
                        flow-root
                    </option>
                    <option value="none">
                        none
                    </option>
              </select>
            </div>

            <div class="opable_edit_mode_heading_type _v_heading _v_paragraph _h_icon">
                <span><?php esc_html_e( 'Font Family', 'optinable' ); ?>:</span> <?php echo $google_fonts;?>
                <div class="opable_clear"></div>
            </div>

            <div class="opable_edit_mode_heading_type ">
                <span><em><?php esc_html_e( 'Font Size', 'optinable' ); ?>:</em> 
                    <input type="number" placeholder="" name="optin_form_font_size" class="optin_form_font_size"> (px)</span>
                <div class="opable_clear"></div>
            </div>

            <div class="opable_edit_mode_heading_type _v_heading _v_paragraph _h_icon">
                <span><em><?php esc_html_e( 'Line Height', 'optinable' ); ?>:</em> 
                    <input type="number" placeholder="" name="opable_line_height" class="opable_line_height"> (px)</span>
                <div class="opable_clear"></div>
            </div>

            <div class="opable_edit_mode_heading_type">
                <span><?php esc_html_e( 'Width', 'optinable' ); ?>:</span>
                <div>
                    <input class="element_outer_width_slider" 
                    style="width: 100%;" 
                    type="range" min="1" max="100" 
                    step="1" value="" 
                    data-field_target="element">
                </div>
            </div>

            <div class="opable_edit_mode_heading_type _v_optin __pvl">
                <span><?php esc_html_e( 'Border Radius', 'optinable' ); ?> (px):</span>
                <div class="opable_pad_marg opable_radius_width" style="padding:0">
                    <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-left-radius" data-radius="top-left-radius"><?php esc_html_e( 'Top Left', 'optinable' ); ?></span>
                    <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-right-radius" data-radius="top-right-radius"><?php esc_html_e( 'Top Right', 'optinable' ); ?></span>
                    <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-left-radius" data-radius="bottom-left-radius"><?php esc_html_e( 'Bottom Left', 'optinable' ); ?></span>
                    <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-right-radius" data-radius="bottom-right-radius"><?php esc_html_e( 'Bottom Right', 'optinable' ); ?></span>
                    <div class="opable_clear"></div>
                </div>
            </div>

        </div>
    </div>

    <!-- image  -->
    <div class=" _v_image __pvl">

        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_block_image">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Image', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class="opable_edit_mode_heading_type op_block_image op_ele_image_box op_blocks_box" style="position: relative; padding: 0;">

            <ul class="optinable_toggle_tabs_btn _nooutline">
                <li class="active">
                    <a href="javascript:;" class="" data-opable-toggle-id="content_image">
                    <i class="fa-solid fa-pen"></i>&nbsp;<?php esc_html_e( 'Content', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="style_image">
                    <i class="fa-solid fa-fill-drip"></i>&nbsp;<?php esc_html_e( 'Style', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="template_image" style="">
                    <i class="fa-solid fa-folder-open"></i>&nbsp;<?php esc_html_e( 'Templates', 'optinable' ); ?>
                    </a>
                </li>
                <div class="opable_clear"></div>
            </ul>

            <div class="optinable_toggle_tabs_div" id="content_image" style="">

                <div class="opable_edit_mode_heading_type " style="position: relative;">
                    <span> <?php esc_html_e( 'Upload your Image', 'optinable' ); ?>: </span>

                    <div class="opable_img_holdr_thmb">
            <button style="border-radius:4px; background: #e0e0e0;" class="opable_image_upload_btn opable_upload" data-opable_assign_image='image_element' type="button" data-optinable_el_col_row_type="ele"><?php esc_html_e( 'Add Image', 'optinable' ); ?></button>
                        <button class="opable_image_delete" type="button" style="display:none;" data-opable_assign_image='image_element' data-optinable_el_col_row_type="ele">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                    <div class="opable_image_preview_small" style="display:none; margin-bottom:10px;" data-optinable_el_col_row_type=""> </div>
                </div>

                <div class="opable_edit_mode_heading_type image_path_box">
                    <span> <?php esc_html_e( 'Image URL', 'optinable' ); ?>: </span>
                    <input type="text" name="" data-opable_assign_image="image_element" data-optinable_row_col_type="ele" class="opable_input_admin op_image_url_field" value="">
                </div>

                <div class="opable_edit_mode_heading_type ">
                    <span> <?php esc_html_e( 'Image Size', 'optinable' ); ?>: </span>
                    <select id="image_size_change" data-setting="image_size" style="width: 100%;">
                        <option value="thumbnail" ><?php esc_html_e( 'Thumbnail - 150 x 150', 'optinable' ); ?></option>
                        <option value="medium"><?php esc_html_e( 'Medium - 300 x Height', 'optinable' ); ?></option>
                        <!-- <option value="large">Large - 1024 x Height</option> -->
                        <option value="full"><?php esc_html_e( 'Full/Original', 'optinable' ); ?></option>
                        <option value="custom"><?php esc_html_e( 'Custom', 'optinable' ); ?></option>
                    </select>
                </div>

                <div class="optinable-image-custom-size-wrap" style="margin-bottom:12px;">
                    <div class="optinable-image-custom-size-div">
                        <input id="optinable-image-custom-size-width" type="number" data-size-type="width">
                        <label class=""><?php esc_html_e( 'Width', 'optinable' ); ?> </label>
                    </div>
                    <div class="optinable-image-custom-size-x">x</div>
                    <div class="optinable-image-custom-size-div">
                        <input id="optinable-image-custom-size-height" type="number" data-size-type="height">
                        <label class=""><?php esc_html_e( 'Height', 'optinable' ); ?></label>
                    </div>
                    <button class="optinable-apply-custom-image-dimension" type="button"><?php esc_html_e( 'Apply', 'optinable' ); ?></button>
                    <div class="opable_clear"></div>
                </div>

                <div class="opable_edit_mode_heading_type" style="position: relative;">
                    <div>
                        <span><?php esc_html_e( 'Custom Link (Optional)', 'optinable' ); ?>: </span>
                        <input type="text" placeholder="" name="opable_custom_img_url" class="opable_input_admin opable_field_blur_event" data-field_type="optinable-custom-link-image" style="margin-bottom:0 !important">
                        <div class="opable_toggle_box" style="display:none">
                            <input type="checkbox" class="opable_toggle_input" value="op_overlay_22" data-op_exclude_prop="optin_custom_img_link">
                        </div>
                    </div>
                    <div class="op_link_checkboxes">
                        <span>
                            <input type="checkbox" class="opable_imagelink_prop" value="1"  data-op_exclude_prop="custom_img_link_new_window">
                                <?php esc_html_e( 'Open in New Window', 'optinable' ); ?>
                        </span>
                        <span>
                            <input type="checkbox" class="opable_imagelink_prop" value="1"  data-op_exclude_prop="custom_img_link_nofollow">
                            <?php esc_html_e( 'No Follow', 'optinable' ); ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="optinable_toggle_tabs_div" id="style_image" style="display: none">
                <div class="opable_edit_mode_heading_type" style="position:relative;" data-align_way="image_horizontal">
                    <span><?php esc_html_e( 'Image Alignment', 'optinable' ); ?>:</span>
                    <button type="button" class="op_content_align" data-align-type='left'><i class="fa-solid fa-align-left"></i></button>
                    <button type="button" class="op_content_align" data-align-type='center'><i class="fa-solid fa-align-center"></i></button>
                    <button type="button" class="op_content_align" data-align-type='right'><i class="fa-solid fa-align-right"></i></button>
                    <div class="opable_clear"></div>
                </div>
                
                <div style="position: relative;">
                    <!--
                    <div class="opable_toggle_box" style=" right: 10px;">
                        <input type="checkbox" class="opable_toggle_input" value="op_overlay_7" checked checked data-op_exclude_prop="border-color">
                    </div>-->
                    <div class="opable_edit_mode_heading_type opable_redu_1">
                        <span> <?php esc_html_e( 'Border Style', 'optinable' ); ?>: </span>
                        <select id="image_border_style" data-setting="image_border_style" style=" width: 96%;">
                            <option value="none" ><?php esc_html_e( 'None', 'optinable' ); ?></option>
                            <option value="solid" ><?php esc_html_e( 'Solid', 'optinable' ); ?></option>
                            <option value="dashed"><?php esc_html_e( 'Dashed', 'optinable' ); ?></option>
                            <option value="dotted"><?php esc_html_e( 'Dotted', 'optinable' ); ?></option>
                        </select>
                    </div>
                    <div class="opable_edit_mode_heading_type " style="width:135px;float:left;">
                        <span><?php esc_html_e( 'Border Color', 'optinable' ); ?>:</span>
                        <input type="text" value="#bada55" class="image_border_color _colorpicker" data-opable_assign_color='image_border_color' data-default-color="#effeff" />
                    </div>
                    <div class="opable_edit_mode_heading_type opable_redu_1 opable_border_width" style="width:125px;float: left;">
                        <span><?php esc_html_e( 'Border Width (px)', 'optinable' ); ?>:</span>
                        <input type="number" placeholder="" name="" class="image_border_width" data-width="1">
                    </div>
                    <div class="opable_clear"></div>
                    <div class="opable_control_overlay op_overlay_7"></div>
                </div>

                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Border Radius (px)', 'optinable' ); ?>:</span>
                    <div class="opable_pad_marg opable_radius_width" style="padding:0">
                        <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-left-radius" data-radius="top-left-radius"><?php esc_html_e( 'Top Left', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-right-radius" data-radius="top-right-radius"><?php esc_html_e( 'Top Right', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-left-radius" data-radius="bottom-left-radius"><?php esc_html_e( 'Bottom Left', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-right-radius" data-radius="bottom-right-radius"><?php esc_html_e( 'Bottom Right', 'optinable' ); ?></span>
                        <div class="opable_clear"></div>
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Padding', 'optinable' ); ?>:</span>
                    <div class="opable_pad_marg op_padding_input" style="padding:0">
                        <span><input type="number" placeholder="" name="opable_padd_image" class="opable_padd_image op-image-padding-top" data-padding="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_image" class="opable_padd_image op-image-padding-right" data-padding="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_image" class="opable_padd_image op-image-padding-bottom" data-padding="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                        <span><input type="number" placeholder="" name="opable_padd_image" class="opable_padd_image op-image-padding-left" data-padding="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                        <div class="opable_clear"></div>
                    </div>
                </div>
            </div>

            <div class="optinable_toggle_tabs_div" id="template_image" style=" display: none;">
                <div class="op_img_template_subheading">
                    <?php esc_html_e( 'Note: Only shadow will be applied to the image, if the border and padding are removed from', 'optinable' ); ?>
                    <i class="fa-solid fa-fill-drip"></i> <?php esc_html_e( 'Style section.', 'optinable' ); ?>
                </div>
                <ul>
                    <li class="op_shadow" data-image-shadow-css="optinable-img-shadow-2">
                        <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"); ?>" style=" width: 80%; margin:auto;" class="optinable-img-shadow-2">
                    </li>
                    <li class="op_shadow" data-image-shadow-css="optinable-img-shadow-1">
                        <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"); ?>" style=" width: 80%; margin:auto;" class="optinable-img-shadow-1">
                    </li>
                    <li class="op_shadow" data-image-shadow-css="optinable-img-shadow-3">
                        <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"); ?>" style=" width: 80%; margin:auto;" class="optinable-img-shadow-3">
                    </li>
                    <li class="op_shadow" data-image-shadow-css="optinable-img-shadow-4">
                        <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"); ?>" style=" width: 80%; margin:auto;" class="optinable-img-shadow-4">
                    </li>
                    <li class="op_shadow" data-image-shadow-css="optinable-img-shadow-5">
                        <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"); ?>" style=" width: 80%; margin:auto;" class="optinable-img-shadow-5">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- video -->
    <div class="_v_video __pvl">

        <div class="op_togglebtn_ui">
            <button aria-expanded="false" 
                class=" opable_ed_toggle_btn _opened_opable" 
                type="button" 
                data-opable-toggle-id="op_block_video">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Video', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class=" op_block_video op_blocks_box">
            <div class="opable_edit_mode_heading_type _nooutline " style="position: relative;">
                <span style=";"><?php esc_html_e( 'Youtube URL', 'optinable' ); ?>: </span>
                <span class="op_yt_error"><i class="fa-solid fa-triangle-exclamation"></i> 
                    <?php esc_html_e( 'Invalid video URL', 'optinable' ); ?></span>
                <div style="">
                    <input type="text" placeholder="" 
                    name="opable_video_url" 
                    class="opable_input_admin opable_video_url" 
                    data-field_type="button">
                </div>
            </div>
            <div class="opable_edit_mode_heading_type">
                <span><?php esc_html_e( 'Width', 'optinable' ); ?></span>
                <div>
                    <input class="optin_field_width_slider" 
                    style="width: 100%;" 
                    type="range" min="1" 
                    max="100" step="1" 
                    value="" 
                    data-field_target="video">
                </div>
            </div>

            <div class="opable_edit_mode_heading_type" style="position:relative;" data-align_way="video_horizontal">
                <span> <?php esc_html_e( 'Alignment', 'optinable' ); ?>:</span>
                <button type="button" class="op_content_align" data-align-type='0 auto 0 0'><i class="fa-solid fa-align-left"></i></button>
                <button type="button" class="op_content_align" data-align-type='auto'><i class="fa-solid fa-align-center"></i></button>
                <button type="button" class="op_content_align" data-align-type='0 0 0 auto'><i class="fa-solid fa-align-right"></i></button>
                <div class="opable_clear"></div>
            </div>
        </div>
    </div>

    <!-- tag  -->
    <div class=" _v_tag __pvl">
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_block_tag">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Tag', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class="op_block_tag op_opened_panel">

            <ul class="optinable_toggle_tabs_btn _nooutline">
                <li class="active">
                    <a href="javascript:;" class="" data-opable-toggle-id="tag_tag_style_box">
                    <i class="fa-solid fa-fill-drip"></i>&nbsp;<?php esc_html_e( 'Style', 'optinable' ); ?>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="tag_content_box" style="">
                    <i class="fa-solid fa-pen"></i>&nbsp;<?php esc_html_e( 'Content', 'optinable' ); ?>
                    </a>
                </li>
                <!-- <li class="">
                    <a href="javascript:;" class="" data-opable-toggle-id="tag_template_box">
                    <i class="fa-solid fa-folder-open"></i>&nbsp;<?php esc_html_e( 'Templates', 'optinable' ); ?>
                    </a>
                </li> -->
                <div class="opable_clear"></div>
            </ul>

            <div class="optinable_toggle_tabs_div" id="tag_tag_style_box" style="">
                <div class="opable_edit_mode_heading_type _v_tag _h_icon">
                    <span><?php esc_html_e( 'Font Family', 'optinable' ); ?>:</span> <?php echo $google_fonts;?>
                    <div class="opable_clear"></div>
                </div>

                <div class="opable_edit_mode_heading_type ">
                    <span><em><?php esc_html_e( 'Font Size', 'optinable' ); ?>:</em> <input type="number" placeholder="" name="optin_form_font_size" class="optin_form_font_size"> (px)</span></span>
                    <div class="opable_clear"></div>
                </div>

                <div class="opable_edit_mode_heading_type opable_redu_1" style="position:relative;">
                    <span><?php esc_html_e( 'Background Color', 'optinable' ); ?>:</span>
                    <input type="text" value="#bada55" class="optinable-tag-bg _colorpicker" data-opable_assign_color='optinable-tag-bg' data-default-color="#effeff" />
                </div>

            </div>

            <div class="optinable_toggle_tabs_div" id="tag_content_box" style="display:none">
                <div class="opable_edit_mode_heading_type ">
                    <span><?php esc_html_e( 'Tag Label', 'optinable' ); ?>: </span>
                    <div>
                        <input type="text" placeholder="" name="optinable_tag_label" class="opable_input_admin optinable_tag_label" data-field_type="button">
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type _nooutline ">
                    <span style=";"><?php esc_html_e( 'Tag URL (Optional)', 'optinable' ); ?>: </span>
                    <div style="">
                        <input type="text" placeholder="" name="opable_btn_url" class="opable_input_admin opable_btn_url" data-field_type="tag">
                    </div>
                </div>

                <div class="opable_edit_mode_heading_type " align="left">
                    <button type="button" class="optin_able_list_icon_change_btn opable-popup-trigger" data-optinable_alert_type="optin-able-icons-list-popup" data-optinable_alert_use="optinable_icon_for_tag">
                        <i class="fa-regular fa-font-awesome"></i> <?php esc_html_e( 'Change Tag Icon', 'optinable' ); ?>
                    </button>
                </div>

                <div class="opable_edit_mode_heading_type" style="">
                    <span><?php esc_html_e( 'Position', 'optinable' ); ?>:</span>
                    <select class="optinable_element_position" style="width:200px">
                        <option value="relative">
                            <?php esc_html_e( 'Relative', 'optinable' ); ?>
                        </option>
                        <option value="absolute">
                            <?php esc_html_e( 'Absolute', 'optinable' ); ?>
                        </option>
                  </select>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="op_edit_mode_head_lbl">Padding: </div> -->

    <div class="_v_optin _v_list _v_heading _v_paragraph _v_button _v_image _v_tag _v_video _v_icon __pvl">

        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class="opable_ed_toggle_btn" type="button" data-opable-toggle-id="op_block_padding">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Padding', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class="opable_pad_marg op_padding_input op_block_padding op_blocks_box op_opened_panel" style="display: none;">
            <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-top" data-padding="top">
                <?php esc_html_e( 'Top', 'optinable' ); ?></span>
            <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-right" data-padding="right">
                <?php esc_html_e( 'Right', 'optinable' ); ?></span>
            <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-bottom" data-padding="bottom">
                <?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
            <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-left" data-padding="left">
                <?php esc_html_e( 'Left', 'optinable' ); ?></span>
            <div class="opable_clear"></div>
        </div>

        <div class="opable_clear"></div>

        <!-- Margin -->
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="op_block_margin">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Margin', 'optinable' ); ?> </em>
            </button>     
        </div>

        <!-- <div class="op_edit_mode_head_lbl">Margin: </div> -->

        <div class="opable_pad_marg op_margin_input op_block_margin op_blocks_box op_opened_panel" style="display: none;">
            <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-top" data-margin="top">
                <?php esc_html_e( 'Top', 'optinable' ); ?></span>
            <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-right" data-margin="right">
                <?php esc_html_e( 'Right', 'optinable' ); ?></span>
            <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-bottom" data-margin="bottom">
                <?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
            <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-left" data-margin="left">
                <?php esc_html_e( 'Left', 'optinable' ); ?></span>
            <div class="opable_clear"></div>
        </div>
        <div class="opable_clear"></div>
    </div>

    <!--  space  -->
    <div class="_v_spacer __pvl">

        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_block_spacer">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Spacer', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class=" op_block_spacer op_blocks_box" style="">
            <div>
                <input class="optinable_height_slider" 
                style="width: 100%;" 
                type="range" min="1" 
                max="300" 
                step="1" value="" 
                data-field_target="spacer">
            </div>
        </div>
    </div>

    <!-- _v_button __pvl -->
    <div class=" "> 
        <div class="op_togglebtn_ui">
            <button aria-expanded="false" class="opable_ed_toggle_btn" type="button" data-opable-toggle-id="op_position_tab">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Position', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class=" op_blocks_box op_position_tab " style="display:none;">
            <div class="opable_edit_mode_heading_type" style="">
                <span><?php esc_html_e( 'Position', 'optinable' ); ?>:</span>
                <select class="optinable_element_position" style="width:200px">
                    <option value="relative">
                        <?php esc_html_e( 'Relative', 'optinable' ); ?>
                    </option>
                    <option value="absolute">
                        <?php esc_html_e( 'Absolute', 'optinable' ); ?>
                    </option>
              </select>
            </div>
        </div>
    </div>
    
    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="op_block_attr">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Attributes', 'optinable' ); ?> </em>
        </button>     
    </div>

    <!-- <div class="op_edit_mode_head_lbl">Attributes: </div> -->

    <div class="opable_edit_mode_heading_type op_block_attr op_blocks_box" style="display: none;">
        <span><?php esc_html_e( 'CSS ID', 'optinable' ); ?>:</span>
        <input class="opable_blockidcss opable_input_admin" type="text" readonly value="">                            
        <span><?php esc_html_e( 'Custom CSS Class', 'optinable' ); ?>:</span>
        <div><input type="text" placeholder="" name="opable_css_class" class="opable_input_admin opable_custom_css_class"></div>
    </div>

    <!-- animation  -->
    <div class="_h_icon __pvl">
        <div class="op_togglebtn_ui ">
            <button aria-expanded="false" class="opable_ed_toggle_btn" type="button" data-opable-toggle-id="op_animation_tab">
                <span aria-hidden="true" class="opable_closed_angle">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
                <span aria-hidden="true" class="opable_open_angle">
                    <i class="fa-solid fa-angle-down"></i>
                </span>
                <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Animation', 'optinable' ); ?> </em>
            </button>     
        </div>

        <div class=" op_blocks_box op_animation_tab" style="display:none;">
            <div class="opable_edit_mode_heading_type" style=""> 
                <span><?php esc_html_e( 'Animation', 'optinable' ); ?>:</span>
                
            </div>
        </div>
    </div>
    <!-- responsive  -->

    </form>
    
</div>
