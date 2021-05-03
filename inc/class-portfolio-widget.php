<?php //phpcs:ignore
/**
 * Class for Custom Portfolio widget
 **/ //phpcs:ignore

class Designfly_Portfolio_Widget extends WP_Widget { //phpcs:ignore
	/**
	 * Constructor Function
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'designfly_portfolio_widget',
			'description' => esc_html__( 'Custom DesignFly Portfolio Widget', 'designfly' ),
		);

		parent::__construct( 'designfly_portfolio', 'Designfly Portfolio', $widget_ops );
	}

	/** //phpcs:ignore
	 * Form function
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = 'Portfolio';
		}
		?>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title' ); ?>:</label>
			<input class="widget_portfolio_title" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php esc_html( $title ); ?>"/>
		</p>
		<?php
	}

	/** //phpcs:ignore
	 * Function to display contents
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; //phpcs:ignore
		$query = new WP_Query(
			array(
				'post_type'      => 'df-portfolio',
				'posts_per_page' => 8,
			)
		);
		if ( $query->have_posts() ) {
			?>
			<h2 class="widget-title">
				<?php
				if ( isset( $instance['title'] ) ) {
					$title = $instance['title'];
				} else {
					$title = 'Portfolio';
				}
				  echo $title; //phpcs:ignore
				?>
			</h2>
			<div class="portfolio-widget-images">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<a class="portfolio-widget__link" href="' . get_permalink() . '">'; //phpcs:ignore
					echo '<img class="portfolio-widget__image" src="' . get_the_post_thumbnail_url() . '">'; //phpcs:ignore
					echo '</a>';
				}
				?>
			</div>	
			<?php
		} else {
			?>
		<p>
			<?php esc_html_e( 'Sorry, no portfolio items found', 'designfly' ); ?>
		</p>
			<?php
		}
		echo $args[ 'after_widget' ]; //phpcs:ignore
	}

	/** //phpcs:ignore
	 * Update function
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = wp_strip_all_tags( $new_instance['title'] );
		return $instance;
	}
}


