<?php
/**
 * Instagram フィード表示パーツ
 * 方式1: Smash Balloon プラグイン
 * 方式2: Instagram Basic Display API
 * 方式3: カスタマイザー埋め込みコード（フォールバック）
 */

$ig_account_url = get_theme_mod('bh_sns_instagram', '');
$ig_count       = get_theme_mod('bh_instagram_count', 8);
?>

<section class="section section--alt" id="instagram">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Instagram</span>
      <span class="section-title__ja">お部屋紹介</span>
    </div>
    <p class="section-subtitle js-fade-up">最新のお部屋情報を Instagram で発信中</p>

    <div class="ig-feed js-fade-up">
      <?php if (shortcode_exists('instagram-feed')) :
          // 方式1: Smash Balloon プラグイン
          echo do_shortcode('[instagram-feed feed=1]');

      elseif (function_exists('builds_home_get_instagram_posts')) :
          // 方式2: API
          $posts = builds_home_get_instagram_posts($ig_count);
          if ($posts) : ?>
            <div class="ig-feed__grid ig-feed__grid--<?php echo intval($ig_count); ?>">
              <?php foreach ($posts as $post) : ?>
                <a href="<?php echo esc_url($post['permalink']); ?>" target="_blank" rel="noopener noreferrer" class="ig-feed__item">
                  <img src="<?php echo esc_url($post['media_url']); ?>" alt="<?php echo esc_attr(wp_trim_words($post['caption'], 10, '...')); ?>" loading="lazy" width="300" height="300">
                  <div class="ig-feed__overlay">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                  </div>
                </a>
              <?php endforeach; ?>
            </div>
          <?php else : ?>
            <p class="ig-feed__empty">Instagram投稿を取得できませんでした。</p>
          <?php endif;

      else :
          // 方式3: カスタマイザー埋め込みコード
          $ig_embeds = [];
          for ($ig = 1; $ig <= 6; $ig++) {
              $code = get_theme_mod("bh_instagram_embed_{$ig}", '');
              if (trim($code)) $ig_embeds[] = $code;
          }
          if ($ig_embeds) : ?>
            <div class="ig-grid">
              <?php foreach ($ig_embeds as $embed_code) : ?>
                <div class="ig-grid__card">
                  <div class="ig-grid__preview">
                    <div class="ig-grid__embed-wrap">
                      <?php echo $embed_code; ?>
                    </div>
                    <button class="ig-grid__expand" aria-label="投稿を展開">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else : ?>
            <p class="ig-feed__empty">Instagramの設定がまだ完了していません。</p>
          <?php endif;
      endif; ?>
    </div>

    <?php if ($ig_account_url) : ?>
      <div class="section__more js-fade-up">
        <a href="<?php echo esc_url($ig_account_url); ?>" class="btn btn--ghost-dark btn--sns" target="_blank" rel="noopener noreferrer">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          Instagram をフォロー
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
