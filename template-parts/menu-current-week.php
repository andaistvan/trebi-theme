<?php

// napok csoportosítása
$args = array(
   'meta_query' => array(
      array(
         'key' => 'wccaf_shippingdate',
         'value' => array(date('Ymd', strtotime('next Monday +7day')), date('Ymd', strtotime('next Friday +7day'))),
         'compare' => 'BETWEEN',
         'type' => 'DATE',
      ),
   ),
   'post_type' => 'product',
   'nopaging' => true,
   'meta_key' => 'wccaf_shippingdate',
   'orderby' => 'meta_value',
   // 'Include' => '14,15,13',
   'order' => 'ASC',
   // 'groupby' => 'wccaf_shippingdate',
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
           echo '<div class="current-day">';
           $actual_day_name = (date_format(date_create_from_format('Y.m.d.', $postdate), 'l'));
           echo '<h4>'.($actual_day_name).'</h4>';
           echo '</div>';

         //   echo '<h4>'.$postdate.'</h4>';

           $newDateString = (date_format(date_create_from_format('Y.m.d.', $postdate),  ' d. l'));
   // ...and change the stored date for the current group
   $dategroup = $postdate;
   //  product per day
?>

<ul class="daily_product_cont">
<?php
$husos_query = new WP_Query(
array(
'post_type' => 'product',
'meta_key' => 'wccaf_shippingdate',
'meta_value' => $dategroup,
'product_cat' => 'husos',
)
);

           $paleo_query = new WP_Query(
array(
'post_type' => 'product',
'meta_key' => 'wccaf_shippingdate',
'meta_value' => $dategroup,
'product_cat' => 'paleo',
)
);

           $vega_query = new WP_Query(
array(
'post_type' => 'product',
'meta_key' => 'wccaf_shippingdate',
'meta_value' => $dategroup,
'product_cat' => 'vega',
)
);
           ?>
<?php  if ($husos_query->have_posts()) {
     while ($husos_query->have_posts()) {
         ($husos_query->the_post());
         ?>
<li class="product">
<!-- // top block -->
<?php global $product;
         ?>
<div class="food-name">
<?php echo  '<p class=kaja-category>'.strip_tags($product->get_categories()).'</p>';
         ?>
<div class="prod-title">
<?php do_action('woocommerce_shop_loop_item_title');
         ?>
</div><!-- // prod-title -->
</div><!-- // food-name -->
<!-- // top block
// ÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
// bottom block -->
<div class="order-panel">
<!-- // info toggler -->
<?php get_template_part('template-parts/info-toggler');
         ?>
<!-- // cart & quaintity -->
<?php get_template_part('template-parts/cart-quantity');
         ?>
</div><!-- // order-panel -->
<!-- // bottom block -->
</li><!-- // li product -->
<?php

     } // end while
 } // end if
wp_reset_postdata();
           ?>

<!-- ********* PALEO ********* -->
<!-- ********* PALEO ********* -->
<!-- ********* PALEO ********* -->

<?php  if ($paleo_query->have_posts()) {
     while ($paleo_query->have_posts()) {
         ($paleo_query->the_post());
         ?>
<li class="product">
<!-- // top block -->
<?php global $product;
         ?>
<div class="food-name">
<?php echo  '<p class=kaja-category>'.strip_tags($product->get_categories()).'</p>';
         ?>
<div class="prod-title">
<?php do_action('woocommerce_shop_loop_item_title');
         ?>
</div><!-- // prod-title -->
</div><!-- // food-name -->
<!-- // top block
// ÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
// bottom block -->
<div class="order-panel">
<!-- // info toggler -->
<?php get_template_part('template-parts/info-toggler');
         ?>
<!-- // cart & quaintity -->
<?php get_template_part('template-parts/cart-quantity');
         ?>
</div><!-- // order-panel -->
<!-- // bottom block -->
</li><!-- // li product -->
<?php

     } // end while
 } // end if
wp_reset_postdata();
           ?>

<!-- ********* vega ********* -->
<!-- ********* vega ********* -->
<!-- ********* vega ********* -->

<?php  if ($vega_query->have_posts()) {
     while ($vega_query->have_posts()) {
         ($vega_query->the_post());
         ?>
<li class="product">
<!-- // top block -->
<?php global $product;
         ?>
<div class="food-name">
<?php echo  '<p class=kaja-category>'.strip_tags($product->get_categories()).'</p>';
         ?>
<div class="prod-title">
<?php do_action('woocommerce_shop_loop_item_title');
         ?>
</div><!-- // prod-title -->
</div><!-- // food-name -->
<!-- // top block
// ÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷÷
// bottom block -->
<div class="order-panel">
<!-- // info toggler -->
<?php get_template_part('template-parts/info-toggler');
         ?>
<!-- // cart & quaintity -->
<?php get_template_part('template-parts/cart-quantity');
         ?>
</div><!-- // order-panel -->
<!-- // bottom block -->
</li><!-- // li product -->
<?php

     } // end while
 } // end if
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
