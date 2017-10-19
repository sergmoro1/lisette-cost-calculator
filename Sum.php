<?php
/**
 * @author - Sergey Morozov <sergmoro1@ya.ru>
 * @license - MIT
 * 
 *	Show current sum of order.
 */

add_action( 'widgets_init', 'register_lisette_cost_calculator_sum_widget' );

function register_lisette_cost_calculator_sum_widget() {
	register_widget('Lisette_Cost_Calculator_Sum' );
}

class Lisette_Cost_Calculator_Sum extends WP_Widget {

	public function __construct() {
		// add class for wrapping div
        $widget_ops  = [
            'classname' => 'fixed-box fixed',
        ];
        $control_ops = [];
		parent::__construct(
			'lisette_cost_calculator_sum',
			'Lisette_CC Sum',
			$widget_ops, $control_ops
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		// show widget only on page cost-calculator
		$pagename = get_query_var('pagename');
		if ( is_page() && $pagename == 'cost-calculator' ) {
			$title = apply_filters( 'widget_title', $instance['title'] );

			echo $args['before_widget'];

			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];
			
			$view = dirname( __FILE__ ) . '/views/cost_calculator_sum.php'; 
			if( file_exists( $view ) )
				include_once( $view );
			else
				echo __('No view file found!', 'lcc');
			
			echo $args['after_widget'];
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" 
				id="<?php echo $this->get_field_id( 'title' ); ?>" 
				name="<?php echo $this->get_field_name( 'title' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
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
