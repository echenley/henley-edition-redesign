<?php get_header(); ?>
<?php get_sidebar(); ?>

<section id="content">
  <header class="post-header" <?php echo post_thumb_style($post->ID); ?> >
    <div class="post-title"><h2>
      <?php the_title(); ?>
    </h2></div>
  </header>
  
  <article id="post" <?php post_class(); ?>>
  <?php
    while(have_posts()): the_post(); ?>
      <section class="post-meta">
        <?php counterpoint_categories(); ?>
        <?php counterpoint_posted_on(); ?>
        <?php edit_post_link( __( 'Edit', 'counterpoint' ), '<span class="edit-link">', ' &middot;&nbsp;</span>' ); ?>
      </section>
      <?php
      wp_link_pages();
      the_content();
      wp_link_pages();
    endwhile; ?>
    <div id="article-bottom"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('article-bottom')) : ?><?php endif; ?></div>
    <?php adjacent_post_nav(); ?>
  </article>
  
  <section id="comments-section">
    <?php comments_template(); ?>
  </section>
  
</section>

<?php get_footer(); ?>