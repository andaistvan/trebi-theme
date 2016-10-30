<?php
/*
Template Name: teszt3
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>
<section id="teszt3" class="fullwidth">

<div id="temp-widget-cont">
   <?php dynamic_sidebar('teszt') ?>
</div><!-- temp-widget-cont -->

   <div class="main-container">

<!-- next week -->
      <div class="week-menu-cont">
         <h2 class="week-datas">
            <?php echo date('W.', strtotime('next week'))  ?> hét
            <?php echo date('m.d. - ', strtotime('next monday')), date('m.d.', strtotime('next friday'))?>
         </h2><!-- week-datas -->
         <?php get_template_part('template-parts/menu-next-week'); ?>
      </div><!-- week-menu-cont -->


<!-- next week utáni hét -->
      <div class="week-menu-cont">
         <h2 class="week-datas">
            <?php echo date('W.', strtotime('next week +1week'))  ?> hét
            <?php echo date('m.d. - ', strtotime('next monday +7day')), date('m.d.', strtotime('next friday +7day'))?>
         </h2><!-- week-datas -->
         <?php get_template_part('template-parts/menu-current-week'); ?>
      </div><!-- week-menu-cont -->






      <!-- <div class="sidebar-cont">
         <?php dynamic_sidebar('teszt'); ?>
      </div> -->

   </div><!-- main-container bg-white -->

</section><!-- teszt -->
<?php
get_footer();
?>
