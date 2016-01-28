<?php

	function Grafik_Shortcode_PaginatedPosts_Callback( $atts ) {

		// Content Buffer...
		$content = '';

		// Query Params...
		$a = shortcode_atts(
			array(
				'category' => '',
				'perpage' => 10,
				'class' => '',
				'id' => ''
			)
			, $atts
			, "PaginatedPosts"
		);

		// Convert Category Slugs to IDs...
		$category_list = explode(",", $a['category']);
		foreach($category_list as $key => $val) {
			if(is_numeric($val)) continue;
			$is_negative = substr($val, 0, 1) == "-";
			$trim_val = trim($val, "-");
			$category = get_category_by_slug($trim_val);
			$category_list[$key] = ($is_negative ? "-" : null) . $category->term_id;
		}
		$a['category'] = implode(",", $category_list);

		// Paging...
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$PaginatedPosts_Args = array(
			'posts_per_page' => $a['perpage'],
			'cat' => $a['category'],
			'paged' => $paged
		);

		// Filters...
		$grafik_filters = get_option("grafik-filters");
		if(!is_array($grafik_filters)) $grafik_filters = json_decode($grafik_filters, true);

		// Display Posts Matching Query...
		wp_reset_postdata();
		$PaginatedPosts_Query = new WP_Query( $PaginatedPosts_Args );
		if( $PaginatedPosts_Query->have_posts() ) {
			while( $PaginatedPosts_Query->have_posts() ) {

				$PaginatedPosts_Query->the_post();

				$info_categories = array();
				$GRAFIK_CATEGORIES = wp_get_post_categories( get_the_ID() );
				foreach($GRAFIK_CATEGORIES as $key => $val) {

					$cat = get_category($val);

					// Filter Uncategorized from display...
					if(is_array($grafik_filters['category-masking']) && in_array($cat->term_id, $grafik_filters['category-masking'])) {
						continue;
					}

					$info_categories[] = '<span class="theme-paginatedposts-category '.$cat->slug.'">'.$cat->name.'</span>';

				}

				$content .=
				'<div class="theme-paginatedposts-post">'.
					'<div class="theme-paginatedposts-info">Posted: '.get_the_date( 'F dS, Y' ).'</div>'.
					'<div class="theme-paginatedposts-title">'.'<a href="'.get_permalink().'">'.get_the_title().'</a>'.'</div>'.
					'<div class="theme-paginatedposts-categories">'.implode('', $info_categories).'</div>'.
					'<div class="theme-paginatedposts-short">'.get_the_excerpt().'</div>'.
				'</div>';
			}
			$big = 999999999;
			$PaginatedPost_Args = array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $PaginatedPosts_Query->max_num_pages
			);
			$content .=
			'<div class="theme-paginatedposts-pagelinks">'.
				paginate_links( $PaginatedPost_Args ).
			'</div>'.
			wp_reset_postdata();
		}

		return
		'<div class="theme-paginatedposts'.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			$content.
		'</div>';

	}
	add_shortcode( "PaginatedPosts", "Grafik_Shortcode_PaginatedPosts_Callback" );

?>