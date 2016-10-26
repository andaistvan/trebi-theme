<?php
/*
Template Name: teszt2
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
<section id="teszt" class="fullwidth">
   <div class="main-container bg-white">

      <ul class="products">

         <?php

            $args = array(
               'post_type' => 'product',
               'post_per_page' => '-1',
               'orderby' => 'DATE',
               'order' => 'ASC',
               'meta_query' => array(
                  array(
                  'key' => 'wccaf_shippingdate',
                  'value' => array(date('Ymd', strtotime('+1day')), date('Ymd', strtotime('+20day'))),
                  'type' => 'DATE',
                  'compare' => 'BETWEEN',
                  ),
               ),
            );
            $loop = new WP_Query($args);
            ?>


            <?php
            if ($loop->have_posts()) {
                while ($loop->have_posts()) : $loop->the_post();
                echo '<li class="product">';

                echo '<div class="title-cont">';
                echo '<p class="data-cont">';
                print_r(get_post_meta($post->ID, 'wccaf_shippingdate', true));
                ?></p>

                <?php do_action('woocommerce_shop_loop_item_title');
                ?>
               </div><!-- title-cont -->
                <div id="cart-box-small">
                <?php do_action('woocommerce_after_shop_loop_item');
                ?>
                </div>
            </li>
            <?php  endwhile;
            } else {
                echo 'ejj';
            }
            wp_reset_postdata();
          ?>

      </ul><!-- products -->

      <!-- products -->
   </div><!-- main-container bg-white -->



   </div><!-- main-container bg-white -->
</section><!-- teszt -->

<?php
get_footer();
?>
