<?php get_header(); ?>

<?php builds_home_breadcrumb(); ?>

<div class="column-detail section section--white">
  <div class="container">
    <div class="column-detail__layout">
      <article class="column-detail__main">
        <?php while (have_posts()) : the_post(); ?>
          <header class="column-detail__header">
            <?php
            $cats = get_the_category();
            if ($cats) :
            ?>
              <span class="badge badge--mansion"><?php echo esc_html($cats[0]->name); ?></span>
            <?php endif; ?>
            <time class="column-detail__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y年n月j日'); ?></time>
            <h1 class="column-detail__title"><?php the_title(); ?></h1>
          </header>

          <?php if (has_post_thumbnail()) : ?>
            <div class="column-detail__thumbnail">
              <?php the_post_thumbnail('property-detail', ['loading' => 'lazy']); ?>
            </div>
          <?php endif; ?>

          <div class="column-detail__content entry-content">
            <?php the_content(); ?>
          </div>

          <footer class="column-detail__footer">
            <?php
            $tags = get_the_tags();
            if ($tags) :
            ?>
              <div class="column-detail__tags">
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="column-detail__tag">#<?php echo esc_html($tag->name); ?></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </footer>

          <!-- Related Posts -->
          <div class="column-detail__related">
            <h2 class="property-detail__section-title">関連記事</h2>
            <div class="column-grid column-grid--2">
              <?php
              $related_args = [
                  'post_type'      => 'post',
                  'posts_per_page' => 4,
                  'post__not_in'   => [get_the_ID()],
              ];
              if ($cats) {
                  $related_args['cat'] = $cats[0]->term_id;
              }
              $related = new WP_Query($related_args);
              if ($related->have_posts()) :
                  while ($related->have_posts()) : $related->the_post();
              ?>
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
                  </div>
                </a>
              <?php
                  endwhile;
                  wp_reset_postdata();
              endif;
              ?>
            </div>
          </div>

        <?php endwhile; ?>
      </article>

      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
