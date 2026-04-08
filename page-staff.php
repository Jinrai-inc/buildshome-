<?php
/**
 * Template Name: スタッフ紹介
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Staff</span>
      <span class="section-title__ja">スタッフ紹介</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php if (trim(get_the_content())) : ?>
        <div class="entry-content js-fade-up">
          <?php the_content(); ?>
        </div>
      <?php else : ?>
        <!-- デフォルト表示（本文が空の場合） -->
        <div class="staff-grid">
          <div class="staff-card js-fade-up">
            <div class="staff-card__photo">
              <div class="staff-card__photo-placeholder">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </div>
            </div>
            <div class="staff-card__body">
              <h3 class="staff-card__name">一ノ瀬 諒</h3>
              <p class="staff-card__role">代表取締役</p>
              <p class="staff-card__license">宅地建物取引士</p>
              <p class="staff-card__desc">川崎市多摩区で生まれ育ち、この街の魅力を知り尽くしています。お客様一人ひとりのライフスタイルに合った最適な住まいをご提案いたします。</p>
            </div>
          </div>
          <div class="staff-card js-fade-up" data-delay="0.1">
            <div class="staff-card__photo">
              <div class="staff-card__photo-placeholder">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              </div>
            </div>
            <div class="staff-card__body">
              <h3 class="staff-card__name">スタッフ名</h3>
              <p class="staff-card__role">営業担当</p>
              <p class="staff-card__license">宅地建物取引士</p>
              <p class="staff-card__desc">物件のご案内からローン相談まで、お客様に寄り添ったサポートを心がけています。お気軽にご相談ください。</p>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
