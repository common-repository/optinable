<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
    <div class="optinable-footer" align="center" style="font-size:12px;">
        <?php esc_html_e( 'Made with', 'optinable' ); ?> <i class="fa fa-heart" aria-hidden="true" style="color:red"></i> 
        <?php esc_html_e( 'by', 'optinable' );?> 
        <a href="https://optinable.com/" target="_blank" style="color: #666;font-weight: bold;">
            OptinAble Popup Builder Team
        </a>
    </div>
</div>

<!--  popup alert confirmation -->
<div class="cd-popup optin-able-close-edit" role="alert" style="">
    <div class="cd-popup-container" style="max-width: 400px;">
        <div class="op_popup_ico"><i class="fa-solid fa-circle-exclamation"></i></div>
        <p class="op_alert_text"></p>
        <ul class="cd-buttons">
            <li><a href="javascript:;" class="op_alert_confrim_btn _opz_has_loader" data-optinable_confirm_action="a"></a></li>
            <li><a href="javascript:;" class="op_alert_cancel_btn _opz_has_loader" data-optinable_cancel_action="a"></a></li>
        </ul>
        <a href="javascript:;" class="cd-popup-close img-replace"><i class="fa-solid fa-xmark"></i></a>
    </div> 
</div>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->