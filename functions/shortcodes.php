<?php

	$shortcode_blacklist = array();

	$shortcode_dirname = dirname( __FILE__ );
	foreach( glob( $shortcode_dirname.'/shortcodes/*.php' ) as $shortcode ) {

		// Empty Blacklist, Include Without Check...
		if( empty( $shortcode_blacklist ) ) {
			include $shortcode;
			continue;
		}

		// Include With Check...
		if( in_array( str_replace( $shortcode_dirname.'/shortcodes/', '', $shortcode ), $shortcode_blacklist ) ) continue;
		include $shortcode;

	}

?>