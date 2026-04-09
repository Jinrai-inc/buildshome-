<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
  <div class="site-header__inner container">
    <!-- Logo -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-header__logo">
      <?php if (has_custom_logo()) :
          $logo_id  = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_url($logo_id, 'full');
      ?>
        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="site-header__logo-img">
      <?php else : ?>
        <span class="site-header__logo-icon">B</span>
        <span class="site-header__logo-text">ビルズホーム</span>
      <?php endif; ?>
    </a>

    <!-- Desktop Navigation -->
    <nav class="site-header__nav" id="main-nav">
      <?php
      wp_nav_menu([
          'theme_location' => 'primary',
          'container'       => false,
          'menu_class'      => 'site-header__menu',
          'fallback_cb'     => 'builds_home_fallback_menu',
          'depth'           => 1,
      ]);
      ?>
    </nav>

    <!-- Header Right: SNS + Hamburger -->
    <div class="site-header__right">
      <?php get_template_part('template-parts/sns-links', null, ['location' => 'header']); ?>
      <button class="hamburger" id="hamburger" aria-label="メニューを開く" aria-expanded="false">
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
      </button>
    </div>
  </div>

  <!-- Mobile Overlay Menu -->
  <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <nav class="mobile-menu__nav">
      <?php
      wp_nav_menu([
          'theme_location' => 'primary',
          'container'       => false,
          'menu_class'      => 'mobile-menu__list',
          'fallback_cb'     => 'builds_home_fallback_menu_mobile',
          'depth'           => 1,
      ]);
      ?>
      <!-- Mobile SNS Links -->
      <?php get_template_part('template-parts/sns-links', null, ['location' => 'mobile']); ?>
    </nav>
  </div>
</header>

<main id="main-content">
