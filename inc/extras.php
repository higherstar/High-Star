<?php

if ( ! function_exists( 'pixova_lite_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */

	function pixova_lite_body_classes( $classes ) {

		// Adds a class of group-blog to blogs with more than 1 published author.

		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		return $classes;

	}

	add_filter( 'body_class', 'pixova_lite_body_classes' );
}

if ( ! function_exists( 'pixova_lite_wp_title' ) ) {
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		/**
		 * Filters wp_title to print a neat <title> tag based on what is being viewed.
		 *
		 * @param string $title Default title text for current view.
		 * @param string $sep   Optional separator.
		 *
		 * @return string The filtered title.
		 */

		function pixova_lite_wp_title( $title, $sep ) {

			if ( is_feed() ) {

				return $title;

			}

			global $page, $paged;

			// Add the blog name
			$title .= get_bloginfo( 'name', 'display' );

			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) ) {
				$title .= " $sep $site_description";

			}

			// Add a page number if necessary:

			if ( $paged >= 2 || $page >= 2 ) {
				$title .= " $sep " . sprintf( __( 'Page %s', 'high-star' ), max( $paged, $page ) );
			}

			return $title;

		}

		add_filter( 'wp_title', 'pixova_lite_wp_title', 10, 2 );
	}
}

if ( ! function_exists( 'pixova_lite_setup_author' ) ) {
	/**
	 * Sets the authordata global when viewing an author archive.
	 *
	 * This provides backwards compatibility with
	 * http://core.trac.wordpress.org/changeset/25574
	 *
	 * It removes the need to call the_post() and rewind_posts() in an author
	 * template to print information about the author.
	 *
	 * @global WP_Query $wp_query WordPress Query object.
	 * @return void
	 */

	function pixova_lite_setup_author() {

		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );

		}

	}

	add_action( 'wp', 'pixova_lite_setup_author' );
}

if ( ! function_exists( 'pixova_lite_prefix_upsell_notice' ) ) {
	/**
	 * Display upgrade notice on customizer page
	 */
	function pixova_lite_prefix_upsell_notice() {

		// Enqueue the script
		wp_enqueue_script( 'high-star-customizer-upsell', get_template_directory_uri() . '/layout/js/upsell/upsell.js', array(), '1.0.1', true );

		// Localize the script
		wp_localize_script( 'high-star-customizer-upsell', 'prefixL10n', array(

				# Upsell URL
				'prefixUpsellURL'    => esc_url( __( 'http://www.machothemes.com/themes/pixova/', 'high-star' ) ),
				'prefixUpsellLabel'  => esc_html__( 'View PRO version', 'high-star' ),

				# Theme Support
				'prefixSupportURL'   => esc_url( __( 'http://www.machothemes.com/contact/', 'high-star' ) ),
				'prefixSupportLabel' => esc_html__( 'Get theme support', 'high-star' ),

				# Documentation URLs
				'prefixDocURL'       => esc_url( __( 'http://docs.machothemes.com/category/106-high-star', 'high-star' ) ),
				'prefixDocLabel'     => __( 'Theme Documentation', 'high-star' ),

			) );

	}

	add_action( 'customize_controls_enqueue_scripts', 'pixova_lite_prefix_upsell_notice' );
}


// Function to convert hex color codes to rgba

if ( ! function_exists( 'pixova_lite_hex2rgba' ) ) {
	function pixova_lite_hex2rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if ( empty( $color ) ) {
			return $default;
		}

		//Sanitize $color if "#" is provided
		if ( $color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		//Convert hexadec to rgb
		$rgb = array_map( 'hexdec', $hex );

		//Check if opacity is set(rgba or rgb)
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode( ",", $rgb ) . ')';
		}

		//Return rgb(a) color string
		return $output;
	}
}

if ( ! function_exists( 'pixova_lite_post_nav' ) ) {

	/**
	 * Display navigation to next/previous post when applicable.
	 */

	function pixova_lite_post_nav() {

		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'high-star' ); ?></h2>

			<div class="nav-links">
				<?php

				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'high-star' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'high-star' ) );

				?>
			</div>
			<!-- .nav-links -->
		</nav><!-- .navigation -->

		<?php

	}
}

if ( ! function_exists( 'pixova_lite_content_nav' ) ) {
	/**
	 * Display navigation to next/previous pages when applicable
	 */
	function pixova_lite_content_nav( $nav_id ) {
		global $wp_query, $post;

		// Don't print empty markup on single pages if there's nowhere to navigate.
		if ( is_single() ) {
			$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
			$next     = get_adjacent_post( false, '', false );

			if ( ! $next && ! $previous ) {
				return;
			}
		}

		// Don't print empty markup in archives if there's only one page.
		if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
			return;
		}

		$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
		?>
		<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
			<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'high-star' ); ?></h2>

			<?php if ( is_single() ) : // navigation links for single posts ?>

				<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'high-star' ) . '</span> %title' ); ?>
				<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'high-star' ) . '</span>' ); ?>

			<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

				<?php if ( get_next_posts_link() ) : ?>
					<div
						class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'high-star' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div
						class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'high-star' ) ); ?></div>
				<?php endif; ?>

			<?php endif; ?>
			<div class="clear"></div>
		</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
		<?php
	}
}

if ( ! function_exists( 'pixova_lite_breadcrumbs' ) ) {
	/**
	 * Render the breadcrumbs with help of class-breadcrumbs.php
	 *
	 * @return void
	 */
	function pixova_lite_breadcrumbs() {
		$breadcrumbs = new Pixova_Lite_Breadcrumbs();
		$breadcrumbs->get_breadcrumbs();
	}
}

if ( ! function_exists( 'pixova_lite_fix_responsive_videos' ) ) {
	/*
	/* Add responsive container to embeds
	*/
	function pixova_lite_fix_responsive_videos( $html ) {
		return '<div class="high-star-video-container">' . $html . '</div>';
	}

	add_filter( 'embed_oembed_html', 'pixova_lite_fix_responsive_videos', 10, 3 );
	add_filter( 'video_embed_html', 'pixova_lite_fix_responsive_videos' ); // Jetpack
}

if ( ! function_exists( 'pixova_lite_get_number_of_comments' ) ) {
	/**
	 * Simple function used to return the number of comments a post has.
	 */
	function pixova_lite_get_number_of_comments( $post_id ) {

		$num_comments = get_comments_number( $post_id ); // get_comments_number returns only a numeric value

		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __( 'No Comments', 'high-star' );
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . __( ' Comments', 'high-star' );
			} else {
				$comments = __( '1 Comment', 'high-star' );
			}
			$write_comments = '<a href="' . get_comments_link() . '">' . $comments . '</a>';
		} else {
			$write_comments = __( 'Comments are off for this post.', 'high-star' );
		}

		return $write_comments;

	}
}

if ( ! function_exists( 'pixova_lite_pagination' ) ) {
	/**
	 * Custom pagination function
	 *
	 * @since high star 1.09
	 */
	function pixova_lite_pagination() {

		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big   = 999999999; // need an unlikely integer
		if ( $total > 1 ) {
			if ( ! $current_page = get_query_var( 'paged' ) ) {
				$current_page = 1;
			}
			if ( get_option( 'permalink_structure' ) ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo paginate_links( array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => $format,
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $total,
				'mid_size'  => 3,
				'type'      => 'list',
				'prev_text' => $prev_arrow,
				'next_text' => $next_arrow,
			) );
		}
	}
}


# Check if it's an IIS powered server
if ( ! function_exists( 'pixova_lite_on_iis' ) ) {
	/**
	 * @return bool
	 */
	function pixova_lite_on_iis() {
		$sSoftware = strtolower( $_SERVER["SERVER_SOFTWARE"] );
		if ( strpos( $sSoftware, "microsoft-iis" ) !== false ) {
			return true;
		} else {
			return false;
		}
	}
}

#
#   Get the page ID of the page using the blog template
#
#   We can't rely on the name, maybe they'll name it something other than 'Blog' ?
#
if ( ! function_exists( 'pixova_lite_get_page_id_by_template' ) ) {
	function pixova_lite_get_page_id_by_template( $page_template = null ) {

		# default args array
		# page template defaults to blog-template.php
		$args = array(
			'post_type'  => 'page',
			'fields'     => 'ids',
			'nopaging'   => true,
			'meta_key'   => '_wp_page_template',
			'meta_value' => 'page-templates/blog-template.php',
		);

		$pages                    = get_posts( $args );
		$pages_which_use_template = '';

		if ( is_array( $pages ) ) {
			foreach ( $pages as $page ) {
				$pages_which_use_template[] = $page;
			}
		} else if ( ! is_array( $pages ) ) {
			$pages_which_use_template = $pages;
		} else {
			$pages_which_use_template = '';
		}

		return $pages_which_use_template;

	}
}

#
# Custom Excerpt Length
#
function pixova_lite_excerpt_length( $length ) {
	return 75;
}

add_filter( 'excerpt_length', 'pixova_lite_excerpt_length', 999 );

#
# Custom Read More
#
function pixova_lite_excerpt_more( $more ) {

	$return_string = '<div class="read-more-wrapper">';
		$return_string .= '<a href="' . esc_url( get_the_permalink() ) . '" class="btn btn-green btn-read-more" role="button">' . __( 'Read more', 'high-star' ) . '</a>';
	$return_string .= '</div>';

	return $return_string;

}

add_filter( 'excerpt_more', 'pixova_lite_excerpt_more' );

if ( ! function_exists( 'pixova_lite_nice_debug' ) ) {
	function pixova_lite_nice_debug( $var, $type = 'print_r' ) {

		switch ( $type ) {
			case 'print_r':

				echo "<pre>";
				print_r( $var );
				echo "<pre>";

				break;
			case 'var_dump':

				echo "<pre>";
				var_dump( $var );
				echo "<pre>";

				break;
		}
	}
}

if ( ! function_exists( 'pixova_lite_get_customizer_image_by_url' ) ) {
	/**
	 * Function used to get image ID from URL
	 * This allows us to get the resized version of an image used in the Customizer.
	 *
	 * @since high star 1.39
	 */
	function pixova_lite_get_customizer_image_by_url( $value, $image_size = '' ) {

		$id = attachment_url_to_postid( $value );

		if ( $image_size ) {
			$thumb = wp_get_attachment_image_src( $id, $image_size );
		} else { // return full size otherwise
			$thumb = wp_get_attachment_image_src( $id, 'full' );
		}

		return esc_url( $thumb[0] );

	}
}


#Create admin notice

$pixova_show_update_notice = get_option( 'high-star-remove-update-notice', false );

if ( ! $pixova_show_update_notice && 'posts' == get_option( 'show_on_front' ) && current_user_can( 'manage_options' ) ) {

	add_action( 'admin_enqueue_scripts', 'pixova_lite_enqueue_notice_js' );
	add_action( 'admin_notices', 'pixova_lite_admin_notice_html' );
	add_action( 'wp_ajax_pixova_lite_remove_upate_notice', 'pixova_lite_disable_notice_ajax' );

}

function pixova_lite_enqueue_notice_js( $hook ) {

	wp_enqueue_script( 'high-star-update-error-status', get_template_directory_uri() . '/layout/js/pixova_lite_notice.js', array( 'jquery' ), '1.0', true );
}

function pixova_lite_admin_notice_html() {
	?>
	<div class="notice error pixova-error-update is-dismissible">
		<p>
			<?php
			_e( 'Some changes were made in the latest version so that the theme would properly work with core WordPress\' front page system.  If you\'d like to continue using the custom front page, visit', 'high-star' );
			echo ' <a href="' . esc_url( admin_url( 'options-reading.php' ) ) . '">' . __( 'Settings > Readings', 'high-star' ) . '</a> ';
			_e( 'and set your front page to display a page.', 'high-star' );
			?>
		</p>
	</div>
	<?php
}

function pixova_lite_disable_notice_ajax() {
	update_option( 'high-star-remove-update-notice', true );
	wp_die();
}