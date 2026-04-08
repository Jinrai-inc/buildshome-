<?php
/**
 * Template Name: 会社概要
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Company</span>
      <span class="section-title__ja">会社概要</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <!-- Mission -->
    <div class="company-mission js-fade-up">
      <blockquote class="company-mission__quote">
        <p>「当たり前の豊かさを追求し、創造し続ける」</p>
      </blockquote>
      <p class="company-mission__text">不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。</p>
    </div>

    <!-- Company Info Table -->
    <div class="company-table js-fade-up">
      <dl class="company-table__dl">
        <div class="company-table__row">
          <dt>会社名</dt>
          <dd>株式会社ビルズホーム</dd>
        </div>
        <div class="company-table__row">
          <dt>代表取締役</dt>
          <dd>一ノ瀬 諒</dd>
        </div>
        <div class="company-table__row">
          <dt>所在地</dt>
          <dd>〒214-0001 神奈川県川崎市多摩区菅1丁目9-21 東和稲田堤第三ビル102</dd>
        </div>
        <div class="company-table__row">
          <dt>TEL</dt>
          <dd><a href="tel:044-400-0562">044-400-0562</a></dd>
        </div>
        <div class="company-table__row">
          <dt>FAX</dt>
          <dd>044-400-0561</dd>
        </div>
        <div class="company-table__row">
          <dt>E-mail</dt>
          <dd><a href="mailto:info@builds-home.com">info@builds-home.com</a></dd>
        </div>
        <div class="company-table__row">
          <dt>設立</dt>
          <dd>2024年6月12日</dd>
        </div>
        <div class="company-table__row">
          <dt>資本金</dt>
          <dd>250万円</dd>
        </div>
        <div class="company-table__row">
          <dt>事業内容</dt>
          <dd>不動産の取得、売買、管理及び仲介事業</dd>
        </div>
        <div class="company-table__row">
          <dt>免許番号</dt>
          <dd>神奈川県知事免許(1)第32690号</dd>
        </div>
        <div class="company-table__row">
          <dt>加盟団体</dt>
          <dd>（公社）神奈川県宅地建物取引業協会</dd>
        </div>
      </dl>
    </div>

    <!-- Google Map -->
    <div class="company-map js-fade-up">
      <h2 class="property-detail__section-title">アクセス</h2>
      <div class="company-map__wrap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3243.5!2d139.45!3d35.63!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z5bed5bSO5biC5aSa5pGp5Yy66I-F!5e0!3m2!1sja!2sjp!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
