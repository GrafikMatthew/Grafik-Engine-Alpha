<?php

	function Grafik_Shortcode_SearchResults_Callback( $atts, $content = null ) {

		$a = shortcode_atts( array(
			'c_param' => 'c',
			'q_param' => 'q',
			'type' => 'any',
			'class' => '',
			'id' => ''
		), $atts );

		// Not a search, return content...
		if( empty( $a['c_param'] ) || empty( $a['q_param'] ) ) {
			return Grafik_ShortcodeLoop( $content );
		}

		// Is a search, perform query...
		$results = '';
		$search = new WP_Query(
			array(
				's' => $_GET[$a['q_param']]
				, 'post_type' => $a['type']
				, 'post_status' => 'publish'
				, 'posts_per_page' => -1
			)
		);
		if( $search->have_posts() ) {
			while ( $search->have_posts() ) {
				$search->the_post();
				if( get_post_type( $search->post->ID ) == 'page' ) {
					$results .=
					'<div class="theme-searchresults-page">'.
						'<div class="theme-searchresults-info id-'.$search->post->ID.'">[Breadcrumbs postid="'.$search->post->ID.'" includehome="1" includeself="0"]</div>'.
						'<div class="theme-searchresults-title">'.
							'<a href="'.get_permalink( $search->post->ID ).'">'.get_the_title( $search->post->ID ).'</a>'.
						'</div>'.
						'<div class="theme-searchresults-short">'.'Truncated content here...'.'</div>'.
					'</div>';
				} else {
					$excerpt = get_the_excerpt( $search->post->ID );
					$results .=
					'<div class="theme-searchresults-post">'.
						'<div class="theme-searchresults-info">Posted: '.get_the_date( 'F dS, Y', $search->post->ID ).'</div>'.
						'<div class="theme-searchresults-title">'.
							'<a href="'.get_permalink( $search->post->ID ).'">'.get_the_title( $search->post->ID ).'</a>'.
						'</div>'.
						'<div class="theme-searchresults-short">'.$excerpt.'</div>'.
					'</div>';
				}
			}
		}

		if( empty( $results ) ) {
			$results .=
			'<div class="theme-searchresults-pages-none">'.
				'<p><strong>Search returned zero results...</strong></p>'.
			'</div>';
		}

		return
		'<div class="theme-searchresults'.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			'<h2>Showing Matches: '.htmlspecialchars( $_GET[$a['q_param']] ).'</h2>'.
			$results.
		'</div>';

	}
	add_shortcode( "SearchResults", "Grafik_Shortcode_SearchResults_Callback" );

?>