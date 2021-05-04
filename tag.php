<?php
/**
 * Template for tag archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFly
 */

get_header();
$is_paged  = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$tag_id    = get_query_var( 'tag' );
$args      = array(
	'post_type'      => array( 'post', 'df-portfolio' ),
	'posts_per_page' => 5,
	'paged'          => $is_paged,
	'tag'            => $tag_id,
);
$tag_query = new WP_Query( $args );
?>

<div class="main-container">
<div class="blog-container">
	<main id="primary" class="site-main">

		<?php if ( $tag_query->have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( $tag_query->have_posts() ) :
				$tag_query->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'blog-template' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<div class="blog-sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>

<?php designfly_pagination_bar( $tag_query ); ?>
<?php
get_footer();

