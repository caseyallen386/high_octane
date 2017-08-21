<?php

class Ocatane_Social_Widget extends WP_Widget {
    
    private $social_sites = [
        'facebook',
        'tumblr',
        'instagram',
        'twitter',
        'google_plus',
        'skype',
        'pinterest',
        'linkedin',
        'reddit',
        'foursquare',
        'myspace',
        'stumble_upon',
        'youtube',
        'livejournal'
    ];
    
    /**
	 * Register widget with WordPress.
	 */
    public function __construct() {
        parent::__construct(
			'octane_social_widget', // Base ID
			esc_html__( 'Social List', 'octane' ), // Name
			array( 'description' => esc_html__( 'Adds Social Icons', 'octane' ), ) // Args
		);
    }
    
    
    public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		// Output the Widget
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'octane' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'octane' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
        
        foreach($this->social_sites as $site){
            ?>
                <p>
                <label for="<?php echo esc_attr( $this->get_field_id( $site ) ); ?>"><?php esc_attr_e( $site . ':', 'octane' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $site ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $site ) ); ?>" type="text" value="<?php echo esc_attr( $instance[ $site ] ); ?>">
                </p>
            <?php
        }
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
    
    
    
}