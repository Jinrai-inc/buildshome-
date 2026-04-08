<?php
/**
 * Template Name: プライバシーポリシー
 */
get_header();
?>

<div class="page-header">
  <div class="container">
    <div class="section-title page-header__title">
      <span class="section-title__en">Privacy Policy</span>
      <span class="section-title__ja">プライバシーポリシー</span>
    </div>
  </div>
</div>

<?php builds_home_breadcrumb(); ?>

<section class="section section--white">
  <div class="container">
    <div class="privacy-content">
      <?php if (get_the_content()) : ?>
        <?php the_content(); ?>
      <?php else : ?>
        <p>株式会社ビルズホーム（以下「当社」）は、お客様の個人情報の保護を重要な責務と認識し、以下のとおりプライバシーポリシーを定めます。</p>

        <h2>1. 個人情報の取得</h2>
        <p>当社は、お問い合わせフォーム、電話、メール等を通じて、お名前、ご住所、電話番号、メールアドレス等の個人情報を取得することがあります。</p>

        <h2>2. 個人情報の利用目的</h2>
        <ul>
          <li>不動産物件のご紹介・ご案内</li>
          <li>お問い合わせへの回答</li>
          <li>不動産取引に関する契約手続き</li>
          <li>当社サービスに関するご連絡・ご案内</li>
          <li>アフターサービスの提供</li>
        </ul>

        <h2>3. 個人情報の第三者提供</h2>
        <p>当社は、法令に基づく場合を除き、お客様の同意なく個人情報を第三者に提供いたしません。ただし、不動産取引の遂行に必要な範囲で、金融機関、司法書士等の関係者に提供する場合があります。</p>

        <h2>4. 個人情報の管理</h2>
        <p>当社は、個人情報の漏洩、滅失、毀損の防止のため、適切なセキュリティ対策を講じます。</p>

        <h2>5. 個人情報の開示・訂正・削除</h2>
        <p>お客様ご本人から個人情報の開示・訂正・削除のご請求があった場合は、本人確認の上、速やかに対応いたします。</p>

        <h2>6. Cookie等の使用</h2>
        <p>当社ウェブサイトでは、利便性向上のためCookieを使用することがあります。ブラウザの設定によりCookieの受け入れを拒否することが可能です。</p>

        <h2>7. お問い合わせ窓口</h2>
        <p>個人情報に関するお問い合わせは、下記までご連絡ください。</p>
        <p>
          株式会社ビルズホーム<br>
          〒214-0001 神奈川県川崎市多摩区菅1丁目9-21 東和稲田堤第三ビル102<br>
          TEL: 044-400-0562<br>
          E-mail: info@builds-home.com
        </p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
