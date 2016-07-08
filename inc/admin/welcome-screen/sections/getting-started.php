<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="high-star-tab-pane active">

	<div class="pixova-tab-pane-center">

		<h1 class="high-star-welcome-title">Welcome to high star! <?php if( !empty($pixova_lite['Version']) ): ?> <sup id="high-star-theme-version"><?php echo esc_attr( $pixova_lite['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Our most popular free one page WordPress theme, high star!','high-star'); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using high star and that is why we gathered here all the necessary informations for you. We hope you will enjoy using high star, as much as we enjoy creating great products.', 'high-star' ); ?>

	</div>

	<hr />

	<div class="pixova-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'high-star' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'high-star' ); ?></a></p>

	</div>

	<hr />

	<div class="pixova-tab-pane-center">

		<h1><?php esc_html_e( 'FAQ', 'high-star' ); ?></h1>

	</div>

	<div class="pixova-tab-pane-half pixova-tab-pane-first-half">

		<h4><?php esc_html_e( 'Create a child theme', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'high-star' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.machothemes.com/article/34-how-to-create-a-child-theme' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />
		<?php /* ?>
		<h4><?php esc_html_e( 'Build a landing page with a drag-and-drop content builder', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to build a great looking landing page using a drag-and-drop content builder plugin.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/219-how-to-build-a-landing-page-with-a-drag-and-drop-content-builder' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />
		<?php */ ?>

		<h4><?php esc_html_e( 'Translate high star', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate high star into your native language or any other language you need for you site.', 'high-star' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.themeisle.com/article/80-how-to-translate-pixova' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>



    <?php /* ?>
		<h4><?php esc_html_e( 'Change dimensions for footer social icons', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to change the default dimensions for you social icons.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/249-how-to-increase-the-size-of-social-icons-in-pixova' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />


		<h4><?php esc_html_e( 'Turn off the animations', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'You can turn off the animation effects you see when high star loads a section in an easy way with just few changes. Check the documentation below.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/15-turn-off-loading-animations-in-pixova/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Add a search bar in the top menu', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Find out how to add a search bar in the top menu bar, in an easy way be following the link below.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/78-pixova-adding-a-search-bar-in-the-top-menu' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Slider in big title section', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'If you are in the position where you want to change the default appearance of the big title section, you may want to replace it with a nice looking slider. This can be accomplished by following the documention below.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/13-replacing-big-title-section-with-an-image-slider/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>
			<?php */ ?>


	</div>

	<div class="pixova-tab-pane-half">

		<?php /* ?>
		<h4><?php esc_html_e( 'Speed up your site', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'If you find yourself in the situation where everything on your site is running very slow, you might consider having a look at the below documentation where you will find the most common issues causing this and possible solutions for each of the issues.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/63-speed-up-your-wordpress-site/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />
		<?php */ ?>


		<h4><?php esc_html_e( 'Link Menu to sections', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Linking the frontpage sections with the top menu is very simple, all you need to do is assign section anchors to the menu. In the below documentation you will find a nice tutorial about this.', 'high-star' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.machothemes.com/article/30-faq-common-issues#linkmenu' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />

		<?php /* ?>
		<h4><?php esc_html_e( 'Change anchors', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'To better suit your site\'s needs, you can change each section\'s anchor to what you want. The entire process is described below.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/36-how-to-change-section-anchor-in-pixova/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />
		<?php */ ?>

		<h4><?php esc_html_e( 'Change the page template', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'high star has three page templates available, two for the blog and one for full width pages. To make sure you take full advantage of those page templates, make sure you read the documentation.', 'high-star' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.themeisle.com/article/32-how-to-change-the-page-template-in-wordpress' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>



		<?php /* ?>
		<h4><?php esc_html_e( 'Remove the opacity', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'You don\'t like the way high star looks with its background opacity? No problem. Just remove it using the steps below.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/30-removing-background-opacity-in-pixova/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Configure the portfolio', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Set up your portfolio section in an easy way be following the link below.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://docs.themeisle.com/article/85-configuring-portfolio/' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'high-star' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( '30 Experts Share: The Top *Non-Obvious* WordPress Plugins That\'ll Make You a Better Blogger', 'high-star' ); ?></h4>
		<p><?php esc_html_e( ' At the address below you will find a cool set of original WordPress plugins that can give you great benefits despite being a little lesser known out there.', 'high-star' ); ?></p>
		<p><a href="<?php echo esc_url( 'http://www.codeinwp.com/blog/top-non-obvious-wordpress-plugins/' ); ?>" class="button"><?php esc_html_e( 'Read more', 'high-star' ); ?></a></p>
		<?php */ ?>

	</div>

	<div class="high-star-clear"></div>

	<hr />

	<div class="pixova-tab-pane-center">

		<h1><?php esc_html_e( 'View full documentation', 'high-star' ); ?></h1>
		<p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed information on how to use high star.', 'high-star' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.machothemes.com/category/106-high-star' ); ?>" class="button button-primary"><?php esc_html_e( 'Read full documentation', 'high-star' ); ?></a></p>

	</div>

	<hr />
	<?php /*  ?>
	<div class="pixova-tab-pane-center">
		<h1><?php esc_html_e( 'Recommended plugins', 'high-star' ); ?></h1>
	</div>

	<div class="pixova-tab-pane-half pixova-tab-pane-first-half">

		<!-- Page Builder by SiteOrigin -->
		<h4><?php esc_html_e( 'Page Builder by SiteOrigin', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Build responsive page layouts using the widgets you know and love using this simple drag and drop page builder.', 'high-star' ); ?></p>

		<?php if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) { ?>

				<p><span class="high-star-w-activated button"><?php esc_html_e( 'Already activated', 'high-star' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=siteorigin-panels' ), 'install-plugin_siteorigin-panels' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Page Builder by SiteOrigin', 'high-star' ); ?></a></p>

			<?php
		}

		?>

		<hr />

		<!-- WP Product Review -->
		<h4><?php esc_html_e( 'WP Product Review', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Easily turn your basic posts into in-depth reviews with ratings, pros and cons, affiliate links, rich snippets and user reviews.', 'high-star' ); ?></p>

		<?php if ( is_plugin_active( 'wp-product-review/wp-product-review.php' ) ) { ?>

				<p><span class="high-star-w-activated button"><?php esc_html_e( 'Already activated', 'high-star' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=wp-product-review' ), 'install-plugin_wp-product-review' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install WP Product Review', 'high-star' ); ?></a></p>

			<?php
		}

		?>

		<hr />

		<!-- Custom Login Customizer -->
		<h4><?php esc_html_e( 'Custom Login Customizer', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! You can preview your changes before you save them!', 'high-star' ); ?></p>

		<?php if ( is_plugin_active( 'login-customizer/login-customizer.php' ) ) { ?>

			<p><span class="high-star-w-activated button"><?php esc_html_e( 'Already activated', 'high-star' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=login-customizer' ), 'install-plugin_login-customizer' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Custom Login Customizer', 'high-star' ); ?></a></p>

			<?php
		}
		?>


	</div>

	<div class="pixova-tab-pane-half">

		<!-- Visualizer: Charts and Graphs -->
		<h4><?php esc_html_e( 'Visualizer: Charts and Graphs', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'A simple, easy to use and quite powerful chart tool to create, manage and embed interactive charts into your WordPress posts and pages.', 'high-star' ); ?></p>

		<?php if ( class_exists( 'Visualizer_Plugin' ) ) { ?>

			<p><span class="high-star-w-activated button"><?php esc_html_e( 'Already activated', 'high-star' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=visualizer' ), 'install-plugin_visualizer' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Visualizer', 'high-star' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- ECPT -->
		<h4><?php esc_html_e( 'Easy Content Types', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'Custom Post Types, Taxonomies and Metaboxes in Minutes', 'high-star' ); ?></p>

		<?php if ( is_plugin_active( 'easy-content-types/easy-content-types.php' ) ) { ?>

				<p><span class="high-star-w-activated button"><?php esc_html_e( 'Already activated', 'high-star' ); ?></span></p>

			<?php
		}
		else { ?>

				<p><a href="<?php echo esc_url( 'http://themeisle.com/plugins/easy-content-types/' ); ?>" class="button button-primary"><?php esc_html_e( 'Download Easy Content Types', 'high-star' ); ?></a></p>

			<?php
		}
		?>

		<hr />

		<!-- Revive Old Post -->
		<h4><?php esc_html_e( 'Revive Old Post', 'high-star' ); ?></h4>
		<p><?php esc_html_e( 'A plugin to share about your old posts on twitter, facebook, linkedin to get more hits for them and keep them alive.', 'high-star' ); ?></p>

		<?php if ( is_plugin_active( 'tweet-old-post/tweet-old-post.php' ) ) { ?>

			<p><span class="high-star-w-activated button"><?php esc_html_e( 'Already activated', 'high-star' ); ?></span></p>

			<?php
		}
		else { ?>

			<p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=tweet-old-post' ), 'install-plugin_tweet-old-post' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install Revive Old Post', 'high-star' ); ?></a></p>

			<?php
		}
		?>
	</div>
	<?php */ ?>
	<div class="high-star-clear"></div>

</div>
