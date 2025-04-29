<?php 
	add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
	function astra_child_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
	} 

	require_once get_stylesheet_directory() . '/shortcodes/latest-post.php';
	require_once get_stylesheet_directory() . '/shortcodes/custom-sec.php';
	require_once get_stylesheet_directory() . '/shortcodes/custom-banner-card.php';

	function pets_customize_register( $wp_customize ) {
		$wp_customize->add_panel('pets_options', array(
			'title'       => __('WP Pets Shop', 'astra-child'),
			'description' => '',
			'priority'    => 20,
		));
		$wp_customize->add_section('pets_banner', array(
			'title'       => __('Banner', 'astra-child'),
			'description' => '',
			'priority'    => 1,
			'panel'       => 'pets_options',
		));
		// Add settings and control for logo upload
		$wp_customize->add_setting("pets_options[product_img]", array(
			"type" => "option", 
			"capability" => "edit_theme_options",
			"default" => get_template_directory().'/asset/images/header_logo.webp',
		));
		$wp_customize->add_control( new WP_Customize_Media_Control(
			$wp_customize, 'pets_options[product_img]', 
			array( // setting id
				'label'    => __( 'Product Image', 'astra-child' ),
				'section'  => 'pets_banner',
				'settings'  => 'pets_options[product_img]',
				'priority' => 1,
			)
		));

		//Shipping Title
		$wp_customize->add_setting("pets_options[pro_ship_img]", array(
			"type" => "option", 
			"capability" => "edit_theme_options",
			"default" => get_template_directory().'/asset/images/header_logo.webp',
		));
		$wp_customize->add_control( new WP_Customize_Media_Control(
			$wp_customize, 'pets_options[pro_ship_img]', 
			array( // setting id
				'label'    => __( 'Image', 'astra-child' ),
				'section'  => 'pets_banner',
				'settings'  => 'pets_options[pro_ship_img]',
				'priority' => 1,
			)
		));
		$wp_customize->add_setting( 'pets_options[pro_ship_title]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => '',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pets_options[pro_ship_title]', array(
			'label'    => __( 'Enter Custom Text', 'astra-child' ),
			'section'  => 'pets_banner',
			'settings' => 'pets_options[pro_ship_title]',
			'type'     => 'text', 
		) ) );

		$wp_customize->add_setting( 'pets_options[pro_ship_desc]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => '',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pets_options[pro_ship_desc]', array(
			'label'    => __( 'Enter Custom Text', 'astra-child' ),
			'section'  => 'pets_banner',
			'settings' => 'pets_options[pro_ship_desc]',
			'type'     => 'text', 
		) ) );

		//Customer satisfaction 
		$wp_customize->add_setting("pets_options[customer_img]", array(
			"type" => "option", 
			"capability" => "edit_theme_options",
			"default" => get_template_directory().'/asset/images/header_logo.webp',
		));
		$wp_customize->add_control( new WP_Customize_Media_Control(
			$wp_customize, 'pets_options[customer_img]', 
			array( // setting id
				'label'    => __( 'Image', 'astra-child' ),
				'section'  => 'pets_banner',
				'settings'  => 'pets_options[customer_img]',
				'priority' => 1,
			)
		));
		$wp_customize->add_setting( 'pets_options[customer_title]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => '',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pets_options[customer_title]', array(
			'label'    => __( 'Enter Custom Text', 'astra-child' ),
			'section'  => 'pets_banner',
			'settings' => 'pets_options[customer_title]',
			'type'     => 'text', 
		) ) );

		$wp_customize->add_setting( 'pets_options[customer_desc]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'default'    => '',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pets_options[customer_desc]', array(
			'label'    => __( 'Enter Custom Text', 'astra-child' ),
			'section'  => 'pets_banner',
			'settings' => 'pets_options[customer_desc]',
			'type'     => 'text', 
		) ) );
	}add_action('customize_register', 'pets_customize_register');
 ?>