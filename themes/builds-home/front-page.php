<?php get_header(); ?>

<!-- Hero Section -->
<section class="hero">
  <div class="hero__bg">
    <div class="hero__circle hero__circle--1"></div>
    <div class="hero__circle hero__circle--2"></div>
    <div class="hero__glow"></div>
  </div>
  <div class="hero__content container">
    <p class="hero__subtitle hero__anim" style="animation-delay: 0.2s;">Builds Home &mdash; 川崎・多摩エリアの不動産</p>
    <h1 class="hero__title hero__anim" style="animation-delay: 0.4s;">当たり前の豊かさを<br>追求し、創造し続ける</h1>
    <p class="hero__desc hero__anim" style="animation-delay: 0.6s;">不動産を通じて、人々が安心して暮らせる空間と<br class="sp-hide">心地よい生活を提供することをお約束します。</p>
    <div class="hero__buttons hero__anim" style="animation-delay: 0.8s;">
      <a href="<?php echo esc_url(home_url('/property/')); ?>" class="btn btn--primary btn--lg">物件を探す</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--ghost btn--lg">ご相談はこちら</a>
    </div>
  </div>
</section>

<!-- Featured Properties -->
<section class="section section--white">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Property</span>
      <span class="section-title__ja">新着・おすすめ物件</span>
    </div>

    <div class="property-grid js-fade-up">
      <?php
      $args = [
          'post_type'      => 'property',
          'posts_per_page' => 6,
          'meta_query'     => [
              'relation' => 'OR',
              [
                  'key'   => 'property_is_featured',
                  'value' => '1',
              ],
              [
                  'key'     => 'property_is_featured',
                  'compare' => 'NOT EXISTS',
              ],
          ],
          'orderby' => 'date',
          'order'   => 'DESC',
      ];
      $properties = new WP_Query($args);

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
      <a href="<?php echo esc_url(home_url('/property/')); ?>" class="btn btn--ghost-dark">
        物件一覧をすべて見る &rarr;
      </a>
    </div>
  </div>
</section>

<!-- Reasons -->
<section class="section section--alt">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Reason</span>
      <span class="section-title__ja">選ばれる理由</span>
    </div>

    <div class="reasons-grid js-fade-up">
      <div class="reason-card">
        <span class="reason-card__number">01</span>
        <h3 class="reason-card__title">地域密着の<br>豊富な物件情報</h3>
        <p class="reason-card__text">川崎市多摩区を中心に、地元ならではのネットワークで豊富な物件情報をご提供。レインズ掲載前の物件もいち早くご紹介いたします。</p>
      </div>
      <div class="reason-card">
        <span class="reason-card__number">02</span>
        <h3 class="reason-card__title">経験豊富な<br>スタッフが対応</h3>
        <p class="reason-card__text">宅地建物取引士の資格を持つスタッフが、物件のご案内からローン相談、契約手続きまで一貫してサポートいたします。</p>
      </div>
      <div class="reason-card">
        <span class="reason-card__number">03</span>
        <h3 class="reason-card__title">購入後も安心の<br>アフターサポート</h3>
        <p class="reason-card__text">お引渡し後も住まいに関するご相談を承ります。リフォームや売却のご相談など、末永いお付き合いをお約束します。</p>
      </div>
    </div>
  </div>
</section>

<!-- Loan Simulator -->
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

<!-- Customer Voice -->
<section class="section section--alt">
  <div class="container">
    <div class="section-title js-fade-up">
      <span class="section-title__en">Voice</span>
      <span class="section-title__ja">お客様の声</span>
    </div>

    <div class="voice-grid js-fade-up">
      <?php
      // お客様の声ページからACFリピーターを取得
      $voice_page = get_page_by_path('voice');
      if ($voice_page && function_exists('have_rows')) :
          $count = 0;
          if (have_rows('voice_list', $voice_page->ID)) :
              while (have_rows('voice_list', $voice_page->ID)) : the_row();
                  if ($count >= 3) break;
                  $count++;
                  $name = get_sub_field('voice_customer_name');
                  $type = get_sub_field('voice_transaction_type');
                  $area = get_sub_field('voice_area');
                  $rating = get_sub_field('voice_rating');
                  $comment = get_sub_field('voice_comment');
      ?>
        <div class="voice-card">
          <div class="voice-card__stars">
            <?php for ($i = 0; $i < 5; $i++) : ?>
              <span class="voice-card__star <?php echo $i < $rating ? 'is-active' : ''; ?>">&#9733;</span>
            <?php endfor; ?>
          </div>
          <p class="voice-card__comment"><?php echo esc_html($comment); ?></p>
          <div class="voice-card__meta">
            <span class="voice-card__name"><?php echo esc_html($name); ?></span>
            <span class="voice-card__type"><?php echo esc_html($type); ?></span>
            <span class="voice-card__area"><?php echo esc_html($area); ?></span>
          </div>
        </div>
      <?php
              endwhile;
          endif;
      endif;
      ?>
    </div>
  </div>
</section>

<!-- Latest Columns -->
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
            <?php
            $cats = get_the_category();
            if ($cats) :
            ?>
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

<!-- CTA Banner -->
<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
