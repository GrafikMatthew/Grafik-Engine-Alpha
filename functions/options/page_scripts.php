<?php

	if( isset( $_POST['grafik-page-scripts-nonce'] ) && wp_verify_nonce( $_POST['grafik-page-scripts-nonce'], 'grafik-page-scripts-nonce' ) ) {
		update_option( 'grafik-page-headscripts', sanitize_text_field( base64_encode( $_POST['grafik-page-headscripts'] ) ) );
		update_option( 'grafik-page-headscripts-off', ( !empty( $_POST['grafik-page-headscripts-off'] ) && $_POST['grafik-page-headscripts-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-page-bodyscripts', sanitize_text_field( base64_encode( $_POST['grafik-page-bodyscripts'] ) ) );
		update_option( 'grafik-page-bodyscripts-off', ( !empty( $_POST['grafik-page-bodyscripts-off'] ) && $_POST['grafik-page-bodyscripts-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-page-headscripts' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-headscripts' ) ) ) ),
		'grafik-page-headscripts-off' => (int)get_option( 'grafik-page-headscripts-off' ),
		'grafik-page-bodyscripts' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-bodyscripts' ) ) ) ),
		'grafik-page-bodyscripts-off' => (int)get_option( 'grafik-page-bodyscripts-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-page-scripts-nonce', 'grafik-page-scripts-nonce', false, false).
	'<p><strong>Head Tag Scripts:</strong><br/><textarea name="grafik-page-headscripts">'.$PREFILL['grafik-page-headscripts'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-page-headscripts-off"'.( $PREFILL['grafik-page-headscripts-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable Page Head Tag Scripts</p>'.
	'<p><strong>Body Tag Scripts:</strong><br/><textarea name="grafik-page-bodyscripts">'.$PREFILL['grafik-page-bodyscripts'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-page-bodyscripts-off"'.( $PREFILL['grafik-page-bodyscripts-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable Page Body Tag Scripts</p>';

?>