<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package revenue
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" >

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Errore 404 - Pagina non Trovata', 'revenue' ); ?></h1>
				</header><!-- .page-header -->
				
				<img src="https://i.imgur.com/l8WsQM6.jpg">

				<div class="page-content">
					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
