<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <?php $post_format = get_post_format();
 if ( 'aside' === $post_format || 'status' === $post_format || 'image' === $post_format || 'video' === $post_format || 'quote' === $post_format ) { ?>

 <div class="container mb-5 cex">
  <div class="row justify-content-center">
   <div class="col-lg-8 bg-light">
    <div class="p-5">
     <?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
    </div>
   </div>
  </div>
 </div>
 <?php } else { ?>
 <div class="container mb-5 cex bg-light">  
  <div class="row">
   <div class="col-lg-4">
    <div><a href="<?php echo esc_url( get_permalink());?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('small-thumbnail',  ['class' => 'img-fluid']); } else { } ?></a></div>
   <p><?php the_title( sprintf( '<h3><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?></p>
    <div class="p-2 bg-light"> ~ 
      <?php  $u_date = get_the_time('U'); $u_modified_date = get_the_modified_time('U'); if ($u_modified_date > $u_date) { echo "Modified: "; the_modified_date('F jS, Y'); } else { echo "Published: "; the_date('F jS, Y'); } ?> ~ <?php  $categories = get_the_category(); $separater	= ", "; $output		= ''; 
  if($categories) {
			foreach($categories as $category) {
				$output .= '<span class="icon-tag"></span><a href='.get_category_link($category->term_id). ' rel="nofollow">'. $category->cat_name .'</a>'. $separater ;
				}
				echo trim($output, $separater);
			}
	?>
    </div>
    <p>By: <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="nofollow"><?php the_author(); ?></a></p>
   </div>   
  </div>
 </div>

 <?php } ?>

</article> <!--#content-excerpt-->