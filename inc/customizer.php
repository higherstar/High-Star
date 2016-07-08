<?php

function pixova_lite_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Remove sections from customizer front-view
	$wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'background_image' );

	# Necessary since we can't debug on IIS servers
	# Mac OS X rules for dev :)
	if( !pixova_lite_on_iis() ) {

		// Change panel for Site Title & Tagline Section
		$site_title        = $wp_customize->get_section( 'title_tagline' );
		$site_title->panel = 'pixova_lite_panel_general';

		// Change panel for Background Image
		/*
		$site_title        = $wp_customize->get_section( 'background_image' );
		$site_title->panel = 'pixova_lite_panel_general';
		*/

		// Change panel for Header Image
		$site_title2        = $wp_customize->get_section( 'header_image' );
		$site_title2->panel = 'pixova_lite_panel_intro';

		// Change panel for Static Front Page
		$site_title3        = $wp_customize->get_section( 'static_front_page' );
		$site_title3->panel = 'pixova_lite_panel_general';

		// Change priority for Site Title
		$site_title4           = $wp_customize->get_control( 'blogname' );
		$site_title4->section = 'pixova_lite_general_section';
		$site_title4->description = esc_html__('Company name in text format below', 'high-star');
		$site_title4->priority = 1;

		// Change priority for Site Tagline
		$site_title5           = $wp_customize->get_control( 'blogdescription' );
		$site_title5->priority = 17;
	}

	/**********************************************/
	/*************** ORDER ************************/
	/**********************************************/

	$wp_customize->add_section( 'pixova_lite_order_section' , array(
					'title'       => esc_html__( 'Section order', 'high-star' ),
					'priority'    => 26
	));

	$wp_customize->add_setting(
	        'pixova_lite_order_section',
	        array(
	        	'sanitize_callback' => 'pixova_lite_sanitize_pro_version'
	        )
	);

	$wp_customize->add_control( new Pixova_Lite_Theme_Support( $wp_customize,
			'pixova_lite_order_section',
		    array(
		        'section' => 'pixova_lite_order_section',
		   )
		)
	);

    $wp_customize->add_section( 'pixova_lite_pricing_section' , array(
        'title'       => esc_html__( 'Pricing tables', 'high-star' ),
        'priority'    => 38
    ));

    $wp_customize->add_setting(
        'pixova_lite_pricing_section',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_pro_version'
        )
    );

    $wp_customize->add_control( new Pixova_Lite_Theme_Support_Pricing( $wp_customize,
            'pixova_lite_pricing_section',
            array(
                'section' => 'pixova_lite_pricing_section',
            )
        )
    );

	$wp_customize->add_section( 'pixova_lite_maps_section' , array(
					'title'       => esc_html__( 'Google Maps', 'high-star' ),
					'priority'    => 37
	));

	$wp_customize->add_setting(
	        'pixova_lite_maps_section',
	        array(
	        	'sanitize_callback' => 'pixova_lite_sanitize_pro_version'
	        )
	);

	$wp_customize->add_control( new Pixova_Lite_Theme_Support_Googlemap( $wp_customize,
			'pixova_lite_maps_section',
		    array(
		        'section' => 'pixova_lite_maps_section',
		   )
		)
	);


	/* Section Visibility */
	$wp_customize->add_section( 'pixova_lite_visibility_section' ,
		array(
			'title'       => esc_html__( 'Section visibility', 'high-star' ),
			'priority'    => 25
		)
	);




	/* About visibility */
	$wp_customize->add_setting('pixova_lite_about_visibility',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => '1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
			'pixova_lite_about_visibility',
		    array(
		    	'type'	=> 'checkbox',
		    	'label' => esc_html__('Display the Pie Chart section ?', 'high-star'),
		        'section' => 'pixova_lite_visibility_section',
		   )
	);

	/* Recent works visibility */
	$wp_customize->add_setting('pixova_lite_works_visibility',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => '1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
			'pixova_lite_works_visibility',
		    array(
		    	'type'	=> 'checkbox',
		    	'label' => esc_html__('Display the works section ?', 'high-star'),
		        'section' => 'pixova_lite_visibility_section',
		   )
	);

	/* Testimonials visibility */
	$wp_customize->add_setting('pixova_lite_testimonials_visibility',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => '1',
		  'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
			'pixova_lite_testimonials_visibility',
		    array(
		    	'type'	=> 'checkbox',
		    	'label' => esc_html__('Display the testimonials section ?', 'high-star'),
		        'section' => 'pixova_lite_visibility_section',
		   )
	);

	/* Team visibility */
	$wp_customize->add_setting('pixova_lite_team_visibility',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => '1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
			'pixova_lite_team_visibility',
		    array(
		    	'type'	=> 'checkbox',
		    	'label' => esc_html__('Display the team section ?', 'high-star'),
		        'section' => 'pixova_lite_visibility_section',
		   )
	);

	/* News visibility */
	$wp_customize->add_setting('pixova_lite_news_visibility',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => '1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
			'pixova_lite_news_visibility',
		    array(
		    	'type'	=> 'checkbox',
		    	'label' => esc_html__('Display the news section ?', 'high-star'),
		        'section' => 'pixova_lite_visibility_section',
		   )
	);

	/* Contact visibility */
	$wp_customize->add_setting('pixova_lite_contact_visibility',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => '1',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
			'pixova_lite_contact_visibility',
		    array(
		    	'type'	=> 'checkbox',
		    	'label' => esc_html__('Display the contact section ?', 'high-star'),
		        'section' => 'pixova_lite_visibility_section',
		   )
	);


	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/


		$wp_customize->add_panel( 'pixova_lite_panel_general',
			array(
				'priority' => 24,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Theme options', 'high-star' )
			)
		);

		/***********************************************/
		/************** General Site Settings  ***************/
		/***********************************************/

		$wp_customize->add_section( 'pixova_lite_general_section' ,
			array(
				'title'       => esc_html__( 'General', 'high-star' ),
				'panel' 	  => 'pixova_lite_panel_general',
				'priority'    => 1,
			)
		);


		/* Company text logo */
		// $wp_customize->add_setting('pixova_lite_text_logo',
		// 	array(
		// 			'sanitize_callback' => 'sanitize_text_field',
		// 			'default' => esc_html__('Pixova', 'high-star'),
		// 			'transport' => 'postMessage'
		// 		)
		// );

		// $wp_customize->add_control(
		// 	'pixova_lite_text_logo',
		// 	array(
		// 		'label' 		=> esc_html__('Enter company name', 'high-star'),
		// 		'section' 		=> 'pixova_lite_general_section',
		// 		'description'   => esc_html__('Company name in text format below', 'high-star'),
		// 	)
		// );

		/* Company image logo : PRO Feature */
    $wp_customize->add_setting('pixova_lite_image_logo',
      array(
				'sanitize_callback' => 'pixova_lite_sanitize_file_url',
				'default' => esc_url( get_template_directory_uri() . '/layout/images/high-star-img-logo.png' ),
				'transport' => 'postMessage'
      )
    );

		$wp_customize->add_control( new WP_Customize_Image_Control(
 			$wp_customize,
 			'pixova_lite_image_logo',
 				array(
					'label' 	=> esc_html__( 'Upload company logo', 'high-star' ),
					'description' => esc_html__('Allowed image size: 250 x 50px', 'high-star'),
					'section' 	=> 'pixova_lite_general_section',

 				)
 			)
 		);


	/* COPYRIGHT */
	$wp_customize->add_setting( 'pixova_lite_copyright_enable',
		array(
			'label' => esc_html__( 'Enable theme copyright message in the footer?', 'high-star'),
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => 1,
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'pixova_lite_copyright_enable',
		array(
			'type'          => 'checkbox',
			'label' 				=> esc_html__('Display theme copyright in the footer?', 'high-star'),
			'description' => esc_html__('By disabling this field, the theme copyright text & links will be removed from the footer', 'high-star'),
			'section' 			=> 'pixova_lite_general_section',
			'std'           => '1'
		)
	);


	$wp_customize->add_setting( 'pixova_lite_copyright',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => sprintf('&copy; %s', esc_html__('Copyright 20', 'high-star') . sprintf("%s", date('y') ) . esc_html__('. All Rights Reserved', 'high-star') ),
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'pixova_lite_copyright' ,
		array(
				'type'		=> 'textarea',
				'label'    => esc_html__( 'Copyright', 'high-star' ),
			  'description' => esc_html__('This is your copyright message. Will be displayed in the footer', 'high-star'),
				'section'  => 'pixova_lite_general_section',
			)
	);

	/* Remove : What we do section :: PRO Feature */
	$wp_customize->add_setting('pixova_lite_what_we_do_section',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => esc_html__('Remove this section.', 'high-star'),
		)
	);

	$wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
			$wp_customize,
			'pixova_lite_what_we_do_section',
			array(
				'type'          => 'checkbox',
				'label' 		=> esc_html__('Remove what we do section?', 'high-star'),
				'section' 		=> 'pixova_lite_general_section',
				'std'           => '1'
			)
		)
	);

    /* Enable Preloader */
    $wp_customize->add_setting( 'pixova_lite_preloader_enabled',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
            'default' => 'preloader_enabled',
        )
    );
    $wp_customize->add_control(
        'pixova_lite_preloader_enabled' ,
        array(
            'type'	=> 'radio',
            'choices' => array(
                'preloader_enabled' => esc_html__('Enabled', 'high-star'),
                'preloader_disabled' => esc_html__('Disabled', 'high-star'),
            ),
            'label'    => esc_html__( 'Enable Preloader ?', 'high-star' ),
            'section'  => 'pixova_lite_general_section',
            'description' => esc_html__('Enable the LOADING message that is displayed when pages are loading ?', 'high-star')
        )
    );

	/* Enable Site Animations */
	$wp_customize->add_setting( 'pixova_lite_animations_enabled',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
			'default' => 'animations_enabled',
		)
	);
	$wp_customize->add_control(
		'pixova_lite_animations_enabled' ,
		array(
			'type'	=> 'radio',
			'choices' => array(
				'animations_enabled' => esc_html__('Enabled', 'high-star'),
				'animations_disabled' => esc_html__('Disabled', 'high-star'),
			),
			'label'    => esc_html__( 'Enable Section Animations ?', 'high-star' ),
			'section'  => 'pixova_lite_general_section',
			'description' => esc_html__('When scrolling, elements are coming into view with a slide-in animation. By disabling this setting, the swooshing of elements will be canceled.', 'high-star')
		)
	);

	#Breadcrumbs on single blog posts
	$wp_customize->add_setting( 'pixova_lite_enable_post_breadcrumbs',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
			'default' => 'breadcrumbs_enabled'
		)
	);

	$wp_customize->add_control(
		'pixova_lite_enable_post_breadcrumbs',
		array(
			'type'	=> 'radio',
			'choices' => array(
				'breadcrumbs_enabled' => esc_html__('Enabled', 'high-star'),
				'breadcrumbs_disabled' => esc_html__('Disabled', 'high-star')
			),
			'label' => esc_html__('Breadcrumbs on single blog posts', 'high-star'),
			'description' => esc_html__('This will disable the breadcrumbs', 'high-star'),
			'section'  => 'pixova_lite_general_section',
		)
	);

	# Default Blog Images :: Affects Sections / Section-News
	$wp_customize->add_setting( 'pixova_lite_enable_default_images',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
			'default' => 'images_disabled'
		)
	);

	$wp_customize->add_control(
		'pixova_lite_enable_default_images',
		array(
			'type'	=> 'radio',
			'choices' => array(
				'images_enabled' => esc_html__('Enabled', 'high-star'),
				'images_disabled' => esc_html__('Disabled', 'high-star')
			),
			'label' => esc_html__('Enable default blog images ?', 'high-star'),
			'description' => esc_html__('Disabling this will mean that when there is no featured image set, you will not have a placeholder.', 'high-star'),
			'section'  => 'pixova_lite_general_section',
		)
	);


	# Default Header Parallax Effect :: Affects Header Area
	$wp_customize->add_setting( 'pixova_lite_header_effect_enabled',
			array(
					'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
					'default' => 'header_effect_enabled'
			)
	);

	$wp_customize->add_control(
			'pixova_lite_header_effect_enabled',
			array(
					'type'	=> 'radio',
					'choices' => array(
							'header_effect_enabled' => esc_html__('Enabled', 'high-star'),
							'header_effect_disabled' => esc_html__('Disabled', 'high-star')
					),
					'label' => esc_html__('Enable Parallax Header Fade-out Effect ?', 'high-star'),
					'description' => esc_html__('Disabling this, will remove the header parallax text fade-out effect.', 'high-star'),
					'section'  => 'pixova_lite_general_section',
			)
	);




	    /***********************************************/
		/************** Contact Details  ***************/
		/***********************************************/
		$wp_customize->add_section( 'pixova_lite_general_contact_section' ,
			array(
				'title'       => esc_html__( 'Contact Details', 'high-star' ),
				'priority'    => 3,
				'panel' => 'pixova_lite_panel_contact'
			)
		);



		/* email */
		$wp_customize->add_setting( 'pixova_lite_email',
			array(
				'sanitize_callback' => 'esc_attr',
				'default' => esc_attr( 'contact@site.com' ),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( 'pixova_lite_email',
			array(
					'label'   => esc_html__( 'Email', 'high-star' ),
					'description' => esc_html__( 'Email address will be displayed on the left of the contact form. Updates in real time.', 'high-star'),
					'section' => 'pixova_lite_general_contact_section',
					'settings'   => 'pixova_lite_email',
				)
		);


		/* phone number */
		$wp_customize->add_setting( 'pixova_lite_phone',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_number',
				'default' => esc_attr( '0 332 548 954' ),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( 'pixova_lite_phone',
			array(
				'label'   => esc_html__( 'Phone number', 'high-star' ),
				'description' => esc_html__( 'Phone number will be displayed on the left of the contact form. Updates in real time.', 'high-star'),
				'section' => 'pixova_lite_general_contact_section',
				'settings'   => 'pixova_lite_phone',
				)
		);

		/* address */
		$wp_customize->add_setting( 'pixova_lite_address',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Street 221B Baker Street','high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( 'pixova_lite_address',
			array(
					'type'		=> 'textarea',
					'label'   => esc_html__( 'Address', 'high-star' ),
					'description' => esc_html__( 'Street Address will be displayed on the left of the contact form. Updates in real time.', 'high-star'),
					'section' => 'pixova_lite_general_contact_section',
					'settings'   => 'pixova_lite_address',
				)
		) ;


	/***********************************************/
	/************** Breadcrumb Settings  ***************/
	/***********************************************/

	$wp_customize->add_section( 'pixova_lite_blog_breadcrumb_section' ,
		array(
			'title'       => esc_html__( 'Breadcrumbs', 'high-star' ),
			'description' => esc_html__( 'Various breadcrumb related settings, like: breadcrumb prefix, breadcrumb item separator & breadcrumb menu post category visibility setting.', 'high-star'),
			'panel' 	  => 'pixova_lite_panel_general',
		)
	);


	/* BreadCrumb Menu:  Prefix */
	$wp_customize->add_setting('pixova_lite_blog_breadcrumb_menu_prefix',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__('You are here', 'high-star'),
		)
	);
	$wp_customize->add_control(
		'pixova_lite_blog_breadcrumb_menu_prefix',
		array(
			'label' => esc_html__('Text before the breadcrumbs menu', 'high-star'),
			'description' => esc_html__('Recommended: You are here','high-star'),
			'section' => 'pixova_lite_blog_breadcrumb_section',
		)
	);

	/* BreadCrumb Menu:  separator */
	$wp_customize->add_setting('pixova_lite_blog_breadcrumb_menu_separator',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
			'default' => 'rarr'
		)
	);
	$wp_customize->add_control(
		'pixova_lite_blog_breadcrumb_menu_separator',
		array(
			'type' => 'select',
			'choices' => array(
				'rarr' => esc_html('&rarr;'),
				'middot' => esc_html('&middot;'),
				'diez' => esc_html('&#35;'),
				'ampersand' => esc_html('&#38;'),
			),
			'label' => esc_html__('Separator to be used between breadcrumb items', 'high-star'),
			'description' => esc_html__('Select from predefined separators', 'high-star'),
			'section' => 'pixova_lite_blog_breadcrumb_section',
		)
	);

	/* BreadCrumb Menu:  post category */
	$wp_customize->add_setting('pixova_lite_blog_breadcrumb_menu_post_category',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
			'default' => 1
		)
	);
	$wp_customize->add_control(
		'pixova_lite_blog_breadcrumb_menu_post_category',
		array(
			'type' => 'checkbox',
			'label' => esc_html__('Show post category ?', 'high-star'),
			'description' => esc_html__('Show the post category in the breadcrumb ?', 'high-star'),
			'section' => 'pixova_lite_blog_breadcrumb_section',
		)
	);

	/************************************************/
	/***************** Related Posts ****************/
	/************************************************/
	$wp_customize->add_section( 'pixova_lite_blog_related_section' ,
        array(
            'title'       => esc_html__( 'Blog Settings', 'high-star' ),
            'description' => esc_html__( 'Control various post settings from here. For a demo-like experience, we recommend you don\'t change these settings.', 'high-star'),
            'panel' 	  => 'pixova_lite_panel_general'
        )
    );
		

		/*  Header Image */
		$wp_customize->add_setting( 'pixova_lite_enable_blog_header_image',
				array(
						'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
						'default' => 1
				)
		);

		$wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
			$wp_customize,
				'pixova_lite_enable_blog_header_image',
					array(
							'type'	=> 'checkbox',
							'label' => esc_html__('Header image on blog?', 'high-star'),
							'section' => 'pixova_lite_blog_related_section',
					)
			)
		);

		/* Blog Page Title */
		$wp_customize->add_setting('pixova_lite_blog_text_title',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('Blog', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
			'pixova_lite_blog_text_title',
			array(
				'label' 		=> esc_html__('Enter Archive(Blog) Page Title', 'high-star'),
				'section' 		=> 'pixova_lite_blog_related_section',
			)
		);

		/* Blog Page Description */
		$wp_customize->add_setting('pixova_lite_blog_text_description',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('Maecenas eget nisl vitae nunc molestie elementum non id urna.', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
			'pixova_lite_blog_text_description',
			array(
				'label' 		=> esc_html__('Enter Archive(Blog) Page Description', 'high-star'),
				'section' 		=> 'pixova_lite_blog_related_section',
			)
		);

		# Related posts show
		$wp_customize->add_setting( 'pixova_lite_related_posts_enabled',
				array(
						'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons',
						'default' => 'pixova_lite_related_posts_enable'
				)
		);

		$wp_customize->add_control(
				'pixova_lite_related_posts_enabled',
				array(
						'type'	=> 'radio',
						'choices' => array(
								'pixova_lite_related_posts_enable' => esc_html__('Enabled', 'high-star'),
								'pixova_lite_related_posts_disable' => esc_html__('Disabled', 'high-star')
						),
						'label' => esc_html__('Enable Related Posts Section?', 'high-star'),
						'description' => esc_html__('Disabling this, will remove the related posts box at the end of posts', 'high-star'),
						'section'  => 'pixova_lite_blog_related_section',
				)
		);

		/*  Prev / Next post */
		$wp_customize->add_setting( 'pixova_lite_enable_content_navigation',
				array(
						'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
						'default' => 1
				)
		);

		$wp_customize->add_control(
		'pixova_lite_enable_content_navigation',
			array(
				'type'	=> 'checkbox',
				'label' => esc_html__('Show prev/next links below posts?', 'high-star'),
				'section' => 'pixova_lite_blog_related_section',
			)
		);

		/*  Author Box */
		$wp_customize->add_setting( 'pixova_lite_enable_author_box',
				array(
						'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
						'default' => 1
				)
		);

		$wp_customize->add_control(
		'pixova_lite_enable_author_box',
			array(
				'type'	=> 'checkbox',
				'label' => esc_html__('Show author box below posts?', 'high-star'),
				'section' => 'pixova_lite_blog_related_section',
			)
		);






    /*  related posts title */
    $wp_customize->add_setting( 'pixova_lite_enable_related_title_blog_posts',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
            'default' => 0
        )
    );
    $wp_customize->add_control(
        'pixova_lite_enable_related_title_blog_posts',
	        array(
	            'type'	=> 'checkbox',
	            'label' => esc_html__('Posts title in the carousel ?', 'high-star'),
	            'section' => 'pixova_lite_blog_related_section',
	        )
    );

    /*  related posts date */
    $wp_customize->add_setting( 'pixova_lite_enable_related_date_blog_posts',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
            'default' => 0
        )
    );
    $wp_customize->add_control(
        'pixova_lite_enable_related_date_blog_posts',
	        array(
	            'type'	=> 'checkbox',
	            'label' => esc_html__('Carousel related posts date?', 'high-star'),
	            'section' => 'pixova_lite_blog_related_section',
	        )
    );


    /* Auto play carousel */
    $wp_customize->add_setting( 'pixova_lite_autoplay_blog_posts',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
            'default' => 1,
        )
    );
    $wp_customize->add_control(
        'pixova_lite_autoplay_blog_posts',
	        array(
	            'type'	=> 'checkbox',
	            'label' => esc_html__('Autoplay related carousel?', 'high-star'),
	            'section' => 'pixova_lite_blog_related_section',
	        )
    );

    /* Number of related posts to display at once  */
    $wp_customize->add_setting( 'pixova_lite_howmany_blog_posts',
        array(
            'sanitize_callback' => 'absint',
            'default' => 3
        )
    );
    $wp_customize->add_control( new Pixova_lite_Controls_Slider_Control($wp_customize,
        'pixova_lite_howmany_blog_posts',
            array(
                'label' => esc_html__('How many blog posts to display in the carousel at once?', 'high-star'),
                'description' => esc_html__('No more than 4 posts at once;', 'high-star'),
                'choices' => array(
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                ),
                'section' => 'pixova_lite_blog_related_section',
                'default' => 3
            )
        )
    );

    /* Display pagination ?  */
    $wp_customize->add_setting( 'pixova_lite_pagination_blog_posts',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
            'default' => 1
        )
    );
    $wp_customize->add_control(
	        'pixova_lite_pagination_blog_posts',
	        array(
	            'type'	=> 'checkbox',
	            'label' => esc_html__('Carousel pagination controls?', 'high-star'),
	            'description' => esc_html__('Will be displayed as navigation bullets', 'high-star'),
	            'section' => 'pixova_lite_blog_related_section',
	        )
    );

    /************************************************/
 	/******************* WooCommerce ****************/
 	/************************************************/
	if( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_section( 'pixova_lite_woocommerce' ,
			array(
				'title'			=> esc_html__( 'WooCommerce', 'high-star' ),
				'description'	=> esc_html__( 'Control various for WooCommerce.', 'high-star'),
				'priority'		=> 39
			)
		);

		// Show Header Image?
		$wp_customize->add_setting( 'pixova_lite_woocommerce_show_header_image',
			array(
				'sanitize_callback'	=> 'pixova_lite_sanitize_radio_buttons',
				'default'			=> 'show'
			)
		);
		$wp_customize->add_control(
			'pixova_lite_woocommerce_show_header_image',
			array(
				'type'			=> 'radio',
				'label'			=> esc_html__( 'Show Header Image?', 'high-star' ),
				'description'	=> esc_html__( 'Select to show or not to show the header image on WooCommerce pages.', 'high-star' ),
				'choices'		=> array(
					'show'	=> esc_html__( 'Show', 'high-star' ),
					'hide'	=> esc_html__( 'Hide', 'high-star' )
				),
				'section'		=> 'pixova_lite_woocommerce',
			)
		);

		// Header Image
		$wp_customize->add_setting( 'pixova_lite_woocommerce_header_image',
			array(
				'sanitize_callback'	=> 'pixova_lite_sanitize_file_url',
				'default'			=> esc_url( get_template_directory_uri() . '/layout/images/header-bg.jpg' ),
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'pixova_lite_woocommerce_header_image',
				array(
					'label'				=> __( 'Header Image', 'high-star' ),
					'description'		=> esc_html__( 'Select custom header image for WooCommerce pages.', 'high-star' ),
					'section'			=> 'pixova_lite_woocommerce',
					'active_callback'	=> 'is_woocommerce_show_header_image'
				)
		) );

		// Title
		$wp_customize->add_setting( 'pixova_lite_woocommerce_title',
			array(
				'sanitize_callback'	=> 'sanitize_text_field',
				'default'			=> __( 'WooCommerce', 'high-star' ),
			)
		);
		$wp_customize->add_control(
			'pixova_lite_woocommerce_title',
			array(
				'label'				=> __( 'Title', 'high-star' ),
				'description'		=> esc_html__( 'Add the custom title for WooCommerce pages.', 'high-star' ),
				'section'			=> 'pixova_lite_woocommerce',
				'active_callback'	=> 'is_woocommerce_show_header_image'
			)
		);

		// Description
		$wp_customize->add_setting( 'pixova_lite_woocommerce_description',
			array(
				'sanitize_callback'	=> 'sanitize_text_field',
				'default'			=> esc_html__( 'We have the best products.', 'high-star' ),
			)
		);
		$wp_customize->add_control(
			'pixova_lite_woocommerce_description',
			array(
				'label'				=> __( 'Description', 'high-star' ),
				'description'		=> __( 'Add the custom description for WooCommerce pages.', 'high-star' ),
				'section'			=> 'pixova_lite_woocommerce',
				'active_callback'	=> 'is_woocommerce_show_header_image',
				'type'				=> 'textarea'
			)
		);

		// Show Sidebar on Shop Page?
		$wp_customize->add_setting( 'pixova_lite_woocommerce_show_sidebar_on_shop_page',
			array(
				'sanitize_callback'	=> 'pixova_lite_sanitize_radio_buttons',
				'default'			=> 'show'
			)
		);
		$wp_customize->add_control(
			'pixova_lite_woocommerce_show_sidebar_on_shop_page',
			array(
				'type'			=> 'radio',
				'label'			=> esc_html__( 'Show sidebar on Shop Page?', 'high-star' ),
				'description'	=> esc_html__( 'Select to show or not to show the sidebar on WooCommerce Shop Page.', 'high-star' ),
				'choices'		=> array(
					'show'	=> esc_html__( 'Show', 'high-star' ),
					'hide'	=> esc_html__( 'Hide', 'high-star' )
				),
				'section'		=> 'pixova_lite_woocommerce',
			)
		);

		// Show Sidebar on Left or Right side?
		$wp_customize->add_setting( 'pixova_lite_woocommerce_show_sidebar_on_left_or_right_side',
			array(
				'sanitize_callback'	=> 'pixova_lite_sanitize_radio_buttons',
				'default'			=> 'left'
			)
		);
		$wp_customize->add_control(
			'pixova_lite_woocommerce_show_sidebar_on_left_or_right_side',
			array(
				'type'				=> 'radio',
				'label'				=> esc_html__( 'Show Sidebar on Left or Right side?', 'high-star' ),
				'description'		=> esc_html__( 'Select where you want to show the sidebar on WooCommerce Shop Page.', 'high-star' ),
				'choices'			=> array(
					'left'	=> esc_html__( 'Left', 'high-star' ),
					'right'	=> esc_html__( 'Right', 'high-star' )
				),
				'section'			=> 'pixova_lite_woocommerce',
				'active_callback'	=> 'is_woocommerce_show_sidebar_on_shop_page'
			)
		);
	}


	/***********************************************/
	/************** Intro  ***************/
	/***********************************************/

	$wp_customize->add_panel( 'pixova_lite_panel_intro',
			array(
				'priority' => 30,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'CTA Section (big bg. image)', 'high-star' )
			)
		);

	# Intro Video
	$wp_customize->add_section( 'pixova_lite_intro_video' ,
		array(
			'title'       		=> esc_html__( 'Header Video', 'high-star' ),
			'panel' 			=> 'pixova_lite_panel_intro'
		)
	);

	$wp_customize->add_setting( 'pixova_lite_intro_video_container',
		array(
			'sanitize_callback' => 'esc_url',
			'default' => esc_url('https://www.youtube.com/watch?v=FijBkSvN6N8')
		)
	);

	$wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
			$wp_customize,
			'pixova_lite_intro_video_container',
			array(
				'type'      => 'textarea',
				'label' 	=> esc_html__('Enter YouTube video URL ', 'high-star'),
				'section' 	=> 'pixova_lite_intro_video',
			)
		)
	);

	# Upgrade NOW: Video Section
	$wp_customize->add_setting(
		'pixova_lite_video_upgrade_pro',
		array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( new Pixova_Lite_WP_Pro_Customize_Control(
		$wp_customize,
			'pixova_lite_video_upgrade_pro',
			array(
				'label' => esc_html__('Discover Pixova PRO','high-star'),
				'section' => 'pixova_lite_intro_video',
			)
		)
	);

	# Intro Slider
	$wp_customize->add_section( 'pixova_lite_intro_slider' ,
			array(
					'title'       		=> esc_html__( 'Header Slider', 'high-star' ),
					'panel' 			=> 'pixova_lite_panel_intro'
			)
	);

	$wp_customize->add_setting( 'pixova_lite_intro_slider_container',
			array(
					'sanitize_callback' => 'esc_url',
					'default' => esc_url('https://www.your-image-url-here.com')
			)
	);

	$wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
					$wp_customize,
					'pixova_lite_intro_slider_container',
					array(
							'type'      => 'textarea',
							'label' 	=> esc_html__('Enter Slide #1 Image URL ', 'high-star'),
							'section' 	=> 'pixova_lite_intro_slider',
					)
			)
	);

	# Upgrade NOW: Slider Section
	$wp_customize->add_setting(
			'pixova_lite_slider_upgrade_pro',
			array(
					'default' => '',
					'capability'     => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
			)
	);
	$wp_customize->add_control( new Pixova_Lite_WP_Pro_Customize_Control(
					$wp_customize,
					'pixova_lite_slider_upgrade_pro',
					array(
							'label' => esc_html__('Discover Pixova PRO','high-star'),
							'section' => 'pixova_lite_intro_slider',
					)
			)
	);


	/* Text Section */
	$wp_customize->add_section( 'pixova_lite_intro_text' ,
		array(
			'title'       => esc_html__( 'CTA Text', 'high-star' ),
			'panel' 			=> 'pixova_lite_panel_intro'
		)
	);

		/* Main CTA title */
		$wp_customize->add_setting( 'pixova_lite_intro_title_cta',
			array(
				'sanitize_callback'	=> 'pixova_lite_sanitize_textarea_nl2br',
				'default'			=> __( 'WELCOME TO high star', 'high-star' ),
				'transport'			=> 'refresh'
			)
		);
		$wp_customize->add_control(
			'pixova_lite_intro_title_cta',
			array(
				'type'				=> 'textarea',
				'label'				=> esc_html__( 'Main CTA title', 'high-star' ),
				// 'description'		=> esc_html__( 'This is your main attention grabber. Make the best of it.' , 'high-star' ),
				'section'			=> 'pixova_lite_intro_text'
			)
		);

		/* Main CTA text */
		$wp_customize->add_setting( 'pixova_lite_intro_cta',
			array(
				'sanitize_callback'	=> 'pixova_lite_sanitize_textarea_nl2br',
				'default'			=> __( 'Free & Modern One-Page Parallax WordPress Theme', 'high-star' ),
				'transport'			=> 'refresh'
			)
		);
		$wp_customize->add_control(
			'pixova_lite_intro_cta',
			array(
				'type'				=> 'textarea',
				'label'				=> esc_html__( 'Main CTA text', 'high-star' ),
				'description'		=> esc_html__( 'This is your main attention grabber. Make the best of it.' , 'high-star' ),
				'section'			=> 'pixova_lite_intro_text'
			)
		);

		/* Main CTA sub-text */
		$wp_customize->add_setting('pixova_lite_intro_sub_cta',
			array(
				'sanitize_callback' => 'pixova_lite_saniteze_intro',
				'default' => esc_html__('Your cool business headline here. You can even <u><strong>insert HTML here & images</strong></u>.<br> Lorem ipsum dolor sit amet lorem dolor sit amet.', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_sub_cta',
				array(
					'type'		=> 'textarea',
					'label' 	=> esc_html__('Main CTA sub-title ', 'high-star'),
					'description' => esc_html__('Most often main call to actions work best with a sub call to action that emphasises the main CTA.', 'high-star'),
					'section' 	=> 'pixova_lite_intro_text',
				)

		);


	/* Outline Button Section */
	$wp_customize->add_section( 'pixova_lite_intro_outline_button' ,
		array(
			'title'       => esc_html__( 'Outline Button', 'high-star' ),
			'panel' 			=> 'pixova_lite_panel_intro'
		)
	);

		/* Outline Button text */
		$wp_customize->add_setting('pixova_lite_intro_outline_button_text',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('LEARN MORE', 'high-star'),
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_outline_button_text',
			array(
				'label' 	=> esc_html__('Button text ', 'high-star'),
				'description' => esc_html__('Text to be displayed on the button. Like BUY NOW or other Call To Action Text', 'high-star'),
				'section' 	=> 'pixova_lite_intro_outline_button',
			)

		);
		
		/* Outline Button URL */
		$wp_customize->add_setting('pixova_lite_intro_outline_button_url',
			array(
				'sanitize_callback' => 'esc_url',
				'default' => esc_url('#about'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_outline_button_url',
			array(
				'label' 	=> esc_html__('Button URL ', 'high-star'),
				'description' => esc_html__('You can make this button link to a section on the homepage, by using the section id and a # in front of it', 'high-star'),
				'section' 	=> 'pixova_lite_intro_outline_button',
			)
		);

		# Outline Button Background color
		$wp_customize->add_setting('pixova_lite_intro_outline_button_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => esc_attr('#ffffff'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( new WP_Customize_Color_Control (
		$wp_customize,
			'pixova_lite_intro_outline_button_color',
				array(
					'label' 		=> esc_html__('Button border color ', 'high-star'),
					'description' => esc_html__('Change the button border color from here.', 'high-star'),
					'section' 	=> 'pixova_lite_intro_outline_button',
				)
			)
		);

		# Outline Button Text color
		$wp_customize->add_setting('pixova_lite_intro_outline_button_text_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => esc_attr('#ffffff'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( new WP_Customize_Color_Control (
		$wp_customize,
			'pixova_lite_intro_outline_button_text_color',
				array(
					'label' 		=> esc_html__('Button text color ', 'high-star'),
					'description' => esc_html__('Change the button text color from here.', 'high-star'),
					'section' 	=> 'pixova_lite_intro_outline_button',
				)
			)
		);



	/* Button Section */
	$wp_customize->add_section( 'pixova_lite_intro_button' ,
		array(
			'title'       => esc_html__( 'Button', 'high-star' ),
			'panel' 			=> 'pixova_lite_panel_intro'
		)
	);

		/* Button text */
		$wp_customize->add_setting('pixova_lite_intro_button_text',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('CONTACT US', 'high-star'),
				'transport' => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_button_text',
			array(
				'label' 	=> esc_html__('Button text ', 'high-star'),
				'description' => esc_html__('Text to be displayed on the button. Like BUY NOW or other Call To Action Text', 'high-star'),
				'section' 	=> 'pixova_lite_intro_button',
			)

		);

		/* Button URL */
		$wp_customize->add_setting('pixova_lite_intro_button_url',
			array(
				'sanitize_callback' => 'esc_url',
				'default' => esc_url('#about'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_button_url',
			array(
				'label' 	=> esc_html__('Button URL ', 'high-star'),
				'description' => esc_html__('You can make this button link to a section on the homepage, by using the section id and a # in front of it', 'high-star'),
				'section' 	=> 'pixova_lite_intro_button',
			)
		);

		# Button Background color
		$wp_customize->add_setting('pixova_lite_intro_button_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => esc_attr('#f2c351'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( new WP_Customize_Color_Control (
		$wp_customize,
			'pixova_lite_intro_button_color',
				array(
					'label' 		=> esc_html__('Button background color ', 'high-star'),
					'description' => esc_html__('Change the button background color from here.', 'high-star'),
					'section' 	=> 'pixova_lite_intro_button',
				)
			)
		);

		# Button Text color
		$wp_customize->add_setting('pixova_lite_intro_button_text_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => esc_attr('#ffffff'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control( new WP_Customize_Color_Control (
		$wp_customize,
			'pixova_lite_intro_button_text_color',
				array(
					'label' 		=> esc_html__('Button text color ', 'high-star'),
					'description' => esc_html__('Change the button text color from here.', 'high-star'),
					'section' 	=> 'pixova_lite_intro_button',
				)
			)
		);

		/* Show what we do ? */
		$wp_customize->add_section( 'pixova_lite_show_what_we_do' ,
			array(
				'title'       		=> esc_html__( 'Show what we do section ?', 'high-star' ),
				'panel' 					=> 'pixova_lite_panel_intro'
			)
		);


		/* What we do #1: change icon */
		$wp_customize->add_setting('pixova_lite_intro_what_we_do_enabled',
						array(
										'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
										'default' => 0,
						)
		);

		$wp_customize->add_control(
						'pixova_lite_intro_what_we_do_enabled',
						array(
										'type'      => 'checkbox',
										'label' 		=> esc_html__('Enable what we do section?', 'high-star'),
										'section' 	=> 'pixova_lite_show_what_we_do',
										'default' => 0,
						)
		);


	/* What we do Section #1 */
	$wp_customize->add_section( 'pixova_lite_intro_what_we_do_1' ,
		array(
			'title'       		=> esc_html__( 'What we do #1', 'high-star' ),
      'description'    	=> esc_html__('Use the controls below to change the way the what we do icons & text look.', 'high-star'),
			'panel' 					=> 'pixova_lite_panel_intro'
		)
	);

                /* What we do #1: change icon */
                $wp_customize->add_setting('pixova_lite_intro_what_we_do_1_icon',
                        array(
                                'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
                                'default' => esc_html__('fa fa-droplet', 'high-star'),
                        )
                );

                $wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
                                $wp_customize,
                                'pixova_lite_intro_what_we_do_1_icon',
                                array(
                                        'type'                  => 'text',
                                        'label' 		=> esc_html__('Specify icon name', 'high-star'),
                                        'section' 		=> 'pixova_lite_intro_what_we_do_1',
                                )
                        )
                );

		/* What we do #1: title */
		$wp_customize->add_setting('pixova_lite_intro_what_we_do_1_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Web design', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_what_we_do_1_title',
			array(
				'label' 	=> esc_html__('What we do #1 title ', 'high-star'),
				'section' 	=> 'pixova_lite_intro_what_we_do_1',
			)

		);

		/* What we do #1: description */
		$wp_customize->add_setting('pixova_lite_intro_what_we_do_1_description',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Lorem ipsum dolor sit amet. Lorem ipsum.', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_what_we_do_1_description',
				array(
					'type'		=> 'textarea',
					'label' 	=> esc_html__('What we do #1 description ', 'high-star'),
					'section' 	=> 'pixova_lite_intro_what_we_do_1',
				)
		);


	/* What we do Section #2 */
	$wp_customize->add_section( 'pixova_lite_intro_what_we_do_2' ,
		array(
			'title'       		=> esc_html__( 'What we do #2', 'high-star' ),
      'description'     => esc_html__('Use the controls below to change the way the what we do icons & text look.', 'high-star'),
			'panel' 					=> 'pixova_lite_panel_intro'
		)
	);

                /* What we do #2: change icon */
                $wp_customize->add_setting('pixova_lite_intro_what_we_do_2_icon',
                        array(
                                'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
                                'default' => esc_html__('fa fa-development', 'high-star'),
                        )
                );

                $wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
                                $wp_customize,
                                'pixova_lite_intro_what_we_do_2_icon',
                                array(
                                        'type'                  => 'text',
                                        'label' 		=> esc_html__('Specify icon name', 'high-star'),
                                        'section' 		=> 'pixova_lite_intro_what_we_do_2',
                                )
                        )
                );

		/* What we do #2: title */
			$wp_customize->add_setting('pixova_lite_intro_what_we_do_2_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('Development', 'high-star'),
					'transport' => 'postMessage'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_intro_what_we_do_2_title',
				array(
					'label' 	=> esc_html__('What we do #2 title ', 'high-star'),
					'section' 	=> 'pixova_lite_intro_what_we_do_2',
				)

			);

			/* What we do #2: description */
			$wp_customize->add_setting('pixova_lite_intro_what_we_do_2_description',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('Lorem ipsum dolor sit amet. Lorem ipsum.', 'high-star'),
					'transport' => 'postMessage'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_intro_what_we_do_2_description',
					array(
						'type'	=> 'textarea',
						'label' 	=> esc_html__('What we do #2 description ', 'high-star'),
						'section' 	=> 'pixova_lite_intro_what_we_do_2',
					)
			);


	/* What we do Section #3 */
	$wp_customize->add_section( 'pixova_lite_intro_what_we_do_3' ,
		array(
			'title'       		=> esc_html__( 'What we do #3', 'high-star' ),
      'description'     => esc_html__('Use the controls below to change the way the what we do icons & text look.', 'high-star'),
			'panel' 					=> 'pixova_lite_panel_intro'
		)
	);

                /* What we do #1: change icon */
                $wp_customize->add_setting('pixova_lite_intro_what_we_do_3_icon',
                        array(
                                'sanitize_callback' => 'pixova_lite_sanitize_checkbox',
                                'default' => esc_html__('fa fa-envelope', 'high-star'),
                        )
                );

                $wp_customize->add_control( new Pixova_Lite_Disabled_Custom_Control(
                                $wp_customize,
                                'pixova_lite_intro_what_we_do_3_icon',
                                array(
                                        'type'                  => 'text',
                                        'label' 		=> esc_html__('Specify icon name', 'high-star'),
                                        'section' 		=> 'pixova_lite_intro_what_we_do_3',
                                )
                        )
                );

		/* What we do #3: title */
		$wp_customize->add_setting('pixova_lite_intro_what_we_do_3_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Print design', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_what_we_do_3_title',
			array(
				'label' 	=> esc_html__('What we do #3 title ', 'high-star'),
				'section' 	=> 'pixova_lite_intro_what_we_do_3',
			)

		);

		/* What we do #3: description */
		$wp_customize->add_setting('pixova_lite_intro_what_we_do_3_description',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Lorem ipsum dolor sit amet. Lorem ipsum.', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control(
			'pixova_lite_intro_what_we_do_3_description',
				array(
					'type'	=> 'textarea',
					'label' 	=> esc_html__('What we do #3 description ', 'high-star'),
					'section' 	=> 'pixova_lite_intro_what_we_do_3',
				)
		);



	/***********************************************/
	/************** About Options  ***************/
	/***********************************************/


		$wp_customize->add_panel( 'pixova_lite_panel_about',
			array(
				'priority' => 31,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Pie Chart Section', 'high-star' )
			)
		);

		$wp_customize->add_section( 'pixova_lite_about_titles' , array(
				'title'       => esc_html__( 'Section Titles', 'high-star' ),
				'priority'    => 1,
				'panel' 	  => 'pixova_lite_panel_about'
		));

		/* Section Title */
		$wp_customize->add_setting('pixova_lite_about_section_title',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('We build solutions for your everyday problems.', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
			'pixova_lite_about_section_title',
			array(
				'label' 	=> esc_html__('Section title', 'high-star'),
				'section' 	=> 'pixova_lite_about_titles',
			)
		);

		/* Section Sub-Title */
		$wp_customize->add_setting('pixova_lite_about_section_sub_title',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'	=> esc_html__('This is what we do in a nutshell', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
			'pixova_lite_about_section_sub_title',
			array(
				'label' 	=> esc_html__('Section sub-title', 'high-star'),
				'section' 	=> 'pixova_lite_about_titles',

			)
		);



		$wp_customize->add_section('pixova_lite_about_section_text',
			array(
				'title' => esc_html__('Section text', 'high-star'),
				'priority' => 1,
				'panel' => 'pixova_lite_panel_about'
			)
		);

		/* About textarea */
		$wp_customize->add_setting('pixova_lite_about_section_textarea',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
					'default' => esc_html__('Creative ut tincidunt nibh, varius cursus nunc. Curabitur molestie, metus vel luctus euismod, mi libero laoreet odio, eu dapibus leo tortor sit amet purus. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
				'pixova_lite_about_section_textarea',
					array(
						'type'	=> 'textarea',
						'label' => esc_html__('Block of text', 'high-star'),
						'description' => esc_html__('This block accepts limited HTML. Accepted tags are: a, img, em, br & strong.', 'high-star'),
						'section' => 'pixova_lite_about_section_text',
					)
		);

		/* About blockquote */
		$wp_customize->add_setting('pixova_lite_about_section_blockquote',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
					'default' => esc_html__('Working with Pixova has been an experience for a lifetime. I strongly reccommend these guys for their awesome support. Erlich Bachman, Aviato', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
				'pixova_lite_about_section_blockquote',
					array(
						'type'	=> 'textarea',
						'label' => esc_html__('Blockquote', 'high-star'),
						'description' => esc_html__('This block accepts limited HTML. Accepted tags are: a, img, em, br & strong.', 'high-star'),
						'section' => 'pixova_lite_about_section_text',
					)
		);

		/* Section Chart # 1 */
		$wp_customize->add_section('pixova_lite_section_chart_1',
			array(
				'title' 	=> esc_html__('Section Chart #1', 'high-star'),
				'priority' 	=> 2,
				'panel' 	=> 'pixova_lite_panel_about'
			)
		);

		/* Chart #1 Heading */
		$wp_customize->add_setting('pixova_lite_about_section_chart_1_heading',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Web design', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control('pixova_lite_about_section_chart_1_heading',
			array(
				'label' => esc_html__('Heading for chart', 'high-star'),
				'section' => 'pixova_lite_section_chart_1',
				'priority' => 0
			)
		);

		/* Chart #1 Settings */
		$wp_customize->add_setting('pixova_lite_about_section_chart_1_percentage',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => '70',
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control( new Pixova_Lite_Number_Custom_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_1_percentage',
				array(
					'label' 	=> esc_html__('Chart Percentage', 'high-star'),
					'section' 	=> 'pixova_lite_section_chart_1',
					'priority' 	=> 1,
				)
			)
		);

		/* Chart Bar Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_1_bar_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => pixova_lite_sanitize_hex_color( '#f2c351' ),
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_1_bar_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart bar color', 'high-star'),
					'section' => 'pixova_lite_section_chart_1',
					'priority' => 2
				)
			)
		);

		/* Chart Track Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_1_track_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#EEE'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_1_track_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart Track color', 'high-star'),
					'section' => 'pixova_lite_section_chart_1',
					'priority' => 3
				)
			)
		);



		/* Section Chart # 2 */
		$wp_customize->add_section('pixova_lite_section_chart_2',
			array(
				'title' 	=> esc_html__('Section Chart #2', 'high-star'),
				'priority' 	=> 3,
				'panel' 	=> 'pixova_lite_panel_about'
			)
		);

		/* Chart #2 Heading */
		$wp_customize->add_setting('pixova_lite_about_section_chart_2_heading',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Web development', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control('pixova_lite_about_section_chart_2_heading',
			array(
				'label' => esc_html__('Heading for chart', 'high-star'),
				'section' => 'pixova_lite_section_chart_2',
				'priority' => 0
			)
		);

		/* Chart #2 Settings */
		$wp_customize->add_setting('pixova_lite_about_section_chart_2_percentage',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => '90',
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control( new Pixova_Lite_Number_Custom_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_2_percentage',
				array(
					'label' 	=> esc_html__('Chart Percentage', 'high-star'),
					'section' 	=> 'pixova_lite_section_chart_2',
					'priority' 	=> 1,
				)
			)
		);

		/* Chart Bar Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_2_bar_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#f2c351'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_2_bar_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart bar color', 'high-star'),
					'section' => 'pixova_lite_section_chart_2',
					'priority' => 2
				)
			)
		);

		/* Chart Track Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_2_track_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#EEE'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_2_track_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart Track color', 'high-star'),
					'section' => 'pixova_lite_section_chart_2',
					'priority' => 3
				)
			)
		);

		/* Section Chart #3 */
		$wp_customize->add_section('pixova_lite_section_chart_3',
			array(
				'title' 	=> esc_html__('Section Chart #3', 'high-star'),
				'priority' 	=> 4,
				'panel' 	=> 'pixova_lite_panel_about'
			)
		);

		/* Chart #3 Heading */
		$wp_customize->add_setting('pixova_lite_about_section_chart_3_heading',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Print design', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control('pixova_lite_about_section_chart_3_heading',
			array(
				'label' => esc_html__('Heading for chart', 'high-star'),
				'section' => 'pixova_lite_section_chart_3',
				'priority' => 0
			)
		);

		/* Chart #3 Settings */
		$wp_customize->add_setting('pixova_lite_about_section_chart_3_percentage',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => '90',
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control( new Pixova_Lite_Number_Custom_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_3_percentage',
				array(
					'label' 	=> esc_html__('Chart Percentage', 'high-star'),
					'section' 	=> 'pixova_lite_section_chart_3',
					'priority' 	=> 1,
				)
			)
		);

		/* Chart Bar Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_3_bar_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#f2c351'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_3_bar_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart bar color', 'high-star'),
					'section' => 'pixova_lite_section_chart_3',
					'priority' => 2
				)
			)
		);

		/* Chart Track Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_3_track_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#EEE'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_3_track_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart Track color', 'high-star'),
					'section' => 'pixova_lite_section_chart_3',
					'priority' => 3
				)
			)
		);

		/* Section Chart #4 */
		$wp_customize->add_section('pixova_lite_section_chart_4',
			array(
				'title' 	=> esc_html__('Section Chart #4', 'high-star'),
				'priority' 	=> 5,
				'panel' 	=> 'pixova_lite_panel_about'
			)
		);

		/* Chart #4 Heading */
		$wp_customize->add_setting('pixova_lite_about_section_chart_4_heading',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => esc_html__('Graphic identity', 'high-star'),
				'transport' => 'postMessage'
			)
		);

		$wp_customize->add_control('pixova_lite_about_section_chart_4_heading',
			array(
				'label' => esc_html__('Heading for chart', 'high-star'),
				'section' => 'pixova_lite_section_chart_4',
				'priority' => 0
			)
		);

		/* Chart #4 Settings */
		$wp_customize->add_setting('pixova_lite_about_section_chart_4_percentage',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => '50',
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control( new Pixova_Lite_Number_Custom_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_4_percentage',
				array(
					'label' 	=> esc_html__('Chart Percentage', 'high-star'),
					'section' 	=> 'pixova_lite_section_chart_4',
					'priority' 	=> 1,
				)
			)
		);

		/* Chart Bar Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_4_bar_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#f2c351'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_4_bar_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart bar color', 'high-star'),
					'section' => 'pixova_lite_section_chart_4',
					'priority' => 2
				)
			)
		);

		/* Chart Track Color */
		$wp_customize->add_setting('pixova_lite_about_section_chart_4_track_color',
			array(
				'sanitize_callback' => 'pixova_lite_sanitize_hex_color',
				'default' => '#EEE'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'pixova_lite_about_section_chart_4_track_color',
				array(
					'type' => 'color',
					'label' => esc_html__('Chart Track color', 'high-star'),
					'section' => 'pixova_lite_section_chart_4',
					'priority' => 3
				)
			)
		);


	/***********************************************/
	/************** Recent Works  ***************/
	/***********************************************/


		$wp_customize->add_panel( 'pixova_lite_panel_works',
			array(
				'priority' => 32,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Recent Works Section', 'high-star' )
			)
		);

		$wp_customize->add_section( 'pixova_lite_work_titles' , array(
				'title'       => esc_html__( 'Section Titles', 'high-star' ),
				'priority'    => 1,
				'panel' 	  => 'pixova_lite_panel_works'
		));

		/* Section Title */
		$wp_customize->add_setting('pixova_lite_work_section_title',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('Recent works', 'high-star'),
					'transport' => 'postMessage',
				)
		);

		$wp_customize->add_control(
			'pixova_lite_work_section_title',
			array(
				'label' 	=> esc_html__('Section title', 'high-star'),
				'section' 	=> 'pixova_lite_work_titles',
				'priority' 	=> 1,
			)
		);

		/* Section Sub-Title */
		$wp_customize->add_setting('pixova_lite_work_section_sub_title',
			array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('It\'s show and tell time.', 'high-star'),
					'transport' => 'postMessage'
				)
		);

		$wp_customize->add_control(
			'pixova_lite_work_section_sub_title',
			array(
				'label' 	=> esc_html__('Section sub-title', 'high-star'),
				'section' 	=> 'pixova_lite_work_titles',
				'priority' 	=> 2,
			)
		);

		/* Recent works: project #1 section */
		$wp_customize->add_section('pixova_lite_works_project_1',
			array(
				'title' 	=> esc_html__('Project #1', 'high-star'),
				'priority' 	=> 1,
				'panel' 	=> 'pixova_lite_panel_works'
			)
		);

			/* Recent works: project #1 image */
			$wp_customize->add_setting('pixova_lite_works_project_1_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' =>  esc_url( get_template_directory_uri() . '/layout/images/recent-works/recent-works-1-270x426.jpg' ),
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_1_image',
					array(
						'label' 	=> esc_html__('Project big image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_1',
						'priority' 	=> 1,
					)
				)
			);

			/* Recent works: project #1 logo */
			$wp_customize->add_setting('pixova_lite_works_project_1_logo',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/logo1.png'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_1_logo',
					array(
						'label' 	=> esc_html__('Project logo image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_1',
						'priority' 	=> 2,
					)
				)
			);

			/* Recent works: project #1 URL */
			$wp_customize->add_setting('pixova_lite_works_project_1_url',
				array(
					'sanitize_callback' => 'esc_url',
					'default'			=> esc_url('http://www.machothemes.com/themes/high-star/')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_works_project_1_url',
					array(
						'label' 	=> esc_html__('Project URL (enter project link here)', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_1',
						'priority' 	=> 3,
					)
			);

			/* Recent works: project #2 section */
			$wp_customize->add_section('pixova_lite_works_project_2',
				array(
					'title' 	=> esc_html__('Project #2', 'high-star'),
					'priority' 	=> 2,
					'panel' 	=> 'pixova_lite_panel_works'
				)
			);


			/* Recent works: project #2 image */
			$wp_customize->add_setting('pixova_lite_works_project_2_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/recent-works-2-270x426.jpg'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_2_image',
					array(
						'label' 	=> esc_html__('Project big image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_2',
						'priority' 	=> 2,
					)
				)
			);

			/* Recent works: project #2 logo */
			$wp_customize->add_setting('pixova_lite_works_project_2_logo',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/logo2.png',
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_2_logo',
					array(
						'label' 	=> esc_html__('Project logo image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_2',
						'priority' 	=> 2,
					)
				)
			);

			/* Recent works: project #2 URL */
			$wp_customize->add_setting('pixova_lite_works_project_2_url',
				array(
					'sanitize_callback' => 'esc_url',
					'default'			=> esc_url('http://www.machothemes.com/themes/high-star/')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_works_project_2_url',
					array(
						'label' 	=> esc_html__('Project URL (enter project link here)', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_2',
						'priority' 	=> 3,
					)
			);

			/* Recent works: project #3 section */
			$wp_customize->add_section('pixova_lite_works_project_3',
				array(
					'title' 	=> esc_html__('Project #3', 'high-star'),
					'priority' 	=> 3,
					'panel' 	=> 'pixova_lite_panel_works'
				)
			);


			/* Recent works: project #3 image */
			$wp_customize->add_setting('pixova_lite_works_project_3_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/recent-works-3-270x426.jpg'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_3_image',
					array(
						'label' 	=> esc_html__('Project big image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_3',
						'priority' 	=> 3,
					)
				)
			);

			/* Recent works: project #3 logo */
			$wp_customize->add_setting('pixova_lite_works_project_3_logo',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/logo3.png'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_3_logo',
					array(
						'label' 	=> esc_html__('Project logo image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_3',
						'priority' 	=> 3,
					)
				)
			);

			/* Recent works: project #3 URL */
			$wp_customize->add_setting('pixova_lite_works_project_3_url',
				array(
					'sanitize_callback' => 'esc_url',
					'default'			=> esc_url('http://www.machothemes.com/themes/high-star/')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_works_project_3_url',
					array(
						'label' 	=> esc_html__('Project URL (enter project link here)', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_3',
						'priority' 	=> 3,
					)
			);

			/* Recent works: project #4 section */
			$wp_customize->add_section('pixova_lite_works_project_4',
				array(
					'title' 	=> esc_html__('Project #4', 'high-star'),
					'priority' 	=> 4,
					'panel' 	=> 'pixova_lite_panel_works'
				)
			);


			/* Recent works: project #4 image */
			$wp_customize->add_setting('pixova_lite_works_project_4_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/recent-works-4-270x426.jpg'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_4_image',
					array(
						'label' 	=> esc_html__('Project big image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_4',
						'priority' 	=> 4,
					)
				)
			);

			/* Recent works: project #4 logo */
			$wp_customize->add_setting('pixova_lite_works_project_4_logo',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/recent-works/logo4.png'
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_works_project_4_logo',
					array(
						'label' 	=> esc_html__('Project logo image', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_4',
						'priority' 	=> 4,
					)
				)
			);

			/* Recent works: project #4 URL */
			$wp_customize->add_setting('pixova_lite_works_project_4_url',
				array(
					'sanitize_callback' => 'esc_url',
					'default'			=> esc_url('http://www.machothemes.com/themes/high-star/')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_works_project_4_url',
					array(
						'label' 	=> esc_html__('Project URL (enter project link here)', 'high-star'),
						'section' 	=> 'pixova_lite_works_project_4',
						'priority' 	=> 4,
					)
			);



	/***********************************************/
	/************** Testimonials  ***************/
	/***********************************************/


		$wp_customize->add_panel( 'pixova_lite_panel_testimonials',
			array(
				'priority' => 33,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Testimonials Section', 'high-star' )
			)
		);

		$wp_customize->add_section( 'pixova_lite_testimonial_titles' , array(
				'title'       => esc_html__( 'Section Titles', 'high-star' ),
				'priority'    => 1,
				'panel' 	  => 'pixova_lite_panel_testimonials'
		));

			/* Section Title */
			$wp_customize->add_setting('pixova_lite_testimonial_section_title',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('Some words from our clients', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_testimonial_section_title',
				array(
					'label' 	=> esc_html__('Section title', 'high-star'),
					'section' 	=> 'pixova_lite_testimonial_titles',
					'priority' 	=> 1,
				)
			);

			/* Section Sub-Title */
			$wp_customize->add_setting('pixova_lite_testimonial_section_sub_title',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('We don\'t like to brag, others do it for us.', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_testimonial_section_sub_title',
				array(
					'label' 	=> esc_html__('Section sub-title', 'high-star'),
					'section' 	=> 'pixova_lite_testimonial_titles',
					'priority' 	=> 2,
				)
			);

		/* Testimonials: testimonial #1 section */
		$wp_customize->add_section( 'pixova_lite_testimonial_1' , array(
				'title'       => esc_html__( 'Testimonial #1', 'high-star' ),
				'priority'    => 1,
				'panel' 	  => 'pixova_lite_panel_testimonials'
		));

			/* Testimonials: testimonial #1 person name */
			$wp_customize->add_setting('pixova_lite_testimonial_1_person_name',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('Katie Parry - Hooli', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_testimonial_1_person_name',
				array(
					'label' 	=> esc_html__('Testimonial person name', 'high-star'),
					'section' 	=> 'pixova_lite_testimonial_1',
					'priority' 	=> 1,
				)
			);

			/* Testimonials: testimonial #1 text */
			$wp_customize->add_setting('pixova_lite_testimonial_1_person_description',
				array(
						'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
						'default' => esc_html__('Working with Pixova has been an experience for a lifetime. I strongly  reccommend these guys for their awesome support. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat eleifend convallis.', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_testimonial_1_person_description',
					array(
						'type'	=> 'textarea',
						'label' 	=> esc_html__('Testimonial person description', 'high-star'),
						'section' 	=> 'pixova_lite_testimonial_1',
						'priority' 	=> 2,
					)
			);

			/* Testimonials: testimonial #1 image */
			$wp_customize->add_setting('pixova_lite_testimonial_1_person_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/testimonials/teammembru_burned-92x92.jpg',
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_testimonial_1_person_image',
					array(
						'label' 	=> esc_html__('Testimonial person image', 'high-star'),
						'section' 	=> 'pixova_lite_testimonial_1',
						'priority' 	=> 3,
					)
				)
			);

		/* Testimonials: testimonial #2 section */
		$wp_customize->add_section( 'pixova_lite_testimonial_2' , array(
				'title'       => esc_html__( 'Testimonial #2', 'high-star' ),
				'priority'    => 1,
				'panel' 	  => 'pixova_lite_panel_testimonials'
		));


			/* Testimonials: testimonial #2 person name */
			$wp_customize->add_setting('pixova_lite_testimonial_2_person_name',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('John Doe', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_testimonial_2_person_name',
				array(
					'label' 	=> esc_html__('Testimonial person name', 'high-star'),
					'section' 	=> 'pixova_lite_testimonial_2',
					'priority' 	=> 1,
				)
			);

			/* Testimonials: testimonial #2 text */
			$wp_customize->add_setting('pixova_lite_testimonial_2_person_description',
				array(
						'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
						'default' => esc_html__('Working with Pixova has been an experience for a lifetime. I strongly  reccommend these guys for their awesome support. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat eleifend convallis.', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_testimonial_2_person_description',
					array(
						'type'	=> 'textarea',
						'label' 	=> esc_html__('Testimonial person name', 'high-star'),
						'section' 	=> 'pixova_lite_testimonial_2',
						'priority' 	=> 2,
					)
			);

			/* Testimonials: testimonial #2 image */
			$wp_customize->add_setting('pixova_lite_testimonial_2_person_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/testimonials/teammembru_burned2-92x92.jpg',
				)
			);

			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_testimonial_2_person_image',
					array(
						'label' 	=> esc_html__('Testimonial person image', 'high-star'),
						'section' 	=> 'pixova_lite_testimonial_2',
						'priority' 	=> 3,
					)
				)
			);

	/* Testimonials: testimonial #3 section */
	$wp_customize->add_section( 'pixova_lite_testimonial_3' , array(
		'title'       => esc_html__( 'Testimonial #3', 'high-star' ),
		'priority'    => 3,
		'panel' 	  => 'pixova_lite_panel_testimonials'
	));

	/* Testimonials: testimonial #3 person name */
	$wp_customize->add_setting('pixova_lite_testimonial_3_person_name',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
			'default' => esc_html__('Katie Parry - Hooli', 'high-star'),
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(
		'pixova_lite_testimonial_3_person_name',
		array(
			'label' 	=> esc_html__('Testimonial person name', 'high-star'),
			'section' 	=> 'pixova_lite_testimonial_3',
			'priority' 	=> 1,
		)
	);

	/* Testimonials: testimonial #3 text */
	$wp_customize->add_setting('pixova_lite_testimonial_3_person_description',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__('Working with Pixova has been an experience for a lifetime. I strongly  reccommend these guys for their awesome support. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat eleifend convallis.', 'high-star'),
			'transport' => 'postMessage'
		)
	);

	$wp_customize->add_control(
			'pixova_lite_testimonial_3_person_description',
			array(
				'type'	=> 'textarea',
				'label' 	=> esc_html__('Testimonial person description', 'high-star'),
				'section' 	=> 'pixova_lite_testimonial_3',
				'priority' 	=> 2,
			)
	);

	/* Testimonials: testimonial #3 image */
	$wp_customize->add_setting('pixova_lite_testimonial_3_person_image',
		array(
			'sanitize_callback' => 'pixova_lite_sanitize_file_url',
			'default' => get_template_directory_uri() . '/layout/images/testimonials/teammembru_burned-92x92.jpg',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'pixova_lite_testimonial_3_person_image',
			array(
				'label' 	=> esc_html__('Testimonial person image', 'high-star'),
				'section' 	=> 'pixova_lite_testimonial_3',
				'priority' 	=> 3,
			)
		)
	);

    /* Testimonials: testimonial #4 section */
    $wp_customize->add_section( 'pixova_lite_testimonial_4' , array(
        'title'       => esc_html__( 'Testimonial #4', 'high-star' ),
        'priority'    => 4,
        'panel' 	  => 'pixova_lite_panel_testimonials'
    ));

    /* Testimonials: testimonial #4 person name */
    $wp_customize->add_setting('pixova_lite_testimonial_4_person_name',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => esc_html__('Katie Parry - Hooli', 'high-star'),
						'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'pixova_lite_testimonial_4_person_name',
        array(
            'label' 	=> esc_html__('Testimonial person name', 'high-star'),
            'section' 	=> 'pixova_lite_testimonial_4',
            'priority' 	=> 1,
        )
    );

    /* Testimonials: testimonial #4 text */
    $wp_customize->add_setting('pixova_lite_testimonial_4_person_description',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
            'default' => esc_html__('Working with Pixova has been an experience for a lifetime. I strongly  reccommend these guys for their awesome support. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat eleifend convallis.', 'high-star'),
						'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
            'pixova_lite_testimonial_4_person_description',
            array(
								'type'	=> 'textarea',
                'label' 	=> esc_html__('Testimonial person description', 'high-star'),
                'section' 	=> 'pixova_lite_testimonial_4',
                'priority' 	=> 2,
            )
    );

    /* Testimonials: testimonial #4 image */
    $wp_customize->add_setting('pixova_lite_testimonial_4_person_image',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_file_url',
            'default' => get_template_directory_uri() . '/layout/images/testimonials/teammembru_burned-92x92.jpg',
        )
    );

    $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'pixova_lite_testimonial_4_person_image',
            array(
                'label' 	=> esc_html__('Testimonial person image', 'high-star'),
                'section' 	=> 'pixova_lite_testimonial_4',
                'priority' 	=> 3,
            )
        )
    );

    /* Testimonials: testimonial #5 section */
    $wp_customize->add_section( 'pixova_lite_testimonial_5' , array(
        'title'       => esc_html__( 'Testimonial #5', 'high-star' ),
        'priority'    => 5,
        'panel' 	  => 'pixova_lite_panel_testimonials'
    ));

    /* Testimonials: testimonial #5 person name */
    $wp_customize->add_setting('pixova_lite_testimonial_5_person_name',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => esc_html__('Katie Parry - Hooli', 'high-star'),
						'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'pixova_lite_testimonial_5_person_name',
        array(
            'label' 	=> esc_html__('Testimonial person name', 'high-star'),
            'section' 	=> 'pixova_lite_testimonial_5',
            'priority' 	=> 1,
        )
    );

    /* Testimonials: testimonial #5 text */
    $wp_customize->add_setting('pixova_lite_testimonial_5_person_description',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_allowed_html',
            'default' => esc_html__('Working with Pixva has been an experience for a lifetime. I strongly  reccommend these guys for their awesome support. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat eleifend convallis.', 'high-star'),
						'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
            'pixova_lite_testimonial_5_person_description',
            array(
								'type'	=> 'textarea',
                'label' 	=> esc_html__('Testimonial person description', 'high-star'),
                'section' 	=> 'pixova_lite_testimonial_5',
                'priority' 	=> 2,
            )
    );

    /* Testimonials: testimonial #5 image */
    $wp_customize->add_setting('pixova_lite_testimonial_5_person_image',
        array(
            'sanitize_callback' => 'pixova_lite_sanitize_file_url',
            'default' => get_template_directory_uri() . '/layout/images/testimonials/teammembru_burned-92x92.jpg',
        )
    );

    $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'pixova_lite_testimonial_5_person_image',
            array(
                'label' 	=> esc_html__('Testimonial person image', 'high-star'),
                'section' 	=> 'pixova_lite_testimonial_5',
                'priority' 	=> 3,
            )
        )
    );

	/***********************************************/
	/************** Latest News  ***************/
	/***********************************************/

		$wp_customize->add_panel( 'pixova_lite_panel_news',
			array(
				'priority' => 34,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Latest News Section', 'high-star' )
			)
		);

			$wp_customize->add_section( 'pixova_lite_news_general' ,
				array(
					'title'       => esc_html__( 'Section Options', 'high-star' ),
					'priority'    => 1,
					'panel' 	  => 'pixova_lite_panel_news'
				)
			);


	/* Section Title */
			$wp_customize->add_setting('pixova_lite_news_section_title',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('Latest news', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_news_section_title',
				array(
					'label' 	=> esc_html__('Section title', 'high-star'),
					'section' 	=> 'pixova_lite_news_general',
					'priority' 	=> 1,
				)
			);

			/* Section Sub-Title */
			$wp_customize->add_setting('pixova_lite_news_section_sub_title',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('Straight from our blog', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_news_section_sub_title',
				array(
					'label' 	=> esc_html__('Section sub-title', 'high-star'),
					'section' 	=> 'pixova_lite_news_general',
					'priority' 	=> 2,
				)
			);

			/* Button Text */
			$wp_customize->add_setting( 'pixova_lite_news_section_button_text',
					array(
							'sanitize_callback' => 'sanitize_text_field',
							'default' => esc_html__( 'Visit our blog', 'high-star'),
							'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
					'pixova_lite_news_section_button_text',
					array(
							'label' 	=> esc_html__( 'Button Text', 'high-star' ),
							'section' 	=> 'pixova_lite_news_general',
					)
			);

			/* Number of post per slide */
			$wp_customize->add_setting( 'pixova_lite_news_section_no_posts_per_slide',
					array(
							'sanitize_callback' => 'sanitize_text_field',
							'default' => esc_html__( '2', 'high-star'),
							'transport' => 'refresh'
					)
			);

			$wp_customize->add_control(
					'pixova_lite_news_section_no_posts_per_slide',
					array(
							'label' 	=> esc_html__( 'Number of post per slide', 'high-star' ),
							'section' 	=> 'pixova_lite_news_general',
							'default'	=> esc_html('2'),
					)
			);
			$wp_customize->add_control(
				'pixova_lite_news_section_no_posts_per_slide',
				array(
					'type' => 'select',
					'choices' => array(
						'1' => esc_html('1'),
						'2' => esc_html('2'),
						'4' => esc_html('4'),
					),
					'label' => esc_html__( 'Number of post per slide', 'high-star' ),
					'section' => 'pixova_lite_news_general',
				)
			);


	/***********************************************/
	/************** Contact  ***************/
	/***********************************************/

		$wp_customize->add_panel( 'pixova_lite_panel_contact',
			array(
				'priority' => 36,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Contact Section', 'high-star' )
			)
		);

			$wp_customize->add_section('pixova_lite_contact_titles',
				array(
					'title' => esc_html__('Section titles', 'high-star'),
					'priority' => 1,
					'panel' => 'pixova_lite_panel_contact'
				)
			);


			/* Section Title */
				$wp_customize->add_setting('pixova_lite_contact_section_title',
					array(
							'sanitize_callback' => 'sanitize_text_field',
							'default' => esc_html__('Contact us', 'high-star'),
							'transport' => 'postMessage'
						)
				);

				$wp_customize->add_control(
					'pixova_lite_contact_section_title',
					array(
						'label' 	=> esc_html__('Section title', 'high-star'),
						'section' 	=> 'pixova_lite_contact_titles',
						'priority' 	=> 1,
					)
				);

				/* Section Sub-Title */
				$wp_customize->add_setting('pixova_lite_contact_section_sub_title',
					array(
							'sanitize_callback' => 'sanitize_text_field',
							'default' => esc_html__('And we\'ll reply in no time', 'high-star'),
							'transport' => 'postMessage'
						)
				);

				$wp_customize->add_control(
					'pixova_lite_contact_section_sub_title',
					array(
						'label' 	=> esc_html__('Section sub-title', 'high-star'),
						'section' 	=> 'pixova_lite_contact_titles',
						'priority' 	=> 2,
					)
				);

				$wp_customize->add_section('pixova_lite_contact_cf7',
				array(
					'title' => esc_html__('Contact forms', 'high-star'),
					'priority' => 1,
					'panel' => 'pixova_lite_panel_contact'
				)
			);

				require_once ABSPATH . 'wp-admin/includes/plugin.php';
				if( is_plugin_active('contact-form-7/wp-contact-form-7.php') && is_plugin_active( 'pirate-forms/pirate-forms.php' ) ) {
					$contact_section_type = array(
						'contact-form-7'	=> esc_html__( 'Contact Form 7', 'high-star' ),
						'pirate-forms'		=> esc_html__( 'Pirate Forms', 'high-star' )
					);
				} elseif( is_plugin_active('contact-form-7/wp-contact-form-7.php') ) {
					$contact_section_type = array(
						'contact-form-7'	=> esc_html__( 'Contact Form 7', 'high-star' ),
					);
				} elseif( is_plugin_active( 'pirate-forms/pirate-forms.php' ) ) {
					$contact_section_type = array(
						'pirate-forms'		=> esc_html__( 'Pirate Forms', 'high-star' )
					);
				} else {
					$contact_section_type = false;
				}

				$wp_customize->add_setting( 'pixova_lite_contact_section_type',
						array(
								'default' => 'contact-form-7',
                                'sanitize_callback' => 'pixova_lite_sanitize_radio_buttons'
						)
				);
				$wp_customize->add_control( 'pixova_lite_contact_section_type', array(
					'section'			=> 'pixova_lite_contact_cf7',
					'label'				=> esc_html__( 'Select the type of Contact Form to show (Contact Form 7 or Pirate Forms)', 'high-star' ),
					'type'				=> 'radio',
					'priority'			=> 1,
					'settings'			=> 'pixova_lite_contact_section_type',
					'active_callback'	=> 'pixova_lite_active_callback_contact_section_type',
					'choices'			=> $contact_section_type
				) );

				/* Contact: contact form select */
				$wp_customize->add_setting('pixova_lite_contact_section_cf7',
					array(
						'sanitize_callback' => 'pixova_lite_sanitize_number'
					)
				);

				$wp_customize->add_control( new Pixova_Lite_CF7_Custom_Control(
					$wp_customize,
					'pixova_lite_contact_section_cf7',
						array(
							'label'				=> esc_html__('Select the contact form you\'d like to display (powered by Contact Form 7)', 'high-star'),
							'section'			=> 'pixova_lite_contact_cf7',
							'priority'			=> 2,
							'type'				=> 'pixova_lite_contact_form_7',
							'active_callback'	=> 'pixova_lite_active_callback_contact_section_cf7'
						)
					)
				);


	/***********************************************/
	/************** Team  ***************/
	/***********************************************/

		$wp_customize->add_panel( 'pixova_lite_panel_team',
			array(
				'priority' => 35,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => esc_html__( 'Team Section', 'high-star' )
			)
		);


		$wp_customize->add_section( 'pixova_lite_team_titles' , array(
				'title'       => esc_html__( 'Section Titles', 'high-star' ),
				'priority'    => 1,
				'panel' 	  => 'pixova_lite_panel_team'
		));

			/* Section Title */
			$wp_customize->add_setting('pixova_lite_team_section_title',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('The team', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_team_section_title',
				array(
					'label' 	=> esc_html__('Section title', 'high-star'),
					'section' 	=> 'pixova_lite_team_titles',
					'priority' 	=> 1,
				)
			);

			/* Section Sub-Title */
			$wp_customize->add_setting('pixova_lite_team_section_sub_title',
				array(
						'sanitize_callback' => 'sanitize_text_field',
						'default' => esc_html__('Meet the people that made it all happen.', 'high-star'),
						'transport' => 'postMessage'
					)
			);

			$wp_customize->add_control(
				'pixova_lite_team_section_sub_title',
				array(
					'label' 	=> esc_html__('Section sub-title', 'high-star'),
					'section' 	=> 'pixova_lite_team_titles',
					'priority' 	=> 2,
				)
			);

			/* Team: team member #1 section */
			$wp_customize->add_section('pixova_lite_team_member_1',
				array(
					'title' => esc_html__('Team member #1', 'high-star'),
					'priority' => 2,
					'panel' => 'pixova_lite_panel_team'
				)
			);

			/* Team: team member #1 name */
			$wp_customize->add_setting('pixova_lite_team_member_1_name',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('Angelina Doe', 'high-star'),
					'transport' => 'postMessage'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_1_name',
				array(
					'label' => esc_html__('Team member #1 name', 'high-star'),
					'section' => 'pixova_lite_team_member_1',
					'priority' => 1,
				)
			);

			/* Team: team member #1 picture */
			$wp_customize->add_setting('pixova_lite_team_member_1_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/team/teammembru-150x150.jpg'
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_team_member_1_image',
					array(
						'label' => esc_html__('Team member #1 image', 'high-star'),
						'section' => 'pixova_lite_team_member_1',
						'priority' => 2
					)
				)
			);

			/* Team: team member #1 facebook */
			$wp_customize->add_setting('pixova_lite_team_member_1_facebook',
				array(
					'sanitize_callback' => 'esc_url',
					'default' => 'https://www.facebook.com/machothemes/'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_1_facebook',
				array(
					'label' => esc_html__('Team member #1 Facebook URL', 'high-star'),
					'section' => 'pixova_lite_team_member_1',
					'priority' => 3
				)
			);

			/* Team: team member #1 Dribbble */
			$wp_customize->add_setting('pixova_lite_team_member_1_dribbble',
				array(
					'sanitize_callback' => 'esc_url',
					'default' => 'http://www.dribbble.com/madalin.duca/'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_1_dribbble',
				array(
					'label' => esc_html__('Team member #1 Dribbble URL', 'high-star'),
					'section' => 'pixova_lite_team_member_1',
					'priority' => 4
				)
			);


			/* Team: team member #1 E-mail Address */
			$wp_customize->add_setting( 'pixova_lite_team_member_1_email',
				array(
					'sanitize_callback'	=> 'sanitize_email',
					'default'			=> sanitize_email( 'contact@site.com' )
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_1_email',
				array(
					'label'		=> esc_html__('Team member #1 E-mail Address', 'high-star'),
					'section'	=> 'pixova_lite_team_member_1',
					'priority'	=> 5
				)
			);



			/* Team: team member #2 section */
			$wp_customize->add_section('pixova_lite_team_member_2',
				array(
					'title' => esc_html__('Team member #2', 'high-star'),
					'priority' => 2,
					'panel' => 'pixova_lite_panel_team'
				)
			);

			/* Team: team member #2 name */
			$wp_customize->add_setting('pixova_lite_team_member_2_name',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default' => esc_html__('John Doe', 'high-star'),
					'transport' => 'postMessage'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_2_name',
				array(
					'label' => esc_html__('Team member #2 name', 'high-star'),
					'section' => 'pixova_lite_team_member_2',
					'priority' => 1,
				)
			);

			/* Team: team member #2 picture */
			$wp_customize->add_setting('pixova_lite_team_member_2_image',
				array(
					'sanitize_callback' => 'pixova_lite_sanitize_file_url',
					'default' => get_template_directory_uri() . '/layout/images/team/teammembru2-150x150.jpg'
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize,
				'pixova_lite_team_member_2_image',
					array(
						'label' => esc_html__('Team member #2 image', 'high-star'),
						'section' => 'pixova_lite_team_member_2',
						'priority' => 2
					)
				)
			);

			/* Team: team member #2 facebook */
			$wp_customize->add_setting('pixova_lite_team_member_2_facebook',
				array(
					'sanitize_callback' => 'esc_url',
					'default' => 'https://www.facebook.com/machothemes/'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_2_facebook',
				array(
					'label' => esc_html__('Team member #2 Facebook URL', 'high-star'),
					'section' => 'pixova_lite_team_member_2',
					'priority' => 3
				)
			);

			/* Team: team member #2 Dribbble */
			$wp_customize->add_setting('pixova_lite_team_member_2_dribbble',
				array(
					'sanitize_callback' => 'esc_url',
					'default' => 'http://www.dribbble.com/madalin.duca/'
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_2_dribbble',
				array(
					'label' => esc_html__('Team member #2 Dribbble URL', 'high-star'),
					'section' => 'pixova_lite_team_member_2',
					'priority' => 4
				)
			);

			/* Team: team member #2 E-mail Address */
			$wp_customize->add_setting( 'pixova_lite_team_member_2_email',
				array(
					'sanitize_callback'	=> 'sanitize_email',
					'default'			=> sanitize_email( 'contact@site.com' )
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_2_email',
				array(
					'label'		=> esc_html__('Team member #2 Email', 'high-star'),
					'section'	=> 'pixova_lite_team_member_2',
					'priority'	=> 5
				)
			);

            /* Team: team member #3 section */
            $wp_customize->add_section('pixova_lite_team_member_3',
                array(
                    'title' => esc_html__('Team member #3', 'high-star'),
                    'priority' => 3,
                    'panel' => 'pixova_lite_panel_team'
                )
            );

            /* Team: team member #3 name */
            $wp_customize->add_setting('pixova_lite_team_member_3_name',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default' => esc_html__('Angelina Doe', 'high-star'),
										'transport' => 'postMessage'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_3_name',
                array(
                    'label' => esc_html__('Team member #3 name', 'high-star'),
                    'section' => 'pixova_lite_team_member_3',
                    'priority' => 1,
                )
            );

            /* Team: team member #3 picture */
            $wp_customize->add_setting('pixova_lite_team_member_3_image',
                array(
                    'sanitize_callback' => 'pixova_lite_sanitize_file_url',
                    'default' => get_template_directory_uri() . '/layout/images/team/teammembru3-150x150.jpg'
                )
            );
            $wp_customize->add_control( new WP_Customize_Image_Control(
                    $wp_customize,
                    'pixova_lite_team_member_3_image',
                    array(
                        'label' => esc_html__('Team member #3 image', 'high-star'),
                        'section' => 'pixova_lite_team_member_3',
                        'priority' => 2
                    )
                )
            );

            /* Team: team member #3 facebook */
            $wp_customize->add_setting('pixova_lite_team_member_3_facebook',
                array(
                    'sanitize_callback' => 'esc_url',
                    'default' => 'https://www.facebook.com/machothemes/'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_3_facebook',
                array(
                    'label' => esc_html__('Team member #3 Facebook URL', 'high-star'),
                    'section' => 'pixova_lite_team_member_3',
                    'priority' => 3
                )
            );

            /* Team: team member #3 Dribbble */
            $wp_customize->add_setting('pixova_lite_team_member_3_dribbble',
                array(
                    'sanitize_callback' => 'esc_url',
                    'default' => 'http://www.dribbble.com/madalin.duca/'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_3_dribbble',
                array(
                    'label' => esc_html__('Team member #3 Dribbble URL', 'high-star'),
                    'section' => 'pixova_lite_team_member_3',
                    'priority' => 4
                )
            );

			/* Team: team member #3 E-mail Address */
			$wp_customize->add_setting( 'pixova_lite_team_member_3_email',
				array(
					'sanitize_callback'	=> 'sanitize_email',
					'default'			=> sanitize_email('contact@site.com')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_3_email',
				array(
					'label'		=> esc_html__('Team member #3 E-mail Address', 'high-star'),
					'section'	=> 'pixova_lite_team_member_3',
					'priority'	=> 5
				)
			);

            /* Team: team member #4 section */
            $wp_customize->add_section('pixova_lite_team_member_4',
                array(
                    'title' => esc_html__('Team member #4', 'high-star'),
                    'priority' => 4,
                    'panel' => 'pixova_lite_panel_team'
                )
            );

            /* Team: team member #4 name */
            $wp_customize->add_setting('pixova_lite_team_member_4_name',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default' => esc_html__('Angelina Doe', 'high-star'),
										'transport' => 'postMessage'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_4_name',
                array(
                    'label' => esc_html__('Team member #4 name', 'high-star'),
                    'section' => 'pixova_lite_team_member_4',
                    'priority' => 1,
                )
            );

            /* Team: team member #4 picture */
            $wp_customize->add_setting('pixova_lite_team_member_4_image',
                array(
                    'sanitize_callback' => 'pixova_lite_sanitize_file_url',
                    'default' => get_template_directory_uri() . '/layout/images/team/teammembru4-150x150.jpg'
                )
            );
            $wp_customize->add_control( new WP_Customize_Image_Control(
                    $wp_customize,
                    'pixova_lite_team_member_4_image',
                    array(
                        'label' => esc_html__('Team member #4 image', 'high-star'),
                        'section' => 'pixova_lite_team_member_4',
                        'priority' => 2
                    )
                )
            );

            /* Team: team member #4 facebook */
            $wp_customize->add_setting('pixova_lite_team_member_4_facebook',
                array(
                    'sanitize_callback' => 'esc_url',
                    'default' => 'https://www.facebook.com/machothemes/'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_4_facebook',
                array(
                    'label' => esc_html__('Team member #4 Facebook URL', 'high-star'),
                    'section' => 'pixova_lite_team_member_4',
                    'priority' => 3
                )
            );

            /* Team: team member #4 Dribbble */
            $wp_customize->add_setting('pixova_lite_team_member_4_dribbble',
                array(
                    'sanitize_callback' => 'esc_url',
                    'default' => 'http://www.dribbble.com/madalin.duca/'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_4_dribbble',
                array(
                    'label' => esc_html__('Team member #4 Dribbble URL', 'high-star'),
                    'section' => 'pixova_lite_team_member_4',
                    'priority' => 4
                )
            );

            /* Team: team member #4 E-mail Address */
			$wp_customize->add_setting( 'pixova_lite_team_member_4_email',
				array(
					'sanitize_callback'	=> 'sanitize_email',
					'default'			=> sanitize_email('contact@site.com')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_4_email',
				array(
					'label'		=> esc_html__('Team member #4 E-mail Address', 'high-star'),
					'section'	=> 'pixova_lite_team_member_4',
					'priority'	=> 5
				)
			);

            /* Team: team member #5 section */
            $wp_customize->add_section('pixova_lite_team_member_5',
                array(
                    'title' => esc_html__('Team member #5', 'high-star'),
                    'priority' => 5,
                    'panel' => 'pixova_lite_panel_team'
                )
            );

            /* Team: team member #5 name */
            $wp_customize->add_setting('pixova_lite_team_member_5_name',
                array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default' => '',
										'transport' => 'postMessage'
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_5_name',
                array(
                    'label' => esc_html__('Team member #5 name', 'high-star'),
                    'section' => 'pixova_lite_team_member_5',
                    'priority' => 1,
                )
            );

            /* Team: team member #5 picture */
            $wp_customize->add_setting('pixova_lite_team_member_5_image',
                array(
                    'sanitize_callback' => 'pixova_lite_sanitize_file_url',
                    'default' => '',
                )
            );
            $wp_customize->add_control( new WP_Customize_Image_Control(
                    $wp_customize,
                    'pixova_lite_team_member_5_image',
                    array(
                        'label' => esc_html__('Team member #5 image', 'high-star'),
                        'section' => 'pixova_lite_team_member_5',
                        'priority' => 2
                    )
                )
            );

            /* Team: team member #5 facebook */
            $wp_customize->add_setting('pixova_lite_team_member_5_facebook',
                array(
                    'sanitize_callback' => 'esc_url',
                    'default' => '',
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_5_facebook',
                array(
                    'label' => esc_html__('Team member #5 Facebook URL', 'high-star'),
                    'section' => 'pixova_lite_team_member_5',
                    'priority' => 3
                )
            );

            /* Team: team member #5 Dribbble */
            $wp_customize->add_setting('pixova_lite_team_member_5_dribbble',
                array(
                    'sanitize_callback' => 'esc_url',
                    'default' => '',
                )
            );

            $wp_customize->add_control(
                'pixova_lite_team_member_5_dribbble',
                array(
                    'label' => esc_html__('Team member #5 Dribbble URL', 'high-star'),
                    'section' => 'pixova_lite_team_member_5',
                    'priority' => 4
                )
            );

            /* Team: team member #5 E-mail Address */
			$wp_customize->add_setting('pixova_lite_team_member_5_email',
				array(
					'sanitize_callback'	=> 'sanitize_email',
					'default'			=> sanitize_email('contact@site.com')
				)
			);

			$wp_customize->add_control(
				'pixova_lite_team_member_5_email',
				array(
					'label'		=> esc_html__( 'Team member #5 E-mail Address', 'high-star'),
					'section'	=> 'pixova_lite_team_member_3',
					'priority'	=> 5
				)
			);

			/***********************************************/
			/************** Theme Support  ***************/
			/***********************************************/
			/* Aici */
			$wp_customize->add_section( 'pixova_lite_theme_support' , array(
					'title'       		=> esc_html__( 'Theme Support', 'high-star' ),
					'priority'    		=> 36,
			));

				/* Theme Suppor Links */
				$wp_customize->add_setting( 'pixova_lite_theme_support_link', array(
					'sanitize_callback'	=> 'esc_html'
				) );

				$wp_customize->add_control( new Pixova_Lite_HTML_Custom_Control( $wp_customize, 'pixova_lite_theme_support_link', array(
				 'section' => 'pixova_lite_theme_support',
				 'priority' => 20,
				) ) );


}
add_action( 'customize_register', 'pixova_lite_customize_register' );

if( !function_exists( 'is_woocommerce_show_header_image' ) ) {
	function is_woocommerce_show_header_image() {
		if( get_theme_mod( 'pixova_lite_woocommerce_show_header_image', 'show' ) == 'show' ) {
			return true;
		} else {
			return false;
		}
	}
}

if( !function_exists( 'is_woocommerce_show_sidebar_on_shop_page' ) ) {
	function is_woocommerce_show_sidebar_on_shop_page() {
		if( get_theme_mod( 'pixova_lite_woocommerce_show_sidebar_on_shop_page', 'show' ) == 'show' ) {
			return true;
		} else {
			return false;
		}
	}
}

if( !function_exists( 'pixova_lite_active_callback_contact_section_type' ) ) {
	function pixova_lite_active_callback_contact_section_type() {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		if( is_plugin_active( 'pirate-forms/pirate-forms.php' ) || is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

if( !function_exists( 'pixova_lite_active_callback_contact_section_cf7' ) ) {
	function pixova_lite_active_callback_contact_section_cf7( $control ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		if( $control->manager->get_setting( 'pixova_lite_contact_section_type' )->value() == 'contact-form-7' && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

if( !function_exists( 'pixova_lite_customize_preview_js' ) ) {
	function pixova_lite_customize_preview_js() {
		wp_enqueue_script( 'pixova_lite_customizer', get_template_directory_uri() . '/layout/js/customizer/customizer.js', array( 'customize-preview' ), '1.0', true );
	}
	add_action( 'customize_preview_init', 'pixova_lite_customize_preview_js' );
}

if( !function_exists( 'pixova_lite_sanitize_textarea_nl2br' ) ) {
	function pixova_lite_sanitize_textarea_nl2br( $input ) {
		return nl2br( $input );
	}
}


if( !function_exists( 'pixova_lite_sanitize_radio_buttons' ) ) {
    /**
     * Simple function to validate choices from radio buttons
     *
     * @param $input
     * @return string
     */
    function pixova_lite_sanitize_radio_buttons( $input, $setting ) {

        global $wp_customize;

        $control = $wp_customize->get_control( $setting->id );

        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }
}

function pixova_lite_sanitize_pro_version( $input ) {
    return force_balance_tags( $input );
}

function pixova_lite_sanitize_number( $input ) {
    return force_balance_tags( $input );
}

function pixova_lite_sanitize_file_url( $url ) {

	$output = '';

	$filetype = wp_check_filetype( $url );
	if ( $filetype["ext"] ) {
		$output = esc_url( $url );
	}

	return $output;
}

function pixova_lite_sanitize_hex_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}

function pixova_lite_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

function pixova_lite_sanitize_allowed_html ( $value ) {

	return wp_kses (
		$value,
		array(
				'a' => array(
						'href' => array(),
						'title' => array()
				),
				'img' => array(
						'alt' => array(),
						'title' => array(),
						'src' => array(),
						'class' => array(),
						'id' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
		)
	);

}

function pixova_lite_saniteze_intro( $str ) {
	$allowedHTML = array( 'u'=>array(), 'br' =>array(), 'strong' => array() );
	return wp_kses( $str, $allowedHTML);
}

function pixova_lite_customizer_js_load() {
    wp_register_script( 'pixova_lite_customizer_script', get_template_directory_uri() . '/layout/js/customizer/customizer.js', array('jquery'), '1.0', true  );
    wp_enqueue_script( 'pixova_lite_customizer_script' );
}
add_action( 'customize_controls_enqueue_scripts', 'pixova_lite_customizer_js_load' );

function pixova_lite_customizer_css_load()
{
	wp_enqueue_style('mt-customizer-css', get_template_directory_uri() .'/layout/css/pixova-pro.css');
}
add_action('customize_controls_print_styles','pixova_lite_customizer_css_load');

/**
 *	Customizer CSS
 */
if( !function_exists( 'pixova_lite_customizer_css' ) ) {
	function pixova_lite_customizer_css() {
		$pixova_lite_intro_button_color = get_theme_mod( 'pixova_lite_intro_button_color', esc_attr( '#f2c351' ) );
		$pixova_lite_intro_button_text_color = get_theme_mod( 'pixova_lite_intro_button_text_color', esc_attr( '#ffffff' ) );

		$pixova_lite_intro_outline_button_color = get_theme_mod( 'pixova_lite_intro_outline_button_color', esc_attr( '#ffffff' ) );
		$pixova_lite_intro_outline_button_text_color = get_theme_mod( 'pixova_lite_intro_outline_button_text_color', esc_attr( '#ffffff' ) );

		$output = '';

		$output .= '<style type="text/css">';
			$output .= $pixova_lite_intro_button_color ? 'body .btn-cta-intro {background-color: '. esc_attr( $pixova_lite_intro_button_color ) .';}' : '';
			$output .= $pixova_lite_intro_button_text_color ? 'body .btn-cta-intro {color: '. esc_attr( $pixova_lite_intro_button_text_color ) .';}' : '';
			$output .= $pixova_lite_intro_outline_button_color ? 'body .btn-cta-intro-outline {border-color: '. esc_attr( $pixova_lite_intro_outline_button_color ) .';}' : '';
			$output .= $pixova_lite_intro_outline_button_text_color ? 'body .btn-cta-intro-outline {color: '. esc_attr( $pixova_lite_intro_outline_button_text_color ) .';}' : '';
		$output .= '</style>';

		echo $output;
	}
	add_action( 'wp_head', 'pixova_lite_customizer_css');
}