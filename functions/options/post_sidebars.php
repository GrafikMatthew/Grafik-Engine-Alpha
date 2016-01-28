<?php

	if(isset($_POST['grafik-post-sidebars-nonce']) && wp_verify_nonce($_POST['grafik-post-sidebars-nonce'], 'grafik-post-sidebars-nonce')) {
		update_option( 'grafik-post-sidebars', $_POST['grafik-post-sidebars'] );
	}
	$PREFILL = array(
		'grafik-post-sidebars' => get_option( 'grafik-post-sidebars' )
	);

	$sidebar_options = '<option value="">Disabled</option>';
	$SIDEBARS = json_decode( get_option( 'grafik_sidebars' ), true );
	foreach( $SIDEBARS as $key => $val ) {
		$sidebar_options .= '<option value="'.$key.'"'.( $PREFILL['grafik-post-sidebars'] == $key ? ' selected="selected"' : null ).'>'.$val['name'].'</option>';
	}

	$HTML_display .=
	wp_nonce_field('grafik-post-sidebars-nonce', 'grafik-post-sidebars-nonce', false, false).
	'<select name="grafik-post-sidebars">'.$sidebar_options.'</select>';

?>