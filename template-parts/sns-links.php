<?php
/**
 * SNS リンク共通パーツ
 * Usage: get_template_part('template-parts/sns-links', null, ['location' => 'header|mobile|footer|section']);
 */

$location = $args['location'] ?? 'header';
$ig   = get_theme_mod('bh_sns_instagram', '');
$tt   = get_theme_mod('bh_sns_tiktok', '');
$yt   = get_theme_mod('bh_sns_youtube', '');
$line = get_theme_mod('bh_sns_line', '') ?: get_theme_mod('bh_line_url', '#');

if (!$ig && !$tt && !$yt && !$line) return;

// SVG icons
$svg_ig   = '<svg width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>';
$svg_tt   = '<svg width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.15 15a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.72a8.27 8.27 0 0 0 4.76 1.5V6.77a4.83 4.83 0 0 1-1-.08z"/></svg>';
$svg_yt   = '<svg width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>';
$svg_line = '<svg width="%s" height="%s" viewBox="0 0 24 24" fill="currentColor"><path d="M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>';
?>

<?php if ($location === 'header') : ?>
  <!-- Header SNS (PC right side) -->
  <div class="header-sns">
    <?php if ($ig) : ?><a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><?php printf($svg_ig, '16', '16'); ?></a><?php endif; ?>
    <?php if ($tt) : ?><a href="<?php echo esc_url($tt); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><?php printf($svg_tt, '16', '16'); ?></a><?php endif; ?>
    <?php if ($yt) : ?><a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><?php printf($svg_yt, '16', '16'); ?></a><?php endif; ?>
  </div>

<?php elseif ($location === 'mobile') : ?>
  <!-- Mobile Menu SNS -->
  <div class="mobile-menu__sns">
    <?php if ($ig) : ?><a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><?php printf($svg_ig, '22', '22'); ?></a><?php endif; ?>
    <?php if ($tt) : ?><a href="<?php echo esc_url($tt); ?>" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><?php printf($svg_tt, '22', '22'); ?></a><?php endif; ?>
    <?php if ($yt) : ?><a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><?php printf($svg_yt, '22', '22'); ?></a><?php endif; ?>
    <?php if ($line) : ?><a href="<?php echo esc_url($line); ?>" target="_blank" rel="noopener noreferrer" aria-label="LINE"><?php printf($svg_line, '22', '22'); ?></a><?php endif; ?>
  </div>

<?php elseif ($location === 'section') : ?>
  <!-- SNS Section (トップページ用) -->
  <section class="section section--white sns-section" id="sns">
    <div class="container">
      <div class="section-title js-fade-up">
        <span class="section-title__en">Follow Us</span>
        <span class="section-title__ja">公式SNS</span>
      </div>
      <p class="section-subtitle js-fade-up">最新の物件情報やお役立ち情報を発信しています</p>

      <div class="sns-section__grid js-fade-up">
        <?php if ($ig) : ?>
          <a href="<?php echo esc_url($ig); ?>" class="sns-section__card sns-section__card--ig" target="_blank" rel="noopener noreferrer">
            <div class="sns-section__icon"><?php printf($svg_ig, '32', '32'); ?></div>
            <div class="sns-section__info">
              <span class="sns-section__name">Instagram</span>
              <span class="sns-section__desc">お部屋の写真を毎日更新中</span>
            </div>
          </a>
        <?php endif; ?>
        <?php if ($tt) : ?>
          <a href="<?php echo esc_url($tt); ?>" class="sns-section__card sns-section__card--tt" target="_blank" rel="noopener noreferrer">
            <div class="sns-section__icon"><?php printf($svg_tt, '32', '32'); ?></div>
            <div class="sns-section__info">
              <span class="sns-section__name">TikTok</span>
              <span class="sns-section__desc">物件紹介動画を配信中</span>
            </div>
          </a>
        <?php endif; ?>
        <?php if ($yt) : ?>
          <a href="<?php echo esc_url($yt); ?>" class="sns-section__card sns-section__card--yt" target="_blank" rel="noopener noreferrer">
            <div class="sns-section__icon"><?php printf($svg_yt, '32', '32'); ?></div>
            <div class="sns-section__info">
              <span class="sns-section__name">YouTube</span>
              <span class="sns-section__desc">ルームツアー動画を公開中</span>
            </div>
          </a>
        <?php endif; ?>
        <?php if ($line) : ?>
          <a href="<?php echo esc_url($line); ?>" class="sns-section__card sns-section__card--line" target="_blank" rel="noopener noreferrer">
            <div class="sns-section__icon"><?php printf($svg_line, '32', '32'); ?></div>
            <div class="sns-section__info">
              <span class="sns-section__name">公式LINE</span>
              <span class="sns-section__desc">お気軽にご相談ください</span>
            </div>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php else : ?>
  <!-- Footer SNS -->
  <div class="footer-sns">
    <?php if ($ig) : ?><a href="<?php echo esc_url($ig); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer"><?php printf($svg_ig, '16', '16'); ?> Instagram</a><?php endif; ?>
    <?php if ($tt) : ?><a href="<?php echo esc_url($tt); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer"><?php printf($svg_tt, '16', '16'); ?> TikTok</a><?php endif; ?>
    <?php if ($yt) : ?><a href="<?php echo esc_url($yt); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer"><?php printf($svg_yt, '16', '16'); ?> YouTube</a><?php endif; ?>
    <?php if ($line) : ?><a href="<?php echo esc_url($line); ?>" class="footer-sns__btn" target="_blank" rel="noopener noreferrer"><?php printf($svg_line, '16', '16'); ?> 公式LINE</a><?php endif; ?>
  </div>
<?php endif; ?>
