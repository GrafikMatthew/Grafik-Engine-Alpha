<?php

	add_action('add_meta_boxes', 'Grafik_Meta_Init');
	add_action('save_post', 'Grafik_Meta_Save');

	include 'metaboxes/save.php';
	include 'metaboxes/previews.php';
	include 'metaboxes/styles.php';
	include 'metaboxes/scripts.php';
	include 'metaboxes/headers.php';
	include 'metaboxes/sidebars.php';
	include 'metaboxes/content.php';
	include 'metaboxes/footers.php';

	function Grafik_Meta_Init() {

		wp_register_style( 'grafik-styles-metaboxes', get_template_directory_uri().'/css/metaboxes.css', false, '1.0.0' );
		wp_enqueue_style( 'grafik-styles-metaboxes' );

		foreach( array('post', 'page') as $screen ) {
			add_meta_box( 'Grafik_MetaPreviews', __('Previews', 'grafik'), 'Grafik_MetaPreviews_Callback', $screen );
			add_meta_box( 'Grafik_MetaStyles', __('Styles', 'grafik'), 'Grafik_MetaStyles_Callback', $screen );
			add_meta_box( 'Grafik_MetaScripts', __('Scripts', 'grafik'), 'Grafik_MetaScripts_Callback', $screen );
			add_meta_box( 'Grafik_MetaHeader', __('Header', 'grafik'), 'Grafik_MetaHeader_Callback', $screen );
			add_meta_box( 'Grafik_MetaSidebars', __('Sidebars', 'grafik'), 'Grafik_MetaSidebars_Callback', $screen );
			add_meta_box( 'Grafik_MetaContent', __('Content', 'grafik'), 'Grafik_MetaContent_Callback', $screen );
			add_meta_box( 'Grafik_MetaFooter', __('Footer', 'grafik'), 'Grafik_MetaFooter_Callback', $screen );
		}

	}

?>