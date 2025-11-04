<?php// if ( (bool) get_the_author_meta( 'description' ) && post_type_supports( get_post_type(), 'author' ) ) : ?>
	<div class="author-bio <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">
  
  <div class="media">
   <?php echo get_avatar( get_the_author_meta( 'ID' ), '85' ); ?>
   <div class="author-bio-content media-body ml-3">
			<h4 class="author-title"><?php printf( esc_html__( 'By %s'), get_the_author() ); ?></h4>
			<p class="author-description"> <?php the_author_meta( 'description' ); ?></p>
			<?php printf( '<a class="author-link" href="%1$s" rel="author">%2$s</a>', 
    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), sprintf( esc_html__( 'View all of %s\'s posts.'), get_the_author() ) ); ?>
		</div><!-- .author-bio-content -->
  </div>
  
	</div><!-- .author-bio -->
<?php //endif; ?>
