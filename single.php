<?php get_header(); ?>
<?php //get_template_part('sections/section','header-single'); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post();
    	get_template_part('template-parts/content', 'single');
    endwhile; ?>
<?php get_footer(); ?>