<?php

	if(isset($_POST['grafik-global-header-nonce']) && wp_verify_nonce($_POST['grafik-global-header-nonce'], 'grafik-global-header-nonce')) {
		update_option( 'grafik-global-header-tl', sanitize_text_field( base64_encode( $_POST['grafik-global-header-tl'] ) ) );
		update_option( 'grafik-global-header-tr', sanitize_text_field( base64_encode( $_POST['grafik-global-header-tr'] ) ) );
		update_option( 'grafik-global-header-ml', sanitize_text_field( base64_encode( $_POST['grafik-global-header-ml'] ) ) );
		update_option( 'grafik-global-header-mr', sanitize_text_field( base64_encode( $_POST['grafik-global-header-mr'] ) ) );
		update_option( 'grafik-global-header-bl', sanitize_text_field( base64_encode( $_POST['grafik-global-header-bl'] ) ) );
		update_option( 'grafik-global-header-br', sanitize_text_field( base64_encode( $_POST['grafik-global-header-br'] ) ) );
		update_option( 'grafik-global-header-off', ( !empty( $_POST['grafik-global-header-off'] ) && $_POST['grafik-global-header-off'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-header-nopost', ( !empty( $_POST['grafik-global-header-nopost'] ) && $_POST['grafik-global-header-nopost'] == 'on' ? 1 : 0 ) );
		update_option( 'grafik-global-header-nopage', ( !empty( $_POST['grafik-global-header-nopage'] ) && $_POST['grafik-global-header-nopage'] == 'on' ? 1 : 0 ) );
	}
	$PREFILL = array(
		'grafik-global-header-tl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-header-tl' ) ) ) ),
		'grafik-global-header-tr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-header-tr' ) ) ) ),
		'grafik-global-header-ml' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-header-ml' ) ) ) ),
		'grafik-global-header-mr' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-header-mr' ) ) ) ),
		'grafik-global-header-bl' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-header-bl' ) ) ) ),
		'grafik-global-header-br' => stripslashes( esc_textarea( base64_decode( get_option( 'grafik-global-header-br' ) ) ) ),
		'grafik-global-header-off' => (int)get_option( 'grafik-global-header-off' ),
		'grafik-global-header-nopost' => (int)get_option( 'grafik-global-header-nopost' ),
		'grafik-global-header-nopage' => (int)get_option( 'grafik-global-header-nopage' )

	);
	$HTML_display .=
	wp_nonce_field('grafik-global-header-nonce', 'grafik-global-header-nonce', false, false).
	'<table>'.
		'<tr>'.
			'<td><p><strong>Top Left:</strong></p><p><textarea name="grafik-global-header-tl">'.$PREFILL['grafik-global-header-tl'].'</textarea></p></td>'.
			'<td><p><strong>Top Right:</strong></p><p><textarea name="grafik-global-header-tr">'.$PREFILL['grafik-global-header-tr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Middle Left:</strong></p><p><textarea name="grafik-global-header-ml">'.$PREFILL['grafik-global-header-ml'].'</textarea></p></td>'.
			'<td><p><strong>Middle Right:</strong></p><p><textarea name="grafik-global-header-mr">'.$PREFILL['grafik-global-header-mr'].'</textarea></p></td>'.
		'</tr>'.
		'<tr>'.
			'<td><p><strong>Bottom Left:</strong></p><p><textarea name="grafik-global-header-bl">'.$PREFILL['grafik-global-header-bl'].'</textarea></p></td>'.
			'<td><p><strong>Bottom Right:</strong></p><p><textarea name="grafik-global-header-br">'.$PREFILL['grafik-global-header-br'].'</textarea></p></td>'.
		'</tr>'.
	'</table>'.
	'<p><input type="checkbox" name="grafik-global-header-off"'.( $PREFILL['grafik-global-header-off'] == 1 ? ' checked="checked"' : '' ).'> Completely Disable the Global Header</p>'.
	'<p><input type="checkbox" name="grafik-global-header-nopost"'.($PREFILL['grafik-global-header-nopost'] == 1 ? ' checked="checked"' : '').'> Disable the Global Header for All Posts</p>'.
	'<p><input type="checkbox" name="grafik-global-header-nopage"'.($PREFILL['grafik-global-header-nopage'] == 1 ? ' checked="checked"' : '').'> Disable the Global Header for All Pages</p>';

?>