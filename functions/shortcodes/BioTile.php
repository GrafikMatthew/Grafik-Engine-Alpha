<?php

	function Grafik_Shortcode_BioTile_Callback( $atts, $content = null ) {

		$a = shortcode_atts( array(
			'thumbnail' => '',
			'name' => '',
			'title' => '',
			'extra' => '',
			'fullsize' => '',
			'class' => '',
			'id' => ''
		), $atts );

		return
		'<div class="theme-biotile'.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			( empty( $a['thumbnail'] ) ? null : '<img src="'.$a['thumbnail'].'" alt="'.$a['name'].'" class="theme-biotile-thumbnail" />' ).
			( empty( $a['name'] ) ? null : '<div class="theme-biotile-name">'.$a['name'].'</div>' ).
			( empty( $a['title'] ) ? null : '<div class="theme-biotile-title">'.$a['title'].'</div>' ).
			( empty( $a['extra'] ) ? null : '<div class="theme-biotile-extra">'.$a['extra'].'</div>' ).
			( empty( $content ) ? null :
				'<div class="theme-biotile-content">'.
					( empty( $a['fullsize'] ) ? null : '<img src="'.$a['fullsize'].'" alt="'.$a['name'].'" class="theme-biotile-content-fullsize" />' ).
					( empty( $a['name'] ) ? null : '<div class="theme-biotile-content-name">'.$a['name'].'</div>' ).
					( empty( $a['title'] ) ? null : '<div class="theme-biotile-content-title">'.$a['title'].'</div>' ).
					'<div class="theme-biotile-content-main">'.$content.'</div>'.
				'</div>'
			).
		'</div>';

	}
	add_shortcode( "BioTile", "Grafik_Shortcode_BioTile_Callback" );

?>