<?php
/**
 * The searchform.php template. 
 * Used any time that get_search_form() is called.
 */
$unique_id = wp_unique_id( 'search-form-' );

$aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo $aria_label;?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
 <div class="input-group">
  <input id="<?php echo esc_attr( $unique_id ); ?>" type="search" class="form-control" value="<?php echo get_search_query(); ?>" name="s" placeholder="Search" />
  <div class="input-group-append">
    <button class="btn btn-secondary" type="submit" id="button-addon2"><?php echo esc_attr_x( 'Search', 'submit button'); ?></button>
  </div>
</div>
</form>