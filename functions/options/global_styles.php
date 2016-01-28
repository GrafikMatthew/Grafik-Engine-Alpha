<?php

	if(isset($_POST['grafik-global-styles-nonce']) && wp_verify_nonce($_POST['grafik-global-styles-nonce'], 'grafik-global-styles-nonce')) {
		update_option( 'grafik-global-styles', sanitize_text_field( base64_encode( $_POST['grafik-global-styles'] ) ) );
		update_option( 'grafik-global-styles-noresponsive', ( !empty( $_POST['grafik-global-styles-noresponsive'] ) && $_POST['grafik-global-styles-noresponsive'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-styles-off', ( !empty( $_POST['grafik-global-styles-off'] ) && $_POST['grafik-global-styles-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-styles-nopost', ( !empty( $_POST['grafik-global-styles-nopost'] ) && $_POST['grafik-global-styles-nopost'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-styles-nopage', ( !empty( $_POST['grafik-global-styles-nopage'] ) && $_POST['grafik-global-styles-nopage'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-global-styles' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-styles' ) ) ) ),
		'grafik-global-styles-noresponsive' => (int)get_option( 'grafik-global-styles-noresponsive' ),
		'grafik-global-styles-off' => (int)get_option( 'grafik-global-styles-off' ),
		'grafik-global-styles-nopost' => (int)get_option( 'grafik-global-styles-nopost' ),
		'grafik-global-styles-nopage' => (int)get_option( 'grafik-global-styles-nopage' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-global-styles-nonce', 'grafik-global-styles-nonce', false, false).
	'<p><strong>Stylesheet:</strong><br/><textarea name="grafik-global-styles">'.$PREFILL['grafik-global-styles'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-global-styles-noresponsive"'.( $PREFILL['grafik-global-styles-noresponsive'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Responsive Layout</p>'.
	'<p><input type="checkbox" name="grafik-global-styles-off"'.( $PREFILL['grafik-global-styles-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Global Stylesheet</p>'.
	'<p><input type="checkbox" name="grafik-global-styles-nopost"'.( $PREFILL['grafik-global-styles-nopost'] == 1 ? ' checked="checked"' : '' ).'> Disable the Global Stylesheet for All Posts</p>'.
	'<p><input type="checkbox" name="grafik-global-styles-nopage"'.( $PREFILL['grafik-global-styles-nopage'] == 1 ? ' checked="checked"' : '' ).'> Disable the Global Stylesheet for All Pages</p>';

?>