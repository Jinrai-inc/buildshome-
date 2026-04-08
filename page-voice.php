<?php
/**
 * Template Name: お客様の声
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Voice</span>
      <span class="section-title__ja">お客様の声</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <div class="voice-list">
      <?php if (function_exists('have_rows') && have_rows('voice_list')) : ?>
        <?php while (have_rows('voice_list')) : the_row();
          $name    = get_sub_field('voice_customer_name');
          $type    = get_sub_field('voice_transaction_type');
          $area    = get_sub_field('voice_area');
          $rating  = get_sub_field('voice_rating');
          $comment = get_sub_field('voice_comment');
        ?>
          <div class="voice-card voice-card--full js-fade-up">
            <div class="voice-card__header">
              <div class="voice-card__stars">
                <?php for ($i = 0; $i < 5; $i++) : ?>
                  <span class="voice-card__star <?php echo $i < $rating ? 'is-active' : ''; ?>">&#9733;</span>
                <?php endfor; ?>
              </div>
              <div class="voice-card__meta">
                <span class="voice-card__name"><?php echo esc_html($name); ?></span>
                <?php if ($type) : ?>
                  <span class="voice-card__type"><?php echo esc_html($type); ?></span>
                <?php endif; ?>
                <?php if ($area) : ?>
                  <span class="voice-card__area"><?php echo esc_html($area); ?></span>
                <?php endif; ?>
              </div>
            </div>
            <p class="voice-card__comment"><?php echo esc_html($comment); ?></p>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <p class="no-results">お客様の声を準備中です。</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
