<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<?php require_once( 'optinable-admin-head.php' ); ?>    
    
<div class="optinablebody">  
    <div class="optinablecampaigns-wrap">
        <div class="pure-g">  
            <div class="pure-u-3-4">

                <div class="optinable-dashboard-top-intro">
                    <h3><?php esc_html_e( 'Hello Admin', 'optinable' );?>,</h3>
                    <h2><?php esc_html_e( 'Welcome to OptinAble', 'optinable' );?><i></i></h2> 
                    <p><?php esc_html_e( 'OptinAble is the ultimate WordPress plugin for collecting email subscribers. With our easy-to-use interface, you can create beautiful popups, forms, and slide-ins to grow your email list in no time. Get started today and see the results for yourself!', 'optinable' );?>
                    </p>
                </div>
                <?php if(isset($success_message)){?>
                    <div class="op_alert_db_success" style="display:none;">
                        <strong><?php esc_html_e( 'Success', 'optinable' );?>:</strong>
                        <p><?php echo wp_kses_post($success_message)?></p>
                    </div>
                    <?php
                }?>
                <br>
                <?php require_once( 'Tables/Lightbox.php' ); ?>  
                <?php require_once( 'Tables/Stickybar.php' ); ?>  
                <?php require_once( 'Tables/Slidein.php' ); ?>  
                <?php require_once( 'Tables/Embed.php' ); ?>  
                
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
<script type="text/javascript">
    if(<?php echo $pingstatcall?>){
        optinable_pingdom();
    }
</script>
<?php include_once( 'optinable-admin-foot.php' ); ?>