<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package designfly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'designfly' ); ?></a>

	<header id="masthead" class="site-header" style="background-image: url(<?php esc_html_e( get_theme_file_uri() . '/assets/images/rapeatable-bg.png' ); //phpcs:ignore ?>);">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				?>
					<a href="<?php get_site_url(); ?>" class="site-logo__link">
					<?php esc_html( the_custom_logo() ); ?>
					</a>
					<?php
			} else {
				?>
					<a href="<?php get_site_url(); ?>" class="site-logo__link">
					<img src="<?php esc_html_e( get_theme_file_uri() . '/assets/images/logo.png' ); //phpcs:ignore ?>" alt="logo">
					</a>
					<?php
			}
			?>
		</div>

		<div class="site-header-menu">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'designfly' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-1',
						'menu_id'         => 'primary-menu',
						'menu_class'      => 'site-nav-list',
						'container_class' => 'site-nav',
						'container_id'    => 'site-navmenu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<div class="site-header-search">
			<form action="<?php echo esc_html_e(home_url( '/' )); //phpcs:ignore ?>" class="site-searchbar">
				<input class="site-search-box" type="text" name="s" id="search" value=<?php the_search_query(); ?>>
				<input type="image" class="site-search-img" id="header-search-btn" alt="search" src="<?php esc_html_e( get_theme_file_uri() . '/assets/images/search-icon-normal.png' ); //phpcs:ignore ?>">
			</form>	
		</div>
		</div>
	</header><!-- #masthead -->
	<?php
	if ( is_front_page() ) {
		?>
			<div class="banner-container">
				<div class="banner-intro">
					<div class="intro-heading"><?php esc_html( the_title() ); ?></div>
					<div class="intro-text"><?php esc_html( the_content() ); ?></div>
				</div>
			</div>
		<?php
	}
	?>
	<div class="features-section-container">	
		<div class="features-section">
			<div class="feature">
				<img class="feature-icon" height="50px" src="<?php esc_attr_e( get_theme_file_uri() . '/assets/images/feature-icons-1.png' ); //phpcs:ignore ?>" alt="advertising-image">
				<div class="feature-content">
					<div class="feature-link"><a href="#"><?php echo esc_html__( 'Advertising', 'designfly' ); ?></a></div>
					<div class="feature-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</div>
				</div>
			</div>
			<div class="feature">
				<img class="feature-icon" height="50px" src="<?php esc_attr_e( get_theme_file_uri() . '/assets/images/feature-icons-2.png' ); //phpcs:ignore ?>" alt="advertising-image">
				<div class="feature-content">
					<div class="feature-link"><a href="#"><?php echo esc_html__( 'Multimedia', 'designfly' ); ?></a></div>
					<div class="feature-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</div>
				</div>
			</div>
			<div class="feature">
				<img class="feature-icon" height="50px" src="<?php esc_attr_e( get_theme_file_uri() . '/assets/images/feature-icons-3.png' ); //phpcs:ignore ?>" alt="advertising-image">
				<div class="feature-content">
					<div class="feature-link"><a href="#"><?php echo esc_html__( 'Photography', 'designfly' ); ?></a></div>
					<div class="feature-text">Lorem ipsum dolor sit amet consectetur adipisicing elit...</div>
				</div>
			</div>
		</div>
	</div>
