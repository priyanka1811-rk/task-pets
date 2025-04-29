<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
function custom_latest_posts_shortcode() {
    $args = array(
        'posts_per_page' => 5, 
        'post_status' => 'publish', 
    );

    $query = new WP_Query($args);

    $output = '<section class="easy-hero easy-hero-gallery">
		<div class="easy-container">
			<div class="easy-gallery-inner">';
    $i = 1;
    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $post_excerpt = get_the_excerpt();
            $post_title = get_the_title();
            $author = get_the_author();
            $date = get_the_date();
            $comments = get_comments_number();
            $output .= '<div class="easy-gallery-inner-sec easy-gallery-inner-sec'.$i.'">';
                $output .= '<div class="easy-gallery-inner-img"><a href="'.esc_url(get_permalink()).'"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($post_title) . '" style="width: 100%; margin-bottom: 10px;">
                </a></div>
                <div class="easy-gallery-sec-content">
                    <div class="blogs-updates">
                        <ul><li><i class="fa fas fa-user"></i>'.esc_html($author).'</li>
                        <li><i class="fa fas fa-calendar"></i>'.esc_html($date).'</li>
                        <li><i class="fa fas fa-comment"></i>'.esc_html($comments.' Comments').'</li>
                        </ul>
                    </div>
                    <div class="blog-details">
                        <h3>'.esc_html($post_title ).'</h3>
                        <p>'.esc_html($post_excerpt).'</p>
                        <a href="'.esc_url(get_permalink()).'">'.esc_html('Read More').'</a>
                    </div>
                </div>';	
            $output .= '</div>';
            $i++;
        }

        
    } else {
        $output .= '<p>No posts found.</p>';
    }
    wp_reset_postdata();

			$output .= '</div>
		</div>
	</section>
	
	';

    return $output;
}

add_shortcode('custom_latest_posts', 'custom_latest_posts_shortcode');
