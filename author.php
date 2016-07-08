<?php get_header(); ?>

	<div class="container">
		<div class="row">

			<div class="has-padding">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="row mt-author-area">
						<div class="col-lg-2">
							<a class="mt-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), 110 ); ?>
							</a>
						</div>

						<div class="col-lg-10">
							<h3> <?php echo __( 'Written by: ', 'high-star' ) . get_the_author(); ?></h3>
							<div class="mt-author-info">
								<?php the_author_meta( 'description' ); ?>
							</div>
						</div><!--/.col-lg-9-->
					</div>

					<div class="clearfix"></div>

					<?php if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); ?>
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

				<aside class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
					<div class="mt-blog-sidebar">
						<?php
						if ( is_active_sidebar( 'blog-sidebar' ) ) {
							dynamic_sidebar( 'blog-sidebar' );
						} else {
							the_widget( 'WP_Widget_Search', sprintf( 'title=%s', __( 'Search', 'high-star' ) ) );
							the_widget( 'WP_Widget_Calendar', sprintf( 'title=%s', __( 'Calendar', 'high-star' ) ) );
						}
						?>
					</div> <!--/.mt-blog-sidebar-->
				</aside><!--/.col-md-3-->

			</div><!--/.has-padding-->

			<div class="row">
				<div class="mt-custom-pagination col-lg-12">
					<?php the_posts_pagination(); ?>
				</div>
			</div>
			
		</div><!--/.row-->
	</div><!--/.container-->

<?php get_footer(); ?>