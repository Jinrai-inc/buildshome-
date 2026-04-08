<?php
/**
 * テーマ専用ブロックパターン登録
 * エディタの「パターン」から「Builds Home」カテゴリで挿入可能
 */

function builds_home_register_block_patterns() {
    // パターンカテゴリ登録
    register_block_pattern_category('builds-home', [
        'label' => 'Builds Home',
    ]);

    // ========================================
    // 選ばれる理由カード（3カラム）
    // ========================================
    register_block_pattern('builds-home/reason-cards', [
        'title'       => '選ばれる理由（3カラム）',
        'description' => 'ナンバー付きの理由カード3つ。テーマデザインに最適化。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
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
<!-- /wp:html -->',
    ]);

    // ========================================
    // 理由カード（単体）
    // ========================================
    register_block_pattern('builds-home/reason-card-single', [
        'title'       => '理由カード（1枚）',
        'description' => '追加用の理由カード。数字・タイトル・説明を編集できます。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="reason-card js-fade-up">
  <span class="reason-card__number">04</span>
  <h3 class="reason-card__title">タイトルを入力</h3>
  <p class="reason-card__text">説明文を入力してください。このカードはテーマのデザインが自動適用されます。</p>
</div>
<!-- /wp:html -->',
    ]);

    // ========================================
    // スタッフカード（1名）
    // ========================================
    register_block_pattern('builds-home/staff-card', [
        'title'       => 'スタッフカード',
        'description' => 'スタッフ紹介カード。写真・名前・役職・資格・紹介文。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="staff-card js-fade-up">
  <div class="staff-card__photo">
    <div class="staff-card__photo-placeholder">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </div>
  </div>
  <div class="staff-card__body">
    <h3 class="staff-card__name">スタッフ名</h3>
    <p class="staff-card__role">役職</p>
    <p class="staff-card__license">宅地建物取引士</p>
    <p class="staff-card__desc">自己紹介文をここに入力してください。</p>
  </div>
</div>
<!-- /wp:html -->',
    ]);

    // ========================================
    // スタッフ紹介グリッド（2名サンプル）
    // ========================================
    register_block_pattern('builds-home/staff-grid', [
        'title'       => 'スタッフ紹介グリッド',
        'description' => '複数スタッフのグリッドレイアウト。カードを追加・削除できます。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="staff-grid">
  <div class="staff-card js-fade-up">
    <div class="staff-card__photo">
      <div class="staff-card__photo-placeholder">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </div>
    </div>
    <div class="staff-card__body">
      <h3 class="staff-card__name">一ノ瀬 諒</h3>
      <p class="staff-card__role">代表取締役</p>
      <p class="staff-card__license">宅地建物取引士</p>
      <p class="staff-card__desc">川崎市多摩区で生まれ育ち、この街の魅力を知り尽くしています。お客様一人ひとりのライフスタイルに合った最適な住まいをご提案いたします。</p>
    </div>
  </div>
  <div class="staff-card js-fade-up" data-delay="0.1">
    <div class="staff-card__photo">
      <div class="staff-card__photo-placeholder">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </div>
    </div>
    <div class="staff-card__body">
      <h3 class="staff-card__name">スタッフ名</h3>
      <p class="staff-card__role">営業担当</p>
      <p class="staff-card__license">宅地建物取引士</p>
      <p class="staff-card__desc">物件のご案内からローン相談まで、お客様に寄り添ったサポートを心がけています。お気軽にご相談ください。</p>
    </div>
  </div>
</div>
<!-- /wp:html -->',
    ]);

    // ========================================
    // 会社概要テーブル
    // ========================================
    register_block_pattern('builds-home/company-table', [
        'title'       => '会社概要テーブル',
        'description' => 'テーマデザインの会社情報テーブル。項目の追加・編集が可能。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
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
<!-- /wp:html -->',
    ]);

    // ========================================
    // ミッションブロック（引用風）
    // ========================================
    register_block_pattern('builds-home/mission-block', [
        'title'       => 'ミッション・理念ブロック',
        'description' => '中央揃えの引用スタイル。企業理念やコンセプトの表示に。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="company-mission js-fade-up">
  <blockquote class="company-mission__quote">
    <p>「当たり前の豊かさを追求し、創造し続ける」</p>
  </blockquote>
  <p class="company-mission__text">不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。</p>
</div>
<!-- /wp:html -->',
    ]);

    // ========================================
    // 代表メッセージ（写真+テキスト 2カラム）
    // ========================================
    register_block_pattern('builds-home/message-layout', [
        'title'       => '代表メッセージレイアウト',
        'description' => '左に写真、右にメッセージの2カラムレイアウト。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="message-layout js-fade-up">
  <div class="message-layout__photo">
    <div class="message-layout__photo-placeholder">
      <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </div>
    <p class="message-layout__name">代表取締役 一ノ瀬 諒</p>
  </div>
  <div class="message-layout__text">
    <p>この度は、株式会社ビルズホームのウェブサイトをご覧いただき、誠にありがとうございます。</p>
    <p>当社は「当たり前の豊かさを追求し、創造し続ける」をミッションに掲げ、2024年に設立いたしました。</p>
    <p>皆様のお住まい探しに、少しでもお力添えできれば幸いです。お気軽にご相談ください。</p>
  </div>
</div>
<!-- /wp:html -->',
    ]);

    // ========================================
    // CTAバナー
    // ========================================
    register_block_pattern('builds-home/cta-banner', [
        'title'       => 'お問い合わせCTAバナー',
        'description' => 'ダークカラーの問い合わせ誘導バナー。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<section class="cta-banner js-fade-up">
  <div class="container">
    <p class="cta-banner__text">物件のご相談・売却査定・その他お気軽にお問い合わせください</p>
    <a href="/contact/" class="btn btn--primary btn--lg">お問い合わせはこちら</a>
  </div>
</section>
<!-- /wp:html -->',
    ]);

    // ========================================
    // セクションタイトル
    // ========================================
    register_block_pattern('builds-home/section-title', [
        'title'       => 'セクションタイトル',
        'description' => '英語ラベル+日本語タイトルのセクション見出し。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="section-title js-fade-up">
  <span class="section-title__en">English Label</span>
  <span class="section-title__ja">日本語タイトル</span>
</div>
<!-- /wp:html -->',
    ]);

    // ========================================
    // お客様の声カード
    // ========================================
    register_block_pattern('builds-home/voice-card', [
        'title'       => 'お客様の声カード',
        'description' => '星評価+コメント+お客様情報のカード。',
        'categories'  => ['builds-home'],
        'content'     => '<!-- wp:html -->
<div class="voice-card voice-card--full js-fade-up">
  <div class="voice-card__header">
    <div class="voice-card__stars">
      <span class="voice-card__star is-active">&#9733;</span>
      <span class="voice-card__star is-active">&#9733;</span>
      <span class="voice-card__star is-active">&#9733;</span>
      <span class="voice-card__star is-active">&#9733;</span>
      <span class="voice-card__star is-active">&#9733;</span>
    </div>
    <div class="voice-card__meta">
      <span class="voice-card__name">T.S 様</span>
      <span class="voice-card__type">中古マンション購入</span>
      <span class="voice-card__area">川崎市多摩区</span>
    </div>
  </div>
  <p class="voice-card__comment">お客様のコメントをここに入力してください。</p>
</div>
<!-- /wp:html -->',
    ]);
}
add_action('init', 'builds_home_register_block_patterns');
