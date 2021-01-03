<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package revenue
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- <a href="instagram://user?username=picopod"><img class="adsocial" src="https://i.imgur.com/vtSV5ef.jpg"></a> -->
	<header class="entry-header">

		<?php
		if (is_single()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) : ?>

			<?php get_template_part('template-parts/entry', 'meta'); ?>

		<?php
		endif; ?>

	</header><!-- .entry-header -->



	<div id="chordDescription" class="entry-content">
		<!-- PIERO: Commento PHP immagine -->
		<?php
		/*if ( has_post_thumbnail() && ( get_theme_mod('single-featured-on', true) == true ) ) :
				the_post_thumbnail('single_thumb'); 
			endif;*/
		?>
		<!-- PIERO: Commento PHP immagine -->

		<div id="excerpt">
			<?php the_excerpt(); ?>
		</div>

	</div><!-- .entry-content -->
	<?php
	$video_str = get_field(video_youtube);
	$videoid = substr($video_str, strrpos($video_str, '=') + 1);

	if (!empty($video_str)) {
	?>

		<!-- <iframe id="youtube-player" width="560" height="300" src="https://www.youtube-nocookie.com/embed/<?php echo $videoid ?>?rel=0&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
		<div id="cmd-mobile" class="controls">
			<div class="player-buttons"><img id="backward-button-mobile" onclick="backward()" src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/replay10.svg" alt="replay10"><i id="play-button-mobile" onclick="play()" class="fa fa-play"></i>
				<i id="pause-button-mobile" onclick="pause()" class="fa fa-pause"></i><img id="forward-button-mobile" onclick="forward()" src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/skip10.svg" alt="replay10">
			</div>
			<div class="slidecontainer">
				<input type="range" value="0" class="player-slider" id="myRange-mobile" oninput="seek(this.value)">
			</div>
			<div class="timing">
				<span id="min-mobile">00</span>:<span id="sec-mobile">00</span>
			</div>
		</div>
		<div class="modal-player">
			<div id="cmd" class="controls">
				<div class="player-buttons"><img id="backward-button" onclick="backward()" src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/replay10.svg" alt="replay10"><i id="play-button" onclick="play()" class="fa fa-play"></i><i id="pause-button" onclick="pause()" class="fa fa-pause"></i><img id="forward-button" onclick="forward()" src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/skip10.svg" alt="replay10"></div>
				<div class="slidercontainer">
					<input type="range" value="0" class="player-slider" id="myRange" oninput="seek(this.value)">
				</div>
				<div class="timing">
					<span id="min">00</span>:<span id="sec">00</span>
				</div>
			</div>
			<div id="player"><?php echo $videoid ?></div>
		</div>

	<?php
	}
	?>

	<div class="hideIfNot100">
		<div class="yarpp_related_posts">
			<?php related_posts(); ?>
		</div>
	</div>

	<div class="content-banner">
		<?php the_ad_group(954); ?>
	</div>

	<div class="resizer2">

		<!-- <div class="nickUserbox"><a href="<?php echo get_site_url(); ?>/author/<?php echo get_the_author_meta('nickname'); ?>"><i class="fas fa-user"></i> <?php the_author(); ?></a></div> -->
		<div class="nickUserbox"><i class="fas fa-microphone"></i> <?php
																	$category = get_the_category();
																	echo '<a href="' . get_category_link($category[0]->cat_ID) . '"> ' . $category[0]->cat_name . '</a>';
																	?></div>

		<div class="printUserbox"><i class="fas fa-print"></i> <a href="#" onclick="window.print()">Stampa</a>
		</div>


	</div>

	<div class="resizer">
		<?php if (!empty($video_str)) { ?>
		<?php } ?>
		<?php if (function_exists('fontResizer_place')) {
			fontResizer_place();
		} ?>
		<?php if (!empty($video_str)) { ?>
			<script>
				let checked = 0

				function handleClick(cb) {
					var pl = document.querySelector("div[class=modal-player]");
					var controls = document.querySelector("div[id=cmd]");
					var controlsMobile = document.querySelector("div[id=cmd-mobile]");
					if (!checked) {
						controlsMobile.style.bottom = '0px';
						pl.style.right = "10px";
						checked = 1
					} else {
						controlsMobile.style.bottom = '-500px';
						pl.style.right = "-300px";
						checked = 0
					}
				}
			</script>
			<a id="switch" onclick="handleClick(this);" style="font-family: Scada;
    background-color: #b33b3b;
    color: white;
    padding: 0px;
    border-radius: 4px;
    cursor: pointer;
    position: relative;
    float: left;
    display: inline-block;
    margin-right: 5px;
    margin-top: -4px;"><img data-skip-lazy style="
	height: 72px;
	width: 95px;
    margin-bottom: -29px;
    margin-top: -21px;
    margin-left: -2px;" src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/youtube.svg"></a>

		<?php } ?>
		<div id="autoscrollMack" class="autoscrollMack">
			<a id="scroll_minus" onclick="scrollDec();" style="font-size: 18px;
														  font-family: Scada;
														  background-color: rgb(16, 105, 182);
														  color: rgb(255, 255, 255);
														  padding: 5px 5px 3px 8px;
														  padding-right: 9px;
														  border-radius: 4px;
														  cursor: pointer;"><i class="fas fa-angle-up"></i></a>
			<a id="scroll_plus" onclick="scrollInc();" style="font-size: 18px;
														  font-family: Scada;
														  background-color: rgb(16, 105, 182);
														  color: rgb(255, 255, 255);
														  padding: 5px 5px 3px 8px;
														  padding-right: 9px;
														  border-radius: 4px;
														  cursor: pointer;"><i class="fas fa-angle-down"></i></a>

			<a id="scroll_reset" onclick="scrollReset();" style="font-size: 18px;
														  font-family: Scada;
														  background-color: rgb(16, 105, 182);
														  color: rgb(255, 255, 255);
														  padding: 5px 5px 3px 8px;
														  padding-right: 9px;
														  border-radius: 4px;
														  cursor: pointer;"><i class="far fa-hand-paper"></i></a>


		</div>

		<a id="scroll_minus" onclick="transposeDown();" style="font-size: 18px;
														  font-family: Scada;
														  background-color: #38873e;
														  color: rgb(255, 255, 255);
														  padding: 5px 5px 3px 8px;
														  padding-right: 9px;
														  border-radius: 4px;
														  cursor: pointer;
														  margin-left: 5px;"><i class="fas fa-plus"></i></i></a>
		<a id="scroll_plus" onclick="transposeUp();" style="font-size: 18px;
														  font-family: Scada;
														  background-color: #38873e;
														  color: rgb(255, 255, 255);
														  padding: 5px 5px 3px 8px;
														  padding-right: 9px;
														  border-radius: 4px;
														  cursor: pointer;"><i class="fas fa-minus"></i></a>
		<a id="scroll_plus" onclick="convToggle();" style="font-size: 18px;
    font-family: Scada;
    background-color: #9d3cbd;
    color: rgb(255, 255, 255);
    padding: 5px 5px 3px 8px;
    padding-right: 9px;
    margin-left: 3px;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 3px;"><i class="fas fa-globe-europe"></i></i></a>

	</div>

	<div class="watermark"><i style="color:#6f6f6f" class="fas fa-link"></i> picopod.it/<?php the_ID(); ?></div>


	<div id="accordi" class="accordi">
		<?php
		the_content(sprintf(
			/* translators: %s: Name of current post. */
			wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'revenue'), array('span' => array('class' => array()))),
			the_title('<span class="screen-reader-text">"', '"</span>', false)
		));
		?>
	</div>

	<?php the_ad_group(1011); ?>
	<?php the_ad_group(1013); ?>

	<div class="yarpp_related_posts">
		<?php related_posts(); ?>
	</div>

	<script src="https://www.picopod.it/script/backToTop.js"></script>

	<script src="https://www.picopod.it/script/autoscrollMack.js"></script>
	<!-- <script src="https://www.picopod.it/wp-content/themes/capotasto/dropChord/dropChordStyle.js"></script> -->
</article><!-- #post-## -->