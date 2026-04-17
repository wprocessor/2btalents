<?php
/**
 * Plugin Name: Выводит список актеров
 */

// код плагина

add_filter( 'single_post_preview', 'wp_single_post_preview');

function wp_single_post_preview(WP_Post $postData = null) {
  ob_start();

  if (file_exists(get_stylesheet_directory() . '/single-post-preview-template.php' ) ) {
      include get_stylesheet_directory() . '/single-post-preview-template.php';
  } else {
      include __DIR__ . '/templates/single-post-preview-template.php';
  }

  return ob_get_clean();
}

add_filter( 'page_front_actors', 'wp_front_page_actors_list');

function wp_front_page_actors_list(string $categoryName = 'actors') {
  $category = [
    'actors' => 'актёры',
    'directors' => 'режиссёры',
  ];

  $categoryLabel = $category[$categoryName];
  $term = get_category_by_slug($categoryName);

  $actorsFrontListData = get_posts([
    'category' => $term->term_id,
    'post_status' => 'publish',
  ]);

  $actorsData = array_map(
    fn($postData) => apply_filters('single_post_preview', $postData),
    $actorsFrontListData,
  );

  ob_start();

  if (file_exists(get_stylesheet_directory() . '/actors-front-list-template.php' ) ) {
      include get_stylesheet_directory() . '/actors-front-list-template.php';
  } else {
      include __DIR__ . '/templates/actors-front-list-template.php';
  }

  return ob_get_clean();

}
