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
class Widgets_Pets extends Widget_Base {

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
		return 'Safe Pets';
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
		return __( 'Safe Pets', 'easy-plugin' );
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
            'pets_field2_settings',
            [
                'label' => esc_html__( 'pets Field2 Settings', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'pets_field2_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Title Here', 'easy-plugin' ),
            ]
        );
        $this->add_control(
            'pets_field2_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'pets_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Type A Text Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'pets_field2_btn_icon',
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
            'pets_field2_btn',
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
		if($settings){
			$user_ID = get_current_user_id();
			global $wpdb;

			$table_name = $wpdb->prefix . 'pet_information';
			$sql = $wpdb->prepare("SELECT * FROM $table_name WHERE role_id = %d ORDER BY id DESC", $user_ID);
			$results = $wpdb->get_results($sql);

			echo '<div class="sp-pets">
				<h1>'.esc_html('Manage Pets').'</h1>

				<div class="sp-dashboard-field">
					<div class="sp-pets-sec">';

					if (!empty($results)) {
						echo '<table class="sp-pets-table" id="pets_table">
							<thead>
								<tr>
									<th>'.esc_html('Pets').'</th>
									<th>'.esc_html('Breed').'</th>
									<th>'.esc_html('Pet Name').'</th>
									<th>'.esc_html('Pet Gender').'</th>
									<th>'.esc_html('DOB').'</th>
									<th>'.esc_html('View').'</th>
								</tr>
							</thead>
							<tbody>';
							foreach ($results as $pet) {
								$pet_id = esc_html($pet->id);
								$breed = esc_html($pet->breed);
								$gender = esc_html($pet->gender);
								$pet_name = esc_html($pet->pet_name);
								$dob = esc_html($pet->dob);
								$attachment_url = esc_url(wp_get_attachment_url($pet->url));
								$status = $pet->status;
								echo '<tr>
									<td>
										<div class="sp-owner-details">';
											if($attachment_url){
												echo '<img src="'.esc_url($attachment_url).'" alt="'.esc_attr('Pet Profile Image').'">';
											}
											else{
												echo '<img src="https://safepawspetfinder.com/wp-content/uploads/2025/02/large_default-f37c3b2ddc539b7721ffdbd4c88987add89f2ef0fd77a71d0d44a6cf3104916e.png" alt="'.esc_attr('Pet Profile Image').'">';
											}	
										echo '</div>
									</td>
									<td>'.esc_html($breed).'</td>
									<td>'.esc_html($pet_name).'</td>
									<td>'.esc_html($gender).'</td>
									<td>'.esc_html($dob).'</td>
									<td>
										<span class="view_pet_details" data-id="'.esc_attr($pet_id).'">
											<svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M28.9816 9.62031C28.9406 9.52773 27.948 7.32578 25.7414 5.11914C22.8012 2.17891 19.0875 0.625 15 0.625C10.9125 0.625 7.19882 2.17891 4.25858 5.11914C2.05194 7.32578 1.05468 9.53125 1.01835 9.62031C0.965043 9.74021 0.9375 9.86996 0.9375 10.0012C0.9375 10.1324 0.965043 10.2621 1.01835 10.382C1.05936 10.4746 2.05194 12.6754 4.25858 14.882C7.19882 17.8211 10.9125 19.375 15 19.375C19.0875 19.375 22.8012 17.8211 25.7414 14.882C27.948 12.6754 28.9406 10.4746 28.9816 10.382C29.0349 10.2621 29.0625 10.1324 29.0625 10.0012C29.0625 9.86996 29.0349 9.74021 28.9816 9.62031ZM15 14.6875C14.0729 14.6875 13.1666 14.4126 12.3958 13.8975C11.6249 13.3824 11.0241 12.6504 10.6693 11.7938C10.3145 10.9373 10.2217 9.9948 10.4026 9.08551C10.5834 8.17623 11.0299 7.341 11.6854 6.68544C12.341 6.02988 13.1762 5.58344 14.0855 5.40257C14.9948 5.2217 15.9373 5.31453 16.7938 5.66931C17.6503 6.0241 18.3824 6.62491 18.8975 7.39576C19.4126 8.16662 19.6875 9.0729 19.6875 10C19.6875 11.2432 19.1936 12.4355 18.3146 13.3146C17.4355 14.1936 16.2432 14.6875 15 14.6875Z" fill="white"></path> </svg>
										</span>
									</td>
								</tr>';
							}

							echo '</tbody>
						</table>';
					}else{
						echo '<p>No pet added.</p>';
					}

					echo '</div>
				</div>
				<div class="sp-dashboard-field">
					<div class="sp-pets-secsp-pets-sec2">
						<div class="sp-pets-sec2-content">';
							if(!empty($settings['pets_field2_title'])){
							  echo '<h2>'.esc_html($settings['pets_field2_title']).'</h2>';
							}
							if(!empty($settings['pets_field2_desc'])){
							   echo '<p>'.esc_html($settings['pets_field2_desc']).'</p>';
							}
							
						echo '</div>
						<div class="sp-overview-sec2-btn">';
							if(!empty($settings['pets_field2_btn']) && !empty($settings['pets_btn_title'])){
								$btn_url = !empty($settings['pets_field2_btn']['url']) ? $settings['pets_field2_btn']['url'] : '';
								$btn_target = $settings['pets_field2_btn']['is_external'] == 'off' ? '_blank' : '_self';
								$btn_title = !empty($settings['pets_btn_title']) ? $settings['pets_btn_title'] : '';
								$overview_btn_icon_value = !empty($settings['pets_field2_btn_icon']['value']) ? $settings['pets_field2_btn_icon']['value'] : '';
								$overview_btn_icon_library = !empty($settings['pets_field2_btn_icon']['library']) ? $settings['pets_field2_btn_icon']['library'] : '';
								echo '<div class="sp-btn">
									<a href="'.esc_url($btn_url).'" target="'.esc_attr( $btn_target).'" class="add_more_pets" data-type="direct">'.esc_html($btn_title).'<i class="'.esc_attr($overview_btn_icon_value.' '.$overview_btn_icon_library).'"></i></a>
								</div>';
							}
						echo '</div>
					</div>
				</div>
			</div>
			<div class="sp-dashboard-field pet-account" id="pet_account">
				<div class="close_pets_details">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M15.281 14.2198C15.3507 14.2895 15.406 14.3722 15.4437 14.4632C15.4814 14.5543 15.5008 14.6519 15.5008 14.7504C15.5008 14.849 15.4814 14.9465 15.4437 15.0376C15.406 15.1286 15.3507 15.2114 15.281 15.281C15.2114 15.3507 15.1286 15.406 15.0376 15.4437C14.9465 15.4814 14.849 15.5008 14.7504 15.5008C14.6519 15.5008 14.5543 15.4814 14.4632 15.4437C14.3722 15.406 14.2895 15.3507 14.2198 15.281L8.00042 9.06073L1.78104 15.281C1.64031 15.4218 1.44944 15.5008 1.25042 15.5008C1.05139 15.5008 0.860522 15.4218 0.719792 15.281C0.579062 15.1403 0.5 14.9494 0.5 14.7504C0.5 14.5514 0.579062 14.3605 0.719792 14.2198L6.9401 8.00042L0.719792 1.78104C0.579062 1.64031 0.5 1.44944 0.5 1.25042C0.5 1.05139 0.579062 0.860522 0.719792 0.719792C0.860522 0.579062 1.05139 0.5 1.25042 0.5C1.44944 0.5 1.64031 0.579062 1.78104 0.719792L8.00042 6.9401L14.2198 0.719792C14.3605 0.579062 14.5514 0.5 14.7504 0.5C14.9494 0.5 15.1403 0.579062 15.281 0.719792C15.4218 0.860522 15.5008 1.05139 15.5008 1.25042C15.5008 1.44944 15.4218 1.64031 15.281 1.78104L9.06073 8.00042L15.281 14.2198Z" fill="black"/>
					</svg>
				</div>
				<div class="sp-pets-sec">
					<div class="sp-pets-sec-profile">
						<div class="sp-pets-sec1-mg">
							<img src="" alt="'.esc_attr('Pet Profile Image').'" id="pet_img">
					   </div>
						<div class="sp-owner-details">
							<h6 id="pet_id"></h6>
							<h5>'.esc_html('Breed').'</h5>
							<h6 id="pet_breed"></h6>
						</div>
					</div>
					<div class="sp-pets-sec1-content">
						<div class="sp-btn" id="pet_profile_btn">
							<a href="" data-id="">'.esc_html('View Profile').'
								<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 11L6 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
							</a>
						</div>
						<div class="sp-btn" id="pet_edit_btn">
							<a href="" data-id="" id="pet_detail_update">'.esc_html('Edit').'
								<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12.2069 3.58561L9.41438 0.792486C9.32152 0.699603 9.21127 0.625923 9.08993 0.575654C8.96859 0.525385 8.83853 0.499512 8.70719 0.499512C8.57585 0.499512 8.4458 0.525385 8.32446 0.575654C8.20312 0.625923 8.09287 0.699603 8 0.792486L0.29313 8.49999C0.199867 8.59251 0.125926 8.70265 0.0756045 8.824C0.025283 8.94535 -0.000414649 9.07549 5.05934e-06 9.20686V12C5.05934e-06 12.2652 0.105362 12.5196 0.292898 12.7071C0.480435 12.8946 0.734789 13 1.00001 13H3.79313C3.9245 13.0004 4.05464 12.9747 4.17599 12.9244C4.29735 12.8741 4.40748 12.8001 4.50001 12.7069L12.2069 4.99999C12.2998 4.90712 12.3734 4.79687 12.4237 4.67553C12.474 4.55419 12.4999 4.42414 12.4999 4.2928C12.4999 4.16146 12.474 4.0314 12.4237 3.91006C12.3734 3.78872 12.2998 3.67847 12.2069 3.58561ZM1.20688 8.99999L6.50001 3.70686L7.54313 4.74999L2.25001 10.0425L1.20688 8.99999ZM1.00001 10.2069L2.79313 12H1.00001V10.2069ZM4.00001 11.7931L2.95688 10.75L8.25 5.45686L9.29313 6.49999L4.00001 11.7931ZM10 5.79311L7.20688 2.99999L8.70688 1.49999L11.5 4.29249L10 5.79311Z" fill="black"></path>
									</svg>
							</a>
						</div>
					</div>
				</div>
				<div class="sp-owner-info" id="sp_pet_info">
					<div class="sp-owner-info-inner">
						<div class="sp-owner-first-info">
							<div class="sp-owner-details">
								<h5>'.esc_html('Gender').'</h5>
								<h6 id="pet_gender"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Allergies').'</h5>
								<h6 id="pet_allergies"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Medication').'</h5>
								<h6 id="pet_medication"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Age').'</h5>
								<h6 id="pet_age"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Date of birth ( if known )').'</h5>
								<h6 id="pet_dob"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Microchip Number').'</h5>
								<h6 id="pet_microchip"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Vets Name ').'</h5>
								<h6 id="pet_vets_name"></h6>
							</div>
							<div class="sp-owner-details">
								<h5>'.esc_html('Vets Telephone Number').'</h5>
								<h6 id="pet_vets_tel"></h6>
							</div>
						</div>
					</div>
				</div>
				<div class="sp-pet-missing">
					<div class="sp-owner-details">
						<h5>'.esc_html('Is missing?').'</h5>
						<div class="sp-pet-missing-btns">
							<div class="sp-btn sp-btn-g-border" id="pet_miss_btn" data-id="">
								<a href="#" data-id="" data-type="missing">Missing</a>
							</div>
							<div class="sp-btn sp-btn-g-border">
								<a class="hide" href="#" data-id="" id="poster_btn" target="_blank">Download Poster</a>
							</div>
							<div class="sp-btn sp-btn-g-border">
								<a class="hide" href="#" id="alert_btn" data-id="">Alert Vets/Shelters</a>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="sp-pet-replacetag">	
					<div class="sp-owner-details">
						<h5>'.esc_html('Replace Tag').'</h5>
						<div class="sp-btn">
							<a href="'.esc_url('#').'">'.esc_html('Order Replacement').'
								<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 11L6 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>';
		}
	}
} 
