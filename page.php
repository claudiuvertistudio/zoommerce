<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package zerif
 */
get_header(); ?>
<div class="clear"></div>
</header> <!-- / END HOME SECTION  -->
<div id="breadcrumb">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'zoommerce'); ?></a>
	<?php if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout() ) || (function_exists('is_account_page') && is_account_page()) ): ?>
		<a><?php _e('Shop', 'zoommerce'); ?></a>
	<?php else: ?>
		<a><?php _e('Page', 'zoommerce'); ?></a>
	<?php endif; ?>
	<a><?php the_title(); ?></a>
</div><!-- /#breadcrumb  -->
<div id="content" class="site-content">
	<div class="container">
		<?php 
			zerif_before_page_content_trigger();

			if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout() ) || (function_exists('is_account_page') && is_account_page()) ) {	
				echo '<div class="content-left-wrap col-md-12">';
			} else {
				echo '<div class="content-left-wrap col-md-9">';	
			}
			
		zerif_top_page_content_trigger(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<?php 
					while ( have_posts() ) : 
						the_post();
						get_template_part( 'content', 'page' );
						
						/* If comments are open or we have at least one comment, load up the comment template */
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					endwhile;
				?>
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php
	 
		if( (function_exists('is_cart') && is_cart()) || (function_exists('is_checkout') && is_checkout() ) || (function_exists('is_account_page') && is_account_page()) ) {
			zerif_bottom_page_content_trigger();
			echo '</div>';
			zerif_after_page_content_trigger();
		}
		else {
			zerif_bottom_page_content_trigger();
			echo '</div>';
			zerif_after_page_content_trigger();

			echo '<div class="sidebar-wrap col-md-3 content-left-wrap">';
				get_sidebar();
			echo '</div>';
		}
	?>	
	</div><!-- .container -->
<?php get_footer(); ?>