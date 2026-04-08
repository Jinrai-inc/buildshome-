<?php get_header(); ?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Property</span>
      <span class="section-title__ja">物件一覧</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <?php get_template_part('template-parts/property-filter'); ?>

    <?php if (have_posts()) : ?>
      <div class="property-list__count">
        <p><?php echo esc_html($wp_query->found_posts); ?>件の物件が見つかりました</p>
      </div>

      <div class="property-grid">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('template-parts/property-card'); ?>
        <?php endwhile; ?>
      </div>

      <div class="pagination">
        <?php
        echo paginate_links([
            'prev_text' => '&laquo; 前へ',
            'next_text' => '次へ &raquo;',
            'mid_size'  => 2,
        ]);
        ?>
      </div>
    <?php else : ?>
      <div class="no-results-block">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
        <p>条件に一致する物件が見つかりませんでした。</p>
        <a href="<?php echo esc_url(get_post_type_archive_link('property')); ?>" class="btn btn--ghost-dark">条件をリセットする</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
