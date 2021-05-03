<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package designfly
 */

?>

	<footer id="colophon" class="site-footer" style="background-image: url(<?php esc_attr_e( get_theme_file_uri() . '/assets/images/rapeatable-bg.png' ); //phpcs:ignore ?>);">
		<div class="site-info">
			<div class="site-info-about">
				<div class="site-info__heading">Welcome to D'SIGNfly</div>
				<div class="site-info__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos nihil voluptate sint in quidem molestiae? Libero dolorum accusantium recusandae tempore, veritatis, reiciendis eos sequi soluta aspernatur facere pariatur a incidunt!</div>
				<p>
					<span class="site-info__link">
					<a  href="<?php echo esc_url( __( 'https://wordpress.org/', 'designfly' ) ); ?>">
						<?php
						echo esc_html__( 'Read more', 'designfly' );
						?>
					</a>
					</span>
				</p>
			</div>	
			<div class="site-info-contact">
				<div class="site-info__heading">Contact us</div>
				<div class="site-info__text">
					Street 21 Planet A-11, dapibus tristique, 123 551 <br>
					Tel: 123 4567890; Fax: 123 456789 <br>
					Email: <span class="site-info__link">
						<a href="#"><?php echo esc_html__( 'contactus@designfly.com', 'designfly' ); ?></a>	
						</span>
				</div>
				<div class="social-icons">
					<?php
						$icons = array( 'facebook', 'gp', 'linkedin', 'pin', 'twitter' );
					foreach ( $icons as $icon ) {
						?>
								<a href="#" class="social-icons__link">
									<img src="<?php esc_attr_e( get_theme_file_uri() . '/assets/images/' . $icon . '.png' ); ?>" alt="<?php esc_html( $icon ); //phpcs:ignore ?>">
								</a>
							<?php
					}
					?>
				</div>
			</div>
		</div><!-- .site-info -->
		<div class="site-copyright">
					<p> &#169; 2021 D'SIGNfly 
						<span class="sep">|</span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'designfly' ), 'designfly', '<a href="http://underscores.me/">Smriti Chaturvedi</a>' );
						?>
					</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
