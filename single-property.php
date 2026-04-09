<?php get_header(); ?>

<?php builds_home_breadcrumb(); ?>

<?php
$post_id    = get_the_ID();
$price_disp = get_field('property_price_display');
$price_num  = get_field('property_price_number');
$rooms      = get_field('property_rooms');
$area_size  = get_field('property_area_size');
$address    = get_field('property_address');
$station    = get_field('property_station');
$age        = get_field('property_age');
$structure  = get_field('property_structure');
$floor      = get_field('property_floor');
$parking    = get_field('property_parking');
$balcony    = get_field('property_balcony');
$land_area  = get_field('property_land_area');
$bldg_area  = get_field('property_building_area');
$mgmt_fee   = get_field('property_management_fee');
$repair     = get_field('property_repair_fund');
$delivery   = get_field('property_delivery');
$trans_type = get_field('property_transaction_type');
$features   = get_field('property_features');
$desc       = get_field('property_description');
$gallery    = get_field('property_gallery');
$floorplan  = get_field('property_floorplan');
$map_embed  = get_field('property_map_embed');
$status     = get_field('property_status');

$types     = get_the_terms($post_id, 'property_type');
$type_name = $types ? $types[0]->name : '';
$areas     = get_the_terms($post_id, 'property_area');
$area_name = $areas ? $areas[0]->name : '';
?>

<article class="property-detail">
  <div class="container">

    <!-- Gallery -->
    <div class="property-detail__gallery" id="property-gallery">
      <div class="property-detail__main-image" id="gallery-main">
        <?php if ($gallery && is_array($gallery) && count($gallery) > 0) : ?>
          <img src="<?php echo esc_url($gallery[0]['sizes']['large'] ?? $gallery[0]['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" id="gallery-main-img">
        <?php elseif (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('property-detail', ['id' => 'gallery-main-img']); ?>
        <?php else : ?>
          <div class="property-detail__noimage">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </div>
        <?php endif; ?>
      </div>

      <?php if ($gallery && is_array($gallery) && count($gallery) > 1) : ?>
        <div class="property-detail__thumbs">
          <?php foreach ($gallery as $i => $img) : ?>
            <button class="property-detail__thumb <?php echo $i === 0 ? 'is-active' : ''; ?>" data-src="<?php echo esc_url($img['sizes']['large'] ?? $img['url']); ?>">
              <img src="<?php echo esc_url($img['sizes']['thumbnail'] ?? $img['url']); ?>" alt="" loading="lazy">
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Title + Favorite -->
    <div class="property-detail__header">
      <div>
        <?php if ($status === '商談中') : ?>
          <span class="badge badge--status-negotiating">商談中</span>
        <?php elseif ($status === '成約済') : ?>
          <span class="badge badge--status-sold">成約済</span>
        <?php endif; ?>
        <?php if ($type_name) : ?>
          <span class="badge badge--mansion"><?php echo esc_html($type_name); ?></span>
        <?php endif; ?>
        <h1 class="property-detail__title"><?php the_title(); ?></h1>
      </div>
      <button class="property-card__fav property-detail__fav" data-property-id="<?php echo esc_attr($post_id); ?>" aria-label="お気に入りに追加">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      </button>
    </div>

    <!-- Price -->
    <?php if ($price_disp) : ?>
      <p class="property-detail__price"><?php echo esc_html($price_disp); ?></p>
    <?php endif; ?>

    <!-- Feature Tags -->
    <?php if ($features) : ?>
      <div class="property-detail__features">
        <?php
        $tags = preg_split('/[、,]/', $features);
        foreach ($tags as $tag) :
            $tag = trim($tag);
            if ($tag) :
        ?>
          <span class="property-detail__feature-tag"><?php echo esc_html($tag); ?></span>
        <?php
            endif;
        endforeach;
        ?>
      </div>
    <?php endif; ?>

    <!-- Property Info Table -->
    <div class="property-detail__info">
      <h2 class="property-detail__section-title">物件概要</h2>
      <div class="property-detail__table">
        <?php
        $info_items = [
            '物件種別' => $type_name,
            '間取り'   => $rooms,
            '面積'     => $area_size,
            '所在地'   => $address,
            '交通'     => $station,
            '築年'     => $age,
            '構造'     => $structure,
            '階数'     => $floor,
            '土地面積'  => $land_area,
            '建物面積'  => $bldg_area,
            '駐車場'   => $parking,
            'バルコニー' => $balcony,
            '管理費'   => $mgmt_fee,
            '修繕積立金' => $repair,
            '引渡時期'  => $delivery,
            '取引態様'  => $trans_type,
            'エリア'   => $area_name,
        ];
        foreach ($info_items as $label => $value) :
            if (!$value || $value === '—' || $value === '-') continue;
        ?>
          <div class="property-detail__table-row">
            <dt class="property-detail__table-label"><?php echo esc_html($label); ?></dt>
            <dd class="property-detail__table-value"><?php echo esc_html($value); ?></dd>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Description -->
    <?php if ($desc) : ?>
      <div class="property-detail__desc">
        <h2 class="property-detail__section-title">物件紹介</h2>
        <div class="property-detail__desc-text"><?php echo wpautop(esc_html($desc)); ?></div>
      </div>
    <?php endif; ?>

    <?php if (get_the_content()) : ?>
      <div class="property-detail__desc">
        <div class="property-detail__desc-text"><?php the_content(); ?></div>
      </div>
    <?php endif; ?>

    <!-- Floor Plan -->
    <?php if ($floorplan) : ?>
      <div class="property-detail__floorplan">
        <h2 class="property-detail__section-title">間取り図</h2>
        <img src="<?php echo esc_url($floorplan['sizes']['large'] ?? $floorplan['url']); ?>" alt="間取り図" loading="lazy">
      </div>
    <?php endif; ?>

    <!-- Video (TikTok / YouTube) -->
    <?php get_template_part('template-parts/property-video'); ?>

    <!-- Map -->
    <?php if ($map_embed) : ?>
      <div class="property-detail__map">
        <h2 class="property-detail__section-title">地図</h2>
        <div class="property-detail__map-wrap"><?php echo $map_embed; ?></div>
      </div>
    <?php endif; ?>

    <!-- Loan Simulator -->
    <div class="property-detail__loan">
      <h2 class="property-detail__section-title">ローンシミュレーション</h2>
      <button type="button" class="btn btn--ghost-dark" id="loan-toggle">ローンシミュレーションを開く</button>
      <div class="property-detail__loan-body" id="loan-toggle-body" style="display:none;">
        <?php get_template_part('template-parts/loan-simulator'); ?>
      </div>
    </div>

    <!-- CTA -->
    <div class="property-detail__cta">
      <a href="<?php echo esc_url(home_url('/contact/?property=' . $post_id)); ?>" class="btn btn--primary btn--lg">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        この物件を問い合わせる
      </a>
      <a href="#" class="btn btn--ghost-dark btn--lg" target="_blank" rel="noopener noreferrer">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
        LINEで相談する
      </a>
    </div>

    <!-- Related Properties -->
    <div class="property-detail__related">
      <h2 class="property-detail__section-title">関連物件</h2>
      <div class="property-grid">
        <?php
        $related_args = [
            'post_type'      => 'property',
            'posts_per_page' => 4,
            'post__not_in'   => [$post_id],
            'orderby'        => 'rand',
        ];

        $tax_q = [];
        if ($areas) {
            $tax_q[] = ['taxonomy' => 'property_area', 'field' => 'term_id', 'terms' => $areas[0]->term_id];
        }
        if ($types) {
            $tax_q[] = ['taxonomy' => 'property_type', 'field' => 'term_id', 'terms' => $types[0]->term_id];
        }
        if ($tax_q) {
            $tax_q['relation'] = 'OR';
            $related_args['tax_query'] = $tax_q;
        }

        $related = new WP_Query($related_args);
        if ($related->have_posts()) :
            while ($related->have_posts()) : $related->the_post();
                get_template_part('template-parts/property-card');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="no-results">関連物件はありません。</p>';
        endif;
        ?>
      </div>
    </div>

  </div>
</article>

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
<?php
$json_ld = [
    '@context' => 'https://schema.org',
    '@type' => 'RealEstateListing',
    'name' => get_the_title(),
    'description' => $desc ?: wp_trim_words(get_the_excerpt(), 100),
    'url' => get_permalink(),
    'image' => get_the_post_thumbnail_url($post_id, 'large') ?: '',
    'offers' => [
        '@type' => 'Offer',
        'price' => $price_num ? strval($price_num * 10000) : '',
        'priceCurrency' => 'JPY',
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => $area_name ?: '',
        'addressRegion' => '神奈川県',
        'addressCountry' => 'JP',
    ],
];
echo json_encode($json_ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>

<?php get_footer(); ?>
