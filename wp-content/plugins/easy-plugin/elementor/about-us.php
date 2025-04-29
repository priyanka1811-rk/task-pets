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
class Widgets_About extends Widget_Base {

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
		return 'Easy About';
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
		return __( 'Easy About', 'easy-plugin' );
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
            'about_settings',
            [
                'label' => esc_html__( 'Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
		'about_style',
			[
				'label' => esc_html__( 'About Style', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1' => esc_html__( 'Style1', 'easy-plugin' ),
					'2' => esc_html__( 'Style2', 'easy-plugin' ),
					
				],
			]
		);
		$this->end_controls_section();
		
	    $this->start_controls_section(
            'about_style1',
            [
                'label' => esc_html__( 'Style1', 'easy-plugin' ),
				'condition' => ['about_style' => '1'],
            ]
        );
		$this->add_control(
            'about_main_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'about_subtitle',
            [
                'label'       => esc_html__( 'Sub Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'about_tagline',
            [
                'label'       => esc_html__( 'Tagline', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$repeater = new Repeater();
		$repeater->add_control(
            'about_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$repeater->add_control(
            'about_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$repeater->add_control(
			'about_img',
			[
				'label' => esc_html__( 'Image', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$repeater->add_control(
			'about_bg_img',
			[
				'label' => esc_html__( 'Background Image', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->add_control(
			'about_list',
            [
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'seperator'   => 'before',
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{about_title}}',
				'label'       => esc_html__( 'Add List', 'easy-plugin' ),
            ]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
            'about_style2',
            [
                'label' => esc_html__( 'Style2', 'easy-plugin' ),
				'condition' => ['about_style' => '2'],
            ]
        );
		$this->add_control(
            'about_title1',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'about_detail',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
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
			if(($settings['about_style'] == 1)){
				echo '<section class="easy-hero easy-hero-about">
					<div class="easy-container">
						<div class="easy-about-content easy-about-main-content">';
							if(!empty($settings['about_tagline'])){
								echo '<span>'.$settings['about_tagline'].'</span>';
							}
							if(!empty($settings['about_main_title'])){
								echo '<h2>'.$settings['about_main_title'].'</h2>';
							}
							if(!empty($settings['about_subtitle'])){
								echo '<p>'.$settings['about_subtitle'].'</p>';
							}
						echo '</div>';
						if($settings['about_list']){
							echo '<div class="easy-about-inner-wrap">';
								foreach($settings['about_list'] as $item){
									echo '<div class="easy-about-inner">
										<div class="easy-about-content">';
											if(!empty($item['about_title'])){
												echo '<h2>'.$item['about_title'].'</h2>';
											}
											
										echo '</div>
										<div class="imgeasy-about-img">';
											if(!empty($item['about_desc'])){
												echo '<p>'.$item['about_desc'].'</p>';
											}
										echo '</div>
									</div>';
								}
							echo '</div>';
						}
						
					echo '</div>
				</section>';
			}
			if(($settings['about_style'] == 2)){
				echo '<section class="easy-hero easy-hero-about-image-with-text">
					<div class="easy-container">
						<div class="easy-hero-about-inner">
							<div class="easy-about-content">';
								if(!empty($settings['about_title1'])){
									echo '<h2>'.$settings['about_title1'].'</h2>';
								}
								echo $settings['about_detail'];
							echo '</div>
						</div>
					</div>
				</section>';
			}
		}
	}
} 
