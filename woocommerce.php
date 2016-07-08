<?php
/**
 *  The template for displaying WooCommerce.
 *
 *  @package WordPress
 *  @subpackage high-star
 */
?>
<?php get_header(); ?>
<?php //get_template_part( 'sections/section', 'header-woocommerce' ); ?>
<?php
$pixova_lite_woocommerce_show_sidebar_on_shop_page = get_theme_mod( 'pixova_lite_woocommerce_show_sidebar_on_shop_page', 'show' );
$pixova_lite_woocommerce_show_sidebar_on_left_or_right_side = get_theme_mod( 'pixova_lite_woocommerce_show_sidebar_on_left_or_right_side', 'left' );
?>
<section class="has-padding">
    <div class="container">
        <div class="row">
            <?php if( is_shop() ): ?>
                <?php if( $pixova_lite_woocommerce_show_sidebar_on_shop_page == 'show' && $pixova_lite_woocommerce_show_sidebar_on_left_or_right_side == 'left' ): ?>
                    <div class="col-md-3">
                        <div class="mt-blog-sidebar" style="margin-top: 0;">
                            <?php
                            if( is_active_sidebar( 'woocommerce-sidebar' ) ):
                                dynamic_sidebar( 'woocommerce-sidebar' );
                            else:
                                the_widget( 'WC_Widget_Cart', 'title=' . esc_html__( 'WooCommerce Title', 'high-star' ) );
                                the_widget( 'WC_Widget_Product_Categories', 'title=' . esc_html__( 'Product Categories', 'high-star' ) );
                            endif;
                            ?>
                        </div><!--/.mt-blog-sidebar-->
                    </div><!--/.col-md-3-->
                <?php endif; ?>
                <div class="<?php if( $pixova_lite_woocommerce_show_sidebar_on_shop_page == 'show' ): echo 'col-md-9'; else: echo 'col-md-12'; endif; ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php woocommerce_content(); ?>
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .content-left-wrap -->
                <?php if( $pixova_lite_woocommerce_show_sidebar_on_shop_page == 'show' && $pixova_lite_woocommerce_show_sidebar_on_left_or_right_side == 'right' ): ?>
                    <div class="col-md-3">
                        <div class="mt-blog-sidebar" style="margin-top: 0;">
                            <?php
                            if( is_active_sidebar( 'woocommerce-sidebar' ) ):
                                dynamic_sidebar( 'woocommerce-sidebar' );
                            else:
                                the_widget( 'WC_Widget_Cart', 'title=' . esc_html__( 'WooCommerce Title', 'high-star' ) );
                                the_widget( 'WC_Widget_Product_Categories', 'title=' . esc_html__( 'Product Categories', 'high-star' ) );
                            endif;
                            ?>
                        </div><!--/.mt-blog-sidebar-->
                    </div><!--/.col-md-3-->
                <?php endif; ?>
            <?php else: ?>
                <div class="col-md-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php woocommerce_content(); ?>
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .content-left-wrap -->
            <?php endif; ?>
        </div><!--/.row-->
    </div><!-- .container -->
</section><!--/.has-padding-->
<?php get_footer(); ?>