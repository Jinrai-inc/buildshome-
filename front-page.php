<?php get_header();

// ── カスタマイザーから値を取得（デフォルト値付き）──
$hero_bg_type   = bh_get('bh_hero_bg_type', 'gradient');
$hero_bg_image  = bh_get('bh_hero_bg_image', '');
$hero_overlay   = bh_get('bh_hero_overlay', 55);
$hero_subtitle  = bh_get('bh_hero_subtitle', 'Builds Home — 川崎・多摩エリアの不動産');
$hero_title     = bh_get('bh_hero_title', "当たり前の豊かさを追求し、\n創造し続ける");
$hero_desc      = bh_get('bh_hero_desc', '不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。');
$hero_cta1_text = bh_get('bh_hero_cta1_text', '物件を探す');
$hero_cta1_url  = bh_get('bh_hero_cta1_url', '') ?: home_url('/property/');
$hero_cta2_text = bh_get('bh_hero_cta2_text', 'ご相談はこちら');
$hero_cta2_url  = bh_get('bh_hero_cta2_url', '') ?: home_url('/contact/');

$show_news     = bh_get('bh_show_news', true);
$show_property = bh_get('bh_show_property', true);
$show_reason   = bh_get('bh_show_reason', true);
$show_loan     = bh_get('bh_show_loan', true);
$show_instagram = bh_get('bh_show_instagram', true);
$show_voice    = bh_get('bh_show_voice', true);
$show_column   = bh_get('bh_show_column', true);
$show_cta      = bh_get('bh_show_cta', true);

// ヒーロー CSS クラス
$hero_class = 'hero';
$hero_style = '';
if ($hero_bg_type === 'image' && $hero_bg_image) {
    $hero_class .= ' hero--image';
    $hero_style = 'background-image: url(' . esc_url($hero_bg_image) . ');';
}
?>

<!-- ========================================
     Hero Section
     ======================================== -->
<section class="<?php echo esc_attr($hero_class); ?>" <?php if ($hero_style) echo 'style="' . esc_attr($hero_style) . '"'; ?>>
  <?php if ($hero_bg_type === 'image' && $hero_bg_image) : ?>
    <div class="hero__overlay" style="opacity: <?php echo esc_attr($hero_overlay / 100); ?>"></div>
  <?php else : ?>
    <div class="hero__bg">
      <div class="hero__circle hero__circle--1"></div>
      <div class="hero__circle hero__circle--2"></div>
      <div class="hero__glow"></div>
    </div>
  <?php endif; ?>

  <div class="hero__content container">
    <p class="hero__subtitle hero__anim" style="animation-delay: 0.2s;"><?php echo esc_html($hero_subtitle); ?></p>
    <h1 class="hero__title hero__anim" style="animation-delay: 0.4s;"><?php echo nl2br(esc_html($hero_title)); ?></h1>
    <p class="hero__desc hero__anim" style="animation-delay: 0.6s;"><?php echo nl2br(esc_html($hero_desc)); ?></p>
    <div class="hero__buttons hero__anim" style="animation-delay: 0.8s;">
      <?php if ($hero_cta1_text) : ?>
        <a href="<?php echo esc_url($hero_cta1_url); ?>" class="btn btn--primary btn--lg"><?php echo esc_html($hero_cta1_text); ?></a>
      <?php endif; ?>
      <?php if ($hero_cta2_text) : ?>
        <a href="<?php echo esc_url($hero_cta2_url); ?>" class="btn btn--ghost btn--lg"><?php echo esc_html($hero_cta2_text); ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php
// ========================================
// お知らせ欄
// ========================================
if ($show_news) :
    $news_posts = new WP_Query([
        'post_type'      => 'news',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    if ($news_posts->have_posts()) :
?>
<section class="section section--white news-section">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">News</span>
      <span class="section-title__ja">お知らせ</span>
    </div>

    <div class="news-list js-fade-up">
      <?php while ($news_posts->have_posts()) : $news_posts->the_post();
          $news_cats = get_the_terms(get_the_ID(), 'news_category');
      ?>
        <a href="<?php the_permalink(); ?>" class="news-list__item">
          <time class="news-list__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
          <?php if ($news_cats && !is_wp_error($news_cats)) : ?>
            <span class="news-list__cat"><?php echo esc_html($news_cats[0]->name); ?></span>
          <?php endif; ?>
          <span class="news-list__title"><?php the_title(); ?></span>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php
    endif;
endif;
?>

<?php
// ========================================
// 新着・おすすめ物件
// ========================================
if ($show_property) : ?>
<section class="section section--white">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Property</span>
      <span class="section-title__ja">新着・おすすめ物件</span>
    </div>

    <div class="property-grid js-fade-up">
      <?php
      $properties = new WP_Query([
          'post_type'      => 'property',
          'posts_per_page' => 6,
          'meta_query'     => [
              'relation' => 'OR',
              ['key' => 'property_is_featured', 'value' => '1'],
              ['key' => 'property_is_featured', 'compare' => 'NOT EXISTS'],
          ],
          'orderby' => 'date',
          'order'   => 'DESC',
      ]);
      if ($properties->have_posts()) :
          while ($properties->have_posts()) : $properties->the_post();
              get_template_part('template-parts/property-card');
          endwhile;
          wp_reset_postdata();
      else : ?>
        <p class="no-results">現在、物件情報を準備中です。</p>
      <?php endif; ?>
    </div>

    <div class="section__more js-fade-up">
      <a href="<?php echo esc_url(home_url('/property/')); ?>" class="btn btn--ghost-dark">物件一覧をすべて見る &rarr;</a>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// 選ばれる理由
// ========================================
if ($show_reason) :
    $default_reasons = [
        ['title' => "地域密着の\n豊富な物件情報",  'text' => '川崎市多摩区を中心に、地元ならではのネットワークで豊富な物件情報をご提供。レインズ掲載前の物件もいち早くご紹介いたします。'],
        ['title' => "経験豊富な\nスタッフが対応",   'text' => '宅地建物取引士の資格を持つスタッフが、物件のご案内からローン相談、契約手続きまで一貫してサポートいたします。'],
        ['title' => "購入後も安心の\nアフターサポート", 'text' => 'お引渡し後も住まいに関するご相談を承ります。リフォームや売却のご相談など、末永いお付き合いをお約束します。'],
    ];
?>
<section class="section section--alt">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Reason</span>
      <span class="section-title__ja">選ばれる理由</span>
    </div>

    <div class="reasons-grid js-fade-up">
      <?php for ($i = 1; $i <= 3; $i++) :
          $custom_title = get_theme_mod("bh_reason_{$i}_title", '');
          $custom_text  = get_theme_mod("bh_reason_{$i}_text", '');
          $custom_icon  = get_theme_mod("bh_reason_{$i}_icon", '');
          $r_title = $custom_title ?: $default_reasons[$i-1]['title'];
          $r_text  = $custom_text ?: $default_reasons[$i-1]['text'];
      ?>
        <div class="reason-card">
          <?php if ($custom_icon) : ?>
            <img src="<?php echo esc_url($custom_icon); ?>" alt="" class="reason-card__icon" loading="lazy">
          <?php else : ?>
            <span class="reason-card__number"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></span>
          <?php endif; ?>
          <h3 class="reason-card__title"><?php echo nl2br(esc_html($r_title)); ?></h3>
          <p class="reason-card__text"><?php echo esc_html($r_text); ?></p>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// ローンシミュレーション
// ========================================
if ($show_loan) : ?>
<section class="section section--white">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Loan Simulation</span>
      <span class="section-title__ja">ローンシミュレーション</span>
    </div>
    <div class="js-fade-up">
      <?php get_template_part('template-parts/loan-simulator'); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// Instagram
// ========================================
if ($show_instagram) :
    $ig_url = get_theme_mod('bh_instagram_url', '');
    $ig_images = [];
    for ($ig = 1; $ig <= 6; $ig++) {
        $img = get_theme_mod("bh_instagram_image_{$ig}", '');
        if ($img) {
            $ig_images[] = [
                'image' => $img,
                'link'  => get_theme_mod("bh_instagram_link_{$ig}", '') ?: $ig_url,
            ];
        }
    }
    $has_ig_images = !empty($ig_images);
?>
<section class="section section--alt">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Instagram</span>
      <span class="section-title__ja">最新の投稿</span>
    </div>

    <div class="instagram-grid js-fade-up">
      <?php if ($has_ig_images) : ?>
        <?php foreach ($ig_images as $ig_item) : ?>
          <a href="<?php echo esc_url($ig_item['link'] ?: '#'); ?>" class="instagram-grid__item" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo esc_url($ig_item['image']); ?>" alt="Instagram投稿" loading="lazy">
            <div class="instagram-grid__overlay">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </div>
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <?php for ($ph = 0; $ph < 6; $ph++) : ?>
          <div class="instagram-grid__item instagram-grid__placeholder">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>

    <?php if ($ig_url) : ?>
      <div class="section__more js-fade-up">
        <a href="<?php echo esc_url($ig_url); ?>" class="btn btn--ghost-dark" target="_blank" rel="noopener noreferrer">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:6px;"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          もっと見る
        </a>
      </div>
    <?php else : ?>
      <p class="instagram-grid__setup-hint">カスタマイザー &gt; トップページ設定 &gt; Instagram連携 から画像とURLを設定してください</p>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// お客様の声（サンプルデータ付き）
// ========================================
if ($show_voice) :
    $sample_voices = [
        ['name' => 'T.S 様', 'type' => '中古マンション購入', 'area' => '川崎市多摩区', 'rating' => 5,
         'comment' => '初めての不動産購入で不安でしたが、物件探しから契約まで丁寧にサポートしていただきました。地元の情報にも詳しく、周辺環境のことまで教えていただけたのがとても心強かったです。'],
        ['name' => 'M.K 様', 'type' => '新築戸建購入', 'area' => '川崎市高津区', 'rating' => 5,
         'comment' => '子どもの学校区を考慮した物件を複数ご提案いただき、理想の住まいに出会えました。住宅ローンの相談にも親身に対応してくださり、安心して購入を決断できました。'],
        ['name' => 'A.Y 様', 'type' => '中古戸建購入', 'area' => '稲城市', 'rating' => 4,
         'comment' => '予算内で希望エリアの物件を見つけるのは難しいと思っていましたが、レインズに掲載される前の物件を紹介していただき驚きました。地域密着ならではの強みだと感じました。'],
    ];

    // お客様の声投稿タイプがある場合はそこから取得、なければサンプル
    $voice_posts = get_posts([
        'post_type'      => 'voice',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
    ]);
    $has_voice_posts = !empty($voice_posts);
?>
<section class="section section--alt">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Voice</span>
      <span class="section-title__ja">お客様の声</span>
    </div>

    <div class="voice-grid js-fade-up">
      <?php if ($has_voice_posts) :
          foreach ($voice_posts as $vp) :
              get_template_part('template-parts/voice-card', null, [
                  'name'    => get_post_meta($vp->ID, 'voice_customer_name', true),
                  'type'    => get_post_meta($vp->ID, 'voice_transaction_type', true),
                  'area'    => get_post_meta($vp->ID, 'voice_area', true),
                  'rating'  => get_post_meta($vp->ID, 'voice_rating', true) ?: 5,
                  'comment' => $vp->post_content ?: get_post_meta($vp->ID, 'voice_comment', true),
              ]);
          endforeach;
      else :
          foreach ($sample_voices as $voice) :
              get_template_part('template-parts/voice-card', null, $voice);
          endforeach;
      endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// コラム最新記事
// ========================================
if ($show_column) : ?>
<section class="section section--white">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Column</span>
      <span class="section-title__ja">コラム最新記事</span>
    </div>

    <div class="column-grid js-fade-up">
      <?php
      $columns = new WP_Query([
          'post_type'      => 'post',
          'posts_per_page' => 4,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ]);
      if ($columns->have_posts()) :
          while ($columns->have_posts()) : $columns->the_post();
      ?>
        <a href="<?php the_permalink(); ?>" class="column-card">
          <div class="column-card__image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('property-card', ['loading' => 'lazy']); ?>
            <?php else : ?>
              <div class="column-card__noimage">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              </div>
            <?php endif; ?>
            <?php $cats = get_the_category(); if ($cats) : ?>
              <span class="column-card__badge"><?php echo esc_html($cats[0]->name); ?></span>
            <?php endif; ?>
          </div>
          <div class="column-card__body">
            <time class="column-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
            <h3 class="column-card__title"><?php the_title(); ?></h3>
            <p class="column-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
          </div>
        </a>
      <?php
          endwhile;
          wp_reset_postdata();
      else : ?>
        <p class="no-results">記事を準備中です。</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// CTA バナー
// ========================================
if ($show_cta) :
    get_template_part('template-parts/cta-banner');
endif;
?>

<?php get_footer(); ?>
