<?php

$scriptsVersion = 1.2;

add_action( 'wp_enqueue_scripts', 'twoBtalents_theme_dcripts' );

function twoBtalents_theme_dcripts()
{
$scriptsVersion = 1.2;
  wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css', [], $scriptsVersion);
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', [], $scriptsVersion);
  wp_enqueue_style('logo', get_template_directory_uri() . '/css/logo.css', [], $scriptsVersion);
  wp_enqueue_style('burger', get_template_directory_uri() . '/css/burger.css', [], $scriptsVersion);
  wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css', [], $scriptsVersion);
  wp_enqueue_style('phone', get_template_directory_uri() . '/css/phone.css', [], $scriptsVersion);
  wp_enqueue_style('mail', get_template_directory_uri() . '/css/mail.css', [], $scriptsVersion);
  wp_enqueue_style('video', get_template_directory_uri() . '/css/video.css', [], $scriptsVersion);
  wp_enqueue_style('kinopoisk', get_template_directory_uri() . '/css/kinopoisk.css', [], $scriptsVersion);
  wp_enqueue_style('info', get_template_directory_uri() . '/css/info.css', [], $scriptsVersion);
  wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css', [], $scriptsVersion);
  wp_enqueue_style('footer-menu-item', get_template_directory_uri() . '/css/footer-menu-item.css', [], $scriptsVersion);
  wp_enqueue_style('person-image', get_template_directory_uri() . '/css/person-image.css', [], $scriptsVersion);
  wp_enqueue_style('person', get_template_directory_uri() . '/css/person.css', [], $scriptsVersion);
  wp_enqueue_style('person-title', get_template_directory_uri() . '/css/person-title.css', [], $scriptsVersion);
  wp_enqueue_style('menu-item', get_template_directory_uri() . '/css/menu-item.css', [], $scriptsVersion);

  wp_enqueue_script('script', get_template_directory_uri() . '/js/main.js', [ 'jquery' ], $scriptsVersion, true);
}

register_nav_menus( [
	'top'    => 'Верхнее меню', // Название слота для меню в шаблоне
  'top-icons'    => 'Иконки под Верхнее меню', // Название слота для меню в шаблоне
	'bottom' => 'Нижнее меню'   // Название другого слота меню в шаблоне
] );
