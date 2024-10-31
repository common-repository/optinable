<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<!-- individually items action buttons hover layer -->
<div id="opable_elem_hover_prop_layer">
    <div class="opable_elem_hover_prop_layer op_skip">
        <button class="op_prop_layer_drag_btn op_cursor" type="button"><i class="fa-solid fa-arrows-up-down-left-right"></i></button>
        <button class="opable_elem_edit_btn op_cursor" type="button"><i class="fa-solid fa-gear"></i></button>

        <button class="op_prop_layer_delete op_cursor" data-optinable_row_col_type="ele" type="button"><i class="fa-regular fa-trash-can"></i></button>
    </div>
</div>

<div class="optinable-html-blocks">
    
    <div class="op_togglebtn_ui">
        <button aria-expanded="false" class=" opable_ed_toggle_btn " type="button" data-opable-toggle-id="null">
            <!-- op_basic_blocks -->
            <em><?php esc_html_e( 'Blocks', 'optinable' ); ?> <count class="op_basic_block_count"></count></em>
        </button>     
    </div>

    <div class="op_basic_blocks op_blocks_box" style="">
        <div class="optinable-html-block-options" draggable="true">
            <button data-opt_able_heading_drag_btn="opt_able_heading_drag" type="button">
                <div><i class="fa-solid fa-heading"></i></div>
                <span><?php esc_html_e( 'Heading', 'optinable' ); ?></span>
            </button>
            <!-- contenteditable="true"  -->
            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="">
                <h1 id="OP_ElementID" data-dragged-element-type="heading" 
                    class="optinable_heading_container opt-able-para mce-content-body mce-edit-focus" spellcheck="false" 
                    style="text-align: center;margin: 0px;position: relative;">
                    <div><?php esc_html_e( 'Click to edit this Headline', 'optinable' ); ?></div>
                </h1>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-sharp fa-solid fa-paragraph"></i></div>
                <span><?php esc_html_e( 'Text', 'optinable' ); ?></span>
            </button>
            <!-- contenteditable="true"  -->
            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="">
                <p id="OP_ElementID" data-dragged-element-type="paragraph" 
                    class="optinable_paragraph_container opt-able-paragraph mce-content-body mce-edit-focus" 
                    spellcheck="false" 
                    style="margin: 0px;position: relative; font-size: 14px; text-align: left;">
                    <span><?php esc_html_e( "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book", 'optinable' ); ?>
                        
                    </span>
                </p>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-regular fa-envelope"></i></div>
                <span><?php esc_html_e( 'Optin Form', 'optinable' ); ?></span>
            </button>

            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="form">
                <form id="OP_ElementID" class="optinable_optin_container" 
                    data-dragged-element-type="form" name="form1" 
                    style="justify-content:flex-start;">
                    
                    <input name="hashid" type="hidden" value="<?php echo esc_attr($OPZHash); ?>">
                    <input name="id" type="hidden" value="<?php echo esc_attr($postID)?>">

                    <input type="hidden" class="op_form_nonce" name="nonce" value="{{optinable_nonce_field}}" />
                    <input name="redirect_url" class="redirect_url" type="hidden">
                    
                    <div class="optin_text_field_wrap __medium _form_field" style="width: 100%">
                        <input class="" name="name" placeholder="Your Name" style="border-color:rgb(236 235 235); 
                            width:100%; border-width: 1px; border-style: solid; background-color:#fefefe; color:#444138; 
                            padding: 0 12px;box-sizing: border-box; border-radius: 4px;font-size: 14px;" type="text">
                    </div>
                    <div class="optin_email_field_wrap __medium _form_field" style="width: 100%;">
                        <input class="" name="email" placeholder="Your Email" required="required" style="width:100%;border-color: rgb(236 235 235); border-width: 1px; 
                            border-style: solid; 
                            background-color:#fefefe; 
                            color:#444138; 
                            box-sizing: border-box;
                            padding: 0 12px; 
                            font-size: 14px;
                            border-radius: 4px;" type="email">
                    </div>
                    <div class="optin_button_field_wrap __medium _form_field" style="width: 100%;">
                        <button type="button" style="font-size: 14px;background-color:#0503ff; width:100%; border: none;box-sizing: border-box;color: rgb(255, 255, 255); padding: 0 12px; border-radius: 4px;" 
                            class="op-cr ---subt_op optinable_f_fr _op_sbmt">
                            <?php esc_html_e( 'Submit', 'optinable' ); ?>
                            <span class="loader_optinable_wrap"><span></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true" id="bulletBox">
            <button type="button">
                <div><i class="fa-solid fa-list-check"></i></div>
                <span><?php esc_html_e( 'Bullets', 'optinable' ); ?></span>
            </button>

            <!-- contenteditable="true"  -->
            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="">
                <ul id="OP_ElementID" data-dragged-element-type="list" class="optinable_list_container opt-able-list mce-content-body mce-edit-focus" spellcheck="false" style="text-align: center;margin: 0px;position: relative;font-size: 14px;">
                    <li><i class="fa-solid fa-check"></i> <?php esc_html_e( 'Click to edit this list item', 'optinable' ); ?></li>
                    <li><i class="fa-solid fa-check"></i> <?php esc_html_e( 'Click to edit this list item', 'optinable' ); ?></li>
                </ul>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-solid fa-b"></i></div>
                <span><?php esc_html_e( 'Button', 'optinable' ); ?></span>
            </button>

            <div class="opt_able_block_drag_html" 
                style="visibility: hidden; display:none" data-element_type="button">
                <div id="OP_ElementID" data-dragged-element-type="button" 
                    class="optinable_button_container optin_button_field_wrap" 
                    style="width: 100%;position: relative;">
                    <a spellcheck="false" 
                        data-type="<?php echo esc_attr($campType)?>" 
                        style="margin: 0px;position: relative; 
                        background-color: #019e1b;
                        width: 100%;
                        display: block;
                        text-align: center;
                        box-sizing: border-box;
                        font-size: 14px;
                        color: rgb(255, 255, 255);
                        padding: 12px;" class="">
                        <?php esc_html_e( 'Pretty Button', 'optinable' ); ?>
                        <span></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-solid fa-tag"></i></div>
                <span>
                    <?php esc_html_e( 'Tag', 'optinable' ); ?>
                </span>
            </button>
            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="tag">
                <div id="OP_ElementID" data-dragged-element-type="tag" class="optinable_tag_container" style="width: auto;position: relative;">
                    <a spellcheck="false" style="margin: 0px;position: relative;background-color: #019e1b;
                        width: 100%;
                        display: table-cell;
                        text-align: center;
                        box-sizing: border-box;
                        color: rgb(255, 255, 255);
                        padding: 4px 7px;    
                        font-size: 12px;
                        border-radius: 4px;" class="">
                        <i class="fa-solid fa-bolt"></i> 
                        <span class="op_tag_span"><?php esc_html_e( 'Lightning Tip', 'optinable' ); ?></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-solid fa-icons"></i></div>
                <span><?php esc_html_e( 'Icons', 'optinable' ); ?></span>
            </button>

            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="icon">
                <div id="OP_ElementID" data-dragged-element-type="icon" class="optinable_icon_container" 
                    style="width: 100%;position: relative; font-size: 50px;text-align:center;">
                    <i class="fa-solid fa-bullhorn" style=""></i>
                </div>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-regular fa-image"></i></div>
                <span><?php esc_html_e( 'Image', 'optinable' ); ?></span>
            </button>

            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="image">
                <div id="OP_ElementID" data-dragged-element-type="image" class="optinable_image_container" 
                    style="width: 100%;position: relative; text-align:center;">
                    <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/img/image-placeholder.png"); ?>" 
                    style=" width: 80%; margin:auto;">
                </div>
            </div>
        </div>

        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-brands fa-youtube"></i></div>
                <span><?php esc_html_e( 'Video', 'optinable' ); ?></span>
            </button>

            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="image">
                <div id="OP_ElementID" data-dragged-element-type="video" class="optinable_video_container" 
                    style="width: 100%;position: relative; text-align:center;">
                </div>
            </div>
        </div>
    
        <div class="optinable-html-block-options" draggable="true">
            <button type="button">
                <div><i class="fa-solid fa-arrows-up-down"></i></div>
                <span><?php esc_html_e( 'Spacer', 'optinable' ); ?></span>
            </button>

            <div class="opt_able_block_drag_html" style="visibility: hidden; display:none" data-element_type="button">
    <div id="OP_ElementID" data-dragged-element-type="spacer" class="optinable_spacer_container" 
        style="width: 100%;position: relative; height: 50px;">
                </div>
            </div>
        </div>
    </div>

    <div class="op_advanced_blocks op_blocks_box" style="display:none;">

        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-solid fa-border-all"></i></div>
                <span><?php esc_html_e( 'Post Grid', 'optinable' ); ?></span>
            </button>
        </div>
        
        <div class="optinable-html-block-options" draggable="true" id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span><?php esc_html_e( 'Testimonials', 'optinable' ); ?></span>
            </button>
        </div>

        <div class="optinable-html-block-options"  id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span><?php esc_html_e( 'Image Box', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options"  id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span><?php esc_html_e( 'Icon Box', 'optinable' ); ?></span>
            </button>
        </div>
        
        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-regular fa-clock"></i></div>
                <span><?php esc_html_e( 'Count Down', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options" draggable="true" id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span style=""><?php esc_html_e( 'Animated Headlines', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options" draggable="true" id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span><?php esc_html_e( 'Blockquote', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options" draggable="true" id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span><?php esc_html_e( 'Counter', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-regular fa-star"></i></div>
                <span><?php esc_html_e( 'Rating', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-solid fa-magnifying-glass"></i></div>
                <span><?php esc_html_e( 'Search', 'optinable' ); ?></span>
            </button>
        </div>
        
        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-solid fa-bars"></i></div>
                <span><?php esc_html_e( 'Menus', 'optinable' ); ?></span>
            </button>
        </div>
        <!-- <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-regular fa-square-minus"></i></div>
                <span>Accordion</span>
            </button>
        </div> -->
        <div class="optinable-html-block-options" draggable="true" id="">
            <button type="button">
                <div><i class="fa-regular fa-message"></i></div>
                <span><?php esc_html_e( 'Code Highlight', 'optinable' ); ?></span>
            </button>
        </div>

        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-solid fa-code"></i></div>
                <span><?php esc_html_e( 'Custom HTML', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-brands fa-wordpress"></i></div>
                <span><?php esc_html_e( 'Shortcode', 'optinable' ); ?></span>
            </button>
        </div>
        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-solid fa-users"></i></div>
                <span><?php esc_html_e( 'Social Profiles', 'optinable' ); ?></span>
            </button>
        </div>

        <div class="optinable-html-block-options">
            <button type="button">
                <div><i class="fa-solid fa-hashtag"></i></div>
                <span><?php esc_html_e( 'Social Share', 'optinable' ); ?></span>
            </button>
        </div>
    </div>
</div>
