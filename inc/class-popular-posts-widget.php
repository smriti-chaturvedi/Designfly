<?php //phpcs:ignore
/**
 * Class for Custom Popular Posts widget
 **/ //phpcs:ignore

class Designfly_Popular_Posts_Widget extends WP_Widget { //phpcs:ignore
	/**
	 * Constructor Function
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'designfly_popular_posts_widget',
			'description' => esc_html__( 'Custom DesignFly Popular Posts Widget', 'designfly' ),
		);

		parent::__construct( 'designfly_popular_posts', 'Designfly Popular Posts', $widget_ops );
	}

    /** //phpcs:ignore
	 * Form function
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = 'Popular Posts';
		}
		?>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title' ); ?>:</label>
			<input class="widget_popular_posts_title" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php esc_html( $title ); ?>"/>
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
				'meta_key'       => 'post_views_count', //phpcs:ignore
				'orderby'        => 'meta_value_num',
				'post_type'      => 'df-portfolio',
				'posts_per_page' => 5,
			)
		);
		if ( $query->have_posts() ) {
			?>
			<h2 class="widget-title">
				<?php
				if ( isset( $instance['title'] ) ) {
					$title = $instance['title'];
				} else {
					$title = 'Popular Posts';
				}
					echo $title; //phpcs:ignore
				?>
			</h2>
			<div class="popular-post-widget">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<div class="popular-post__container">';
					echo '<img class="popular-post-image" src="' . esc_html( get_the_post_thumbnail_url() ) . '">';
					echo '<div class="popular-post-summary">
                  <div class="popular-post__title"><span>' . esc_html( get_the_title() ) . '</span></div>
                  <div class="popular-post-text">by <a class="popular-post__author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a> on <span class="popular-post__date">' . esc_html( get_the_time( 'd M Y' ) ) . '</span></div>
                </div>';
					echo '</div>';
				}
				?>
			</div>
			<?php
		} else {
			?>
		<p>
			<?php esc_html_e( 'Sorry, no popular posts found.', 'designfly' ); ?>
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
