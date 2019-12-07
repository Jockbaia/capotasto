<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package capotasto
 */
get_header(); ?>

<div id="primary" class="content-area clear author">

  <main id="main" class="author-main clear">


    <div class="author_header">

      <div class="nickUserbox"><i class="fas fa-music"></i><?php
		  global $current_user;
global $wp_query;
$author =  $wp_query->get_queried_object();
$author_slug = $author->ID; 
$user_post_count = count_user_posts( $author_slug , 'post' );
echo ' ';
echo $user_post_count;
?> brani inseriti</div>

      <div class="printUserbox"><i class="fas fa-star"></i> WIP</div>

    </div>
    <div class="author_info">
      <!-- <h1> 
					<?php
						global $wp_version;

						if ( $wp_version >= 4.1 ) {
							echo get_the_archive_title('');
						} else {
							echo "Archives";
						}
					?>					
				</h1> -->
      <!-- .breadcrumbs -->

      <?php if (function_exists('z_taxonomy_image')) z_taxonomy_image(); ?>

      <!--<div class="category-description">
				<?php if (is_tag()) { ?><?php echo tag_description(); ?><?php } ?>
			</div>-->
      <div class="author-data">
        <div id="avatar" style="text-align:center;">
          <?php global $wp_query;
$curauth = $author;
		  if ($cur)?>
          <img src="<?php echo get_avatar_url($curauth); ?>" class="attachment-full size-full" alt=""
            srcset="<?php echo get_avatar_url($curauth); ?> 1000w, <?php echo get_avatar_url($curauth); ?> 300w, <?php echo get_avatar_url($curauth); ?> 768w"
            sizes="(max-width: 100px) 100vw, 100px" width="100" height="100">
        </div>
        <div id="data">
          <div class="author_nickname"><?php echo $curauth->display_name;?></div>
          <div class="author_bio"><?php $str = get_the_author_meta( 'userbio' ); echo $str?></div>
        </div>
      </div>

      <div class="tab">
        <button id="chordButton" class="tablinks author_chords" onclick="openTab(event, 'chords')"> <i
            class="fas fa-book"></i> Ultimi accordi inseriti</button>
        <button id="rewardButton" class="tablinks author_chords" onclick="openTab(event, 'rewards')"><i
            class="fas fa-guitar"></i> Sull'autore</button>
      </div>
      <div id="chords" class="tabcontent">
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
          <?php get_template_part( 'template-parts/pagination', '' ); ?>

        </div><!-- #recent-content -->
      </div>

      <div id="rewards" class="tabcontent">
        <div class="trofei_banner">
          Lavori in corso. Torna tra qualche giorno!
        </div>
      </div>
    </div>
  </main><!-- .site-main -->


</div><!-- #primary -->
<script>
  document.getElementById('chords').style.display = "block";
  document.getElementById('chordButton').className += " active";

  function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>

<script>
  function hexToLuma(colour) {
    const hex = colour.replace(/#/, '');
    const r = parseInt(hex.substr(0, 2), 16);
    const g = parseInt(hex.substr(2, 2), 16);
    const b = parseInt(hex.substr(4, 2), 16);

    return [
      0.299 * r,
      0.587 * g,
      0.114 * b
    ].reduce((a, b) => a + b) / 255;
  };
  var author = document.querySelectorAll("div.author-data")[0];
  var nick = document.querySelectorAll("div.author_nickname")[0];
  var bio = document.querySelectorAll("div.author_bio")[0];
  var img = author.children[0].children[0];
  img.crossOrigin = "anonymous"; // This enables CORS
  img.addEventListener('load', function () {
    var vibrant = new Vibrant(img);
    var swatches = vibrant.swatches()
    var color = swatches["Vibrant"].getHex()
    author.style.backgroundColor = color
    if (hexToLuma(color) > 0.7) {
      nick.style.color = "#000000";
      bio.style.color = "#000000";
    } else {
      nick.style.color = "#ffffff";
      bio.style.color = "#ffffff";
    }
  });
</script>


<?php get_sidebar(); ?>
<?php get_footer(); ?>