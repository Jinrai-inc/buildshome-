<?php get_header();

// ── ACF フィールド取得（デフォルト値付き）──
$fp_id = get_the_ID();

// ヒーロー
$hero_bg_type    = get_field('hero_bg_type', $fp_id) ?: 'gradient';
$hero_bg_image   = get_field('hero_bg_image', $fp_id);
$hero_overlay    = get_field('hero_overlay_opacity', $fp_id);
$hero_overlay    = ($hero_overlay !== '' && $hero_overlay !== null) ? intval($hero_overlay) : 55;
$hero_subtitle   = get_field('hero_subtitle', $fp_id) ?: 'Builds Home — 川崎・多摩エリアの不動産';
$hero_title      = get_field('hero_title', $fp_id) ?: '当たり前の豊かさを追求し、創造し続ける';
$hero_desc       = get_field('hero_description', $fp_id) ?: '不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。';
$hero_cta1_text  = get_field('hero_cta1_text', $fp_id) ?: '物件を探す';
$hero_cta1_url   = get_field('hero_cta1_url', $fp_id) ?: home_url('/property/');
$hero_cta2_text  = get_field('hero_cta2_text', $fp_id) ?: 'ご相談はこちら';
$hero_cta2_url   = get_field('hero_cta2_url', $fp_id) ?: home_url('/contact/');

// セクション表示
$show_property = get_field('show_property_section', $fp_id);
$show_reason   = get_field('show_reason_section', $fp_id);
$show_loan     = get_field('show_loan_section', $fp_id);
$show_voice    = get_field('show_voice_section', $fp_id);
$show_column   = get_field('show_column_section', $fp_id);
$show_cta      = get_field('show_cta_section', $fp_id);

// ACF未設定時はすべて表示
if ($show_property === null) $show_property = true;
if ($show_reason === null)   $show_reason = true;
if ($show_loan === null)     $show_loan = true;
if ($show_voice === null)    $show_voice = true;
if ($show_column === null)   $show_column = true;
if ($show_cta === null)      $show_cta = true;

// ヒーロー背景スタイル
$hero_style = '';
$hero_class = 'hero';
if ($hero_bg_type === 'image' && $hero_bg_image) {
    $hero_style = 'background-image: url(' . esc_url($hero_bg_image['url']) . ');';
    $hero_class .= ' hero--image';
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
      else :
      ?>
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
    $has_custom_reasons = function_exists('have_rows') && have_rows('reasons_list', $fp_id);
    // デフォルトの理由データ
    $default_reasons = [
        ['title' => "地域密着の\n豊富な物件情報", 'text' => '川崎市多摩区を中心に、地元ならではのネットワークで豊富な物件情報をご提供。レインズ掲載前の物件もいち早くご紹介いたします。'],
        ['title' => "経験豊富な\nスタッフが対応", 'text' => '宅地建物取引士の資格を持つスタッフが、物件のご案内からローン相談、契約手続きまで一貫してサポートいたします。'],
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
      <?php if ($has_custom_reasons) : ?>
        <?php $num = 0; while (have_rows('reasons_list', $fp_id)) : the_row(); $num++; ?>
          <div class="reason-card">
            <?php $icon = get_sub_field('reason_icon'); if ($icon) : ?>
              <img src="<?php echo esc_url($icon['url']); ?>" alt="" class="reason-card__icon" loading="lazy">
            <?php else : ?>
              <span class="reason-card__number"><?php echo str_pad($num, 2, '0', STR_PAD_LEFT); ?></span>
            <?php endif; ?>
            <h3 class="reason-card__title"><?php echo nl2br(esc_html(get_sub_field('reason_title'))); ?></h3>
            <p class="reason-card__text"><?php echo esc_html(get_sub_field('reason_text')); ?></p>
          </div>
        <?php endwhile; ?>
      <?php else :
          foreach ($default_reasons as $i => $reason) : ?>
          <div class="reason-card">
            <span class="reason-card__number"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
            <h3 class="reason-card__title"><?php echo nl2br(esc_html($reason['title'])); ?></h3>
            <p class="reason-card__text"><?php echo esc_html($reason['text']); ?></p>
          </div>
        <?php endforeach;
      endif; ?>
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
// お客様の声（サンプルデータ付き）
// ========================================
if ($show_voice) :
    // 手動データがあるか確認
    $has_voice_data = function_exists('have_rows') && have_rows('voice_top_list', $fp_id);

    // サンプルデータ（ACF未入力時に表示）
    $sample_voices = [
        [
            'name' => 'T.S 様', 'type' => '中古マンション購入', 'area' => '川崎市多摩区', 'rating' => 5,
            'comment' => '初めての不動産購入で不安でしたが、物件探しから契約まで丁寧にサポートしていただきました。地元の情報にも詳しく、周辺環境のことまで教えていただけたのがとても心強かったです。',
        ],
        [
            'name' => 'M.K 様', 'type' => '新築戸建購入', 'area' => '川崎市高津区', 'rating' => 5,
            'comment' => '子どもの学校区を考慮した物件を複数ご提案いただき、理想の住まいに出会えました。住宅ローンの相談にも親身に対応してくださり、安心して購入を決断できました。',
        ],
        [
            'name' => 'A.Y 様', 'type' => '中古戸建購入', 'area' => '稲城市', 'rating' => 4,
            'comment' => '予算内で希望エリアの物件を見つけるのは難しいと思っていましたが、レインズに掲載される前の物件を紹介していただき驚きました。地域密着ならではの強みだと感じました。',
        ],
    ];
?>
<section class="section section--alt">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Voice</span>
      <span class="section-title__ja">お客様の声</span>
    </div>

    <div class="voice-grid js-fade-up">
      <?php if ($has_voice_data) : ?>
        <?php $v_count = 0; while (have_rows('voice_top_list', $fp_id)) : the_row();
            if ($v_count >= 3) break; $v_count++;
        ?>
          <?php get_template_part('template-parts/voice-card', null, [
              'name'    => get_sub_field('voice_customer_name'),
              'type'    => get_sub_field('voice_transaction_type'),
              'area'    => get_sub_field('voice_area'),
              'rating'  => get_sub_field('voice_rating'),
              'comment' => get_sub_field('voice_comment'),
          ]); ?>
        <?php endwhile; ?>
      <?php else :
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
      else :
      ?>
        <p class="no-results">記事を準備中です。</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
// ========================================
// フリーセクション（管理画面から追加）
// ========================================
if (function_exists('have_rows') && have_rows('free_sections', $fp_id)) :
    while (have_rows('free_sections', $fp_id)) : the_row();
        $sec_bg = get_sub_field('section_bg') === 'alt' ? 'section--alt' : 'section--white';
?>
<section class="section <?php echo esc_attr($sec_bg); ?>">
  <div class="container">
    <?php $title_en = get_sub_field('section_title_en'); $title_ja = get_sub_field('section_title_ja'); ?>
    <?php if ($title_ja || $title_en) : ?>
      <div class="section-title js-fade-up">
        <?php if ($title_en) : ?><span class="section-title__en"><?php echo esc_html($title_en); ?></span><?php endif; ?>
        <?php if ($title_ja) : ?><span class="section-title__ja"><?php echo esc_html($title_ja); ?></span><?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="free-section__content entry-content js-fade-up">
      <?php echo get_sub_field('section_content'); ?>
    </div>
  </div>
</section>
<?php
    endwhile;
endif;
?>

<?php
// ========================================
// CTA バナー
// ========================================
if ($show_cta) :
    get_template_part('template-parts/cta-banner', null, ['page_id' => $fp_id]);
endif;
?>

<?php get_footer(); ?>
