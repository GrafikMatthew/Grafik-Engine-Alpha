<?php

	function Grafik_Shortcode_AccordionBox_Callback( $atts, $content = null ) {

		$a = shortcode_atts( array(
			'title' => '',
			'ctaurl' => '',
			'ctatxt' => '',
			'class' => '',
			'id' => ''
		), $atts );

		return
		'<div class="theme-accordionbox'.( empty( $a['class'] ) ? null : ' '.$a['class'] ).'"'.( empty( $a['id'] ) ? null : ' id="'.$a['id'].'"' ).'>'.
			'<div class="theme-accordionbox-title">'.$a['title'].'</div>'.
			'<div class="theme-accordionbox-content">'.
				$content.
				( empty( $a['ctaurl'] ) && empty( $a['ctatxt'] ) ? null :
					'<div class="theme-accordionbox-cta">'.
						'<a href="'.( empty( $a['ctaurl'] ) ? '#' : $a['ctaurl'] ).'">'.$a['ctatxt'].'</a>'.
					'</div>'
				).
			'</div>'.
		'</div>';

	}
	add_shortcode( 'AccordionBox', 'Grafik_Shortcode_AccordionBox_Callback' );

	function Grafik_Shortcode_AccordionBoxJS_Callback( $atts, $content = null ) {

		return
		"<script>".
			"$(document).on('ready', function() {".
				"$('.theme-accordionbox-title').on('click', function() {".
					"$($(this).parents('.theme-accordionbox')[0]).toggleClass('expand');".
				"});".
			"});".
		"</script>";

	}
	add_shortcode( 'AccordionBoxJS', 'Grafik_Shortcode_AccordionBoxJS_Callback' );

?>