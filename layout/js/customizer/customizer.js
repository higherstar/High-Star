/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {

		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );

	} );

	wp.customize( 'blogdescription', function( value ) {

		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );

	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {

		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );

			} else {

				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );

			}
		} );

	} );

	// Company image logo
	wp.customize( 'pixova_lite_image_logo', function( value ) {
		value.bind( function( newval ) {

			if( newval !== '' ) {
				$( '.logo' ).empty();
				$( '.logo' ).append( '<img src="" alt="'+ wp.customize._value.pixova_lite_image_logo +'" title="'+ wp.customize._value.pixova_lite_image_logo +'" />' );
				$( '.logo img' ).attr( 'src', newval );
			} else {
				$( '.logo' ).text( wp.customize._value.blogname() );
			}

		} );
	} );

	// Company text logo
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
				$( '.logo' ).text( newval );
		} );
	} );


	// Main CTA :: subtitle
	wp.customize( 'pixova_lite_intro_sub_cta', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-tagline' ).html( newval );
		} );
	} );


	// Main CTA :: Button Text
	wp.customize( 'pixova_lite_intro_button_text', function( value ) {
		value.bind( function( newval ) {
				$( '.btn-cta-intro span' ).text( newval );
		} );
	} );



	// main CTA :: Button URL
	wp.customize( 'pixova_lite_intro_button_url', function( value ) {
		value.bind( function( newval ) {
				$( '.btn-cta-intro' ).attr('href', newval );
		} );
	} );

	// main CTA :: Button Background colour
	wp.customize( 'pixova_lite_intro_button_color', function( value ) {
		value.bind( function( newval ) {
				$( 'body .btn-cta-intro' ).css('background-color', newval );
		} );
	} );

	// main CTA :: Button Text colour
	wp.customize( 'pixova_lite_intro_button_text_color', function( value ) {
		value.bind( function( newval ) {
				$( 'body .btn-cta-intro' ).css('color', newval );
		} );
	} );


	// What we do :: 1 - title
	wp.customize( 'pixova_lite_intro_what_we_do_1_title', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-service-title-1' ).text( newval );
		} );
	} );

	// What we do :: 1 - description
	wp.customize( 'pixova_lite_intro_what_we_do_1_description', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-service-text-1' ).text( newval );
		} );
	} );

	// What we do :: 2 - title
	wp.customize( 'pixova_lite_intro_what_we_do_2_title', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-service-title-2' ).text( newval );
		} );
	} );

	// What we do :: 2 - description
	wp.customize( 'pixova_lite_intro_what_we_do_2_description', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-service-text-2' ).text( newval );
		} );
	} );

	// What we do :: 3 - title
	wp.customize( 'pixova_lite_intro_what_we_do_3_title', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-service-title-3' ).text( newval );
		} );
	} );

	// What we do :: 3 - description
	wp.customize( 'pixova_lite_intro_what_we_do_3_description', function( value ) {
		value.bind( function( newval ) {
				$( '.intro-service-text-3' ).text( newval );
		} );
	} );

	//
	// Pie Chart Section
	//

	// Section Titles
	wp.customize( 'pixova_lite_about_section_title', function( value ) {
		value.bind( function( newval ) {
				$( '#about h2' ).text( newval );
		} );
	} );

	// Section Sub Titles
	wp.customize( 'pixova_lite_about_section_sub_title', function( value ) {
		value.bind( function( newval ) {
				$( '#about .section-sub-heading' ).text( newval );
		} );
	} );

	// Block of text
	wp.customize( 'pixova_lite_about_section_textarea', function( value ) {
		value.bind( function( newval ) {
				$( '#about .about-text' ).html( newval );
		} );
	} );

	// Blockquote
	wp.customize( 'pixova_lite_about_section_blockquote', function( value ) {
		value.bind( function( newval ) {
				$( '#about blockquote' ).html( newval );
		} );
	} );

	// Chart - 1 :: Heading
	wp.customize( 'pixova_lite_about_section_chart_1_heading', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_1 h4' ).text( newval );
		} );
	} );

	// Chart - 1 :: Percentage
	wp.customize( 'pixova_lite_about_section_chart_1_percentage', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_1 .mt-pie-chart-custom-text' ).text( newval + '%' );
		} );
	} );


	// Chart - 2 :: Heading
	wp.customize( 'pixova_lite_about_section_chart_2_heading', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_2 h4' ).text( newval );
		} );
	} );

	// Chart - 2 :: Percentage
	wp.customize( 'pixova_lite_about_section_chart_2_percentage', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_2 .mt-pie-chart-custom-text' ).text( newval + '%' );
		} );
	} );

	// Chart - 3 :: Heading
	wp.customize( 'pixova_lite_about_section_chart_3_heading', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_3 h4' ).text( newval );
		} );
	} );

	// Chart - 3 :: Percentage
	wp.customize( 'pixova_lite_about_section_chart_3_percentage', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_3 .mt-pie-chart-custom-text' ).text( newval + '%' );
		} );
	} );

	// Chart - 4 :: Heading
	wp.customize( 'pixova_lite_about_section_chart_4_heading', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_4 h4' ).text( newval );
		} );
	} );

	// Chart - 4 :: Percentage
	wp.customize( 'pixova_lite_about_section_chart_4_percentage', function( value ) {
		value.bind( function( newval ) {
				$( '#about .pixova_lite_chart_4 .mt-pie-chart-custom-text' ).text( newval + '%' );
		} );
	} );


	//
	// Recent Works Section
	//

	// Section Titles
	wp.customize( 'pixova_lite_work_section_title', function( value ) {
		value.bind( function( newval ) {
				$( '#works h2' ).text( newval );
		} );
	} );


	// Section sub-titles
	wp.customize( 'pixova_lite_work_section_sub_title', function( value ) {
		value.bind( function( newval ) {
				$( '#works .section-sub-heading' ).text( newval );
		} );
	} );

	//
	// Testimonials section
	//

	// Section TItles
	wp.customize( 'pixova_lite_testimonial_section_title', function( value ) {
		value.bind( function( newval ) {
				$( '#testimonials h2' ).text( newval );
		} );
	} );

	// Section sub-titles
	wp.customize( 'pixova_lite_testimonial_section_sub_title', function( value ) {
		value.bind( function( newval ) {
				$( '#testimonials .section-sub-heading' ).text( newval );
		} );
	} );

	// Testimonial 1 :: Person Name
	wp.customize( 'pixova_lite_testimonial_1_person_name', function( value ) {
		value.bind( function( newval ) {
				$( '#testimonials .high-star-testimonial-1 .media-heading span' ).text( newval );
		} );
	} );

	// Testimonial 1 :: Person Description
	wp.customize( 'pixova_lite_testimonial_1_person_description', function( value ) {
		value.bind( function( newval ) {
				$( '#testimonials .high-star-testimonial-1 .media-body p' ).text( newval );
		} );
	} );

	// Testimonial 2 :: Person Name
	wp.customize( 'pixova_lite_testimonial_2_person_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-2 .media-heading span' ).text( newval );
	  } );
	} );

	// Testimonial 2 :: Person Description
	wp.customize( 'pixova_lite_testimonial_2_person_description', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-2 .media-body p' ).text( newval );
	  } );
	} );

	// Testimonial 3 :: Person Name
	wp.customize( 'pixova_lite_testimonial_3_person_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-3 .media-heading span' ).text( newval );
	  } );
	} );

	// Testimonial 3 :: Person Description
	wp.customize( 'pixova_lite_testimonial_3_person_description', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-3 .media-body p' ).text( newval );
	  } );
	} );

	// Testimonial 4 :: Person Name
	wp.customize( 'pixova_lite_testimonial_4_person_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-4 .media-heading span' ).text( newval );
	  } );
	} );

	// Testimonial 4 :: Person Description
	wp.customize( 'pixova_lite_testimonial_4_person_description', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-4 .media-body p' ).text( newval );
	  } );
	} );

	// Testimonial 5 :: Person Name
	wp.customize( 'pixova_lite_testimonial_5_person_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-5 .media-heading span' ).text( newval );
	  } );
	} );

	// Testimonial 5 :: Person Description
	wp.customize( 'pixova_lite_testimonial_5_person_description', function( value ) {
	  value.bind( function( newval ) {
	      $( '#testimonials .high-star-testimonial-5 .media-body p' ).text( newval );
	  } );
	} );


	//
	// Latest News Section
	//

	// Section Title
	wp.customize( 'pixova_lite_news_section_title', function( value ) {
	  value.bind( function( newval ) {
	      $( '#news h2.light-section-heading' ).text( newval );
	  } );
	} );

	// Section Sub Title
	wp.customize( 'pixova_lite_news_section_sub_title', function( value ) {
		value.bind( function( newval ) {
				$( '#news .section-sub-heading' ).text( newval );
		} );
	} );

	// Section Button
	wp.customize( 'pixova_lite_news_section_button_text', function( value ) {
		value.bind( function( newval ) {
				$( '#news .btn.btn-cta-light' ).text( newval );
		} );
	} );


	//
	// Team Section
	//

	// Section Title
	wp.customize( 'pixova_lite_team_section_title', function( value ) {
	  value.bind( function( newval ) {
	      $( '#team h2.light-section-heading' ).text( newval );
	  } );
	} );

	// Section Sub Title
	wp.customize( 'pixova_lite_team_section_sub_title', function( value ) {
		value.bind( function( newval ) {
				$( '#team .section-sub-heading' ).text( newval );
		} );
	} );

	// Team Member 1 :: Name
	wp.customize( 'pixova_lite_team_member_1_name', function( value ) {
		value.bind( function( newval ) {
				$( '#team .high-star-team-member-1 .mt-team-member-name' ).text( newval );
		} );
	} );

	// Team Member 2 :: Name
	wp.customize( 'pixova_lite_team_member_2_name', function( value ) {
		value.bind( function( newval ) {
				$( '#team .high-star-team-member-2 .mt-team-member-name' ).text( newval );
		} );
	} );

	// Team Member 3 :: Name
	wp.customize( 'pixova_lite_team_member_3_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#team .high-star-team-member-3 .mt-team-member-name' ).text( newval );
	  } );
	} );

	// Team Member 4 :: Name
	wp.customize( 'pixova_lite_team_member_4_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#team .high-star-team-member-4 .mt-team-member-name' ).text( newval );
	  } );
	} );

	// Team Member 5 :: Name
	wp.customize( 'pixova_lite_team_member_5_name', function( value ) {
	  value.bind( function( newval ) {
	      $( '#team .high-star-team-member-5 .mt-team-member-name' ).text( newval );
	  } );
	} );


	//
	// Contact details
	//

	// Section Title
	wp.customize( 'pixova_lite_contact_section_title', function( value ) {
	  value.bind( function( newval ) {
	      $( '#contact h2.light-section-heading' ).text( newval );
	  } );
	} );

	// Section Sub Title
	wp.customize( 'pixova_lite_contact_section_sub_title', function( value ) {
		value.bind( function( newval ) {
				$( '#contact .section-sub-heading' ).text( newval );
		} );
	} );

	/* Phone Number */
	wp.customize( 'pixova_lite_phone', function( value ) {
		value.bind( function( newval ) {
			$( '.contact-info-details-phone span' ).text( newval );
		} );
	} );


	/* Email */
	wp.customize( 'pixova_lite_email', function( value ) {
		value.bind( function( newval ) {
			$( '.contact-info-details-email span' ).text( newval );
		} );
	} );

	/* Address */
	wp.customize( 'pixova_lite_address', function( value ) {
		value.bind( function( newval ) {
			$( '.contact-info-details.address span' ).text( newval );
		} );
	} );

	/* Pie Chart Section Visibility */
	wp.customize( 'pixova_lite_about_visibility', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#about' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '#about' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Portfolio Section Visibility */
	wp.customize( 'pixova_lite_works_visibility', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#works' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '#works' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Testimonials Section Visibility */
	wp.customize( 'pixova_lite_testimonials_visibility', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#testimonials' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '#testimonials' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* News Section Visibility */
	wp.customize( 'pixova_lite_news_visibility', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#news' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '#news' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Tean Section Visibility */
	wp.customize( 'pixova_lite_team_visibility', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#team' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '#team' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	/* Contact Section Visibility */
	wp.customize( 'pixova_lite_contact_visibility', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '#contact' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '#contact' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );

	// Copyright message
	// Company text logo
	wp.customize( 'pixova_lite_copyright_enable', function( value ) {
		value.bind( function( newval ) {
			if( newval == false ) {
				$( '.high-star-footer-theme-copyright' ).addClass( 'customizer-display-none' );
			} else if ( newval == true ) {
				$( '.high-star-footer-theme-copyright' ).removeClass( 'customizer-display-none' );
			}
		} );
	} );




} )( jQuery );
