<?php

	function Grafik_Options_Callback() {

		// Output Buffer
		$HTML = '';

		// Navigation Logic
		$vertical_active = 'global';
		$vertical_nav = array(
			'global' => 'Global',
			'post' => 'Post',
			'page' => 'Page'
		);
		if(isset($_GET['vnav']) && array_key_exists($_GET['vnav'], $vertical_nav)) {
			$vertical_active = $_GET['vnav'];
		}
		$horizontal_active = 'header';
		$horizontal_nav = array(
			'header' => 'Header',
			'sidebars' => 'Sidebars',
			'footer' => 'Footer',
			'styles' => 'Styles',
			'scripts' => 'Scripts'
		);
		if(isset($_GET['hnav']) && array_key_exists($_GET['hnav'], $horizontal_nav)) {
			$horizontal_active = $_GET['hnav'];
		}

		// Navigation Links
		$HTML_vnav = '';
		foreach($vertical_nav as $key => $val) {
			$HTML_vnav .=
			'<li'.($vertical_active == $key ? ' class="active"' : null).'>'.
				'<a href="?page=theme-options&amp;vnav='.$key.'&amp;hnav='.$horizontal_active.'">'.$val.'</a>'.
			'</li>';
		}
		$HTML_hnav = '';
		foreach($horizontal_nav as $key => $val) {
			$HTML_hnav .=
			'<li'.($horizontal_active == $key ? ' class="active"' : null).'>'.
				'<a href="?page=theme-options&amp;vnav='.$vertical_active.'&amp;hnav='.$key.'">'.$val.'</a>'.
			'</li>';
		}

		// Include Display
		$HTML_display = '';
		if( array_key_exists( $vertical_active, $vertical_nav ) && array_key_exists( $horizontal_active, $horizontal_nav ) ) {
			include 'options/'.$vertical_active.'_'.$horizontal_active.'.php';
			$HTML_display =
			'<form method="POST">'.
				'<h2>'.$vertical_nav[$vertical_active].' '.$horizontal_nav[$horizontal_active].'</h2>'.
				'<hr/>'.$HTML_display.'<hr/>'.
				'<button class="button-primary">Save '.$vertical_nav[$vertical_active].' '.$horizontal_nav[$horizontal_active].' Options</button>'.
			'</form>';
		} else {
			$HTML_display =
			'<p><strong>Error!</strong><br/>Invalid options panel requested...</p>';
		}

		echo
		'<div class="grafik-theme-options">'.
			'<h1>Theme Options</h1>'.
			'<div class="grafik-theme-options-hnav">'.
				'<ul>'.$HTML_hnav.'</ul>'.
			'</div>'.
			'<div class="grafik-theme-options-hnav-content">'.
				'<div class="grafik-theme-options-vnav">'.
					'<ul>'.$HTML_vnav.'</ul>'.
				'</div>'.
				'<div class="grafik-theme-options-vnav-content">'.
					$HTML_display.
				'</div>'.
			'</div>'.
		'</div>';

	}

	function Grafik_Options_Init() {
		wp_register_style( 'grafik-styles-options', get_template_directory_uri().'/css/options.css', false, '1.0.0' );
		wp_enqueue_style( 'grafik-styles-options' );
		add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme-options', 'Grafik_Options_Callback' );
	}
	add_action('admin_menu', 'Grafik_Options_Init');

?>