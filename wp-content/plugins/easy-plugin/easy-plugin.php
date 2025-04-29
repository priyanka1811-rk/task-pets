<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	wp_die();
}

/**
 * Plugin Name: Easy Plugin
 * Description: Simple hello world widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: easy-plugin
 *
 * Include the Elementor class.
 */
 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
define('CUSTOM_PLUGIN_PATH', trailingslashit(plugin_dir_path( __FILE__ )));
define('CUSTOM_PLUGIN_URL', trailingslashit(plugin_dir_url( __FILE__ )));

require_once CUSTOM_PLUGIN_PATH . 'elementor/class-elementor-easy.php';
//require CUSTOM_PLUGIN_PATH.'include/function.php';   

//swiper slider
/*function add_jquery_to_footer() {
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), null, true);

    // Add Swiper CSS (Ensure you have it in your theme/plugin or use CDN)
    wp_enqueue_style('swiper-style', 'https://unpkg.com/swiper/swiper-bundle.min.css');
	
	$jquery_code = " 
		jQuery(document).ready(function($){
			var swiper = new Swiper(\".easy_slider\", {
				centeredSlides: false,
				slidesPerView: 9,
				spaceBetween: 30,
				mousewheelControl: true,
				autoHeight: true,				
				loop: true,
				pauseOnHover:true,
				followFinger: true,
				autoplay: {
					enabled: true,
					delay: 1,
					disableOnInteraction: true,	
					
				},
				allowTouchMove: false,
				effect: 'slide',
				speed: 4000,
			});
		});
	";
	wp_add_inline_script('jquery', $jquery_code, 'after'); 
}
add_action('wp_enqueue_scripts', 'add_jquery_to_footer');*/