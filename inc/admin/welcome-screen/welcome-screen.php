<?php
/**
 * Welcome Screen Class
 */
class Pixova_Lite_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'pixova_lite_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'pixova_lite_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'pixova_lite_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'pixova_lite_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'pixova_lite_welcome', array( $this, 'pixova_lite_welcome_getting_started' ), 	    10 );
		add_action( 'pixova_lite_welcome', array( $this, 'pixova_lite_welcome_actions_required' ),        20 );
		//add_action( 'pixova_lite_welcome', array( $this, 'pixova_lite_welcome_child_themes' ), 		    30 );
		add_action( 'pixova_lite_welcome', array( $this, 'pixova_lite_welcome_github' ), 		            40 );
		add_action( 'pixova_lite_welcome', array( $this, 'pixova_lite_welcome_changelog' ), 				50 );
		add_action( 'pixova_lite_welcome', array( $this, 'pixova_lite_welcome_free_pro' ), 				60 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_pixova_lite_dismiss_required_action', array( $this, 'pixova_lite_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_pixova_lite_dismiss_required_action', array($this, 'pixova_lite_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_register_menu() {
		add_theme_page( 'About high star', 'About high star', 'activate_plugins', 'high-star-welcome', array( $this, 'pixova_lite_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function pixova_lite_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'pixova_lite_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing high star! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'high-star' ), '<a href="' . esc_url( admin_url( 'themes.php?page=high-star-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=high-star-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with high star', 'high-star' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function pixova_lite_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_high-star-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'high-star-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'high-star-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $pixova_lite_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('pixova_show_required_actions') ):
				$pixova_show_required_actions = get_option('pixova_show_required_actions');
			else:
				$pixova_show_required_actions = array();
			endif;

			if( !empty($pixova_lite_required_actions) ):
				foreach( $pixova_lite_required_actions as $pixova_required_action_value ):
					if(( !isset( $pixova_required_action_value['check'] ) || ( isset( $pixova_required_action_value['check'] ) && ( $pixova_required_action_value['check'] == false ) ) ) && ((isset($pixova_show_required_actions[$pixova_required_action_value['id']]) && ($pixova_show_required_actions[$pixova_required_action_value['id']] == true)) || !isset($pixova_show_required_actions[$pixova_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'high-star-welcome-screen-js', 'pixovaLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','high-star' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function pixova_lite_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'high-star-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'high-star-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $pixova_lite_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('pixova_show_required_actions') ):
			$pixova_show_required_actions = get_option('pixova_show_required_actions');
		else:
			$pixova_show_required_actions = array();
		endif;

		if( !empty($pixova_lite_required_actions) ):
			foreach( $pixova_lite_required_actions as $pixova_required_action_value ):
				if(( !isset( $pixova_required_action_value['check'] ) || ( isset( $pixova_required_action_value['check'] ) && ( $pixova_required_action_value['check'] == false ) ) ) && ((isset($pixova_show_required_actions[$pixova_required_action_value['id']]) && ($pixova_show_required_actions[$pixova_required_action_value['id']] == true)) || !isset($pixova_show_required_actions[$pixova_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'high-star-welcome-screen-customizer-js', 'pixovaLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=high-star-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','high-star'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function pixova_lite_dismiss_required_action_callback() {

		global $pixova_lite_required_actions;

		$pixova_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $pixova_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($pixova_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('pixova_show_required_actions') ):

				$pixova_show_required_actions = get_option('pixova_show_required_actions');

				$pixova_show_required_actions[$pixova_dismiss_id] = false;

				update_option( 'pixova_show_required_actions',$pixova_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$pixova_show_required_actions_new = array();

				if( !empty($pixova_lite_required_actions) ):

					foreach( $pixova_lite_required_actions as $pixova_required_action ):

						if( $pixova_required_action['id'] == $pixova_dismiss_id ):
							$pixova_show_required_actions_new[$pixova_required_action['id']] = false;
						else:
							$pixova_show_required_actions_new[$pixova_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'pixova_show_required_actions', $pixova_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="high-star-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','high-star'); ?></a></li>
			<li role="presentation" class="high-star-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions required','high-star'); ?></a></li>
			<?php /* ?>
				<li role="presentation"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child themes','high-star'); ?></a></li>
			<?php */ ?>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','high-star'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','high-star'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','high-star'); ?></a></li>
		</ul>

		<div class="high-star-tab-content">

			<?php
			/**
			 * @hooked pixova_lite_welcome_getting_started - 10
			 * @hooked pixova_lite_welcome_actions_required - 20
			 * @hooked pixova_lite_welcome_child_themes - 30
			 * @hooked pixova_lite_welcome_github - 40
			 * @hooked pixova_lite_welcome_changelog - 50
			 * @hooked pixova_lite_welcome_free_pro - 60
			 */
			do_action( 'pixova_lite_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}

	/**
	 * Child themes
	 * @since 1.8.2.4
	 */
	 /*
	public function pixova_lite_welcome_child_themes() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/child-themes.php' );
	}
	*/

	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}

	/**
	 * Free vs PRO
	 * @since 1.8.2.4
	 */
	public function pixova_lite_welcome_free_pro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/free_pro.php' );
	}
}

new Pixova_Lite_Welcome();
