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
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>

		<?php get_template_part( 'template-parts/entry', 'meta' ); ?>

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

		<!-- SWAPPER VIDEO / AD -->

		<script type="text/javascript">
			function SwapDivsWithClick(div1, div2) {
				d1 = document.getElementById(div1);
				d2 = document.getElementById(div2);
				if (d2.style.display == "none") {
					d1.style.display = "none";
					d2.style.display = "block";
				} else {
					d1.style.display = "block";
					d2.style.display = "none";
				}
			}
		</script>

		<div id="swapper-first" style="display:block; border:2px dashed red; padding:25px;">
			<p style="margin:0; color:red;">
				This div displayed when the web page first loaded.
			</p>
		</div>
		<div id="swapper-other" style="display:none; border:2px dotted blue; padding:25px;">
			<p style="margin:0; color:blue;">
				This div displayed when the link was clicked.
			</p>
		</div>

		<p style="text-align:center; font-weight:bold; font-style:italic;">
			<a href="javascript:SwapDivsWithClick('swapper-first','swapper-other')">(Swap Divs)</a>
		</p>



	</div><!-- .entry-content -->

	<?php
			$str = get_field(video_youtube);
			$videoid = substr($str, strrpos($str, '=') + 1);
	
		if (!empty($str)) {
		?>

	<!-- <iframe id="youtube-player" width="560" height="300" src="https://www.youtube-nocookie.com/embed/<?php echo $videoid ?>?rel=0&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
	<div id="player"></div>
	<script>
		// 3. This function creates an <iframe> (and YouTube player)
		//    after the API code downloads.
		var player;

		function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
				height: '300',
				width: '560',
				videoId: '<?php echo $videoid ?>',
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				}
			});
		}

		// 4. The API will call this function when the video player is ready.
		function onPlayerReady(event) {
			// event.target.playVideo();
		}

		// 5. The API calls this function when the player's state changes.
		//    The function indicates that when playing a video (state=1),
		//    the player should play for six seconds and then stop.

		var done = false;

		function onPlayerStateChange(event) {
			if (event.data == YT.PlayerState.PLAYING && !done) {
				done = true;
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

		<div class="nickUserbox"><a
				href="<?php echo get_site_url(); ?>/author/<?php echo get_the_author_meta('nickname'); ?>"><i
					class="fas fa-user"></i> <?php the_author(); ?></a></div>

		<div class="printUserbox"><i class="fas fa-print"></i> <a href="#"
				onclick="ga('send', {hitType: 'event',  eventCategory: 'Interaction', eventAction: 'print', eventLabel: '<?php the_ID(); ?>'});window.print();return false;">Stampa</a>
		</div>


	</div>

	<div class="resizer">
		<?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?>

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

		<div class="watermark"><i style="color:#ffffff" class="fas fa-user"></i> Scritti da <?php the_author(); ?></div>
		<div class="watermark"><i style="color:#ffffff" class="fas fa-heart"></i> Altri accordi su Picopod.it</div>



	</div>


	<div id="accordi" class="accordi">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'revenue' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div>
	<div class="yarpp_related_posts">
		<?php related_posts(); ?>
	</div>
	<div class="entry-content">

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'revenue' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="entry-tags">
		<?php if (has_tag()) { ?><span class="tag-links"><?php the_tags(' ', ' '); ?></span><?php } ?>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'revenue' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</div><!-- .entry-tags -->


</article><!-- #post-## -->