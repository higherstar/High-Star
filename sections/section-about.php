<?php

if ( current_user_can( 'edit_theme_options' ) ) {

	$pixova_lite_section_title = get_theme_mod('pixova_lite_about_section_title', __('We build solutions for your everyday problems.', 'high-star') );
	$pixova_lite_section_sub_title = get_theme_mod('pixova_lite_about_section_sub_title', __('This is what we do in a nutshell.', 'high-star') );

	// Text blocks
	$pixova_lite_section_text_block = get_theme_mod('pixova_lite_about_section_textarea', __('Creative ut tincidunt nibh, varius cursus nunc. Curabitur molestie, metus vel luctus euismod, mi libero laoreet odio, eu dapibus leo tortor sit amet purus. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'high-star') );
	$pixova_lite_section_text_blockquote = get_theme_mod('pixova_lite_about_section_blockquote', __('Working with Pixova has been an experience for a lifetime. I strongly reccommend these guys for their awesome support. Erlich Bachman, Aviato', 'high-star') );


	// Section #1 Chart
	$pixova_lite_section_1_chart_heading = get_theme_mod('pixova_lite_about_section_chart_1_heading', __('Web development', 'high-star') );
	$pixova_lite_section_1_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_1_percentage', '70');
	$pixova_lite_section_1_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_1_bar_color', '#f2c351');
	$pixova_lite_section_1_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_1_track_color', '#EEEEEE');

	// Section #2 Chart
	$pixova_lite_section_2_chart_heading = get_theme_mod('pixova_lite_about_section_chart_2_heading', __('Web Design', 'high-star') );
	$pixova_lite_section_2_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_2_percentage', '70');
	$pixova_lite_section_2_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_2_bar_color', '#f2c351');
	$pixova_lite_section_2_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_2_track_color', '#EEEEEE');

	// Section #3 Chart
	$pixova_lite_section_3_chart_heading = get_theme_mod('pixova_lite_about_section_chart_3_heading', __('Print Design', 'high-star') );
	$pixova_lite_section_3_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_3_percentage', '70');
	$pixova_lite_section_3_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_3_bar_color', '#f2c351');
	$pixova_lite_section_3_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_3_track_color', '#EEEEEE');

	// Section #4 Chart
	$pixova_lite_section_4_chart_heading = get_theme_mod('pixova_lite_about_section_chart_4_heading', __('Graphic Identity', 'high-star') );
	$pixova_lite_section_4_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_4_percentage', '70');
	$pixova_lite_section_4_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_4_bar_color', '#f2c351');
	$pixova_lite_section_4_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_4_track_color', '#EEEEEE');

}else{

	$pixova_lite_section_title = get_theme_mod('pixova_lite_about_section_title' );
	$pixova_lite_section_sub_title = get_theme_mod('pixova_lite_about_section_sub_title' );

	// Text blocks
	$pixova_lite_section_text_block = get_theme_mod('pixova_lite_about_section_textarea' );
	$pixova_lite_section_text_blockquote = get_theme_mod('pixova_lite_about_section_blockquote' );


	// Section #1 Chart
	$pixova_lite_section_1_chart_heading = get_theme_mod('pixova_lite_about_section_chart_1_heading' );
	$pixova_lite_section_1_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_1_percentage' );
	$pixova_lite_section_1_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_1_bar_color' );
	$pixova_lite_section_1_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_1_track_color' );

	// Section #2 Chart
	$pixova_lite_section_2_chart_heading = get_theme_mod('pixova_lite_about_section_chart_2_heading' );
	$pixova_lite_section_2_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_2_percentage' );
	$pixova_lite_section_2_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_2_bar_color' );
	$pixova_lite_section_2_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_2_track_color' );

	// Section #3 Chart
	$pixova_lite_section_3_chart_heading = get_theme_mod('pixova_lite_about_section_chart_3_heading' );
	$pixova_lite_section_3_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_3_percentage' );
	$pixova_lite_section_3_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_3_bar_color' );
	$pixova_lite_section_3_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_3_track_color' );

	// Section #4 Chart
	$pixova_lite_section_4_chart_heading = get_theme_mod('pixova_lite_about_section_chart_4_heading' );
	$pixova_lite_section_4_chart_percentage = get_theme_mod('pixova_lite_about_section_chart_4_percentage' );
	$pixova_lite_section_4_chart_bar_color = get_theme_mod('pixova_lite_about_section_chart_4_bar_color' );
	$pixova_lite_section_4_chart_track_color = get_theme_mod('pixova_lite_about_section_chart_4_track_color' );

}



// Logic used to dynamically create the layout, based on how many charts are active
$pixova_lite_no_of_charts = 0;
$pixova_lite_cols = '';
$pixova_lite_chart_size = '';

if( isset( $pixova_lite_section_1_chart_percentage ) && is_numeric( $pixova_lite_section_1_chart_percentage) ) {
	$pixova_lite_no_of_charts++;
}

if( isset( $pixova_lite_section_2_chart_percentage ) && is_numeric( $pixova_lite_section_2_chart_percentage) ) {
	$pixova_lite_no_of_charts++;
}

if( isset( $pixova_lite_section_3_chart_percentage ) && is_numeric( $pixova_lite_section_3_chart_percentage) ) {
	$pixova_lite_no_of_charts++;
}

if( isset( $pixova_lite_section_4_chart_percentage ) && is_numeric( $pixova_lite_section_4_chart_percentage) ) {
	$pixova_lite_no_of_charts++;
}


if($pixova_lite_no_of_charts == 1) {
	$pixova_lite_cols = 'col-md-offset-4 col-sm-offset-3 col-xs-offset-1 text-center';
    $pixova_lite_chart_size = 'col-md-4 col-sm-6 col-xs-10';
} else if($pixova_lite_no_of_charts == 2) {
	$pixova_lite_cols = 'col-md-offset-4 col-sm-offset-2 text-center';
    $pixova_lite_chart_size = 'col-md-4 col-sm-4 col-xs-12';
} else if($pixova_lite_no_of_charts == 3) {
	$pixova_lite_cols = 'col-md-offset-1 col-xs-12';
    $pixova_lite_chart_size = 'col-md-3 col-sm-4 col-xs-12';
} else if($pixova_lite_no_of_charts == 4){
    $pixova_lite_cols = 'col-xs-12';
	$pixova_lite_chart_size = 'col-md-3 col-sm-6 col-xs-12';
}


echo '<section class="has-padding text-center" id="about">';
	echo '<div class="container">';
		echo '<div class="row">';
			echo '<div class="section-heading text-center">';
				echo '<h2 class="light-section-heading">';
					echo esc_html( $pixova_lite_section_title );
				echo '</h2>';
				echo '<div class="section-sub-heading">'.esc_html( $pixova_lite_section_sub_title ).'</div>';
			echo '</div><!--/.text-center-->';
		echo '</div><!--/.row-->';

		echo '<div class="row">';

		if(isset($pixova_lite_section_text_block) && !empty($pixova_lite_section_text_block)) {
			echo '<p class="about-text">';
				echo wp_kses(
					$pixova_lite_section_text_block,
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
			echo '</p><!--/.about-text-->';
		}

		if( isset( $pixova_lite_section_text_blockquote ) && !empty( $pixova_lite_section_text_blockquote) ) {
			echo '<blockquote>';
				echo '<p>';
			echo wp_kses(
					$pixova_lite_section_text_blockquote,
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
				echo '</p>';
			echo '</blockquote>';
		}


echo '<div class="pixova_lite_pie_chart_wrapper '.$pixova_lite_cols.'">';

		if(isset($pixova_lite_section_1_chart_percentage) && is_numeric( $pixova_lite_section_1_chart_percentage) ) {
			echo '<div class="pixova_lite_chart_1 '.$pixova_lite_chart_size.'">';
				echo '<div class="mt-chart" data-trackColor="'.esc_html( $pixova_lite_section_1_chart_track_color ).'" data-barColor="'.esc_html( $pixova_lite_section_1_chart_bar_color ).'" data-lineWidth="10" data-percent="'.esc_html( $pixova_lite_section_1_chart_percentage ).'">';
					echo'<div class="mt-pie-chart-custom-text">';
						echo esc_html( $pixova_lite_section_1_chart_percentage ).'%';
	    			echo'</div><!--/.mt-pie-chart-custom-text-->';
	        	echo '</div><!--/.mt-chart-->';

	        	if( isset( $pixova_lite_section_1_chart_heading ) ) {
		        	echo '<h4 class="mt-heading mt-heading-single-line text-center">';
		        		echo esc_html( $pixova_lite_section_1_chart_heading );
		        	echo '</h4><!--/.mt-heading-->';
	        	}

        	echo '</div><!--/.col-md-->';
        }

        if(isset($pixova_lite_section_2_chart_percentage) && is_numeric( $pixova_lite_section_2_chart_percentage) ) {
        	echo '<div class="pixova_lite_chart_2 '.$pixova_lite_chart_size.'">';
				echo '<div class="mt-chart" data-trackColor="'.esc_html( $pixova_lite_section_2_chart_track_color ).'" data-barColor="'.esc_html( $pixova_lite_section_2_chart_bar_color ).'" data-lineWidth="10" data-percent="'.esc_html( $pixova_lite_section_2_chart_percentage ).'">';
					echo'<div class="mt-pie-chart-custom-text">';
	            		echo esc_html( $pixova_lite_section_2_chart_percentage ).'%';
	            	echo'</div><!--/.mt-pie-chart-custom-text-->';
	        	echo '</div><!--/.mt-chart-->';

	        	if( isset( $pixova_lite_section_2_chart_heading ) ) {
		        	echo '<h4 class="mt-heading mt-heading-single-line text-center">';
		        		echo esc_html( $pixova_lite_section_2_chart_heading );
		        	echo '</h4><!--/.mt-heading-->';
	        	}
	        echo '</div><!--/.col-md-->';
        }

        if(isset($pixova_lite_section_3_chart_percentage) && is_numeric( $pixova_lite_section_3_chart_percentage) ) {
        	echo '<div class="pixova_lite_chart_3 '.$pixova_lite_chart_size.'">';
				echo '<div class="mt-chart" data-trackColor="'.esc_html( $pixova_lite_section_3_chart_track_color ).'" data-barColor="'.esc_html( $pixova_lite_section_3_chart_bar_color ).'" data-lineWidth="10" data-percent="'.esc_html( $pixova_lite_section_3_chart_percentage ).'">';
					  	echo'<div class="mt-pie-chart-custom-text">';
            				echo esc_html( $pixova_lite_section_3_chart_percentage ).'%';
            			echo'</div><!--/.mt-pie-chart-custom-text-->';
	        	echo '</div><!--/.mt-chart-->';
	        	if( isset( $pixova_lite_section_3_chart_heading ) ) {
		        	echo '<h4 class="mt-heading mt-heading-single-line text-center">';
		        		echo esc_html( $pixova_lite_section_3_chart_heading );
		        	echo '</h4><!--/.mt-heading-->';
	        	}
	        echo '</div><!--/.col-md-->';
        }


		if(isset($pixova_lite_section_4_chart_percentage) && is_numeric( $pixova_lite_section_4_chart_percentage) ) {
			echo '<div class="pixova_lite_chart_4 '.$pixova_lite_chart_size.'">';
				echo '<div class="mt-chart" data-trackColor="'.esc_html( $pixova_lite_section_4_chart_track_color ).'" data-barColor="'.esc_html( $pixova_lite_section_4_chart_bar_color ).'" data-lineWidth="10" data-percent="'.esc_html( $pixova_lite_section_4_chart_percentage ).'">';
					echo'<div class="mt-pie-chart-custom-text">';
						echo esc_html( $pixova_lite_section_4_chart_percentage ).'%';
	    			echo'</div><!--/.mt-pie-chart-custom-text-->';
	        	echo '</div><!--/.mt-chart-->';
	        	if( isset( $pixova_lite_section_4_chart_heading ) ) {
		        	echo '<h4 class="mt-heading mt-heading-single-line text-center">';
		        		echo esc_html( $pixova_lite_section_4_chart_heading );
		        	echo '</h4><!--/.mt-heading-->';
	        	}
	        echo '</div><!--/.col-md-->';
        }
echo '</div><!--/.mt-pie-chart-wrapper-->';

        echo '<div class="clearfix"></div>';
		echo '</div><!--/.row-->';

	echo '</div><!--/.container-->';
echo '</section><!--/section-->';
