<?php
/**
 * 物件カードコンポーネント
 */

$post_id       = get_the_ID();
$price         = get_field('property_price_display', $post_id);
$rooms         = get_field('property_rooms', $post_id);
$area_size     = get_field('property_area_size', $post_id);
$age           = get_field('property_age', $post_id);
$address       = get_field('property_address', $post_id);
$station       = get_field('property_station', $post_id);
$is_new        = get_field('property_is_new', $post_id);
$status        = get_field('property_status', $post_id);

// 物件種別
$types = get_the_terms($post_id, 'property_type');
$type_name = $types ? $types[0]->name : '';
$type_slug = $types ? $types[0]->slug : '';

// バッジカラークラス
$badge_class = 'badge--other';
if (strpos($type_name, 'マンション') !== false) {
    $badge_class = 'badge--mansion';
} elseif (strpos($type_name, '戸建') !== false) {
    $badge_class = 'badge--kodate';
} elseif (strpos($type_name, '土地') !== false) {
    $badge_class = 'badge--tochi';
}
?>

<article class="property-card" data-property-id="<?php echo esc_attr($post_id); ?>">
  <a href="<?php the_permalink(); ?>" class="property-card__link">
    <div class="property-card__image">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('property-card', ['loading' => 'lazy', 'alt' => get_the_title()]); ?>
      <?php else : ?>
        <div class="property-card__noimage">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
      <?php endif; ?>

      <?php if ($type_name) : ?>
        <span class="badge <?php echo esc_attr($badge_class); ?> property-card__badge"><?php echo esc_html($type_name); ?></span>
      <?php endif; ?>

      <?php if ($is_new) : ?>
        <span class="badge badge--new property-card__new">NEW</span>
      <?php endif; ?>

      <?php if ($status === '商談中') : ?>
        <span class="badge badge--status-negotiating property-card__status">商談中</span>
      <?php elseif ($status === '成約済') : ?>
        <span class="badge badge--status-sold property-card__status">成約済</span>
      <?php endif; ?>
    </div>

    <div class="property-card__body">
      <h3 class="property-card__title"><?php the_title(); ?></h3>

      <?php if ($price) : ?>
        <p class="property-card__price"><?php echo esc_html($price); ?></p>
      <?php endif; ?>

      <div class="property-card__tags">
        <?php if ($rooms) : ?>
          <span class="property-card__tag"><?php echo esc_html($rooms); ?></span>
        <?php endif; ?>
        <?php if ($area_size) : ?>
          <span class="property-card__tag"><?php echo esc_html($area_size); ?></span>
        <?php endif; ?>
        <?php if ($age) : ?>
          <span class="property-card__tag"><?php echo esc_html($age); ?></span>
        <?php endif; ?>
      </div>

      <?php if ($address) : ?>
        <p class="property-card__info">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <?php echo esc_html($address); ?>
        </p>
      <?php endif; ?>

      <?php if ($station) : ?>
        <p class="property-card__info">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="3" width="16" height="14" rx="2"/><path d="M4 11h16"/><path d="M8 21l2-4h4l2 4"/></svg>
          <?php echo esc_html($station); ?>
        </p>
      <?php endif; ?>
    </div>
  </a>

  <button class="property-card__fav" data-property-id="<?php echo esc_attr($post_id); ?>" aria-label="お気に入りに追加">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
  </button>
</article>
