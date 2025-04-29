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
class Widgets_Account extends Widget_Base {

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
		return 'Safe Account';
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
		return __( 'Safe Account', 'easy-plugin' );
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
				$user_bussiness = isset($user_meta['user_bussiness'][0]) ? $user_meta['user_bussiness'][0] : '';
				$user_district = isset($user_meta['user_district'][0]) ? $user_meta['user_district'][0] : '';
				$user_country = isset($user_meta['user_country'][0]) ? $user_meta['user_country'][0] : '';
				$user_address = $address . ',' .$user_district. ' ' . $user_country;
				
				$first_letter = !empty($first_name) ? strtoupper(substr($first_name, 0, 1)) : '';
			}
			echo '<div class="sp-pets">
				<div class="sp-dashboard-field">
					<div class="sp-overview-secsp-overview-sec3">
						<div class="sp-user-profile-letter"><span>'.esc_html($first_letter).'</span></div>
						<div class="sp-overview-sec2-content">
							<h2>'.esc_html('Owner Information').'</h2>
						</div>
						<div class="sp-overview-sec2-btn">
							<div class="sp-btn">
								<a href="'.esc_url('#').'" class="owner_detail_update" data-id="'.esc_attr($user_ID).'">'.esc_html('Edit').'
									<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12.2069 3.58561L9.41438 0.792486C9.32152 0.699603 9.21127 0.625923 9.08993 0.575654C8.96859 0.525385 8.83853 0.499512 8.70719 0.499512C8.57585 0.499512 8.4458 0.525385 8.32446 0.575654C8.20312 0.625923 8.09287 0.699603 8 0.792486L0.29313 8.49999C0.199867 8.59251 0.125926 8.70265 0.0756045 8.824C0.025283 8.94535 -0.000414649 9.07549 5.05934e-06 9.20686V12C5.05934e-06 12.2652 0.105362 12.5196 0.292898 12.7071C0.480435 12.8946 0.734789 13 1.00001 13H3.79313C3.9245 13.0004 4.05464 12.9747 4.17599 12.9244C4.29735 12.8741 4.40748 12.8001 4.50001 12.7069L12.2069 4.99999C12.2998 4.90712 12.3734 4.79687 12.4237 4.67553C12.474 4.55419 12.4999 4.42414 12.4999 4.2928C12.4999 4.16146 12.474 4.0314 12.4237 3.91006C12.3734 3.78872 12.2998 3.67847 12.2069 3.58561ZM1.20688 8.99999L6.50001 3.70686L7.54313 4.74999L2.25001 10.0425L1.20688 8.99999ZM1.00001 10.2069L2.79313 12H1.00001V10.2069ZM4.00001 11.7931L2.95688 10.75L8.25 5.45686L9.29313 6.49999L4.00001 11.7931ZM10 5.79311L7.20688 2.99999L8.70688 1.49999L11.5 4.29249L10 5.79311Z" fill="black"/>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<div class="sp-owner-info" id="sp_owner_info">';
						
						
						echo '<div class="sp-owner-info-inner">
							<div class="sp-owner-first-info">
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
				<div class="sp-dashboard-field">
					<div class="sp-overview-secsp-overview-sec3">
						<div class="sp-overview-sec2-content">
							<h2>'.esc_html('Address').'</h2>
						</div>
						<div class="sp-overview-sec2-btn">
							<div class="sp-btn">
								<a href="'.esc_url('#').'" class="owner_detail_update" data-id="'.esc_attr($user_ID).'" data-type="'.esc_attr('address').'">'.esc_html('Edit').'
									<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12.2069 3.58561L9.41438 0.792486C9.32152 0.699603 9.21127 0.625923 9.08993 0.575654C8.96859 0.525385 8.83853 0.499512 8.70719 0.499512C8.57585 0.499512 8.4458 0.525385 8.32446 0.575654C8.20312 0.625923 8.09287 0.699603 8 0.792486L0.29313 8.49999C0.199867 8.59251 0.125926 8.70265 0.0756045 8.824C0.025283 8.94535 -0.000414649 9.07549 5.05934e-06 9.20686V12C5.05934e-06 12.2652 0.105362 12.5196 0.292898 12.7071C0.480435 12.8946 0.734789 13 1.00001 13H3.79313C3.9245 13.0004 4.05464 12.9747 4.17599 12.9244C4.29735 12.8741 4.40748 12.8001 4.50001 12.7069L12.2069 4.99999C12.2998 4.90712 12.3734 4.79687 12.4237 4.67553C12.474 4.55419 12.4999 4.42414 12.4999 4.2928C12.4999 4.16146 12.474 4.0314 12.4237 3.91006C12.3734 3.78872 12.2998 3.67847 12.2069 3.58561ZM1.20688 8.99999L6.50001 3.70686L7.54313 4.74999L2.25001 10.0425L1.20688 8.99999ZM1.00001 10.2069L2.79313 12H1.00001V10.2069ZM4.00001 11.7931L2.95688 10.75L8.25 5.45686L9.29313 6.49999L4.00001 11.7931ZM10 5.79311L7.20688 2.99999L8.70688 1.49999L11.5 4.29249L10 5.79311Z" fill="black"/>
									</svg>
								</a>
							</div>
						</div>
					</div>
					<div class="sp-owner-info" id="sp_owner_info">
						<div class="sp-owner-info-inner">
							<div class="sp-owner-first-info">
								<div class="sp-owner-details">
									<h5>'.esc_html('Address').'</h5>
									<h6 id="owner_address">'.esc_html($user_address).'</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
		}
	}
} 
