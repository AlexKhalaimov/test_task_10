<?php
	add_theme_support('menus');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('widgets');
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 350,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	function prometheus_register_my_menus(): void {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' )
			)
		);
	}
	add_action( 'init', 'prometheus_register_my_menus' );

	register_sidebar(array(
		'name'          => __('Footer Widget 1'),
		'id'            => 'footer_1',
		'description'   => __('Appears on posts and pages in the sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 2'),
		'id'            => 'footer_2',
		'description'   => __('Appears on posts and pages in the sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 3'),
		'id'            => 'footer_3',
		'description'   => __('Appears on posts and pages in the sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => __('Footer Widget 4'),
		'id'            => 'footer_4',
		'description'   => __('Appears on posts and pages in the sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));