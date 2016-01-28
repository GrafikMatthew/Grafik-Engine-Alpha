<?php

	if(isset($_POST['grafik-page-sidebars-nonce']) && wp_verify_nonce($_POST['grafik-page-sidebars-nonce'], 'grafik-page-sidebars-nonce')) {
		update_option( 'grafik-page-sidebars', $_POST['grafik-page-sidebars'] );
	}
	$PREFILL = array(
		'grafik-page-sidebars' => get_option( 'grafik-page-sidebars' )
	);

	$sidebar_options = '<option value="">Disabled</option>';
	$SIDEBARS = json_decode( get_option( 'grafik_sidebars' ), true );
	foreach( $SIDEBARS as $key => $val ) {
		$sidebar_options .= '<option value="'.$key.'"'.( $PREFILL['grafik-page-sidebars'] == $key ? ' selected="selected"' : null ).'>'.$val['name'].'</option>';
	}

	$HTML_display .=
	wp_nonce_field('grafik-page-sidebars-nonce', 'grafik-page-sidebars-nonce', false, false).
	'<select name="grafik-page-sidebars">'.$sidebar_options.'</select>';

?>