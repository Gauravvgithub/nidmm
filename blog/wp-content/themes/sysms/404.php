<?php get_header(); ?>
<div class="bg-parallx py-5">
<div class="container py-5 text-center">
  <h1 class="page-title"><?php esc_html_e( 'Page Not Found' ); ?></h1>  
 <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?'); ?></p>
</div>
</div>

<section class="container text-center py-5">
 <div class="row justify-content-center">
  <div class="col-lg-8">
  			<p><?php //esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?'); ?></p>
   <p><?php get_search_form(); ?></p>
  </div>
 </div>
</section>
<?php get_footer(); ?>