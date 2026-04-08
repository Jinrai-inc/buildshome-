<?php get_header(); ?>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <div class="error-404">
      <h1 class="error-404__code">404</h1>
      <h2 class="error-404__title">ページが見つかりません</h2>
      <p class="error-404__text">お探しのページは移動または削除された可能性があります。<br>URLをご確認いただくか、下記のリンクからお探しください。</p>
      <div class="error-404__actions">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">トップページへ</a>
        <a href="<?php echo esc_url(home_url('/property/')); ?>" class="btn btn--ghost-dark">物件一覧を見る</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
