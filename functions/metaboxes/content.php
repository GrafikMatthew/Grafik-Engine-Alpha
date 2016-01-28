<?php

	function Grafik_MetaContent_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(

			'grafik-meta-content-nosystem' => (int)get_post_meta( $entry->ID, 'grafik-meta-content-nosystem', true ),
			'grafik-meta-content-top' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-content-top', true ) ) ) ),
			'grafik-meta-content-right' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-content-right', true ) ) ) ),
			'grafik-meta-content-bottom' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-content-bottom', true ) ) ) ),
			'grafik-meta-content-left' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-content-left', true ) ) ) )

		);

		// Output Meta Controls...
		echo
		'<div class="grafik-metabox">'.
			wp_nonce_field('grafik-nonce-metacontent', 'grafik-nonce-metacontent', true, false).
			'<table>'.
				'<tr>'.
					'<td colspan="3">'.
						'<strong>Content Top:</strong>'.
						'<p><textarea name="grafik-meta-content-top">'.$PREFILL['grafik-meta-content-top'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td style="width:25%">'.
						'<strong>Content Left:</strong>'.
						'<p><textarea name="grafik-meta-content-left">'.$PREFILL['grafik-meta-content-left'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>System Output:</strong>'.
						'<p>The large text editor at the top of this screen will display it\'s contents here. If you wish for this content to not be seen, you can toggle it off using this checkbox.</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-content-nosystem" id="grafik-meta-content-nosystem"'.( $PREFILL['grafik-meta-content-nosystem'] == 1 ? ' checked="checked"' : null ).'/>'.
							'<label for="grafik-meta-content-nosystem">Do Not Use System Output</label>'.
						'</p>'.
					'</td>'.
					'<td style="width:25%">'.
						'<strong>Content Right:</strong>'.
						'<p><textarea name="grafik-meta-content-right">'.$PREFILL['grafik-meta-content-right'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td colspan="3">'.
						'<strong>Content Bottom:</strong>'.
						'<p><textarea name="grafik-meta-content-bottom">'.$PREFILL['grafik-meta-content-bottom'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
			'</table>'.
		'</div>';

	}

?>