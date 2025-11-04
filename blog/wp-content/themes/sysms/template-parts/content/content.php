<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="container">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="h1">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h3 class="h1"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php endif; ?>
				
	</header>
	<div class="p-5 bg-light mb-4">
  <?php the_title( sprintf( '<h3 class="h1"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
  <?php the_post_thumbnail('small-thumbnail'); ?>
		<?php the_excerpt();
		?>
	</div>
 
</article><!-- #content -->