<?php

if ( !current_user_can( 'edit_theme_options' ) ) { 

	$pixova_lite_section__title = get_theme_mod('pixova_lite_contact_section_title' );
	$pixova_lite_section__sub_title = get_theme_mod('pixova_lite_contact_section_sub_title' );

	// section args
	$pixova_lite_contact_section_address = get_theme_mod('pixova_lite_address' );
	$pixova_lite_contact_section_phone = get_theme_mod('pixova_lite_phone' );
	$pixova_lite_contact_section_email = get_theme_mod('pixova_lite_email' );
	$pixova_lite_contact_cf7_form = get_theme_mod('pixova_lite_contact_section_cf7' );
	$pixova_lite_contact_section_type = get_theme_mod( 'pixova_lite_contact_section_type', 'contact-form-7' );

}else{

	$pixova_lite_section__title = get_theme_mod('pixova_lite_contact_section_title', __('Contact us', 'high-star') );
	$pixova_lite_section__sub_title = get_theme_mod('pixova_lite_contact_section_sub_title', __('And we\'ll reply in no time', 'high-star') );

	// section args
	$pixova_lite_contact_section_address = get_theme_mod('pixova_lite_address', __('Street 221B Baker Street, London, UK', 'high-star') );
	$pixova_lite_contact_section_phone = get_theme_mod('pixova_lite_phone', '+444 974 525');
	$pixova_lite_contact_section_email = get_theme_mod('pixova_lite_email', 'office@machothemes.com');
	$pixova_lite_contact_cf7_form = get_theme_mod('pixova_lite_contact_section_cf7', '');
	$pixova_lite_contact_section_type = get_theme_mod( 'pixova_lite_contact_section_type', 'contact-form-7' );

}




echo '<section class="has-padding" id="contact">';
	echo '<div class="container">';
		echo '<div class="row">';
			echo '<div class="text-center section-heading">';
				echo '<h2 class="light-section-heading">';
					echo esc_html( $pixova_lite_section__title );
				echo '</h2><!--/.section-heading.light-section-heading-->';
					echo '<div class="section-sub-heading">'.esc_html( $pixova_lite_section__sub_title ).'</div>';
			echo '</div><!--/.text-center-->';
		echo '</div><!--/.row-->';

		echo '<div class="row">';

		echo '<div class="col-md-3">';
			echo '<div class="mt-contact-info">';
				echo '<h3>'.__('Address', 'high-star').'</h3>';

					echo '<p class="contact-info-details address"><span>'.esc_html( $pixova_lite_contact_section_address ).'</span></p>';

				echo '<h3>'.__('Customer Support', 'high-star').'</h3>';

					echo '<p class="contact-info-details-phone">'.__('Phone: ', 'high-star'). '<span>'.esc_html( $pixova_lite_contact_section_phone ) .'</span>';
				echo '</p>';

					echo '<p class="contact-info-details-email">'. __('Email: ', 'high-star'). '<span>'. esc_html( $pixova_lite_contact_section_email ) . '</span>';
				echo '</p>';

				echo '</div><!--/.contact-info-details-->';
			echo '</div><!--/.mt-contact-info-->';
		//echo '</div><!--/.col-md-3-->';


		echo '<div class="col-md-9">';

		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		if( $pixova_lite_contact_section_type == 'contact-form-7' && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && $pixova_lite_contact_cf7_form != NULL && $pixova_lite_contact_cf7_form != 'default'  ) {
			$shortcode = '[contact-form-7 id="'. esc_html( $pixova_lite_contact_cf7_form ) .'"]';
			echo do_shortcode($shortcode);
		} elseif( $pixova_lite_contact_section_type == 'pirate-forms' ) {
			echo do_shortcode( '[pirate_forms]' );
		} ?>
<?php 

		echo '</div><!--/.row-->';
	echo '</div><!--/.col-md-9-->';
	echo '</div><!--/.container-->';
echo '</section>';
