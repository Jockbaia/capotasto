<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Capotasto
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<!-- WP HEAD -->

<head>
	<meta name="google-site-verification" content="XNTymqUF-oKifqX7hPf9Nu76OExy2Iazv5S_Wd5Cp54" />
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable='no'">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if (get_theme_mod('favicon', '') != null) { ?>
		<link rel="icon" type="image/png" href="<?php echo esc_url(get_theme_mod('favicon', '')); ?>" />
	<?php } ?>
	<link rel="manifest" href="/manifest.json" />
	<script src="/script/vibrant.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header id="masthead" class="site-header clear">
			<div class="container">
				<div class="site-branding">

					<!-- LOGO -->

					<div id="logo">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<img src="https://www.picopod.it/wp-content/uploads/2020/09/logo.png" alt="" />
						</a>
					</div>

				</div>

				<!-- MENU -->

				<nav id="primary-nav" class="primary-navigation">
					<?php
					if (has_nav_menu('primary')) {
						wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu'));
					} else {
					?>

						<ul id="primary-menu" class="sf-menu">
							<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'revenue'); ?></a></li>
						</ul>

					<?php } ?>

				</nav>

				<div id="slick-mobile-menu"></div>

				<!-- SEARCH -->

				<?php if (get_theme_mod('header-search-on', true)) : ?>

					<span class="search-icon">
						<span class="genericon genericon-search" onclick="document.getElementById('input-search').focus();"></span>
						<span class="genericon genericon-close" onclick="document.getElementById('input-search').blur();"></span>
					</span>

					<div class="header-search">
						<form id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="search" id="input-search" name="s" class="search-input" placeholder="Cerca su Picopod" autocomplete="off" autofocus>
							<button type="submit" class="search-submit"><?php echo __('Vai', 'revenue'); ?></button>
						</form>
					</div>

				<?php endif; ?>

			</div>
		</header>

		<div class="topBanner">
			<?php the_ad_group(955); ?>
		</div>

		<div id="content" class="site-content container clear">