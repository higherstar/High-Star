<?php /* Template Name: Blog Template */ ?>

<?php get_header(); ?>
<?php //get_template_part('sections/section', 'header-archive'); ?>

<div class="container">
    <div class="row">
        <section class="has-padding">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query = new WP_Query( array(
                        'post_type' => 'post',
                        'showposts' => get_option('posts_per_page'),
                        'paged' => $paged)
                    );

                    if( $wp_query->have_posts() ):
                        while ($wp_query->have_posts()) :
                            $wp_query->the_post();
                            get_template_part( 'template-parts/content', get_post_format() );
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div><!--/.col-lg-8-->

                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
                    <div class="mt-blog-sidebar">
                        <?php
                        if(is_active_sidebar('blog-sidebar')) {
                            dynamic_sidebar('blog-sidebar');
                        } else {
                            the_widget( 'WP_Widget_Search', sprintf('title=%s', __('Search', 'high-star') ) );
                            the_widget( 'WP_Widget_Calendar', sprintf('title=%s', __('Calendar', 'high-star') ) );
                        }
                        ?>
                    </div> <!--/.mt-blog-sidebar-->
                </div><!--/.col-lg-3-->

                <div class="mt-custom-pagination col-lg-12">
                    <?php the_posts_pagination(); ?>
                </div><!--/.mt-custom-pagination-->

        </section><!--/section-->
    </div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>
