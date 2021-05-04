<?php
/**
 * Template Name: Blog Page
 * Template for blog page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designfly
 */

get_header();
$pagination     = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$posts_per_page = get_option( 'posts_per_page' );
$args           = array(
	'post_type'      => array( 'post', 'df-portfolio' ),
	'posts_per_page' => $posts_per_page,
	'paged'          => $pagination,
	'post_status'    => 'publish',
);

$blog_query = new WP_Query( $args );
?>

	<div class="main-container">
		<div class="blog-container">
			<main id="primary" class="site-main blog-main">
				<h2 class="blog-main__heading"><span class="blog-main-heading__text">LET'S BLOG</span></h2>
				<div class="blog-body">
					<?php
					if ( $blog_query->have_posts() ) {
						while ( $blog_query->have_posts() ) {
							$blog_query->the_post();
							get_template_part( 'template-parts/content', 'blog-template' );
						}
					} else {
						?>
						<p>
						<?php esc_html_e( 'Sorry, no posts found.', 'design-fly' ); ?>
						</p>
						<?php
					}
					?>
				</div>
			</main><!-- #main -->
			<div class="blogs-sidebar">
				<?php get_sidebar(); ?>
			</div>
			<div class="pagination"><?php designfly_pagination_bar( $blog_query ); ?></div>
		</div>
	</div>
<?php
get_footer();
