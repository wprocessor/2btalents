<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="content">
  <div class="welcome">
    <div class="welcome--text">
      <div class="heading_v0"><?php echo $post->post_title; ?></div>
      <?php echo $post->post_content; ?>
    </div>
  </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>