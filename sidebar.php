<aside class="sidebar">
  <!-- Search -->
  <div class="sidebar__widget">
    <h3 class="sidebar__title">記事を検索</h3>
    <?php get_search_form(); ?>
  </div>

  <!-- Latest Posts -->
  <div class="sidebar__widget">
    <h3 class="sidebar__title">最新記事</h3>
    <ul class="sidebar__posts">
      <?php
      $latest = new WP_Query([
          'post_type'      => 'post',
          'posts_per_page' => 5,
      ]);
      if ($latest->have_posts()) :
          while ($latest->have_posts()) : $latest->the_post();
      ?>
        <li>
          <a href="<?php the_permalink(); ?>" class="sidebar__post-link">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
            <span><?php the_title(); ?></span>
          </a>
        </li>
      <?php
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </ul>
  </div>

  <!-- Categories -->
  <div class="sidebar__widget">
    <h3 class="sidebar__title">カテゴリー</h3>
    <ul class="sidebar__categories">
      <?php
      $cats = get_categories(['hide_empty' => false]);
      foreach ($cats as $cat) :
      ?>
        <li>
          <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
            <?php echo esc_html($cat->name); ?>
            <span class="sidebar__count">(<?php echo $cat->count; ?>)</span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <!-- Contact CTA -->
  <div class="sidebar__widget sidebar__cta">
    <p class="sidebar__cta-text">物件のご相談はお気軽に</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--sm">お問い合わせ</a>
    <a href="tel:044-400-0562" class="sidebar__cta-tel">044-400-0562</a>
  </div>
</aside>
