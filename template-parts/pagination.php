<?php

	global $wp_version;

	if ( $wp_version >= 4.1 ) :

		the_posts_pagination( array( 'prev_text' => __( 'Indietro', 'revenue' ), 'next_text' => __( 'Avanti', 'revenue' ) ) );
	
	endif;

?>