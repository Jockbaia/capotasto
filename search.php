<?php

/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenue
 *
 */

get_header(); ?>

	<div id="primary" class="content-area clear">
		<main id="main" class="site-main clear">
			<div id="recent-content" class="content-search">
				
			<div class="searchResults">
					<?php printf( esc_html__( 'Risultati di ricerca per %s', 'revenue' ), '"' . get_search_query() . '"' ); ?>				
			</div>
				
			<a href="richiedi"><div class="redirectRequest">
				Non trovi il brano che stai cercando? Clicca qui e fai una richiesta!			
			</div></a>
				
			<?php
			if ( have_posts() ) :	
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'search' );
				endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				?>

			<?php endif; ?>

		</div>
		</main>
		<?php get_template_part( 'template-parts/pagination', '' ); ?>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

