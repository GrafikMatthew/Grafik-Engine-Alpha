<?php

	function Grafik_MetaStyles_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(
			'grafik-meta-styles-noglobal' => (int)get_post_meta( $entry->ID, 'grafik-meta-styles-noglobal', true),
			'grafik-meta-styles-notype' => (int)get_post_meta( $entry->ID, 'grafik-meta-styles-notype', true),
			'grafik-meta-styles' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-styles', true ) ) ) ),
		);

		// Output Meta Controls...
		echo
		'<div class="grafik-metabox">'.
			wp_nonce_field('grafik-nonce-metastyles', 'grafik-nonce-metastyles', true, false).
			'<table>'.
				'<tr>'.
					'<td>'.
						'<strong>Style Configuration:</strong>'.
						'<p>By default, each post/page inherits the global and corresponding type styles. If you would like this post/page to not inherit these assets, you can disable them here.</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-styles-noglobal" id="grafik-meta-styles-noglobal" '.($PREFILL['grafik-meta-styles-noglobal'] == 1 ? 'checked="checked"' : null).'/>'.
							'<label for="grafik-meta-styles-noglobal">Do Not Use Global Styles</label>'.
						'</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-styles-notype" id="grafik-meta-styles-notype" '.($PREFILL['grafik-meta-styles-notype'] == 1 ? 'checked="checked"' : null).'/>'.
							'<label for="grafik-meta-styles-notype">Do Not Use Type Styles</label>'.
						'</p>'.
						'<p><textarea name="grafik-meta-styles">'.$PREFILL['grafik-meta-styles'].'</textarea></p>'.
					'</td>'.
				'</tr>'.
			'</table>'.
		'</div>';

	}

?>