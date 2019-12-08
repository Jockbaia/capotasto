<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package revenue
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="google-site-verification" content="XNTymqUF-oKifqX7hPf9Nu76OExy2Iazv5S_Wd5Cp54" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable='no'">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="theme-color" content="#b33b3b">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (get_theme_mod('favicon', '') != null) { ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_mod('favicon', '') ); ?>" />
<?php } ?>
<link rel="manifest" href="/manifest.json" />
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"> 
<script src="/script/vibrant.min.js"></script>
	
<?php wp_head(); ?>
<?php
	$primary_font = 'Roboto';
	$secondary_font = 'Roboto';
	$primary_color = get_theme_mod('primary-color', '#b33b3b');
	$secondary_color = get_theme_mod('secondary-color', '#b33b3b');	
?>
<style type="text/css" media="all">
	body,
	input,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="search"],
	input[type="password"],
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title {
		font-family: "<?php echo $primary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	#secondary-menu li a,
	.footer-nav li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.comment-form label,
	label,
	h1,h2,h3,h4,h5,h6 {
		font-family: "<?php echo $secondary_font; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	a:hover,
	.site-header .search-icon:hover span,
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.current-menu-item a,
	.sf-menu li.current-menu-item a:hover,
	.breadcrumbs .breadcrumbs-nav a:hover,
	.read-more a,
	.read-more a:visited,
	.entry-title a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget ul li a:hover {
		color: <?php echo $primary_color; ?>;
	}
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.entry-category a,
	.pagination .prev:hover,
	.pagination .next:hover,
	#back-top a span {
		background-color: <?php echo $primary_color; ?>;
	}
	.read-more a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-tags .tag-links a:hover:before,
	.content-loop .entry-title a:hover,
	.content-list .entry-title a:hover,
	.content-grid .entry-title a:hover,
	article.hentry .edit-link a:hover,
	.site-footer .widget ul li a:hover,
	.comment-content a:hover {
		color: <?php echo $secondary_color; ?>;
	}	
	#back-top a:hover span,
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.widget_newsletter input[type="submit"],
	.widget_newsletter input[type="button"],
	.widget_newsletter button {
		background-color: #b33b3b;
    	border-radius: 5px;
    	border: 1px solid #883f3f;
	}
	
	.sidebar .widget ul li:before {
		
	}
	
	.slicknav_nav,
	.header-search,
	.sf-menu li a:before {
		border-color: <?php echo $secondary_color; ?>;
	}
</style>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script src="https://www.youtube.com/iframe_api"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8530426309126379",
    enable_page_level_ads: true
  });
</script>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-127875022-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->


</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div class="container">

		<div class="site-branding">

			<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
			
			<div id="logo">
				<span class="helper"></span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php
if ( is_user_logged_in() ) {
?>
					<img src="https://www.picopod.it/wp-content/uploads/2019/07/loggedIn.png" alt=""/>
					<?php } else { ?>
					<img src="https://www.picopod.it/wp-content/uploads/2019/07/loggedOut.png" alt=""/>
						<?php } ?>
				</a>
			</div><!-- #logo -->

			<?php } else { ?>

			<div class="site-title">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-title -->

			<?php } ?>

		</div><!-- .site-branding -->		

		<nav id="primary-nav" class="primary-navigation">			
			<?php 
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
				} else {
			?>

				<ul id="primary-menu" class="sf-menu">
					<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'revenue'); ?></a></li>
				</ul><!-- .sf-menu -->

			<?php } ?>

		</nav><!-- #primary-nav -->

		<div id="slick-mobile-menu"></div>

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
				
			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="Cerca su Picopod" autocomplete="off" autofocus>
					<button type="submit" class="search-submit"><?php echo __('Vai', 'revenue'); ?></button>		
				</form>
			</div><!-- .header-search -->

		<?php endif; ?>						

		</div><!-- .container -->
	</header><!-- #masthead -->	
	
	<div class="topBanner">
		<?php the_ad(24745); ?>
	</div>

<div id="content" class="site-content container clear">
