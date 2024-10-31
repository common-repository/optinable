<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="op_dashboard_cards">
    <div class="op_inner_card">
        <h3 style=" text-transform: capitalize;width: 200px; position:relative">
            <div><?php esc_html_e( 'Slide In', 'optinable' ); ?>  </div>
            <span class="op_list_ini_head"><?php echo esc_html($init_heading);?></span>
            <span class="optinable-frm-tag type-slidein">
                <?php esc_html_e( 'Slide In', 'optinable' ); ?>    
            </span>
        </h3>
        <p><?php esc_html_e( 'Create slide-in forms to capture attention without interrupting the user experience.', 'optinable' ); ?>
        </p>
        <a class="op_dashb_cr_button" data-type="slidein" href="#create-campaign">
            <i class="fa-solid fa-plus" aria-hidden="true"></i> 
            <?php esc_html_e( 'Add New', 'optinable' ); ?>
        </a>
        <div class=""><!--optinablepure-padding-->
            <div class="optinabletoggle-tab">
                <div class="pure-g">
                    <div class="pure-u-1-5"> 
                        <div class="optinablecampaign-stats-box">
                            <?php esc_html_e( 'CAMPAIGN NAME', 'optinable' ); ?>
                        </div>
                    </div>
                    <div class="pure-u-1-5">
                        <div class="optinablecampaign-stats-box" align="center">
                            <span class="op_tooltip top opz_info_tip" data-tip="<?php esc_html_e( 'Impressions: The number of times your campaign has been displayed to a visitor.', 'optinable' );?>">
                                <?php esc_html_e( 'IMPRESSIONS', 'optinable' ); ?> <i class="fa-solid fa-circle-info"></i>
                            </span> 
                        </div>
                    </div>
                    <div class="pure-u-1-5"> 
                        <div class="optinablecampaign-stats-box" align="center">
                            <span class="op_tooltip top opz_info_tip" data-tip="<?php esc_html_e( 'Engagements: The number of interactions by visitors on this campaign. e.g (CTA clicks, conversion) .', 'optinable' );?>">
                                <?php esc_html_e( 'ENGAGEMENTS', 'optinable' ); ?> <i class="fa-solid fa-circle-info"></i>
                            </span>
                        </div>
                    </div>
                    <div class="pure-u-1-5"> 
                        <div class="optinablecampaign-stats-box" align="center">
                            <span class="op_tooltip top opz_info_tip" data-tip="<?php esc_html_e( 'Conversions: The total subscribers who are opted-in through this campaign.', 'optinable' );?>">
                                <?php esc_html_e( 'CONVERSIONS', 'optinable' ); ?> <i class="fa-solid fa-circle-info"></i>
                            </span>
                        </div>
                    </div>
                    <div class="pure-u-1-5"> 
                        <div class="optinablecampaign-stats-box" style="padding-left: 35px;">
                            <?php esc_html_e( 'ACTION', 'optinable' ); ?>
                        </div>
                    </div>
                </div>
                <div class="optinablecampaign-card optinabletab">
                    <?php 
                    // "full screen" , "fullscreen"  "fullscreen.png",
                    foreach($campaign_slidein as $row)
                    {?>
                        <div class="pure-g optinable-dashboard-table-row">
                            <div class="pure-u-1-5">
                                <div class="optinablecampaign-stats-row">
                                    <div><?php echo esc_html($row['campaign_name']);?></div>
                                </div>
                            </div>
                            <div class="pure-u-1-5">
                                <div class="optinablecampaign-stats-row" align="center">
                                    <span><?php echo esc_html($row['impressions']);?></span>
                                </div>
                            </div>
                            <div class="pure-u-1-5">
                                <div class="optinablecampaign-stats-row" align="center">
                                    <span>
                                        <?php echo esc_html($row['engagements']);?>
                                        <?php
                                        $OPZHash = wp_hash($row['campaign_id'], OPTINABLE_HASH_STRING); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="pure-u-1-5">
                                <div class="optinablecampaign-stats-row" align="center">
                                    <span><?php echo esc_html($row['conversions']);?></span>
                                </div>
                            </div>
                            
                            <?php include("Actions.php")?>
                            
                        </div>
                        <?php
                    }?>
                </div><!--optinabletoggle-tab-->
            </div>
        </div>
        <div align="right">
<a href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-slidein&mod=live" class="op_db_view_all_campaigns _live <?php echo esc_attr($init_heading)?>"><?php esc_html_e( 'Live', 'optinable' ); ?> </a> | 
<a href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-slidein&mod=unpublished" class="op_db_view_all_campaigns _unpub <?php echo esc_attr($init_heading)?>"><?php esc_html_e( 'UnPublished', 'optinable' ); ?> </a> | 
<a href="<?php echo esc_url(get_site_url())?>/wp-admin/admin.php?page=optinable-campaign-list-slidein&mod=archived" class="op_db_view_all_campaigns _arch <?php echo esc_attr($init_heading)?>"><?php esc_html_e( 'Archived', 'optinable' ); ?> </a>
        </div>
    </div>
</div>