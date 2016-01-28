<?php

	if(isset($_POST['grafik-post-footer-nonce']) && wp_verify_nonce($_POST['grafik-post-footer-nonce'], 'grafik-post-footer-nonce')) {
		update_option( 'grafik-post-footer-tl', sanitize_text_field( base64_encode( $_POST['grafik-post-footer-tl'] ) ) );
		update_option( 'grafik-post-footer-tr', sanitize_text_field( base64_encode( $_POST['grafik-post-footer-tr'] ) ) );
		update_option( 'grafik-post-footer-ml', sanitize_text_field( base64_encode( $_POST['grafik-post-footer-ml'] ) ) );
		update_option( 'grafik-post-footer-mr', sanitize_text_field( base64_encode( $_POST['grafik-post-footer-mr'] ) ) );
		update_option( 'grafik-post-footer-bl', sanitize_text_field( base64_encode( $_POST['grafik-post-footer-bl'] ) ) );
		update_option( 'grafik-post-footer-br', sanitize_text_field( base64_encode( $_POST['grafik-post-footer-br'] ) ) );
		update_option( 'grafik-post-footer-off', ( !empty( $_POST['grafik-post-footer-off'] ) && $_POST['grafik-post-footer-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-post-footer-tl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-footer-tl' ) ) ) ),
		'grafik-post-footer-tr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-footer-tr' ) ) ) ),
		'grafik-post-footer-ml' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-footer-ml' ) ) ) ),
		'grafik-post-footer-mr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-footer-mr' ) ) ) ),
		'grafik-post-footer-bl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-footer-bl' ) ) ) ),
		'grafik-post-footer-br' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-footer-br' ) ) ) ),
		'grafik-post-footer-off' => (int)get_option( 'grafik-post-footer-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-post-footer-nonce', 'grafik-post-footer-nonce', false, false).
	'<table>'.
		'<tr>'.
			'<td><p><strong>Top Left:</strong></p><p><textarea name="grafik-post-footer-tl">'.$PREFILL['grafik-post-footer-tl'].'</textarea></p></td>'.
			'<td><p><strong>Top Right:</strong></p><p><textarea name="grafik-post-footer-tr">'.$PREFILL['grafik-post-footer-tr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Middle Left:</strong></p><p><textarea name="grafik-post-footer-ml">'.$PREFILL['grafik-post-footer-ml'].'</textarea></p></td>'.
			'<td><p><strong>Middle Right:</strong></p><p><textarea name="grafik-post-footer-mr">'.$PREFILL['grafik-post-footer-mr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Bottom Left:</strong></p><p><textarea name="grafik-post-footer-bl">'.$PREFILL['grafik-post-footer-bl'].'</textarea></p></td>'.
			'<td><p><strong>Bottom Right:</strong></p><p><textarea name="grafik-post-footer-br">'.$PREFILL['grafik-post-footer-br'].'</textarea></p></td>'.
		'</tr>'.
	'</table>'.
	'<p><input type="checkbox" name="grafik-post-footer-off"'.($PREFILL['grafik-post-footer-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable the Post Footer</p>';

?>