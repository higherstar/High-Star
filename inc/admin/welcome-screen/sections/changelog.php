<?php
/**
 * Changelog
 */

$pixova_lite = wp_get_theme( 'high-star' );

?>
<div class="high-star-tab-pane" id="changelog">

	<div class="pixova-tab-pane-center">
	
		<h1>high star <?php if( !empty($pixova_lite['Version']) ): ?> <sup id="high-star-theme-version"><?php echo esc_attr( $pixova_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$pixova_lite_changelog = $wp_filesystem->get_contents( get_template_directory().'/CHANGELOG.md' );
	$pixova_lite_changelog_lines = explode(PHP_EOL, $pixova_lite_changelog);
	foreach($pixova_lite_changelog_lines as $pixova_lite_changelog_line){
		if(substr( $pixova_lite_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($pixova_lite_changelog_line,3).'</h1>';
		} else {
			echo $pixova_lite_changelog_line,'<br/>';
		}
	}

	?>
	
</div>