<?php
/*
 *  Comment layout borrowed from Bones Theme (http://themble.com/bones/)
 */

  if ( ! empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
    <div class="alert alert-help">
      <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'counterpoint' ); ?></p>
    </div>
  <?php
    return;
  }
  
if ( have_comments() ) : ?>
  <h3 id="comments"><?php comments_number( __( '<span>No</span> Responses', 'counterpoint' ), __( '<span>One</span> Response', 'counterpoint' ), _n( '<span>%</span> Response', '<span>%</span> Responses', get_comments_number(), 'counterpoint' ) );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
  
  <ol class="commentlist">
    <?php wp_list_comments( array('type' => 'all', 'callback' => 'counterpoint_comments') ); ?>
  </ol>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
  <section id="respond" class="respond-form">
    <h3 id="comment-form-title"><?php comment_form_title( __( 'Leave a Reply', 'counterpoint' ), __( 'Leave a Reply to %s', 'counterpoint' )); ?></h3>
  
    <div id="cancel-comment-reply">
      <p class="small"><?php cancel_comment_reply_link(); ?></p>
    </div>
  
  <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <div class="alert alert-help">
      <p><?php printf( __( 'You must be %1$slogged in%2$s to post a comment.', 'counterpoint' ), '<a href="<?php echo wp_login_url( get_permalink() ); ?>">', '</a>' ); ?></p>
    </div>
  <?php else : ?>
  
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    
      <?php if ( is_user_logged_in() ) : ?>
  
        <p class="comments-logged-in-as"><?php _e( 'Logged in as', 'counterpoint' ); ?> <a href="<?php echo get_option( 'siteurl' ); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( 'Log out of this account', 'counterpoint' ); ?>"><?php _e( 'Log out', 'counterpoint' ); ?> <?php _e( '&rarr;', 'counterpoint' ); ?></a></p>
  
      <?php else : ?>
  
        <ul id="comment-form-elements">
  
          <li>
            <label for="author"><?php _e( 'Name', 'counterpoint' ); ?> <?php if ($req) _e( '(required)'); ?></label>
            <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e( 'Your Name*', 'counterpoint' ); ?>" <?php if ($req) echo "aria-required='true'"; ?> />
          </li>
      
          <li>
            <label for="email"><?php _e( 'Mail', 'counterpoint' ); ?> <?php if ($req) _e( '(required)'); ?></label>
            <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e( 'Your E-Mail*', 'counterpoint' ); ?>" <?php if ($req) echo "aria-required='true'"; ?> />
            <small><?php _e("(will not be published)", 'counterpoint' ); ?></small>
          </li>
      
          <li>
            <label for="url"><?php _e( 'Website', 'counterpoint' ); ?></label>
            <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e( 'Got a website?', 'counterpoint' ); ?>" />
          </li>
      
        </ul>
  
      <?php endif; ?>
    
      <p><textarea name="comment" id="comment" placeholder="<?php _e( 'Your Comment here...', 'counterpoint' ); ?>"></textarea></p>
    
      <p>
        <input name="submit" type="submit" id="submit" class="button" value="<?php _e( 'Submit &rarr;', 'counterpoint' ); ?>" />
        <?php comment_id_fields(); ?>
      </p>
      
      <?php do_action( 'comment_form', $post->ID ); ?>
    </form>
  <?php endif; // If registration required and not logged in ?>
  </section>

<?php endif; ?>