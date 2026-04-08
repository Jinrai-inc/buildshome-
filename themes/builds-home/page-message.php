<?php
/**
 * Template Name: 代表メッセージ
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Message</span>
      <span class="section-title__ja">代表メッセージ</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <div class="message-layout js-fade-up">
      <div class="message-layout__photo">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large', ['loading' => 'lazy']); ?>
        <?php else : ?>
          <div class="message-layout__photo-placeholder">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
        <?php endif; ?>
        <p class="message-layout__name">代表取締役 一ノ瀬 諒</p>
      </div>
      <div class="message-layout__text">
        <?php if (get_the_content()) : ?>
          <?php the_content(); ?>
        <?php else : ?>
          <p>この度は、株式会社ビルズホームのウェブサイトをご覧いただき、誠にありがとうございます。</p>
          <p>当社は「当たり前の豊かさを追求し、創造し続ける」をミッションに掲げ、2024年に設立いたしました。川崎市多摩区を中心としたエリアで、不動産の売買・仲介事業を展開しております。</p>
          <p>住まいは、人生において最も大きな買い物の一つです。だからこそ、お客様一人ひとりのご希望やライフスタイルに寄り添い、最適な住まいをご提案することを大切にしています。</p>
          <p>地域に密着したネットワークと、経験豊富なスタッフの知識を活かし、物件探しからローン相談、契約手続き、そしてお引渡し後のアフターフォローまで、一貫したサポートを提供いたします。</p>
          <p>皆様のお住まい探しに、少しでもお力添えできれば幸いです。お気軽にご相談ください。</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
