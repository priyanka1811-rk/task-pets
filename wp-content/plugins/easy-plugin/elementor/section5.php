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
class Widgets_Section_Five extends Widget_Base {

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
		return 'Safe Section5';
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
		return __( 'Safe Section5', 'easy-plugin' );
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
            'section5_settings',
            [
                'label' => esc_html__( 'Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'section5_img1',
			[
				'label' => esc_html__( 'Image1', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
			'section5_img2',
			[
				'label' => esc_html__( 'Image2', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
			'section5_img3',
			[
				'label' => esc_html__( 'Image3', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
            'section5_toggle_text_one',
            [
                'label'       => esc_html__( '6 month', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_toggle_text_two',
            [
                'label'       => esc_html__( '12 month', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_plan_type',
            [
                'label'       => esc_html__( 'Plan Type', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_plan_title',
            [
                'label'       => esc_html__( 'Plan Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_monthly_amount_one',
            [
                'label'       => esc_html__( 'Monthly Amount1', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_monthly_amount_two',
            [
                'label'       => esc_html__( 'Monthly Amount2', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_amount_strike',
            [
                'label'       => esc_html__( 'Strike Amount1', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_annual_amount_one',
            [
                'label'       => esc_html__( 'Annual Amount1', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_annual_amount_two',
            [
                'label'       => esc_html__( 'Annual Amount2', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_plan_list',
            [
                'label'       => esc_html__( 'Plan List', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'section5_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'section5_btn_icon',
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
            'section5_btn',
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
			
			echo '<section class="sp-sec sp-section5">
				<div class="sp-container">
					<div class="sp-section5-inner">
						<div class="sp-row">
							<div class="sp-col sb-section5-col">';
								$bg_img = !empty($settings['section5_img3']['url']) ? $settings['section5_img3']['url'] : '';
								echo '<div class="sb-section5-img-sec" style="background-image:url('.$bg_img.');">';
									if(!empty($settings['section5_img1']['url'])){
										echo '<div class="sp-section5-image sp-section5-image1">
											<img src="'.esc_url($settings['section5_img1']['url']).'" alt="'.esc_attr($settings['section5_img1']['alt']).'">
										</div>';
									}
								echo '</div>
							</div>
							<div class="sp-col sb-section5-col">
								<div class="sb-section5-content">';
									if(!empty($settings['section5_title'])){
									   echo '<h2>'.esc_html($settings['section5_title']).'</h2>';
									}
									if(!empty($settings['section5_toggle_text_one']) && !empty($settings['section5_toggle_text_two'])){
									   echo '<div class="sp-plan-toggle" id="sp_plan_toggle"><p>'.esc_html($settings['section5_toggle_text_one']).'</p><span class="sp-plan-toggle-itn"  id="sp_plan_toggle-btn"><span class="sp-plan-toggle-dot"  id="sp_plan_toggle-btn-dot"></span></span> <p>'.esc_html($settings['section5_toggle_text_two']).'</p></div>';
									}
									echo '<div class="sb-section5-plan">';
										if(!empty($settings['section5_plan_type'])){
										   echo '<h3>'.esc_html($settings['section5_plan_type']).'</h3>';
										}
										if(!empty($settings['section5_plan_title'])){
										   echo '<p>'.esc_html($settings['section5_plan_title']).'</p>';
										}
										echo '<div class="sp-plan-amounts">';
										if(!empty($settings['section5_monthly_amount_one']) && !empty($settings['section5_monthly_amount_two'])){
										   echo '<div class="sp-plan-amount sp-plan-month-amount" id="sp_plan_amount">
										   <span class="sp-plan-amount-one">'.esc_html($settings['section5_monthly_amount_one']).'</span><span class="sp-plan-amount-two">'.esc_html($settings['section5_monthly_amount_two']).'</span></div>';
										}
										if(!empty($settings['section5_annual_amount_one']) && !empty($settings['section5_annual_amount_two']) && !empty($settings['section5_amount_strike'])){
										   echo '<div class="sp-plan-amount sp-plan-annual-amount" id="sp_plan_amount"><span class="sp-plan-amount-strike"><s>'.esc_html($settings['section5_amount_strike']).'</s></span>
										   <span class="sp-plan-amount-one">'.esc_html($settings['section5_annual_amount_one']).'</span><span class="sp-plan-amount-two">'.esc_html($settings['section5_annual_amount_two']).'</span></div>';
										}
										echo '</div>
										<hr>
										<div class="sp-plan-list">'.$settings['section5_plan_list'].'</div>';
										if(!empty($settings['section5_btn']) && !empty($settings['section5_btn_title'])){
											$btn_url = !empty($settings['section5_btn']['url']) ? $settings['section5_btn']['url'] : '';
											$btn_target = $settings['section5_btn']['is_external'] == 'off' ? '_blank' : '_self';
											$btn_title = !empty($settings['section5_btn_title']) ? $settings['section5_btn_title'] : '';
											$section5_btn_icon_value = !empty($settings['section5_btn_icon']['value']) ? $settings['section5_btn_icon']['value'] : '';
											$section5_btn_icon_library = !empty($settings['section5_btn_icon']['library']) ? $settings['section5_btn_icon']['library'] : '';
											echo '<div class="sp-btn">
												<a href="'.esc_url($btn_url).'" target="'.esc_attr( $btn_target).'">'.esc_html($btn_title).'<i class="'.esc_attr($section5_btn_icon_value.' '.$section5_btn_icon_library).'"></i></a>
											</div>';
										}
									echo '</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>';
		}
	}
} 
