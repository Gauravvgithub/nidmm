<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 mb-5">
      <div class="d-flex pt-5">
        <div class="p-2 flex-grow-1 text-center">
          <p><img src="https://nidmm.in/default.png" alt="nidmm logo" height="100" width="100" class="rounded-circle"></p>
          <p><a href="<?php the_author_meta( 'linkedin' ); ?>" target="_blank"><svg width="25" height="25"><use xlink:href="#icon-linkedin" fill="#000"></use></svg></a></p>
        </div>
        <div class="p-2 flex-shrink-1">
          <p class="h2 pb-3"><?php printf( esc_html__( '%s'), get_the_author() ); ?></p>
          <p class="mb-5"><?php the_author_meta( 'description' ); ?></p>
        </div>
      </div>      
      <div class="p-3 bg-darkslategray mb-5 h5 text-white fw-bold">Show Post in</div>
      <?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content/content-author' ); endwhile; ?>
      <?php $additional_loop = 0; global $additional_loop; pagination($additional_loop['max_num_pages']); ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>