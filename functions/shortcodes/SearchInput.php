<?php

	function Grafik_Shortcode_SearchInput_Callback( $atts ) {

		$a = shortcode_atts( array(
			'url' => '',
			'param' => 'q',
			'class' => '',
			'id' => ''
		), $atts );

		return
		'<div class="theme-searchinput'.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			'<form method="GET" action="'.$a['url'].'">'.
				'<input type="text" name="'.$a['param'].'" placeholder="Search" />'.
				'<button type="submit">Submit</button>'.
			'</form>'.
		'</div>';

	}
	add_shortcode( "SearchInput", "Grafik_Shortcode_SearchInput_Callback" );

	function Grafik_Shortcode_SearchInputJS_Callback( $atts ) {

		return
		"<script>".
		"$(document).on('ready', function() {".
			"$('.theme-searchinput input[type=text]').on('keypress', function(e) {".
				"if(e.which == 13) {".
					"e.preventDefault();".
					"$(this).parents('form')[0].submit();".
				"}".
			"});".
		"});".
		"</script>";

	}
	add_shortcode( "SearchInputJS", "Grafik_Shortcode_SearchInputJS_Callback" );

?>