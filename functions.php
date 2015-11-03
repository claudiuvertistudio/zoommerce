<?php

/**
 * Remove hooks from parent theme
 */
add_action('init', 'zoocommerce_remove_hooks');
function zoocommerce_remove_hooks() {
	remove_action('wp_footer', 'zerif_php_style', 1);
}

/**
 * Enqueue styles
 */
add_action( 'wp_enqueue_scripts', 'zoocommerce_enqueue_styles' );

function zoocommerce_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/**
 * Enqueue scripts
 */
add_action( 'wp_enqueue_scripts', 'zoocommerce_enqueue_scripts' );
function zoocommerce_enqueue_scripts() {
  	wp_enqueue_script( 'zoocommerce_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );
  	wp_enqueue_script( 'zoocommerce_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );
}

function parallax_one_customizer_script() {
	wp_enqueue_script( 'parallax_one_customizer_script', parallax_get_file('/assets/js/parallax_one_customizer.js'), array("jquery","jquery-ui-draggable"),'1.0.0', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'parallax_one_customizer_script' );

function parallax_get_file($file){
	$file_parts = pathinfo($file);
	$accepted_ext = array('jpg','img','png','css','js');
	if( in_array($file_parts['extension'], $accepted_ext) ){
		$file_path = get_stylesheet_directory() . $file;
		if ( file_exists( $file_path ) ){
			return esc_url(get_stylesheet_directory_uri() . $file); 
		} else {
			return esc_url(get_template_directory_uri() . $file);
		}
	}
}

function parallax_one_sanitize_repeater($input){
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
 * Theme Setup
 */
add_action( 'after_setup_theme', 'zoocommerce_setup' );
function zoocommerce_setup() {

	// Add Theme Support
	add_theme_support( 'title-tag' );

	// Load Theme Textdomain
	load_theme_textdomain( 'zoocommerce', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . '/languages/$locale.php';
	if ( is_readable( $locale_file ) ):
		require_once( $locale_file );
	endif;
	
}

/**
 * TGM Plugin Activation
 */
if(!function_exists('zoocommerce_tgm_activation')) {
	require_once get_template_directory() . '/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'zoocommerce_tgm_activation' );
	function zoocommerce_tgm_activation() {

		$plugins = array(
			array(
				'name'      => 'WooCommerce',
				'slug'      => 'woocommerce',
				'required'  => false,
			)
		);

		$config = array(
	        'default_path' => '',                      
	        'menu'         => 'tgmpa-install-plugins', 
	        'has_notices'  => true,                   
	        'dismissable'  => true,                  
	        'dismiss_msg'  => '',                   
	        'is_automatic' => false,                 
	        'message'      => '',     
	        'strings'      => array(
	            'page_title'                      => __( 'Install Required Plugins', 'zoocommerce' ),
	            'menu_title'                      => __( 'Install Plugins', 'zoocommerce' ),
	            'installing'                      => __( 'Installing Plugin: %s', 'zoocommerce' ), 
	            'oops'                            => __( 'Something went wrong with the plugin API.', 'zoocommerce' ),
	            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
	            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
	            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
	            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), 
	            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), 
	            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), 
	            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
	            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
	            'return'                          => __( 'Return to Required Plugins Installer', 'zoocommerce' ),
	            'plugin_activated'                => __( 'Plugin activated successfully.', 'zoocommerce' ),
	            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'zoocommerce' ), 
	            'nag_type'                        => 'updated'
	        )
	    );

		tgmpa( $plugins, $config );
	}
}


/**
 * HTML5shiv
 */
if(!function_exists('zoocommerce_html5shiv')) {
	add_action( 'wp_head', 'zoocommerce_html5shiv' );

	function zoocommerce_html5shiv () {
	    echo '<!--[if lt IE 9]>
	    		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    	<![endif]-->';
	}
}


/**
 * Customizer CSS output
 */
if(!function_exists('zoocommerce_customizer_style_css')) {
	
	add_action('wp_footer','zoocommerce_customizer_style_css');
	function zoocommerce_customizer_style_css() {
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
				array(
					'selector' => '.intro-text',
					'style' => 'color',
					'property' => 'zerif_bigtitle_header_color'
				),
				array(
					'selector' => '.sub-text',
					'style' => 'color',
					'property' => 'zerif_bigtitle_subheader_color'
				),
				array(
					'selector' => '.buttons .custom-button',
					'style' => 'background',
					'property' => 'zerif_bigtitle_button_background_color'
				),
				array(
					'selector' => '.buttons .custom-button',
					'style' => 'border',
					'property' =>  'zerif_bigtitle_button_border_color',
					'before_property' => '2px solid ',
					'important' => true
				),
				array(
					'selector' => '.buttons .custom-button:hover',
					'style' => 'background',
					'property' => 'zerif_bigtitle_button_background_color_hover'
				),
				array(
					'selector' => '.intro-text',
					'style' => 'background',
					'property' => 'zerif_bigtitle_background'
				),
				array(
					'selector' => '#footer',
					'style' => 'background',
					'property' => 'zerif_footer_background'
				),
				array(
					'selector' => '.copyright',
					'style' => 'background',
					'property' => 'zerif_footer_socials_background'
				),
				array(
					'selector' => '#footer, .company-details',
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
					'property' => 'zerif_footer_socials_hover'
				),
			);

		if($styles) {
			$return .= ' <style type="text/css">';

			foreach($styles as $key => $val) {

				//If style is added in customizer, create a new row in output
				if(get_theme_mod($val['property'])) {

					//Display selector
					if(array_key_exists('selector', $val) && !empty($val['selector'])) {
						$return .= $val['selector'];
					} else {
						error_log("Function: zoocommerce_customizer_style_css() - Array Key 'selector' not defined for " . $val['property']);
					}

					$return .= '{';

					if(array_key_exists('style', $val) && !empty($val['style'])) {
						$return .= $val['style'] . ':';
					} else {
						error_log("Function: zoocommerce_customizer_style_css() - Array Key 'style' not defined for " . $val['property']);
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


?>