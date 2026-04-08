<?php
/**
 * メインテンプレート（WordPress 必須ファイル）
 * 他の専用テンプレートが存在しない場合のフォールバック
 */
get_header();
?>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <?php if (have_posts()) : ?>
      <div class="property-grid">
        <?php while (have_posts()) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="column-card">
            <div class="column-card__image">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('property-card', ['loading' => 'lazy']); ?>
              <?php else : ?>
                <div class="column-card__noimage">
                  <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                </div>
              <?php endif; ?>
            </div>
            <div class="column-card__body">
              <time class="column-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
              <h3 class="column-card__title"><?php the_title(); ?></h3>
              <p class="column-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
            </div>
          </a>
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
      <p class="no-results">記事が見つかりませんでした。</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
