<?php

class St_Customizer {

	function __construct() {
		$this->set_global_variables();
		add_action( 'customize_register', array( $this, 'st_customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'st_customize_preview_js' ) );
	}

	function set_global_variables() {
		$GLOBALS['st_customizer'] = array(
			'contact_head'					=> esc_html__( 'Get in touch with us', 'blank-theme' ),
			'contact_text'					=> esc_html__( 'dictumst nunc facilisis magnis! Magna', 'blank-theme' ),
			'link_facebook'					=> esc_html__( '#', 'blank-theme' ),
			'link_twitter'					=> esc_html__( '#', 'blank-theme' ),
			'link_google_plus'			=> esc_html__( '#', 'blank-theme' ),
			'contact_website_name'	=> esc_html__( 'Simple Theme', 'blank-theme' ),
			'contact_website_link'	=> esc_html__( 'http://www.google.com', 'blank-theme' ),
			'contact_number'				=> '',
			'contact_email'					=> '',
		);
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

		global $st_customizer;

		$wp_customize->add_setting( 'st_hide_tagline', array(
			'default' 	=> false,
			'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'st_hide_tagline', array(
				'label' 		=> esc_html__( 'Hide Tagline', 'blank-theme' ),
		    'section' 	=> 'title_tagline',
		    'type' 			=> 'checkbox',
		));

		/*
		//Contact Us Panel
		$wp_customize->add_panel( 'contact_panel', array(
			'title'				=> __( 'Contact Us', 'blank-theme' ),
			'description'	=> __( 'Contact Page', 'blank-theme' ),
		) );

		//Contact Us -> Contact Headers
		$wp_customize->add_section( 'contact_us', array(
			'title' 			=> esc_html__( 'Contact Headers', 'blank-theme' ),
			'panel'				=> 'contact_panel',
		));

		//Contact Us -> Contact Headers -> Contact Head
		$wp_customize->add_setting( 'contact_head', array(
			'default' 	=> $st_customizer['contact_head'],
			'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'contact_head', array(
				'label' 		=> esc_html__( 'Contact Head', 'blank-theme' ),
		    'section' 	=> 'contact_us',
		    'type' 			=> 'text',
		));

		//Contact Us -> Contact Headers -> Contact Text
		$wp_customize->add_setting( 'contact_text', array(
		    'default' 	=> $st_customizer['contact_text'],
				'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'contact_text', array(
		    'label' 		=> esc_html__( 'Contact Text', 'blank-theme' ),
		    'section' 	=> 'contact_us',
		    'type' 			=> 'textarea',
		));

		//Contact Us -> Social Links
		$wp_customize->add_section( 'social_links', array(
			'title'				=> esc_html__( 'Social Links', 'blank-theme' ),
			'panel'				=> 'contact_panel',
		) );

		//Contact Us -> Social Links -> Facebook
		$wp_customize->add_setting( 'link_facebook', array(
		    'default' 	=> $st_customizer['link_facebook'],
				'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'link_facebook', array(
		    'label' 		=> esc_html__( 'Facebook', 'blank-theme' ),
		    'section' 	=> 'social_links',
		    'type' 			=> 'text',
		));

		//Contact Us -> Social Links -> Twitter
		$wp_customize->add_setting( 'link_twitter', array(
		    'default' 	=> $st_customizer['link_twitter'],
				'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'link_twitter', array(
		    'label' 		=> esc_html__( 'Twitter', 'blank-theme' ),
		    'section' 	=> 'social_links',
		    'type' 			=> 'text',
		));

		//Contact Us -> Social Links -> Google Plus
		$wp_customize->add_setting( 'link_google_plus', array(
		    'default' 	=> $st_customizer['link_google_plus'],
				'transport' => 'postMessage',
		));

		$wp_customize->add_control( 'link_google_plus', array(
		    'label' 		=> esc_html__( 'Google Plus', 'blank-theme' ),
		    'section' 	=> 'social_links',
		    'type' 			=> 'text',
		));

		//Contact Us -> Contact Information
		$wp_customize->add_section( 'contact_info', array(
			'title'				=> esc_html__( 'Contact Information', 'blank-theme' ),
			'panel'				=> 'contact_panel',
		));

		//Contact Us -> Contact Information -> Website Name
		$wp_customize->add_setting( 'contact_website_name', array(
			'default'			=> $st_customizer['contact_website_name'],
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'contact_website_name', array(
			'label'				=> esc_html__( 'Website Name', 'blank-theme' ),
			'section'			=> 'contact_info',
			'type'				=> 'text',
		) );

		//Contact Us -> Contact Information -> Website Link
		$wp_customize->add_setting( 'contact_website_link', array(
			'default'			=> $st_customizer['contact_website_link'],
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'contact_website_link', array(
			'label'				=> esc_html__( 'Website Link', 'blank-theme' ),
			'section'			=> 'contact_info',
			'type'				=> 'text',
		) );

		//Contact Us -> Contact Information -> Contact Number
		$wp_customize->add_setting( 'contact_number', array(
			'default'			=> $st_customizer['contact_number'],
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'contact_number', array(
			'label'				=> esc_html__( 'Contact Number', 'blank-theme' ),
			'section'			=> 'contact_info',
			'type'				=> 'text',
		) );

		//Contact Us -> Contact Information -> Email
		$wp_customize->add_setting( 'contact_email', array(
			'default'			=> $st_customizer['contact_email'],
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'contact_email', array(
			'label'				=> esc_html__( 'Email', 'blank-theme' ),
			'section'			=> 'contact_info',
			'type'				=> 'text',
		) );
		*/

		$this->cpt_section( $wp_customize );

	}

	function cpt_section( $wp_customize ) {

		$wp_customize->add_section( 'toogle_post_types', array(
			'title'				=> esc_html__( 'Toogle CPT', 'blank-theme' ),
		) );

		$wp_customize->add_setting( 'toogle_st_slider', array(
			'default'			=> true,
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'toogle_st_slider', array(
			'label'				=> 'Main Slider',
			'section'			=> 'toogle_post_types',
			'type'				=> 'checkbox',
		) );

		$wp_customize->add_setting( 'toogle_st_portfolio', array(
			'default'			=> true,
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'toogle_st_portfolio', array(
			'label'				=> 'Portfolio',
			'section'			=> 'toogle_post_types',
			'type'				=> 'checkbox',
		) );

		$wp_customize->add_setting( 'toogle_st_team', array(
			'default'			=> true,
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'toogle_st_team', array(
			'label'				=> 'Team',
			'section'			=> 'toogle_post_types',
			'type'				=> 'checkbox',
		) );

		$wp_customize->add_setting( 'toogle_st_testimonials', array(
			'default'			=> true,
			'transport'		=> 'postMessage',
		) );

		$wp_customize->add_control( 'toogle_st_testimonials', array(
			'label'				=> 'Testimonials',
			'section'			=> 'toogle_post_types',
			'type'				=> 'checkbox',
		) );

	}
}

new St_Customizer();
