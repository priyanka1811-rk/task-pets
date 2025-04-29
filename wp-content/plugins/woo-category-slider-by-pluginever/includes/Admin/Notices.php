<?php

namespace WooCommerceCategorySlider\Admin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Notices class.
 *
 * @since 1.0.0
 * @package WooCommerceCategorySlider\Admin
 */
class Notices {

	/**
	 * Notices constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'admin_notices' ) );
	}

	/**
	 * Admin notices.
	 *
	 * @since 1.0.0
	 */
	public function admin_notices() {
		$installed_time = get_option( 'wc_cat_slider_installed' );
		$current_time   = wp_date( 'U' );

		// Halloween offer notice.
//		$halloween_time = date_i18n( strtotime( '2024-11-11 00:00:00' ) );
//		if ( $current_time < $halloween_time ) {
//			wp_enqueue_style( 'wc-category-slider-halloween' );
//			wc_category_slider()->notices->add(
//				array(
//					'message'     => __DIR__ . '/views/notices/halloween.php',
//					'dismissible' => false,
//					'notice_id'   => 'wc_cat_slider_promotion',
//					'style'       => 'border-left-color: #8500ff;',
//					'class'       => 'notice-halloween',
//				)
//			);
//		}

		$offer_time = date_i18n( strtotime( '2024-12-07 00:00:00' ) );
		if ( $current_time < $offer_time ) {
			wp_enqueue_style( 'wc-cat-slider-black-friday' );
			wc_category_slider()->notices->add(
				array(
					'message'     => __DIR__ . '/views/notices/black-friday.php',
					'notice_id'   => 'wc_cat_slider_black_friday_promotion_24',
					'class'       => 'notice-black-friday',
					'style'       => 'border-left-color:#2271b1;',
					'dismissible' => false,
				)
			);
		}

		if ( ! defined( 'WC_CAT_SLIDER_PRO_VERSION' ) ) {
			wc_category_slider()->notices->add(
				array(
					'message'     => __DIR__ . '/views/notices/upgrade.php',
					'notice_id'   => 'wc_cat_slider_upgrade',
					'style'       => 'border-left-color: #0542fa;',
					'dismissible' => false,
				)
			);
		}

		// Show after 5 days.
		if ( $installed_time && $current_time > ( $installed_time + ( 5 * DAY_IN_SECONDS ) ) ) {
			wc_category_slider()->notices->add(
				array(
					'message'     => __DIR__ . '/views/notices/review.php',
					'dismissible' => false,
					'notice_id'   => 'wc_cat_slider_review',
					'style'       => 'border-left-color: #0542fa;',
				)
			);
		}
	}
}
