<?php get_header(); ?>
<br>
<br>
<br>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PCFG65"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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

   
<script defer src="https://static.cloudflareinsights.com/beacon.min.js"></script>