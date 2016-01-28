<?php

	if(isset($_POST['grafik-global-scripts-nonce']) && wp_verify_nonce($_POST['grafik-global-scripts-nonce'], 'grafik-global-scripts-nonce')) {
		update_option( 'grafik-global-headscripts', sanitize_text_field( base64_encode( $_POST['grafik-global-headscripts'] ) ) );
		update_option( 'grafik-global-headscripts-off', ( !empty( $_POST['grafik-global-headscripts-off'] ) && $_POST['grafik-global-headscripts-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-headscripts-nopost', ( !empty( $_POST['grafik-global-headscripts-nopost'] ) && $_POST['grafik-global-headscripts-nopost'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-headscripts-nopage', ( !empty( $_POST['grafik-global-headscripts-nopage'] ) && $_POST['grafik-global-headscripts-nopage'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-bodyscripts', sanitize_text_field( base64_encode( $_POST['grafik-global-bodyscripts'] ) ) );
		update_option( 'grafik-global-bodyscripts-off', ( !empty( $_POST['grafik-global-bodyscripts-off'] ) && $_POST['grafik-global-bodyscripts-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-bodyscripts-nopost', ( !empty( $_POST['grafik-global-bodyscripts-nopost'] ) && $_POST['grafik-global-bodyscripts-nopost'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-bodyscripts-nopage', ( !empty( $_POST['grafik-global-bodyscripts-nopage'] ) && $_POST['grafik-global-bodyscripts-nopage'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-global-headscripts' => stripslashes( esc_textarea( base64_decode( get_option('grafik-global-headscripts') ) ) ),
		'grafik-global-headscripts-off' => (int)get_option( 'grafik-global-headscripts-off' ),
		'grafik-global-headscripts-nopost' => (int)get_option( 'grafik-global-headscripts-nopost' ),
		'grafik-global-headscripts-nopage' => (int)get_option( 'grafik-global-headscripts-nopage' ),
		'grafik-global-bodyscripts' => stripslashes( esc_textarea( base64_decode( get_option('grafik-global-bodyscripts') ) ) ),
		'grafik-global-bodyscripts-off' => (int)get_option( 'grafik-global-bodyscripts-off' ),
		'grafik-global-bodyscripts-nopost' => (int)get_option( 'grafik-global-bodyscripts-nopost' ),
		'grafik-global-bodyscripts-nopage' => (int)get_option( 'grafik-global-bodyscripts-nopage' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-global-scripts-nonce', 'grafik-global-scripts-nonce', false, false).
	'<p><strong>Head Tag Scripts:</strong><br/><textarea name="grafik-global-headscripts">'.$PREFILL['grafik-global-headscripts'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-global-headscripts-off"'.( $PREFILL['grafik-global-headscripts-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Global Head Tag Scripts</p>'.
	'<p><input type="checkbox" name="grafik-global-headscripts-nopost"'.( $PREFILL['grafik-global-headscripts-nopost'] == 1 ? ' checked="checked"' : '' ).'> Disable the Global Head Tag Scripts for All Posts</p>'.
	'<p><input type="checkbox" name="grafik-global-headscripts-nopage"'.( $PREFILL['grafik-global-headscripts-nopage'] == 1 ? ' checked="checked"' : '' ).'> Disable the Global Head Tag Scripts for All Pages</p>'.
	'<hr/>'.
	'<p><strong>Body Tag Scripts:</strong><br/><textarea name="grafik-global-bodyscripts">'.$PREFILL['grafik-global-bodyscripts'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-global-bodyscripts-off"'.( $PREFILL['grafik-global-bodyscripts-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Global Body Tag Scripts</p>'.
	'<p><input type="checkbox" name="grafik-global-bodyscripts-nopost"'.( $PREFILL['grafik-global-bodyscripts-nopost'] == 1 ? ' checked="checked"' : '' ).'> Disable the Global Body Tag Scripts for All Posts</p>'.
	'<p><input type="checkbox" name="grafik-global-bodyscripts-nopage"'.( $PREFILL['grafik-global-bodyscripts-nopage'] == 1 ? ' checked="checked"' : '' ).'> Disable the Global Body Tag Scripts for All Pages</p>';

?>