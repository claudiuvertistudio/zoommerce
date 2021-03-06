<?php
/**
 * The template for home section: Our focus
 *
 * @package WordPress
 * @subpackage zoommerce
 */
global $wp_customize;

$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show', 1);

zerif_before_our_focus_trigger();

if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):

	echo '<section class="focus" id="focus">';

elseif ( isset( $wp_customize ) ):

	echo '<section class="focus zerif_hidden_if_not_customizer" id="focus">';

endif;

if( (isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1) || isset( $wp_customize ) ):

	echo '<div class="container">';

		/* SECTION HEADER */

		echo '<div class="home_headline">';

			/* title */
			$zerif_ourfocus_title = get_theme_mod('zerif_ourfocus_title',__('Our focus','zerif'));
				
			if( !empty($zerif_ourfocus_title) ):
				
				echo '<h3>'.esc_html($zerif_ourfocus_title).'</h3>';
					
			elseif ( isset( $wp_customize ) ):	
				
				echo '<h3 class="zerif_hidden_if_not_customizer"></h3>';
					
			endif;	
				
			/* subtitle */
			$zerif_ourfocus_subtitle = get_theme_mod('zerif_ourfocus_subtitle',__('Add a subtitle in Customizer, "Our focus section"','zerif'));

			if( !empty($zerif_ourfocus_subtitle) ):

				echo '<h4>'.esc_html($zerif_ourfocus_subtitle).'</h4>';
					
			elseif ( isset( $wp_customize ) ):
				
				echo '<h4 class="zerif_hidden_if_not_customizer"></h6>';

			endif;

		echo '</div><!-- .home_headline -->';

		echo '<div class="row">';

			if ( is_active_sidebar( 'sidebar-ourfocus' ) ) :	

				dynamic_sidebar( 'sidebar-ourfocus' );

			else:

				the_widget( 'zerif_ourfocus','title=Box 1&text=text&link=#&image_uri='.get_template_directory_uri().'/images/focus.png' );

				the_widget( 'zerif_ourfocus','title=Box 2&text=text&link=#&image_uri='.get_template_directory_uri().'/images/focus.png' );

				the_widget( 'zerif_ourfocus','title=Box 3&text=text&link=#&image_uri='.get_template_directory_uri().'/images/focus.png' );

				the_widget( 'zerif_ourfocus','title=Box 4&text=text&link=#&image_uri='.get_template_directory_uri().'/images/focus.png' );

			endif;

		echo '</div>';

	echo '</div> <!-- / END CONTAINER -->';

echo '</section>  <!-- / END FOCUS SECTION -->';

endif;

zerif_after_our_focus_trigger();

?>