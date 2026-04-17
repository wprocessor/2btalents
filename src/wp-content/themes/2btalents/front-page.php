<?php get_header(); ?>

<?php global $post; ?>

<div class="content">
  <div class="content-spacing"></div>
  <?php echo apply_filters('page_front_actors', 'actors'); ?>
  <?php echo apply_filters('page_front_actors', 'directors'); ?>
</div>
<?php get_footer(); ?>
    
