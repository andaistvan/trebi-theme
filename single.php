<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
get_header(); ?>

<section id="pages" class="fullwidth">
   <div class="main-container">

		<?php
        while (have_posts()) : the_post();

            get_template_part('template-parts/content', get_post_format());

            the_post_navigation();

            // If comments are open or we have at least one comment, load up the comment template.
            // if (comments_open() || get_comments_number()) :
            //     comments_template();
            // endif;

        endwhile; // End of the loop.
        ?>
        <div class="sidebar-cont">
          <?php dynamic_sidebar('teszt'); ?>
        </div>


   </div><!-- main-container -->
</section><!-- section#pages -->

<?php
get_footer();
