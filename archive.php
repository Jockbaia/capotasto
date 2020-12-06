<?php

/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenue
 * 
 */

get_header(); ?>

	<div id="primary" class="content-area clear cx">
		
		<main id="main" class="site-main clear">
			
			<div class="breadcrumbs clear">
				<h1> 
					<?php
						global $wp_version;
						if ( $wp_version >= 4.1 ) {
							echo get_the_archive_title('');
						} else {
							echo "Archives";
						}
					?>					
				</h1>
			</div>
			
			<div class="category-image">
				<?php if (function_exists('z_taxonomy_image')) z_taxonomy_image(); ?>
			</div>
			
			<div class="category-description">
				<?php if (is_tag()) { ?><?php echo tag_description(); ?><?php } ?>
			</div>
			
	
			<div id="recent-content" class="content-search">
				<?php
				if ( have_posts() ) :	
				while ( have_posts() ) : the_post();
					get_template_part('template-parts/content', 'search');
				endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; 
				?>
			</div>

		</main>

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

