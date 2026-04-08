<?php
/**
 * Template Name: お問い合わせ
 */
get_header();

// 物件パラメータから物件名を取得
$property_name = '';
if (!empty($_GET['property'])) {
    $prop_id = intval($_GET['property']);
    $prop_post = get_post($prop_id);
    if ($prop_post && $prop_post->post_type === 'property') {
        $property_name = $prop_post->post_title;
    }
}
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Contact</span>
      <span class="section-title__ja">お問い合わせ</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <div class="contact-intro js-fade-up">
      <p>物件のご相談・売却査定・その他お気軽にお問い合わせください。<br>
      下記フォームにご入力の上、送信してください。担当者より折り返しご連絡いたします。</p>
    </div>

    <div class="contact-form js-fade-up">
      <?php
      // Contact Form 7 shortcode
      if (function_exists('wpcf7_contact_form_tag_func')) {
          echo do_shortcode('[contact-form-7 title="お問い合わせ"]');
      } else {
          // Fallback form
      ?>
        <form method="post" class="contact-form__fallback">
          <div class="form-group">
            <label for="contact-name">お名前 <span class="required">*</span></label>
            <input type="text" id="contact-name" name="name" required>
          </div>
          <div class="form-group">
            <label for="contact-email">メールアドレス <span class="required">*</span></label>
            <input type="email" id="contact-email" name="email" required>
          </div>
          <div class="form-group">
            <label for="contact-tel">電話番号</label>
            <input type="tel" id="contact-tel" name="tel">
          </div>
          <div class="form-group">
            <label for="contact-type">お問い合わせ種別</label>
            <select id="contact-type" name="type">
              <option value="">選択してください</option>
              <option value="物件相談">物件相談</option>
              <option value="売却査定">売却査定</option>
              <option value="ローン相談">ローン相談</option>
              <option value="その他">その他</option>
            </select>
          </div>
          <?php if ($property_name) : ?>
            <div class="form-group">
              <label for="contact-property">お問い合わせ物件</label>
              <input type="text" id="contact-property" name="property" value="<?php echo esc_attr($property_name); ?>" readonly>
            </div>
          <?php endif; ?>
          <div class="form-group">
            <label for="contact-message">お問い合わせ内容</label>
            <textarea id="contact-message" name="message" rows="6"><?php echo $property_name ? 'お問い合わせ物件：' . esc_textarea($property_name) . "\n" : ''; ?></textarea>
          </div>
          <div class="form-privacy">
            <p><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" target="_blank">プライバシーポリシー</a>に同意の上、送信してください。</p>
          </div>
          <div class="form-group" style="text-align:center;">
            <button type="submit" class="btn btn--primary btn--lg">送信する</button>
          </div>
        </form>
      <?php } ?>
    </div>

    <div class="contact-info js-fade-up">
      <div class="contact-info__grid">
        <div class="contact-info__item">
          <h3>お電話でのお問い合わせ</h3>
          <a href="tel:044-400-0562" class="contact-info__tel">044-400-0562</a>
          <p>営業時間: 10:00〜19:00（水曜定休）</p>
        </div>
        <div class="contact-info__item">
          <h3>メールでのお問い合わせ</h3>
          <a href="mailto:info@builds-home.com" class="contact-info__email">info@builds-home.com</a>
          <p>24時間受付・2営業日以内にご返信</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
