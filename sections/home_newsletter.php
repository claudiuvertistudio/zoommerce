<?php
/**
 * The template for home section: Newsletter sidebar
 *
 * @package WordPress
 * @subpackage zoommerce
 */
$newsletter_hide = get_theme_mod('zerif_subscribe_show');

	if(!$newsletter_hide)
		return NULL;
?>
<section id="newsletter_section">
	<div class="container">
		<?php

		if(is_active_sidebar( 'sidebar-subscribe' )):

			echo '<div class="home_headline">';
			$headline = get_theme_mod('zerif_subscribe_title', __('Newsletter Subscribtion', 'zoommerce'));
			if($headline) {
				echo '<h3>'.esc_html(get_theme_mod('zerif_subscribe_title', __('Newsletter Subscribtion', 'zoommerce'))).'</h3>';
			}

			$subtitle = get_theme_mod('zerif_subscribe_subtitle', __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoommerce'));
			if($subtitle) {
				echo '<h4>'.esc_html(get_theme_mod('zerif_subscribe_subtitle', __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoommerce'))).'</h4>';
			}
			echo '</div><!-- / .home_headline -->';

			dynamic_sidebar( 'sidebar-subscribe' );
		endif;

		?>
	</div><!-- / .container -->
</section><!-- /#newsletter_section  -->