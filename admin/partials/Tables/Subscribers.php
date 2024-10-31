<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="op_dashboard_cards">
    <div class="op_inner_card">
        <h3>
            <?php esc_html_e( 'Subscribers', 'optinable' ); ?>
        </h3>
        <p><?php esc_html_e( 'Manage your subscribers and user submitted data.', 'optinable' ); ?></p>
        <div class="optinable_subs_select_wrap">
            <form id="op_find_campaign_subsc" method="get" action="">
                <input type="hidden" name="page" value="optinable-campaign-subscribers">
                <select name="campaign_id">
                    <?php echo ($campaign_options);?>
                </select>
                <button class="sbmt_find_subscribers"><?php esc_html_e( 'Show Subscribers', 'optinable' ); ?></button>
                <?php
                if (!empty($subscribers_arr) && !$empty) {
                    $export_url = add_query_arg(array(
                        'action' => 'export_email_list',
                        'campaign_id' => $campaign_id,
                    ), admin_url('admin-ajax.php'));

                    if (is_string($campaign_id) || is_numeric($campaign_id)) {
                        ?>
                        <a href="<?php echo esc_url($export_url); ?>" class="op_export_subscribers"><i class="fa-solid fa-download"></i> 
                            <?php esc_html_e( 'Export Email List', 'optinable' ); ?>
                        </a>
                        <?php
                    }
                }?>
            </form>
        </div>
        <div class="">
            <?php
            if($subscribers_arr){?>
                <div class="optinabletoggle-tab optinable_subscriber_table">
                    <div class="pure-g">
                        <div class="pure-u-1-3"> 
                            <div class="optinablecampaign-stats-box" style="width:50px">
                                <?php esc_html_e( 'ID', 'optinable' ); ?>
                            </div>
                            <div class="optinablecampaign-stats-box">
                                <?php esc_html_e( 'IP', 'optinable' ); ?>
                            </div>
                        </div>
                        <div class="pure-u-1-3"> 
                            <div class="optinablecampaign-stats-box" align="left">
                                <span>
                                    <?php esc_html_e( 'EMAIL', 'optinable' ); ?> 
                                </span>
                            </div>
                        </div>
                        <div class="pure-u-1-3"> 
                            <div class="optinablecampaign-stats-box" align="left">
                                <span>
                                    <?php esc_html_e( 'SUBMITTED DATE', 'optinable' ); ?> 
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="optinablecampaign-card optinabletab">
                        <?php 
                        echo wp_kses_post($subscribers_arr['table']);?>
                    </div><!--optinabletoggle-tab wp_kses_post-->
                </div>
                <?php 
            }
            else {
               echo '<div class="op_norecord_div">' . esc_html_e('No record(s) found.', 'optinable') . '</div>';
            }?>
        </div>
        <div align="right">
            <?php
              echo isset($subscribers_arr['paging']) ? wp_kses_post( $subscribers_arr['paging'] ) : '';          
            ?>
        </div>
    </div>
</div>
