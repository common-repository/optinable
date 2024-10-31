<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<?php require_once( 'optinable-admin-head.php' ); ?>    
<div class="optinablebody">  
    <div class="optinablecampaigns-wrap">
        <div class="pure-g">
            <div class="pure-u-5-5">
                <?php if(isset($success_message))
                {?>
                    <div class="op_alert_db_success" style="display:none;">
                        <strong><?php esc_html_e( 'Success', 'optinable' );?>:</strong>
                        <p><?php echo esc_html($success_message)?></p>
                    </div>
                    <?php
                }?>
                <?php require_once( 'Tables/Subscribers.php' ); ?>  
                <!-- op_dashboard_cards -->
            </div>
        </div>
        <!--<div class="optinablecampaign-empty">
            No campaign(s) found.
        </div>-->
    </div>
    <?php include_once( 'placeholders/CampaignCreate.php' ); ?>
</div>
<?php include_once( 'optinable-admin-foot.php' ); ?>