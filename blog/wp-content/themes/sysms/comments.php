<?php

if ( post_password_required() ) {
  return;
}

$comment_count = get_comments_number();
?>
<div class="p-3 p-lg-5 bg-white mb-5">
  <div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">
    <?php if ( have_comments() ) : ; ?>
    <p class="comments-title h4">
      <?php if ( '1' === $comment_count ) : ?>
      <?php esc_html_e( '1 Comment' ); ?>
      <?php else : ?>
      <?php
      printf( esc_html( _nx( '%s Comment', '%s comments', $comment_count, 'Comments title' ) ), esc_html( number_format_i18n( $comment_count ) ) );
      ?>
      <?php endif; ?>
    </p>
    <!-- .comments-title -->
    
    <ol class="comment-list">
      <?php wp_list_comments( array( 'avatar_size' => 60, 'style' => 'ul', 'short_ping'  => true, ) ); ?>
    </ol>
    <!-- .comment-list -->
    
    <?php if ( ! comments_open() ) : ?>
    <p class="no-comments">
      <?php esc_html_e( 'Comments are closed.' ); ?>
    </p>
    <?php endif; ?>
    <?php endif; ?>
    <?php
    comment_form( array(
      'logged_in_as' => null,
      'title_reply' => esc_html__( 'Leave a comment' ),	
      'title_reply_before' => '<p id="reply-title" class="comment-reply-title">',
      'title_reply_after' => '</p>', ) );
    ?>
  </div>
</div>
