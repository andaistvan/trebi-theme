<?php
/**
 * The template for displaying product content within loops.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 *
 * @author  WooThemes
 *
 * @version 2.6.1
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}
?>


<li class="product-cont"<?php post_class(); ?>>

   <p class="date-cont">
      <?php
      /* Post Id or Product Id will do */
      echo get_post_meta(get_post()->ID, 'wccaf_date', true);
      ?>
   </p><!-- date-cont -->
   <?php do_action('woocommerce_shop_loop_item_title'); ?>
   <div id="cart-box-small">
      <?php do_action('woocommerce_after_shop_loop_item'); ?>
   </div>
</li>
