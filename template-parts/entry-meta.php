<div class="entry-meta">

	<!--<span class="entry-author"></span> -->
	<!-- <span class="entry-date"><i class="far fa-calendar-alt"></i> <?php //echo get_the_date(); ?></span> -->
	<?php
		if ( is_user_logged_in() ) {
	?>
	<span class="entry-comment"><?php if (function_exists('wpfp_link')) { wpfp_link(); } ?></span>

	<?php } else { ?>
		<span id="socialLoginMobile" class="socialLoginMobile"><span class="entry-comment"><i class="far fa-heart"></i> Salva</span></span> 
		<span id="socialLogin" class="socialLogin"><span class="entry-comment"><i class="far fa-heart"></i> Salva</span></span>
		<?php } ?>
	
	
	<span class="entry-author"><i class="fas fa-microphone"></i> <?php
                $category = get_the_category();
                echo '<a href="'.get_category_link($category[0]->cat_ID).'"> ' . $category[0]->cat_name . '</a>';
            ?></span>
	<!--<a href="<?php //echo get_site_url(); ?>/author/<?php// echo get_the_author_meta('nickname'); ?>"><span class="entry-date"><i class="fas fa-user"></i> <?php// the_author(); ?></span></a>-->

	<span class="entry-date"><i class="fa fa-share-alt"></i><?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?></span><?php //the_ad(24690); ?>

</div><!-- .entry-meta -->