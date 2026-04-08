<?php
/**
 * CTA バナー共通パーツ（ACF対応）
 */

$page_id = $args['page_id'] ?? null;

$cta_text = '';
$cta_btn  = '';
$cta_url  = '';

if ($page_id && function_exists('get_field')) {
    $cta_text = get_field('cta_banner_text', $page_id);
    $cta_btn  = get_field('cta_button_text', $page_id);
    $cta_url  = get_field('cta_button_url', $page_id);
}

$cta_text = $cta_text ?: '物件のご相談・売却査定・その他お気軽にお問い合わせください';
$cta_btn  = $cta_btn ?: 'お問い合わせはこちら';
$cta_url  = $cta_url ?: home_url('/contact/');
?>

<section class="cta-banner js-fade-up">
  <div class="container">
    <p class="cta-banner__text"><?php echo esc_html($cta_text); ?></p>
    <a href="<?php echo esc_url($cta_url); ?>" class="btn btn--primary btn--lg"><?php echo esc_html($cta_btn); ?></a>
  </div>
</section>
