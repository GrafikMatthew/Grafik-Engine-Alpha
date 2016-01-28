<?php

	function Grafik_Sidebars_Callback() {

		global $pagenow;
		$LinkRoot = admin_url( $pagenow.( isset( $_GET['page'] ) ? '?page='.$_GET['page'] : null ) );

		$SIDEBARS = json_decode( get_option('grafik_sidebars', '[]'), true );

		$HTML = '';
		if( isset( $_GET['go'] ) ) {
			if( in_array( $_GET['go'], array( 'create', 'edit', 'delete' ) ) ) {
				$INCLUDE_SIDEBAR = true;
				include 'sidebars/'.$_GET['go'].'.php';
			} else {
				// Invalid...
				$HTML .=
				'<div class="grafik-admin-overview-item">'.
					'<span class="error"><strong>Error!</strong> Request made to an invalid sidebar interface.</span>'.
				'</div>';
			}
		} else {

			if( empty( $SIDEBARS ) ) {
				$HTML .=
				'<div class="grafik-admin-overview-item">'.
					'<span class="warning"><strong>Not Found!</strong> There are currently no sidebars to display...</span>'.
				'</div>';
			} else {
				$HTML .= '<!--'.print_r($SIDEBARS,true).' -->';
				foreach( $SIDEBARS as $key => $val ) {
					$HTML .=
					'<div class="grafik-admin-overview-item">'.
						'<div class="grafik-admin-overview-item-name">'.$val['name'].'</div>'.
						'<div class="grafik-admin-overview-item-buttons">'.
							'<a href="'.$LinkRoot.'&amp;go=edit&amp;key='.$key.'" class="button-primary">Edit</a>'.
							'&nbsp;'.
							'<a href="'.$LinkRoot.'&amp;go=delete&amp;key='.$key.'" class="button-primary">Delete</a>'.
						'</div>'.
					'</div>';
				}
			}
			$HTML =
			'<div class="grafik-admin-overview">'.
				$HTML.
				'<div class="grafik-admin-overview-controls">'.
					'<a href="'.$LinkRoot.'&amp;go=create" class="button-primary">Create New</a>'.
				'</div>'.
			'</div>';
		}

		// Overview...
		echo
		'<div id="grafik-admin">'.
			'<div class="grafik-admin-interior">'.
				'<h1>Theme Sidebars</h1>'.
				'<div id="grafik-admin-sidebars" class="grafik-admin-box">'.
					'<div class="grafik-admin-sidebars-interior">'.
						$HTML.
					'</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	}

	function Grafik_Sidebars_Init() {
		wp_register_style( 'grafik-styles-sidebars', get_template_directory_uri().'/css/sidebars.css', false, '1.0.0' );
		wp_enqueue_style( 'grafik-styles-sidebars' );
		add_theme_page( 'Theme Sidebars', 'Theme Sidebars', 'manage_options', 'theme-sidebars', 'Grafik_Sidebars_Callback' );
	}
	add_action('admin_menu', 'Grafik_Sidebars_Init');


?>