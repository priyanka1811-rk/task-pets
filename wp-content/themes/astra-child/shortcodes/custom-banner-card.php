<?php 
function custom_banner_section(){
    $html = '';
    $option = get_option( 'pets_options' );
    $img_id1 = $option['pro_ship_img'];
    $title1 = $option['pro_ship_title'];
    $desc1 = $option['pro_ship_desc'];
    $image1 = wp_get_attachment_image_src( $img_id1 , 'full' );
    $img_id2 = $option['customer_img'];
    $image2 = wp_get_attachment_image_src( $img_id2 , 'full' );
    $title2 = $option['customer_title'];
    $desc2 = $option['customer_desc'];
    $html .='<div class="banner-shipping-card">
        <div class="banner-shipping-card-ltsec">
            <img src="'.esc_url($image1[0]).'" alt="'.esc_attr('Ship').'">
            <div class="banner-shipping-card-inner">
                <h4>'.esc_html($title1).'</h4>
                <p>'.esc_html($desc1).'</p>
            </div>
        </div>
        <div class="banner-shipping-card-rtsec">
            <img src="'.esc_url($image2[0]).'" alt="'.esc_attr('Satisfaction').'">
             <div class="banner-shipping-card-inner">
                <h4>'.esc_html($title2).'</h4>
                <p>'.esc_html($desc2).'</p>
            </div>
        </div>
    </div>';
    return $html;

}add_shortcode('banner_card', 'custom_banner_section');