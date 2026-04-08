<?php
/**
 * お客様の声カードコンポーネント
 *
 * Usage: get_template_part('template-parts/voice-card', null, [
 *   'name' => '...', 'type' => '...', 'area' => '...', 'rating' => 5, 'comment' => '...'
 * ]);
 */

$name    = $args['name'] ?? '';
$type    = $args['type'] ?? '';
$area    = $args['area'] ?? '';
$rating  = intval($args['rating'] ?? 5);
$comment = $args['comment'] ?? '';
?>

<div class="voice-card">
  <div class="voice-card__stars">
    <?php for ($i = 0; $i < 5; $i++) : ?>
      <span class="voice-card__star <?php echo $i < $rating ? 'is-active' : ''; ?>">&#9733;</span>
    <?php endfor; ?>
  </div>
  <p class="voice-card__comment"><?php echo esc_html($comment); ?></p>
  <div class="voice-card__meta">
    <?php if ($name) : ?><span class="voice-card__name"><?php echo esc_html($name); ?></span><?php endif; ?>
    <?php if ($type) : ?><span class="voice-card__type"><?php echo esc_html($type); ?></span><?php endif; ?>
    <?php if ($area) : ?><span class="voice-card__area"><?php echo esc_html($area); ?></span><?php endif; ?>
  </div>
</div>
