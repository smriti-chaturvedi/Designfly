<?php
/**
 * Template Name: Portfolio Page
 * Template for portfolio page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designfly
 */

get_header();
$pagination = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args       = array(
	'post_type'      => array( 'df-portfolio' ),
	'posts_per_page' => 15,
	'paged'          => $pagination,
	'post_status'    => 'publish',
);

$portfolio_query = new WP_Query( $args );
?>

	<div class="main-container">
		<div class="portfolio-container">
			<main id="primary" class="site-main portfolio-main">
				<div class="portfolio-header">
					<div class="portfolio-head"><span class="portfolio-headtxt">DESIGN IS THE SOUL</span></div>
					<div class="portfolio-links">
						<?php
						$df_tags = get_terms( array( 'taxonomy' => 'post_tag' ) );
						foreach ( $df_tags as $df_tag ) {
							?>
						<a href="<?php echo esc_html( get_term_link( $df_tag ) ); ?>" class="portfolio-link"><?php echo $df_tag->name; //phpcs:ignore ?></a> 
							<?php
						}
						?>
					</div>
				</div>
				<div class="portfolio-body">
					<?php
					if ( $portfolio_query->have_posts() ) {
						while ( $portfolio_query->have_posts() ) {
							$portfolio_query->the_post();
							add_thickbox();
							echo '<div id="my-thickbox" style="display:none">';
							echo '<img src="' . esc_html( get_the_post_thumbnail_url() ) . '" class="thickbox-image" >';
							echo '<div class="thickbox-desc">Lorem ipsum dolor sit amet</div>';
							echo '</div>';
							echo '<a href="#TB_inline?&width=600&height=500&inlineId=my-thickbox" class="portfolio-links thickbox"">';
							echo '<img class="portfolio-image" src= "' . esc_html( get_the_post_thumbnail_url() ) . '"/>';
							echo '</a>';
						}
					} else {
						?>
						<p>
						<?php esc_html_e( 'Sorry, no portfolios found.', 'designfly' ); ?>
						</p>
						<?php
					}
					?>
				</div>
			</main><!-- #main -->
			<div class="pagination"><?php designfly_pagination_bar( $portfolio_query ); ?></div>
		</div>
	</div>

<?php
get_footer();

