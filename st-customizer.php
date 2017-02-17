<?php

class St_Customizer {

	function __construct() {
		//$this->set_global_variables();
		add_action( 'customize_register', array( $this, 'st_customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'st_customize_preview_js' ) );
	}

	function st_customize_preview_js() {
		wp_enqueue_script(
			'st_customizer',
			get_template_directory_uri() . '/js/vendor/customizer.js',
			array( 'jquery', 'customize-preview' ),
			'1.0',
			true
		);
	}

	function st_customize_register( $wp_customize ) {

		$wp_customize->add_setting( 'st_hide_tagline', array(
			'default' 	=> false,
			'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'st_hide_tagline', array(
			'label'		=> esc_html__( 'Hide Tagline', 'blank-theme' ),
		    'section' 	=> 'title_tagline',
		    'type' 		=> 'checkbox',
		));

	}
}

new St_Customizer();
