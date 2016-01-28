<?php

	// Disable Direct Access...
	if(!$INCLUDE_SIDEBAR) die('Nope.');

	// Form Submitted...
	$SubmitError = false;
	if( isset( $_POST['create-sidebar'] ) && wp_verify_nonce( $_POST['create-sidebar'], 'create-sidebar' ) ) {
		$new_key = sanitize_title( $_POST['sidebar_name'] );
		$new_sidebar = array(
			'name' => sanitize_text_field( $_POST['sidebar_name'] ),
			'left' => array(
				'use' => ( $_POST['sidebar_leftsize'] == '0' ? 0 : 1 ),
				'size' => sanitize_text_field( $_POST['sidebar_leftsize'] ),
				'content' => base64_encode( $_POST['sidebar_leftcontent'] )
			),
			'right' => array(
				'use' => ( $_POST['sidebar_rightsize'] == '0' ? 0 : 1 ),
				'size' => sanitize_text_field( $_POST['sidebar_rightsize'] ),
				'content' => base64_encode( $_POST['sidebar_rightcontent'] )
			),
			'class' => sanitize_text_field( $_POST['sidebar_class'] ),
			'id' => sanitize_text_field( $_POST['sidebar_id'] )
		);
		if( array_key_exists( $new_key, $SIDEBARS ) ) {
			$SubmitError = true;
		} else {
			$SIDEBARS[$new_key] = $new_sidebar;
			update_option( 'grafik_sidebars', json_encode( $SIDEBARS ) );
		}
	}

	// Display Creation Form...
	$HTML .=
	'<form method="POST">'.
		wp_nonce_field( 'create-sidebar', 'create-sidebar', true, false ).
		'<h2>Create Sidebar</h2>'.
		'<table>'.
			'<tr>'.
				'<th><label for="sidebar_name">Sidebar Name:</label></th>'.
				'<td colspan="2"><input id="sidebar_name" name="sidebar_name" type="text"'.( $SubmitError ? ' value="'.$_POST['sidebar_name'].'"' : null ).' /></td>'.
			'</tr>'.



			'<tr><td colspan="3"><hr/></td></tr>'.
			'<tr>'.
				'<th rowspan="2"><label>Left Sidebar:</label></th>'.
				'<td style="width:200px;"><label for="sidebar_leftsize">Column Width:</label></td>'.
				'<td>'.
					'<select id="sidebar_leftsize" name="sidebar_leftsize">'.
						'<option value="0"'.( $SubmitError && $_POST['sidebar_leftsize'] == '0' ? ' checked="checked"' : null ).'>Disabled</option>'.
						'<option value="10%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '10%' ? ' checked="checked"' : null ).'>10%</option>'.
						'<option value="15%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '15%' ? ' checked="checked"' : null ).'>15%</option>'.
						'<option value="20%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '20%' ? ' checked="checked"' : null ).'>20%</option>'.
						'<option value="25%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '25%' ? ' checked="checked"' : null ).'>25%</option>'.
						'<option value="30%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '30%' ? ' checked="checked"' : null ).'>30%</option>'.
						'<option value="35%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '35%' ? ' checked="checked"' : null ).'>35%</option>'.
						'<option value="40%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '40%' ? ' checked="checked"' : null ).'>40%</option>'.
						'<option value="45%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '45%' ? ' checked="checked"' : null ).'>45%</option>'.
						'<option value="50%"'.( $SubmitError && $_POST['sidebar_leftsize'] == '50%' ? ' checked="checked"' : null ).'>50%</option>'.
					'</select>'.
				'</td>'.
			'</tr>'.
			'<tr>'.
				'<td style="width:200px;"><label for="sidebar_leftcontent">Content:</label></td>'.
				'<td>'.
					'<textarea id="sidebar_leftcontent" name="sidebar_leftcontent">'.
						( $SubmitError ? stripslashes( esc_textarea( $_POST['sidebar_leftcontent'] ) ) : null ).
					'</textarea>'.
				'</td>'.
			'</tr>'.



			'<tr><td colspan="3"><hr/></td></tr>'.
			'<tr>'.
				'<th rowspan="2"><label>Right Sidebar:</label></th>'.
				'<td style="width:200px;"><label for="sidebar_rightsize">Column Width:</label></td>'.
				'<td>'.
					'<select id="sidebar_rightsize" name="sidebar_rightsize">'.
						'<option value="0"'.( $SubmitError && $_POST['sidebar_rightsize'] == '0' ? ' checked="checked"' : null ).'>Disabled</option>'.
						'<option value="10%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '10%' ? ' checked="checked"' : null ).'>10%</option>'.
						'<option value="15%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '15%' ? ' checked="checked"' : null ).'>15%</option>'.
						'<option value="20%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '20%' ? ' checked="checked"' : null ).'>20%</option>'.
						'<option value="25%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '25%' ? ' checked="checked"' : null ).'>25%</option>'.
						'<option value="30%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '30%' ? ' checked="checked"' : null ).'>30%</option>'.
						'<option value="35%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '35%' ? ' checked="checked"' : null ).'>35%</option>'.
						'<option value="40%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '40%' ? ' checked="checked"' : null ).'>40%</option>'.
						'<option value="45%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '45%' ? ' checked="checked"' : null ).'>45%</option>'.
						'<option value="50%"'.( $SubmitError && $_POST['sidebar_rightsize'] == '50%' ? ' checked="checked"' : null ).'>50%</option>'.
					'</select>'.
				'</td>'.
			'</tr>'.
			'<tr>'.
				'<td style="width:200px;"><label for="sidebar_rightcontent">Content:</label></td>'.
				'<td>'.
					'<textarea id="sidebar_rightcontent" name="sidebar_rightcontent">'.( $SubmitError ? stripslashes( esc_textarea( $_POST['sidebar_rightcontent'] ) ) : null ).'</textarea>'.
				'</td>'.
			'</tr>'.



			'<tr><td colspan="3"><hr/></td></tr>'.
			'<tr>'.
				'<th><label for="sidebar_class">Custom Class Names:</label></th>'.
				'<td colspan="2"><input id="sidebar_class" name="sidebar_class" type="text"'.( $SubmitError ? ' value="'.stripslashes( esc_textarea( $_POST['sidebar_class'] ) ).'"' : null ).' /></td>'.
			'</tr>'.
			'<tr>'.
				'<th><label for="sidebar_id">Custom ID:</label></th>'.
				'<td colspan="2"><input id="sidebar_id" name="sidebar_id" type="text"'.( $SubmitError ? ' value="'.stripslashes( esc_textarea( $_POST['sidebar_id'] ) ).'"' : null ).' /></td>'.
			'</tr>'.
			'<tr><td colspan="3"><hr/></td></tr>'.
		'</table>'.
		'<button type="submit" class="button-primary">Create Sidebar</button>'.
		'<a href="#" style="margin-left:10px;text-decoration:none;">Cancel</a>'.
	'</form>';

?>