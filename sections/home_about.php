<?php

	global $wp_customize;
	
	$zerif_aboutus_show = get_theme_mod('zerif_aboutus_show', 1);

	zerif_before_about_us_trigger();
				
	if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):
	
		echo '<section class="about-us" id="aboutus">';
	
	elseif( isset( $wp_customize ) ):
	
		echo '<section class="about-us zerif_hidden_if_not_customizer" id="aboutus">';
	
	endif;
	
	if(( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ) || isset( $wp_customize ) ):

			echo '<div class="container">';
		
				/* SECTION HEADER */

				echo '<div class="home_headline">';

					/* title */
					
					$zerif_aboutus_title = get_theme_mod('zerif_aboutus_title',__('About US','zerif'));
					
					if( !empty($zerif_aboutus_title) ):
					
						echo '<h3 class="white-text">'.esc_html($zerif_aboutus_title).'</h3>';
						
					elseif ( isset( $wp_customize ) ):	
						
						echo '<h3 class="white-text zerif_hidden_if_not_customizer"></h3>';
						
					endif;
					
					/* subtitle */

					$zerif_aboutus_subtitle = get_theme_mod('zerif_aboutus_subtitle',__('Add a subtitle in Customizer, "About us section"','zerif'));


					if( !empty($zerif_aboutus_subtitle) ):

						echo '<h4 class="white-text">'.esc_html($zerif_aboutus_subtitle).'</h4>';

					elseif ( isset( $wp_customize ) ):
					
						echo '<h4 class="white-text zerif_hidden_if_not_customizer">'.esc_html($zerif_aboutus_subtitle).'</h4>';

					endif;

				echo '</div>';

				/* 3 COLUMNS OF ABOUT US */

				echo '<div class="row">';
				
					/* COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY */
					$zerif_aboutus_biglefttitle = get_theme_mod('zerif_aboutus_biglefttitle',__('Title','zerif'));
					
					$zerif_aboutus_text = get_theme_mod('zerif_aboutus_text',__('You can add here a large piece of text. For that, please go in the Admin Area, Customizer, "About us section"','zerif'));
					
					$zerif_aboutus_feature1_title = get_theme_mod('zerif_aboutus_feature1_title',__('Feature','zerif'));
					$zerif_aboutus_feature1_text = get_theme_mod('zerif_aboutus_feature1_text');

					switch (
						(empty($zerif_aboutus_biglefttitle) ? 0 : 1)
						+ (empty($zerif_aboutus_text) ? 0 : 1)
						+ (empty($zerif_aboutus_feature1_title) && empty($zerif_aboutus_feature1_text) ? 0 : 1)
					) {
						case 3:
							$colCount = 4;
							break;
						case 2:
							$colCount = 6;
							break;
						default:
							$colCount = 12;
					}


					if( !empty($zerif_aboutus_biglefttitle) ):


						echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif-rtl-big-title">';


							echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">'.esc_html($zerif_aboutus_biglefttitle).'</div>';


						echo '</div>';


					endif;


					if( !empty($zerif_aboutus_text) ):

						echo '<div class="col-lg-' . esc_attr($colCount) . ' col-md-' . esc_attr($colCount) . ' column zerif_about_us_center" data-scrollreveal="enter bottom after 0s over 1s">';


								echo '<p>';


									echo esc_html($zerif_aboutus_text);


								echo '</p>';


						echo '</div>';


					endif;

					/* COLUMN 1 - SKILSS */

					echo '<div class="col-lg-'.esc_attr($colCount).' col-md-'.esc_attr($colCount).' column zerif-rtl-skills">';

						echo '<ul class="skills" data-scrollreveal="enter right after 0s over 1s">';

						/* SKILL ONE */

						echo '<li class="skill skill_1">';

							$zerif_aboutus_feature1_nr = get_theme_mod('zerif_aboutus_feature1_nr','50');


							if( !empty($zerif_aboutus_feature1_nr) ):


								echo '<div class="skill-count">';


									echo '<input type="text" value="'.esc_attr($zerif_aboutus_feature1_nr).'" data-thickness=".2" class="skill1">';


								echo '</div>';


							endif;
							
							
							
							if( !empty($zerif_aboutus_feature1_title) ):
							
								echo '<h6>'.esc_html($zerif_aboutus_feature1_title).'</h6>';
								
							elseif ( isset( $wp_customize ) ):

								echo '<h6 class="zerif_hidden_if_not_customizer"></h6>';
								
							endif;
							
							if( !empty($zerif_aboutus_feature1_text) ):
							
								echo '<p>'.esc_html($zerif_aboutus_feature1_text).'</p>';
								
							elseif ( isset( $wp_customize ) ):

								echo '<p class="zerif_hidden_if_not_customizer"></p>';	
								
							endif;

						echo '</li>';

						/* SKILL TWO */

						echo '<li class="skill skill_2">';
						
							$zerif_aboutus_feature2_nr = get_theme_mod('zerif_aboutus_feature2_nr','70');


							if( !empty($zerif_aboutus_feature2_nr) ):


								echo '<div class="skill-count">';


									echo '<input type="text" value="'.esc_attr($zerif_aboutus_feature2_nr).'" data-thickness=".2" class="skill2">';


								echo '</div>';


							endif;
							
							$zerif_aboutus_feature2_title = get_theme_mod('zerif_aboutus_feature2_title',__('Feature','zerif'));
							$zerif_aboutus_feature2_text = get_theme_mod('zerif_aboutus_feature2_text');
							
							if( !empty($zerif_aboutus_feature2_title) ):
							
								echo '<h6>'.esc_html($zerif_aboutus_feature2_title).'</h6>';
								
							elseif ( isset( $wp_customize ) ):
							
								echo '<h6 class="zerif_hidden_if_not_customizer"></h6>';
								
							endif;
							
							if( !empty($zerif_aboutus_feature2_text) ):
							
								echo '<p>'.esc_html($zerif_aboutus_feature2_text).'</p>';
								
							elseif ( isset( $wp_customize ) ):

								echo '<p class="zerif_hidden_if_not_customizer"></p>';	
								
							endif;

						echo '</li>';

						/* SKILL THREE */


						echo '<li class="skill skill_3">';

							$zerif_aboutus_feature3_nr = get_theme_mod('zerif_aboutus_feature3_nr','100');


							if( !empty($zerif_aboutus_feature3_nr) ):


								echo '<div class="skill-count">';


									echo '<input type="text" value="'.esc_attr($zerif_aboutus_feature3_nr).'" data-thickness=".2" class="skill3">';


								echo '</div>';


							endif;
							
							$zerif_aboutus_feature3_title = get_theme_mod('zerif_aboutus_feature3_title',__('Feature','zerif'));
							$zerif_aboutus_feature3_text = get_theme_mod('zerif_aboutus_feature3_text');
							
							if( !empty($zerif_aboutus_feature3_title) ):
							
								echo '<h6>'.esc_html($zerif_aboutus_feature3_title).'</h6>';
								
							elseif ( isset( $wp_customize ) ):
							
								echo '<h6 class="zerif_hidden_if_not_customizer"></h6>';
								
							endif;
							
							if( !empty($zerif_aboutus_feature3_text) ):
							
								echo '<p>'.esc_html($zerif_aboutus_feature3_text).'</p>';
								
							elseif ( isset( $wp_customize ) ):

								echo '<p class="zerif_hidden_if_not_customizer"></p>';	
								
							endif;

						echo '</li>';


						/* SKILL FOUR */


						echo '<li class="skill skill_4">';

							$zerif_aboutus_feature4_nr = get_theme_mod('zerif_aboutus_feature4_nr','10');


							if( !empty($zerif_aboutus_feature4_nr) ):


								echo '<div class="skill-count">';


									echo '<input type="text" value="'.esc_attr($zerif_aboutus_feature4_nr).'" data-thickness=".2" class="skill4">';


								echo '</div>';


							endif;
							
							$zerif_aboutus_feature4_title = get_theme_mod('zerif_aboutus_feature4_title',__('Feature','zerif'));
							$zerif_aboutus_feature4_text = get_theme_mod('zerif_aboutus_feature4_text');
							
							if( !empty($zerif_aboutus_feature4_title) ):
							
								echo '<h6>'.esc_html($zerif_aboutus_feature4_title).'</h6>';
								
							elseif ( isset( $wp_customize ) ):
							
								echo '<h6 class="zerif_hidden_if_not_customizer"></h6>';
								
							endif;
							
							if( !empty($zerif_aboutus_feature4_text) ):
							
								echo '<p>'.esc_html($zerif_aboutus_feature4_text).'</p>';
								
							elseif ( isset( $wp_customize ) ):

								echo '<p class="zerif_hidden_if_not_customizer"></p>';	
								
							endif;

						echo '</li>';

					echo '</ul>';


				echo '</div> <!-- / END SKILLS COLUMN-->';


			echo '</div> <!-- / END 3 COLUMNS OF ABOUT US-->';

		echo '</div> <!-- / END CONTAINER -->';

	echo '</section> <!-- END ABOUT US SECTION -->';
	
	endif;

	zerif_after_about_us_trigger();