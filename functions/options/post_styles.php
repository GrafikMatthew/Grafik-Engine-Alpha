<?php

	if(isset($_POST['grafik-post-styles-nonce']) && wp_verify_nonce($_POST['grafik-post-styles-nonce'], 'grafik-post-styles-nonce')) {
		update_option( 'grafik-post-styles', sanitize_text_field( base64_encode( $_POST['grafik-post-styles'] ) ) );
		update_option( 'grafik-post-styles-noresponsive', ( !empty( $_POST['grafik-post-styles-noresponsive'] ) && $_POST['grafik-post-styles-noresponsive'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-post-styles-off', ( !empty( $_POST['grafik-post-styles-off'] ) && $_POST['grafik-post-styles-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-post-styles' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-styles' ) ) ) ),
		'grafik-post-styles-noresponsive' => (int)get_option( 'grafik-post-styles-noresponsive' ),
		'grafik-post-styles-off' => (int)get_option( 'grafik-post-styles-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-post-styles-nonce', 'grafik-post-styles-nonce', false, false).
	'<p><strong>Stylesheet:</strong><br/><textarea name="grafik-post-styles">'.$PREFILL['grafik-post-styles'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-post-styles-noresponsive"'.($PREFILL['grafik-post-styles-noresponsive'] == 1 ? ' checked="checked"' : '').'> Disable the Responsive Layout for All Posts</p>'.
	'<p><input type="checkbox" name="grafik-post-styles-off"'.($PREFILL['grafik-post-styles-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable the Post Stylesheet</p>';

?>