<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="content content-about-default">
  <div class="content-spacing about"></div>
  <?php echo apply_filters('about_page_person_data_details_get', 'content-larisa'); ?>
  <?php echo apply_filters('about_page_person_data_details_get', 'content-sergey'); ?>

  <div class="person-list-items person-list-items--about">
    <?php echo apply_filters('about_page_person_data_get', 'content-larisa'); ?>
    <?php echo apply_filters('about_page_person_data_get', 'content-sergey'); ?>
  </div>
  <div class="about-description-both">
    <?php echo $post->post_content; ?>
  </div>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>