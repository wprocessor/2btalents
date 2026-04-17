<?php
/**
 * Plugin Name: Выводит основателей на станице о нас
 */

// код плагина

function about_page_template_include_filter($template) {

  global $post;

  if (is_page()) {
    switch (get_post_meta($post->ID, 'page_slug', true)) {
      case 'about': {
        $tpl = locate_template(['about-page-template.php']);
        if (!empty($tpl)) {
          $template = $tpl;
        }
        break;
      }
    }
  }

  return $template;
}

add_filter('template_include', 'about_page_template_include_filter');

function about_page_person_data_get_callback($data)
{
  $allowed = [
    'content-larisa',
    'content-sergey',
  ];

  if (!in_array($data, $allowed) || empty($tpl = locate_template(['about-page-person-template.php']))) {
    return '';
  }

  $category = get_category_by_slug('developers');

  if (!$category) {
    return '';
  }

  $posts = get_posts([
    'category' => $category->term_id,
    'post_status' => 'publish',
    'meta_key' => 'css_class',
    'meta_value' => $data,
    'numberposts' => 1,
  ]);

  return array_reduce($posts, function ($acc, $postItemData) use ($tpl) {
    ob_start();

    require $tpl;

    return $acc .= ob_get_clean();

  }, '');
}

add_filter('about_page_person_data_get', 'about_page_person_data_get_callback');

function about_page_person_data_details_get_callback($data)
{
  $allowed = [
    'content-larisa',
    'content-sergey',
  ];

  if (!in_array($data, $allowed) || empty($tpl = locate_template(['about-page-person-details-template.php']))) {
    return '';
  }

  $category = get_category_by_slug('developers');

  if (!$category) {
    return '';
  }

  $posts = get_posts([
    'category' => $category->term_id,
    'post_status' => 'publish',
    'meta_key' => 'css_class',
    'meta_value' => $data,
    'numberposts' => 1,
  ]);

  return array_reduce($posts, function ($acc, $postItemData) use ($tpl) {
    ob_start();

    require $tpl;

    return $acc .= ob_get_clean();

  }, '');
}

add_filter('about_page_person_data_details_get', 'about_page_person_data_details_get_callback');