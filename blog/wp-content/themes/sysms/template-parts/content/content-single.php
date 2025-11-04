<div class="py-3 py-lg-5 bg-white mb-5">
  <?php the_title( '<h1 class="h2 pb-3 fw-bold">', '</h1>' ); ?>
  <?php //if ( has_post_thumbnail() ) { the_post_thumbnail( 'post-thumbnails', [ 'class' => 'img-fluid img-thumbnail' ] ); } ?>
  <div class="pb-3" style="line-height: 2rem;"> <span class="icon-user"></span> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="nofollow">
    <?php the_author(); ?></a> ~ <span class="icon-calendar"></span>
    <?php
    $u_date = get_the_time( 'U' );
    $u_modified_date = get_the_modified_time( 'U' );
    if ( $u_modified_date > $u_date ) {
      echo "Modified: ";
      the_modified_date( 'F jS, Y' );
    } else {
      echo "Published: ";
      the_date( 'F jS, Y' );
    }
    echo " ~ ";
    $categories = get_the_category();
    $separater = ", ";
    $output = '';
    if ( $categories ) {
      foreach ( $categories as $category ) {
        $output .= '<span class="icon-tag"></span><a href=' . get_category_link( $category->term_id ) . ' rel="nofollow">' . $category->cat_name . '</a>' . $separater;
      }
      echo trim( $output, $separater );
    } ?> ~ <?php echo reading_time(); ?>
  </div>
  <?php the_content(); ?> 
  <?php if ( is_singular() ) : ?><?php //get_template_part( 'template-parts/post/author-bio' ); ?><?php endif; ?> 
</div>
<?php //related_post(); ?>
<!--content-single-->