<?php 
function custom_section(){
    $html = '';
    $option = get_option( 'pets_options' );
    $pro_img_id = $option['product_img'];
    $image = wp_get_attachment_image_src( $pro_img_id , 'full' );
    $html .='<div class="banner-shipping-sec">
        <div class="banner-shipping-ltsec">
            <img src="'.esc_url($image[0]).'" alt="'.esc_attr('Product').'">
        </div>
        <div class="banner-shipping-rtsec">
            
        </div>
    </div>';
    return $html;

}add_shortcode('banner_sec', 'custom_section');