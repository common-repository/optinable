<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<?php 
$nonce = wp_create_nonce("opable_create_camp"); ?>

<div class="remodal optinable-horizontal-1" data-remodal-id="create-campaign" data-remodal-options="hashTracking: false, " role="dialog" style="min-width:460px; width: 60%; max-width: 650px;">
    <div class="animated slideInDown faster">
        <button data-remodal-action="close" class="opable-close hairline" aria-label="Close"> <i class="fa-solid fa-xmark"></i></button>
        <div class="wp-optinable-left-wrap sor__two optinable_create_pop" style="">
            <div class="wp-optinable-info-div" data-s-o-r-order='1'>  
            	<form action="" method="get">
                    <input type="hidden" name="page" value="optinable">
                    <input type="hidden" name="mod" value="new-campaign">
                    <div class="optinable-text-container" style="text-align:left; padding-bottom:0px !important;">
                        <h3 style="">
                        	<?php 
							esc_html_e( 'Create Campaign', 'optinable' );?>
						</h3>
                        <div style="font-size: 14px; margin: 12px 0 0; color: #5f5f5f; line-height: 18px;"> 
                            <?php esc_html_e( 'Enter a short & specific campaign name. The name will be only used in admin side for you to manage them later.', 'optinable' );?>
                        </div>                    
                    </div>
                	<div class="wp-s-o-r-form " data-s-o-r-order='2' style="width:100%">
                        <div class="optinable-admin-cc-popup-btn-selection" data-optinable-admin-cc-popup-btn="0">
                            <div style="font-size: 15px; margin: 22px 0 2px; font-weight:bold; color: #333; text-align:left; position:relative;"> 
                                <?php esc_html_e( 'Enter the Campaign Name:', 'optinable' );?>
                                <label class="op_field_error" style=";">
                                	<i class="fa-solid fa-triangle-exclamation"></i>
                                	<?php esc_html_e( 'Please enter your campaign name', 'optinable' ); ?>
                                </label>
                            </div>  
                            <input type="text" name="campName" placeholder="My first campaign" required class="optinable-cc-input opz_input_focus" autocomplete="off">
                            <input type="hidden" value="" name="op_campaign_type" class="op_campaign_type_cr">
                        </div>
                        <div class="optinable-admin-cc-popup-btn-selection" data-optinable-admin-cc-popup-btn="1" style="display: none;">
                            <div style="font-size: 15px; margin: 15px 0 7px; font-weight:bold; color: #333;text-align:left">
                                <?php esc_html_e( 'Select the Campaign Type:', 'optinable' );?>
                            </div>  
                            <div>
                                <label class="optinable-admin-cc-radio type-opzformtypesingle">
                                	<input type="radio" name="campType" class="op_campaign_type_radio" value="lightbox" checked> 
                                	<span><?php esc_html_e( 'LIGHTBOX POPUP', 'optinable' ); ?></span>
                            	</label>
                                <label class="optinable-admin-cc-radio type-opzformtypesingle">
                                <input type="radio" name="campType" class="op_campaign_type_radio" value="stickybar"> <span><?php esc_html_e( 'STICKY BAR', 'optinable' ); ?></span></label>
                                <label class="optinable-admin-cc-radio type-opzformtypesingle">
                                <input type="radio" name="campType" class="op_campaign_type_radio" value="slidein"> <span><?php esc_html_e( 'SLIDE-IN', 'optinable' ); ?></span></label>
                                <label class="optinable-admin-cc-radio type-opzformtypesingle">
    							<input type="radio" name="campType" class="op_campaign_type_radio" value="shortcode"> <span><?php esc_html_e( 'SHORTCODE / EMBEDS', 'optinable' );?></span></label>
                                <br clear="all">
                            </div>
                        </div>

                        <div align="right">
                            <button type="button" class="optinable-blue-button-1 _opz_has_loader" data-nonce="<?php echo esc_attr($nonce)?>" id="submit-cr-cmp-btn" style="margin:22px 0 0;padding: 11px 15px;">
                                <?php esc_html_e( 'Save & Design Your Campaign', 'optinable' );?> <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!--wp-optinable-left-wrap sor__two-->
    </div>
</div>

<script>
  document.querySelector('input[name="campName"]').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault(); // Prevent form submission
    }
  });
</script>
