<?php

	// Disable Direct Access...
	if(!$INCLUDE_SIDEBAR) die('Nope.');

	// Valid Sidebar?
	if( isset( $_GET['key'] ) && !array_key_exists( $_GET['key'], $SIDEBARS ) ) {

		// Error...
		$HTML .= '<p><strong>Not Found!</strong><br/>That sidebar could not be found!</p>';

	} else {

		$sidebar_key = $_GET['key'];

		// Check Sidebar Usage...
		$in_use_options = '';
		if( $sidebar_key == get_option( 'grafik-global-sidebars') ) {
			$in_use_options .= '<li>Theme Options - Global - Sidebars</li>';
		}
		if( $sidebar_key == get_option( 'grafik-post-sidebars' ) ) {
			$in_use_options .= '<li>Theme Options - Post - Sidebars</li>';
		}
		if( $sidebar_key == get_option( 'grafik-page-sidebars' ) ) {
			$in_use_options .= '<li>Theme Options - Page - Sidebars</li>';
		}

		// Query Post Metabox Values
		$in_use_pages = '';
		$in_use_posts = '';
		$check_posts_meta = new WP_Query( array(
			'post_type' => 'any',
			'meta_query' => array( array(
				'key' => 'grafik-meta-sidebars',
				'value' => $sidebar_key,
				'compare' => '='
			) )
		) );
		foreach( $check_posts_meta->posts as $post ) {
			if($post->post_type == 'page') {
				$in_use_pages .= '<li>Pages - '.$post->post_title.'</li>';
			} else {
				$in_use_posts .= '<li>Posts - '.$post->post_title.'</li>';
			}
		}

		// Editor Controls...
		$HTML .=
		'<form method="POST">'.
			wp_nonce_field( 'delete-sidebar', 'delete-sidebar', true, false ).
			'<h2>Delete</h2>'.
			'<p>Are you sure you want to delete this sidebar?</p>'.
			( empty( $in_use_options ) && empty( $in_use_pages ) && empty( $in_use_posts ) ? null :
				'<div id="grafik-admin-sidebars-delete-inuse" class="grafik-admin-caution">'.
					'<p><strong>This sidebar is currently in use:</strong></p>'.
					'<ul>'.
						$in_use_options.
						$in_use_pages.
						$in_use_posts.
					'</ul>'.
				'</div>'
			).
			'<div class="grafik-admin-buttons">'.
				'<button type="submit" class="button-primary">Confirm Delete</button>'.
				'&nbsp;'.
				'<a href="'.$LinkRoot.'" class="button-primary">Cancel</a>'.
			'</div>'.
		'</form>';

	}

?>