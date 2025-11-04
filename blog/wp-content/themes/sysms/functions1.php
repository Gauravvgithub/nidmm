<?php

function add_resources() {

 wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );

 wp_enqueue_style( 'style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );

 wp_enqueue_script( 'basic', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), wp_get_theme()->get( 'Version' ), true );

 wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'basic' ), wp_get_theme()->get( 'Version' ), true );

 wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'basic' ), wp_get_theme()->get( 'Version' ), true );

//wp_enqueue_script( 'lazy', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array( 'basic' ), wp_get_theme()->get( 'Version' ), true );

//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
 
}
add_action( 'wp_enqueue_scripts', 'add_resources' , 1999 );


function theme_setup() {

 add_theme_support( 'title-tag' );

 add_theme_support( 'post-thumbnails' );
 
 add_image_size( 'small-thumbnail', 400, 225, array( 'left', 'top' ) );

 register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'new' ), 'footer' => __( 'Secondary Menu', 'new' ), ) );

 
 $defaults = array(

  'default-color' => 'ffffff',

  'default-image' => '',

  'wp-head-callback' => '_custom_background_cb',

  'admin-head-callback' => '',

  'admin-preview-callback' => ''

 );

 //add_theme_support( 'custom-background', $defaults );


}
add_action( 'after_setup_theme', 'theme_setup' );

function remove_style_script() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
  }

add_action('after_setup_theme','remove_style_script');



function ev_unregister_taxonomy(){
    register_taxonomy('post_tag', array());
}
add_action('init', 'ev_unregister_taxonomy');


function remove_menus(){
    remove_menu_page('edit-tags.php?taxonomy=post_tag'); // Post tags
}

add_action( 'admin_menu', 'remove_menus' );

function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

/*--------------------------------------------------------------------------------- */
/* Disable the emoji's
----------------------------------------------------------------------------------- */

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    
    // Remove from TinyMCE
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/*--------------------------------------------------------------------------------- */
/* Excerpt
----------------------------------------------------------------------------------- */

function new_excerpt_length( $length ) {

 return 30;

}
add_filter( 'excerpt_length', 'new_excerpt_length', 999 );


function new_excerpt_more( $more ) {
 
 //    return ' <a href="'.get_the_permalink().'" rel="nofollow">Read More...</a>';

 return ' ';

}
add_filter( 'excerpt_more', 'new_excerpt_more' );


function new_content_width() {

 $GLOBALS[ 'content_width' ] = apply_filters( 'new_content_width', 1400 );

}

add_action( 'after_setup_theme', 'new_content_width', 0 );



/*--------------------------------------------------------------------------------- */
/* Disables Gutenberg
----------------------------------------------------------------------------------- */

if ( 'disable_gutenberg' ) {
  add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

  // Move the Privacy Policy help notice back under the title field.
  add_action( 'admin_init', function () {
    remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
  } );
}

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );



/*--------------------------------------------------------------------------------- */
/* Read Time
----------------------------------------------------------------------------------- */

function reading_time() {
 $content = get_post_field( 'post_content', $post->ID );
 $word_count = str_word_count( strip_tags( $content ) );
 $readingtime = ceil( $word_count / 200 );

 if ( $readingtime == 1 ) {
  $timer = " Minute Reading";
 } else {
  $timer = " Minutes Reading";
 }
 $totalreadingtime = $readingtime . $timer;

 return $totalreadingtime;
}




/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
/*----------------------------------------------------------------------------------- */

function breadcrumbs() {

 $delimiter = '&raquo;';

 $home = 'Blog'; // text for the 'Home' link

 $before = '<span property="itemListElement" typeof="ListItem"><span property="name">'; // tag before the current crumb

 $after = '</span><meta property="position" content="4"></span>'.edit_post_link(); // tag after the current crumb

 echo '<div vocab="http://schema.org/" typeof="BreadcrumbList"><span class="icon-home"></span><span  property="itemListElement" typeof="ListItem"><a href="https://systoolsms.com/"  property="item" typeof="WebPage"><span property="name">Home</span></a> <meta property="position" content="1"></span> ' . $delimiter . ' ';

 global $post;

 $homeLink = home_url();

 if ( is_home() ) {

  echo '<span  property="itemListElement" typeof="ListItem"> <a href="' . $homeLink . '/"  property="item" typeof="WebPage"><span property="name">' . $home . '</span></a> <meta property="position" content="2"></span>';

 } else {

  echo '<span  property="itemListElement" typeof="ListItem"> <a href="' . $homeLink . '/"  property="item" typeof="WebPage"><span property="name">' . $home . '</span></a> <meta property="position" content="2"></span>' . $delimiter . ' ';

 }


 if ( is_category() ) {

  global $wp_query;

  $cat_obj = $wp_query->get_queried_object();

  $thisCat = $cat_obj->term_id;

  $thisCat = get_category( $thisCat );

  $parentCat = get_category( $thisCat->parent );

  if ( $thisCat->parent != 0 )

   echo( get_category_parents( $parentCat, TRUE, ' ' . $delimiter . ' ' ) );

  echo $before . 'Archive by category "' . single_cat_title( '', false ) . '"</span><meta property="position" content="3"></span>';

 } elseif ( is_single() && !is_attachment() ) {

  if ( get_post_type() != 'post' ) {

   $post_type = get_post_type_object( get_post_type() );

   $slug = $post_type->rewrite;

   echo '<span  property="itemListElement" typeof="ListItem"><a href="' . $homeLink . '/' . $slug[ 'slug' ] . '/" property="item" typeof="WebPage"><span property="name">' . $post_type->labels->singular_name . '</span></a> <meta property="position" content="3"></span>' . $delimiter . ' ';

   echo $before . get_the_title() . $after;

  } else {

   $cat = get_the_category();

   $catt = $cat[ 0 ]->name;

   $cat_link = $cat[ 0 ]->term_id;

   //$cat = $cat->slug;            

   echo '<span  property="itemListElement" typeof="ListItem"><a href="' . get_category_link( $cat_link ) . '" property="item" typeof="WebPage"><span property="name">' . $catt . '</span></a> <meta property="position" content="3"></span>' . $delimiter . ' ';

   //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

   echo $before . get_the_title() . $after;

  }

 } elseif ( is_attachment() ) {

  $parent = get_post( $post->post_parent );

  echo '<span  property="itemListElement" typeof="ListItem"><a href="' . get_permalink( $parent ) . '" property="item" typeof="WebPage">' . $parent->post_title . '</a> </span>' . $delimiter . ' ';

  echo $before . get_the_title() . $after;

 } elseif ( is_page() && !$post->post_parent ) {

  echo $before . get_the_title() . $after;

 } elseif ( is_page() && $post->post_parent ) {

  $parent_id = $post->post_parent;

  $breadcrumbs = array();

  while ( $parent_id ) {

   $page = get_page( $parent_id );

   $breadcrumbs[] = '<span  property="itemListElement" typeof="ListItem"><a href="' . get_permalink( $page->ID ) . '" property="item" typeof="WebPage">' . get_the_title( $page->ID ) . '</a> </span>';

   $parent_id = $page->post_parent;

  }

  $breadcrumbs = array_reverse( $breadcrumbs );

  foreach ( $breadcrumbs as $crumb )

   echo $crumb . ' ' . $delimiter . ' ';

  echo $before . get_the_title() . $after;

 } elseif ( is_search() ) {

  echo $before . 'Search results for "' . get_search_query() . '"' . $after;

 } elseif ( is_tag() ) {

  echo $before . 'Posts tagged "' . single_tag_title( '', false ) . '"' . $after;

 } elseif ( is_author() ) {

  global $author;

  $userdata = get_userdata( $author );

  echo $before . 'Articles posted by ' . $userdata->display_name . $after;

 } elseif ( is_404() ) {

  echo $before . 'Error 404' . $after;

 }

 if ( get_query_var( 'paged' ) ) {

  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )

   echo ' (';

  echo $delimiter . ' Page' . ' ' . get_query_var( 'paged' );

  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )

   echo ')';

 }

 echo '</div> ';

}

/*--------------------------------------------------------------------------------- */
/* Pagination
----------------------------------------------------------------------------------- */


function pagination( $pages = '', $range = 3 ) {

 $showitems = ( $range * 3 ) + 1;

 global $paged;

 if ( empty( $paged ) )$paged = 1;

 if ( $pages == '' ) {

  global $wp_query;

  $pages = $wp_query->max_num_pages;

  if ( !$pages ) {

   $pages = 1;

  }
 }


 if ( 1 != $pages ) {

  echo "<div class='text-center'><ul class='pagination justify-content-center'>";

  if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages )

   echo "<li class='page-item'><a href='" . get_pagenum_link( 1 ) . "' class='page-link'  >&laquo; First</a></li>";

  if ( $paged > 1 && $showitems < $pages )

   echo "<li class='page-item'><a href='" . get_pagenum_link( $paged - 1 ) . "' class='page-link'  >&lsaquo; Previous</a></li>";

  for ( $i = 1; $i <= $pages; $i++ ) {

   if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {

    echo( $paged == $i ) ? "<li class='page-item active'><a  href='" . get_pagenum_link( $i ) . "' class='page-link'>" . $i . "</a></li>": "<li class='page-item'><a  href='" . get_pagenum_link( $i ) . "' class='page-link'>" . $i . "</a></li>";

   }
   
  }


  if ( $paged < $pages && $showitems < $pages )

   echo "<li class='page-item'><a  href='" . get_pagenum_link( $paged + 1 ) . "' class='page-link'>Next &rsaquo;</a></li>";

  if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages )

   echo "<li class='page-item'><a  class='page-link' href='" . get_pagenum_link( $pages ) . "'>Last &raquo;</a></li>";

  echo "</ul></div>";

 }

}



/*--------------------------------------------------------------------------------- */
/* Comments
----------------------------------------------------------------------------------- */

function order_change_comment_form_fields( $fields ) {

 $comment_field = $fields[ 'comment' ];

 unset( $fields[ 'comment' ] );

 $fields[ 'comment' ] = $comment_field;

 return $fields;

}

add_filter( 'comment_form_fields', 'order_change_comment_form_fields', 10, 1 );


function remove_comment_fields( $fields ) {

 unset( $fields[ 'url' ] );

 unset( $fields[ 'cookies' ] );

 return $fields;

}

add_filter( 'comment_form_default_fields', 'remove_comment_fields' );




/*--------------------------------------------------------------------------------- */
/* Relates Posts
----------------------------------------------------------------------------------- */

function related_post() {

 $orig_post = $post;
 global $post;
 $categories = get_the_category( $post->ID );

 if ( $categories ) {
  $category_ids = array();
  foreach ( $categories as $individual_category )$category_ids[] = $individual_category->term_id;

  $args = array(
   'category__in' => $category_ids,
   'post__not_in' => array( $post->ID ),
   'posts_per_page' => 4,
   'ignore_sticky_posts' => 1
  );

  $my_query = new wp_query( $args );  
    
  if ( $my_query->have_posts() ) {
   echo '<div class="p-3 p-lg-5 bg-white mb-5"><p class="h4 pb-4">Related Posts</p><div id="related_posts"><div class="row">';
   while ( $my_query->have_posts() ) { $my_query->the_post(); ?>
<div class="col-xl-6"><div class="row mb-4"><div class="col-lg-4"><a href="<?php echo esc_url( get_permalink()); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('small-thumbnail',  ['class' => 'img-fluid']); } else { ?><img class="img-fluid img-thumbnail" loading="lazy" src="<?php bloginfo('template_directory'); ?>/assets/img/default.png" alt="default" width="400" height="229" loading="lazy" class="img-fluid"><?php } ?></a></div><div class="col-lg-8 align-self-center"><?php the_title( sprintf( '<p class="fw-bold py-3 py-lg-0"><a href="%s">', esc_url( get_permalink() ) ), '</a></p>' ); ?></div></div></div><?php } echo '</div></div></div>';
} }
 $post = $orig_post;
 wp_reset_query();
}

/*--------------------------------------------------------------------------------- */
/* Author's Other Posts
----------------------------------------------------------------------------------- */

function get_related_author_posts() {

 global $authordata, $post;

 $authors_posts = get_posts( array( 'author' => $authordata->ID, 'posts_per_page' => 5 ) );

 $output = '<div class="list-check">';

 foreach ( $authors_posts as $authors_post ) {

  //  $output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';

  $output .= '<div class="media border p-2 mb-2"><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a>

  </div>';

 }

 $output .= '</div>';

 return $output;

}



function get_related_author_posts_bottom() {

 global $authordata, $post;

 $authors_posts = get_posts( array( 'author' => $authordata->ID, 'posts_per_page' => 6 ) );

 /*'<div class="media border p-3">

  <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">

  <div class="media-body"><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a>

  </div></div>'; */

 foreach ( $authors_posts as $authors_post ) {

  $output .= '<li><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></li>';

 }

 // <div class="row"><div class="col-lg-3"><a href="'.esc_url( get_permalink()).'">  if ( has_post_thumbnail() ) { the_post_thumbnail('small-thumbnail',  ['class' => 'img-fluid img-thumbnail']); } </a></div>'<div class="col-lg-9"><p><?php the_title( sprintf( '<p class="h5"><a href="%s">', esc_url( get_permalink() ) ), '</a></p>' ); </p></div></div>';

 return $output;

}


/*--------------------------------------------------------------------------------- */
/* block
----------------------------------------------------------------------------------- */

function first_instance_of_block( $block_name, $content = null, $instances = 1 ) {

 $instances_count = 0;

 $blocks_content = '';

 if ( !$content ) {

  $content = get_the_content();

 }



 // Parse blocks in the content.

 $blocks = parse_blocks( $content );



 // Loop blocks.

 foreach ( $blocks as $block ) {



  // Sanity check.

  if ( !isset( $block[ 'blockName' ] ) ) {

   continue;

  }



  // Check if this the block matches the $block_name.

  $is_matching_block = false;



  // If the block ends with *, try to match the first portion.

  if ( '*' === $block_name[ -1 ] ) {

   $is_matching_block = 0 === strpos( $block[ 'blockName' ], rtrim( $block_name, '*' ) );

  } else {

   $is_matching_block = $block_name === $block[ 'blockName' ];

  }



  if ( $is_matching_block ) {

   // Increment count.

   $instances_count++;



   // Add the block HTML.

   $blocks_content .= render_block( $block );



   // Break the loop if the $instances count was reached.

   if ( $instances_count >= $instances ) {

    break;

   }

  }

 }



 if ( $blocks_content ) {

  echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput

  return true;

 }



 return false;

}



require get_template_directory() . '/inc/widgets.php';

require get_template_directory() . '/inc/block-styles.php';





?>