<?php
	/**
	 * ACF Functions
	 *
	 */

	/**
	 * Add options page
	 */
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page([
			'page_title' => __('Site Settings'),
			'menu_title' => __('Site Settings'),
			'menu_slug' => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect' => false,
		]);
	}

	// Register Gutenberg custom block category
	function prometheus_custom_block_category( $categories, $post ) {
		return array_merge($categories, array(
			array(
				'slug' => 'prometheus-custom-blocks',
				'title' => 'Prometheus Custom Blocks',
			),
		));
	}

	add_filter('block_categories', 'prometheus_custom_block_category', 10, 2);

	/**
	 * Register ACF blocks
	 */
	function acf_init_block_types(): void {

		if (function_exists('acf_register_block_type')) {

			/**
			 * Hero block
			 */
			acf_register_block_type(
				array(
					'name'              => 'hero',
					'title'             => __('Hero'),
					'description'       => __('Hero boxes'),
					'render_callback'   => 'render_hero_block',
					'category'          => 'prometheus-custom-blocks',
					'icon'              => 'id-alt',
					'keywords'          => array('hero'),
					'multiple'          => true,
					'mode'              => 'edit',
				)
			);
			acf_register_block_type(
				array(
					'name'              => 'counter',
					'title'             => __('Counter'),
					'description'       => __('Counter blocks'),
					'render_callback'   => 'render_counter_block',
					'category'          => 'prometheus-custom-blocks',
					'icon'              => 'superhero',
					'keywords'          => array('counter'),
					'multiple'          => true,
					'mode'              => 'edit',
				)
			);

		}
	}

	add_action('acf/init', 'acf_init_block_types');

	/**
	 * Hero Block Callback Function.
	 *
	 * @param   array $block The block settings and attributes.
	 * @param   string $content The block inner HTML (empty).
	 * @param   bool $is_preview True during AJAX preview.
	 * @param   (int|string) $post_id The post ID this block is saved to.
	 */
	function render_hero_block ( $block, $content = '', $is_preview = false, $post_id = 0 ): void {

		// Load values and assing defaults.
		$hero_title = get_field('hero_title');
		$hero_text = get_field('hero_text');
		$hero_button_text = get_field('hero_button_text');
		$hero_button_link = get_field('hero_button_link');
		$hero_img = get_field('hero_image')['url'];

		?>
		<div class="hero-block" style="background-image: url(<?php echo $hero_img; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h1 class="h1 hero-block__title"><?php echo $hero_title; ?></h1>
						<div class="hero-block__text"><?php echo $hero_text; ?></div>
						<a class="hero-block__btn btn btn-blue" href="<?php echo $hero_button_link; ?>" target="_blank"><?php echo $hero_button_text; ?></a>
					</div>
				</div>
			</div>
		</div>


		<?php
	}

	function render_counter_block($block, $content = '', $is_preview = false, $post_id = 0) {
		?>
		<div class="counter-block">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="counter-block__items">
							<?php if (have_rows('counter_block')):
								while (have_rows('counter_block')): ?>
									<?php the_row();
									?>
									<div class="counter-block__item">
										<span class="counter-block__number"><?php the_sub_field('number');?></span>
										<span class="counter-block__text"><?php the_sub_field('text');?></span>
									</div>
								<?php
								endwhile;
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	}