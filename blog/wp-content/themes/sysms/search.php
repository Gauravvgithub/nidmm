<?php get_header(); ?>
<div class="bg-parallx py-5 mb-5">
 <div class="container py-5">
  <div class="row justify-content-center">
   <div class="col-lg-6">
    <p class="h2 text-center">Search Your Query Here</p>
    <p class="text-center"><?php get_search_form(); ?></p>
   </div>
  </div>
 </div>
</div>
<section class="container pb-5">
 <div class="row justify-content-center">
  <div class="col-lg-8">
   <?php while ( have_posts() ) :	the_post(); get_template_part( 'template-parts/content/content-author' ); endwhile; ?>   
   <?php  $additional_loop = 0; global $additional_loop; pagination($additional_loop['max_num_pages']); ?>
  </div>  
   <?php //get_sidebar(); ?>
</div>
</section>
<?php get_footer(); ?>