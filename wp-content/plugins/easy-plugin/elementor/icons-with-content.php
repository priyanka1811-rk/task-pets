<?php
/**
 * Awesomesauce class.
 *
 * @category   Class
 */

namespace EASYSUBSCRIPTION;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class. 
 *
 * @since 1.0.0
 */
class Widgets_IconWithContent extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Safe Icon With Content';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Safe Icon With Content', 'easy-plugin' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-parallax';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'easy_widgets' );
	}
	
	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
	    $this->start_controls_section(
            'iwc_settings',
            [
                'label' => esc_html__( 'Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'iwc_main_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$repeater = new Repeater();
		$repeater->add_control(
            'iwc_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
        $repeater->add_control(
            'iwc_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$repeater->add_control(
			'iwc_img',
			[
				'label' => esc_html__( 'Image', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$repeater->add_control(
			'iwc_img2',
			[
				'label' => esc_html__( 'Image2', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
            'iwc_list',
            [
                'type'        => Controls_Manager::REPEATER,
                'seperator'   => 'before',
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{iwc_title}}',
				'label'       => esc_html__( 'Add Service', 'easy-plugin' ),
            ]
        );
		$this->end_controls_section();
	}
 
	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if(!empty($settings)){
			
			echo '<section class="sp-sec sp-iwc">
				<div class="sp-container">
					<div class="sp-row">';
						if(!empty($settings['iwc_main_title'])){
						   echo '<h2>'.esc_html($settings['iwc_main_title']).'</h2>';
						}
					echo '</div>
					<div class="sp-row">';
						if(!empty($settings['iwc_list'])){
							foreach($settings['iwc_list'] as $item){
								echo '<div class="sp-col sb-iwc-col">
									<div class="sp-iwc-content">';
										if(!empty($item['iwc_img']['url'])){
										   echo '<div class="sp-iwc-img"><img src="'.esc_url($item['iwc_img']['url']).'" alt="'.esc_attr($item['iwc_img']['alt']).'"></div>';
										}
										if(!empty($item['iwc_title'])){
										   echo '<h5>'.esc_html($item['iwc_title']).'</h5>';
										}
										if(!empty($item['iwc_desc'])){
										   echo '<p>'.esc_html($item['iwc_desc']).'</p>';
										}
										
									echo '</div>
								</div>';
							}
						}
					echo '</div>
				</div>
			</section>';
		}
	}
} 
