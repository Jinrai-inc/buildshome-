<?php
/**
 * Template Name: 選ばれる理由
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Reason</span>
      <span class="section-title__ja">選ばれる理由</span>
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
        <div class="reasons-grid">
          <div class="reason-card js-fade-up">
            <span class="reason-card__number">01</span>
            <h3 class="reason-card__title">地域密着の<br>豊富な物件情報</h3>
            <p class="reason-card__text">川崎市多摩区を中心に、地元ならではのネットワークで豊富な物件情報をご提供。レインズ掲載前の物件もいち早くご紹介いたします。大手には真似できない地域に根差した情報力で、お客様の理想の住まい探しをサポートします。</p>
          </div>
          <div class="reason-card js-fade-up" data-delay="0.1">
            <span class="reason-card__number">02</span>
            <h3 class="reason-card__title">経験豊富な<br>スタッフが対応</h3>
            <p class="reason-card__text">宅地建物取引士の資格を持つスタッフが、物件のご案内からローン相談、契約手続きまで一貫してサポートいたします。初めての不動産取引でも安心してお任せください。</p>
          </div>
          <div class="reason-card js-fade-up" data-delay="0.2">
            <span class="reason-card__number">03</span>
            <h3 class="reason-card__title">購入後も安心の<br>アフターサポート</h3>
            <p class="reason-card__text">お引渡し後も住まいに関するご相談を承ります。リフォームや売却のご相談など、末永いお付き合いをお約束します。「当たり前の豊かさを追求し、創造し続ける」これが私たちの信念です。</p>
          </div>
        </div>
      <?php endif; ?>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
