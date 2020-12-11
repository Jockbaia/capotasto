<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Picopod
 */
get_header();
?>

<!-- FRONTPAGE HEADER -->

<a href="https://www.picopod.it/tag/natale/">
	<div class="mainStage">
		<img src="https://www.picopod.it/wp-content/uploads/2020/12/nat.png">
	</div>
</a>

<!-- CONTENT AREA -->

<div id="primary" class="clear">

	<div class="homeData">Ci sono attualmente <span style="color: #ff6600;"><strong><?php echo do_shortcode('[sbs_cpt_count cpt="post" txt="accordi"]'); ?></strong></span> nel sito
		</br>Ultimo aggiornamento il <span style="color: #75ccff;"><strong><?php echo do_shortcode('[sbs_updated]'); ?></strong></span></div>

	<main id="main" class="site-main clear">
		<div id="recent-content" class="content-list">

			<?php if (have_posts()) : $i = 1;
				while (have_posts()) : the_post();
					get_template_part('template-parts/content', 'list');
				endwhile;
			else :
				get_template_part('template-parts/content', 'none');
			endif; ?>

		</div>
	</main>

	<?php get_template_part('template-parts/pagination', ''); ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>