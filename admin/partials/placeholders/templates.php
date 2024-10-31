<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<div class="cd-popup op_template_gallery_popup" role="alert">
    <div class="cd-popup-container" style="max-width:900px; width:90%;">
        <div class="op_template_gallery_popup_head" align="left">
            <h3><?php esc_html_e( 'Choose a Campaign Template', 'optinable' ); ?> </h3>
            <p><?php esc_html_e( 'Select a design to enhance your opt-in performance', 'optinable' ); ?></p>
            <div class="op_template_btns_head">
                <div class="op_template_footer" style="display: inline-block;">
                    <a class="op_template_gobk_btn" data-type="close" href="javascript:;">
                        <i class="fa-solid fa-arrow-left-long"></i>
                        <?php esc_html_e( 'Cancel, Go Back', 'optinable' ); ?>
                    </a>
                </div>
                <button class="op_template_select_btn _opz_has_loader" style="display: inline-block;" type="button" disabled>
                    <?php esc_html_e( 'Design Your Campaign', 'optinable' ); //Customize this Template ?>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </button>
            </div>
        </div>
        
        <div class="op_template_filter_wrap">
            <button type="button" data-type="lightbox" class=""><?php esc_html_e( 'Popups', 'optinable' ); ?></button>
            <button type="button" data-type="slidein"><?php esc_html_e( 'Slide-In', 'optinable' ); ?></button>
            <button type="button" data-type="stickybar"><?php esc_html_e( 'Sticky-Bar', 'optinable' ); ?></button>
            <button type="button" data-type="embed" ><?php esc_html_e( 'Embeds', 'optinable' ); ?></button>
        </div>
        <div class="optin-able-icons-list-popup-inner">
            
            <div class="optinablescroll ">
                <ul class="optinable-form-type-select-list" style="margin: 0;">

                    <!--  Popup  -->
                    <li class="op_blank_template_placeholder" data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="111">
                           <i class="fa-regular fa-pen-to-square"></i> <?php esc_html_e( 'Blank', 'optinable' ); ?> 
                           <span class="_op_clk2ad _blnk" data-optinable-temp-hash="111"><i class="fa-solid fa-plus"></i> </span>
                        </a>
                        <span class="_op_clk2adSlctd _blnk"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="1">

                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/lightbox1.png"); ?>" class="op_temp_hover_preview" width="">

                            <span class="_op_clk2ad" data-optinable-temp-hash="1"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="7">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/4.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="7"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="8">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/5.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="8"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                        
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="11">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/6.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="11"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="16">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/7.png") ; ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="16"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="12">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/8.png") ; ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="12"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="15">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/9.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="15"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="lightbox">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='lightbox' data-optinable-temp-hash="17">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/10.png") ; ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="17"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <!--  SlideIn  -->

                    <li class="op_blank_template_placeholder" data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="112">
                           <i class="fa-regular fa-pen-to-square"></i> <?php esc_html_e( 'Blank', 'optinable' ); ?>  
                           <span class="_op_clk2ad _blnk" data-optinable-temp-hash="112"><i class="fa-solid fa-plus"></i> </span>
                        </a>
                        <span class="_op_clk2adSlctd _blnk"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="2">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/slidein1.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="2"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="9">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/17.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="9"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="10">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/18.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="10"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="18">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/20.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="18"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="22">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/19.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="22"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="19">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/21.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="19"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="20">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/22.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="20"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="slidein">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='slidein' data-optinable-temp-hash="21">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/23.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="21"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <!--  StickyBar  -->

                    <li class="op_blank_template_placeholder" data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="113">
                           <i class="fa-regular fa-pen-to-square"></i> <?php esc_html_e( 'Blank', 'optinable' ); ?>  
                           <span class="_op_clk2ad _blnk" data-optinable-temp-hash="113"><i class="fa-solid fa-plus"></i> </span>
                        </a>
                        <span class="_op_clk2adSlctd _blnk"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="6">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/11.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="6"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="25">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/12.png") ; ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="25"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="3">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/13.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="3"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="4">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/14.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="4"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <li data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="23">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/15.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="23"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="stickybar">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='stickybar' data-optinable-temp-hash="24">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/16.png"); ?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad" data-optinable-temp-hash="24"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <!--  EMBED  -->

                    <li class="op_blank_template_placeholder" data-filter-item data-filter-name="embed">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='embed' data-optinable-temp-hash="114">
                           <i class="fa-regular fa-pen-to-square"></i> <?php esc_html_e( 'Blank', 'optinable' ); ?>  
                           <span class="_op_clk2ad _blnk" data-optinable-temp-hash="114" style=""><i class="fa-solid fa-plus"></i> </span>
                        </a>
                        <span class="_op_clk2adSlctd _blnk"><i class="fa-solid fa-check"></i> </span>
                    </li>

                    <li data-filter-item data-filter-name="embed">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='embed' data-optinable-temp-hash="5">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/embed 3.png");?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad"  data-optinable-temp-hash="5"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    <li data-filter-item data-filter-name="embed">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='embed' data-optinable-temp-hash="14">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/embed 1.png");?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad"  data-optinable-temp-hash="14"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    <li data-filter-item data-filter-name="embed">
                        <a href="javascript:;" class="pure-button optinable_tmp_select_a" data-type='embed' data-optinable-temp-hash="13">
                            <img src="<?php echo esc_url(OPTINABLE_PLUGIN_PATH . "assets/templates/screenshots/embed 2.png");?>" class="op_temp_hover_preview" width="">
                            <span class="_op_clk2ad"  data-optinable-temp-hash="13"><i class="fa-solid fa-plus"></i> </span>
                            <span class="_op_magnify"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </a>
                        <span class="_op_clk2adSlctd"><i class="fa-solid fa-check"></i> </span>
                    </li>
                    
                    <br clear="all">
                </ul>
                <div class="optinable-force-overflow"></div>
            </div>
        </div>
    </div> 
</div>

<div class="remodal op_temp_hover_preview_box" data-remodal-id="op_temp_hover_preview" data-remodal-options="hashTracking: false," role="dialog" style="min-width:460px; max-width: 80%;">
    <div class="animated slideInDown faster">
        <button data-remodal-action="close" style="    
        color: #000;
        top: -27px;
        right: 0;
        background: #fff;" class="opable-close hairline" aria-label="Close"> <i class="fa-solid fa-xmark"></i></button>
        <img src="" style="width:100%; position:relative;">
    </div>
</div>

<script>
var campType = '<?php echo esc_js($campType)?>';

jQuery(document).ready(function(){

    jQuery(".op_template_filter_wrap button[data-type='"+campType+"']").addClass('active');

    var filterItems = jQuery('.optinable-form-type-select-list [data-filter-item]');

    filterItems.addClass('hidden');
    jQuery('.optinable-form-type-select-list [data-filter-item][data-filter-name*="' + campType + '"]').removeClass('hidden');
});

</script>