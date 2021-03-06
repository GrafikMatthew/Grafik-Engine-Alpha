<?php

	function Grafik_Shortcode_ToggleBox_Callback( $atts, $content = null ) {

		$a = shortcode_atts( array(
			'bindto' => '',
			'scrollto_enabled' => 'true',
			'scrollto_offset' => 0,
			'scrollto_speed' => 500,
			'class' => '',
			'id' => ''
		), $atts );

		$binding = 'togglebox_'.time();

		return
		'<div class="theme-togglebox '.$binding.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			'<div class="theme-togglebox-interior">'.
				'<div class="theme-togglebox-toggle"></div>'.
				Grafik_ShortcodeLoop( $content ).
			'</div>'.
		'</div>'.
		'<script>'.
			'$( document ).on( "ready", function() {'.
				'$( "'.$a['bindto'].', .'.$binding.' .theme-togglebox-toggle" )'.
				'.on( "click", function(e) {'.
					'e.preventDefault();'.
					'$( ".'.$binding.'" )'.
					'.toggleClass( "toggled" );'.
					( $a['scrollto_enabled'] != 'true' ? null :
						'if( $( ".'.$binding.'" ).hasClass( "toggled" ) ) {'.
							'$( "html, body" )'.
							'.animate( {'.
								'scrollTop: $( ".'.$binding.'" ).offset().top'.( empty( $a['scrollto_offset'] ) ? null : ' - '.$a['scrollto_offset'] ).
							'}'.( empty( $a['scrollto_speed'] ) ? null : ', '.$a['scrollto_speed'] ).' );'.
						'}'
					).
				'} );'.
			'} );'.
		'</script>';

	}
	add_shortcode( "ToggleBox", "Grafik_Shortcode_ToggleBox_Callback" );

?>