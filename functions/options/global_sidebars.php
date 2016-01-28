<?php

	if(isset($_POST['grafik-global-sidebars-nonce']) && wp_verify_nonce($_POST['grafik-global-sidebars-nonce'], 'grafik-global-sidebars-nonce')) {
		update_option( 'grafik-global-sidebars', $_POST['grafik-global-sidebars'] );
	}
	$PREFILL = array(
		'grafik-global-sidebars' => get_option( 'grafik-global-sidebars' )
	);

	$sidebar_options = '<option value="">Disabled</option>';
	$SIDEBARS = json_decode( get_option( 'grafik_sidebars' ), true );
	foreach( $SIDEBARS as $key => $val ) {
		$sidebar_options .= '<option value="'.$key.'"'.( $PREFILL['grafik-global-sidebars'] == $key ? ' selected="selected"' : null ).'>'.$val['name'].'</option>';
	}

	$HTML_display .=
	wp_nonce_field('grafik-global-sidebars-nonce', 'grafik-global-sidebars-nonce', false, false).
	'<select name="grafik-global-sidebars">'.$sidebar_options.'</select>';

?>