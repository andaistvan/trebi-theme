<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer fullwidth" role="contentinfo">
   <div class="main-container">
      <p>©<?php echo date('Y'); ?> Trebi Konyhája</p>
   </div>

</footer><!-- #colophon -->

</div><!-- #page -->


<?php wp_footer(); ?>

<script type="text/javascript">
$(document).foundation();
</script>

<!-- quantity button formázás -->
<script type="text/javascript">
jQuery(document).ready(function($) {
$(".product_quantity_minus").click(function(e){
   var quantityInput = $(this).closest(".quantity").children("input");
   var currentQuantity = parseInt($(quantityInput).val());
   var newQuantity = ( currentQuantity > 1 ) ?  ( currentQuantity - 1) : 1;
   $(quantityInput).val(newQuantity);
});

$(".product_quantity_plus").click(function(e){
   var max_quantity = 99999;
   var quantityInput = $(this).closest(".quantity").children("input");
   var currentQuantity = parseInt($(quantityInput).val());
   var newQuantity = ( currentQuantity >= max_quantity ) ?  max_quantity : ( currentQuantity+1 );
   $(quantityInput).val(newQuantity);
});
});
</script>



</body>
</html>
