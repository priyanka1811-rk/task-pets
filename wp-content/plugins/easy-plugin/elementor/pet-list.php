<?php
/**
 * Awesomesauce class.
 *
 * @category   Class
 */

namespace EASYSUBSCRIPTION;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class. 
 *
 * @since 1.0.0
 */
class Widgets_Pet extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 */
	public function get_name() {
		return 'Safe Pet';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return __( 'Safe Pet', 'easy-plugin' );
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon() {
		return 'eicon-parallax';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 */
	public function get_categories() {
		return array( 'easy_widgets' );
	}
	
	/**
	 * Register the widget controls.
	 */
	protected function register_controls() {
		$this->start_controls_section(
            'pets_field2_settings',
            [
                'label' => esc_html__( 'Pets Section', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'pets_field2_title',
            [
                'label'       => esc_html__( 'Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Enter Title Here', 'easy-plugin' ),
            ]
        );
        $this->add_control(
            'pets_field2_desc',
            [
                'label'       => esc_html__( 'Description', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Enter Description Here...', 'easy-plugin' ),
            ]
        );
		$this->add_control(
            'pets_btn_title',
            [
                'label'       => esc_html__( 'Button Title', 'easy-plugin' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Click Here', 'easy-plugin' ),
            ]
        );
		$this->add_control(
			'pets_field2_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'easy-plugin' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);
        $this->add_control(
            'pets_field2_btn',
            [
                'label'       => esc_html__( 'Button', 'easy-plugin' ),
                'type'        => Controls_Manager::URL,
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
								echo '<tr>
									<td>
										<div class="sp-owner-details">
											<img src="'.esc_url($attachment_url).'" alt="'.esc_attr('Pet Profile Image').'">
										</div>
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
									<a href="'.esc_url($btn_url).'" target="'.esc_attr( $btn_target).'" class="add_more_pets1">'.esc_html($btn_title).'<i class="'.esc_attr($overview_btn_icon_value.' '.$overview_btn_icon_library).'"></i></a>
								</div>';
							}
						echo '</div>
					</div>
				</div>
			</div>
			<div class="sp-dashboard-field pet-account" id="pet_account">
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
							<a href="" data-id="">'.esc_html('View Profile').'</a>
						</div>
						<div class="sp-btn" id="pet_edit_btn">
							<a href="" data-id="" id="pet_detail_update">'.esc_html('Edit').'</a>
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
							<div class="sp-btn" id="pet_miss_btn">
								<a href="'.esc_url('#').'">'.esc_html('Missing').'
									<!--<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 11L6 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>-->
								</a>
							</div>
							<div class="sp-btn sp-btn-g-border">
								<a href="'.esc_url('#').'">'.esc_html('Download Poster').'</a>
							</div>
							<div class="sp-btn sp-btn-g-border">
								<a href="'.esc_url('#').'">'.esc_html('Alert Vets/Shelters').'</a>
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
