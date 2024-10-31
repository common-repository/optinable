<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<div class="pure-u-1-4" style="">
    <div class="opable_dashb_right">
        <label><i class="fa-regular fa-thumbs-up"></i></label>
        <h3><?php esc_html_e( 'Rate Us', 'optinable' );?></h3>
        <p>
            <?php esc_html_e( 'We value your opinion and really appreciate every single review. Thank you for your support!', 'optinable' );?>
        </p>
        <a href="https://wordpress.org/support/plugin/optinable/reviews/" target="_blank"><?php esc_html_e( 'Submit a Review', 'optinable' );?> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
    </div>
    <?php if(!get_option( "_optinable_joined_list" ))
    {?>
        <div class="opable_dashb_right type-contentlocker">
            <label><i class="fa-solid fa-people-group"></i></label>
            <h3><?php esc_html_e( 'Join the Club', 'optinable' );?></h3>
            <p><?php esc_html_e( 'Join our exclusive email list to be the first to know about our upcoming features, ad-ons and much more.', 'optinable' );?>
            </p>
            <?php 
            $_wpnonce = wp_create_nonce("optinable_join_mail_list"); 
            global $current_user;
            wp_get_current_user();
            $user_email = (string) $current_user->user_email; ?>
            <div class="op_dashb_join_form_mesg" style="display:none;">
                <i class="fa-regular fa-thumbs-up"></i> <?php esc_html_e( 'Thank you for joining the list.', 'optinable' );?>
            </div>

            <form action="" class="op_dashb_join_form" method="post">
                <input type="text" name="op_email_join" class="op_dashboard_join_email_field" value="<?php echo esc_attr( $user_email ); ?>" placeholder="your-email@...">
                <button type="button" class="op_dashboard_join_btn _opz_has_loader" data-nonce="<?php echo esc_attr( $_wpnonce ); ?>"><?php esc_html_e( 'Submit', 'optinable' );?></button>
            </form>
        </div>
        <?php
    }?>
    
    <div class="opable_dashb_right">
        <label><i class="fa-solid fa-book"></i></label>
        <h3><?php esc_html_e( 'Documentation', 'optinable' );?></h3>
        <p><?php esc_html_e( 'We offer an extensive documentation that covers everything about OptinAble.', 'optinable' );?>
            
        </p>
        <a href="https://optinable.com/docs/" target="_blank"><?php esc_html_e( 'Check out Documentation', 'optinable' );?> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
    </div>
    <div class="opable_dashb_right">
        <label><i class="fa-regular fa-life-ring"></i></label>
        <h3><?php esc_html_e( 'Support', 'optinable' );?></h3>
        <p><?php esc_html_e( 'Have some questions? Contact us today and let us help you get the most out of OptinAble.', 'optinable' );?>
            
        </p>
        <a href="https://optinable.com/contact-us/" target="_blank"><?php esc_html_e( 'Explore Plugin Support', 'optinable' );?> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        <br>
        <a href="https://codeleftover.com/" target="_blank"><?php esc_html_e( 'Contact Plugin Developer', 'optinable' );?> <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
    </div>

    <div class="opable_dashb_right">
        
        <label><i class="fa-regular fa-newspaper"></i></label>
        <h3><?php esc_html_e( 'Features', 'optinable' );?></h3>
        <p></p>
        <a href="https://optinable.com/exit-intent/" target="_blank">Exit-Intent Trigger</a>
        <br>
        <a href="https://optinable.com/drag-n-drop-builder/" target="_blank">Drag & Drop Builder</a>
        <br>
        <a href="https://optinable.com/campaign-targeting/" target="_blank">Campaign Targeting</a>
        <br>
        <a href="https://optinable.com/built-in-templates/" target="_blank">Built-in Templates</a>
    </div>
    
</div>