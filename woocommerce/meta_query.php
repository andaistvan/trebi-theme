<?php
/*
Template Name: teszt
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
            'numberposts' => -1,
            'post_type' => 'product',
            'key' => '_mydatepicker',
            'value' => '',
            'id' => '_mydatepicker',
            'type' => 'datepicker',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'compare' => 'NOT LIKE',
            );

         // The Query
         $query = new WP_Query($args);

        ?>

        <?php if ($query->have_posts()): ?>

        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <ul style="border: 1px solid blue;">


                <li class="product">

                   <?php do_action('woocommerce_shop_loop_item_title'); ?>
                     <p class="date-cont">
                        <?php
                        global $wc_cpdf;
                        echo $wc_cpdf->get_value(get_the_ID(), '_mydatepicker');
                        ?>
                     </p><!-- date-cont -->
                     <div id="cart-box-small">
                        <?php do_action('woocommerce_after_shop_loop_item'); ?>
                     </div>

                </li>

            </ul>
         <?php endwhile; ?>

  <?php endif ?>
<?php wp_reset_query();  ?>
</ul><!--/.products-->
   </div><!-- main-container bg-white -->
</section><!-- teszt -->

<?php
get_footer();
?>
