<?php

/**
 * Sanitize repeater field
 */
function zoommerce_sanitize_repeater($input){
	$input_decoded = json_decode($input,true);
	$allowed_html = array(
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'a' => array(
			'href' => array(),
			'class' => array(),
			'id' => array(),
			'target' => array()
		),
		'button' => array(
			'class' => array(),
			'id' => array()
		)
	);
	foreach ($input_decoded as $boxk => $box ){
		foreach ($box as $key => $value){
			if ($key == 'text'){
				$input_decoded[$boxk][$key] = wp_kses($value, $allowed_html);
				
			} else {
				$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );
			}
			
		}
	}
	
	return json_encode($input_decoded);
}

/**
 * Customizer CSS output
 */
if(!function_exists('zoommerce_customizer_style_css')) {
	
	add_action('wp_footer','zoommerce_customizer_style_css');
	function zoommerce_customizer_style_css() {
		/*
			array(
				'selector' => '.buttons .custom-button',
				'style' => 'background-image',
				'property' => 'zerif_bigtitle_button_border_color'
				'before_property' => 'url(',
				'after_property' => ')'
				'important' => true
			),
		*/
		$return = '';
		$styles = array(

				/**
				 * Home: Big banner colors
				 */
				array(
					'selector' => '.home-header-wrap.overlay',
					'style' => 'background',
					'property' => 'zerif_bigbanner_background_color' 
				),
				array(
					'selector' => '.home-header-wrap .sub-text',
					'style' => 'color',
					'property' => 'zerif_bigbanner_subtitle_color',
					'important' => true
				),
				array(
					'selector' => '.home-header-wrap .intro-text',
					'style' => 'color',
					'property' => 'zerif_bigtitle_header_color'
				),
				
				array(
					'selector' => '.home-header-wrap .buttons .custom-button',
					'style' => 'background',
					'property' => 'zerif_bigbanner_button_bg_color'
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button:hover',
					'style' => 'background',
					'property' => 'zerif_bigbanner_button_bg_color_hover'
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button',
					'style' => 'border',
					'property' =>  'zerif_bigbanner_button_border_color',
					'before_property' => '2px solid ',
					'important' => true
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button:hover',
					'style' => 'border',
					'property' =>  'zerif_bigbanner_button_border_color_hover',
					'before_property' => '2px solid ',
					'important' => true
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button',
					'style' => 'color',
					'property' => 'zerif_bigtitle_1button_color'
				),
				array(
					'selector' => '.home-header-wrap .buttons .custom-button:hover',
					'style' => 'color',
					'property' => 'zerif_bigbanner_button_text_hover'
				),

				/**
				 * Home: Our focus
				 */
				array(
					'selector' => '.focus-box:nth-child(4n+1) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_1box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+1) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_1box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+2) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_2box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+2) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_2box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+3) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_3box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+3) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_3box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+4) .service-icon:hover',
					'style' => 'border',
					'before_property' => '10px solid ',
					'property' => 'zerif_ourfocus_4box'
				),

				array(
					'selector' => '.focus-box:nth-child(4n+4) .red-border-bottom:before',
					'style' => 'background',
					'property' => 'zerif_ourfocus_4box'
				),

				array(
					'selector' => '#focus',
					'style' => 'background',
					'property' => 'zerif_ourfocus_background'
				),

				array(
					'selector' => '.focus-box h5',
					'style' => 'color',
					'property' => 'zerif_ourfocus_box_title_color'
				),

				array(
					'selector' => '.focus-box p',
					'style' => 'color',
					'property' => 'zerif_ourfocus_box_text_color'
				),

				array(
					'selector' => '.focus-box .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_ourfocus_header'
				),

				array(
					'selector' => '.focus-box .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_ourfocus_header'
				),


				/**
				 * Home: Portfolio
				 */
				array(
					'selector' => '#works .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_portofolio_header'
				),
				array(
					'selector' => '#works .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_portofolio_header'
				),
				array(
					'selector' => '#works .project-details > *',
					'style' => 'color',
					'property' => 'zerif_portofolio_text',
					'important'	=> true
				),

				array(
					'selector' => '#works',
					'style' => 'background-image',
					'property' => 'portfolio_bg_image',
					'before_property' => 'url(',
					'after_property' => ')',
					'exclude' => 'zerif_portofolio_background'
				),

				array(
					'selector' => '#works',
					'style' => 'background',
					'property' => 'zerif_portofolio_background',
				),

				/**
				 * Home: Aboutus
				 */
				array(
					'selector' => '#aboutus.about-us',
					'style' => 'background',
					'property' => 'zerif_aboutus_background'
				),
				array(
					'selector' => '#aboutus .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_aboutus_title_color'
				),
				array(
					'selector' => '#aboutus .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_aboutus_title_color'
				),


				/**
				 * Home: Our team
				 */
				array(
					'selector' => '#team.our-team',
					'style' => 'background',
					'property' => 'zerif_ourteam_background'
				),
				array(
					'selector' => '#team .home_headline h3',
					'style' => 'color',
					'property' => 'our_team_heading_clor',
					'important'	=> true
				),
				array(
					'selector' => '#team .home_headline h4',
					'style' => 'color',
					'property' => 'our_team_subtitle_clor',
					'important'	=> true
				),
				array(
					'selector' => '#team .team-member .details',
					'style' => 'color',
					'property' => 'zerif_ourteam_text'
				),
				array(
					'selector' => '#team .team-member .social-icons ul li a',
					'style' => 'color',
					'property' => 'zerif_ourteam_socials'
				),
				array(
					'selector' => '.team-member .social-icons ul li a:hover',
					'style' => 'color',
					'property' => 'zerif_ourteam_socials_hover',
					'important'	=> true
				),
				array(
					'selector' => '#team .team-member .member-details,#team .team-member .member-details h5',
					'style' => 'color',
					'property' => 'zerif_ourteam_header'
				),


				/**
				 * Home: Ribbon Right
				 */
				array(
					'selector' => '#ribbon_right',
					'style' => 'background',
					'property' => 'zerif_ribbonright_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right h3.white-text',
					'style' => 'color',
					'property' => 'zerif_ribbonright_text_color',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary',
					'style' => 'background',
					'property' => 'zerif_ribbonright_button_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary:hover',
					'style' => 'background',
					'property' => 'zerif_ribbonright_button_background_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary',
					'style' => 'color',
					'property' => 'zerif_ribbonright_button_text',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary:hover',
					'style' => 'color',
					'property' => 'zerif_ribbonright_button_text_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonright_button_border',
					'important' => true
				),
				array(
					'selector' => '#ribbon_right .btn-primary:hover',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonright_button_border_hover',
					'important' => true
				),

				/**
				 * Home: Ribbon Bottom
				 */
				array(
					'selector' => '#ribbon_bottom',
					'style' => 'background',
					'property' => 'zerif_ribbon_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom h3.white-text',
					'style' => 'color',
					'property' => 'zerif_ribbon_text_color',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary',
					'style' => 'background',
					'property' => 'zerif_ribbon_button_background',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary:hover',
					'style' => 'background',
					'property' => 'zerif_ribbon_button_background_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary',
					'style' => 'color',
					'property' => 'zerif_ribbonbottom_button_text',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary:hover',
					'style' => 'color',
					'property' => 'zerif_ribbonbottom_button_text_hover',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonbottom_button_border',
					'important' => true
				),
				array(
					'selector' => '#ribbon_bottom .btn-primary:hover',
					'style' => 'border',
					'before_property' => '1px solid ',
					'property' => 'zerif_ribbonbottom_button_border_hover',
					'important' => true
				),

				/**
				 * Home: Priceing table
				 */
				array(
					'selector' => '#pricingtable.packages',
					'style' => 'background',
					'property' => 'zerif_packages_background'
				),
				array(
					'selector' => '#pricingtable.packages .package-header h4',
					'style' => 'color',
					'property' => 'zerif_package_title_color'
				),
				array(
					'selector' => '#pricingtable.packages .package-header .meta-text',
					'style' => 'color',
					'property' => 'zerif_package_title_color'
				),
				array(
					'selector' => '#pricingtable.packages .price-meta',
					'style' => 'color',
					'property' => 'zerif_package_text_color'
				),
				array(
					'selector' => '#pricingtable.packages .package ul li',
					'style' => 'color',
					'property' => 'zerif_package_text_color'
				),
				array(
					'selector' => '#pricingtable.packages .package a.custom-button',
					'style' => 'color',
					'property' => 'zerif_package_button_text_color'
				),
				array(
					'selector' => '#pricingtable.packages .package a.custom-button',
					'style' => 'background',
					'property' => 'zerif_package_button_background_color',
					'important' => true
				),
				array(
					'selector' => '#pricingtable.packages .package .price-container',
					'style' => 'background',
					'property' => 'zerif_package_price_background_color'
				),
				array(
					'selector' => '#pricingtable.packages .package .price h4',
					'style' => 'color',
					'property' => 'zerif_package_price_color'
				),

				/**
				 * Home: Latest posts
				 */
				array(
					'selector' => '#home_blog .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_latestnews_header_title_color'
				),

				array(
					'selector' => '#home_blog .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_latestnews_header_subtitle_color'
				),

				array(
					'selector' => '#home_blog',
					'style' => 'background-image',
					'property' => 'latestnews_bg_image',
					'before_property' => 'url(',
					'after_property' => ')',
					'exclude' => 'zerif_latestnews_background'
				),

				array(
					'selector' => '#home_blog',
					'style' => 'background',
					'property' => 'zerif_latestnews_background',
				),


				/**
				 * Home: Testimonials
				 */
				array(
					'selector' => '#testimonials',
					'style' => 'background',
					'property' => 'zerif_testimonials_background'
				),

				array(
					'selector' => '#testimonials .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_testimonials_header_subtitle_color'
				),

				array(
					'selector' => '#testimonials .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_testimonials_header'
				),

				array(
					'selector' => '#testimonials .message',
					'style' => 'color',
					'property' => 'zerif_testimonials_text'
				),

				array(
					'selector' => '#testimonials .client-info .client-name',
					'style' => 'color',
					'property' => 'zerif_testimonials_author'
				),

				/**
				 * General: Footer
				 */
				array(
					'selector' => '#footer, #footer .section-footer-title',
					'style' => 'background',
					'property' => 'zerif_footer_background'
				),
				array(
					'selector' => '.copyright',
					'style' => 'background',
					'property' => 'zerif_footer_socials_background'
				),
				array(
					'selector' => '#footer, #footer .company-details, footer .company-details a, #zerif-copyright',
					'style' => 'color',
					'property' => 'zerif_footer_text_color'
				),
				array(
					'selector' => '#footer .social li a',
					'style' => 'color',
					'property' => 'zerif_footer_socials'
				),
				array(
					'selector' => '#footer .social li a:hover',
					'style' => 'color',
					'property' => 'zerif_footer_socials_hover',
					'important' => true
				),
				array(
					'selector' => '#footer .footer-widgets',
					'style' => 'border-color',
					'property' => 'zerif_footer_socials_border'
				),

				/**
				 * Home: Contact us
				 */
				array(
					'selector' => '#contact',
					'style' => 'background',
					'property' => 'zerif_contacus_background',
				),

				array(
					'selector' => '#contact .home_headline h3',
					'style' => 'color',
					'property' => 'zerif_contacus_header',
					'important' => true
				),

				array(
					'selector' => '#contact .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_contacus_header',
					'important' => true
				),

				array(
					'selector' => '#contact .btn-primary',
					'style' => 'background',
					'property' => 'zerif_contacus_button_background',
					'important' => true
				),

				array(
					'selector' => '#contact .btn-primary:hover',
					'style' => 'background',
					'property' => 'zerif_contacus_button_background_hover',
					'important' => true
				),

				array(
					'selector' => '#contact .btn-primary',
					'style' => 'color',
					'property' => 'zerif_contacus_button_color',
					'important' => true
				),

				/**
				 * Home: Subscribe
				 */
				array(
					'selector' => '#newsletter_section .home_headline h3, #newsletter_section .home_headline h4',
					'style' => 'color',
					'property' => 'zerif_subscribe_header_color'
				),

				array(
					'selector' => '#newsletter_section input[type="submit"], #newsletter_section button',
					'style' => 'background',
					'property' => 'zerif_subscribe_button_background_color'
				),

				array(
					'selector' => '#newsletter_section input[type="submit"], #newsletter_section button',
					'style' => 'color',
					'property' => 'zerif_subscribe_button_color'
				),

				array(
					'selector' => '#newsletter_section input[type="submit"]:hover, #newsletter_section button:hover',
					'style' => 'background',
					'property' => 'zerif_subscribe_button_background_color_hover'
				),

				/**
				 * General: Colors
				 */
				array(
					'selector' => 'body',
					'style' => 'background',
					'property' => 'zerif_background_color',
				),
				array(
					'selector' => 'header.header',
					'style' => 'background',
					'property' => 'zerif_navbar_color',
				),
				array(
					'selector' => '.widget-title, .entry-title, .woocommerce table.shop_table th, .cart-collaterals h2, form.woocommerce-checkout h3, .woocommerce-order-received .woocommerce h2, .woocommerce-account .woocommerce h2',
					'style' => 'color',
					'property' => 'zerif_titles_color',
				),
				array(
					'selector' => 'header.header',
					'style' => 'background',
					'property' => 'zerif_navbar_color',
				),
				array(
					'selector' => '#content a:not(.button):not(.remove)',
					'style' => 'color',
					'property' => 'zerif_links_color',
					'important' => true
				),
				array(
					'selector' => '#content a:not(.button):not(.remove):hover',
					'style' => 'color',
					'property' => 'zerif_links_color_hover',
					'important' => true
				),

				array(
					'selector' => '#content a.remove',
					'style' => 'color',
					'property' => 'zerif_links_color',
					'important' => true
				),
				array(
					'selector' => '#content a.remove:hover',
					'style' => 'background',
					'property' => 'zerif_links_color_hover',
					'important' => true
				),

				/**
				 * General: Normal buttons Colors
				 */
				array(
					'selector' => '#content input.button:not(.add_to_cart_button), .woocommerce a.button.alt, .viewallproducts, #respond .form-submit input#submit',
					'style' => 'background',
					'property' => 'zerif_buttons_background_color',
					'important' => true
				),

				array(
					'selector' => '#content input.button:not(.add_to_cart_button):hover, .woocommerce a.button.alt:hover, .viewallproducts:hover, #respond .form-submit input#submit:hover',
					'style' => 'background',
					'property' => 'zerif_buttons_background_color_hover',
					'important' => true
				),

				array(
					'selector' => '#content input.button:not(.add_to_cart_button), .woocommerce a.button.alt, .viewallproducts, #respond .form-submit input#submit',
					'style' => 'color',
					'property' => 'zerif_buttons_text_color',
					'important' => true
				),

				/**
				 * General: Shop buttons colors
				 */
				array(
					'selector' => 'a.add_to_cart_button, a.product_type_grouped',
					'style' => 'background',
					'property' => 'zerif_shop_buttons_background_color',
					'important' => true
				),
				array(
					'selector' => 'a.add_to_cart_button:hover, a.product_type_grouped:hover',
					'style' => 'background',
					'property' => 'zerif_shop_buttons_background_color_hover',
					'important' => true
				),
				array(
					'selector' => 'a.add_to_cart_button, a.product_type_grouped',
					'style' => 'color',
					'property' => 'zerif_shop_buttons_text_color',
					'important' => true
				),
				array(
					'selector' => 'a.add_to_cart_button:hover, a.product_type_grouped:hover',
					'style' => 'color',
					'property' => 'zerif_shop_buttons_text_color_hover',
					'important' => true
				),

			);

		if($styles) {
			$return .= ' <style type="text/css">';
			$excludes = array();
			$excludes_keys = array();

			//Add items to exclude list
			foreach($styles as $key => $val) {
				if(array_key_exists('exclude', $val) && !empty($val['exclude'])) {
					$property = get_theme_mod($val['property']);

					if($property) {
						array_push($excludes, $val['exclude']);
					}
				}
			}

			// Add items to exclude keys list
			foreach($styles as $key => $val) {
				if(array_key_exists('property', $val) && !empty($val['property'])) {
					foreach ($excludes as $poz => $exclude) {
						if($val['property'] == $exclude) {
							array_push($excludes_keys, $key);
						}
					}
				}
			}

			foreach($styles as $key => $val) {
					
				//If style is added in customizer, create a new row in output
				$property = get_theme_mod($val['property']);

				if($property && !in_array($key, $excludes_keys)) {

					//Display selector
					if(array_key_exists('selector', $val) && !empty($val['selector'])) {
						$return .= $val['selector'];
					} else {
						error_log("Function: zoommerce_customizer_style_css() - Array Key 'selector' not defined for " . $val['property']);
					}

					$return .= '{';

					if(array_key_exists('style', $val) && !empty($val['style'])) {
						$return .= $val['style'] . ':';
					} else {
						error_log("Function: zoommerce_customizer_style_css() - Array Key 'style' not defined for " . $val['property']);
					}

					if(array_key_exists('before_property', $val) && !empty($val['before_property'])) {
						$return .= $val['before_property'];
					}

					if(array_key_exists('property', $val) && !empty($val['property'])) {
						$return .= esc_html(get_theme_mod($val['property']));
					}

					if(array_key_exists('after_property', $val) && !empty($val['after_property'])) {
						$return .= $val['after_property'];
					}

					if(array_key_exists('important', $val) && !empty($val['important'])) {
						$return .= ' !important';
					}

					$return .= ';}';
				}
			}

			$return .=  '</style>';
		}

		echo $return;
		
	}
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'zoommerce_is_woocommerce_activated' ) ) {
	function zoommerce_is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Breadcrumb & blog image in header
 */
add_action ('zerif_after_header', 'zoommerce_after_header_function' );
function zoommerce_after_header_function() {

	/* top image on blog page */
	if ( is_page_template( 'template-blog.php' ) || is_page_template( 'template-blog-large.php' ) ) {
		zoommerce_blog_top_image();
	}

	/* add breadcrumb */
	if( !is_home() || !is_front_page() ) :
		echo '<div id="breadcrumb">';	
		if( function_exists('woocommerce_breadcrumb') ) {
			woocommerce_breadcrumb();
		}

		echo '</div><!-- /#breadcrumb  -->';
	endif;

}

/**
 * Woocommerce breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
		'wrap_after'  => '</nav>',
		'before'      => '<li>',
		'after'       => '</li>',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
}


function zoommerce_blog_top_image() {

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	if($image) {
		$image_bg = 'style="background-image: url('.esc_url($image[0]).');"';
	} else {
		$image_bg = 'style="background-color: rgba(0, 0, 0, 0.7);"';
	}

	echo '<div id="wide_header" ' . $image_bg . '>';
		echo '<div class="container">';

				$heading = get_theme_mod('blog_heading', __('MY BLOG', 'zoommerce'));
				if($heading)
					echo '<div class="title">'.esc_html($heading).'</div>';

				$heading_sub = get_theme_mod('blog_heading_sub');
				if($heading_sub)
					echo '<p>'.esc_html($heading_sub).'</p>';

			echo '</div><!-- / .container -->';
		echo '<div class="overlay"></div><!-- / .overlay -->';
	echo '</div><!-- /#wide_header  -->';

}