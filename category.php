<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenue
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

		<div class="breadcrumbs clear">
			<h1>
				<?php single_cat_title(''); ?>
			</h1>	
		</div><!-- .breadcrumbs -->
			<?php if (function_exists('z_taxonomy_image')) z_taxonomy_image(); ?>
			<div class="category-description">
				<?php echo category_description( $category_id ); ?> 
			</div>
<!-- .breadcrumbs -->
			


		<!--<div id="recent-content" class="content-list">-->
			<div id="recent-content" class="content-search">

			<?php

			if ( have_posts() ) :	
											
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'search');

				endwhile;

				else :

				get_template_part( 'template-parts/content', 'none' );

			endif; 

			?>

		</div><!-- #recent-content -->

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
