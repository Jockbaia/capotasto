<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package revenue
 */

get_header(); 

if ( function_exists( 'revenue_set_post_views' ) ) :
	revenue_set_post_views(get_the_ID());
endif;
?>
	<!-- <div id="autoscrollMack" class="autoscrollMack">
		<img id="scroll_plus" onclick="scrollInc();" src="http://icons.iconarchive.com/icons/hopstarter/button/24/Button-Previous-icon.png">
		<img id="scroll_reset" onclick="scrollReset();" src="http://icons.iconarchive.com/icons/hopstarter/button/24/Button-Previous-icon.png">
		<img id="scroll_minus" onclick="scrollDec();" src="http://icons.iconarchive.com/icons/hopstarter/button/24/Button-Previous-icon.png"/>
	</div> -->
	<div id="primary" class="content-area">

		<main id="main" class="site-main" >

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'articolo' );

			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
