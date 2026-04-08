<?php
/**
 * 物件検索フィルター
 */

$current_type  = isset($_GET['property_type']) ? sanitize_text_field($_GET['property_type']) : '';
$current_rooms = isset($_GET['rooms']) ? sanitize_text_field($_GET['rooms']) : '';
$current_min   = isset($_GET['price_min']) ? intval($_GET['price_min']) : '';
$current_max   = isset($_GET['price_max']) ? intval($_GET['price_max']) : '';
$current_walk  = isset($_GET['walk']) ? intval($_GET['walk']) : '';
$current_area  = isset($_GET['area']) ? sanitize_text_field($_GET['area']) : '';
?>

<div class="property-filter">
  <form class="property-filter__form" method="get" action="<?php echo esc_url(get_post_type_archive_link('property')); ?>">
    <div class="property-filter__grid">
      <!-- 物件種別 -->
      <div class="property-filter__field">
        <label class="property-filter__label" for="filter-type">物件種別</label>
        <select name="property_type" id="filter-type" class="property-filter__select">
          <option value="">すべて</option>
          <?php
          $types = get_terms(['taxonomy' => 'property_type', 'hide_empty' => false]);
          if (!is_wp_error($types)) :
              foreach ($types as $type) :
          ?>
            <option value="<?php echo esc_attr($type->slug); ?>" <?php selected($current_type, $type->slug); ?>><?php echo esc_html($type->name); ?></option>
          <?php
              endforeach;
          endif;
          ?>
        </select>
      </div>

      <!-- 間取り -->
      <div class="property-filter__field">
        <label class="property-filter__label" for="filter-rooms">間取り</label>
        <select name="rooms" id="filter-rooms" class="property-filter__select">
          <option value="">すべて</option>
          <?php
          $room_options = ['1R','1K','1DK','1LDK','2K','2DK','2LDK','3K','3DK','3LDK','4LDK','4LDK以上'];
          foreach ($room_options as $room) :
          ?>
            <option value="<?php echo esc_attr($room); ?>" <?php selected($current_rooms, $room); ?>><?php echo esc_html($room); ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- 価格下限 -->
      <div class="property-filter__field">
        <label class="property-filter__label" for="filter-price-min">価格下限（万円）</label>
        <input type="number" name="price_min" id="filter-price-min" class="property-filter__input" placeholder="下限なし" value="<?php echo esc_attr($current_min); ?>" step="100">
      </div>

      <!-- 価格上限 -->
      <div class="property-filter__field">
        <label class="property-filter__label" for="filter-price-max">価格上限（万円）</label>
        <input type="number" name="price_max" id="filter-price-max" class="property-filter__input" placeholder="上限なし" value="<?php echo esc_attr($current_max); ?>" step="100">
      </div>

      <!-- 駅徒歩 -->
      <div class="property-filter__field">
        <label class="property-filter__label" for="filter-walk">駅徒歩</label>
        <select name="walk" id="filter-walk" class="property-filter__select">
          <option value="">指定なし</option>
          <option value="5" <?php selected($current_walk, 5); ?>>5分以内</option>
          <option value="10" <?php selected($current_walk, 10); ?>>10分以内</option>
          <option value="15" <?php selected($current_walk, 15); ?>>15分以内</option>
          <option value="20" <?php selected($current_walk, 20); ?>>20分以内</option>
        </select>
      </div>

      <!-- エリア -->
      <div class="property-filter__field">
        <label class="property-filter__label" for="filter-area">エリア</label>
        <select name="area" id="filter-area" class="property-filter__select">
          <option value="">すべて</option>
          <?php
          $areas = get_terms(['taxonomy' => 'property_area', 'hide_empty' => false]);
          if (!is_wp_error($areas)) :
              foreach ($areas as $area) :
          ?>
            <option value="<?php echo esc_attr($area->slug); ?>" <?php selected($current_area, $area->slug); ?>><?php echo esc_html($area->name); ?></option>
          <?php
              endforeach;
          endif;
          ?>
        </select>
      </div>
    </div>

    <div class="property-filter__actions">
      <button type="submit" class="btn btn--primary">検索する</button>
      <a href="<?php echo esc_url(get_post_type_archive_link('property')); ?>" class="btn btn--ghost-dark">リセット</a>
      <button type="button" class="btn btn--ghost-dark" id="filter-favorites-only">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        お気に入りのみ
      </button>
    </div>
  </form>
</div>
