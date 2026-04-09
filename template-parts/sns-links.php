<?php
/**
 * SNS リンク共通パーツ
 * Usage: get_template_part('template-parts/sns-links', null, ['location' => 'header|footer']);
 */

$location = $args['location'] ?? 'header';
$ig  = get_theme_mod('bh_sns_instagram', '');
$tt  = get_theme_mod('bh_sns_tiktok', '');
$yt  = get_theme_mod('bh_sns_youtube', '');
$line = get_theme_mod('bh_sns_line', '') ?: get_theme_mod('bh_line_url', '#');

if (!$ig && !$tt && !$yt && !$line) return;
?>

<?php if ($location === 'header') : ?>
  <div class="header-sns">
    <?php if ($ig) : ?>
      <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
      </a>
    <?php endif; ?>
    <?php if ($tt) : ?>
      <a href="<?php echo esc_url($tt); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.15 15a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.72a8.27 8.27 0 0 0 4.76 1.5V6.77a4.83 4.83 0 0 1-1-.08z"/></svg>
      </a>
    <?php endif; ?>
    <?php if ($line) : ?>
      <a href="<?php echo esc_url($line); ?>" target="_blank" rel="noopener noreferrer" aria-label="LINE">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
      </a>
    <?php endif; ?>
  </div>

<?php else : ?>
  <div class="footer-sns">
    <?php if ($ig) : ?>
      <a href="<?php echo esc_url($ig); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        Instagram
      </a>
    <?php endif; ?>
    <?php if ($tt) : ?>
      <a href="<?php echo esc_url($tt); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.15 15a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.72a8.27 8.27 0 0 0 4.76 1.5V6.77a4.83 4.83 0 0 1-1-.08z"/></svg>
        TikTok
      </a>
    <?php endif; ?>
    <?php if ($line) : ?>
      <a href="<?php echo esc_url($line); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
        公式LINE
      </a>
    <?php endif; ?>
  </div>
<?php endif; ?>
