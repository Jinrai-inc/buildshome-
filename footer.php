</main><!-- /#main-content -->

<footer class="site-footer">
  <div class="site-footer__inner container">
    <div class="site-footer__grid">
      <!-- Company Info -->
      <div class="site-footer__col">
        <div class="site-footer__logo">
          <span class="site-footer__logo-icon">B</span>
          <span class="site-footer__logo-text">ビルズホーム</span>
        </div>
        <address class="site-footer__address">
          <p>〒214-0001<br>神奈川県川崎市多摩区菅1丁目9-21<br>東和稲田堤第三ビル102</p>
          <p class="site-footer__tel">
            <a href="tel:044-400-0562">TEL: 044-400-0562</a>
          </p>
          <p>FAX: 044-400-0561</p>
        </address>
      </div>

      <!-- Menu Links -->
      <div class="site-footer__col">
        <h3 class="site-footer__heading">メニュー</h3>
        <ul class="site-footer__links">
          <li><a href="<?php echo esc_url(home_url('/property/')); ?>">物件一覧</a></li>
          <li><a href="<?php echo esc_url(home_url('/reason/')); ?>">選ばれる理由</a></li>
          <li><a href="<?php echo esc_url(home_url('/staff/')); ?>">スタッフ</a></li>
          <li><a href="<?php echo esc_url(home_url('/voice/')); ?>">お客様の声</a></li>
          <li><a href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
        </ul>
      </div>

      <!-- Service Links -->
      <div class="site-footer__col">
        <h3 class="site-footer__heading">サービス</h3>
        <ul class="site-footer__links">
          <li><a href="<?php echo esc_url(home_url('/property/')); ?>">不動産売買</a></li>
          <li><a href="<?php echo esc_url(home_url('/loan-simulator/')); ?>">住宅ローン相談</a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/?type=satei')); ?>">売却査定</a></li>
          <li><a href="<?php echo esc_url(home_url('/column/')); ?>">コラム</a></li>
          <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">プライバシーポリシー</a></li>
          <li><a href="<?php echo esc_url(home_url('/sitemap/')); ?>">サイトマップ</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="site-footer__bottom">
    <div class="container">
      <p class="site-footer__license">神奈川県知事免許(1)第32690号 / （公社）神奈川県宅地建物取引業協会</p>
      <p class="site-footer__copyright">&copy; <?php echo date('Y'); ?> 株式会社ビルズホーム All Rights Reserved.</p>
    </div>
  </div>
</footer>

<!-- Floating CTA -->
<div class="floating-cta" id="floating-cta">
  <a href="tel:044-400-0562" class="floating-cta__btn floating-cta__phone" aria-label="電話をかける">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
  </a>
  <a href="#" class="floating-cta__btn floating-cta__line" aria-label="LINEで相談" target="_blank" rel="noopener noreferrer">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63h2.386c.349 0 .63.285.63.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.627-.63.349 0 .631.285.631.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.349 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
  </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
