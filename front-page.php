<?php get_header(); ?>
<?php //get_template_part('sections/section', 'header'); ?>

<?php 
    
    /**
     * Header section
     * @var [type]
     */
    //$intro_section_show = get_theme_mod('pixova_lite_intro_visibility', 1);

    //if( isset( $intro_section_show ) && $intro_section_show == 1 ) {
    //  get_template_part('sections/section', 'intro');
    //}

    

    if ( 'posts' == get_option( 'show_on_front' ) ) { ?>

    <div class="container">
        <div class="row">
            <section class="has-padding">

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <?php if(have_posts() ) {

                        while(have_posts() ) {
                            the_post();
                            ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="mt-date">
                                    
                                </div><!--/.mt-date-->

                                <header class="entry-header">
                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header><!-- .entry-header -->

                                <div class="entry-meta">
                                    <time datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php echo get_the_date( get_option('date_format'), $post->ID); ?></time>
                                    <?php printf(
                                        // Translators: 1 is the post author, 2 is the category list.
                                        __( '<span class="post-meta-separator">&middot</span>by %1$s<span class="post-meta-separator">&middot</span>%2$s', 'high-star' ),
                                        get_the_author(),
                                        // Translators: Category list separator.
                                        get_the_category_list( __( ', ', 'high-star' ), '', false )
                                    ); ?>
                                </div><!--/.entry-meta-->

                                <?php if( has_post_thumbnail() ) { ?>
                                    <aside class="entry-featured-image">
                                        <?php echo get_the_post_thumbnail($post->ID, 'high-star-featured-blog-image'); ?>
                                    </aside><!--/.entry-featured-image-->
                                <?php } ?>

                                <div class="entry-content">
                                    <?php
                                        echo apply_filters('the_content', substr(get_the_content(), 0, 200) );

                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'high-star' ),
                                            'after'  => '</div>',
                                        ) );

                                    ?>
                                </div><!-- .entry-content -->

                                <div class="clearfix"></div><!--/.clearfix-->
                            </article><!-- #post-## -->

                        <?php } ?>
                    <?php } ?>

                </div><!--/.col-lg-8-->


                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
                    <aside class="mt-blog-sidebar">
                        <?php
                        if(is_active_sidebar('blog-sidebar')) {
                            dynamic_sidebar('blog-sidebar');
                        } else {
                            the_widget( 'WP_Widget_Search', sprintf('title=%s', __('Search', 'high-star') ) );
                            the_widget( 'WP_Widget_Calendar', sprintf('title=%s', __('Calendar', 'high-star') ) );
                        }
                        ?>
                    </aside> <!--/.mt-blog-sidebar-->
                </div><!--/.col-lg-3-->

                <div class="mt-custom-pagination col-lg-12">
                    <?php the_posts_pagination(); ?>
                </div><!--/.mt-custom-pagination-->


            </section><!--/section-->
        </div><!--/.row-->
    </div><!--/.container-->

<?php } // if
else {


    $about_section_show = get_theme_mod('pixova_lite_about_visibility', 1);

    if( isset( $about_section_show ) && $about_section_show == 1 ) {
        get_template_part('sections/section', 'about');
    }
    
    /**
     * Recent works section
     * @var [type]
     */
    $works_section_show = get_theme_mod('pixova_lite_works_visibility', 1);

    if( isset( $works_section_show ) && $works_section_show == 1) {
        get_template_part('sections/section', 'works');
    }
    /**
     * Testimonials section
     * @var [type]
     */
    $testimonials_section_show = get_theme_mod('pixova_lite_testimonials_visibility', 1);

    if( isset( $testimonials_section_show ) && $testimonials_section_show == 1 ) {
        get_template_part('sections/section', 'testimonials');
    }

    /**
     * News section
     * @var [type]
     */
    $news_section_show = get_theme_mod('pixova_lite_news_visibility', 1);

    if( isset( $news_section_show ) && $news_section_show == 1 ) {
        get_template_part('sections/section', 'news');
    }

    /**
     * Team section
     * @var [type]
     */
    $team_section_show = get_theme_mod('pixova_lite_team_visibility', 1);
    if( isset( $team_section_show ) && $team_section_show == 1 ) {
        get_template_part('sections/section', 'team');
    }

    /**
     * Contact section
     * @var [type]
     */
    $contact_section_show = get_theme_mod('pixova_lite_contact_visibility', 1);

    if( isset( $contact_section_show ) && $contact_section_show == 1 ) {
        get_template_part('sections/section', 'contact');
    }

    } // else
?>


<?php get_footer(); ?>