<?php get_header(); ?>
<?php //get_template_part('sections/section','header-archive'); ?>

	<div class="container">
		<div class="row">

				<div class="has-padding">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<?php if ( have_posts() ) {

						while ( have_posts() ) {
							the_post();
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<header class="entry-header">
									<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								</header><!-- .entry-header -->


								<?php if ( has_post_thumbnail() ) { ?>
									<aside class="entry-featured-image">
										<?php echo get_the_post_thumbnail( $post->ID, 'high-star-featured-blog-image' ); ?>
									</aside><!--/.entry-featured-image-->
								<?php } else { ?>
									<aside class="entry-featured-image">
										<?php echo '<img src="' . get_template_directory_uri() . '/layout/images/post-image-placeholder.jpg' . '" />'; ?>
									</aside><!--/.entry-featured-image-->
								<?php } ?>


								<div class="entry-meta">
									<?php printf(

									// Translators: 1 is the post author, 2 is the category list.
										__( '<span class="post-meta-separator"><i class="fa fa-user"></i>%1$s</span><span class="post-meta-separator"><i class="fa fa-calendar"></i>%2$s</span><span class="post-meta-separator"><i class="fa fa-comment"></i>%3$s</span><span class="post-meta-separator"><i class="fa fa-folder"></i>%4$s</span>', 'high-star' ),

										get_the_author(),

										// Translators: Post time
										get_the_date( get_option( 'date_format' ), $post->ID ),

										// Translators: Number of com,ments
										pixova_lite_get_number_of_comments( $post->ID ),

										// Translators: tag list
										get_the_tag_list( 'Tags: ', ', ', '' )

									);
									?>
								</div><!--/.entry-meta-->

								<div class="entry-content">
									<?php

									echo the_excerpt();

									wp_link_pages( array(
										'before' => '<nav class="page-links">' . __( 'Pages:', 'high-star' ),
										'after'  => '</nav>',
									) );
									?>
								</div><!-- .entry-content -->

							</article><!-- #post-## -->

						<?php } ?>
					<?php } ?>
					</div><!--/.col-lg-8-->

					<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
						<aside class="mt-blog-sidebar">
							<?php
							if ( is_active_sidebar( 'blog-sidebar' ) ) {
								dynamic_sidebar( 'blog-sidebar' );
							} else {
								the_widget( 'WP_Widget_Search', sprintf( 'title=%', __( 'Search', 'high-star' ) ) );
								the_widget( 'WP_Widget_Calendar', sprintf( 'title=%s', __( 'Calendar', 'high-star' ) ) );
							}
							?>
						</aside> <!--/.mt-blog-sidebar-->
					</div><!--/.col-md-3-->


				</div><!--/.has-padding-->



		</div> <!-- /.row-->

		<div class="row">
			<div class="mt-custom-pagination col-lg-12">
				<?php the_posts_pagination(); ?>
			</div>
		</div>

	</div><!--/.container-->

<?php get_footer(); ?>