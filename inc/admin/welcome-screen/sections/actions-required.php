<?php
/**
 * Actions required
 */
?>

<div id="actions_required" class="high-star-tab-pane">

    <h1><?php esc_html_e( 'Actions recommend to make this theme look like in the demo.' ,'high-star' ); ?></h1>

    <!-- NEWS -->
    <hr />

	<?php
	global $pixova_lite_required_actions;

	if( !empty($pixova_lite_required_actions) ):

		/* pixova_show_required_actions is an array of true/false for each required action that was dismissed */
		$pixova_show_required_actions = get_option("pixova_show_required_actions");

		foreach( $pixova_lite_required_actions as $pixova_required_action_key => $pixova_required_action_value ):
			if(@$pixova_show_required_actions[$pixova_required_action_value['id']] === false) continue;
			if(@$pixova_required_action_value['check']) continue;
			?>
			<div class="pixova-action-required-box">
				<span class="dashicons dashicons-no-alt pixova-dismiss-required-action" id="<?php echo $pixova_required_action_value['id']; ?>"></span>
				<h4><?php echo $pixova_required_action_key + 1; ?>. <?php if( !empty($pixova_required_action_value['title']) ): echo $pixova_required_action_value['title']; endif; ?></h4>
				<p><?php if( !empty($pixova_required_action_value['description']) ): echo $pixova_required_action_value['description']; endif; ?></p>
				<?php
					if( !empty($pixova_required_action_value['plugin_slug']) ):
						?><p><a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='.$pixova_required_action_value['plugin_slug'] ), 'install-plugin_'.$pixova_required_action_value['plugin_slug'] ) ); ?>" class="button button-primary"><?php if( !empty($pixova_required_action_value['title']) ): echo $pixova_required_action_value['title']; endif; ?></a></p><?php
					endif;
				?>

				<hr />
			</div>
			<?php
		endforeach;
	endif;

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

	if( $nr_actions_required == 0 ):
		echo '<p>'.__( 'Hooray! There are no required actions for you right now.','high-star' ).'</p>';
	endif;
	?>

</div>
