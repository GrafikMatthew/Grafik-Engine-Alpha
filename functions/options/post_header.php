<?php

	if(isset($_POST['grafik-post-header-nonce']) && wp_verify_nonce($_POST['grafik-post-header-nonce'], 'grafik-post-header-nonce')) {
		update_option( 'grafik-post-header-tl', sanitize_text_field( base64_encode( $_POST['grafik-post-header-tl'] ) ) );
		update_option( 'grafik-post-header-tr', sanitize_text_field( base64_encode( $_POST['grafik-post-header-tr'] ) ) );
		update_option( 'grafik-post-header-ml', sanitize_text_field( base64_encode( $_POST['grafik-post-header-ml'] ) ) );
		update_option( 'grafik-post-header-mr', sanitize_text_field( base64_encode( $_POST['grafik-post-header-mr'] ) ) );
		update_option( 'grafik-post-header-bl', sanitize_text_field( base64_encode( $_POST['grafik-post-header-bl'] ) ) );
		update_option( 'grafik-post-header-br', sanitize_text_field( base64_encode( $_POST['grafik-post-header-br'] ) ) );
		update_option( 'grafik-post-header-off', ( !empty( $_POST['grafik-post-header-off'] ) && $_POST['grafik-post-header-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-post-header-tl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-header-tl' ) ) ) ),
		'grafik-post-header-tr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-header-tr' ) ) ) ),
		'grafik-post-header-ml' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-header-ml' ) ) ) ),
		'grafik-post-header-mr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-header-mr' ) ) ) ),
		'grafik-post-header-bl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-header-bl' ) ) ) ),
		'grafik-post-header-br' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-post-header-br' ) ) ) ),
		'grafik-post-header-off' => (int)get_option( 'grafik-post-header-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-post-header-nonce', 'grafik-post-header-nonce', false, false).
	'<table>'.
		'<tr>'.
			'<td><p><strong>Top Left:</strong></p><p><textarea name="grafik-post-header-tl">'.$PREFILL['grafik-post-header-tl'].'</textarea></p></td>'.
			'<td><p><strong>Top Right:</strong></p><p><textarea name="grafik-post-header-tr">'.$PREFILL['grafik-post-header-tr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Middle Left:</strong></p><p><textarea name="grafik-post-header-ml">'.$PREFILL['grafik-post-header-ml'].'</textarea></p></td>'.
			'<td><p><strong>Middle Right:</strong></p><p><textarea name="grafik-post-header-mr">'.$PREFILL['grafik-post-header-mr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Bottom Left:</strong></p><p><textarea name="grafik-post-header-bl">'.$PREFILL['grafik-post-header-bl'].'</textarea></p></td>'.
			'<td><p><strong>Bottom Right:</strong></p><p><textarea name="grafik-post-header-br">'.$PREFILL['grafik-post-header-br'].'</textarea></p></td>'.
		'</tr>'.
	'</table>'.
	'<p><input type="checkbox" name="grafik-post-header-off"'.($PREFILL['grafik-post-header-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable the Post Header</p>';

?>