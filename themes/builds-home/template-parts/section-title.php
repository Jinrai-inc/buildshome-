<?php
/**
 * セクションタイトル共通パーツ
 *
 * Usage: get_template_part('template-parts/section-title', null, ['en' => 'Property', 'ja' => '物件一覧']);
 */

$en = $args['en'] ?? '';
$ja = $args['ja'] ?? '';
?>

<div class="section-title js-fade-up">
  <?php if ($en) : ?>
    <span class="section-title__en"><?php echo esc_html($en); ?></span>
  <?php endif; ?>
  <span class="section-title__ja"><?php echo esc_html($ja); ?></span>
</div>
