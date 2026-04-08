<?php
/**
 * Template Name: ローンシミュレーション
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Loan Simulation</span>
      <span class="section-title__ja">ローンシミュレーション</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <div class="js-fade-up">
      <?php get_template_part('template-parts/loan-simulator'); ?>
    </div>

    <div class="loan-page__text js-fade-up">
      <h2>住宅ローンについて</h2>
      <p>住宅ローンは、住宅を購入する際に金融機関から借り入れるローンです。物件価格に対して頭金を差し引いた金額を借り入れ、毎月一定額を返済していきます。</p>

      <h3>元利均等返済とは</h3>
      <p>上記シミュレーションでは「元利均等返済」方式で計算しています。これは毎月の返済額（元金＋利息）が一定となる返済方法です。返済計画が立てやすいのが特徴です。</p>

      <h3>金利タイプについて</h3>
      <ul class="loan-page__list">
        <li><strong>変動金利</strong>：市場金利に応じて定期的に見直されます。固定金利より低い金利でスタートできることが多いですが、将来の返済額が変動するリスクがあります。</li>
        <li><strong>固定金利</strong>：借入時の金利が返済期間中ずっと適用されます。返済額が変わらないため安心ですが、変動金利よりも高い金利が設定されることが多いです。</li>
      </ul>

      <h3>ご注意</h3>
      <p>このシミュレーションはあくまで概算です。実際の返済額は金融機関やローン商品により異なります。詳しくは当社スタッフまでお気軽にお問い合わせください。</p>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
