<?php

	function Grafik_Shortcode_RecentPosts_Callback( $atts, $content = null ) {

		// Query Params...
		$a = shortcode_atts(
			array(
				'numberposts' => 10,
				'offset' => 0,
				'category' => '',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => null,
				'exclude' => null,
				'meta_key' => null,
				'meta_value' => null,
				'post_type' => 'post',
				'post_status' => 'publish',
				'suppress_filters' => true,
				'heading' => 'Recent Posts',
				'show_preview' => 'true',
				'show_postdate' => 'true',
				'show_title' => 'true',
				'show_excerpt' => 'true',
				'class' => '',
				'id' => ''
			)
			, $atts
			, "RecentPost"
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

		// Filters...
		$grafik_filters = get_option("grafik-filters");
		if(!is_array($grafik_filters)) $grafik_filters = json_decode($grafik_filters, true);

		// Query Recent Posts Using Params...
		$RecentPosts = wp_get_recent_posts( $a, ARRAY_A );
		foreach( $RecentPosts as $RecentPost ) {

			// Get Category Info...
			$info_categories = array();
			$GRAFIK_CATEGORIES = wp_get_post_categories( $RecentPost['ID'] );
			foreach( $GRAFIK_CATEGORIES as $key => $val) {

				$cat = get_category( $val );

				// Filter Uncategorized from display...
				if(is_array($grafik_filters['category-masking']) && in_array($cat->term_id, $grafik_filters['category-masking'])) {
					continue;
				}

				$info_categories[] = '<span class="theme-recentposts-postcategory '.$cat->slug.'">'.$cat->name.'</span>';

			}

			// Get Stored Meta Values...
			$PREFILL = array(
				'grafik-meta-preview-desktop' => stripslashes( esc_textarea( base64_decode( get_post_meta( $RecentPost['ID'], 'grafik-meta-preview-desktop', true ) ) ) ),
				'grafik-meta-preview-tablet' => stripslashes( esc_textarea( base64_decode( get_post_meta( $RecentPost['ID'], 'grafik-meta-preview-tablet', true ) ) ) ),
				'grafik-meta-preview-phone' => stripslashes( esc_textarea( base64_decode( get_post_meta( $RecentPost['ID'], 'grafik-meta-preview-phone', true ) ) ) ),
				'grafik-meta-excerpt' => apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $RecentPost['ID'] ) )
			);

			// Construct Recent Post Anchor...
			$content .=
			'<a href="'.get_permalink( $RecentPost['ID'] ).'" class="theme-recentposts-post">'.
				( $a['show_preview'] == 'false' ? null :
					'<span class="theme-recentposts-postimage">'.
						( empty( $PREFILL['grafik-meta-preview-desktop'] ) ? null : '<img src="'.$PREFILL['grafik-meta-preview-desktop'].'" width="100%" height="100%" alt="'.$RecentPost['post_title'].'" class="theme-recentposts-preview-desktop" />' ).
						( empty( $PREFILL['grafik-meta-preview-tablet'] ) ? null : '<img src="'.$PREFILL['grafik-meta-preview-tablet'].'" width="100%" height="100%" alt="'.$RecentPost['post_title'].'" class="theme-recentposts-preview-tablet" />' ).
						( empty( $PREFILL['grafik-meta-preview-phone'] ) ? null : '<img src="'.$PREFILL['grafik-meta-preview-phone'].'" width="100%" height="100%" alt="'.$RecentPost['post_title'].'" class="theme-recentposts-preview-phone" />' ).
					'</span>'
				).
				( $a['show_postdate'] == 'false' ? null : '<span class="theme-recentposts-postdate">'.date('m/d/Y', strtotime( $RecentPost['post_date'] ) ).'</span>' ).
				( $a['show_title'] == 'false' ? null : '<span class="theme-recentposts-posttitle">'.$RecentPost['post_title'].'</span>' ).
				( $a['show_categories'] == 'false' || empty($info_categories) ? null : '<span class="theme-recentposts-postcategories">'.implode('', $info_categories).'</span>' ).
				( $a['show_excerpt'] == 'false' ? null : '<span class="theme-recentposts-postexcerpt">'.$PREFILL['grafik-meta-excerpt'].'</span>' ).
			'</a>';

		}

		// Return Content...
		return
		'<div class="theme-recentposts'.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			'<div class="theme-recentposts-interior">'.
				( empty( $a['heading'] ) ? null : '<h2>'.$a['heading'].'</h2>' ).
				( empty( $content ) ? null : $content ).
			'</div>'.
		'</div>';

	}
	add_shortcode( "RecentPosts", "Grafik_Shortcode_RecentPosts_Callback" );

?>