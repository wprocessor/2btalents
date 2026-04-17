<?php
/**
 * Plugin Name: Выводит страницу 2talents
 */

// код плагина

function to_talents_page_template_include_filter($template) {

  global $post;

  if (is_page()) {
    switch (get_post_meta($post->ID, 'page_slug', true)) {
      case '2talents': {
        $tpl = locate_template(['to-talents-page-template.php']);
        if (!empty($tpl)) {
          $template = $tpl;
        }
        break;
      }
    }
  }

  return $template;
}

add_filter('template_include', 'to_talents_page_template_include_filter');