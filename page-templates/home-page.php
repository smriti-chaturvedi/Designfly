<?php
/**
 * Template Name: Home Page
 * Template for home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designfly
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	if ( is_front_page() ) {
		$args = array(
			'post_type'      => 'df-portfolio',
			'posts_per_page' => 6,
		);


		$home_query = new WP_Query( $args );
		?>
	<div class="home-page">
		<div class="home-head">
			<p class="home-head__title"><?php esc_html_e( 'D\'SIGN IS THE SOUL' ); ?></p>
			<a href="#" class="home-head__button">
				<span class="home-head__buttontxt"><?php esc_html_e( 'View All', 'designfly' ); ?></span>
			</a>
		</div>
		<div class="home-images-container">
		<?php
		if ( $home_query->have_posts() ) {
			while ( $home_query->have_posts() ) {
				$home_query->the_post();
				echo '<a href="' . esc_attr( get_permalink() ) . '" class="home-images__link">';
				echo '<img class="home-images__image" src="' . esc_html( get_the_post_thumbnail_url() ) . '"/>';
				echo '</a>';
			}
		}
		?>
		</div>
	</div>
		<?php
	} else {
		?>
			<div class="container">
				<p>
			<?php esc_html_e( 'Sorry, no portfolio items found. Please add some portfolio items in admin dashboard.', 'designfly' ); ?>
				</p>
			</div>
		<?php
	}
	?>
</main><!-- #main -->

<?php
get_footer();
