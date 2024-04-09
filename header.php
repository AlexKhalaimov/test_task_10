<?php
	/**
	 * Site header.
	 */
	$site_name = get_bloginfo('name' );
	$tagline = get_bloginfo('description', 'display' );
	?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Open+Sans:wght@300..800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<header class="header">
		<div class="header__top">
			<a href="<?php  the_field('header_top_link', 'option'); ?>" class="header__top-link">
				<img src="<?php echo get_field('header_top_image', 'option')['url']; ?>" alt="<?php echo get_field('header_top_image', 'option')['name']; ?>" class="header__top-img">
			</a>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 header__inner">
					<?php if( has_custom_logo() ):  ?>
						<div class="header__logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php else: ?>
						<div class="header__logo">
							<a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
								<img
									src="<?php bloginfo('template_directory'); ?>/assets/img/logo.svg"
									alt="logo"
									class="header__logo-img"
								>
							</a>
						</div>
					<?php endif; ?>
					<div class="header__menu">
						<?php
							wp_nav_menu( [
								'theme_location'  => 'header-menu',
								'menu_id'         => 'header-nav-list',
								'menu_class'      => 'header__nav-list header-menu',
								'container'       => 'nav',
								 'container_id'    => 'header-nav',
								 'container_class' => 'header__nav',
							] );
						?>
					</div>
					<div class="header__menu-buttons-wrapper">
						<div id="menu-button">
							<div class="bar1"></div>
							<div class="bar2"></div>
							<div class="bar3"></div>
						</div>
						<button type="button" class="btn desktop-hidden-inline js-header-search-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
							</svg>
						</button>
				</div>
					<div class="header__search-form-wrapper">
						<?php include( 'templates/header-search.php' ); ?>
					</div>
					<a href="#" class="btn btn-orange header__profile-link profile-btn js-profile-btn">
						<span class="mobile-hidden-inline">Особистий кабінет</span>
						<span class="desktop-hidden-inline">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
							  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
							  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
							</svg>
						</span>
					</a>
			</div>
		</div>
	</header>
