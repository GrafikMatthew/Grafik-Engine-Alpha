<?php

	if(isset($_POST['grafik-page-styles-nonce']) && wp_verify_nonce($_POST['grafik-page-styles-nonce'], 'grafik-page-styles-nonce')) {
		update_option( 'grafik-page-styles', sanitize_text_field( base64_encode( $_POST['grafik-page-styles'] ) ) );
		update_option( 'grafik-page-styles-noresponsive', ( !empty( $_POST['grafik-page-styles-noresponsive'] ) && $_POST['grafik-page-styles-noresponsive'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-page-styles-off', ( !empty( $_POST['grafik-page-styles-off'] ) && $_POST['grafik-page-styles-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-page-styles' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-styles' ) ) ) ),
		'grafik-page-styles-noresponsive' => (int)get_option( 'grafik-page-styles-noresponsive' ),
		'grafik-page-styles-off' => (int)get_option( 'grafik-page-styles-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-page-styles-nonce', 'grafik-page-styles-nonce', false, false).
	'<p><strong>Stylesheet:</strong><br/><textarea name="grafik-page-styles">'.$PREFILL['grafik-page-styles'].'</textarea></p>'.
	'<p><input type="checkbox" name="grafik-page-styles-noresponsive"'.( $PREFILL['grafik-page-styles-noresponsive'] == 1 ? ' checked="checked"' : '' ).'> Disable the Responsive Layout for All Pages</p></td></tr>'.
	'<p><input type="checkbox" name="grafik-page-styles-off"'.( $PREFILL['grafik-page-styles-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Page Stylesheet</p>';

?>