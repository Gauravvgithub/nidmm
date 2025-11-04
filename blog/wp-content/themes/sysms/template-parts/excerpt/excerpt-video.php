<?php
$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {
	first_instance_of_block( 'core/video', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	first_instance_of_block( 'core/embed', $content );
} else {
	first_instance_of_block( 'core-embed/*', $content );
}

the_excerpt();
?>
<!--#excerpt-video-->