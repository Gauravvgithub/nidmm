<div class="row">
 <div class="col-lg-3">
  <p><a href="<?php echo esc_url( get_permalink()); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('small-thumbnail',  ['class' => 'img-fluid img-thumbnail']); } else { ?><img class="img-fluid img-thumbnail" src="<?php bloginfo('template_directory'); ?>/assets/img/default.png" alt="default" width="400" height="229" loading="lazy"><?php } ?></a></p></div>
  <div class="col-lg-9 align-self-center">
   <p><?php the_title( sprintf( '<p class="h5"><a href="%s">', esc_url( get_permalink() ) ), '</a></p>' ); ?></p>
   <p><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="nofollow"><?php the_author(); ?></a>  ~ <?php echo get_the_date('F j, Y'); ?> ~
    <?php  $categories = get_the_category(); $separater	= ", "; $output		= ''; 
  if($categories) { foreach($categories as $category) {
				$output .= '<span class="icon-tag"></span><a href='.get_category_link($category->term_id). ' rel="nofollow">'. $category->cat_name .'</a>'. $separater ;
				} echo trim($output, $separater); } ?></p>
  </div>
</div>
<!-- #content-author -->