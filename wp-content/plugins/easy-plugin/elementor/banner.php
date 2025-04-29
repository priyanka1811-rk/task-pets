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
class Widgets_Banner extends Widget_Base {

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
		return 'Safe Banner';
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
		return __( 'Safe Banner', 'easy-plugin' );
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
            'banner_settings',
            [
                'label' => esc_html__( 'Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'banner_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
        $this->add_control(
            'banner_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'banner_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'banner_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			],
		);
        $this->add_control(
            'banner_btn',
            [
                'label'       => esc_html__( 'Button', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                        'url' => 'https://your-link.com',
                    	'is_external' => true,
                    	'nofollow' => true,
                    	'text' => 'Click Me',
                	],
            ]
        );
		$this->add_control(
			'banner_img1',
			[
				'label' => esc_html__( 'Image1', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
			'banner_img2',
			[
				'label' => esc_html__( 'Image2', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
			'banner_img3',
			[
				'label' => esc_html__( 'Image3', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
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
			
			echo '<section class="sp-sec sp-banner">
				<div class="sp-container">
					<div class="sp-row">
						<div class="sp-col sb-banner-col sb-banner-col-1">
							<div class="sp-banner-content">';
								if(!empty($settings['banner_title'])){
    		                       echo $settings['banner_title'];
    		                    }
								if(!empty($settings['banner_desc'])){
    		                       echo '<p>'.esc_html($settings['banner_desc']).'</p>';
    		                    }
								if(!empty($settings['banner_btn']) && !empty($settings['banner_btn_title'])){
    	                            $btn_url = !empty($settings['banner_btn']['url']) ? $settings['banner_btn']['url'] : '';
    	                            $btn_target = $settings['banner_btn']['is_external'] == 'off' ? '_blank' : '_self';
    	                            $btn_title = !empty($settings['banner_btn_title']) ? $settings['banner_btn_title'] : '';
									$banner_btn_icon_value = !empty($settings['banner_btn_icon']['value']) ? $settings['banner_btn_icon']['value'] : '';
									$banner_btn_icon_library = !empty($settings['banner_btn_icon']['library']) ? $settings['banner_btn_icon']['library'] : '';
									echo '<div class="sp-btn">
										<a href="'.esc_url($btn_url).'" target="'.esc_attr( $btn_target).'">'.esc_html($btn_title).'<i class="'.esc_attr($banner_btn_icon_value.' '.$banner_btn_icon_library).'"></i></a>
									</div>';
    		                    }
								
							echo '</div>
						</div>
						<div class="sp-col sb-banner-col sb-banner-col-2">
							<div class="sp-banner-images">';
								if(!empty($settings['banner_img1']['url'])){
								   echo '<div class="sp-banner-img-1">
										<img src="'.esc_url($settings['banner_img1']['url']).'" alt="'.esc_attr($settings['banner_img1']['alt']).'">
								   </div>';
								}
								if(!empty($settings['banner_img2']['url'])){
								   echo '<div class="sp-banner-img-2">
								   <img src="'.esc_url($settings['banner_img2']['url']).'" alt="'.esc_attr($settings['banner_img2']['alt']).'">
								   </div>';
								}
								if(!empty($settings['banner_img3']['url'])){
								   echo '<div class="sp-banner-img-3 sp-img">
										<img src="'.esc_url($settings['banner_img3']['url']).'" alt="'.esc_attr($settings['banner_img3']['alt']).'">
								   </div>';
								}
							echo '</div>
						</div>
					</div>
				</div>
			</section>';
		}
	}
} 
