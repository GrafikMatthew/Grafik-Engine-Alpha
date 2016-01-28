<?php

	function Grafik_MetaHeader_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(
			'grafik-meta-header-noglobal' => (int)get_post_meta( $entry->ID, 'grafik-meta-header-noglobal', true),
			'grafik-meta-header-notype' => (int)get_post_meta( $entry->ID, 'grafik-meta-header-notype', true),
			'grafik-meta-header-tl' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-header-tl', true ) ) ) ),
			'grafik-meta-header-tr' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-header-tr', true ) ) ) ),
			'grafik-meta-header-ml' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-header-ml', true ) ) ) ),
			'grafik-meta-header-mr' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-header-mr', true ) ) ) ),
			'grafik-meta-header-bl' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-header-bl', true ) ) ) ),
			'grafik-meta-header-br' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-header-br', true ) ) ) )
		);

		// Output Meta Controls...
		echo
		'<div class="grafik-metabox">'.
			wp_nonce_field('grafik-nonce-metaheader', 'grafik-nonce-metaheader', true, false).
			'<table>'.
				'<tr>'.
					'<td colspan="2">'.
						'<p>By default, each post/page inherits the global and corresponding type header. If you would like this post/page to not inherit these assets, you can disable them here.</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-header-noglobal" id="grafik-meta-header-noglobal" '.($PREFILL['grafik-meta-header-noglobal'] == 1 ? 'checked="checked"' : null).'/>'.
							'<label for="grafik-meta-header-noglobal">Do Not Use Global Header</label>'.
						'</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-header-notype" id="grafik-meta-header-notype" '.($PREFILL['grafik-meta-header-notype'] == 1 ? 'checked="checked"' : null).'/>'.
							'<label for="grafik-meta-header-notype">Do Not Use Type Header</label>'.
						'</p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td>'.
						'<strong>Header Top Left:</strong>'.
						'<p><textarea name="grafik-meta-header-tl">'.$PREFILL['grafik-meta-header-tl'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>Header Top Right:</strong>'.
						'<p><textarea name="grafik-meta-header-tr">'.$PREFILL['grafik-meta-header-tr'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td>'.
						'<strong>Header Top Left:</strong>'.
						'<p><textarea name="grafik-meta-header-ml">'.$PREFILL['grafik-meta-header-ml'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>Header Top Right:</strong>'.
						'<p><textarea name="grafik-meta-header-mr">'.$PREFILL['grafik-meta-header-mr'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td>'.
						'<strong>Header Top Left:</strong>'.
						'<p><textarea name="grafik-meta-header-bl">'.$PREFILL['grafik-meta-header-bl'].'</textarea></p>'.
					'</td>'.
					'<td>'.
						'<strong>Header Top Right:</strong>'.
						'<p><textarea name="grafik-meta-header-br">'.$PREFILL['grafik-meta-header-br'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
			'</table>'.
		'</div>';

	}

?>