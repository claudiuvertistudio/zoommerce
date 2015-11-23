<div id="big-banner">

<div class="home-header-wrap overlay">

<?php

	global $wp_customize;

	$zerif_parallax_img1 = get_theme_mod('zerif_parallax_img1',get_template_directory_uri() . '/images/background1.jpg');
	$zerif_parallax_img2 = get_theme_mod('zerif_parallax_img2',get_template_directory_uri() . '/images/background2.png');
	$zerif_parallax_use = get_theme_mod('zerif_parallax_show');

	if ( $zerif_parallax_use == 1 && (!empty($zerif_parallax_img1) || !empty($zerif_parallax_img2)) ) {
		echo '<ul id="parallax_move">';
	
			if( !empty($zerif_parallax_img1) ) { 
				echo '<li class="layer layer1" data-depth="0.10" style="background-image: url(' . $zerif_parallax_img1 . ');"></li>';
			}
			if( !empty($zerif_parallax_img2) ) { 
				echo '<li class="layer layer2" data-depth="0.20" style="background-image: url(' . $zerif_parallax_img2 . ');"></li>';
			}

		echo '</ul>';
	
	}

	$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');
	
	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):
	
		echo '<div class="header-content-wrap">';
	
	elseif ( isset( $wp_customize ) ):
	
		echo '<div class="header-content-wrap zerif_hidden_if_not_customizer">';
	
	endif;

	if( (isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1) || isset( $wp_customize ) ):

		echo '<div class="container big-title-container">';

		/* Sub title */
		$zerif_subtitle = get_theme_mod( 'zerif_bigtitle_subtitle', __('Introducing','zoommerce') );

		if( !empty($zerif_subtitle) ):
			echo '<h4 class="sub-text">'.esc_html($zerif_subtitle).'</h1>';
		elseif ( isset( $wp_customize ) ):
			echo '<h4 class="sub-text zerif_hidden_if_not_customizer"></h1>';
		endif;

		/* Big title */
		$zerif_bigtitle_title = get_theme_mod( 'zerif_bigtitle_title', __('To add a title here please go to Customizer, "Big title section"','zerif') );
		
		if( !empty($zerif_bigtitle_title) ):
			echo '<h1 class="intro-text">'.esc_html($zerif_bigtitle_title).'</h1>';
		elseif ( isset( $wp_customize ) ):
			echo '<h1 class="intro-text zerif_hidden_if_not_customizer"></h1>';
		endif;	

		/* Buttons */
		
		$zerif_bigtitle_button_label = get_theme_mod( 'zerif_bigtitle_button_label',__('Shop Now','zoommerce') );
		$zerif_bigtitle_button_url = get_theme_mod( 'zerif_bigtitle_button_url','#' );

		
		if( (!empty($zerif_bigtitle_button_label) && !empty($zerif_bigtitle_button_url))):


			echo '<div class="buttons">';

				zerif_big_title_buttons_top_trigger();

				/* Shop button */
			
				if (!empty($zerif_bigtitle_button_label) && !empty($zerif_bigtitle_button_url)):

					echo '<a href="'.esc_url($zerif_bigtitle_button_url).'" class="btn btn-primary custom-button">'.esc_html($zerif_bigtitle_button_label).'</a>';
					
				elseif ( isset( $wp_customize ) ):

					echo '<a href="" class="btn btn-primary custom-button zerif_hidden_if_not_customizer"></a>';

				endif;

				

				zerif_big_title_buttons_bottom_trigger();


			echo '</div>';


		endif;

		echo '</div>';

	echo '</div><!-- .header-content-wrap -->';
	
	endif;

	echo '<div class="clear"></div>';


?>

<div class="down-arrow text-center">
    <a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/arrow-down.png"></a>
</div>

</div><!--.home-header-wrap -->
</div><!--/#big-banner-->