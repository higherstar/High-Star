<?php

if ( current_user_can( 'edit_theme_options' ) ) {

	$pixova_lite_section_title     = get_theme_mod( 'pixova_lite_news_section_title', __( 'Latest news', 'high-star' ) );
	$pixova_lite_section_sub_title = get_theme_mod( 'pixova_lite_news_section_sub_title', __( 'Straight from our blog', 'high-star' ) );

} else {

	$pixova_lite_section_title     = get_theme_mod( 'pixova_lite_news_section_title' );
	$pixova_lite_section_sub_title = get_theme_mod( 'pixova_lite_news_section_sub_title' );

}


$pixova_lite_news_button_text                = get_theme_mod( 'pixova_lite_news_section_button_text' );
$pixova_lite_news_section_no_posts_per_slide = get_theme_mod( 'pixova_lite_news_section_no_posts_per_slide', 2 );

// section args
$pixova_lite_limit = get_option( 'posts_per_page', 4 );
// Logic used to dynamically create the layout, based on how blog posts have been set in the reading options
$pixova_lite_cols      = '';
$pixova_lite_news_size = '';
if ( $pixova_lite_limit == 1 ) {
	$pixova_lite_cols      = 'col-md-offset-4 col-sm-offset-3';
	$pixova_lite_news_size = 'col-md-4 col-sm-6 col-xs-12';
} else if ( $pixova_lite_limit == 2 ) {
	$pixova_lite_cols      = 'col-md-offset-2 col-sm-offset-1';
	$pixova_lite_news_size = 'col-md-4 col-sm-5 col-xs-12';
} else if ( $pixova_lite_limit == 3 ) {
	$pixova_lite_cols      = 'col-md-offset-1 col-xs-12';
	$pixova_lite_news_size = 'col-md-3 col-sm-4 col-xs-12';
} else if ( $pixova_lite_limit >= 4 ) {
	$pixova_lite_cols      = 'col-xs-12';
	$pixova_lite_news_size = 'col-md-3 col-sm-6 col-xs-12';
}
# Logic used for getting the blog template page ID
$page_which_uses_blog_template = pixova_lite_get_page_id_by_template();
# Turn off default featured images
$random_featured_images = get_theme_mod( 'pixova_lite_enable_default_images', 'images_disabled' );
echo '<section class="has-padding" id="news">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="text-center section-heading">';
echo '<h2 class="light-section-heading">' . esc_html( $pixova_lite_section_title ) . '</h2>';
echo '<div class="section-sub-heading">' . esc_html( $pixova_lite_section_sub_title ) . '</div>';
echo '</div><!--/.text-center.section-heading-->';
echo '</div><!--/.row-->';
echo '<div class="row">';
// query args
$args          = array(
	'post_type'      => 'post',
	'posts_per_page' => $pixova_lite_limit,
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$pixova_lite_q = new WP_Query( $args );
if ( $pixova_lite_q->have_posts() ) {
	// $i is used as counter for clearing blog posts
	$i = 1;
	echo '<div class="mt-blog-posts text-center">';
	echo '<div class="row">';
	echo '<div class="mt-blogpost-wrapper ' . $pixova_lite_cols . '"  data-slider-items="' . $pixova_lite_news_section_no_posts_per_slide . '">';
	while ( $pixova_lite_q->have_posts() ) {
		$pixova_lite_q->the_post();
		echo '<div class="' . $pixova_lite_news_size . '" style="width: 100%;">';
		echo '<div class="thumbnail">';
		if ( has_post_thumbnail( $pixova_lite_q->post->ID ) ) {
			echo '<a href="' . get_the_permalink() . '">';
			echo get_the_post_thumbnail( $pixova_lite_q->post->ID, 'high-star-homepage-blog-posts' );
			echo '</a>';
		} else if ( ! has_post_thumbnail() ) {
			echo '<div class="entry-featured-image">';
			echo '<a href="' . get_the_permalink() . '">';
			echo '<img src="' . esc_url( get_template_directory_uri() . '/layout/images/blog-defaults/rand-' . $i ) . '.jpg" width="250" height="250" alt="' . esc_attr( get_the_title() ) . '">';
			echo '</a>';
			echo '</div>';
		}
		echo '<div class="caption">';
		echo '<div class="mt-date">' . get_the_date( get_option( 'date-format' ), $pixova_lite_q->post->ID ) . '</div>';
		echo '<h2><a class="mt-blogpost-title" href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h2>';
		echo '<p>' . the_excerpt() . '</p>';
		echo '</div><!--/.caption-->';
		echo '</div><!--/.thumbnail-->';
		echo '</div> <!--/.col-sm-6.col-md-4-->';
		$i++;
		if ( $i == 5 ) {
			echo '<div class="clearfix"></div>';
			$i = 1;
		}
	}
	echo '</div> <!--/.mt-blogpost-wrapper-->';
	echo '</div><!--/.row-->';
	if ( ! empty( $page_which_uses_blog_template ) && is_array( $page_which_uses_blog_template ) ) {
		echo '<a class="btn btn-cta-dark" href="' . esc_url( get_permalink( absint( $page_which_uses_blog_template[0] ) ) ) . '">' . esc_html( $pixova_lite_news_button_text ) . '</a>';
	} else if ( ! empty( $page_which_uses_blog_template ) && ! is_array( $page_which_uses_blog_template ) ) {
		echo '<a class="btn btn-cta-dark" href="' . esc_url( get_permalink( absint( $page_which_uses_blog_template ) ) ) . '">' . esc_html( $pixova_lite_news_button_text ) . '</a>';
	}
	echo '</div><!--/.mt-blog-posts-->';
}
echo '</div><!--/.row-->';
echo '</div><!--/.container-->';
echo '</section>';