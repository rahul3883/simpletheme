<?php

class St_Pricing_Widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			'st_pricing_widget',
			'St_Pricing'
		);

	}

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		$plan_color				= ! empty( $instance['plan_color'] ) ? $instance['plan_color'] : '';
		$plan_name 				= ! empty( $instance['plan_name'] ) ? $instance['plan_name'] : '';
		$plan_price 			= ! empty( $instance['plan_price'] ) ? $instance['plan_price'] : '';
		$plan_features 		= ! empty( $instance['plan_features'] ) ? $instance['plan_features'] : '';
		$plan_button_text	= ! empty( $instance['plan_button_text'] ) ? $instance['plan_button_text'] : '';
		$plan_link				= ! empty( $instance['plan_link'] ) ? $instance['plan_link'] : '';

		$plan_features = explode( "\n", $plan_features );

		?>

		<?php echo $plan_color; ?>
		<br>
		<?php echo $plan_name; ?>
		<br>
		<?php echo $plan_price; ?>
		<br>
		<?php
		foreach ( $plan_features as $feature ) {
			echo $feature . '<br>';
		}
		?>
		<a href="<?php echo $plan_link; ?>"><?php echo $plan_button_text; ?></a>

		<?php

		echo $args['after_widget'];

	}

	public function form( $instance ) {

		$plan_color				= ! empty( $instance['plan_color'] ) ? $instance['plan_color'] : '';
		$plan_name 				= ! empty( $instance['plan_name'] ) ? $instance['plan_name'] : '';
		$plan_price 			= ! empty( $instance['plan_price'] ) ? $instance['plan_price'] : '';
		$plan_features 		= ! empty( $instance['plan_features'] ) ? $instance['plan_features'] : '';
		$plan_button_text	= ! empty( $instance['plan_button_text'] ) ? $instance['plan_button_text'] : '';
		$plan_link				= ! empty( $instance['plan_link'] ) ? $instance['plan_link'] : '';
		?>

		<b>Color</b><br>
		<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'plan_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'plan_color' ) ); ?>" value="<?php echo $plan_color; ?>">
		<br><br>
		<b>Plan Name</b><br>
		<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'plan_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'plan_name' ) ); ?>" value="<?php echo $plan_name; ?>">
		<br><br>
		<b>Price Per Month</b><br>
		<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'plan_price' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'plan_price' ) ); ?>" value="<?php echo $plan_price; ?>">
		<br><br>
		<b>Features</b><br>
		<textarea style="width:100%; height:150px;" id="<?php echo esc_attr( $this->get_field_id( 'plan_features' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'plan_features' ) ); ?>"><?php echo $plan_features; ?></textarea>
		<br><br>
		<b>Button Text</b><br>
		<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'plan_button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'plan_button_text' ) ); ?>" value="<?php echo $plan_button_text; ?>">
		<br><br>
		<b>Link</b><br>
		<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'plan_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'plan_link' ) ); ?>" value="<?php echo $plan_link; ?>">

		<?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = array(
			'plan_color'				=> ( ! empty( $new_instance['plan_color'] ) ) ? strip_tags( $new_instance['plan_color'] ) : '',
			'plan_name'					=> ( ! empty( $new_instance['plan_name'] ) ) ? strip_tags( $new_instance['plan_name'] ) : '',
			'plan_price'				=> ( ! empty( $new_instance['plan_price'] ) ) ? strip_tags( $new_instance['plan_price'] ) : '',
			'plan_features'			=> ( ! empty( $new_instance['plan_features'] ) ) ? strip_tags( $new_instance['plan_features'] ) : '',
			'plan_button_text'	=> ( ! empty( $new_instance['plan_button_text'] ) ) ? strip_tags( $new_instance['plan_button_text'] ) : '',
			'plan_link'					=> ( ! empty( $new_instance['plan_link'] ) ) ? strip_tags( $new_instance['plan_link'] ) : '',
		) ;
		return $instance;
	}

}

add_action( 'widgets_init', function() {
		register_widget( 'St_Pricing_Widget' );
} );