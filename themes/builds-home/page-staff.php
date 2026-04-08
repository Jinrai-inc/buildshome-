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
    <div class="staff-grid">
      <?php if (function_exists('have_rows') && have_rows('staff_list')) : ?>
        <?php while (have_rows('staff_list')) : the_row();
          $name  = get_sub_field('staff_name');
          $role  = get_sub_field('staff_role');
          $license = get_sub_field('staff_license');
          $desc  = get_sub_field('staff_description');
          $photo = get_sub_field('staff_photo');
        ?>
          <div class="staff-card js-fade-up">
            <div class="staff-card__photo">
              <?php if ($photo) : ?>
                <img src="<?php echo esc_url($photo['sizes']['thumbnail'] ?? $photo['url']); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy">
              <?php else : ?>
                <div class="staff-card__photo-placeholder">
                  <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
              <?php endif; ?>
            </div>
            <div class="staff-card__body">
              <h3 class="staff-card__name"><?php echo esc_html($name); ?></h3>
              <?php if ($role) : ?>
                <p class="staff-card__role"><?php echo esc_html($role); ?></p>
              <?php endif; ?>
              <?php if ($license) : ?>
                <p class="staff-card__license"><?php echo esc_html($license); ?></p>
              <?php endif; ?>
              <?php if ($desc) : ?>
                <p class="staff-card__desc"><?php echo esc_html($desc); ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <p class="no-results">スタッフ情報を準備中です。</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
