<?php
/**
 * 物件詳細ページ 動画セクション（TikTok / YouTube）
 */

$tiktok_url  = get_post_meta(get_the_ID(), 'property_tiktok_url', true);
$youtube_url = get_post_meta(get_the_ID(), 'property_youtube_url', true);
$video_title = get_post_meta(get_the_ID(), 'property_video_title', true) ?: '物件紹介動画';

if (!$tiktok_url && !$youtube_url) return;
?>

<div class="property-video">
  <h2 class="property-detail__section-title">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;"><polygon points="5 3 19 12 5 21 5 3"/></svg>
    <?php echo esc_html($video_title); ?>
  </h2>

  <div class="property-video__grid">
    <?php if ($tiktok_url) :
        $tiktok_id = builds_home_extract_tiktok_id($tiktok_url);
        if ($tiktok_id) :
    ?>
      <div class="property-video__item">
        <div class="property-video__label">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1v-3.5a6.37 6.37 0 0 0-.79-.05A6.34 6.34 0 0 0 3.15 15a6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.72a8.27 8.27 0 0 0 4.76 1.5V6.77a4.83 4.83 0 0 1-1-.08z"/></svg>
          TikTok
        </div>
        <div class="property-video__embed">
          <blockquote class="tiktok-embed" cite="<?php echo esc_url($tiktok_url); ?>" data-video-id="<?php echo esc_attr($tiktok_id); ?>" style="max-width:605px;min-width:325px;">
            <section><a target="_blank" href="<?php echo esc_url($tiktok_url); ?>">TikTokで見る</a></section>
          </blockquote>
        </div>
      </div>
    <?php endif; endif; ?>

    <?php if ($youtube_url) :
        $yt_id = builds_home_extract_youtube_id($youtube_url);
        if ($yt_id) :
    ?>
      <div class="property-video__item">
        <div class="property-video__label">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="red"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
          YouTube
        </div>
        <div class="property-video__embed property-video__embed--16x9">
          <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($yt_id); ?>" title="<?php echo esc_attr($video_title); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
        </div>
      </div>
    <?php endif; endif; ?>
  </div>
</div>
