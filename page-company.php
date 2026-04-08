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
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php if (trim(get_the_content())) : ?>
        <div class="entry-content js-fade-up">
          <?php the_content(); ?>
        </div>
      <?php else : ?>
        <!-- デフォルト表示（本文が空の場合） -->
        <div class="company-mission js-fade-up">
          <blockquote class="company-mission__quote">
            <p>「当たり前の豊かさを追求し、創造し続ける」</p>
          </blockquote>
          <p class="company-mission__text">不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。</p>
        </div>

        <div class="company-table js-fade-up">
          <dl class="company-table__dl">
            <div class="company-table__row"><dt>会社名</dt><dd>株式会社ビルズホーム</dd></div>
            <div class="company-table__row"><dt>代表取締役</dt><dd>一ノ瀬 諒</dd></div>
            <div class="company-table__row"><dt>所在地</dt><dd>〒214-0001 神奈川県川崎市多摩区菅1丁目9-21 東和稲田堤第三ビル102</dd></div>
            <div class="company-table__row"><dt>TEL</dt><dd><a href="tel:044-400-0562">044-400-0562</a></dd></div>
            <div class="company-table__row"><dt>FAX</dt><dd>044-400-0561</dd></div>
            <div class="company-table__row"><dt>E-mail</dt><dd><a href="mailto:info@builds-home.com">info@builds-home.com</a></dd></div>
            <div class="company-table__row"><dt>設立</dt><dd>2024年6月12日</dd></div>
            <div class="company-table__row"><dt>資本金</dt><dd>250万円</dd></div>
            <div class="company-table__row"><dt>事業内容</dt><dd>不動産の取得、売買、管理及び仲介事業</dd></div>
            <div class="company-table__row"><dt>免許番号</dt><dd>神奈川県知事免許(1)第32690号</dd></div>
            <div class="company-table__row"><dt>加盟団体</dt><dd>（公社）神奈川県宅地建物取引業協会</dd></div>
          </dl>
        </div>
      <?php endif; ?>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
