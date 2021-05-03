<?php
/**
 * Template part for displaying blog content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package designfly
 */

?>

<div>
	<article id="post-<?php the_ID(); ?>">
		<div class="blog-wrapper">
			<div class="blog-links">
				<a href="
				<?php
				echo get_post_permalink(); //phpcs:ignore
				?>
				" class="blog-permalink">
					<div class="blog-head">
						<div class="blog-date">
						<span class="blog-date__day"><?php echo get_the_date( 'd' ); ?></span>
						<span class="blog-date__month"><?php echo get_the_date( 'M' ); ?></span>
						</div>
						<h2 class="blog-head__heading"><span class="blog-head__headingtxt"><?php esc_attr( the_title() ); ?></span></h2>
					</div>
				</a>
			</div>	
			<div class="blog-summary">
				<?php
				if ( has_post_thumbnail() ) {
					?>
						<div class="blog-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="blog-content">
							<div class="blog-content__header">
								<p class="blog-content__author">
									<?php designfly_posted_by(); ?> on <?php echo get_the_date( ' d M Y ' ); ?>
								</p>
								<p class="blog-content__comments"><span class="blog-content__comment"><?php echo esc_attr( get_comments_number() ); ?> Comments(s)</span></p>
							</div>
							<div class="blog-content__text">
								<?php
								$excerpt = substr( get_the_excerpt(), 0, 150 ) . '...';
								esc_html_e( $excerpt ); //phpcs:ignore
								echo '<br/><a class="read-more" href="' . get_permalink( get_the_id() ) . '"><span class="read-moretxt">Read More</span></a>'; //phpcs:ignore
								?>
							</div>
						</div>
					<?php
				} else {
					?>
					<div class="blog-content">
							<div class="blog-content__header">
								<p class="blog-content__author">
									<?php designfly_posted_by(); ?> on <?php echo get_the_date( ' d M Y ' ); ?>
								</p>
								<p class="blog-content__comments"><span class="blog-content__comment"><?php echo esc_attr( get_comments_number() ); ?>Comment(s)</span></p>
							</div>
							<div class="blog-content__text">
								<?php
								$excerpt = substr( get_the_excerpt(), 0, 250 ) . '...';
								esc_html( $excerpt );
								echo '<br/><a class="read-more" href="' . get_permalink( get_the_id() ) . '"><span class="read-moretxt">Read More</span></a>'; //phpcs:ignore
								?>
							</div>
						</div>
					<?php
				}
				?>
			</div>
		</div>
	</article>
</div>
