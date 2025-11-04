<?php
/**
 * Template part for displaying page content in page.php 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_front_page() ) : ?>
	<header class="entry-header alignwide"><?php get_template_part( 'template-parts/header/entry-header' ); ?> <?php twenty_twenty_one_post_thumbnail(); ?></header>
 
	<?php elseif ( has_post_thumbnail() ) : ?><header class="entry-header alignwide"><?php twenty_twenty_one_post_thumbnail(); ?></header><!-- .entry-header -->
 
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content();

		wp_link_pages(	array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page' ) . '">',
				'after'    => '</nav>',
				'pagelink' => esc_html__( 'Page %' ),	) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer default-max-width">
   <?php edit_post_link(sprintf( esc_html__( 'Edit %s' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ), '<span class="edit-link">', '</span>'); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
 
</article><!-- #content-page -->