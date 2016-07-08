<?php



class Pixova_Lite_Widget_Social_Media extends WP_Widget {

    function Pixova_Lite_Widget_Social_Media() {
        $widget_ops = array(
            'classname' => 'pixova_lite_widget_social_media text-center',
            'description' => __('A widget that displays social media icons designed for blog sidebar', 'high-star') );

        $control_ops = array(
            'width' => 300,
            'height' => 350,
            'id_base' => 'pixova_lite_widget_social_media' );
        parent::__construct( 'pixova_lite_widget_social_media', __('[MT] - Social Media', 'high-star'), $widget_ops, $control_ops );
    }



    function widget( $args, $instance ) {
        extract( $args );
        global $post;

        $title = apply_filters('widget_title', $instance['title'] );
        $show_title = $instance['show_title'];

        $profile_facebook 	=  esc_url( $instance['profile_facebook'] );
        $profile_twitter 	=  esc_url( $instance['profile_twitter'] );
        $profile_plus 		=  esc_url( $instance['profile_plus'] );
        $profile_pinterest	=  esc_url( $instance['profile_pinterest'] );
        $profile_youtube 	=  esc_url( $instance['profile_youtube'] );
        $profile_dribbble 	=  esc_url( $instance['profile_dribbble'] );
        $profile_tumblr 	=  esc_url( $instance['profile_tumblr'] );
        $profile_instagram 	=  esc_url( $instance['profile_instagram'] );
        $profile_github = esc_url( $instance['profile_github'] );
        $profile_bitbucket = esc_url( $instance['profile_bitbucket'] );
        $profile_codepen = esc_url( $instance['profile_codepen'] );

        echo $before_widget;

        if( $show_title == '1' ) {
          if ( $title ) {
             echo $before_title . $title . $after_title;
           }
        }



        echo '<div class="fixed">';
          echo '<ul style="padding-left: 10px;">';

          if ($profile_facebook){
              echo '<li><a title="' . __('Facebook', 'high-star'). '" class="facebook-icon social-icon" href="'.esc_url( $profile_facebook ).'"><i class="fa fa-facebook-official"></i></a></li>';
          }

          if ($profile_twitter){
              echo '<li><a title="'. __('Twitter', 'high-star') .'" class="twitter-icon social-icon" href="'.esc_url( $profile_twitter ).'"><i class="fa fa-twitter"></i></a></li>';
          }

          if ($profile_plus){
              echo '<li><a title="'. __('Google+', 'high-star') .'" class="googleplus-icon social-icon" href="'.esc_url( $profile_plus ).'"><i class="fa fa-google-plus"></i></a></li>';
          }

          if ($profile_pinterest){
              echo '<li><a title="'. __('Pinterest', 'high-star').'" class="pinterest-icon social-icon" href="'.esc_url( $profile_pinterest ).'"><i class="fa fa-pinterest"></i></a></li>';
          }

          if ($profile_youtube){
              echo '<li><a title="'. __('YouTube', 'high-star').'" class="youtube-icon social-icon" href="'.esc_url( $profile_youtube ).'"><i class="fa fa-youtube"></i></a></li>';
          }

          if ($profile_dribbble){
              echo '<li><a title="'.__('Dribbble', 'high-star').'" class="dribble-icon social-icon" href="'.esc_url( $profile_dribbble ).'"><i class="fa fa-dribbble"></i></a></li>';
          }

          if ($profile_tumblr){
              echo '<li><a title="'. __('Tumblr', 'high-star').'" class="tumblr-icon social-icon" href="'.esc_url( $profile_tumblr ).'"><i class="fa fa-tumblr"></i></a></li>';
          }

          if ($profile_instagram){
              echo '<li><a title="'. __('Instagram', 'high-star').'" class="instagram-icon social-icon" href="'.esc_url( $profile_instagram ).'"><i class="fa fa-instagram"></i></a></li>';
          }

          if ( $profile_github ){
              echo '<li><a title="' . __('GitHub', 'high-star').'" class="github-icon social-icon" href="'.esc_url( $profile_github ).'"><i class="fa fa-github"></i></a></li>';
          }

          if ( $profile_bitbucket ){
              echo '<li><a title="' . __('BitBucket', 'high-star').'" class="bitbucket-icon social-icon" href="'.esc_url( $profile_bitbucket ).'"><i class="fa fa-bitbucket"></i></a></li>';
          }

          if ( $profile_codepen ){
              echo '<li><a title="' . __('Codepen', 'high-star').'" class="codepen-icon social-icon" href="'.esc_url( $profile_codepen ).'"><i class="fa fa-codepen"></i></a></li>';
          }

          echo '</ul>';
        echo '</div>';



        echo $after_widget;
    }


    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] 				= esc_html ( $new_instance['title'] );
        $instance['show_title']   = strip_tags( $new_instance['show_title'] );
        $instance['profile_facebook'] 	= esc_url( $new_instance['profile_facebook'] );
        $instance['profile_twitter'] 	= esc_url( $new_instance['profile_twitter'] );
        $instance['profile_plus'] 		= esc_url( $new_instance['profile_plus'] );
        $instance['profile_pinterest'] 	= esc_url( $new_instance['profile_pinterest'] );
        $instance['profile_youtube'] 	= esc_url( $new_instance['profile_youtube'] );
        $instance['profile_dribbble'] 	= esc_url( $new_instance['profile_dribbble'] );
        $instance['profile_tumblr'] 	= esc_url( $new_instance['profile_tumblr'] );
        $instance['profile_instagram'] 	= esc_url( $new_instance['profile_instagram'] );
        $instance['profile_github'] 	= esc_url( $new_instance['profile_github'] );
        $instance['profile_bitbucket'] 	= esc_url( $new_instance['profile_bitbucket'] );
        $instance['profile_codepen'] 	= esc_url( $new_instance['profile_codepen'] );


        return $instance;
    }


    function form( $instance ) {
        $defaults = array(
            'title' => null,
            'show_title' => null,
            'profile_facebook' => null,
            'profile_twitter' => null,
            'profile_plus' => null,
            'profile_pinterest' => null,
            'profile_youtube' => null,
            'profile_dribbble' => null,
            'profile_tumblr' => null,
            'profile_instagram' => null,
            'profile_github' => null,
            'profile_bitbucket' => null,
            'profile_codepen' => null
        );


        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <div class="ewf-meta">

          <p>
            <input id="<?php echo $this->get_field_id('show_title'); ?>" name="<?php echo $this->get_field_name('show_title'); ?>" type="checkbox" value="1" <?php checked( '1', $instance['show_title'] ); ?> />
            <label for="<?php echo $this->get_field_id('show_title'); ?>"><?php _e('Show widget title?', 'high-star'); ?></label>
          </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_html( $instance['title'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_facebook' ); ?>"><?php _e('Facebook profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_facebook' ); ?>" name="<?php echo $this->get_field_name( 'profile_facebook' ); ?>" value="<?php echo esc_url( $instance['profile_facebook'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_twitter' ); ?>"><?php _e('Twitter profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_twitter' ); ?>" name="<?php echo $this->get_field_name( 'profile_twitter' ); ?>" value="<?php echo esc_url( $instance['profile_twitter'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_plus' ); ?>"><?php _e('Google Plus profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_plus' ); ?>" name="<?php echo $this->get_field_name( 'profile_plus' ); ?>" value="<?php echo esc_url( $instance['profile_plus'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_pinterest' ); ?>"><?php _e('Pinterest profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_pinterest' ); ?>" name="<?php echo $this->get_field_name( 'profile_pinterest' ); ?>" value="<?php echo esc_url( $instance['profile_pinterest'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_youtube' ); ?>"><?php _e('YouTube profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_youtube' ); ?>" name="<?php echo $this->get_field_name( 'profile_youtube' ); ?>" value="<?php echo esc_url( $instance['profile_youtube'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_dribbble' ); ?>"><?php _e('Dribbble profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_dribbble' ); ?>" name="<?php echo $this->get_field_name( 'profile_dribbble' ); ?>" value="<?php echo esc_url( $instance['profile_dribbble'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_tumblr' ); ?>"><?php _e('Tumblr profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_tumblr' ); ?>" name="<?php echo $this->get_field_name( 'profile_tumblr' ); ?>" value="<?php echo esc_url( $instance['profile_tumblr'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_instagram' ); ?>"><?php _e('Instagram profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_instagram' ); ?>" name="<?php echo $this->get_field_name( 'profile_instagram' ); ?>" value="<?php echo esc_url( $instance['profile_instagram'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_github' ); ?>"><?php _e('GitHub profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_github' ); ?>" name="<?php echo $this->get_field_name( 'profile_github' ); ?>" value="<?php echo esc_url( $instance['profile_github'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_bitbucket' ); ?>"><?php _e('BitBucket profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_bitbucket' ); ?>" name="<?php echo $this->get_field_name( 'profile_bitbucket' ); ?>" value="<?php echo esc_url( $instance['profile_bitbucket'] ); ?>" style="width:100%;" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'profile_codepen' ); ?>"><?php _e('Codepen profile URL:', 'high-star'); ?></label>
                <input id="<?php echo $this->get_field_id( 'profile_codepen' ); ?>" name="<?php echo $this->get_field_name( 'profile_codepen' ); ?>" value="<?php echo esc_url( $instance['profile_codepen'] ); ?>" style="width:100%;" />
            </p>

        </div>

    <?php
    }
}


// register the shortcode
    register_widget('pixova_lite_widget_social_media');
