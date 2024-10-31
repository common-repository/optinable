<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<div class="optinable_prop_wrap opable_row_properties" data-optinable_el_col_row_type="row">

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_row_bg">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Background', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div style="position: relative;" class="op_row_bg op_blocks_box">
        <div class="opable_edit_mode_heading_type opable_redu_1" style="position:relative;">
            <span><?php esc_html_e( 'Background Color', 'optinable' ); ?>:
                <div class="opable_toggle_box">
                    <input type="checkbox" class="opable_toggle_input" value="op_overlay_8" checked data-op_exclude_prop="background-color">
                </div>
            </span>
            <div class="opable_control_overlay op_overlay_8"></div>
            <input type="text" value="#bada55" class="opable_bg_color _colorpicker" data-opable_assign_color='bg_col' data-default-color="#effeff" />
        </div>

        <div class="opable_edit_mode_heading_type opable_redu_1 op_row_image_box" style="position:relative;">
            <span><?php esc_html_e( 'Background Image', 'optinable' ); ?>:
                <div class="opable_toggle_box">
                    <input type="checkbox" class="opable_toggle_input" value="op_overlay_9" checked checked data-op_exclude_prop="background-image">
                </div>
            </span>
            <div class="opable_control_overlay op_overlay_9"></div>
            <div class="opable_img_holdr_thmb">
                <button style="border-radius: 4px;" class="opable_image_upload_btn opable_upload" data-opable_assign_image='bg_col' type="button" data-optinable_el_col_row_type="row"><?php esc_html_e( 'Add Image', 'optinable' ); ?></button>
                <button class="opable_image_delete" type="button" style="display:none;" data-opable_assign_image='bg_col' data-optinable_el_col_row_type="row">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="opable_image_preview_small" style="display:none" data-optinable_el_col_row_type=""> </div>
            <br clear="all">
            <div class="opable_edit_mode_heading_type image_path_box">
                <span> <?php esc_html_e( 'Image URL', 'optinable' ); ?>: </span>
                <input type="text" name="" data-opable_assign_image="bg_col" data-optinable_row_col_type="row" class="opable_input_admin op_image_url_field" value="">
            </div>
            <div class=" op_bg_settingdiv" style="display:none;">
                <span><?php esc_html_e( 'Background Position', 'optinable' ); ?>:</span>
                <select class="optinable_bg_image_position" data-optinable_el_col_row_type="row">
                    <option value="">
                    </option>
                    <!-- 
                    background-size: cover;
                    background-repeat: no-repeat;
                     -->
                    <option value="cover">
                        <?php esc_html_e( 'Full Screen Cover', 'optinable' ); ?>
                    </option>
                    <option value="coverbottom">
                        <?php esc_html_e( 'Full Screen Cover Bottom', 'optinable' ); ?>
                    </option>
                    <!-- background-size: contain;
                    background-repeat: no-repeat; -->
                    <option value="contain">
                        <?php esc_html_e( 'Full Screen Contain', 'optinable' ); ?>
                    </option>
                    <option value="repeat">
                        <?php esc_html_e( 'Repeat', 'optinable' ); ?>
                    </option>
              </select>
            </div>
        </div>
    </div>

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="op_row_alignment">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Size & Spacing', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div class="op_row_alignment op_blocks_box" style="display: none;">
        <div class="opable_edit_mode_heading_type opable_redu_1" style="text-align:left !important">
            <span class="opz_lbl_span"><?php esc_html_e( 'Row Width', 'optinable' ); ?></span>
            <input class="opable_col_width_slider" style="width: 70%;" type="range" min="1" max="100" step="1" value="">
        </div>

        <div class="opable_edit_mode_heading_type opable_redu_1">
            <span><?php esc_html_e( 'Max Width (Row)', 'optinable' ); ?>:</span>
            <div class="opable_pad_marg op_padding_input" style="padding:0">
                <input type="number" placeholder="" name="op_row_max_width" class="op_row_max_width"> px
                <div class="opable_clear"></div>
            </div>
        </div>

        <div class="opable_edit_mode_heading_type" style="position:relative;" data-align_way="row-align-horizontal">
            <span> <?php esc_html_e( 'Alignment', 'optinable' ); ?>:</span>
            <button type="button" class="op_content_align" data-align-type='0 auto 0 0'><i class="fa-solid fa-align-left"></i></button>
            <button type="button" class="op_content_align" data-align-type='auto'><i class="fa-solid fa-align-center"></i></button>
            <button type="button" class="op_content_align" data-align-type='0 0 0 auto'><i class="fa-solid fa-align-right"></i></button>
            <div class="opable_clear"></div>
        </div>
        
        <div class="opable_edit_mode_heading_type opable_redu_1">
            <span><?php esc_html_e( 'Padding', 'optinable' ); ?>:</span>
            <div class="opable_pad_marg op_padding_input" style="padding:0">
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele  op-padding-top" data-padding="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-right" data-padding="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-bottom" data-padding="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-left" data-padding="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                <div class="opable_clear"></div>
            </div>
        </div>

        <div class="opable_edit_mode_heading_type opable_redu_1">
            <span><?php esc_html_e( 'Border Radius (px)', 'optinable' ); ?>:</span>
            <div class="opable_pad_marg opable_radius_width" style="padding:0">
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-left-radius" data-radius="top-left-radius"><?php esc_html_e( 'Top Left', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-right-radius" data-radius="top-right-radius"><?php esc_html_e( 'Top Right', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-left-radius" data-radius="bottom-left-radius"><?php esc_html_e( 'Bottom Left', 'optinable' ); ?>
                </span>
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-right-radius" data-radius="bottom-right-radius"><?php esc_html_e( 'Bottom Right', 'optinable' ); ?></span>
                <div class="opable_clear"></div>
            </div>
        </div>

        <div style="position: relative;">
            <div class="opable_toggle_box" style=" right: 10px;">
                <input type="checkbox" class="opable_toggle_input" value="op_overlay_7" 
                    checked checked data-op_exclude_prop="border-color">
            </div>

            <div class="opable_edit_mode_heading_type opable_redu_1" style="width:135px;float:left;">
                <span><?php esc_html_e( 'Border Color', 'optinable' ); ?>:</span>
                <input type="text" value="#bada55" class="opable_border_color _colorpicker" data-opable_assign_color='col_border' data-default-color="#effeff" />
            </div>
            <div class="opable_edit_mode_heading_type opable_redu_1 opable_border_width" style="width:125px;float: left;">
                <span><?php esc_html_e( 'Border Width (px)', 'optinable' ); ?>:</span>
                <input type="number" placeholder="" name="" class="opable_border_width_field" data-width="1">
            </div>
            <div class="opable_control_overlay op_overlay_7"></div>
            <div class="opable_clear"></div>
        </div>
    </div>

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class="opable_ed_toggle_btn" type="button" 
            data-opable-toggle-id="op_position_tab">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Position', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div class=" op_blocks_box op_position_tab" style="display:none;">
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
    
    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn " 
            type="button" data-opable-toggle-id="op_row_attr">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Attributes', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div class="opable_edit_mode_heading_type  op_row_attr op_blocks_box" style="display: none;">
        <span><?php esc_html_e( 'CSS ID', 'optinable' ); ?>:</span>
        <input class="opable_blockidcss opable_input_admin" type="text" readonly value="">                            
        <span><?php esc_html_e( 'Custom CSS Class', 'optinable' ); ?>:</span>
        <div><input type="text" placeholder="" name="opable_css_class" 
            class="opable_input_admin opable_custom_css_class"></div>
    </div>

</div>


    
