<?php get_header(); ?>

<!-- FRONTPAGE HEADER -->

<a href="https://www.picopod.it/artista/italiani/sfera-ebbasta/">
	<div class="mainStage">
		<img src="https://www.picopod.it/wp-content/uploads/2020/11/ebbasta.jpg">
	</div>
</a>

<!-- CONTENT AREA -->

<div id="primary" class="clear">

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