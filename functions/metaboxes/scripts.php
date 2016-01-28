<?php

	function Grafik_MetaScripts_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(
			'grafik-meta-headscripts-noglobal' => (int)get_post_meta( $entry->ID, 'grafik-meta-headscripts-noglobal', true),
			'grafik-meta-headscripts-notype' => (int)get_post_meta( $entry->ID, 'grafik-meta-headscripts-notype', true),
			'grafik-meta-headscripts' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-headscripts', true ) ) ) ),
			'grafik-meta-bodyscripts-noglobal' => (int)get_post_meta( $entry->ID, 'grafik-meta-bodyscripts-noglobal', true),
			'grafik-meta-bodyscripts-notype' => (int)get_post_meta( $entry->ID, 'grafik-meta-bodyscripts-notype', true),
			'grafik-meta-bodyscripts' => stripslashes( esc_textarea( base64_decode( get_post_meta( $entry->ID, 'grafik-meta-bodyscripts', true ) ) ) )
		);

		// Output Meta Controls...
		echo
		'<div class="grafik-metabox">'.
			wp_nonce_field('grafik-nonce-metascripts', 'grafik-nonce-metascripts', true, false).
			'<table>'.
				'<td style="width:50%">'.
					'<strong>Head Scripts:</strong>'.
					'<p>Head scripts are scripts that exist inside the &lt;head&gt; tag. Some scripts require being placed here. By default, posts and pages inherit the global and corresponding type head scripts. If you wish to not use these assets for this post/page, you can disable them here.</p>'.
					'<p>'.
						'<input type="checkbox" name="grafik-meta-headscripts-noglobal" id="grafik-meta-headscripts-noglobal" '.($PREFILL['grafik-meta-headscripts-noglobal'] == 1 ? 'checked="checked"' : null).'/>'.
						'<label for="grafik-meta-headscripts-noglobal">Do Not Use Global Head Scripts</label>'.
					'</p>'.
					'<p>'.
						'<input type="checkbox" name="grafik-meta-headscripts-notype" id="grafik-meta-headscripts-notype" '.($PREFILL['grafik-meta-headscripts-notype'] == 1 ? 'checked="checked"' : null).'/>'.
						'<label for="grafik-meta-headscripts-notype">Do Not Use Type Head Scripts</label>'.
					'</p>'.
					'<p><textarea name="grafik-meta-headscripts">'.$PREFILL['grafik-meta-headscripts'].'</textarea></p>'.
				'</td>'.
				'<td style="width:50%">'.
					'<strong>Body Scripts:</strong>'.
					'<p>Body scripts are scripts that exist right before the &lt;/body&gt; tag. Some scripts require being placed here. By default, posts and pages inherit the global and corresponding type body scripts. If you wish to not use these assets for this post/page, you can disable them here.</p>'.
					'<p>'.
						'<input type="checkbox" name="grafik-meta-bodyscripts-noglobal" id="grafik-meta-bodyscripts-noglobal" '.($PREFILL['grafik-meta-bodyscripts-noglobal'] == 1 ? 'checked="checked"' : null).'/>'.
						'<label for="grafik-meta-bodyscripts-noglobal">Do Not Use Global Body Scripts</label>'.
					'</p>'.
					'<p>'.
						'<input type="checkbox" name="grafik-meta-bodyscripts-notype" id="grafik-meta-bodyscripts-notype" '.($PREFILL['grafik-meta-bodyscripts-notype'] == 1 ? 'checked="checked"' : null).'/>'.
						'<label for="grafik-meta-bodyscripts-notype">Do Not Use Type Body Scripts</label>'.
					'</p>'.
					'<p><textarea name="grafik-meta-bodyscripts">'.$PREFILL['grafik-meta-bodyscripts'].'</textarea></p>'.
				'</td>'.
			'</table>'.
		'</div>';

	}

?>