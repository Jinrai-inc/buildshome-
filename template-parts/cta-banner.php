<?php
/**
 * CTA バナー共通パーツ（カスタマイザー対応）
 */

$cta_text = get_theme_mod('bh_cta_text', '物件のご相談・売却査定・その他お気軽にお問い合わせください');
$cta_btn  = get_theme_mod('bh_cta_btn_text', 'お問い合わせはこちら');
$cta_url  = get_theme_mod('bh_cta_btn_url', '') ?: home_url('/contact/');
?>

<section class="cta-banner js-fade-up">
  <div class="container">
    <p class="cta-banner__text"><?php echo esc_html($cta_text); ?></p>
    <a href="<?php echo esc_url($cta_url); ?>" class="btn btn--primary btn--lg"><?php echo esc_html($cta_btn); ?></a>
  </div>
</section>
