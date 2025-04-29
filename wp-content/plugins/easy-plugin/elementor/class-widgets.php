<?php
/**
 * Widgets class.
 */

 namespace EASYSUBSCRIPTION;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	wp_die();
}

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once 'banner.php';
		require_once 'card.php';
		require_once 'section3.php';
		require_once 'section4.php';
		require_once 'icons-with-content.php';
		require_once 'section5.php';
		require_once 'overview.php';
		require_once 'pets.php';
		require_once 'account.php';
		require_once 'pet-list.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *  
	 * @since 1.0.0
	 * @access public 
	 */
	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Card() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Section_Three() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Section_Four() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_IconWithContent() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Section_Five() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Overview() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Pets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Account() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets_Pet() );
	}
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();
