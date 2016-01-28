<?php

	if( isset( $_POST['grafik-post-scripts-nonce'] ) && wp_verify_nonce( $_POST['grafik-post-scripts-nonce'], 'grafik-post-scripts-nonce' ) ) {
		update_option( 'grafik-post-headscripts', sanitize_text_field( base64_encode( $_POST['grafik-post-headscripts'] ) ) );
		update_option( 'grafik-post-headscripts-off', ( !empty( $_POST['grafik-post-headscripts-off'] ) && $_POST['grafik-post-headscripts-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-post-bodyscripts', sanitize_text_field( base64_encode( $_POST['grafik-post-bodyscripts'] ) ) );
		update_option( 'grafik-post-bodyscripts-off', ( !empty( $_POST['grafik-post-bodyscripts-off'] ) && $_POST['grafik-post-bodyscripts-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-post-headscripts' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-headscripts' ) ) ) ),
		'grafik-post-headscripts-off' => (int)get_option( 'grafik-post-headscripts-off' ),
		'grafik-post-bodyscripts' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-bodyscripts' ) ) ) ),
		'grafik-post-bodyscripts-off' => (int)get_option( 'grafik-post-bodyscripts-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-post-scripts-nonce', 'grafik-post-scripts-nonce', false, false).
	'<p><strong>Head Tag Scripts:</strong><br/><textarea name="grafik-post-headscripts">'.$PREFILL['grafik-post-headscripts'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-post-headscripts-off"'.($PREFILL['grafik-post-headscripts-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable Post Head Tag Scripts</p>'.
	'<hr/>'.
	'<p><strong>Body Tag Scripts:</strong><br/><textarea name="grafik-post-bodyscripts">'.$PREFILL['grafik-post-bodyscripts'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-post-bodyscripts-off"'.($PREFILL['grafik-post-bodyscripts-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable Post Body Tag Scripts</p>';

?>