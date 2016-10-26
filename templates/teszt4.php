<?php
/*
Template Name: teszt4
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
<section id="teszt4" class="fullwidth">
   <div class="main-container bg-white">





         <?php

            $date_args = array(
               'meta_query' => array(
                  array(
                  'key' => 'wccaf_shippingdate',
                  'value' => array(date('Ymd', strtotime('+1day')), date('Ymd', strtotime('+3day'))),
                  'type' => 'date',
                  'compare' => 'BETWEEN',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  // 'groupby' => 'wccaf_shippingdate',
                  ),
               ),
               'post_type' => 'product',
               'nopaging' => true,
               'meta_key' => 'wccaf_shippingdate',
               'orderby' => 'meta_value',
               'order' => 'ASC',
               'groupby' => 'wccaf_shippingdate',
            );
            $loop = new WP_Query($date_args);

            ?>

<!-- 1 nap             -->
<!-- <ul class="products"> -->

            <?php
             echo '<ul class="products">';
               if ($loop->have_posts()) {
                   while ($loop->have_posts()) : $loop->the_post();

                   $days = get_post_meta($post->ID, 'wccaf_shippingdate', false);
                  //  echo '<h3>This post is inspired by:</h3>';
                   echo '<ul class="products">';
                   foreach ($days as $day) {
                       echo '<li class="product">'.$day.'</li>';
                   }
                   echo '</ul>';

                   endwhile;
               } else {
                   echo 'jájj';
               }
            wp_reset_postdata();
            ?>

<!-- </ul> -->
<!-- 1 nap             -->



      <div class="sidebar-cont">
         <?php dynamic_sidebar('teszt'); ?>
      </div>


   </div><!-- main-container bg-white -->





<!-- variation 2 -->

   <div class="main-container bg-light-blue">





         <?php

            $date_args = array(
               'meta_query' => array(
                  array(
                  'key' => 'wccaf_shippingdate',
                  'value' => array(date('Ymd', strtotime('+0day')), date('Ymd', strtotime('+30day'))),
                  'type' => 'date',
                  'compare' => 'IN',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  // 'groupby' => 'wccaf_shippingdate',
                  ),
               ),
               'post_type' => 'product',
               'nopaging' => true,
               'meta_key' => 'wccaf_shippingdate',
               'orderby' => 'meta_value',
               'order' => 'ASC',
               'groupby' => 'wccaf_shippingdate',
            );
            $loop = new WP_Query($date_args);

            ?>

   <!-- 1 nap             -->
   <ul class="products">

            <?php
            $posts = $loop->get_posts();
            foreach ($posts as $post) {
                $my_date = get_post_meta($post->ID, 'wccaf_shippingdate-author', true);

                $my_date &= $my_date2;
                print_r('<br>'.$my_date.'print_r');

                echo'<li class="product">';
                echo '<h4>'.$my_date2.' mydate </h4>';
                print_r('get_post_meta '.get_post_meta($post->ID, 'wccaf_shippingdate', true));

                do_action('woocommerce_shop_loop_item_title');
                echo '</li>';
            }
            // endwhile;
            wp_reset_query();
            ?>

   </ul>
   <!-- 1 nap             -->



      <div class="sidebar-cont">
         <?php dynamic_sidebar('teszt'); ?>
      </div>


   </div><!-- main-container bg-white -->

</section><!-- teszt -->

<?php
get_footer();
?>
