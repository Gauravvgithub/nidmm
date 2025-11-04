<?php get_header(); ?>
<div class="bg-main py-5 mb-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-10 text-center text-lg-left">
        <p class="h2 text-white"> Archives: 
          <?php
          if ( is_category() ) {
            echo single_cat_title();

          } elseif ( is_tag() ) {
            single_tag_title();

          } elseif ( is_day() ) {
            echo get_the_date( 'F jS, Y' );

          } elseif ( is_month() ) {
            echo get_the_date( 'F Y' );

          } elseif ( is_year() ) {
            echo get_the_date( 'Y' );

          } else echo '';
          ?>
        </p>
      </div>
    </div>
  </div>
</div>
<section class="container py-5">
  <div class="row">
    <div class="col-lg-8 mb-5">
      <?php while ( have_posts() ) :	the_post(); get_template_part( 'template-parts/content/content-author' ); endwhile; ?>
      <div class="pt-5">
        <?php $additional_loop = 0; global $additional_loop; pagination($additional_loop['max_num_pages']); ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</section>
<!--#archive-->

<?php get_footer(); ?>
