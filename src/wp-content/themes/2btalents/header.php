<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version.
 */
_deprecated_file(
	/* translators: %s: Template name. */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0.0',
	null,
	/* translators: %s: Template name. */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <link rel="icon" href="./favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo wp_get_document_title(); ?></title>
    <!--<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />-->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<?php if ( file_exists( get_stylesheet_directory() . '/images/kubrickbgwide.jpg' ) ) { ?>
<style type="text/css" media="screen">

	<?php
	// Checks to see whether it needs a sidebar.
	if ( empty( $withcomments ) && ! is_single() ) {
		?>
	#page { background: url("<?php bloginfo( 'stylesheet_directory' ); ?>/images/kubrickbg-<?php bloginfo( 'text_direction' ); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar. ?>
	#page { background: url("<?php bloginfo( 'stylesheet_directory' ); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>
<?php } ?>

<?php
if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}
?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="zoom-content zoom-hide"></div>
<div class="zoom-stop zoom-hide"></div>
<div id="page" class="page-content">

<div id="header" class="header" role="banner">
  <header>
    <div class="logo-wrapper">
      <a class="logo-link" href="/"><div class="logo"></div></a>
    </div>
    <div class="burger burger-position burger-menu-button" data-parent="page-content" data-css-class="main-menu-expanded"></div>
  </header>
<!--	<div id="headerimg">
		<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="description"><?php bloginfo( 'description' ); ?></div>
	</div>
-->
</div>
<div class="content content-main-menu111" style="display: none;">
  <div class="menu-items noselect">
    <div class="menu-item">
      <a href="/">Главная</a>
    </div>
    <div class="menu-item">
      <a href="/about.html">О нас</a>
    </div>
    <div class="menu-item">
      <a href="/2talents.html">Талантам</a>
    </div>
  </div>
  <div class="menu-icons">
      <div class="footer-menu-contacts">
        <a href="tel:+79164606622"><div class="phone"></div></a>
        <a href="mailto:t@2talents.ru"><div class="mail"></div></a>
      </div>
  </div>
</div>

<div class="content content-main-menu">
<?php
wp_nav_menu([
    'theme_location' => 'top', // Replace 'primary' with your registered menu location
    'container'      => '',    // Optional: HTML tag for the container wrapping the menu
    'container_class'=> 'content content-main-menu', // Optional: CSS class for the container
    'menu_class'     => 'menu-items noselect', // Optional: CSS class for the ul element
    'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
    'depth'          => 2,        // Optional: Number of levels to display (0 for all)
    'fallback_cb'    => false,    // Optional: Prevents fallback to wp_page_menu() if menu not found
]);
?>
<div class="menu-icons">
<?php
wp_nav_menu([
    'theme_location' => 'top-icons', // Replace 'primary' with your registered menu location
    'container'      => '',    // Optional: HTML tag for the container wrapping the menu
    'container_class'=> 'content content-main-menu', // Optional: CSS class for the container
    'menu_class'     => 'footer-menu-contacts', // Optional: CSS class for the ul element
    'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
    'depth'          => 2,        // Optional: Number of levels to display (0 for all)
    'fallback_cb'    => false,    // Optional: Prevents fallback to wp_page_menu() if menu not found
]);
?>
</div>

</div>