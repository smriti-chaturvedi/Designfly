<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package designfly
 */

get_header();
?>
	<div class="post-structure">
		<main id="primary" class="site-main post-maincontent">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						?>
						<div class="comments-wrapper">
							<p class="bars"><?php esc_html_e( 'Comments', 'desginfly' ); ?></p>
						</div>
						<?php
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
		</main><!-- #main -->
		<div class="post-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();


