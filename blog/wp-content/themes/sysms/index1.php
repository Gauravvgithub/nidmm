<?php get_header(); ?>
<div class="container pt-5">
  <div class="row">
    <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'template-parts/content/content-home' );
      } ?>
  </div>
</div>
<div class="pb-5 text-center"><?php $additional_loop = 0; global $additional_loop; pagination( $additional_loop[ 'max_num_pages' ] ); ?></div>
<?php
} else {
  get_template_part( 'template-parts/content/content-none' );
} ?>
<?php get_footer(); ?>