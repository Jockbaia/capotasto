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



	<div class="entry-content">
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

	<?php the_ad(32946); ?>

	<?php
	$video_str = get_field(video_youtube);
	$videoid = substr($video_str, strrpos($video_str, '=') + 1);

	if (!empty($video_str)) {
		?>

		<!-- <iframe id="youtube-player" width="560" height="300" src="https://www.youtube-nocookie.com/embed/<?php echo $videoid ?>?rel=0&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
		<div id="cmd-mobile" class="controls">
			<div class="player-buttons"><i id="backward-button-mobile" onclick="backward()"><img src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/replay10.svg" alt="replay10"></i><i id="play-button-mobile" onclick="play()" class="fa fa-play"></i>
				<i id="pause-button-mobile" onclick="pause()" class="fa fa-pause"></i><i id="forward-button-mobile" onclick="forward()"><img src="https://www.picopod.it/wp-content/themes/capotasto/assets/svg/skip10.svg" alt="replay10"></i>
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
			<div id="player"></div>
		</div>
		<script>
			// 3. This function creates an <iframe> (and YouTube player)
			//    after the API code downloads.
			var player;

			function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {
					height: '200',
					width: '300',
					playerVars: {
						'controls': 0,
						'modestbranding': 1,
						'autohide': 1,
						'showinfo': 0,
						'playsinline': 1
					},
					videoId: '<?php echo $videoid ?>',
					events: {
						'onReady': onPlayerReady,
						'onStateChange': onPlayerStateChange
					}
				});
				var slider = document.getElementById("myRange");
				var sliderMobile = document.getElementById("myRange-mobile");
				slider.min = 0;
				slider.step = 1;
				sliderMobile.min = 0;
				sliderMobile.step = 1;

			}
			// 4. The API will call this function when the video player is ready.
			function onPlayerReady(event) {
				// event.target.playVideo();
			}

			function play() {
				player.playVideo();
				var slider = document.getElementById("myRange");
				var sliderMobile = document.getElementById("myRange-mobile");
				slider.max = player.getDuration();
				slider.value = player.getCurrentTime();
				sliderMobile.max = player.getDuration();
				sliderMobile.value = player.getCurrentTime();
				setInterval(updateTiming, 1000);
			}

			function updateTiming(seconds = player.getCurrentTime()) {
				let slider = document.getElementById("myRange");
				let min = document.getElementById("min");
				let sec = document.getElementById("sec");

				let sliderMobile = document.getElementById("myRange-mobile");
				let minMobile = document.getElementById("min-mobile");
				let secMobile = document.getElementById("sec-mobile");

				let time = seconds;
				let min_value = Math.floor(player.getCurrentTime() / 60);
				let sec_value = Math.floor(player.getCurrentTime() % 60);
				slider.value = player.getCurrentTime();
				sliderMobile.value = player.getCurrentTime();
				min.innerText = pad(min_value, 2);
				sec.innerText = pad(sec_value, 2);
				minMobile.innerText = pad(min_value, 2);
				secMobile.innerText = pad(sec_value, 2);
			}

			function pad(n, width, z) {
				z = z || '0';
				n = n + '';
				return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
			}

			function pause() {
				player.pauseVideo();
			}

			function seek(seconds) {
				player.seekTo(seconds, true);
				updateTiming(seconds);
			}

			function backward() {
				player.seekTo(player.getCurrentTime() - 10, true);
				updateTiming(player.getCurrentTime() - 10);
			}

			function forward() {
				player.seekTo(player.getCurrentTime() + 10, true);
				updateTiming(player.getCurrentTime() + 10);
			}

			// 5. The API calls this function when the player's state changes.
			//    The function indicates that when playing a video (state=1),
			//    the player should play for six seconds and then stop.

			var done = false;

			function onPlayerStateChange(event) {
				let play = document.getElementById("play-button");
				let pause = document.getElementById("pause-button");
				let playMobile = document.getElementById("play-button-mobile");
				let pauseMobile = document.getElementById("pause-button-mobile");
				if (event.data == YT.PlayerState.PLAYING) {
					play.style.display = 'none';
					pause.style.display = 'inline-block';
					playMobile.style.display = 'none';
					pauseMobile.style.display = 'inline-block';
				} else if (event.data == YT.PlayerState.PAUSED) {
					play.style.display = 'inline-block';
					pause.style.display = 'none';
					playMobile.style.display = 'inline-block';
					pauseMobile.style.display = 'none';
				}
			}

			/*
         function seekVideo() {
             console.log("CYA");
             var l = document.querySelectorAll('span[id^="time_"]');
             var rev = [].slice.call(l, 0).reverse();
             var found = false;
             for (let i = 0; i < rev.length; i++) {
                 if (!found){
                     let ts = parseInt(rev[i].id.split("_")[1]);
                     if (player.getCurrentTime < ts) {
                       found = true;
                       rev[i-1].style.textDecoration = 'underline';
                       rev[i].style.textDecoration = 'none';
                   }
                 } else {
                     rev[i].style.textDecoration = 'none';
                 }
             }

         }*/
		</script>

	<?php
	}
	?>

	<div class="hideIfNot100">
		<div class="yarpp_related_posts">
			<?php related_posts(); ?>
		</div>
	</div>

	<div class="resizer2">

		<div class="nickUserbox"><a href="<?php echo get_site_url(); ?>/author/<?php echo get_the_author_meta('nickname'); ?>"><i class="fas fa-user"></i> <?php the_author(); ?></a></div>

		<div class="printUserbox"><i class="fas fa-print"></i> <a href="#" onclick="ga('send', {hitType: 'event',  eventCategory: 'Interaction', eventAction: 'print', eventLabel: '<?php the_ID(); ?>'});window.print();return false;">Stampa</a>
		</div>


	</div>

	<div class="resizer">
		<?php if (!empty($video_str)) { ?>
			<label class="switch">
				<script>
					function handleClick(cb) {
						var pl = document.querySelector("div[class=modal-player]");
						var controls = document.querySelector("div[id=cmd]");
						var controlsMobile = document.querySelector("div[id=cmd-mobile]");
						if (cb.checked) {
							controlsMobile.style.bottom = '0px';
							pl.style.right = "10px";
							//pl.style.maxWidth = "100%"
							//pl.style.visibility = 'visible';
						} else {
							controlsMobile.style.bottom = '-500px';
							pl.style.right = "-300px";
							//pl.style.maxWidth = "0%"
							//pl.style.visibility = 'hidden';
						}
					}
				</script>
				<input type="checkbox" name="slider" onclick='handleClick(this);'>
				<span class="slider round"></span>
			</label>
		<?php } ?>
		<?php if (function_exists('fontResizer_place')) {
			fontResizer_place();
		} ?>

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
	<div class="yarpp_related_posts">
		<?php related_posts(); ?>
	</div>
	<div class="entry-content">

		<?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'revenue'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->
	<div class="entry-tags">
		<?php if (has_tag()) { ?><span class="tag-links"><?php the_tags(' ', ' '); ?></span><?php } ?>

		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__('Edit %s', 'revenue'),
				the_title('<span class="screen-reader-text">"', '"</span>', false)
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</div><!-- .entry-tags -->

	<script src="https://www.picopod.it/script/backToTop.js?ver=7.0"></script> 
	
	<script src="https://www.picopod.it/script/autoscrollMack.js?ver=1.12"></script>
	<!-- <script src="https://www.picopod.it/wp-content/themes/capotasto/dropChord/dropChordStyle.js"></script> -->
</article><!-- #post-## -->