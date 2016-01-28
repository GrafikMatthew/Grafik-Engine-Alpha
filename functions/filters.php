<?php

	

	function Grafik_Filters_Callback() {

		// Output Buffer...
		$HTML = null;

		// Check POST Data...
		if(isset($_POST['grafik-admin-filters']) && wp_verify_nonce($_POST['grafik-admin-filters'], "grafik-admin-filters")) {

			// Process Category Masking POST Data...
			foreach($_POST['category-masking'] as $key => $val) {
				if($val != "on") continue;
				$grafik_filters['category-masking'][] = $key;
			}

			// Last Updated...
			$grafik_filters['last-update-date'] = (int)time();
			$grafik_filters['last-update-user'] = (int)get_current_user_id();

			// Storage...
			$grafik_filters = json_encode($grafik_filters);
			update_option("grafik-filters", $grafik_filters);

		}

		// Get Stored Values...
		$grafik_filters = get_option("grafik-filters");
		if(!is_array($grafik_filters)) $grafik_filters = json_decode($grafik_filters, true);

		// Last Update User...
		$grafik_filters_user = get_userdata($grafik_filters['last-update-user']);
		$grafik_filters_username = $grafik_filters_user->first_name.' '.$grafik_filters_user->last_name;
		if(empty($grafik_filters_username)) $grafik_filters_username = $grafik_filters_username->user_login;

		// Form Controls...
		$HTML .=
		'<div class="category-masking">'.
			'<h2>Category Masking</h2>'.
			'<em>Check any number of categories to add them to the Category Masking routine. Category Masking does not affect search results, but what it will do is prevent checked categories from being listed, such as in Recent Posts, Paginated Posts, and Single Post views.</em>'.
			'<ul>';
		$get_categories = get_categories();
		foreach($get_categories as $key => $val) {
			$checked = is_array($grafik_filters['category-masking']) && in_array($val->term_id, $grafik_filters['category-masking']) ? ' checked="checked"' : null;
			$HTML .= '<li><input type="checkbox" name="category-masking['.$val->term_id.']"'.$checked.' />'.$val->name.'</li>';
		}
		$HTML .=
			'</ul>'.
		'</div>';

		// Overview...
		echo
		'<div id="grafik-admin">'.
			'<div class="grafik-admin-interior">'.
				'<h1>Theme Filters</h1>'.
				'<div id="grafik-admin-filters" class="grafik-admin-box">'.
					'<div class="grafik-admin-filters-interior">'.
						'<form method="POST">'.
							wp_nonce_field('grafik-admin-filters', 'grafik-admin-filters', false, false).
							$HTML.
							'<hr/><button class="button-primary">Update Filters</button>'.
							( empty($grafik_filters) ? null : '<span class="last-update">Last Updated on '.date('Y-m-d \a\t g:i A', $grafik_filters['last-update-date']).' by '.$grafik_filters_username.'</span>' ).
						'</form>'.
						'<div class="debug">'.
							'<h3>Debug (Hover)</h3>'.
							'<div class="hidden"><pre>'.print_r($grafik_filters,true).'</pre></div>'.
						'</div>'.
					'</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	}

	function Grafik_Filters_Init() {
		wp_register_style( 'grafik-styles-filters', get_template_directory_uri().'/css/filters.css', false, '1.0.0' );
		wp_enqueue_style( 'grafik-styles-filters' );
		add_theme_page( 'Theme Filters', 'Theme Filters', 'manage_options', 'theme-filters', 'Grafik_Filters_Callback' );
	}
	add_action('admin_menu', 'Grafik_Filters_Init');

?>