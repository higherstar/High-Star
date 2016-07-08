<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Pixova_Lite_HTML_Custom_Control' ) ) {
	class Pixova_Lite_HTML_Custom_Control extends WP_Customize_Control {

		// Whitelist content parameter
		public $content = '';

		/**
		 * Render the control's content.
		 *
		 * Allows the content to be overriden without having to rewrite the wrapper.
		 *
		 * @since   1.0.0
		 * @return  void
		 */
		public function render_content() {
			echo '<a class="review-link" href="http://www.machothemes.com/contact/" target="_blank">'.__( 'Get theme support' ,'high-star' ).'</a>
			<a class="doc-link" href="http://docs.machothemes.com/category/106-high-star" target="_blank">'.__( 'Theme Documentation' ,'high-star' ).'</a>';
		}
	}
}