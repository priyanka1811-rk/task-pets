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
class Widgets_Overview extends Widget_Base {

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
		return 'Safe Overview';
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
		return __( 'Safe Overview', 'easy-plugin' );
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
            'overview_settings',
            [
                'label' => esc_html__( 'overview Field1 Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'overview_field1_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
        $this->add_control(
            'overview_field1_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'overview_field1_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'overview_field1_btn_icon',
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
            'overview_field1_btn',
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
			'overview_field1_img',
			[
				'label' => esc_html__( 'Image1', 'easy-plugin' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
        );
		$this->end_controls_section();
		
		$this->start_controls_section(
            'overview_field2_settings',
            [
                'label' => esc_html__( 'overview Field2 Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'overview_field2_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
        $this->add_control(
            'overview_field2_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'overview_field2_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'overview_field2_btn_icon',
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
            'overview_field2_btn',
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
		
		$this->start_controls_section(
            'overview_field3_settings',
            [
                'label' => esc_html__( 'overview Field3 Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'overview_field3_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'overview_field3_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'overview_field3_btn_icon',
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
            'overview_field3_btn',
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
			$user_ID = get_current_user_id(); 
			
			echo '<div class="sp-overview">
				<div class="sp-dashboard-field">
					<div class="sp-overview-sec">
						<div class="sp-overview-sec1-content">';
							if(!empty($settings['overview_field1_title'])){
							   echo '<h1>'.esc_html($settings['overview_field1_title']).'</h1>';
							}
							if(!empty($settings['overview_field1_desc'])){
							   echo '<p>'.esc_html($settings['overview_field1_desc']).'</p>';
							}
							if(!empty($settings['overview_field1_btn']) && !empty($settings['overview_btn_title'])){
								$btn_url = !empty($settings['overview_field1_btn']['url']) ? $settings['overview_field1_btn']['url'] : '';
								$btn_target = $settings['overview_field1_btn']['is_external'] == 'off' ? '_blank' : '_self';
								$btn_title = !empty($settings['overview_field1_btn_title']) ? $settings['overview_field1_btn_title'] : '';
								$overview_btn_icon_value = !empty($settings['overview_field1_btn_icon']['value']) ? $settings['overview_field1_btn_icon']['value'] : '';
								$overview_btn_icon_library = !empty($settings['overview_field1_btn_icon']['library']) ? $settings['overview_field1_btn_icon']['library'] : '';
								echo '<div class="sp-btn">
									<a href="'.esc_url($btn_url).'" target="'.esc_attr( $btn_target).'">'.esc_html($btn_title).'<i class="'.esc_attr($overview_btn_icon_value.' '.$overview_btn_icon_library).'"></i></a>
								</div>';
							}
						echo '</div>';
						if(!empty($settings['overview_field1_img']['url'])){
						   echo '<div class="sp-overview-sec1-mg">
								<img src="'.esc_url($settings['overview_field1_img']['url']).'" alt="'.esc_attr($settings['overview_field1_img']['alt']).'">
						   </div>';
						}
					echo '</div>
				</div>
				
				<div class="sp-dashboard-field">
					<div class="sp-overview-secsp-overview-sec2">
						<div class="sp-overview-sec2-content">';
							if(!empty($settings['overview_field2_title'])){
							  echo '<h2>'.esc_html($settings['overview_field2_title']).'</h2>';
							}
							if(!empty($settings['overview_field2_desc'])){
							   echo '<p>'.esc_html($settings['overview_field2_desc']).'</p>';
							}
							
						echo '</div>
						<div class="sp-overview-sec2-btn">';
							if(!empty($settings['overview_field2_btn']) && !empty($settings['overview_field2_btn_title'])){
								$btn_url = !empty($settings['overview_field2_btn']['url']) ? $settings['overview_field2_btn']['url'] : '';
								$btn_target = $settings['overview_field2_btn']['is_external'] == 'off' ? '_blank' : '_self';
								$btn_title = !empty($settings['overview_field2_btn_title']) ? $settings['overview_field2_btn_title'] : '';
								$overview_btn_icon_value = !empty($settings['overview_field2_btn_icon']['value']) ? $settings['overview_field2_btn_icon']['value'] : '';
								$overview_btn_icon_library = !empty($settings['overview_field2_btn_icon']['library']) ? $settings['overview_btn_icon']['library'] : '';
								echo '<div class="sp-btn">
									<a href="'.esc_url($btn_url).'" target="'.esc_attr( $btn_target).'" class="add_more_petss">'.esc_html($btn_title).'<i class="'.esc_attr($overview_btn_icon_value.' '.$overview_btn_icon_library).'"></i></a>
								</div>';
							}
						echo '</div>
					</div>
				</div>
				
				<div class="sp-dashboard-field">
					<div class="sp-overview-secsp-overview-sec3">
						<div class="sp-overview-sec2-content">';
							if(!empty($settings['overview_field3_title'])){
							   echo '<h2>'.esc_html($settings['overview_field3_title']).'</h2>';
							}
							
						echo '</div>
						<div class="sp-overview-sec2-btn">';
							if(!empty($settings['overview_field3_btn']) && !empty($settings['overview_field3_btn_title'])){
							
								$btn_url = !empty($settings['overview_field3_btn']['url']) ? $settings['overview_field3_btn']['url'] : '';
								$btn_target = $settings['overview_field3_btn']['is_external'] == 'off' ? '_blank' : '_self';
								$btn_title = !empty($settings['overview_field3_btn_title']) ? $settings['overview_field3_btn_title'] : '';
								$overview_btn_icon_value = !empty($settings['overview_field3_btn_icon']['value']) ? $settings['overview_field3_btn_icon']['value'] : '';
								$overview_btn_icon_library = !empty($settings['overview_field3_btn_icon']['library']) ? $settings['overview_field3_btn_icon']['library'] : '';
								echo '<div class="sp-btn">
									<a href="'.esc_url('').'" target="'.esc_attr( $btn_target).'" class="owner_detail_update" data-id="'.esc_attr($user_ID).'">'.esc_html($btn_title).'<i class="'.esc_attr($overview_btn_icon_value.' '.$overview_btn_icon_library).'"></i></a>
								</div>';
							}
						echo '</div>
					</div>
					<div class="sp-owner-info" id="sp_owner_info">';
						$user_ID = get_current_user_id(); 
						$user_data = get_userdata($user_ID);
						$user_meta = get_user_meta($user_ID);
						if ($user_data) {
							$email = $user_data->user_email;
						}
						if ($user_meta) {
							$first_name = isset($user_meta['first_name'][0]) && !empty($user_meta['first_name'][0]) ? $user_meta['first_name'][0] : (isset($user_meta['nickname'][0]) ? $user_meta['nickname'][0] : '');
							$last_name = isset($user_meta['last_name'][0]) && !empty($user_meta['last_name'][0]) ? $user_meta['last_name'][0] : '';
							$address = isset($user_meta['user_address'][0]) ? $user_meta['user_address'][0] : '';
							$phone = isset($user_meta['user_phone'][0]) ? $user_meta['user_phone'][0] : '';
							$full_name = isset($user_meta['user_full_name'][0]) ? $user_meta['user_full_name'][0] : '';
							$sec_phone = isset($user_meta['user_sec_phone'][0]) ? $user_meta['user_sec_phone'][0] : '';
						}
						
						echo '<div class="sp-owner-info-inner">';
							echo '<div class="sp-owner-first-info">
								<div class="sp-owner-details">
									<h5>'.esc_html('First Name').'</h5>
									<h6 id="owner_fname">'.esc_html($first_name).'</h6>
								</div>
								<div class="sp-owner-details">
									<h5>'.esc_html('Last Name').'</h5>
									<h6 id="owner_lname">'.esc_html($last_name).'</h6>
								</div>
								<div class="sp-owner-details">
									<h5>'.esc_html('Email').'</h5>
									<h6 id="owner_email">'.esc_html($email).'</h6>
								</div>
								<div class="sp-owner-details">
									<h5>'.esc_html('Phone').'</h5>
									<h6 id="owner_phone">'.esc_html($phone).'</h6>
								</div>
							</div>
							<div class="sp-owner-second-title">
								<h4>'.esc_html('Second Contact').'</h4>
							</div>
							<div class="sp-owner-second-info">
								<div class="sp-owner-details">
									<h5>'.esc_html('Name').'</h5>
									<h6 id="owner_fullname">'.esc_html($full_name).'</h6>
								</div>
								<div class="sp-owner-details">
									<h5>'.esc_html('Telephone').'</h5>
									<h6 id="owner_tele">'.esc_html($sec_phone).'</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
		}
	}
} 
