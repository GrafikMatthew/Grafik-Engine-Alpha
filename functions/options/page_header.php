<?php

	if(isset($_POST['grafik-page-header-nonce']) && wp_verify_nonce($_POST['grafik-page-header-nonce'], 'grafik-page-header-nonce')) {
		update_option( 'grafik-page-header-tl', sanitize_text_field( base64_encode( $_POST['grafik-page-header-tl'] ) ) );
		update_option( 'grafik-page-header-tr', sanitize_text_field( base64_encode( $_POST['grafik-page-header-tr'] ) ) );
		update_option( 'grafik-page-header-ml', sanitize_text_field( base64_encode( $_POST['grafik-page-header-ml'] ) ) );
		update_option( 'grafik-page-header-mr', sanitize_text_field( base64_encode( $_POST['grafik-page-header-mr'] ) ) );
		update_option( 'grafik-page-header-bl', sanitize_text_field( base64_encode( $_POST['grafik-page-header-bl'] ) ) );
		update_option( 'grafik-page-header-br', sanitize_text_field( base64_encode( $_POST['grafik-page-header-br'] ) ) );
		update_option( 'grafik-page-header-off', (!empty($_POST['grafik-page-header-off']) && $_POST['grafik-page-header-off'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-page-header-tl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-header-tl' ) ) ) ),
		'grafik-page-header-tr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-header-tr' ) ) ) ),
		'grafik-page-header-ml' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-header-ml' ) ) ) ),
		'grafik-page-header-mr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-header-mr' ) ) ) ),
		'grafik-page-header-bl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-header-bl' ) ) ) ),
		'grafik-page-header-br' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-page-header-br' ) ) ) ),
		'grafik-page-header-off' => (int)get_option( 'grafik-page-header-off' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-page-header-nonce', 'grafik-page-header-nonce', false, false).
	'<table>'.
		'<tr>'.
			'<td><p><strong>Top Left:</strong></p><p><textarea name="grafik-page-header-tl">'.$PREFILL['grafik-page-header-tl'].'</textarea></p></td>'.
			'<td><p><strong>Top Right:</strong></p><p><textarea name="grafik-page-header-tr">'.$PREFILL['grafik-page-header-tr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Middle Left:</strong></p><p><textarea name="grafik-page-header-ml">'.$PREFILL['grafik-page-header-ml'].'</textarea></p></td>'.
			'<td><p><strong>Middle Right:</strong></p><p><textarea name="grafik-page-header-mr">'.$PREFILL['grafik-page-header-mr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Bottom Left:</strong></p><p><textarea name="grafik-page-header-bl">'.$PREFILL['grafik-page-header-bl'].'</textarea></p></td>'.
			'<td><p><strong>Bottom Right:</strong></p><p><textarea name="grafik-page-header-br">'.$PREFILL['grafik-page-header-br'].'</textarea></p></td>'.
		'</tr>'.
	'</table>'.
	'<p><input type="checkbox" name="grafik-page-header-off"'.($PREFILL['grafik-page-header-off'] == 1 ? ' checked="checked"' : '').'> Completely Disable the Page Header</p>';

?>