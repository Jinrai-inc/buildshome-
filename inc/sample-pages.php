<?php
/**
 * テーマ有効化時にサンプル固定ページを自動生成
 * テーマ専用ブロックパターン（HTMLブロック）でコンテンツを挿入
 */

function builds_home_create_sample_pages() {
    if (get_option('bh_sample_pages_created')) return;

    $pages = [
        'reason' => [
            'title' => '選ばれる理由',
            'slug'  => 'reason',
            'template' => 'page-reason.php',
            'content' => '<!-- wp:html -->
<div class="reasons-grid">
  <div class="reason-card js-fade-up">
    <span class="reason-card__number">01</span>
    <h3 class="reason-card__title">地域密着の<br>豊富な物件情報</h3>
    <p class="reason-card__text">川崎市多摩区を中心に、地元ならではのネットワークで豊富な物件情報をご提供。レインズ掲載前の物件もいち早くご紹介いたします。大手には真似できない地域に根差した情報力で、お客様の理想の住まい探しをサポートします。</p>
  </div>
  <div class="reason-card js-fade-up" data-delay="0.1">
    <span class="reason-card__number">02</span>
    <h3 class="reason-card__title">経験豊富な<br>スタッフが対応</h3>
    <p class="reason-card__text">宅地建物取引士の資格を持つスタッフが、物件のご案内からローン相談、契約手続きまで一貫してサポートいたします。初めての不動産取引でも安心してお任せください。住宅ローンの借入可能額の試算や、諸費用の概算など、資金面のご相談にも親身に対応いたします。</p>
  </div>
  <div class="reason-card js-fade-up" data-delay="0.2">
    <span class="reason-card__number">03</span>
    <h3 class="reason-card__title">購入後も安心の<br>アフターサポート</h3>
    <p class="reason-card__text">お引渡し後も住まいに関するご相談を承ります。リフォームや売却のご相談など、末永いお付き合いをお約束します。「当たり前の豊かさを追求し、創造し続ける」これが私たちビルズホームの信念です。</p>
  </div>
</div>
<!-- /wp:html -->',
        ],

        'staff' => [
            'title' => 'スタッフ紹介',
            'slug'  => 'staff',
            'template' => 'page-staff.php',
            'content' => '<!-- wp:paragraph -->
<p>ビルズホームのスタッフは全員が不動産のプロフェッショナル。川崎市多摩区を知り尽くした地元のスペシャリストが、お客様の大切な住まい選びを全力でサポートいたします。</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
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
      <p class="staff-card__desc">川崎市多摩区で生まれ育ち、この街の魅力を知り尽くしています。2024年にビルズホームを設立し「当たり前の豊かさを追求し、創造し続ける」をモットーに、お客様一人ひとりのライフスタイルに合った最適な住まいをご提案しています。趣味はランニングと地元のカフェ巡り。</p>
    </div>
  </div>
  <div class="staff-card js-fade-up" data-delay="0.1">
    <div class="staff-card__photo">
      <div class="staff-card__photo-placeholder">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      </div>
    </div>
    <div class="staff-card__body">
      <h3 class="staff-card__name">スタッフ A</h3>
      <p class="staff-card__role">営業担当</p>
      <p class="staff-card__license">宅地建物取引士</p>
      <p class="staff-card__desc">不動産業界で10年以上の経験を持ち、中古マンション・戸建の売買を数多く手がけてきました。小さなお子様がいるご家族の住まい選びが得意分野です。学校区や公園情報にも詳しいので、何でもご相談ください。</p>
    </div>
  </div>
</div>
<!-- /wp:html -->',
        ],

        'voice' => [
            'title' => 'お客様の声',
            'slug'  => 'voice',
            'template' => 'page-voice.php',
            'content' => '',
        ],

        'company' => [
            'title' => '会社概要',
            'slug'  => 'company',
            'template' => 'page-company.php',
            'content' => '<!-- wp:html -->
<div class="company-mission js-fade-up">
  <blockquote class="company-mission__quote">
    <p>「当たり前の豊かさを追求し、創造し続ける」</p>
  </blockquote>
  <p class="company-mission__text">不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。</p>
</div>
<!-- /wp:html -->

<!-- wp:html -->
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
<!-- /wp:html -->

<!-- wp:heading {"level":2} -->
<h2>アクセス</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>JR南武線「稲田堤駅」より徒歩3分 / 京王相模原線「京王稲田堤駅」より徒歩5分</p>
<!-- /wp:paragraph -->',
        ],

        'message' => [
            'title' => '代表メッセージ',
            'slug'  => 'message',
            'template' => 'page-message.php',
            'content' => '<!-- wp:html -->
<div class="message-layout js-fade-up">
  <div class="message-layout__photo">
    <div class="message-layout__photo-placeholder">
      <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#bbb" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </div>
    <p class="message-layout__name">代表取締役 一ノ瀬 諒</p>
  </div>
  <div class="message-layout__text">
    <p>この度は、株式会社ビルズホームのウェブサイトをご覧いただき、誠にありがとうございます。</p>
    <p>当社は「当たり前の豊かさを追求し、創造し続ける」をミッションに掲げ、2024年に設立いたしました。川崎市多摩区を中心としたエリアで、不動産の売買・仲介事業を展開しております。</p>
    <p>住まいは、人生において最も大きな買い物の一つです。だからこそ、お客様一人ひとりのご希望やライフスタイルに寄り添い、最適な住まいをご提案することを大切にしています。</p>
    <p>私自身、川崎市多摩区で生まれ育ちました。この街の良さ——穏やかな住環境、都心へのアクセスの良さ、多摩川の豊かな自然——を誰よりも理解しているからこそ、地域に根差した提案ができると自負しております。</p>
    <p>大手不動産会社では見落とされがちな「あと一歩の気配り」を大切に、物件探しからローン相談、契約手続き、そしてお引渡し後のアフターフォローまで、一貫したサポートを提供いたします。</p>
    <p>皆様のお住まい探しに、少しでもお力添えできれば幸いです。どうぞお気軽にご相談ください。</p>
    <p><strong>株式会社ビルズホーム<br>代表取締役 一ノ瀬 諒</strong></p>
  </div>
</div>
<!-- /wp:html -->',
        ],

        'contact' => [
            'title' => 'お問い合わせ',
            'slug'  => 'contact',
            'template' => 'page-contact.php',
            'content' => '',
        ],

        'loan-simulator' => [
            'title' => 'ローンシミュレーション',
            'slug'  => 'loan-simulator',
            'template' => 'page-loan.php',
            'content' => '',
        ],

        'privacy-policy' => [
            'title' => 'プライバシーポリシー',
            'slug'  => 'privacy-policy',
            'template' => 'page-privacy.php',
            'content' => '',
        ],
    ];

    $menu_items = [];

    foreach ($pages as $key => $page) {
        $existing = get_page_by_path($page['slug']);
        if ($existing) {
            update_post_meta($existing->ID, '_wp_page_template', $page['template']);
            $menu_items[$key] = $existing->ID;
            continue;
        }

        $post_id = wp_insert_post([
            'post_title'   => $page['title'],
            'post_name'    => $page['slug'],
            'post_content' => $page['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
        ]);

        if ($post_id && !is_wp_error($post_id)) {
            update_post_meta($post_id, '_wp_page_template', $page['template']);
            $menu_items[$key] = $post_id;
        }
    }

    // メインメニューを自動作成
    $menu_name = 'メインメニュー';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
        if (!is_wp_error($menu_id)) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'  => '物件一覧',
                'menu-item-url'    => home_url('/property/'),
                'menu-item-status' => 'publish',
                'menu-item-type'   => 'custom',
            ]);

            $nav_pages = [
                'reason'  => '選ばれる理由',
                'staff'   => 'スタッフ',
                'voice'   => 'お客様の声',
                'company' => '会社概要',
            ];
            foreach ($nav_pages as $key => $label) {
                if (isset($menu_items[$key])) {
                    wp_update_nav_menu_item($menu_id, 0, [
                        'menu-item-title'     => $label,
                        'menu-item-object-id' => $menu_items[$key],
                        'menu-item-object'    => 'page',
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                    ]);
                }
            }

            if (isset($menu_items['contact'])) {
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'     => 'お問い合わせ',
                    'menu-item-object-id' => $menu_items['contact'],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-classes'   => 'menu-cta',
                ]);
            }

            $locations = get_theme_mod('nav_menu_locations', []);
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    update_option('bh_sample_pages_created', true);
}
add_action('after_switch_theme', 'builds_home_create_sample_pages');

function builds_home_admin_init_sample_pages() {
    if (!get_option('bh_sample_pages_created') && current_user_can('manage_options')) {
        builds_home_create_sample_pages();
    }
}
add_action('admin_init', 'builds_home_admin_init_sample_pages');
