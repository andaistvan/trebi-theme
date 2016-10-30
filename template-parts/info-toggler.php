<?php
/**
 * note field - accordion.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */;
 ?>
 <!-- info toggler -->
<div class="info-toggler-cont">
<?php
   $toggler_id = get_the_ID();
 ?>
<a><button class="info-toggler-button" data-toggle="panel-<?php echo $toggler_id ?>"><p>I</p></button></a>
<div class="callout" style="display:none;" id="panel-<?php echo $toggler_id ?>" data-toggler data-animate="hinge-in-from-bottom hinge-out-from-bottom">
   <p><?php echo $toggler_id ?><br>Poduct excerpt</p>
</div>








</div>
<!-- accordion -->
<?php
