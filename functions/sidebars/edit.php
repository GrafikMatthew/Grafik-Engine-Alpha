<?php

	// Disable Direct Access...
	if(!$INCLUDE_SIDEBAR) die('Nope.');

	// Valid Sidebar?
	if( isset( $_GET['key'] ) && !array_key_exists( $_GET['key'], $SIDEBARS ) ) {

		// Error...
		$HTML .= '<p><strong>Not Found!</strong><br/>That sidebar could not be found!</p>';

	} else {

		$sidebar_key = $_GET['key'];

		// Check Form Submit...
		$SubmitError = false;
		if( isset( $_POST['edit-sidebar'] ) && wp_verify_nonce( $_POST['edit-sidebar'], 'edit-sidebar' ) ) {
			
			$sidebar_data = array(
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
			if( array_key_exists( $sidebar_key, $SIDEBARS ) ) {
				$SIDEBARS[$sidebar_key] = $sidebar_data;
				update_option( 'grafik_sidebars', json_encode( $SIDEBARS ) );
			} else {
				$SubmitError = true;
			}
		}

		// Sidebar Editor...
		$HTML .=
		'<form method="POST">'.
			wp_nonce_field( 'edit-sidebar', 'edit-sidebar', true, false ).
			'<h2>Edit Sidebar</h2>'.
			'<table>'.
				'<tr>'.
					'<th><label for="sidebar_name">Sidebar Name:</label></th>'.
					'<td colspan="2"><input id="sidebar_name" name="sidebar_name" type="text" value="'.( $SubmitError ? $_POST['sidebar_name'] : $SIDEBARS[$sidebar_key]['name'] ).'" /></td>'.
				'</tr>'.



				'<tr><td colspan="3"><hr/></td></tr>'.
				'<tr>'.
					'<th rowspan="2"><label>Left Sidebar:</label></th>'.
					'<td style="width: 200px;"><label for="sidebar_leftsize">Column width:</label></td>'.
					'<td>'.
						'<select id="sidebar_leftsize" name="sidebar_leftsize">'.
							'<option value="0"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '0' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '0' ? ' selected="selected"' : null ) ).'>Disabled</option>'.
							'<option value="10%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '10%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '10%' ? ' selected="selected"' : null ) ).'>Width 10%</option>'.
							'<option value="15%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '15%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '15%' ? ' selected="selected"' : null ) ).'>Width 15%</option>'.
							'<option value="20%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '20%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '20%' ? ' selected="selected"' : null ) ).'>Width 20%</option>'.
							'<option value="25%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '25%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '25%' ? ' selected="selected"' : null ) ).'>Width 25%</option>'.
							'<option value="30%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '30%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '30%' ? ' selected="selected"' : null ) ).'>Width 30%</option>'.
							'<option value="35%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '35%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '35%' ? ' selected="selected"' : null ) ).'>Width 35%</option>'.
							'<option value="40%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '40%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '40%' ? ' selected="selected"' : null ) ).'>Width 40%</option>'.
							'<option value="45%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '45%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '45%' ? ' selected="selected"' : null ) ).'>Width 45%</option>'.
							'<option value="50%"'.( $SubmitError ? ( $_POST['sidebar_leftsize'] == '50%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['left']['size'] == '50%' ? ' selected="selected"' : null ) ).'>Width 50%</option>'.
						'</select>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td style="width: 200px;"><label for="sidebar_leftcontent">Content:</label></td>'.
					'<td>'.
						'<textarea id="sidebar_leftcontent" name="sidebar_leftcontent">'.
							stripslashes( esc_textarea( $SubmitError ? $_POST['sidebar_leftcontent'] : base64_decode( $SIDEBARS[$sidebar_key]['left']['content'] ) ) ).
						'</textarea>'.
					'</td>'.
				'</tr>'.



				'<tr><td colspan="3"><hr/></td></tr>'.
				'<tr>'.
					'<th rowspan="2"><label>Right Sidebar:</label></th>'.
					'<td style="width: 200px;"><label for="sidebar_rightsize">Column width:</label></td>'.
					'<td>'.
						'<select id="sidebar_rightsize" name="sidebar_rightsize">'.
							'<option value="0"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '0' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '0' ?  ' selected="selected"' : null ) ).'>Disabled</option>'.
							'<option value="10%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '10%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '10%' ?  ' selected="selected"' : null ) ).'>Width 10%</option>'.
							'<option value="15%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '15%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '15%' ?  ' selected="selected"' : null ) ).'>Width 15%</option>'.
							'<option value="20%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '20%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '20%' ?  ' selected="selected"' : null ) ).'>Width 20%</option>'.
							'<option value="25%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '25%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '25%' ?  ' selected="selected"' : null ) ).'>Width 25%</option>'.
							'<option value="30%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '30%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '30%' ?  ' selected="selected"' : null ) ).'>Width 30%</option>'.
							'<option value="35%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '35%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '35%' ?  ' selected="selected"' : null ) ).'>Width 35%</option>'.
							'<option value="40%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '40%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '40%' ?  ' selected="selected"' : null ) ).'>Width 40%</option>'.
							'<option value="45%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '45%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '45%' ?  ' selected="selected"' : null ) ).'>Width 45%</option>'.
							'<option value="50%"'.( $SubmitError ? ( $_POST['sidebar_rightsize'] == '50%' ? ' selected="selected"' : null ) : ( $SIDEBARS[$sidebar_key]['right']['size'] == '50%' ?  ' selected="selected"' : null ) ).'>Width 50%</option>'.
						'</select>'.
					'</td>'.
				'</tr>'.
				'<tr>'.
					'<td style="width: 200px;"><label for="sidebar_rightcontent">Content:</label></td>'.
					'<td>'.
						'<textarea id="sidebar_rightcontent" name="sidebar_rightcontent">'.
							stripslashes( esc_textarea( $SubmitError ? $_POST['sidebar_rightcontent'] : base64_decode( $SIDEBARS[$sidebar_key]['right']['content'] ) ) ).
						'</textarea>'.
					'</td>'.
				'</tr>'.



				'<tr><td colspan="3"><hr/></td></tr>'.
				'<tr>'.
					'<th><label for="sidebar_class">Custom Class Names:</label></th>'.
					'<td colspan="2"><input id="sidebar_class" name="sidebar_class" type="text" value="'.stripslashes( esc_textarea( $SubmitError ? $_POST['sidebar_class'] : $SIDEBARS[$sidebar_key]['class'] ) ).'" /></td>'.
				'</tr>'.
				'<tr>'.
					'<th><label for="sidebar_id">Custom ID:</label></th>'.
					'<td colspan="2"><input id="sidebar_id" name="sidebar_id" type="text" value="'.stripslashes( esc_textarea( $SubmitError ? $_POST['sidebar_id'] : $SIDEBARS[$sidebar_key]['id'] ) ).'" /></td>'.
				'</tr>'.



				'<tr><td colspan="3"><hr/></td></tr>'.
			'</table>'.
			'<button type="submit" class="button-primary">Save Changes</button>'.
			'<a href="'.$LinkRoot.'" style="margin-left:10px;text-decoration:none;">Cancel</a>'.
		'</form>';

	}

?>