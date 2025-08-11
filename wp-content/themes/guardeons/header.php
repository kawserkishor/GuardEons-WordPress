<?php
/**
 * The header for our theme
 * @package guardeons
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'guardeons'); ?></a>
<header id="site-header" class="site-header header" role="banner">
  <div class="navbar">
    <div class="site-branding logo">
      <?php if (has_custom_logo()) { the_custom_logo(); } ?>
      <div class="site-title-wrap">
        <?php if (is_front_page() && is_home()) : ?>
          <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
        <?php endif; ?>
        <?php $description = get_bloginfo('description', 'display');
        if ($description || is_customize_preview()) : ?>
          <p class="site-description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
      </div>
    </div>

    <button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false">
      <span class="menu-icon" aria-hidden="true"></span>
      <span class="screen-reader-text"><?php esc_html_e('Primary Menu', 'guardeons'); ?></span>
    </button>

    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'guardeons'); ?>">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'menu_id'        => 'primary-menu',
          'menu_class'     => 'nav-menu',
          'container'      => false,
          'fallback_cb'    => 'guardeons_default_menu',
        ]);
      ?>
    </nav>

    <div class="header-cta">
      <?php $phone = get_theme_mod('guardeons_contact_phone'); ?>
      <a class="button button-accent" href="#contact"><?php esc_html_e('Get Started', 'guardeons'); ?></a>
      <?php if ($phone) : ?>
        <a class="header-phone" href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
      <?php endif; ?>
    </div>
  </div>
</header>
<div id="content" class="site-content">
