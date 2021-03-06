<?php
/**
 * The Header for our theme
 *
 * Displays header section
 *
 * @package WordPress
 * @subpackage zoommerce
 */


$zoommerce_myaccount = get_theme_mod('myaccount_icon', get_stylesheet_directory_uri().'/assets/images/menu-profile.png'); 
$zoommerce_myaccount_link = get_theme_mod('myaccount_link');

$zoommerce_cart = get_theme_mod('cart_icon', get_stylesheet_directory_uri().'/assets/images/menu-cart.png'); 
$zoommerce_cart_link = get_theme_mod('cart_link');
$header_icons = false;
$cart_cond = false;
$account_cond = false;

if($zoommerce_myaccount and $zoommerce_myaccount_link) {
	$account_cond = true;
}

if($zoommerce_cart and $zoommerce_cart_link) {
	$cart_cond = true;
}

if($cart_cond or $account_cond) {
	$header_icons = true;
}

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<?php zerif_top_head_trigger(); ?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php 

			//WP Header
			wp_head(); 

			//Extra hook
			zerif_bottom_head_trigger(); 

			//Get analytics code from customizer
			$zerif_google_anaytics = get_theme_mod('zerif_google_anaytics');
			if( !empty($zerif_google_anaytics) ):
				echo $zerif_google_anaytics;
			endif;

		?>

	</head>

	<?php if(isset($_POST['scrollPosition'])): ?>
		<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage" onLoad="window.scrollTo(0,<?php echo esc_attr(intval($_POST['scrollPosition'])); ?>)">
	<?php else: ?>
		<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<?php endif; ?>
	
		<!-- =========================

		   PRE LOADER       

		============================== -->
		<?php
			
		 global $wp_customize;

		 if(is_front_page() && !isset( $wp_customize )): 
			$zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');
			if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
				echo '<div class="preloader">';
					echo '<div class="status">&nbsp;</div>';
				echo '</div>';
			endif;	
		endif; ?>


		<header id="home" class="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
			<div id="main-nav" class="navbar navbar-inverse bs-docs-nav">
				<div class="container">

					<div class="navbar-header responsive-logo">

						<div class="logo-header-wrap">
							<?php
								$zoommerce_logo = get_theme_mod('zerif_logo', get_stylesheet_directory_uri().'/assets/images/logo.png');
								if( !empty($zoommerce_logo) ):
									echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
										echo '<img src="'.esc_url($zoommerce_logo).'" alt="'.esc_attr(get_bloginfo('title')).'">';
									echo '</a>';
								else:
									if( isset( $wp_customize ) ):
										echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';
											echo '<img src="" alt="'.esc_attr(get_bloginfo('title')).'" class="zerif_hidden_if_not_customizer">';
										echo '</a>';
									endif;
									echo '<div class="header_title zerif_header_title">';	
										echo '<h1 class="site-title" itemprop="headline"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.esc_html(get_bloginfo( 'name' )).'</a></h1>';
										echo '<h2 class="site-description" itemprop="description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.esc_html(get_bloginfo( 'description' )).'</a></h2>';
									echo '</div>';
								endif;
							?>
						</div>
					</div>

					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only"><?php _e('Toggle navigation', 'zoommerce'); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    
                    <?php 	
						
					//Check if links are active and display the box
					if(zoommerce_is_woocommerce_activated() && $header_icons == true ): ?>
	                    <div class="menu-icons">
	                        <ul id="icons-menu">
                            	<?php if( !empty($zoommerce_myaccount) && !empty($zoommerce_myaccount_link)): ?>
	                            	<li class="menu-item myaccount" > 
		                                <a href="<?php echo esc_url($zoommerce_myaccount_link); ?>">
		                                    <img src="<?php echo esc_url($zoommerce_myaccount); ?>">
		                                </a> 
	                                </li>
                            	<?php endif; ?>
                            	<?php if( !empty($zoommerce_cart) && !empty($zoommerce_cart_link)): ?>
	                            	<li class="menu-item cart"> 
		                                <a href="<?php echo esc_url($zoommerce_cart_link); ?>">
		                                    <img src="<?php echo esc_url($zoommerce_cart); ?>">
		                                </a> 
	                                </li>
		                        <?php endif; ?>
	                        </ul>
	                    </div>
						<?php endif; ?>

					<nav class="navbar-collapse bs-navbar-collapse collapse<?php echo ($header_icons == true ? ' center_on_responsive' : ''); ?>" role="navigation" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">

						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right responsive-nav main-nav-list' ,'fallback_cb'     => 'zerif_wp_page_menu')); ?>  

					</nav>
				</div>

			</div>

			<!-- / END TOP BAR -->