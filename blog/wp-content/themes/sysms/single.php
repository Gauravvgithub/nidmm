<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
    <div class="row justify-content-center">
		<?php get_sidebar(); ?>
      <div class="col-lg-9">
        <?php while ( have_posts() ): the_post();
        get_template_part( 'template-parts/content/content-single' );
        //if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
       <?php endwhile; ?>
      </div>
      
    </div>
  </div>
</article>
<?php get_footer(); ?>