<?php

use WooCommerceCategorySlider\Controllers\SliderElements;

echo SliderElements::switcher(
	array(
		'name'           => 'autoplay',
		'label'          => esc_html__( 'Slider Autoplay', 'woo-category-slider-by-pluginever' ),
		'double_columns' => true,
		'value'          => wc_category_slider_get_meta( esc_attr( $post->ID ), 'autoplay', 'yes' ),
		'desc'           => esc_html__( 'Slider will automatically start playing is set Yes.', 'woo-category-slider-by-pluginever' ),
	)
);

echo SliderElements::switcher(
	array(
		'name'           => 'rtl',
		'label'          => esc_html__( 'Slider RTL', 'woo-category-slider-by-pluginever' ),
		'double_columns' => true,
		'value'          => wc_category_slider_get_meta( esc_attr( $post->ID ), 'rtl', 'yes' ),
		'desc'           => esc_html__( 'Slider direction from Right to left is set Yes.', 'woo-category-slider-by-pluginever' ),
	)
);

echo wc_get_metabox_promo_text();

echo SliderElements::switcher(
	apply_filters(
		'wc_category_slider_lazy_load_args',
		array(
			'name'     => 'lazy_load',
			'label'    => esc_html__( 'Lazy Load', 'woo-category-slider-by-pluginever' ),
			'value'    => wc_category_slider_get_meta( esc_attr( $post->ID ), 'lazy_load', 'off' ),
			'disabled' => 'disabled',
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::input(
	apply_filters(
		'wc_category_slider_cols_args',
		array(
			'name'        => 'cols',
			'type'        => 'number',
			'label'       => esc_html__( 'Number of Column (Desktop)', 'woo-category-slider-by-pluginever' ),
			'disabled'    => 'disabled',
			'placeholder' => '4',
			'desc'        => esc_html__( 'The number of slide for desktop screen.', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::input(
	apply_filters(
		'wc_category_slider_tab_cols_args',
		array(
			'name'        => 'tab_cols',
			'type'        => 'number',
			'label'       => esc_html__( 'Number of Column (Tablet)', 'woo-category-slider-by-pluginever' ),
			'disabled'    => 'disabled',
			'placeholder' => '2',
			'desc'        => esc_html__( 'The number of slide for tablet screen.', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::input(
	apply_filters(
		'wc_category_slider_phone_cols_args',
		array(
			'name'        => 'phone_cols',
			'type'        => 'number',
			'label'       => esc_html__( 'Number of Column (Phone)', 'woo-category-slider-by-pluginever' ),
			'disabled'    => 'disabled',
			'placeholder' => '1',
			'desc'        => esc_html__( 'The number of slide for mobile screen.', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::input(
	apply_filters(
		'wc_category_slider_autoplay_speed_args',
		array(
			'name'        => 'autoplay_speed',
			'label'       => esc_html__( 'AutoPlay Speed', 'woo-category-slider-by-pluginever' ),
			'type'        => 'number',
			'disabled'    => 'disabled',
			'placeholder' => '600',
			'desc'        => esc_html__( 'The slide auto playing time in millisecond.', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::input(
	apply_filters(
		'wc_category_slider_slider_speed_args',
		array(
			'name'        => 'slider_speed',
			'label'       => esc_html__( 'Slider Speed', 'woo-category-slider-by-pluginever' ),
			'type'        => 'number',
			'disabled'    => 'disabled',
			'placeholder' => '3000',
			'desc'        => esc_html__( 'The interval time of the slide change in millisecond.', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::switcher(
	apply_filters(
		'wc_category_slider_loop_args',
		array(
			'name'     => 'loop',
			'label'    => esc_html__( 'Loop', 'woo-category-slider-by-pluginever' ),
			'disabled' => 'disabled',
			'desc'     => esc_html__( 'Switch On/ Off the slider loop', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);

echo SliderElements::input(
	apply_filters(
		'wc_category_slider_column_gap_args',
		array(
			'name'        => 'column_gap',
			'type'        => 'number',
			'label'       => esc_html__( 'Column Gap', 'woo-category-slider-by-pluginever' ),
			'disabled'    => 'disabled',
			'placeholder' => '10',
			'desc'        => esc_html__( 'Space between the slide in pixel unit. Default: 10px', 'woo-category-slider-by-pluginever' ),
		),
		esc_attr( $post->ID )
	)
);
