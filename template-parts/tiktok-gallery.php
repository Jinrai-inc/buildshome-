<?php
/**
 * TikTok ギャラリーセクション
 */

$tiktok_videos = [];
for ($t = 1; $t <= 6; $t++) {
    $url   = get_theme_mod("bh_tiktok_url_{$t}", '');
    $thumb = get_theme_mod("bh_tiktok_thumb_{$t}", '');
    $title = get_theme_mod("bh_tiktok_title_{$t}", '');
    if ($url && $thumb) {
        $tiktok_videos[] = ['url' => $url, 'thumb' => $thumb, 'title' => $title];
    }
}

if (empty($tiktok_videos)) return;

$tiktok_account = get_theme_mod('bh_sns_tiktok', '');
?>

<section class="section section--white" id="tiktok">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">TikTok</span>
      <span class="section-title__ja">動画でお部屋チェック</span>
    </div>
    <p class="section-subtitle js-fade-up">写真では伝わらないお部屋の雰囲気を動画でご紹介</p>

    <div class="tiktok-gallery js-fade-up">
      <?php foreach ($tiktok_videos as $video) : ?>
        <a href="<?php echo esc_url($video['url']); ?>" target="_blank" rel="noopener noreferrer" class="tiktok-gallery__item">
          <div class="tiktok-gallery__thumb">
            <img src="<?php echo esc_url($video['thumb']); ?>" alt="<?php echo esc_attr($video['title']); ?>" loading="lazy" width="270" height="480">
            <div class="tiktok-gallery__play">
              <svg width="36" height="36" viewBox="0 0 24 24" fill="#fff"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            </div>
          </div>
          <?php if ($video['title']) : ?>
            <p class="tiktok-gallery__title"><?php echo esc_html($video['title']); ?></p>
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if ($tiktok_account) : ?>
      <div class="section__more js-fade-up">
        <a href="<?php echo esc_url($tiktok_account); ?>" class="btn btn--ghost-dark btn--sns" target="_blank" rel="noopener noreferrer">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.15 15a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.72a8.27 8.27 0 0 0 4.76 1.5V6.77a4.83 4.83 0 0 1-1-.08z"/></svg>
          TikTok をフォロー
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
