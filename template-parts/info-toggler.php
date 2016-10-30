
 <!-- * note field - info toggler. -->

 <!-- info toggler -->
<div class="info-toggler-cont">
   <?php $toggler_id = get_the_ID(); ?>

<a><button class="info-toggler-button" data-toggle="panel-<?php echo $toggler_id ?>">
   <i class="fa fa-info-circle" aria-hidden="true"></i>
</button></a>
<div class="callout" style="display:none;" id="panel-<?php echo $toggler_id ?>" data-toggler data-animate="hinge-in-from-bottom hinge-out-from-bottom">
   <p><?php echo $toggler_id ?><br>Poduct excerpt</p>
</div>

</div>
