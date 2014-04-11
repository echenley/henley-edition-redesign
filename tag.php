<?php get_header(); ?>
<?php get_sidebar(); ?>

<section id="content">
  <header class="archive-header">
    <h3><?php printf( __( 'Tag Archives: %s', 'counterpoint' ), single_tag_title( '', false ) ); ?></h3>
  </header>
  
  <ul id="archive">
  <?php $even = false;
  while(have_posts()): the_post(); ?>
    <li class="<?php echo $even ? 'even' : 'odd'; if (is_sticky()) { echo ' sticky'; }; ?>">
    
    <?php // Checks for post thumbnail => gets first image => randomizes color //
      $imgSrc = function() { 
        if (has_post_thumbnail()) {
          return 'url(' . wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full')[0] . '); background-position: center; background-size: cover';
        } else {
          $firstImg = catch_that_image();
          if ($firstImg) {
            return 'url(' . $firstImg . '); background-position: center; background-size: cover';
          } else {
            $rand = array('4', '5', '6', '7', '8');
            return '#'.$rand[rand(0,4)].$rand[rand(0,4)].$rand[rand(0,4)].$rand[rand(0,4)].$rand[rand(0,4)].$rand[rand(0,4)];
          };
        };
      };
    ?>
      <a href="<?php the_permalink(); ?>"><div class="thumbnail" style="background: <?php echo $imgSrc(); ?>;"></div></a>
      <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <section class="post-meta">
        <time datetime="<?php echo get_the_date('Y-m-j'); ?>" class="timestamp"><?php the_time( get_option( 'date_format' ) ); ?></time>
      </section>
      <div class="excerpt cf"><?php echo get_the_excerpt(); ?><a class="read-more" href="<?php the_permalink(); ?>"> Keep reading &rarr;</a></div>
    </li>
  <?php $even = !$even;
  endwhile; ?>
  
  </ul>
  <?php if ( function_exists( 'counterpoint_page_nav' ) ) {
    counterpoint_page_nav();
  } else { ?>
    <nav class="wp-prev-next">
        <ul class="clearfix">
          <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'counterpoint' )) ?></li>
          <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'counterpoint' )) ?></li>
        </ul>
      </nav>
  <?php } ?>
</section>

<?php get_footer(); ?>