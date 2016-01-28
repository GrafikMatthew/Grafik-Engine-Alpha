<?php

	if(isset($_POST['grafik-page-footer-nonce']) && wp_verify_nonce($_POST['grafik-page-footer-nonce'], 'grafik-page-footer-nonce')) {
		update_option( 'grafik-page-footer-tl', sanitize_text_field( base64_encode( $_POST['grafik-page-footer-tl'] ) ) );
		update_option( 'grafik-page-footer-tr', sanitize_text_field( base64_encode( $_POST['grafik-page-footer-tr'] ) ) );
		update_option( 'grafik-page-footer-ml', sanitize_text_field( base64_encode( $_POST['grafik-page-footer-ml'] ) ) );
		update_option( 'grafik-page-footer-mr', sanitize_text_field( base64_encode( $_POST['grafik-page-footer-mr'] ) ) );
		update_option( 'grafik-page-footer-bl', sanitize_text_field( base64_encode( $_POST['grafik-page-footer-bl'] ) ) );
		update_option( 'grafik-page-footer-br', sanitize_text_field( base64_encode( $_POST['grafik-page-footer-br'] ) ) );
		update_option( 'grafik-page-footer-off', (!empty($_POST['grafik-page-footer-off']) && $_POST['grafik-page-footer-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-page-footer-tl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-footer-tl' ) ) ) ),
		'grafik-page-footer-tr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-footer-tr' ) ) ) ),
		'grafik-page-footer-ml' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-footer-ml' ) ) ) ),
		'grafik-page-footer-mr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-footer-mr' ) ) ) ),
		'grafik-page-footer-bl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-footer-bl' ) ) ) ),
		'grafik-page-footer-br' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-footer-br' ) ) ) ),
		'grafik-page-footer-off' => (int)get_option( 'grafik-page-footer-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-page-footer-nonce', 'grafik-page-footer-nonce', false, false).
	'<table>'.
		'<tr>'.
			'<td><p><strong>Top Left:</strong></p><p><textarea name="grafik-page-footer-tl">'.$PREFILL['grafik-page-footer-tl'].'</textarea></p></td>'.
			'<td><p><strong>Top Right:</strong></p><p><textarea name="grafik-page-footer-tr">'.$PREFILL['grafik-page-footer-tr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Middle Left:</strong></p><p><textarea name="grafik-page-footer-ml">'.$PREFILL['grafik-page-footer-ml'].'</textarea></p></td>'.
			'<td><p><strong>Middle Right:</strong></p><p><textarea name="grafik-page-footer-mr">'.$PREFILL['grafik-page-footer-mr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Bottom Left:</strong></p><p><textarea name="grafik-page-footer-bl">'.$PREFILL['grafik-page-footer-bl'].'</textarea></p></td>'.
			'<td><p><strong>Bottom Right:</strong></p><p><textarea name="grafik-page-footer-br">'.$PREFILL['grafik-page-footer-br'].'</textarea></p></td>'.
		'</tr>'.
	'</table>'.
	'<p><input type="checkbox" name="grafik-page-footer-off"'.($PREFILL['grafik-page-footer-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable the Page Footer</p>';

?>