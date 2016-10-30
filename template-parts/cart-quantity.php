<?php
/**
 * ajax cart & quantity button.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */;
?>

<div class="cart-contbox">
   <?php
   get_template_part('template-parts/info-toggler');

   do_action('custom_addtocart', 'woocommerce_template_loop_add_to_cart');   ?>

</div><!-- cart-contbox -->
