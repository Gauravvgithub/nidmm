<div class="col-lg-4">
  <p class="text-center"><a href="<?php echo esc_url( get_permalink()); ?>">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('small-thumbnail',  ['class' => 'img-fluid img-thumbnail lazyload']); } else { ?>
    <img class="img-fluid img-thumbnail" src="<?php bloginfo('template_directory'); ?>/assets/img/default.png" alt="default" width="400" height="229" loading="lazy">
    <?php } ?>
    </a></p>
  <div class="py-2">
    <?php
    $categories = get_the_category();
    $separater = ", ";
    $output = '';
    if ( $categories ) {
      foreach ( $categories as $category ) {
        $output .= '<span class="icon-tag"></span><a href=' . get_category_link( $category->term_id ) . ' rel="nofollow">' . $category->cat_name . '</a>' . $separater;
      }
      echo trim( $output, $separater );
    }
    ?>
    ~ <?php echo reading_time(); ?> </div>
  <?php the_title( sprintf( '<p class="h5 fw-bold"><a href="%s">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
  <div class="d-flex align-self-center mt-3 mb-5">
    <div class="flex-shrink-0"><img src="https://nidmm.in/default.png" alt="" height="50" width="50" class="rounded-circle"> </div>
    <div class="flex-grow-1 ms-3">
      <p class="mb-0"><?php echo the_time('F jS, Y'); ?></p>
      <p><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="nofollow">
        <?php the_author(); ?>
        </a></p>
    </div>
  </div>
</div>
