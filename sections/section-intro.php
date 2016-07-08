<?php

if ( current_user_can( 'edit_theme_options' ) ) {

$pixova_lite_main_cta_title = get_theme_mod( 'pixova_lite_intro_title_cta', __( 'WELCOME TO high star', 'high-star' ) );
$pixova_lite_main_cta_text = get_theme_mod( 'pixova_lite_intro_cta', __( 'Free & Modern One-Page Parallax WordPress Theme', 'high-star' ) );
$pixova_lite_main_cta_sub_text = get_theme_mod('pixova_lite_intro_sub_cta', __('Your cool business headline here. You can even <u><strong>insert HTML here & images</strong></u>.<br> Lorem ipsum dolor sit amet lorem dolor sit amet.', 'high-star') );
$pixova_lite_main_cta_button_text = get_theme_mod('pixova_lite_intro_button_text', __('CONTACT US', 'high-star') );
$pixova_lite_main_cta_button_url = get_theme_mod('pixova_lite_intro_button_url', '#about');

//Outline Button

$pixova_lite_main_cta_outline_button_text = get_theme_mod('pixova_lite_intro_outline_button_text', __('LEARN MORE', 'high-star') );
$pixova_lite_main_cta_outline_button_url = get_theme_mod('pixova_lite_intro_outline_button_url', '#about');

$pixova_lite_what_we_do_enabled = get_theme_mod('pixova_lite_intro_what_we_do_enabled', 0);
$pixova_lite_what_we_do_1 = get_theme_mod('pixova_lite_intro_what_we_do_1_title', __('Web design', 'high-star') );
$pixova_lite_what_we_do_1_description = get_theme_mod('pixova_lite_intro_what_we_do_1_description', __('Lorem ipsum dolor sit amet. Lorem ipsum.', 'high-star') );
$pixova_lite_what_we_do_2 = get_theme_mod('pixova_lite_intro_what_we_do_2_title', __('Development', 'high-star') );
$pixova_lite_what_we_do_2_description = get_theme_mod('pixova_lite_intro_what_we_do_2_description', __('Lorem ipsum dolor sit amet. Lorem ipsum.', 'high-star') );
$pixova_lite_what_we_do_3 = get_theme_mod('pixova_lite_intro_what_we_do_3_title', __('Print design', 'high-star') );
$pixova_lite_what_we_do_3_description = get_theme_mod('pixova_lite_intro_what_we_do_3_description', __('Lorem ipsum dolor sit amet. Lorem ipsum.', 'high-star') );

}else{

$pixova_lite_main_cta_title = get_theme_mod( 'pixova_lite_intro_title_cta' );
$pixova_lite_main_cta_text = get_theme_mod( 'pixova_lite_intro_cta' );
$pixova_lite_main_cta_sub_text = get_theme_mod('pixova_lite_intro_sub_cta' );
$pixova_lite_main_cta_button_text = get_theme_mod('pixova_lite_intro_button_text' );
$pixova_lite_main_cta_button_url = get_theme_mod('pixova_lite_intro_button_url' );

//Outline Button

$pixova_lite_main_cta_outline_button_text = get_theme_mod('pixova_lite_intro_outline_button_text' );
$pixova_lite_main_cta_outline_button_url = get_theme_mod('pixova_lite_intro_outline_button_url' );

$pixova_lite_what_we_do_enabled = get_theme_mod('pixova_lite_intro_what_we_do_enabled', 0);
$pixova_lite_what_we_do_1 = get_theme_mod('pixova_lite_intro_what_we_do_1_title' );
$pixova_lite_what_we_do_1_description = get_theme_mod('pixova_lite_intro_what_we_do_1_description' );
$pixova_lite_what_we_do_2 = get_theme_mod('pixova_lite_intro_what_we_do_2_title' );
$pixova_lite_what_we_do_2_description = get_theme_mod('pixova_lite_intro_what_we_do_2_description' );
$pixova_lite_what_we_do_3 = get_theme_mod('pixova_lite_intro_what_we_do_3_title' );
$pixova_lite_what_we_do_3_description = get_theme_mod('pixova_lite_intro_what_we_do_3_description' );

}



echo '<section id="intro" class="home-intro" >';
        echo '<div class="parallax-bg-container">';
            if ( get_header_image() && get_header_image() !== '' ) {
                echo '<div class="parallax-bg-image" data-image-source="'. get_header_image() .'"></div>';
            } else {
                echo '<div class="parallax-bg-image" data-image-source='. get_template_directory_uri() .'/layout/images/header-bg.jpg></div>';
            }
        echo '</div><!--/.parallax-bg-container-->';

        echo '<div class="container" id="intro-holder">';
            echo '<div class="intro-content parallax-text-fade">';
                echo '<div class="row">';
                    echo '<div class="col-md-12">';
                        echo '<div class="text-center">';
                            echo '<h1 class="intro-cta-title">'. $pixova_lite_main_cta_title .'</h1>';
                            echo '<h1 class="intro-title">'. $pixova_lite_main_cta_text .'</h1>';
                            echo '<p class="intro-tagline">'. wp_kses( $pixova_lite_main_cta_sub_text, array( 'u'=>array(), 'br' =>array(), 'strong' => array() ) ) .'</p>';

                            if( $pixova_lite_main_cta_outline_button_text) {
                                echo '<a class="btn btn-cta btn-cta-intro-outline" href="' . esc_url( $pixova_lite_main_cta_outline_button_url ) . '"><span>' . esc_html( $pixova_lite_main_cta_outline_button_text ) . '</span></a>';
                            }

							if( $pixova_lite_main_cta_button_text ) {
                                echo '<a class="btn btn-cta btn-cta-intro" href="'.esc_url( $pixova_lite_main_cta_button_url ).'"><span>'.esc_html( $pixova_lite_main_cta_button_text ).'</span></a>';
							}

                        echo '</div><!--/.text-center-->';
                    echo '</div><!--/.col-md-12-->';
                echo '</div><!--/.row-->';
            echo '</div><!--/.intro-content.parallax-text-fade-->';
        echo '</div><!--/.container-->';

if( $pixova_lite_what_we_do_enabled == 1 ) {
        echo '<div class="container">';
                echo '<div class="intro-services parallax-text-fade">';
                    echo '<div class="row">';
                        echo '<div class="col-md-12">';
                            echo '<div class="intro-heading">';
                                echo '<h4>'.__('What We Do','high-star').'</h4>';
                            echo '</div><!--/.intro-heading-->';
                            echo '<div id="intro-services-wrap">';
                                echo '<div class="intro-services col-md-4 col-sm-4 col-xs-4">';
                                    echo '<span style="color: '.pixova_lite_hex2rgba('#FFFFFF').'" class="fa fa-tint"></span>';
                                    echo '<h3 class="intro-service-title intro-service-title-1">'.esc_html( $pixova_lite_what_we_do_1 ).'</h3>';
                                    echo '<p class="intro-service-text intro-service-text-1">'.esc_html( $pixova_lite_what_we_do_1_description ).'</p>';
                                     echo '</div>';
                                echo '<!-- /intro service -->';

                                    echo '<div class="intro-services col-md-4 col-sm-4 col-xs-4">';
                                    echo '<span style="color: '.pixova_lite_hex2rgba('#FFFFFF').'" class="fa fa-pagelines"></span>';
                                    echo '<h3 class="intro-service-title intro-service-title-2">'.esc_html( $pixova_lite_what_we_do_2 ).'</h3>';
                                    echo '<p class="intro-service-text intro-service-text-2">'.esc_html( $pixova_lite_what_we_do_2_description ).'</p>';
                                echo '</div>';
                                echo '<!-- /intro service -->';

                                echo '<div class="intro-services col-md-4 col-sm-4 col-xs-4">';
                                    echo '<span style="color: '.pixova_lite_hex2rgba('#FFFFFF').'" class="fa fa-envelope-o"></span>';
                                    echo '<h3 class="intro-service-title intro-service-title-3">'.esc_html( $pixova_lite_what_we_do_3 ).'</h3>';
                                    echo '<p class="intro-service-text intro-service-text-3">'.esc_html( $pixova_lite_what_we_do_3_description ).'</p>';
                                echo '</div>';
                            echo '</div><!--/#intro-services-wrap-->';
                        echo '</div><!--/.col-md-12-->';
            echo '</div><!--/.row-->';
        echo '</div><!--/.intro-services.parallax-text-fade-->';
    echo '</div><!--/.container-->';

  } // end if

echo '</section><!--/#intro.home-intro-->';
