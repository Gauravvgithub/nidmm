<?php

if (!the_post_thumbnail('small-thumbnail') &&	has_block( 'core/image', get_the_content() ) ) {

	first_instance_of_block( 'core/image', get_the_content() );
}

the_excerpt();
?><!--#excerpt-image-->