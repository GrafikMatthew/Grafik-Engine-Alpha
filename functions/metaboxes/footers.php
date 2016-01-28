<?php

	function Grafik_MetaFooter_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(
			'grafik-meta-footer-noglobal' => (int)get_post_meta( $entry->ID, 'grafik-meta-footer-noglobal', true),
			'grafik-meta-footer-notype' => (int)get_post_meta( $entry->ID, 'grafik-meta-footer-notype', true),
			'grafik-meta-footer-tl' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-footer-tl', true ) ) ) ),
			'grafik-meta-footer-tr' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-footer-tr', true ) ) ) ),
			'grafik-meta-footer-ml' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-footer-ml', true ) ) ) ),
			'grafik-meta-footer-mr' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-footer-mr', true ) ) ) ),
			'grafik-meta-footer-bl' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-footer-bl', true ) ) ) ),
			'grafik-meta-footer-br' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-footer-br', true ) ) ) )
		);

		// Output Meta Controls...
		echo
		'<div class="grafik-metabox">'.
			wp_nonce_field('grafik-nonce-metafooter', 'grafik-nonce-metafooter', true, false).
			'<table>'.
				'<tr>'.
					'<td colspan="2">'.
						'<p>By default, each post/page inherits the global and corresponding type footer. If you would like this post/page to not inherit these assets, you can disable them here.</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-footer-noglobal" id="grafik-meta-footer-noglobal" '.($PREFILL['grafik-meta-footer-noglobal'] == 1 ? 'checked="checked"' : null).'/>'.
							'<label for="grafik-meta-footer-noglobal">Do Not Use Global Footer</label>'.
						'</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-footer-notype" id="grafik-meta-footer-notype" '.($PREFILL['grafik-meta-footer-notype'] == 1 ? 'checked="checked"' : null).'/>'.
							'<label for="grafik-meta-footer-notype">Do Not Use Type Footer</label>'.
						'</p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td>'.
						'<strong>Footer Top Left:</strong>'.
						'<p><textarea name="grafik-meta-footer-tl">'.$PREFILL['grafik-meta-footer-tl'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>Footer Top Right:</strong>'.
						'<p><textarea name="grafik-meta-footer-tr">'.$PREFILL['grafik-meta-footer-tr'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td>'.
						'<strong>Footer Top Left:</strong>'.
						'<p><textarea name="grafik-meta-footer-ml">'.$PREFILL['grafik-meta-footer-ml'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>Footer Top Right:</strong>'.
						'<p><textarea name="grafik-meta-footer-mr">'.$PREFILL['grafik-meta-footer-mr'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td>'.
						'<strong>Footer Top Left:</strong>'.
						'<p><textarea name="grafik-meta-footer-bl">'.$PREFILL['grafik-meta-footer-bl'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>Footer Top Right:</strong>'.
						'<p><textarea name="grafik-meta-footer-br">'.$PREFILL['grafik-meta-footer-br'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
			'</table>'.
		'</div>';

	}

?>