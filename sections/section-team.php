<?php

if ( current_user_can( 'edit_theme_options' ) ) {

$pixova_lite_section_title = get_theme_mod('pixova_lite_team_section_title', __('The team', 'high-star') );
$pixova_lite_section_sub_title = get_theme_mod('pixova_lite_team_section_sub_title', __('Meet the people that made it all happen.', 'high-star') );

// Team member #1
$pixova_lite_team_member_1_name = get_theme_mod('pixova_lite_team_member_1_name', __('Angelina Doe', 'high-star') );

# Image Manipulation
$pixova_lite_team_member_1_image_customizer = get_theme_mod('pixova_lite_team_member_1_image', get_template_directory_uri() . '/layout/images/team/teammembru-150x150.jpg');
$pixova_lite_team_member_1_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_1_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_1_image ) {
    $pixova_lite_team_member_1_image = $pixova_lite_team_member_1_image_customizer;
  }

$pixova_lite_team_member_1_fburl = get_theme_mod('pixova_lite_team_member_1_facebook', 'https://www.facebook.com/machothemes/');
$pixova_lite_team_member_1_dribbble_url = get_theme_mod('pixova_lite_team_member_1_dribbble', 'http://www.dribbble.com/');
$pixova_lite_team_member_1_email = get_theme_mod('pixova_lite_team_member_1_email', sanitize_email('contact@site.com') );

// Team member #2
$pixova_lite_team_member_2_name = get_theme_mod('pixova_lite_team_member_2_name', __('John Doe', 'high-star') );

# Image Manipulation
$pixova_lite_team_member_2_image_customizer = get_theme_mod('pixova_lite_team_member_2_image', get_template_directory_uri() . '/layout/images/team/teammembru2-150x150.jpg');
$pixova_lite_team_member_2_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_2_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_2_image ) {
    $pixova_lite_team_member_2_image = $pixova_lite_team_member_2_image_customizer;
  }


$pixova_lite_team_member_2_fburl = get_theme_mod('pixova_lite_team_member_2_facebook', 'https://www.facebook.com/machothemes/');
$pixova_lite_team_member_2_dribbble_url = get_theme_mod('pixova_lite_team_member_2_dribbble', 'http://www.dribbble.com/');
$pixova_lite_team_member_2_email = get_theme_mod('pixova_lite_team_member_2_email', sanitize_email('contact@site.com') );

// Team member #3
$pixova_lite_team_member_3_name = get_theme_mod('pixova_lite_team_member_3_name', __('Angelina Doe', 'high-star') );

# Image Manipulation
$pixova_lite_team_member_3_image_customizer = get_theme_mod('pixova_lite_team_member_3_image', get_template_directory_uri() . '/layout/images/team/teammembru3-150x150.jpg');
$pixova_lite_team_member_3_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_3_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_3_image ) {
    $pixova_lite_team_member_3_image = $pixova_lite_team_member_3_image_customizer;
  }


$pixova_lite_team_member_3_fburl = get_theme_mod('pixova_lite_team_member_3_facebook', 'https://www.facebook.com/machothemes/');
$pixova_lite_team_member_3_dribbble_url = get_theme_mod('pixova_lite_team_member_3_dribbble', 'http://www.dribbble.com/');
$pixova_lite_team_member_3_email = get_theme_mod('pixova_lite_team_member_3_email', sanitize_email('contact@site.com') );

// Team member #4
$pixova_lite_team_member_4_name = get_theme_mod('pixova_lite_team_member_4_name', __('Angelina Doe', 'high-star') );

# Image Manipulation
$pixova_lite_team_member_4_image_customizer = get_theme_mod('pixova_lite_team_member_4_image', get_template_directory_uri() . '/layout/images/team/teammembru4-150x150.jpg');
$pixova_lite_team_member_4_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_4_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_4_image ) {
    $pixova_lite_team_member_4_image = $pixova_lite_team_member_4_image_customizer;
  }

$pixova_lite_team_member_4_fburl = get_theme_mod('pixova_lite_team_member_4_facebook', 'https://www.facebook.com/machothemes/');
$pixova_lite_team_member_4_dribbble_url = get_theme_mod('pixova_lite_team_member_4_dribbble', 'http://www.dribbble.com/');
$pixova_lite_team_member_4_email = get_theme_mod('pixova_lite_team_member_4_email', sanitize_email('contact@site.com') );

// Team member #5
$pixova_lite_team_member_5_name = get_theme_mod('pixova_lite_team_member_5_name');

# Image Manipulation
$pixova_lite_team_member_5_image_customizer = get_theme_mod('pixova_lite_team_member_5_image');
$pixova_lite_team_member_5_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_5_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_5_image ) {
    $pixova_lite_team_member_5_image = $pixova_lite_team_member_5_image_customizer;
  }


$pixova_lite_team_member_5_fburl = get_theme_mod('pixova_lite_team_member_5_facebook');
$pixova_lite_team_member_5_dribbble_url = get_theme_mod('pixova_lite_team_member_5_dribbble');
$pixova_lite_team_member_5_email = get_theme_mod('pixova_lite_team_member_5_email');

}else{

$pixova_lite_section_title = get_theme_mod('pixova_lite_team_section_title' );
$pixova_lite_section_sub_title = get_theme_mod('pixova_lite_team_section_sub_title' );

// Team member #1
$pixova_lite_team_member_1_name = get_theme_mod('pixova_lite_team_member_1_name' );

# Image Manipulation
$pixova_lite_team_member_1_image_customizer = get_theme_mod('pixova_lite_team_member_1_image' );
$pixova_lite_team_member_1_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_1_image_customizer, 'thumbnail' );


if( !$pixova_lite_team_member_1_image ) {
    $pixova_lite_team_member_1_image = $pixova_lite_team_member_1_image_customizer;
  }

$pixova_lite_team_member_1_fburl = get_theme_mod('pixova_lite_team_member_1_facebook' );
$pixova_lite_team_member_1_dribbble_url = get_theme_mod('pixova_lite_team_member_1_dribbble' );
$pixova_lite_team_member_1_email = get_theme_mod('pixova_lite_team_member_1_email' );

// Team member #2
$pixova_lite_team_member_2_name = get_theme_mod('pixova_lite_team_member_2_name' );

# Image Manipulation
$pixova_lite_team_member_2_image_customizer = get_theme_mod('pixova_lite_team_member_2_image' );
$pixova_lite_team_member_2_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_2_image_customizer, 'thumbnail' );



if( !$pixova_lite_team_member_2_image ) {
    $pixova_lite_team_member_2_image = $pixova_lite_team_member_2_image_customizer;
  }


$pixova_lite_team_member_2_fburl = get_theme_mod('pixova_lite_team_member_2_facebook' );
$pixova_lite_team_member_2_dribbble_url = get_theme_mod('pixova_lite_team_member_2_dribbble' );
$pixova_lite_team_member_2_email = get_theme_mod('pixova_lite_team_member_2_email' );

// Team member #3
$pixova_lite_team_member_3_name = get_theme_mod('pixova_lite_team_member_3_name' );

# Image Manipulation
$pixova_lite_team_member_3_image_customizer = get_theme_mod('pixova_lite_team_member_3_image' );
$pixova_lite_team_member_3_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_3_image_customizer, 'thumbnail' );



if( !$pixova_lite_team_member_3_image ) {
    $pixova_lite_team_member_3_image = $pixova_lite_team_member_3_image_customizer;
  }


$pixova_lite_team_member_3_fburl = get_theme_mod('pixova_lite_team_member_3_facebook');
$pixova_lite_team_member_3_dribbble_url = get_theme_mod('pixova_lite_team_member_3_dribbble' );
$pixova_lite_team_member_3_email = get_theme_mod('pixova_lite_team_member_3_email' );

// Team member #4
$pixova_lite_team_member_4_name = get_theme_mod('pixova_lite_team_member_4_name' );

# Image Manipulation
$pixova_lite_team_member_4_image_customizer = get_theme_mod('pixova_lite_team_member_4_image' );
$pixova_lite_team_member_4_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_4_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_4_image ) {
    $pixova_lite_team_member_4_image = $pixova_lite_team_member_4_image_customizer;
  }

$pixova_lite_team_member_4_fburl = get_theme_mod('pixova_lite_team_member_4_facebook' );
$pixova_lite_team_member_4_dribbble_url = get_theme_mod('pixova_lite_team_member_4_dribbble' );
$pixova_lite_team_member_4_email = get_theme_mod('pixova_lite_team_member_4_email' );

// Team member #5
$pixova_lite_team_member_5_name = get_theme_mod('pixova_lite_team_member_5_name');

# Image Manipulation
$pixova_lite_team_member_5_image_customizer = get_theme_mod('pixova_lite_team_member_5_image');
$pixova_lite_team_member_5_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_5_image_customizer, 'thumbnail' );

if( !$pixova_lite_team_member_5_image ) {
    $pixova_lite_team_member_5_image = $pixova_lite_team_member_5_image_customizer;
  }


$pixova_lite_team_member_5_fburl = get_theme_mod('pixova_lite_team_member_5_facebook');
$pixova_lite_team_member_5_dribbble_url = get_theme_mod('pixova_lite_team_member_5_dribbble');
$pixova_lite_team_member_5_email = get_theme_mod('pixova_lite_team_member_5_email');

}
if($pixova_lite_team_member_1_image && $pixova_lite_team_member_2_image && $pixova_lite_team_member_3_image && $pixova_lite_team_member_4_image && !$pixova_lite_team_member_5_image) {
    $sizing = 'col-sm-3';
} else {
    $sizing = '';
}

echo '<section class="has-padding" id="team">';
	echo '<div class="container">';
		echo '<div class="row">';
			echo '<div class="text-center section-heading">';
				echo '<h2 class="light-section-heading">';
					echo esc_html( $pixova_lite_section_title );
				echo '</h2>';
    		echo '<div class="section-sub-heading">'.esc_html( $pixova_lite_section_sub_title ).'</div>';
			echo '</div><!--/.text-center-->';
		echo '</div><!--/.row-->';

		echo '<div class="row align-center">';

    if( isset( $pixova_lite_team_member_1_image ) && !empty( $pixova_lite_team_member_1_image ) ) {
        echo '<div class="mt-team '.$sizing.' high-star-team-member-1">';
        echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_1_image ). '" alt="'. ( ( $pixova_lite_team_member_1_name ) ? esc_attr( $pixova_lite_team_member_1_name ) : '' ) .'">';

        echo '<div class="mt-team-member-name">';
            echo esc_html( $pixova_lite_team_member_1_name );
        echo '</div><!--/.mt-team-member-name-->';
            if ($pixova_lite_team_member_1_fburl || $pixova_lite_team_member_1_dribbble_url || $pixova_lite_team_member_1_email ) {
            echo '<div class="mt-team-description">';



                echo '<div class="mt-team-member-icons">';

                if ( $pixova_lite_team_member_1_fburl ) {
                    echo '<div class="mt-team-member-icon">';
                        echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_fburl ). '"><i class="fa fa-facebook-official"></i></a>';
                    echo '</div><!--/.mt-team-member-icon-->';
                }

                if ( $pixova_lite_team_member_1_dribbble_url ) {
                    echo '<div class="mt-team-member-icon">';
                        echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_dribbble_url ). '"><i class="fa fa-dribbble"></i></a>';
                    echo '</div><!--/.mt-team-member-icon-->';
                }

                if( $pixova_lite_team_member_1_email ) {
                  echo '<div class="mt-team-member-icon">';
                      echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_1_email ). '"><i class="fa fa-envelope"></i></a>';
                  echo '</div><!--/.mt-team-member-icon-->';
                }


                echo '</div><!--/.mt-team-member-icons-->';
            echo '</div><!--/.mt-team-description-->';
            }

        echo '</div> <!--/.mt-team-->';
    }

    if( isset( $pixova_lite_team_member_2_image ) && !empty( $pixova_lite_team_member_2_image ) ) {
        echo '<div class="mt-team '.$sizing.' high-star-team-member-2">';

        echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_2_image ). '" alt="'. ( ( $pixova_lite_team_member_2_name ) ? esc_attr( $pixova_lite_team_member_2_name ) : '' ) .'">';

        echo '<div class="mt-team-member-name">';
            echo esc_html( $pixova_lite_team_member_2_name );
        echo '</div><!--/.mt-team-member-name-->';

        if ($pixova_lite_team_member_2_fburl || $pixova_lite_team_member_2_dribbble_url || $pixova_lite_team_member_2_email ) {

        echo '<div class="mt-team-description">';
            echo '<div class="mt-team-member-icons">';

            if ($pixova_lite_team_member_2_fburl !== '') {
                echo '<div class="mt-team-member-icon">';
                    echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_fburl ). '"><i class="fa fa-facebook-official"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if ($pixova_lite_team_member_2_dribbble_url !== '') {
                echo '<div class="mt-team-member-icon">';
                    echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_dribbble_url ). '"><i class="fa fa-dribbble"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if( $pixova_lite_team_member_2_email ) {
              echo '<div class="mt-team-member-icon">';
                  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_2_email ). '"><i class="fa fa-envelope"></i></a>';
              echo '</div><!--/.mt-team-member-icon-->';
            }


            echo '</div><!--/.mt-team-member-icons-->';
        echo '</div><!--/.mt-team-description-->';
        }

        echo '</div> <!--/.mt-team-->';
    }

    if( isset( $pixova_lite_team_member_3_image ) && !empty( $pixova_lite_team_member_3_image ) ) {
        echo '<div class="mt-team '.$sizing.' high-star-team-member-3">';

        echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_3_image ). '" alt="'. ( ( $pixova_lite_team_member_3_name ) ? esc_attr( $pixova_lite_team_member_3_name ) : '' ) .'">';

        echo '<div class="mt-team-member-name">';
        echo esc_html( $pixova_lite_team_member_3_name );
        echo '</div><!--/.mt-team-member-name-->';


        if ($pixova_lite_team_member_3_fburl || $pixova_lite_team_member_3_dribbble_url || $pixova_lite_team_member_3_email ) {

        echo '<div class="mt-team-description">';
            echo '<div class="mt-team-member-icons">';

            if ($pixova_lite_team_member_3_fburl !== '') {
                echo '<div class="mt-team-member-icon">';
                echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_fburl ). '"><i class="fa fa-facebook-official"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if ($pixova_lite_team_member_3_dribbble_url !== '') {
                echo '<div class="mt-team-member-icon">';
                echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_dribbble_url ). '"><i class="fa fa-dribbble"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if( $pixova_lite_team_member_3_email ) {
              echo '<div class="mt-team-member-icon">';
                  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_3_email ). '"><i class="fa fa-envelope"></i></a>';
              echo '</div><!--/.mt-team-member-icon-->';
            }


            echo '</div><!--/.mt-team-member-icons-->';
        echo '</div><!--/.mt-team-description-->';
        }

        echo '</div> <!--/.mt-team-->';
    }

    if( isset( $pixova_lite_team_member_4_image ) && !empty( $pixova_lite_team_member_4_image ) ) {
        echo '<div class="mt-team '.$sizing.' high-star-team-member-4">';

        echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_4_image ). '" alt="'. ( ( $pixova_lite_team_member_4_name ) ? esc_attr( $pixova_lite_team_member_4_name ) : '' ) .'">';

        echo '<div class="mt-team-member-name">';
        echo esc_html( $pixova_lite_team_member_4_name );
        echo '</div><!--/.mt-team-member-name-->';

        if ($pixova_lite_team_member_4_fburl || $pixova_lite_team_member_4_dribbble_url || $pixova_lite_team_member_4_email ) {
            echo '<div class="mt-team-description">';

            echo '<div class="mt-team-member-icons">';

            if ($pixova_lite_team_member_4_fburl !== '') {
                echo '<div class="mt-team-member-icon">';
                echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_fburl ). '"><i class="fa fa-facebook-official"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if ($pixova_lite_team_member_4_dribbble_url !== '') {
                echo '<div class="mt-team-member-icon">';
                echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_dribbble_url ). '"><i class="fa fa-dribbble"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if( $pixova_lite_team_member_4_email ) {
              echo '<div class="mt-team-member-icon">';
                  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_4_email ). '"><i class="fa fa-envelope"></i></a>';
              echo '</div><!--/.mt-team-member-icon-->';
            }


            echo '</div><!--/.mt-team-member-icons-->';
        echo '</div><!--/.mt-team-description-->';

        }
        echo '</div> <!--/.mt-team-->';
    }

    if( isset( $pixova_lite_team_member_5_image ) && !empty( $pixova_lite_team_member_5_image ) ) {
        echo '<div class="mt-team high-star-team-member-5">';

        echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_5_image ). '" alt="'. ( ( $pixova_lite_team_member_5_name ) ? esc_attr( $pixova_lite_team_member_5_name ) : '' ) .'">';

        echo '<div class="mt-team-member-name">';
        echo esc_html( $pixova_lite_team_member_5_name );
        echo '</div><!--/.mt-team-member-name-->';



        if ($pixova_lite_team_member_5_fburl || $pixova_lite_team_member_5_dribbble_url || $pixova_lite_team_member_5_email ) {

        echo '<div class="mt-team-description">';
            echo '<div class="mt-team-member-icons">';

            if ($pixova_lite_team_member_5_fburl !== '') {
                echo '<div class="mt-team-member-icon">';
                echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_fburl ). '"><i class="fa fa-facebook-official"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if ($pixova_lite_team_member_5_dribbble_url !== '') {
                echo '<div class="mt-team-member-icon">';
                echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_dribbble_url ). '"><i class="fa fa-dribbble"></i></a>';
                echo '</div><!--/.mt-team-member-icon-->';
            }

            if( $pixova_lite_team_member_5_email ) {
              echo '<div class="mt-team-member-icon">';
                  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_5_email ). '"><i class="fa fa-envelope"></i></a>';
              echo '</div><!--/.mt-team-member-icon-->';
            }


            echo '</div><!--/.mt-team-member-icons-->';
        echo '</div><!--/.mt-team-description-->';
        }

        echo '</div> <!--/.mt-team-->';
    }

        echo '</div><!--/.row-->';
    echo '</div><!--/.container-->';
echo '</section><!--/ SECTION -->';
