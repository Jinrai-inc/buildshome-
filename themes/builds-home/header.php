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
      <span class="site-header__logo-icon">B</span>
      <span class="site-header__logo-text">ビルズホーム</span>
    </a>

    <!-- Desktop Navigation -->
    <nav class="site-header__nav" id="main-nav">
      <ul class="site-header__menu">
        <li><a href="<?php echo esc_url(home_url('/property/')); ?>">物件一覧</a></li>
        <li><a href="<?php echo esc_url(home_url('/reason/')); ?>">選ばれる理由</a></li>
        <li><a href="<?php echo esc_url(home_url('/staff/')); ?>">スタッフ</a></li>
        <li><a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a></li>
        <li><a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a></li>
        <li>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--sm site-header__cta">
            お問い合わせ
          </a>
        </li>
      </ul>
    </nav>

    <!-- Mobile Hamburger -->
    <button class="hamburger" id="hamburger" aria-label="メニューを開く" aria-expanded="false">
      <span class="hamburger__line"></span>
      <span class="hamburger__line"></span>
      <span class="hamburger__line"></span>
    </button>
  </div>

  <!-- Mobile Overlay Menu -->
  <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <nav class="mobile-menu__nav">
      <ul class="mobile-menu__list">
        <li><a href="<?php echo esc_url(home_url('/property/')); ?>">物件一覧</a></li>
        <li><a href="<?php echo esc_url(home_url('/reason/')); ?>">選ばれる理由</a></li>
        <li><a href="<?php echo esc_url(home_url('/staff/')); ?>">スタッフ</a></li>
        <li><a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a></li>
        <li><a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary">お問い合わせ</a></li>
      </ul>
    </nav>
  </div>
</header>

<main id="main-content">
