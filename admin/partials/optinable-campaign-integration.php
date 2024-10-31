<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>
<div class="optinable_optin_display_rules_area_inner">
    <div class="optinable_steps_page_upper_head" style="width: 66%; min-width: 400px;">
        <h2><?php esc_html_e( 'Active Integration', 'optinable' );?></h2>
        <p><?php esc_html_e( "The local list and active third party apps will be receiving optinable's form data such as email address and name of the subscribers.", 'optinable' );?></p>

        <div class="" style=" margin-bottom: 50px;">
            <div class="optinable_local_list_integration_btn">
                <em><i class="fa-solid fa-circle-check"></i> 
                    <?php esc_html_e( 'Selected', 'optinable' );?>
                </em>
                <div align="center"><i class="fa-solid fa-database _pa_i"></i></div>
                <h3 style="position:relative;" class="op_tooltip bottom " 
                    data-tip="<?php esc_html_e( 'The name of the list will be visible to the subscribers while unsubscribing.', 'optinable' );?>">
                    <span>
                       <i class="fa-regular fa-pen-to-square"></i>
                    </span>
                    <input type="text" name="optinable_local_list_name" class="optinable_local_list_name" value="<?php esc_html_e( 'Local List', 'optinable' );?>">
                </h3>
                <p><?php esc_html_e( 'The subscribers data will be saved to local DB.', 'optinable' );?></p>
            </div>
        </div>
    </div><!--optinable_steps_page_upper_head  -->
</div><!-- optinable_optin_display_rules_area_inner -->
