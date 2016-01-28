<?php

	function Grafik_Meta_Save( $entry_id ) {

		// Ignore Autosaves...
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		// Enforce User Permissions...
		if( isset( $_POST['post_type'] ) && $_POST['post_type'] == 'post' && !current_user_can( 'edit_post', $entry_id ) ) return;
		if( isset( $_POST['post_type'] ) && $_POST['post_type'] == 'page' && !current_user_can( 'edit_page', $entry_id ) ) return;

		// Previews
		if( isset( $_POST['grafik-nonce-metapreviews'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metapreviews'], 'grafik-nonce-metapreviews' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-preview-desktop', sanitize_text_field( base64_encode( @$_POST['grafik-meta-preview-desktop'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-preview-tablet', sanitize_text_field( base64_encode( @$_POST['grafik-meta-preview-tablet'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-preview-phone', sanitize_text_field( base64_encode( @$_POST['grafik-meta-preview-phone'] ) ) );
			}
		}

		// Styles
		if( isset( $_POST['grafik-nonce-metastyles'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metastyles'], 'grafik-nonce-metastyles' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-styles-noglobal', @$_POST['grafik-meta-styles-noglobal'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-styles-notype', @$_POST['grafik-meta-styles-notype'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-styles', sanitize_text_field( base64_encode( @$_POST['grafik-meta-styles'] ) ) );
			}
		}

		// Scripts
		if( isset( $_POST['grafik-nonce-metascripts'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metascripts'], 'grafik-nonce-metascripts' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-headscripts-noglobal', @$_POST['grafik-meta-headscripts-noglobal'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-headscripts-notype', @$_POST['grafik-meta-headscripts-notype'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-headscripts', sanitize_text_field( base64_encode( @$_POST['grafik-meta-headscripts'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-bodyscripts-noglobal', @$_POST['grafik-meta-bodyscripts-noglobal'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-bodyscripts-notype', @$_POST['grafik-meta-bodyscripts-notype'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-bodyscripts', sanitize_text_field( base64_encode( @$_POST['grafik-meta-bodyscripts'] ) ) );
			}
		}

		// Header
		if( isset( $_POST['grafik-nonce-metaheader'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metaheader'], 'grafik-nonce-metaheader' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-header-noglobal', @$_POST['grafik-meta-header-noglobal'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-header-notype', @$_POST['grafik-meta-header-notype'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-header-tl', sanitize_text_field( base64_encode( @$_POST['grafik-meta-header-tl'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-header-tr', sanitize_text_field( base64_encode( @$_POST['grafik-meta-header-tr'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-header-ml', sanitize_text_field( base64_encode( @$_POST['grafik-meta-header-ml'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-header-mr', sanitize_text_field( base64_encode( @$_POST['grafik-meta-header-mr'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-header-bl', sanitize_text_field( base64_encode( @$_POST['grafik-meta-header-bl'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-header-br', sanitize_text_field( base64_encode( @$_POST['grafik-meta-header-br'] ) ) );
			}
		}

		// Sidebars
		if( isset( $_POST['grafik-nonce-metasidebars'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metasidebars'], 'grafik-nonce-metasidebars' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-sidebars-noglobal', @$_POST['grafik-meta-sidebars-noglobal'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-sidebars-notype', @$_POST['grafik-meta-sidebars-notype'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-sidebars', sanitize_text_field( @$_POST['grafik-meta-sidebars'] ) );
			}
		}

		// Content
		if( isset( $_POST['grafik-nonce-metacontent'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metacontent'], 'grafik-nonce-metacontent' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-content-nosystem', @$_POST['grafik-meta-content-nosystem'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-content-top', sanitize_text_field( base64_encode( @$_POST['grafik-meta-content-top'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-content-right', sanitize_text_field( base64_encode( @$_POST['grafik-meta-content-right'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-content-bottom', sanitize_text_field( base64_encode( @$_POST['grafik-meta-content-bottom'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-content-left', sanitize_text_field( base64_encode( @$_POST['grafik-meta-content-left'] ) ) );
			}
		}

		// Footer
		if( isset( $_POST['grafik-nonce-metafooter'] ) ) {
			if( wp_verify_nonce( $_POST['grafik-nonce-metafooter'], 'grafik-nonce-metafooter' ) ) {
				update_post_meta( $entry_id, 'grafik-meta-footer-noglobal', @$_POST['grafik-meta-footer-noglobal'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-footer-notype', @$_POST['grafik-meta-footer-notype'] == 'on' ? 1 : 0 );
				update_post_meta( $entry_id, 'grafik-meta-footer-tl', sanitize_text_field( base64_encode( @$_POST['grafik-meta-footer-tl'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-footer-tr', sanitize_text_field( base64_encode( @$_POST['grafik-meta-footer-tr'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-footer-ml', sanitize_text_field( base64_encode( @$_POST['grafik-meta-footer-ml'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-footer-mr', sanitize_text_field( base64_encode( @$_POST['grafik-meta-footer-mr'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-footer-bl', sanitize_text_field( base64_encode( @$_POST['grafik-meta-footer-bl'] ) ) );
				update_post_meta( $entry_id, 'grafik-meta-footer-br', sanitize_text_field( base64_encode( @$_POST['grafik-meta-footer-br'] ) ) );
			}
		}

	}

?>