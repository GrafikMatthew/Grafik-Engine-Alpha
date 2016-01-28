<?php

	if(isset($_POST['grafik-global-footer-nonce']) && wp_verify_nonce($_POST['grafik-global-footer-nonce'], 'grafik-global-footer-nonce')) {
		update_option( 'grafik-global-footer-tl', sanitize_text_field( base64_encode( $_POST['grafik-global-footer-tl'] ) ) );
		update_option( 'grafik-global-footer-tr', sanitize_text_field( base64_encode( $_POST['grafik-global-footer-tr'] ) ) );
		update_option( 'grafik-global-footer-ml', sanitize_text_field( base64_encode( $_POST['grafik-global-footer-ml'] ) ) );
		update_option( 'grafik-global-footer-mr', sanitize_text_field( base64_encode( $_POST['grafik-global-footer-mr'] ) ) );
		update_option( 'grafik-global-footer-bl', sanitize_text_field( base64_encode( $_POST['grafik-global-footer-bl'] ) ) );
		update_option( 'grafik-global-footer-br', sanitize_text_field( base64_encode( $_POST['grafik-global-footer-br'] ) ) );
		update_option( 'grafik-global-footer-off', ( !empty( $_POST['grafik-global-footer-off'] ) && $_POST['grafik-global-footer-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-footer-nopost', ( !empty( $_POST['grafik-global-footer-nopost'] ) && $_POST['grafik-global-footer-nopost'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-footer-nopage', ( !empty( $_POST['grafik-global-footer-nopage'] ) && $_POST['grafik-global-footer-nopage'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-global-footer-tl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-footer-tl' ) ) ) ),
		'grafik-global-footer-tr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-footer-tr' ) ) ) ),
		'grafik-global-footer-ml' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-footer-ml' ) ) ) ),
		'grafik-global-footer-mr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-footer-mr' ) ) ) ),
		'grafik-global-footer-bl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-footer-bl' ) ) ) ),
		'grafik-global-footer-br' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-footer-br' ) ) ) ),
		'grafik-global-footer-off' => (int)get_option( 'grafik-global-footer-off' ),
		'grafik-global-footer-nopost' => (int)get_option( 'grafik-global-footer-nopost' ),
		'grafik-global-footer-nopage' => (int)get_option( 'grafik-global-footer-nopage' )
	);
	$HTML_display .=
	wp_nonce_field('grafik-global-footer-nonce', 'grafik-global-footer-nonce', false, false).
	'<table>'.
		'<tr>'.
			'<td><p><strong>Top Left:</strong></p><p><textarea name="grafik-global-footer-tl">'.$PREFILL['grafik-global-footer-tl'].'</textarea></p></td>'.
			'<td><p><strong>Top Right:</strong></p><p><textarea name="grafik-global-footer-tr">'.$PREFILL['grafik-global-footer-tr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Middle Left:</strong></p><p><textarea name="grafik-global-footer-ml">'.$PREFILL['grafik-global-footer-ml'].'</textarea></p></td>'.
			'<td><p><strong>Middle Right:</strong></p><p><textarea name="grafik-global-footer-mr">'.$PREFILL['grafik-global-footer-mr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Bottom Left:</strong></p><p><textarea name="grafik-global-footer-bl">'.$PREFILL['grafik-global-footer-bl'].'</textarea></p></td>'.
			'<td><p><strong>Bottom Right:</strong></p><p><textarea name="grafik-global-footer-br">'.$PREFILL['grafik-global-footer-br'].'</textarea></p></td>'.
		'</tr>'.
	'</table>'.
	'<p><input type="checkbox" name="grafik-global-footer-off"'.( $PREFILL['grafik-global-footer-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Global Footer</p>'.
	'<p><input type="checkbox" name="grafik-global-footer-nopost"'.($PREFILL['grafik-global-footer-nopost'] == 1 ? ' checked="checked"' : '').'> Disable the Global Footer for All Posts</p>'.
	'<p><input type="checkbox" name="grafik-global-footer-nopage"'.($PREFILL['grafik-global-footer-nopage'] == 1 ? ' checked="checked"' : '').'> Disable the Global Footer for All Pages</p>';

?>