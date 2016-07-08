<?php


if ( ! function_exists( 'pixova_lite_theme_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since high star 1.0.0
     */
    function pixova_lite_theme_setup() {

        /*
        * Using this feature you can set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
        * @see http://codex.wordpress.org/Content_Width
        */
        if ( ! isset( $content_width ) ) {
            $content_width = 1140;
        }

        /**
         *  Next compatible
         */
        require get_template_directory() . '/inc/next-compatible.php';

        /**
         *  Back compatible
         */
        require get_template_directory() . '/inc/back-compatible.php';

        /**
         * Custom Header Support
         */

        $args = array(
            'default-image'          => get_template_directory_uri() . '/layout/images/header-bg.jpg',
            'default-text-color'     => '#000',
            'width'                  => 1920,
            'height'                 => 1080,
            'flex-height'            => true,
        );

        add_theme_support( 'custom-header', $args );

        /**
         * Jetpack support
         */
        require get_template_directory() . '/inc/jetpack.php';

        /**
         * Custom functions that act independently of the theme templates.
         */
        require get_template_directory() . '/inc/extras.php';
        require get_template_directory() . '/inc/components/breadcrumbs/class.mt-breadcrumbs.php';
        require get_template_directory() . '/inc/components/related-posts/class.mt-related-posts.php';


        /**
         * Customizer additions.
         */
        require get_template_directory() . '/inc/customizer.php';
        require get_template_directory() . '/inc/custom-controls.php';


        /**
         * Sidebars
         */

        require get_template_directory() . '/sidebars/sidebars.php';

        /**
         * Widgets
         */

        require get_template_directory() . '/widgets/widget-about-sm.php';
        require get_template_directory() . '/widgets/widget-social-icons.php';
        require get_template_directory() . '/widgets/widget-latest-posts.php';


        /**
         * PLugins
         */
        require get_template_directory() . '/inc/plugin-activation.php';

        /**
         * HTML Custom control
         */
        require get_template_directory() . '/inc/customizer/pixova_lite_custom_control.php';

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'high-star', get_template_directory() . '/languages/' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style( array( 'layout/css/editor-style.min.css', 'layout/css/font-awesome.min.css', pixova_lite_fonts_url() ) );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary'   => __( 'Header Menu', 'high-star' ),
            'secondary' => __( 'Footer Menu', 'high-star' )
        ) );

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'pixova_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        /*
         * Add WooCommerce theme support
         */
        add_theme_support( 'woocommerce' );

        /*
         * Add image sizes
         * @link http://codex.wordpress.org/Function_Reference/add_image_size
         */
        add_image_size('high-star-project-slider-logo-image', 187, 35, true);
        add_image_size('high-star-homepage-blog-posts', 250, 250, true);
        add_image_size('high-star-featured-blog-image', 750, 250, true);
        add_image_size('high-star-related-posts',  600, 450, true );
        add_image_size('high-star-recent-works-image', 285, 450, true);


        /*******************************************/
        /*************  Welcome screen *************/
        /*******************************************/

        if ( is_admin() ) {

            global $pixova_lite_required_actions;

            /*
             * id - unique id; required
             * title
             * description
             * check - check for plugins (if installed)
             * plugin_slug - the plugin's slug (used for installing the plugin)
             *
             */
            $pixova_lite_required_actions = array(
                array(
                    "id" => 'high-star-req-ac-frontpage-latest-news',
                    "title" => esc_html__( 'Get the one page template' ,'high-star' ),
                    "description"=> esc_html__( 'If you just installed high star, and are not able to see the one page template, you need to go to Settings -> Reading , Front page displays and select "Static Page".','high-star' ),
                    "check" => pixova_lite_is_not_static_page()
                ),
                array(
                    "id" => 'high-star-req-ac-install-pirate-forms',
                    "title" => esc_html__( 'Install Pirate Forms' ,'high-star' ),
                    "description"=> esc_html__( 'In the next updates, high star\'s default contact form will be removed. Please make sure you install the Pirate Forms plugin to keep your site updated, and experience a smooth transition to the latest version.','high-star' ),
                    "check" => defined("PIRATE_FORMS_VERSION"),
                    "plugin_slug" => 'pirate-forms'
                ),
                /*
                array(
                    "id" => 'high-star-req-ac-install-contact-forms',
                    "title" => esc_html__( 'Install Contact Form 7' ,'high-star' ),
                    "description"=> esc_html__( 'In the next updates, high star\'s default contact form will be removed. Please make sure you install the Pirate Forms plugin to keep your site updated, and experience a smooth transition to the latest version.','high-star' ),
                    "plugin_slug" => 'contact-form-7'
                ),
                */
                array(
                    "id" => 'high-star-req-ac-check-pirate-forms',
                    "title" => esc_html__( 'Check the contact form after installing Pirate Forms' ,'high-star' ),
                    "description"=> esc_html__( "After installing the Pirate Forms plugin, please make sure you check your frontpage contact form is working fine. Also, if you use high star in other language(s) please make sure the translation is ok. If not, please translate the contact form again.",'high-star' ),
                )
            );

            require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
        }


    } // function pixova_lite_theme_setup
    add_action( 'after_setup_theme', 'pixova_lite_theme_setup', 9 );
} // function exists (pixova_lite_theme_setup) check

if( !function_exists( 'pixova_lite_is_not_latest_posts' ) ) {
    function pixova_lite_is_not_static_page() {
        return ('page' == get_option( 'show_on_front' ) ? true : false);
    }
}

if( !function_exists( 'pixova_lite_enqueue_scripts' ) ) {
    /**
     * Enqueue scripts and styles.
     *
     * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
     *
     * @since high star 1.0.0
     */

    function pixova_lite_enqueue_scripts() {

        // Bootstrap JS (required for theme)
        wp_register_script( 'bootstrap-min-js' , get_template_directory_uri() . '/layout/js/bootstrap/bootstrap.min.js', array('jquery'), '3.3.4', true);

        # Pace Loader
        wp_register_script( 'pace-loader-min-js', get_template_directory_uri() . '/layout/js/pace/pace.min.js', array('jquery'), '2.0', true );

        # Preloader JS
        wp_register_script( 'high-star-preloader', get_template_directory_uri() . '/layout/js/preloader.min.js', array('pace-loader-min-js'), '1.0', true );

        # ViewPort JS
        wp_register_script( 'viewport-min-js', get_template_directory_uri() . '/layout/js/viewport/viewport.min.js', array('jquery'), '1.0', true );

        # Parallax JS
        wp_register_script( 'parallax-min-js', get_template_directory_uri() . '/layout/js/parallax/parallax.min.js', array('jquery'), '1.3.1', true );

        # owlCarousel main JS
        wp_register_script( 'owlCarousel-js', get_template_directory_uri() .'/layout/js/owl-carousel/owl-carousel.min.js', array('jquery'), '1.3.3', true);

        # Classie JS
        wp_register_script ('classie-js', get_template_directory_uri() . '/layout/js/classie/classie.js', array('jquery'), '1.0.0', true );

        # Smooth Scroll JS
        wp_register_script ( 'smooth-scroll-js', get_template_directory_uri() . '/layout/js/smoothscroll/smoothscroll.min.js', array('jquery'), '0.9.9', true);

        # WOW js
        wp_register_script( 'wow-min-js', get_template_directory_uri() . '/layout/js/wow/wow.min.js', array('jquery'), '1.0.3', true);

        # Simple Placeholders JS
        wp_register_script( 'simple-placeholder-js', get_template_directory_uri() . '/layout/js/simpleplaceholder/simplePlaceholder.min.js', array('jquery'), '1.0.0', true );

        # jQuery Easy Pie Charts
        wp_register_script( 'pie-chart-js', get_template_directory_uri() . '/layout/js/easypiechart/easypiechart.min.js', array('jquery', 'viewport-min-js'), '2.1.7', true );

        # jQuery Easy Pie Charts
        wp_register_script( 'pathloader-js', get_template_directory_uri() . '/layout/js/pathLoader.js', array(), '2.1.7', true );

        # Scripts JS
        wp_register_script ( 'high-star-scripts-js', get_template_directory_uri() . '/layout/js/scripts.min.js', array('jquery', 'classie-js'), '1.41.1', true );

        // Plugins JS
        wp_register_script( 'high-star-plugins-js', get_template_directory_uri() . '/layout/js/plugins.min.js', array('jquery', 'pie-chart-js', 'wow-min-js', 'high-star-scripts-js', 'simple-placeholder-js'), '1.41.1', true );


        /*
         * Enqueue scripts
         */



        function pixova_lite_output_css_to_head() {

            echo '<!-- Customizer CSS Fixes-->'."\n";
            echo '<style>';
            echo '#page {padding-top: 0 !important; }'."\n";
            echo '</style>';
        }


        # Let's make sure we don't load our pre-loader script in the customizer
        global $wp_customize;

	    # Preloader Enabled ?
        $preloader_enabled = get_theme_mod('pixova_lite_preloader_enabled', 'preloader_enabled');

        if ( !isset( $wp_customize ) && $preloader_enabled == 'preloader_enabled' ) {
            wp_enqueue_script( 'pathloader-js' );
            wp_enqueue_script('pace-loader-min-js');
            wp_enqueue_script('high-star-preloader');
        } else {
            add_action('wp_head', 'pixova_lite_output_css_to_head');
        }

        wp_enqueue_script( 'bootstrap-min-js' );
        wp_enqueue_script( 'owlCarousel-js' );
        wp_enqueue_script( 'classie-js' );
        wp_enqueue_script( 'simple-placeholder-js' );
        wp_enqueue_script( 'smooth-scroll-js' );
        wp_enqueue_script( 'viewport-min-js' );
        wp_enqueue_script( 'parallax-min-js' );
        

        # Animations Enabled ?
        $animations_enabled = get_theme_mod('pixova_lite_animations_enabled', 'animations_enabled');

        if( $animations_enabled == 'animations_enabled') {
            wp_enqueue_script( 'wow-min-js' );
        }

        #
        # Localize Plugins JS
        #
        $pixova_lite_plugins_options = array(
            'animations_enabled' => $animations_enabled
        );

        wp_localize_script( 'high-star-plugins-js', 'pixova_lite_localization', $pixova_lite_plugins_options );
        wp_enqueue_script( 'high-star-plugins-js' );



        #
        # Localize Scripts JS
        #

        # Header Text Parallax Effect ?
        $parallax_enabed = get_theme_mod('pixova_lite_header_effect_enabled', 'header_effect_enabled');

        $pixova_lite_scripts_options = array(
            'parallax_enabled' => $parallax_enabed,
            'animations_enabled' => $animations_enabled
        );

        wp_localize_script( 'high-star-scripts-js', 'pixova_lite_localization', $pixova_lite_scripts_options );
        wp_enqueue_script( 'high-star-scripts-js' );

        #
        #
        # END
        # Scripts Localization
        #
        #



        /**
         *
         * Stylesheets below
         *
         */

        // General theme Stylesheet
        wp_enqueue_style( 'high-star-min-style', get_stylesheet_uri() );

        // Animate CSS
	    if( $animations_enabled == 'animations_enabled') {
		    wp_enqueue_style( 'animate-min-css', get_template_directory_uri() . '/layout/css/animate.min.css' );
	    }

        // Font Awesome Stylesheet
        wp_enqueue_style ( 'font-awesome-min-css', get_template_directory_uri() . '/layout/css/font-awesome.min.css');

        // Google Fonts StyleSheet
        wp_enqueue_style( 'ga-fonts', pixova_lite_fonts_url() );

        // Bootstrap Stylesheet
        wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/layout/css/bootstrap.min.css');

        // owlCarousel Stylesheet
        wp_enqueue_style( 'owlCarousel-main-css', get_template_directory_uri() .'/layout/css/owl.carousel.css' );
        wp_enqueue_style( 'owlCarousel-theme-css', get_template_directory_uri() .'/layout/css/owl.theme.css' );


        if( function_exists( 'is_woocommerce' ) ) {
            wp_enqueue_style('high-star-woocommerce-min-css', get_template_directory_uri() . '/layout/css/pixova-woocommerce.min.css' );
        }

    } // function pixova_lite_enqueue_scripts end

    add_action( 'wp_enqueue_scripts', 'pixova_lite_enqueue_scripts' );

} // function exists (pixova_lite_enqueue_scripts) check

if( !function_exists('pixova_lite_child_manage_woocommerce_styles') ) {
    /**
     * Optimize WooCommerce Scripts
     * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
     *
     * @since high star 1.0.9
     */

    function pixova_lite_child_manage_woocommerce_styles()
    {
        //first check that woo exists to prevent fatal errors
        if (function_exists('is_woocommerce')) {

            //remove generator meta tag
            remove_action('wp_head', array($GLOBALS['woocommerce'], 'generator'));

            //dequeue scripts and styles
            if (!is_woocommerce() && !is_cart() && !is_checkout()) {
                wp_dequeue_style('woocommerce-general');
                wp_dequeue_style('woocommerce-layout');
                wp_dequeue_style('woocommerce-smallscreen');
                wp_dequeue_style('woocommerce_frontend_styles');
                wp_dequeue_style('woocommerce_fancybox_styles');
                wp_dequeue_style('woocommerce_chosen_styles');
                wp_dequeue_style('woocommerce_prettyPhoto_css');
                wp_dequeue_script('wc_price_slider');
                wp_dequeue_script('wc-single-product');
                wp_dequeue_script('wc-add-to-cart');
                wp_dequeue_script('wc-cart-fragments');
                wp_dequeue_script('wc-checkout');
                wp_dequeue_script('wc-add-to-cart-variation');
                wp_dequeue_script('wc-single-product');
                wp_dequeue_script('wc-cart');
                wp_dequeue_script('wc-chosen');
                wp_dequeue_script('woocommerce');
                wp_dequeue_script('prettyPhoto');
                wp_dequeue_script('prettyPhoto-init');
                wp_dequeue_script('jquery-blockui');
                wp_dequeue_script('jquery-placeholder');
                wp_dequeue_script('fancybox');
                wp_dequeue_script('jqueryui');
            }
        }
    }
    add_action('wp_enqueue_scripts', 'pixova_lite_child_manage_woocommerce_styles', 99);
}


if( !function_exists( 'pixova_lite_comment_reply_js' ) ) {
    /**
     * Function that only loads the comment-reply JS script on pages that have the comment form enabled
     *
     * Given that we have a one page website, is_singular() will return true for pages as well (that means it gets loaded on the homepage for nothing)
     *
     * @since high star 1.0.0
     */
    function pixova_lite_comment_reply_js()
    {

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
    add_action( 'comment_form_before', 'pixova_lite_comment_reply_js' );
}


if( !function_exists('pixova_lite_register_required_plugins') ) {
    /**
     * Custom function to load TGMPA
     *
     * @since high star 1.0.0
     */
    function pixova_lite_register_required_plugins()
    {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
            
            array(
                'name' => 'Simple Social Share Icons', // The plugin name.
                'slug' => 'kiwi-social-share', // The plugin slug (typically the folder name).
                'source' => '', // The plugin source.
                'required' => false, // If false, the plugin is only 'recommended' instead of required.
                'version' => '1.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
            ),

            array(
                'name'                  => 'Pirate Forms - Contact Form and SMTP Plugin', // The plugin name.
                'slug'                  => 'pirate-forms', // The plugin slug (typically the folder name).
                'source'                => '', // The plugin source.
                'required'              => false, // If false, the plugin is only 'recommended' instead of required.
                'version'               => '1.0.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'          => '' // If set, overrides default API URL and points to an external URL.
            ),
            
            array(
            	'name'                  => 'reCaptcha Security', // The plugin name.
                'slug'                  => 'uber-nocaptcha-recaptcha', // The plugin slug (typically the folder name).
                'source'                => '', // The plugin source.
                'required'              => false, // If false, the plugin is only 'recommended' instead of required.
                'version'               => '1.0.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'          => '' // If set, overrides default API URL and points to an external URL.
        	)
        );

        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'default_path' => '',                      // Default absolute path to pre-packaged plugins.
            'menu' => 'mt-install-plugins', // Menu slug.
            'has_notices' => true,                    // Show admin notices or not.
            'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => true,                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message' => '',                      // Message to output right before the plugins table.
            'strings' => array(
                'page_title' => __('Install Required Plugins', 'high-star'),
                'menu_title' => __('Install Plugins', 'high-star'),
                'installing' => __('Installing Plugin: %s', 'high-star'), // %s = plugin name.
                'oops' => __('Something went wrong with the plugin API.', 'high-star'),
                'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'high-star'), // %1$s = plugin name(s).
                'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'high-star'), // %1$s = plugin name(s).
                'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'high-star'), // %1$s = plugin name(s).
                'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'high-star'), // %1$s = plugin name(s).
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'high-star'), // %1$s = plugin name(s).
                'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'high-star'), // %1$s = plugin name(s).
                'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'high-star'), // %1$s = plugin name(s).
                'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'high-star'), // %1$s = plugin name(s).
                'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'high-star'),
                'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins', 'high-star'),
                'return' => __('Return to Required Plugins Installer', 'high-star'),
                'plugin_activated' => __('Plugin activated successfully.', 'high-star'),
                'complete' => __('All plugins installed and activated successfully. %s', 'high-star'), // %s = dashboard link.
                'nag_type' => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            )
        );

        tgmpa($plugins, $config);
    }

    add_action( 'tgmpa_register', 'pixova_lite_register_required_plugins' );
}



// Fallback nav menu
if( !function_exists('pixova_lite_fallback_cb') ) {
    /**
     * Nav menu fallback function
     *
     * @since high star 1.11
     *
     */

    function pixova_lite_fallback_cb()
    {

        $html = '<ul id="menu-high-star-main-menu-container" class="mt-default-menu">';
        $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
            $html .= '<a href="' . get_site_url() . '/#about" title="' . __('About', 'high-star') . '">';
                $html .= __('About', 'high-star');
            $html .= '</a>';
        $html .= '</li>';

        $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
            $html .= '<a href="' . get_site_url() . '/#works" title="' . __('Recent Works', 'high-star') . '">';
                $html .= __('Recent Works', 'high-star');
            $html .= '</a>';
        $html .= '</li>';

        $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
            $html .= '<a href="' . get_site_url() . '/#testimonials" title="' . __('Testimonials', 'high-star') . '">';
                $html .= __('Testimonials', 'high-star');
            $html .= '</a>';
        $html .= '</li>';

        $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
            $html .= '<a href="' . get_site_url() . '/#team" title="' . __('Team', 'high-star') . '">';
                $html .= __('Team', 'high-star');
            $html .= '</a>';
        $html .= '</li>';

        $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
            $html .= '<a href="' . get_site_url() . '/#news" title="' . __('News', 'high-star') . '">';
                $html .= __('News', 'high-star');
            $html .= '</a>';
        $html .= '</li>';

        $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
            $html .= '<a href="' . get_site_url() . '/#contact" title="' . __('Contact', 'high-star') . '">';
                $html .= __('Contact', 'high-star');
            $html .= '</a>';
        $html .= '</li>';


        if( function_exists( 'is_woocommerce' ) ) {
            $html .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
                $html .= '<a href="' . get_site_url() . '/shop/" title="' . __('Shop', 'high-star') . '">';
                    $html .= __('Shop', 'high-star');
                $html .= '</a>';
            $html .= '</li>';
        }


        $html .= '</ul>';

        echo $html;
    }
}

if ( ! function_exists( 'pixova_lite_fonts_url' ) ) {
    /**
     * Register Google fonts for high star.
     *
     * @since high star 1.16
     *
     * @return string Google fonts URL for the theme.
     */
    function pixova_lite_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Source Sans Pro Sans Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Poppins font: on or off', 'high-star')) {
            $fonts[] = 'Poppins:600';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Souce Sans Pro Sans Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Roboto: on or off', 'high-star')) {
            $fonts[] = 'Roboto:400,500,700,400italic,700italic';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'high-star' ) ) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (latin-extended, vietnamese)', 'high-star');

        if ( 'latin-extended' == $subset ) {
            $subsets .= ',latin,latin-ext';
        }
        else if ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
}


//Create function to get templates from high star Companion
/*
function pixova_lite_get_section_template( $template, $force_companion = false ) {
    $pixova_first_path = get_template_directory().'/';
    $pixova_second_path = defined( 'Pixova_Lite_Companion_PATH' ) ? Pixova_Lite_Companion_PATH : '';
    $template_with_suffix = $template.'.php';

    if ( $force_companion && $pixova_second_path != '' ) {
        $aux_path = $pixova_first_path;
        $pixova_first_path = $pixova_second_path;
        $pixova_second_path = $aux_path;
    }

    if ( locate_template($template_with_suffix) && !$force_companion ) {
        get_template_part($template);
    }elseif ( file_exists ( $pixova_first_path.'sections/'.$template_with_suffix ) ) {
        require_once ( $pixova_first_path.'sections/'.$template_with_suffix );
    }elseif ( file_exists ( $pixova_second_path.'sections/'.$template_with_suffix ) ) {
        require_once ( $pixova_second_path.'sections/'.$template_with_suffix );
    }
}
*/

if( !function_exists( 'pixova_lite_add_default_widgets' ) ) {
  /**
  * Function to import widgets based on a JSON config file
  * JSON file is generated using plugin: Widget Importer / Exporter
  * @link https://github.com/stevengliebe/widget-importer-exporter
  */
  function pixova_lite_add_default_widgets() {

      $json = '{"orphaned_widgets_1":{"woocommerce_price_filter-2":{"title":"Filter by price"},"woocommerce_products-2":{"title":"Products","number":"5","show":"","orderby":"date","order":"desc","hide_free":0,"show_hidden":0},"woocommerce_product_tag_cloud-2":{"title":"Product Tags"},"woocommerce_recent_reviews-2":{"title":"Recent Reviews","number":"10"}},"shop-sidebar":{"woocommerce_price_filter-2":{"title":"Filter by price"},"woocommerce_products-2":{"title":"Products","number":"5","show":"","orderby":"date","order":"desc","hide_free":0,"show_hidden":0},"woocommerce_product_tag_cloud-2":{"title":"Product Tags"},"woocommerce_recent_reviews-2":{"title":"Recent Reviews","number":"10"}},"blog-sidebar":{"search-2":{"title":""},"recent-posts-2":{"title":"","number":5},"recent-comments-2":{"title":"","number":5},"archives-2":{"title":"","count":0,"dropdown":0},"categories-2":{"title":"","count":0,"hierarchical":0,"dropdown":0},"meta-2":{"title":""}},"footer-sidebar-1":{"pixova_lite_widget_about-2":{"title":"About","about_text":"The many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected true of a humour.\r\n\r\n","show_title":"1"}},"footer-sidebar-2":{"text-2":{"title":"Quick nav","text":"  <ul id=\"menu-pixova-footer-menu\" class=\"menu\">\r\n                                        <li class=\"menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item\"><a href=\"#about\">About<\/a><\/li>\r\n                                        <li class=\"menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item\"><a href=\"#works\">Recent Works<\/a><\/li>\r\n                                        <li class=\"menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item\"><a href=\"#testimonials\">Testimonials<\/a><\/li>\r\n                                        <li class=\"menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item\"><a href=\"#news\">News<\/a><\/li>\r\n                                        <li class=\"menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item\"><a href=\"#team\">Team<\/a><\/li>\r\n                                        <li class=\"menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item\"><a href=\"#contact\">Contact<\/a><\/li>\r\n                                    <\/ul>","filter":false}},"footer-sidebar-3":{"pixova_lite_widget_latest_posts-2":{"title":"Latest post","items":"1","show_title":"1"}},"footer-sidebar-4":{"pixova_lite_widget_social_media-3":{"title":"Follow us","profile_facebook":" ","profile_twitter":" ","profile_plus":" ","profile_pinterest":" ","profile_youtube":" ","profile_dribbble":" ","profile_tumblr":" ","profile_instagram":" ","profile_github":" ","profile_bitbucket":" ","profile_codepen":"","show_title":""}}}';
      $config = json_decode($json);

      $sidebars_widgets = get_option( 'sidebars_widgets' );

      # Parse config
      foreach ( $config as $sidebar => $elemements ) {
          # verify if the sidebar doesn't have ny widgets
          if (  strpos( $sidebar, 'orphaned_widgets' ) === false && !is_active_sidebar($sidebar) ) {
              # create an empty array for active widgets
              $this_sidebar_active_widgets = array();
              # parse all widgets for current sidebar
              foreach ( $elemements as $id_widget => $args ) {
                  # add current widget to current sidebar
                  $this_sidebar_active_widgets[] = $id_widget;
                  # split widget name in order to get widget name and index
                  $id_widget_parts = explode('-',$id_widget);
                  # get widget index
                  $index_widget = end($id_widget_parts);
                  #remove widget index from array
                  array_pop($id_widget_parts);
                  #generate widget name
                  $widget_name = implode('-', $id_widget_parts);
                  #get all widgets who are like current widget
                  $widgets = get_option( 'widget_'.$widget_name );
                  #check if current index exist in array
                  if ( !isset($widgets[$index_widget]) ) {
                      #add current widget with his index and args
                      $widgets[$index_widget] = get_object_vars($args);
                  }
                  #update widgets who are like current widget
                  update_option( 'widget_'.$widget_name, $widgets );
              }
              $sidebars_widgets[$sidebar] = $this_sidebar_active_widgets;
          }
      }

      update_option( 'sidebars_widgets', $sidebars_widgets );

  }
    //add_action('after_switch_theme', 'pixova_lite_add_default_widgets');
}


