<?php

	function Grafik_MetaSidebars_Callback( $entry ) {

		// Get Stored Meta Values...
		$PREFILL = array(
			'grafik-meta-sidebars-noglobal' => (int)get_post_meta( $entry->ID, 'grafik-meta-sidebars-noglobal', true ),
			'grafik-meta-sidebars-notype' => (int)get_post_meta( $entry->ID, 'grafik-meta-sidebars-notype', true ),
			'grafik-meta-sidebars' => get_post_meta( $entry->ID, 'grafik-meta-sidebars', true )
		);

		$SIDEBARS = json_decode( get_option( 'grafik_sidebars' ), true );
		$sidebar_options = '<option value="">Select Sidebars...</option>';
		if(empty($SIDEBARS)) {
			$sidebar_options .= '<option value="" disabled="disabled">No Sidebars Created</option>';
		} else {
			$sidebar_options .= '<option value="">None</option>';
			foreach( $SIDEBARS as $key => $val ) {
				$sidebar_options .=
				'<option value="'.$key.'"'.( $PREFILL['grafik-meta-sidebars'] == $key ? ' selected="selected"' : null ).'>'.
					$val['name'].
				'</option>';
			}
		}

		// Output Meta Controls...
		echo
		'<div class="grafik-metabox">'.
			wp_nonce_field('grafik-nonce-metasidebars', 'grafik-nonce-metasidebars', true, false).
			'<table>'.
				'<tr>'.
					'<td>'.
						'<strong>Sidebar Configuration:</strong>'.
						'<p>By default, each post/page inherits the global and corresponding type sidebars. If you would like this post/page to not inherit these assets, you can disable them here.</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-sidebars-noglobal" id="grafik-meta-sidebars-noglobal"'.( $PREFILL['grafik-meta-sidebars-noglobal'] == 1 ? ' checked="checked"' : null ).'/>'.
							'<label for="grafik-meta-sidebars-noglobal">Do Not Use Global Sidebars</label>'.
						'</p>'.
						'<p>'.
							'<input type="checkbox" name="grafik-meta-sidebars-notype" id="grafik-meta-sidebars-notype"'.( $PREFILL['grafik-meta-sidebars-notype'] == 1 ? ' checked="checked"' : null ).'/>'.
							'<label for="grafik-meta-sidebars-notype">Do Not Use Type Sidebars</label>'.
						'</p>'.
						'<p><select name="grafik-meta-sidebars">'.$sidebar_options.'</select></p>'.
					'</td>'.
				'</tr>'.
			'</table>'.
		'</div>';

	}

?>