<?php

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

	while( have_posts() ) {

		the_post();

		$GRAFIK_LANG = Grafik_EchoString( 'language_attributes' );
		$GRAFIK_CHAR = Grafik_EchoString( 'bloginfo', array( 'charset' ) );
		$GRAFIK_PING = Grafik_EchoString( 'bloginfo', array( 'pingback_url' ) );
		$GRAFIK_ID = $post->ID;

		$GRAFIK_POST = $post;
		$GRAFIK_TYPE = is_page( $GRAFIK_ID ) ? 'page' : 'post';
		$GRAFIK_TITLE = get_the_title( $GRAFIK_ID );
		$GRAFIK_BODY = implode( '', explode( "\n", Grafik_ShortcodeLoop( wpautop( Grafik_EchoString( 'the_content' ), false ) ) ) );
		$GRAFIK_META = get_post_meta( $GRAFIK_ID );
		$GRAFIK_CATEGORIES = wp_get_post_categories( $GRAFIK_ID );

		$GRAFIK_OPTIONS = array(

			'grafik-global-header-tl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-header-tl' ) ) ) ) ),
			'grafik-global-header-tr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-header-tr' ) ) ) ) ),
			'grafik-global-header-ml' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-header-ml' ) ) ) ) ),
			'grafik-global-header-mr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-header-mr' ) ) ) ) ),
			'grafik-global-header-bl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-header-bl' ) ) ) ) ),
			'grafik-global-header-br' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-header-br' ) ) ) ) ),
			'grafik-global-header-off' => (int)get_option( 'grafik-global-header-off' ),
			'grafik-global-header-notype' => (int)get_option( 'grafik-global-header-no'.$GRAFIK_TYPE ),

			'grafik-global-sidebars' => get_option( 'grafik-global-sidebars' ),

			'grafik-global-footer-tl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-footer-tl' ) ) ) ) ),
			'grafik-global-footer-tr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-footer-tr' ) ) ) ) ),
			'grafik-global-footer-ml' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-footer-ml' ) ) ) ) ),
			'grafik-global-footer-mr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-footer-mr' ) ) ) ) ),
			'grafik-global-footer-bl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-footer-bl' ) ) ) ) ),
			'grafik-global-footer-br' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-global-footer-br' ) ) ) ) ),
			'grafik-global-footer-off' => (int)get_option( 'grafik-global-footer-off' ),
			'grafik-global-footer-notype' => (int)get_option( 'grafik-global-footer-no'.$GRAFIK_TYPE ),

			'grafik-global-styles' => trim( stripslashes( base64_decode( get_option( 'grafik-global-styles' ) ) ) ),
			'grafik-global-styles-noresponsive' => (int)get_option( 'grafik-global-styles-noresponsive' ),
			'grafik-global-styles-off' => (int)get_option( 'grafik-global-styles-off' ),
			'grafik-global-styles-notype' => (int)get_option( 'grafik-global-styles-no'.$GRAFIK_TYPE ),

			'grafik-global-headscripts' => trim( stripslashes( base64_decode( get_option( 'grafik-global-headscripts' ) ) ) ),
			'grafik-global-headscripts-off' => (int)get_option( 'grafik-global-headscripts-off' ),
			'grafik-global-headscripts-notype' => (int)get_option( 'grafik-global-headscripts-no'.$GRAFIK_TYPE ),

			'grafik-global-bodyscripts' => trim( stripslashes( base64_decode( get_option( 'grafik-global-bodyscripts' ) ) ) ),
			'grafik-global-bodyscripts-off' => (int)get_option( 'grafik-global-bodyscripts-off' ),
			'grafik-global-bodyscripts-notype' => (int)get_option( 'grafik-global-bodyscripts-no'.$GRAFIK_TYPE ),

			'grafik-type-header-tl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-header-tl' ) ) ) ) ),
			'grafik-type-header-tr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-header-tr' ) ) ) ) ),
			'grafik-type-header-ml' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-header-ml' ) ) ) ) ),
			'grafik-type-header-mr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-header-mr' ) ) ) ) ),
			'grafik-type-header-bl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-header-bl' ) ) ) ) ),
			'grafik-type-header-br' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-header-br' ) ) ) ) ),
			'grafik-type-header-off' => (int)get_option( 'grafik-'.$GRAFIK_TYPE.'-header-off' ),

			'grafik-type-sidebars' => get_option( 'grafik-'.$GRAFIK_TYPE.'-sidebars' ),

			'grafik-type-footer-tl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-tl' ) ) ) ) ),
			'grafik-type-footer-tr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-tr' ) ) ) ) ),
			'grafik-type-footer-ml' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-ml' ) ) ) ) ),
			'grafik-type-footer-mr' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-mr' ) ) ) ) ),
			'grafik-type-footer-bl' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-bl' ) ) ) ) ),
			'grafik-type-footer-br' => str_replace( "\n", "", trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-br' ) ) ) ) ),
			'grafik-type-footer-off' => (int)get_option( 'grafik-'.$GRAFIK_TYPE.'-footer-off' ),

			'grafik-type-styles' => trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-styles' ) ) ) ),
			'grafik-type-styles-noresponsive' => (int)get_option( 'grafik-'.$GRAFIK_TYPE.'-styles-noresponsive' ),
			'grafik-type-styles-off' => (int)get_option( 'grafik-'.$GRAFIK_TYPE.'-styles-off' ),

			'grafik-type-headscripts' => trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-headscripts' ) ) ) ),
			'grafik-type-headscripts-off' => (int)get_option( 'grafik-'.$GRAFIK_TYPE.'-headscripts-off' ),

			'grafik-type-bodyscripts' => trim( stripslashes( base64_decode( get_option( 'grafik-'.$GRAFIK_TYPE.'-bodyscripts' ) ) ) ),
			'grafik-type-bodyscripts-off' => (int)get_option( 'grafik-'.$GRAFIK_TYPE.'-bodyscripts-off' )

		);

	}

	echo
	"<!DOCTYPE html>".
	'<html '.$GRAFIK_LANG.' class="no-js">'.
		'<head>'.
			'<meta charset="'.$GRAFIK_CHAR.'" />'.
			'<title>'.( empty( $GRAFIK_TITLE ) ? null : $GRAFIK_TITLE.' - ' ).get_bloginfo( 'name' ).'</title>'.
			// '<meta name="viewport" content="width=device-width" />'.
			'<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />'.
			'<link rel="pingback" href="'.$GRAFIK_PING.'" />'.
			Grafik_Favicon().
			'<!--[if lt IE 9]><script src="'.esc_url( get_template_directory_uri() ).'/js/html5.js"></script><![endif]-->'.
			'<!-- wp_head:in -->'.str_replace( "\n", '', Grafik_EchoString( 'wp_head' ) ).'<!-- wp_head:out -->'.
			Grafik_Styles().
			Grafik_HeadScripts()."\n".
		'</head>'.
		'<body '.Grafik_EchoString( 'body_class' ).'>'.
			'<div class="theme">'.
				'<div class="interior">'.
					( is_404() ? Grafik_404() : Grafik_Header().Grafik_Content().Grafik_Footer() ).
				'</div>'.
			'</div>'.
			'<!-- wp_footer:in -->'.str_replace( "\n", '', Grafik_EchoString( 'wp_footer' ) ).'<!-- wp_footer:out -->'.
			Grafik_BodyScripts()."\n".
		'</body>'.
	'</html>';

	function Grafik_404() {

		return
		'<div class="theme-404">'.
			'<h1>404 Not Found!</h1>'.
		'</div>';

	}

	function Grafik_Favicon() {

		$url = get_site_url();

		return
		'<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'.$url.'/favicon/apple-touch-icon-57x57.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.$url.'/favicon/apple-touch-icon-114x114.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.$url.'/favicon/apple-touch-icon-72x72.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.$url.'/favicon/apple-touch-icon-144x144.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="60x60" href="'.$url.'/favicon/apple-touch-icon-60x60.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="120x120" href="'.$url.'/favicon/apple-touch-icon-120x120.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="76x76" href="'.$url.'/favicon/apple-touch-icon-76x76.png" />'.
		'<link rel="apple-touch-icon-precomposed" sizes="152x152" href="'.$url.'/favicon/apple-touch-icon-152x152.png" />'.
		'<link rel="icon" type="image/png" href="'.$url.'/favicon/favicon-196x196.png" sizes="196x196" />'.
		'<link rel="icon" type="image/png" href="'.$url.'/favicon/favicon-96x96.png" sizes="96x96" />'.
		'<link rel="icon" type="image/png" href="'.$url.'/favicon/favicon-32x32.png" sizes="32x32" />'.
		'<link rel="icon" type="image/png" href="'.$url.'/favicon/favicon-16x16.png" sizes="16x16" />'.
		'<link rel="icon" type="image/png" href="'.$url.'/favicon/favicon-128.png" sizes="128x128" />'.
		'<meta name="application-name" content="'.get_bloginfo( 'name' ).'"/>'.
		'<meta name="msapplication-TileColor" content="#000000" />'.
		'<meta name="msapplication-TileImage" content="'.$url.'/favicon/mstile-144x144.png" />'.
		'<meta name="msapplication-square70x70logo" content="'.$url.'/favicon/mstile-70x70.png" />'.
		'<meta name="msapplication-square150x150logo" content="'.$url.'/favicon/mstile-150x150.png" />'.
		'<meta name="msapplication-wide310x150logo" content="'.$url.'/favicon/mstile-310x150.png" />'.
		'<meta name="msapplication-square310x310logo" content="'.$url.'/favicon/mstile-310x310.png" />';

	}

	function Grafik_Styles() {

		global $GRAFIK_TYPE;
		global $GRAFIK_META;
		global $GRAFIK_OPTIONS;

		$global_styles = true;
		if( $GRAFIK_OPTIONS['grafik-global-styles-off'] == 1 ) $global_styles = false;
		if( $GRAFIK_OPTIONS['grafik-global-styles-notype'] == 1 ) $global_styles = false;
		if( @$GRAFIK_META['grafik-meta-styles-noglobal'][0] == 1 ) $global_styles = false;

		$type_styles = true;
		if( $GRAFIK_OPTIONS['grafik-type-styles-off'] == 1 ) $global_styles = false;
		if( @$GRAFIK_META['grafik-meta-styles-notype'][0] == 1 ) $type_styles = false;

		$GRAFIK_META['grafik-meta-styles'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-styles'] ) ? "" : $GRAFIK_META['grafik-meta-styles'][0] ) ) ) ) );

		return
		( $GRAFIK_OPTIONS['grafik-global-styles-noresponsive'] == 1 || $GRAFIK_OPTIONS['grafik-type-styles-noresponsive'] == 1 ? null :
		"<style type=\"text/css\" id=\"theme-responsive\">".
			".theme-header-global-top-left,.theme-header-global-middle-left,.theme-header-global-bottom-left,".
			".theme-header-type-top-left,.theme-header-type-middle-left,.theme-header-type-bottom-left,".
			".theme-header-meta-top-left,.theme-header-meta-middle-left,.theme-header-meta-bottom-left,".
			".theme-content-meta-middle-left,.theme-content-meta-middle-main,.theme-content-meta-middle-right,".
			".theme-footer-global-top-left,.theme-footer-global-middle-left,.theme-footer-global-bottom-left,".
			".theme-footer-type-top-left,.theme-footer-type-middle-left,.theme-footer-type-bottom-left,".
			".theme-footer-meta-top-left,.theme-footer-meta-middle-left,.theme-footer-meta-bottom-left{".
				"float:left;".
				"clear:none;".
			"}".
			".theme-header-global-top-right,.theme-header-global-middle-right,.theme-header-global-bottom-right,".
			".theme-header-type-top-right,.theme-header-type-middle-right,.theme-header-type-bottom-right,".
			".theme-header-meta-top-right,.theme-header-meta-middle-right,.theme-header-meta-bottom-right,".
			".theme-footer-global-top-right,.theme-footer-global-middle-right,.theme-footer-global-bottom-right,".
			".theme-footer-type-top-right,.theme-footer-type-middle-right,.theme-footer-type-bottom-right,".
			".theme-footer-meta-top-right,.theme-footer-meta-middle-right,.theme-footer-meta-bottom-right{".
				"float:right;".
				"clear:none;".
			"}".
			".interior:after{".
				"content:' ';".
				"display:block;".
				"height:0;".
				"clear:both;".
			"}".
		"</style>" ).
		( !$global_styles || empty( $GRAFIK_OPTIONS['grafik-global-styles'] ) ? null :
		"\n<style type=\"text/css\" id=\"theme-global-styles\">".
			Grafik_MinifyCSS( $GRAFIK_OPTIONS['grafik-global-styles'] ).
		"</style>" ).
		( !$type_styles || empty( $GRAFIK_OPTIONS['grafik-type-styles'] ) ? null :
		"\n<style type=\"text/css\" id=\"theme-type-styles\">".
			Grafik_MinifyCSS( $GRAFIK_OPTIONS['grafik-type-styles'] ).
		"</style>" ).
		( empty( $GRAFIK_META['grafik-meta-styles'] ) ? null :
		"\n<style type=\"text/css\" id=\"theme-meta-styles\">".
			Grafik_MinifyCSS( $GRAFIK_META['grafik-meta-styles'] ).
		"</style>" );

	}

	function Grafik_HeadScripts() {

		global $GRAFIK_TYPE;
		global $GRAFIK_META;
		global $GRAFIK_OPTIONS;

		$global_headscripts = true;
		if( $GRAFIK_OPTIONS['grafik-global-headscripts-off'] == 1 ) $global_headscripts = false;
		if( $GRAFIK_OPTIONS['grafik-global-headscripts-notype'] == 1 ) $global_headscripts = false;
		if( @$GRAFIK_META['grafik-meta-headscripts-noglobal'][0] == 1 ) $global_headscripts = false;

		$type_headscripts = true;
		if( $GRAFIK_OPTIONS['grafik-type-headscripts-off'] == 1 ) $type_headscripts = false;
		if( @$GRAFIK_META['grafik-meta-headscripts-notype'][0] == 1 ) $type_headscripts = false;

		$GRAFIK_META['grafik-meta-headscripts'] = trim( stripcslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-headscripts'] ) ? '' : $GRAFIK_META['grafik-meta-headscripts'][0] ) ) );

		return
		( !$global_headscripts || empty( $GRAFIK_OPTIONS['grafik-global-headscripts'] ) ? null : "\n<!-- theme-global-headscripts:in -->\n".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-headscripts'] )."\n<!-- theme-global-headscripts:out -->" ).
		( !$type_headscripts || empty( $GRAFIK_OPTIONS['grafik-type-headscripts'] ) ? null : "\n<!-- theme-type-headscripts:in -->\n".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-headscripts'] )."\n<!-- theme-type-headscripts:out -->" ).
		( empty( $GRAFIK_META['grafik-meta-headscripts'] ) ? null : "\n<!-- theme-meta-headscripts:in -->\n".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-headscripts'] )."\n<!-- theme-meta-headscripts:out -->" );

	}

	function Grafik_Header() {

		global $GRAFIK_TYPE;
		global $GRAFIK_META;
		global $GRAFIK_OPTIONS;

		$global_header = true;
		if( $GRAFIK_OPTIONS['grafik-global-header-off'] == 1 ) $global_header = false;
		if( $GRAFIK_OPTIONS['grafik-global-header-notype'] == 1 ) $global_header = false;
		if( @$GRAFIK_META['grafik-meta-header-noglobal'][0] == 1 ) $global_header = false;

		$type_header = true;
		if( $GRAFIK_OPTIONS['grafik-type-header-off'] == 1 ) $type_header = false;
		if( @$GRAFIK_META['grafik-meta-header-notype'][0] == 1 ) $type_header = false;

		$meta_header = false;
		$GRAFIK_META['grafik-meta-header-tl'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-header-tl'] ) ? "" : $GRAFIK_META['grafik-meta-header-tl'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-header-tr'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-header-tr'] ) ? "" : $GRAFIK_META['grafik-meta-header-tr'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-header-ml'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-header-ml'] ) ? "" : $GRAFIK_META['grafik-meta-header-ml'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-header-mr'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-header-mr'] ) ? "" : $GRAFIK_META['grafik-meta-header-mr'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-header-bl'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-header-bl'] ) ? "" : $GRAFIK_META['grafik-meta-header-bl'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-header-br'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-header-br'] ) ? "" : $GRAFIK_META['grafik-meta-header-br'][0] ) ) ) );
		if( !empty( $GRAFIK_META['grafik-meta-header-tl'] ) ) $meta_header = true;
		if( !empty( $GRAFIK_META['grafik-meta-header-tr'] ) ) $meta_header = true;
		if( !empty( $GRAFIK_META['grafik-meta-header-ml'] ) ) $meta_header = true;
		if( !empty( $GRAFIK_META['grafik-meta-header-mr'] ) ) $meta_header = true;
		if( !empty( $GRAFIK_META['grafik-meta-header-bl'] ) ) $meta_header = true;
		if( !empty( $GRAFIK_META['grafik-meta-header-br'] ) ) $meta_header = true;

		return
		"<div class=\"theme-header".( !$global_header ? " non-global" : null ).( !$type_header ? " non-type" : null ).( !$meta_header ? " non-meta" : null )."\">".
			( !$global_header ? null :
			"<div class=\"theme-header-global\">".
				"<div class=\"theme-header-global-top\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-global-top-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-header-tl'] )."</div>".
						"<div class=\"theme-header-global-top-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-header-tr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-header-global-middle\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-global-middle-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-header-ml'] )."</div>".
						"<div class=\"theme-header-global-middle-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-header-mr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-header-global-bottom\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-global-bottom-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-header-bl'] )."</div>".
						"<div class=\"theme-header-global-bottom-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-header-br'] )."</div>".
					"</div>".
				"</div>".
			"</div>" ).
			( !$type_header ? null :
			"<div class=\"theme-header-type\">".
				"<div class=\"theme-header-type-top\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-type-top-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-header-tl'] )."</div>".
						"<div class=\"theme-header-type-top-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-header-tr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-header-type-middle\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-type-middle-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-header-ml'] )."</div>".
						"<div class=\"theme-header-type-middle-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-header-mr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-header-type-bottom\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-type-bottom-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-header-bl'] )."</div>".
						"<div class=\"theme-header-type-bottom-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-header-br'] )."</div>".
					"</div>".
				"</div>".
			"</div>" ).
			( !$meta_header ? null :
			"<div class=\"theme-header-meta\">".
				"<div class=\"theme-header-meta-top\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-meta-top-left\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-header-tl'] )."</div>".
						"<div class=\"theme-header-meta-top-right\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-header-tr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-header-meta-middle\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-meta-middle-left\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-header-ml'] )."</div>".
						"<div class=\"theme-header-meta-middle-right\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-header-mr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-header-meta-bottom\">".
					"<div class=\"interior\">".
						"<div class=\"theme-header-meta-bottom-left\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-header-bl'] )."</div>".
						"<div class=\"theme-header-meta-bottom-right\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-header-br'] )."</div>".
					"</div>".
				"</div>".
			"</div>" ).
		"</div>";

	}

	function Grafik_Content() {

		global $GRAFIK_POST;
		global $GRAFIK_TYPE;
		global $GRAFIK_META;
		global $GRAFIK_OPTIONS;
		global $GRAFIK_BODY;
		global $GRAFIK_CATEGORIES;

		/*
		NEED SWITCHES: 
			- Display Author? as Link?
			- Display Categories? as Links?
			- Display Date?
			- Display Excerpt?
		*/

		// Filters...
		$grafik_filters = get_option("grafik-filters");
		if(!is_array($grafik_filters)) $grafik_filters = json_decode($grafik_filters, true);

		$info_categories = array();
		foreach($GRAFIK_CATEGORIES as $key => $val) {
			$cat = get_category( $val );
			if(is_array($grafik_filters['category-masking']) && in_array($cat->term_id, $grafik_filters['category-masking'])) {
				continue;
			}
			$info_categories[] = '<span class="theme-category '.$cat->slug.'">'.$cat->name.'</span>';
		}

		$GRAFIK_POSTINFO =
		( empty($GRAFIK_POST->post_excerpt) ? null : '<div class="theme-post-excerpt">'.$GRAFIK_POST->post_excerpt.'</div>' ).
		'<div class="theme-post-info">'.
			( count($info_categories) > 0 ? '<span class="theme-post-info-categories">'.implode(', ', $info_categories).'</span>' : null ).
			'<span class="theme-post-info-date">'.date("F j, Y, g:i a", strtotime($GRAFIK_POST->post_date)).'</span>'.
		'</div>';

		$meta_content = @$GRAFIK_META['grafik-meta-content-nosystem'][0] == 1 ? false : true;

		$GRAFIK_SIDEBARS = json_decode( get_option( 'grafik_sidebars' ), true );

		$GRAFIK_SIDEBARS_GLOBAL_KEY = '';
		if( @$GRAFIK_META['grafik-meta-sidebars-noglobal'][0] != 1 ) {
			$GRAFIK_SIDEBARS_GLOBAL_KEY = get_option( 'grafik-global-sidebars' );
		}

		$GRAFIK_SIDEBARS_TYPE_KEY = '';
		if( @$GRAFIK_META['grafik-meta-sidebars-notype'][0] != 1 ) {
			$GRAFIK_SIDEBARS_TYPE_KEY = get_option( 'grafik-'.$GRAFIK_TYPE.'-sidebars' );
		}

		$GRAFIK_SIDEBARS_META_KEY = '';
		if( !empty( $GRAFIK_META['grafik-meta-sidebars'][0] ) && array_key_exists( $GRAFIK_META['grafik-meta-sidebars'][0], $GRAFIK_SIDEBARS ) ) {
			$GRAFIK_SIDEBARS_META_KEY = $GRAFIK_META['grafik-meta-sidebars'][0];
		}

		$GRAFIK_SIDEBARS_LEFTSIZE = '';
		$GRAFIK_SIDEBARS_RIGHTSIZE = '';
		if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY] ) ) {
			if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['left']['size'] ) ) $GRAFIK_SIDEBARS_LEFTSIZE = $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['left']['size'];
			if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['right']['size'] ) ) $GRAFIK_SIDEBARS_RIGHTSIZE = $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['right']['size'];
		}
		if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY] ) ) {
			if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['left']['size'] ) ) $GRAFIK_SIDEBARS_LEFTSIZE = $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['left']['size'];
			if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['right']['size'] ) ) $GRAFIK_SIDEBARS_RIGHTSIZE = $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['right']['size'];
		}
		if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY] ) ) {
			if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['left']['size'] ) ) $GRAFIK_SIDEBARS_LEFTSIZE = $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['left']['size'];
			if( !empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['right']['size'] ) ) $GRAFIK_SIDEBARS_RIGHTSIZE = $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['right']['size'];
		}

		$GRAFIK_META['grafik-meta-content-top'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-content-top'][0] ) ? "" : $GRAFIK_META['grafik-meta-content-top'][0] ) ) ) ) );
		$GRAFIK_META['grafik-meta-content-left'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-content-left'][0] ) ? "" : $GRAFIK_META['grafik-meta-content-left'][0] ) ) ) ) );
		$GRAFIK_META['grafik-meta-content-right'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-content-right'][0] ) ? "" : $GRAFIK_META['grafik-meta-content-right'][0] ) ) ) ) );
		$GRAFIK_META['grafik-meta-content-bottom'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-content-bottom'][0] ) ? "" : $GRAFIK_META['grafik-meta-content-bottom'][0] ) ) ) ) );

		$GRAFIK_META['grafik-meta-preview-desktop'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-preview-desktop'][0] ) ? "" : $GRAFIK_META['grafik-meta-preview-desktop'][0] ) ) ) ) );
		$GRAFIK_META['grafik-meta-preview-tablet'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-preview-tablet'][0] ) ? "" : $GRAFIK_META['grafik-meta-preview-tablet'][0] ) ) ) ) );
		$GRAFIK_META['grafik-meta-preview-phone'] = implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-preview-phone'][0] ) ? "" : $GRAFIK_META['grafik-meta-preview-phone'][0] ) ) ) ) );

		return
		'<div class="theme-content">'.
			'<div class="theme-content-meta">'.
				'<div class="theme-content-meta-top">'.
					'<div class="theme-content-meta-top-main">'.
						Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-content-top'] ).
					'</div>'.
				'</div>'.
				'<div class="theme-content-meta-middle">'.
					'<div class="interior">'.
						'<div class="theme-content-meta-middle-left" style="float:left;'.( empty( $GRAFIK_SIDEBARS_LEFTSIZE ) ? null : 'width:'.$GRAFIK_SIDEBARS_LEFTSIZE.';' ).'">'.
							( empty( $GRAFIK_SIDEBARS_GLOBAL_KEY ) ? null : Grafik_ShortcodeLoop( implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['left']['content'] ) ? "" : $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['left']['content'] ) ) ) ) ) ) ).
							( empty( $GRAFIK_SIDEBARS_TYPE_KEY ) ? null : Grafik_ShortcodeLoop( implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['left']['content'] ) ? "" : $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['left']['content'] ) ) ) ) ) ) ).
							( empty( $GRAFIK_SIDEBARS_META_KEY ) ? null : Grafik_ShortcodeLoop( implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['left']['content'] ) ? "" : $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['left']['content'] ) ) ) ) ) ) ).
							Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-content-left'] ).
						'</div>'.
						(
							!$meta_content ? null :
							'<div class="theme-content-meta-middle-main'.( empty( $GRAFIK_SIDEBARS_LEFTSIZE ) ? null : ' has-left' ).( empty( $GRAFIK_SIDEBARS_RIGHTSIZE ) ? null : ' has-right' ).'" style="float:left;width:calc(100%'.( empty( $GRAFIK_SIDEBARS_RIGHTSIZE ) ? null : ' - '.$GRAFIK_SIDEBARS_RIGHTSIZE ).( empty( $GRAFIK_SIDEBARS_LEFTSIZE ) ? null : ' - '.$GRAFIK_SIDEBARS_LEFTSIZE ).');">'.
								( $GRAFIK_TYPE == 'post' ? Grafik_ShortcodeLoop( '[PageTitle h="h2" post_category="false"]' ) : null ).
								( $GRAFIK_TYPE == 'post' ? $GRAFIK_POSTINFO : null ).
								( empty( $GRAFIK_META['grafik-meta-preview-desktop'] ) ? null : '<img src="'.$GRAFIK_META['grafik-meta-preview-desktop'].'" alt="'.( empty( $GRAFIK_TITLE ) ? null : $GRAFIK_TITLE.' - ' ).get_bloginfo( 'name' ).'" class="theme-content-preview-desktop" />' ).
								( empty( $GRAFIK_META['grafik-meta-preview-tablet'] ) ? null : '<img src="'.$GRAFIK_META['grafik-meta-preview-tablet'].'" alt="'.( empty( $GRAFIK_TITLE ) ? null : $GRAFIK_TITLE.' - ' ).get_bloginfo( 'name' ).'" class="theme-content-preview-tablet" />' ).
								( empty( $GRAFIK_META['grafik-meta-preview-phone'] ) ? null : '<img src="'.$GRAFIK_META['grafik-meta-preview-phone'].'" alt="'.( empty( $GRAFIK_TITLE ) ? null : $GRAFIK_TITLE.' - ' ).get_bloginfo( 'name' ).'" class="theme-content-preview-phone" />' ).
								$GRAFIK_BODY.
							'</div>'
						).
						'<div class="theme-content-meta-middle-right" style="float:right;'.( empty( $GRAFIK_SIDEBARS_RIGHTSIZE ) ? null : 'width:'.$GRAFIK_SIDEBARS_RIGHTSIZE.';' ).'">'.
							( empty( $GRAFIK_SIDEBARS_GLOBAL_KEY ) ? null : Grafik_ShortcodeLoop( implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['right']['content'] ) ? "" : $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_GLOBAL_KEY]['right']['content'] ) ) ) ) ) ) ).
							( empty( $GRAFIK_SIDEBARS_TYPE_KEY ) ? null : Grafik_ShortcodeLoop( implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['right']['content'] ) ? "" : $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_TYPE_KEY]['right']['content'] ) ) ) ) ) ) ).
							( empty( $GRAFIK_SIDEBARS_META_KEY ) ? null : Grafik_ShortcodeLoop( implode( "", explode( "\n", trim( stripslashes( base64_decode( empty( $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['right']['content'] ) ? "" : $GRAFIK_SIDEBARS[$GRAFIK_SIDEBARS_META_KEY]['right']['content'] ) ) ) ) ) ) ).
							Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-content-right'] ).
						'</div>'.
					'</div>'.
				'</div>'.
				'<div class="theme-content-meta-bottom">'.
					'<div class="theme-content-meta-bottom-main">'.
						Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-content-bottom'] ).
					'</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	}

	function Grafik_Footer() {

		global $GRAFIK_TYPE;
		global $GRAFIK_META;
		global $GRAFIK_OPTIONS;

		$global_footer = true;
		if( $GRAFIK_OPTIONS['grafik-global-footer-off'] == 1 ) $global_footer = false;
		if( $GRAFIK_OPTIONS['grafik-global-footer-notype'] == 1 ) $global_footer = false;
		if( @$GRAFIK_META['grafik-meta-footer-noglobal'][0] == 1 ) $global_footer = false;

		$type_footer = true;
		if( $GRAFIK_OPTIONS['grafik-type-footer-off'] == 1 ) $type_footer = false;
		if( @$GRAFIK_META['grafik-meta-footer-notype'][0] == 1 ) $type_footer = false;

		$meta_footer = false;
		$GRAFIK_META['grafik-meta-footer-tl'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-footer-tl'] ) ? "" : $GRAFIK_META['grafik-meta-footer-tl'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-footer-tr'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-footer-tr'] ) ? "" : $GRAFIK_META['grafik-meta-footer-tr'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-footer-ml'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-footer-ml'] ) ? "" : $GRAFIK_META['grafik-meta-footer-ml'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-footer-mr'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-footer-mr'] ) ? "" : $GRAFIK_META['grafik-meta-footer-mr'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-footer-bl'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-footer-bl'] ) ? "" : $GRAFIK_META['grafik-meta-footer-bl'][0] ) ) ) );
		$GRAFIK_META['grafik-meta-footer-br'] = nl2br( trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-footer-br'] ) ? "" : $GRAFIK_META['grafik-meta-footer-br'][0] ) ) ) );
		if( !empty( $GRAFIK_META['grafik-meta-footer-tl'] ) ) $meta_footer = true;
		if( !empty( $GRAFIK_META['grafik-meta-footer-tr'] ) ) $meta_footer = true;
		if( !empty( $GRAFIK_META['grafik-meta-footer-ml'] ) ) $meta_footer = true;
		if( !empty( $GRAFIK_META['grafik-meta-footer-mr'] ) ) $meta_footer = true;
		if( !empty( $GRAFIK_META['grafik-meta-footer-bl'] ) ) $meta_footer = true;
		if( !empty( $GRAFIK_META['grafik-meta-footer-br'] ) ) $meta_footer = true;

		return
		"<div class=\"theme-footer".( !$global_footer ? " non-global" : null ).( !$type_footer ? " non-type" : null ).( !$meta_footer ? " non-meta" : null )."\">".
			( !$meta_footer ? null :
			"<div class=\"theme-footer-meta\">".
				"<div class=\"theme-footer-meta-top\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-meta-top-left\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-footer-tl'] )."</div>".
						"<div class=\"theme-footer-meta-top-right\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-footer-tr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-footer-meta-middle\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-meta-middle-left\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-footer-ml'] )."</div>".
						"<div class=\"theme-footer-meta-middle-right\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-footer-mr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-footer-meta-bottom\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-meta-bottom-left\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-footer-bl'] )."</div>".
						"<div class=\"theme-footer-meta-bottom-right\">".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-footer-br'] )."</div>".
					"</div>".
				"</div>".
			"</div>" ).
			( !$type_footer ? null :
			"<div class=\"theme-footer-type\">".
				"<div class=\"theme-footer-type-top\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-type-top-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-footer-tl'] )."</div>".
						"<div class=\"theme-footer-type-top-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-footer-tr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-footer-type-middle\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-type-middle-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-footer-ml'] )."</div>".
						"<div class=\"theme-footer-type-middle-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-footer-mr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-footer-type-bottom\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-type-bottom-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-footer-bl'] )."</div>".
						"<div class=\"theme-footer-type-bottom-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-footer-br'] )."</div>".
					"</div>".
				"</div>".
			"</div>" ).
			( !$global_footer ? null :
			"<div class=\"theme-footer-global\">".
				"<div class=\"theme-footer-global-top\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-global-top-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-footer-tl'] )."</div>".
						"<div class=\"theme-footer-global-top-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-footer-tr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-footer-global-middle\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-global-middle-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-footer-ml'] )."</div>".
						"<div class=\"theme-footer-global-middle-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-footer-mr'] )."</div>".
					"</div>".
				"</div>".
				"<div class=\"theme-footer-global-bottom\">".
					"<div class=\"interior\">".
						"<div class=\"theme-footer-global-bottom-left\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-footer-bl'] )."</div>".
						"<div class=\"theme-footer-global-bottom-right\">".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-footer-br'] )."</div>".
					"</div>".
				"</div>".
			"</div>" ).
		"</div>";

	}

	function Grafik_BodyScripts() {

		global $GRAFIK_TYPE;
		global $GRAFIK_META;
		global $GRAFIK_OPTIONS;

		$global_bodyscripts = true;
		if( $GRAFIK_OPTIONS['grafik-global-bodyscripts-off'] == 1 ) $global_bodyscripts = false;
		if( $GRAFIK_OPTIONS['grafik-global-bodyscripts-notype'] == 1 )$global_bodyscripts = false;
		if( @$GRAFIK_META['grafik-meta-bodyscripts-noglobal'][0] == 1 ) $global_bodyscripts = false;

		$type_headscripts = true;
		if( $GRAFIK_OPTIONS['grafik-type-bodyscripts-off'] == 1 ) $type_bodyscripts = false;
		if( @$GRAFIK_META['grafik-meta-bodyscripts-notype'][0] == 1 ) $type_bodyscripts = false;

		$GRAFIK_META['grafik-meta-bodyscripts'] = trim( stripslashes( base64_decode( empty( $GRAFIK_META['grafik-meta-bodyscripts'] ) ? '' : $GRAFIK_META['grafik-meta-bodyscripts'][0] ) ) );

		return
		( !$global_bodyscripts || empty( $GRAFIK_OPTIONS['grafik-global-bodyscripts'] ) ? null : "\n<!-- theme-global-bodyscripts:in -->\n".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-global-bodyscripts'] )."\n<!-- theme-global-bodyscripts:out -->" ).
		( !$type_bodyscripts || empty( $GRAFIK_OPTIONS['grafik-type-bodyscripts'] ) ? null : "\n<!-- theme-type-bodyscripts:in -->\n".Grafik_ShortcodeLoop( $GRAFIK_OPTIONS['grafik-type-bodyscripts'] )."\n<!-- theme-type-bodyscripts:out -->" ).
		( empty( $GRAFIK_META['grafik-meta-bodyscripts'] ) ? null : "\n<!-- theme-meta-bodyscripts:in -->\n".Grafik_ShortcodeLoop( $GRAFIK_META['grafik-meta-bodyscripts'] )."\n<!-- theme-meta-bodyscripts:out -->" );

	}

	function Grafik_ShortcodeLoop($content = '') {

		$old_length = count($content);
		if( empty( $content ) ) return '';
		$content = do_shortcode($content);
		$new_length = count($content);
		if($old_length != $new_length) {
			$content = Grafik_ShortcodeLoop($content);
		}
		return $content;

	}

	function Grafik_MinifyCSS( $css ) {

		$css = str_replace( " {", "{", $css );
		$css = str_replace( "{ ", "{", $css );
		$css = str_replace( " }", "}", $css );
		$css = str_replace( "} ", "}", $css );
		$css = str_replace( " :", ":", $css );
		$css = str_replace( ": ", ":", $css );
		$css = str_replace( " ;", ";", $css );
		$css = str_replace( "; ", ";", $css );
		$css = str_replace( ";}", "}", $css );
		$css = str_replace( "\n", "", $css );
		$css = str_replace( "\t", "", $css );
		return $css;

	}

	function Grafik_EchoString($func, $args = array()) {

		ob_start();
		call_user_func_array($func, $args);
		$string = ob_get_contents();
		ob_end_clean();
		return $string;

	}

?>