<?php
/*
Template Name: teszt3
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
<section id="teszt3" class="fullwidth">

   <div class="main-container">


         <?php

   // napok csoportosítása
         $args = array(
            'meta_query' => array(
               array(
                  'key' => 'wccaf_shippingdate',
                  'value' => array(date('Ymd', strtotime('+1day')), date('Ymd', strtotime('+30day'))),
                  'compare' => 'BETWEEN',
                  'type' => 'DATE',
                ),
            ),
            'post_type' => 'product',
            'nopaging' => true,
            'meta_key' => 'wccaf_shippingdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'groupby' => 'wccaf_shippingdate',
         );
         $loop3 = new WP_Query($args);
         ?>


      <ul class="products">

         <?php
         $dategroup = '';

            if ($loop3->have_posts()) {
                while ($loop3->have_posts()) : $loop3->the_post();

                $postdate = get_post_meta(get_the_ID(), 'wccaf_shippingdate', true);

                if ($postdate != $dategroup) {
                    // In that case, this is a new date that hasn't yet been displayed
            // So, we output the title...
            echo '<li class="day">';
                    echo '<h4>'.$postdate.'</h4>';
            // ...and change the stored date for the current group
            $dategroup = $postdate;
            //  product per day
         ?>

               <ul class="daily_product_cont">
               <?php
                  $kaja_query = new WP_Query(
                     array(
                        'post_type' => 'product',
                        'meta_key' => 'wccaf_shippingdate',
                        'meta_value' => $dategroup,
                        'posts_per_page' => '3',
                        'order-by' => 'meta-value',
                        'order' => 'ASC',
                     )
                  );
                    if ($kaja_query->have_posts()) {
                        while ($kaja_query->have_posts()) : $kaja_query->the_post();
                        ?>
                     <?php
                     echo '<li class="product">';
                        global $product;
                        echo $product->get_categories();
                        do_action('woocommerce_shop_loop_item_title');
                        echo '</li>';

                        endwhile;
                    }
                    wp_reset_postdata();
                    ?>
               </ul><!-- napikaja_cont -->


               <?php

                }   // postdate ciklus

                   echo '</li>';

                endwhile;
            } else {
                echo 'jájj';
            }
                     wp_reset_postdata();
            ?>

      </ul><!-- products -->

      <div class="sidebar-cont">
         <?php dynamic_sidebar('teszt'); ?>
      </div>

   </div><!-- main-container bg-white -->

</section><!-- teszt -->
<?php
get_footer();
?>
