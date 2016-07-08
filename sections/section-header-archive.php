<?php
$image_logo = get_theme_mod( 'pixova_lite_image_logo', esc_url( get_template_directory_uri() . '/layout/images/high-star-img-logo.png' ) );

$blog_title = get_theme_mod( 'pixova_lite_blog_text_title', esc_html__('Blog', 'high-star') );
$blog_description = get_theme_mod( 'pixova_lite_blog_text_description', esc_html__('Maecenas eget nisl vitae nunc molestie elementum non id urna.', 'high-star') );

echo '<!-- Header -->';
echo '<header id="header-wrap">';
    echo '<div class="container header clearfix">';
        echo '<div class="row">';
            echo '<div class="col-md-12">';

                do_action( 'pixova_lite_logo' );

                echo '<!-- menu icon -->';
                echo '<a id="nav-expander" class="pull-right" href="#">';
                    echo '<i class="fa fa-bars fa-lg white"></i>';
                echo '</a>';

                echo '<!-- /menu icon -->';
                echo '<!-- main navigation -->';

                if( $image_logo ) {
                    $main_navigation_class = 'main-navigation logo-image';
                } else {
                    $main_navigation_class = 'main-navigation';
                }


                   echo '<nav class="'. $main_navigation_class .'">';
                    echo wp_nav_menu( array('theme_location' => 'primary', 'fallback_cb' => 'pixova_lite_fallback_cb') );
                echo '</nav>';
            echo '</div><!--/.col-md-12-->';
        echo '</div><!--/.row-->';
    echo '</div><!--/.container.header.clearfix-->';

    echo '<!-- main navigation mobile -->';
    echo '<div class="offset-canvas-mobile">';
        echo '<nav class="mobile-nav-holder">';
            echo '<a href="#" class="close-btn mobile-nav-close-btn"><span class="fa fa-close"></span></a>';
            echo '<div class="mobile-nav">';
                echo wp_nav_menu( array('theme_location' => 'primary', 'fallback_cb' => 'pixova_lite_fallback_cb') );
            echo '</div><!--/.mobile-nav-->';
        echo '</nav><!--/.mobile-nav-holder-->';
    echo '</div><!--/.offset-canvas-mobile-->';
    echo '<!-- /main navigation mobile -->';
echo '</header><!-- /Header -->';


echo '<section id="intro" class="blog-intro">';
  echo '<div class="parallax-bg-container">';


        if ( get_header_image() !== '' ) {
            echo '<div class="parallax-bg-image" data-image-source="'. get_header_image() .'"></div>';
        } else {
            echo '<div class="parallax-bg-image" data-image-source='. get_template_directory_uri() .'/layout/images/header-bg.jpg"></div>';
        }

   echo '</div><!--/.parallax-bg-container-->';

    echo '<div class="container" id="intro-holder">';
        echo '<div class="intro-content parallax-text-fade">';
            echo '<div class="row">';
                echo '<div class="col-md-12">';
                    echo '<div class="text-center">';
                    if( is_page_template('page-templates/blog-template.php') ) {
                        echo '<h1 class="intro-title">'.esc_html( $blog_title ).'</h1>';
                        echo '<p class="intro-tagline">'.esc_html( $blog_description ).'</p>';
                    } else if(is_category() ) {
                        echo the_archive_title('<h1 class="intro-title">', '</h1>');
                        echo the_archive_description('<p class="intro-tagline">', '</p>');
                    } else if(is_tag() ) {
                        echo '<h1 class="intro-title">';
                            printf(__('Posts tagged with: %s', 'high-star'), single_tag_title('', false) );
                        echo '</h1>';
                        echo '<p class="intro-tagline">'.tag_description().'</p>';
                    } else if (is_search() ) {
                        echo '<h1 class="intro-title">';
                            printf( __( 'Search Results for: %s', 'high-star' ), '<span><u>' . esc_html( get_search_query() ). '</u></span>' );
                        echo '</h1>';
                    }else{
                        echo '<h1 class="intro-title">'.esc_html( get_option('blogname') ).'</h1>';
                        echo '<p class="intro-tagline">'.esc_html( get_option('blogdescription') ).'</p>';
                    }
                    echo '</div><!--/.text-center-->';
                echo '</div><!--/.col-md-12-->';
            echo '</div><!--/.row-->';
        echo '</div><!--/.intro-content.parallax-text-fade-->';
    echo '</div><!--/.container-->';

echo '</section><!--/ SECTION -->';
