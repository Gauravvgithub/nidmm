<div class="col-lg-3"> 
<!-- <div class="card card-body mt-5 mb-3 bg-light"><?php //get_search_form(); ?></div>-->
 <?php if(is_single() ){ ?> 
	<?php if(get_post_meta($post->ID, "_new_mbox_banner-link",true)) { ?>
 <div class="text-center my-4">
  <a href="<?php echo get_post_meta($post->ID, "_new_mbox_banner-link",true); ?>" target="_blank"><img src="<?php echo get_post_meta($post->ID, "_new_mbox_banner-image",true); ?>" class="img-fluid" width="360" height="600" alt="<?php echo get_post_meta($post->ID, "_new_mbox_banner-alt",true); ?>"></a>
 </div>
 <?php }?>
<?php if(get_post_meta($post->ID, "_new_mbox_toc_details",true)) { ?>
 <div class="my-4 sticky-top mt-5" style="top:50px; bottom:50px">
 <?php echo get_post_meta($post->ID, "_new_mbox_toc_details",true); ?>
 </div>
 <?php } ?>
<!-- <aside class="card card-body widget imggback my-4 bg-light">
      <div class="author-bio">
          <div class="d-flex align-items-top py-2">
            <div class="flex-shrink-0 text-center">
                <p><img src="<?php //the_author_meta( 'soundcloud' ); ?>" alt="" height="100" width="100" class="rounded-circle"></p>
                <p><a href="<?php //the_author_meta( 'linkedin' ); ?>" target="_blank"><svg width="25" height="25"><use xlink:href="#icon-linkedin" fill="#000"></use></svg></a></p>
            </div>
            <div class="flex-grow-1 ms-2">
               <p class="h4 author-title"><?php //printf( esc_html__( '%s'), get_the_author() ); ?>
              </p>
              <p class="author-description">
                  <?php //the_author_meta( 'description' ); ?>
              </p>
              <?php //printf( '<a class="author-link" href="%1$s" rel="author">%2$s</a>', 
              //esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), sprintf( esc_html__( 'View all of %s\'s posts.'), get_the_author() ) ); ?>
          </div>
      </div>
  </div>
</aside> -->
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
 <div id="first" class="my-4">
  <?php if ( is_active_sidebar( 'sidebar-1' ) && (get_post_type()=="post")) : ?>
  <div id="widget-area" class="card card-body" role="complementary"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
  <?php endif; ?>
 </div>
 <?php endif; ?>
 
 <div id="second" class="my-4">
 <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
 <div id="widget-area" class="card card-body" role="complementary"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
 <?php endif; ?>
 </div>
 <?php } ?>
</div>