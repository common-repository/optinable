<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly?>

<nav class="navigation-tab">
  
  <div class="navigation-tab-item ">
    <a  class="navigation-tab__icon opable_previ_step_btn opable_previ_next_step_btn" title="<?php esc_html_e( 'Previous Step', 'optinable' ); ?>" data-opable-wizard-id="1">
      <i class="fa-solid fa-arrow-left"></i>
    </a>
  </div>

  <div class="navigation-tab-item ">
    <a  class="navigation-tab__icon opable_nex_step_btn opable_previ_next_step_btn" data-opable-wizard-id="3" title="<?php esc_html_e( 'Next Step', 'optinable' ); ?>">
      <i class="fa-solid fa-arrow-right"></i>
    </a>
  </div>
 
  <button type="button" class="op_show_row_templates">
    <span><i class="fa-solid fa-table-cells-large" style="margin: 7px 0 7px;"></i></span>
    <em><?php esc_html_e( 'Insert a layout', 'optinable' ); ?></em>
  </button>
  
</nav>
