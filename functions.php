<?php

	add_filter( 'show_admin_bar', '__return_false' );

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Remove the Theme Editor...
	add_action('admin_init', 'Grafik_RemoveThemeEditor', 102);
	function Grafik_RemoveThemeEditor() {
		remove_submenu_page('themes.php', 'theme-editor.php');
	}

	include 'functions/metaboxes.php';
	include 'functions/options.php';
	include 'functions/sidebars.php';
	include 'functions/shortcodes.php';
	include 'functions/filters.php';

	/* Yoast Integration */
	if(is_admin()) {
		add_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast');
		function add_custom_to_yoast($content) {
			global $post;
			$pid = $post->ID;
			$custom = get_post_custom($pid);
			unset($custom['_yoast_wpseo_focuskw']);
			foreach($custom as $key => $value) {
				if(substr($key,0,1) != '_' && substr($value[0],-1) != '}' && !is_array($value[0]) && !empty($value[0])) {
					$custom_content .= $value[0].' ';
				}
			}
			$content = $content.' '.$custom_content;
			return $content;
			remove_filter('wpseo_pre_analysis_post_content', 'add_custom_to_yoast');
		}
	}

?>