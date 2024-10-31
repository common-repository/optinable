<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="opable_global_properties" data-optinable_el_col_row_type="global">

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn _opened_opable" type="button" data-opable-toggle-id="op_global_content">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Campaign Information', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div style="" class="op_global_content op_blocks_box">
        <div class="opable_edit_mode_heading_type" style="">
            <span><?php esc_html_e( 'Campaign Name', 'optinable' ); ?>:</span>
            <input type="text" name="op_campaign_name" class="op_campaign_name opable_input_admin" 
                value="<?php echo esc_attr($campName)?>">
        </div>
    </div>

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn" type="button" data-opable-toggle-id="op_global_bg">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-brush"></i> <?php esc_html_e( 'Campaign Style', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div class="op_global_bg op_blocks_box" style="display:none">
            
        <div class="opable_edit_mode_heading_type opable_redu_1" style="position:relative;">
            <span><?php esc_html_e( 'Background Color', 'optinable' ); ?>:
                <div class="opable_toggle_box">
                    <input type="checkbox" class="opable_toggle_input" value="op_overlay_1" 
                        checked data-op_exclude_prop="background-color">
                </div>
            </span>
            <div class="opable_control_overlay op_overlay_1"></div>
            <input type="text" value="#bada55" class="opable_bg_color _colorpicker" 
                data-opable_assign_color='bg_col' data-default-color="#effeff" />
        </div>

        <div class="opable_edit_mode_heading_type opable_redu_1 op_global_image_box" style="position:relative;">
            <span><?php esc_html_e( 'Background Image', 'optinable' ); ?>:
                <div class="opable_toggle_box">
                    <input type="checkbox" class="opable_toggle_input" value="op_overlay_2" checked 
                    data-op_exclude_prop="background-image">
                </div>
            </span>
            <div class="opable_control_overlay op_overlay_2"></div>
            <div class="opable_img_holdr_thmb">
                <button style="border-radius: 4px;" class="opable_image_upload_btn opable_upload" 
                    data-opable_assign_image='bg_col' type="button" data-optinable_el_col_row_type="global">
                    <?php esc_html_e( 'Add Image', 'optinable' ); ?></button>
                <button class="opable_image_delete" type="button" style="display:none;" 
                    data-opable_assign_image='bg_col' data-optinable_el_col_row_type="global">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
            <div class="opable_image_preview_small" style="display:none; margin-bottom:10px;" 
                data-optinable_el_col_row_type="global"> </div>

            <div class="opable_edit_mode_heading_type image_path_box">
                <span> <?php esc_html_e( 'Image URL', 'optinable' ); ?>: </span>
                <input type="text" name="" data-opable_assign_image="bg_col" data-optinable_row_col_type="global" class="opable_input_admin op_image_url_field" value="">
            </div>
            
            <!-- <br clear="all"> -->
            <div class=" op_bg_settingdiv" style="display:none;margin-bottom:15px;">
                <span><?php esc_html_e( 'Background Position', 'optinable' ); ?>:
                </span>
                <select class="optinable_bg_image_position" data-optinable_el_col_row_type="global">
                    <option value="">
                    </option>
                    <option value="cover">
                        <?php esc_html_e( 'Full Screen Cover', 'optinable' ); ?>
                    </option>
                    <option value="coverbottom">
                        <?php esc_html_e( 'Full Screen Cover Bottom', 'optinable' ); ?>
                    </option>
                    <option value="contain">
                        <?php esc_html_e( 'Full Screen Contain', 'optinable' ); ?>
                    </option>
                    <option value="repeat">
                        <?php esc_html_e( 'Repeat', 'optinable' ); ?>
                    </option>
                    <option value="norepeat">
                        <?php esc_html_e( 'No Repeat', 'optinable' ); ?>
                    </option>
              </select>
            </div>

            <!-- 
                box-shadow: rgb(0 0 0 / 25%) 0px 20px 30px 0px; 
            -->

            <div class=" op_bg_settingdiv" style="display:none; position: relative;margin-bottom:10px;">
                <span><?php esc_html_e( 'Background Blur', 'optinable' ); ?>:
                </span>
                <div class="opable_blur_prop">
                    <input class="optinable_bg_blur" type="range" min="0" max="10" step="0.1" 
                        style="width: 200px;" value="0">
                </div>
            </div>

            <div class=" op_bg_settingdiv" style="display:none; position: relative;">
                <span><?php esc_html_e( 'Background Overlay', 'optinable' ); ?>:
                    <div class="opable_toggle_box">
                        <input type="checkbox" class="opable_toggle_input" value="op_overlay_13" 
                            data-op_exclude_prop="background-overlay">
                    </div>
                </span>
                <div class="opable_control_overlay op_overlay_13" style=""></div>
                <div class="opable_overlay_prop">
                    <input type="text" value="#000" class="opable_bg_overlay _colorpicker" 
                        data-opable_assign_color='bg_overlay' data-default-color="#000" />
                    <input type="number" class="op_overlay_transparency" step="0.01" value="0.6" min="0.01" max="1" 
                        style="position: absolute;left: 118px;padding: 2px 7px;">
                </div>
            </div>
            <!-- <button type="button" class="op_add_overlay_btn" disabled><i class="fa-solid fa-wand-magic-sparkles"></i>  Add Transparent Overlay</button> -->
        </div>

        <div class="opable_edit_mode_heading_type ">
            <span><?php esc_html_e( 'Border Radius (px)', 'optinable' ); ?>:</span>
            <div class="opable_pad_marg opable_radius_width" style="padding:0">
                <span><input type="number" placeholder="" name="opable_radius" 
                    class="opable_border_radius op-top-left-radius" data-radius="top-left-radius">
                    <?php esc_html_e( 'Top Left', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-top-right-radius" data-radius="top-right-radius"><?php esc_html_e( 'Top Right', 'optinable' ); ?>
                </span>
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-left-radius" data-radius="bottom-left-radius"><?php esc_html_e( 'Bottom Left', 'optinable' ); ?>
                </span>
                <span><input type="number" placeholder="" name="opable_radius" class="opable_border_radius op-bottom-right-radius" data-radius="bottom-right-radius"><?php esc_html_e( 'Bottom Right', 'optinable' ); ?></span>
                <div class="opable_clear"></div>
            </div>
        </div>

        <div class="opable_edit_mode_heading_type ">
            <span><?php esc_html_e( 'Padding', 'optinable' ); ?>:</span>
            <div class="opable_pad_marg op_padding_input" style="padding:0">
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele  op-padding-top" data-padding="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-right" data-padding="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-bottom" data-padding="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_padd_ele" class="opable_padd_ele op-padding-left" data-padding="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                <div class="opable_clear"></div>
            </div>
        </div>

        <div class="opable_edit_mode_heading_type ">
            <span><?php esc_html_e( 'Margin', 'optinable' ); ?>:</span>
            <div class="opable_pad_marg op_padding_input" style="padding:0">
                <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-top" data-margin="top"><?php esc_html_e( 'Top', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-right" data-margin="right"><?php esc_html_e( 'Right', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-bottom" data-margin="bottom"><?php esc_html_e( 'Bottom', 'optinable' ); ?></span>
                <span><input type="number" placeholder="" name="opable_marg_ele" class="opable_marg_ele op-margin-left" data-margin="left"><?php esc_html_e( 'Left', 'optinable' ); ?></span>
                <div class="opable_clear"></div>
            </div>
        </div>  
    </div>

    <!-- Size & Animation  -->
    
    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="op_global_align">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-border-none"></i> <?php esc_html_e( 'Size & Animation', 'optinable' ); ?> </em>
        </button>     
    </div>

    <!-- <div class="op_edit_mode_head_lbl">Alignment & Spacing: </div> -->
    <div class="op_global_align op_blocks_box" style="display: none;">
        
        <div class="opable_edit_mode_heading_type" style="">
            <span><?php esc_html_e( 'Animation', 'optinable' ); ?>:</span>
            <?php include_once( 'placeholders/animation.php' );?> 
        </div>

        <div class="opable_edit_mode_heading_type __v_slidein __gvl" style="margin-top:15px;">
            <span><?php esc_html_e( 'Position', 'optinable' ); ?>:</span>
            <select class="optinable_container_position" data-optinable_campaign_type="global" style="width:75%">
                <option value="bottom_right" selected>
                    <?php esc_html_e( 'Bottom Right', 'optinable' ); ?>
                </option>
                <option value="bottom_left">
                    <?php esc_html_e( 'Bottom Left', 'optinable' ); ?>
                </option>
                
          </select>
        </div>

        <div class="opable_edit_mode_heading_type __v_stickybar __gvl" style="margin-top:15px;">
            <span><?php esc_html_e( 'Position', 'optinable' ); ?>:</span>
            <select class="optinable_container_position" data-optinable_campaign_type="stickybar" style="width:75%">
                <option value="op_sticky_top" selected>
                    <?php esc_html_e( 'Top', 'optinable' ); ?>
                </option>
                <option value="op_sticky_bottom">
                    <?php esc_html_e( 'Bottom', 'optinable' ); ?> 
                </option>
          </select>
        </div>

        <div class="opable_edit_mode_heading_type op_px_percent_wrap" style="margin-top:15px;">
            <div class="optinable_ed_container" style="text-align:left !important">
                <span class="op_container_size_pix_percentage_check_lbl"><?php esc_html_e( 'Container Width', 'optinable' ); ?> 
                    <em class="active" data-type='px' style="right: 32px;">PX</em>
                    <em data-type="%">%</em>
                </span>
                <input class="opz_containerWidth op_container_size_percentage" type="range" min="5" max="100" step="1" value="50">
                <input class="opz_containerWidth op_container_size_pix" type="range" min="100" max="1000" step="1" value="500">

                <span class="op_container_size_pix_percentage_check_lbl">
                    <?php esc_html_e( 'Container Height', 'optinable' ); ?> 
                    <!-- <em class="active" data-type='px' style="right: 32px;">PX</em>
                    <em data-type="%">%</em> -->
                </span>
                <!-- <input class="opz_containerHeight op_container_size_percentage" type="range" min="5" max="100" step="1" value="30"> -->
                <input class="opz_containerHeight op_container_size_pix" type="range" min="100" max="1000" step="1" value="300">
            </div>
        </div>

        <div class="opable_edit_mode_heading_type" style="margin:10px 0;">
            <span><?php esc_html_e( 'Power By Logo', 'optinable' ); ?>:</span>
            <select class="optinable_powerby_position" style="width:75%">
                <option value="inside" selected>
                    <?php esc_html_e( 'Inside the Container', 'optinable' ); ?>
                </option>
                <option value="outside">
                    <?php esc_html_e( 'Outside the Container', 'optinable' ); ?>
                </option>
                <option value="remove">
                    <?php esc_html_e( 'Remove the Logo', 'optinable' ); ?>
                </option>
            </select>
        </div>
    </div>

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class="opable_ed_toggle_btn" type="button" 
            data-opable-toggle-id="op_responsive_global">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-regular fa-file-code"></i> <?php esc_html_e( 'Responsive', 'optinable' ); ?> </em>
        </button>     
    </div>

    <div class="opable_edit_mode_heading_type  op_responsive_global op_blocks_box" style="display: none;">
        
        <div class="opable_edit_mode_heading_type" style="margin:10px 0;">
            <span><?php esc_html_e( 'Campaign Visibility', 'optinable' ); ?>:</span>
            <select class="optinable_device_visibility" style="width:75%">
                <option value="optinable_all_devices" selected>
                    <?php esc_html_e( 'Show on All', 'optinable' ); ?>
                </option>
                <option value="optinable_desktop_hide">
                    <?php esc_html_e( 'Hide on Desktop', 'optinable' ); ?> 
                </option>
                <option value="optinable_mobile_hide" >
                    <?php esc_html_e( 'Hide on Mobile', 'optinable' ); ?> 
                </option>
            </select>
        </div>
    </div>

    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" 
            data-opable-toggle-id="op_global_close">
            <span aria-hidden="true" class="opable_closed_angle">
                <i class="fa-solid fa-angle-right"></i>
            </span>
            <span aria-hidden="true" class="opable_open_angle">
                <i class="fa-solid fa-angle-down"></i>
            </span>
            <em><i class="fa-solid fa-xmark"></i> <?php esc_html_e( 'Close Button', 'optinable' ); ?> </em>
        </button>     
    </div>


    <div class="opable_edit_mode_heading_type  op_global_close op_blocks_box" style="display: none;">
       
        <div style=" position:relative;">
            <span> <?php esc_html_e( 'ForeColor', 'optinable' ); ?>:
                <div class="opable_toggle_box">
                    <input type="checkbox" class="opable_toggle_input" value="op_overlay_3" 
                    checked data-op_exclude_prop="close-forecolor">
                </div>
            </span>
            <div class="opable_control_overlay op_overlay_3 "></div>
            <input type="text" value="#bada55" class="opable_fore_color_close _colorpicker" 
                data-opable_assign_color='close_forecolor' data-default-color="#effeff" />
        </div>
        <br clear="all">
        <div style="position:relative">
            <span> <?php esc_html_e( 'Background Color', 'optinable' ); ?>:
                <div class="opable_toggle_box">
                    <input type="checkbox" class="opable_toggle_input" value="op_overlay_4" 
                    checked data-op_exclude_prop="close-bg-color">
                </div>
            </span>
            <div class="opable_control_overlay op_overlay_4 "></div>
            <input type="text" value="#bada55" class="opable_bg_color_close _colorpicker" 
                data-opable_assign_color='bg_close' data-default-color="#effeff" />
        </div>
        <br clear="all">
    </div>
    
</div>