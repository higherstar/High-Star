<?php



  $check_footer_theme_copyright_enable = get_theme_mod('pixova_lite_copyright_enable', 1);

  $text_footer_theme_copyright_message = get_theme_mod('pixova_lite_copyright', sprintf('&copy; %s', esc_html__('Copyright 20', 'high-star') . sprintf("%s", date('y') ) . esc_html__('. All Rights Reserved', 'high-star') ) );



$sidebar_args = array('before_title' => '<h3 class="widget-title"><span>','after_title' => '</span></h3>');

?>



        </div><!-- #content -->

        <footer id="footer" class="site-footer">

            <div class="container">

                <div class="row">

                    <?php

                    echo '<section class="mt-footer-widget col-md-4 clearfix">';



                    if( is_active_sidebar( 'footer-sidebar-1' ) ) {

                            dynamic_sidebar('footer-sidebar-1');

                        } elseif( current_user_can( 'edit_theme_options' ) ) {

                            the_widget('pixova_lite_widget_about', sprintf( 'title=%s', __('About', 'high-star') ) .'&'. sprintf('show_title=1&about_text=%s.', __('The many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected true of a humour', 'high-star') ), $sidebar_args );

                        }

                    echo '</section><!--/.mt-foter-widget.col-md-4.clearfix-->';



                    echo '<section class="mt-footer-widget col-md-4 clearfix">';

                    if( is_active_sidebar( 'footer-sidebar-2' ) ) {

                              dynamic_sidebar('footer-sidebar-2');

                          } elseif( current_user_can( 'edit_theme_options' ) ) { ?>



                              <div class="widget">

                                  <h3 class="widgettitle"><span><?php _e('Quick nav', 'high-star'); ?></span></h3>

                                      <ul id="menu-pixova-footer-menu" class="menu">

                                          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item"><a href="#about"><?php _e('About us', 'high-star'); ?></a></li>

                                          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item"><a href="#works"><?php _e('Recent Works', 'high-star'); ?></a></li>

                                          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item"><a href="#testimonials"><?php _e('Testimonials', 'high-star'); ?></a></li>

                                          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item"><a href="#news"><?php _e('News', 'high-star'); ?></a></li>

                                          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item"><a href="#team"><?php _e('Team', 'high-star'); ?></a></li>

                                          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item"><a href="#contact"><?php _e('Contact', 'high-star'); ?></a></li>

                                      </ul>

                              </div>



                          <?php }

                    echo '</section><!--/.mt-foter-widget.col-md-4.clearfix-->';



                    echo '<section class="mt-footer-widget col-md-4 clearfix">';

                    if( is_active_sidebar( 'footer-sidebar-3' ) ) {

                           dynamic_sidebar('footer-sidebar-3');

                       } elseif( current_user_can( 'edit_theme_options' ) )  {

                          the_widget('pixova_lite_widget_latest_posts', sprintf('title=%s', __('Latest Posts', 'high-star') ).'&show_title=1&items=1', $sidebar_args );

                       }

                    echo '</section><!--/.mt-foter-widget.col-md-4.clearfix-->';

                    ?>

                </div> <!-- /.row-->



                <?php

                  echo '<div class="row">';

                    echo '<section class="mt-footer-widget col-md-12 clearfix">';

                    if(is_active_sidebar('footer-sidebar-4')) {

                            dynamic_sidebar('footer-sidebar-4');

                          } elseif( current_user_can( 'edit_theme_options' ) )  {

                            the_widget('pixova_lite_widget_social_media', sprintf( 'title=%s', __('Follow us', 'high-star') ).'&show_title=0&profile_facebook=#&profile_twitter=#&profile_plus=#&profile_pinterest=#&profile_youtube=#&profile_dribbble=#&profile_tumblr=#&profile_instagram=#&profile_github=#&profile_bitbucket=#&profile_codepen=#.');

                          }

                    echo '</section><!--/.mt-foter-widget.col-md-12.clearfix-->';

                  echo '</div><!--/.row-->';

                ?>



             </div> <!-- /.container -->



            <div class="fluid-container">

                <div class="footer-copyright-container">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="text-center">

                                <p class="footer-copyright">

                                    <span class="high-star-footer-text-copyright">

                                      <?php echo esc_html($text_footer_theme_copyright_message); ?>

                                  </span><!--/.high-star-footer-text-copyright-->

                                </p>

                            </div><!--/.text-center-->

                        </div><!--/col-lg-12-->

                    </div><!--/.row-->

                </div><!--/.footer-copyright-container-->

            </div><!--/.fluid-container-->



        </footer>

        <a href="#" class="mt-top"><?php _e('Top', 'high-star'); ?></a>

        <?php wp_footer(); ?>

    </body>

</html>
