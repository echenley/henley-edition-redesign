<?php get_header(); ?>
<?php get_sidebar(); ?>
  
<section id="content">

  <header class="post-header" <?php echo post_thumb_style($post->ID); ?> >
    <div class="post-title"><h2>
      <?php echo $post->post_title ? the_title(false) : "Untitled"; // Default title: "Untitled" ?>
    </h2></div>
  </header>
    
  <article id="page">
    <?php while(have_posts()): the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </article>
  
</section>

<?php get_footer(); ?>