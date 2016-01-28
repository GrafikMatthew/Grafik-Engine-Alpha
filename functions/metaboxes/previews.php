<?php

	function Grafik_MetaPreviews_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(
			'grafik-meta-preview-desktop' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-preview-desktop', true ) ) ) ),
			'grafik-meta-preview-tablet' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-preview-tablet', true ) ) ) ),
			'grafik-meta-preview-phone' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-preview-phone', true ) ) ) )
		);

		// Output Meta Controls...
		echo
		wp_nonce_field('grafik-nonce-metapreviews', 'grafik-nonce-metapreviews', true, false).
		'<table>'.
			'<tr>'.
				'<th><label for="grafik-meta-preview-desktop">Desktop:</label></th>'.
				'<td><input type="text" name="grafik-meta-preview-desktop" value="'.$PREFILL['grafik-meta-preview-desktop'].'" id="grafik-meta-preview-desktop" /></td>'.
			'</tr>'.
			'<tr>'.
				'<th><label for="grafik-meta-preview-tablet">Tablet:</label></th>'.
				'<td><input type="text" name="grafik-meta-preview-tablet" value="'.$PREFILL['grafik-meta-preview-tablet'].'" id="grafik-meta-preview-tablet" /></td>'.
			'</tr>'.
			'<tr>'.
				'<th><label for="grafik-meta-preview-phone">Phone:</label></th>'.
				'<td><input type="text" name="grafik-meta-preview-phone" value="'.$PREFILL['grafik-meta-preview-phone'].'" id="grafik-meta-preview-phone" /></td>'.
			'</tr>'.
		'</table>';

	}

?>