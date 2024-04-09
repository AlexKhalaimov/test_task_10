<?php
	/**
	 * Actions
	 */

	/**
	 * Enqueue scripts and styles.
	 */

	function theme_styles(): void {
		// Регистрирую стили
		wp_register_style('main_style', get_template_directory_uri() . '/style.css', '', '1.1', 'all');

		// Подключаю стили
		wp_enqueue_style('main_style');

		// Подключаю скрипты
		 wp_enqueue_script('custom_script', get_template_directory_uri() . '/assets/js/scripts.js');

	};
	// Создаем экшн в котором подключаем скрипты подключенные внутри функции theme_styles
	add_action('wp_enqueue_scripts', 'theme_styles');

	// added versioning file styles
	function enqueue_my_styles(): void {
		$theme_directory = get_template_directory();
		$style_version = filemtime("$theme_directory/assets/css/styles.css");

		// Enqueue styles and scripts with automatic versioning
		wp_enqueue_style('site-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), $style_version);
	}
	add_action('wp_enqueue_scripts', 'enqueue_my_styles');

