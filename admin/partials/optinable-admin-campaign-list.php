<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<?php require_once( 'optinable-admin-head.php' ); ?>    
    
<div class="optinablebody">  
    <div class="optinablecampaigns-wrap">
        <div class="pure-g">
            <div class="pure-u-3-4">
                <?php if(isset($success_message)){?>
                <div class="op_alert_db_success" style="display:none;">
                    <strong><?php esc_html_e( 'Success', 'optinable' );?>:</strong>
                    <p><?php echo wp_kses_post($success_message)?></p>
                </div>
                <?php
                }?>
                <?php require_once( 'Tables/'.$subview.'.php' ); ?>  
                <!-- op_dashboard_cards -->
            </div>
            <?php include_once( 'optinable-admin-sidebar.php' ); ?>
        </div>
        <!--<div class="optinablecampaign-empty">
            No campaign(s) found.
        </div>-->
    </div>
    <?php include_once( 'placeholders/CampaignCreate.php' ); ?>
</div>
<?php include_once( 'optinable-admin-foot.php' ); ?>