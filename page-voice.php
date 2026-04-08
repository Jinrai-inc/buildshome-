<?php
/**
 * Template Name: お客様の声
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Voice</span>
      <span class="section-title__ja">お客様の声</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <?php
    // サンプルデータ（投稿がない場合のフォールバック）
    $sample_voices = [
        ['name' => 'T.S 様', 'type' => '中古マンション購入', 'area' => '川崎市多摩区', 'rating' => 5,
         'comment' => '初めての不動産購入で不安でしたが、物件探しから契約まで丁寧にサポートしていただきました。地元の情報にも詳しく、周辺環境のことまで教えていただけたのがとても心強かったです。'],
        ['name' => 'M.K 様', 'type' => '新築戸建購入', 'area' => '川崎市高津区', 'rating' => 5,
         'comment' => '子どもの学校区を考慮した物件を複数ご提案いただき、理想の住まいに出会えました。住宅ローンの相談にも親身に対応してくださり、安心して購入を決断できました。'],
        ['name' => 'A.Y 様', 'type' => '中古戸建購入', 'area' => '稲城市', 'rating' => 4,
         'comment' => '予算内で希望エリアの物件を見つけるのは難しいと思っていましたが、レインズに掲載される前の物件を紹介していただき驚きました。地域密着ならではの強みだと感じました。'],
        ['name' => 'S.N 様', 'type' => '土地購入', 'area' => '川崎市宮前区', 'rating' => 5,
         'comment' => '注文住宅用の土地を探していましたが、なかなか条件に合う物件が見つからず困っていたところ、ビルズホームさんに相談しました。2週間ほどで希望通りの土地を紹介していただき感謝しています。'],
        ['name' => 'K.H 様', 'type' => '中古マンション購入', 'area' => '調布市', 'rating' => 5,
         'comment' => 'リフォーム済みの物件を中心に探していただき、内覧の際には改修箇所を詳しく説明してくれました。引渡し後のアフターフォローも丁寧で、信頼できる不動産会社です。'],
    ];

    // voice投稿タイプから取得
    $voice_posts = get_posts([
        'post_type'      => 'voice',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);
    $has_voice = !empty($voice_posts);
    ?>

    <div class="voice-list">
      <?php if ($has_voice) :
          foreach ($voice_posts as $vp) : ?>
            <div class="voice-card voice-card--full js-fade-up">
              <div class="voice-card__header">
                <div class="voice-card__stars">
                  <?php $rating = get_post_meta($vp->ID, 'voice_rating', true) ?: 5;
                  for ($i = 0; $i < 5; $i++) : ?>
                    <span class="voice-card__star <?php echo $i < $rating ? 'is-active' : ''; ?>">&#9733;</span>
                  <?php endfor; ?>
                </div>
                <div class="voice-card__meta">
                  <span class="voice-card__name"><?php echo esc_html(get_post_meta($vp->ID, 'voice_customer_name', true)); ?></span>
                  <?php $vtype = get_post_meta($vp->ID, 'voice_transaction_type', true); if ($vtype) : ?>
                    <span class="voice-card__type"><?php echo esc_html($vtype); ?></span>
                  <?php endif; ?>
                  <?php $varea = get_post_meta($vp->ID, 'voice_area', true); if ($varea) : ?>
                    <span class="voice-card__area"><?php echo esc_html($varea); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <p class="voice-card__comment"><?php echo esc_html(wp_strip_all_tags($vp->post_content)); ?></p>
            </div>
      <?php endforeach;
      else :
          foreach ($sample_voices as $voice) : ?>
            <div class="voice-card voice-card--full js-fade-up">
              <div class="voice-card__header">
                <div class="voice-card__stars">
                  <?php for ($i = 0; $i < 5; $i++) : ?>
                    <span class="voice-card__star <?php echo $i < $voice['rating'] ? 'is-active' : ''; ?>">&#9733;</span>
                  <?php endfor; ?>
                </div>
                <div class="voice-card__meta">
                  <span class="voice-card__name"><?php echo esc_html($voice['name']); ?></span>
                  <span class="voice-card__type"><?php echo esc_html($voice['type']); ?></span>
                  <span class="voice-card__area"><?php echo esc_html($voice['area']); ?></span>
                </div>
              </div>
              <p class="voice-card__comment"><?php echo esc_html($voice['comment']); ?></p>
            </div>
      <?php endforeach;
      endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
