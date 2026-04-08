<?php
/**
 * テーマ有効化時にサンプル固定ページを自動生成
 */

function builds_home_create_sample_pages() {
    // 既に実行済みならスキップ
    if (get_option('bh_sample_pages_created')) return;

    $pages = [
        'reason' => [
            'title' => '選ばれる理由',
            'slug'  => 'reason',
            'template' => 'page-reason.php',
            'content' => '<!-- wp:heading {"level":2} -->
<h2>ビルズホームが選ばれる3つの理由</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>01 地域密着の豊富な物件情報</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>川崎市多摩区を中心に、地元ならではのネットワークで豊富な物件情報をご提供しています。レインズ掲載前の物件もいち早くご紹介可能です。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>大手不動産会社には真似できない、地域に根差した情報力で、お客様の理想の住まい探しをサポートします。稲田堤駅・京王よみうりランド駅周辺はもちろん、多摩区全域の物件をカバーしています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>02 経験豊富なスタッフが対応</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>宅地建物取引士の資格を持つスタッフが、物件のご案内からローン相談、契約手続きまで一貫してサポートいたします。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>初めての不動産取引でも安心してお任せください。住宅ローンの借入可能額の試算や、諸費用の概算など、資金面のご相談にも親身に対応いたします。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>03 購入後も安心のアフターサポート</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>お引渡し後も住まいに関するご相談を承ります。リフォームや売却のご相談など、末永いお付き合いをお約束します。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>「当たり前の豊かさを追求し、創造し続ける」——これが私たちビルズホームの信念です。不動産を通じて、お客様の人生に寄り添い続けます。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->',
        ],

        'staff' => [
            'title' => 'スタッフ紹介',
            'slug'  => 'staff',
            'template' => 'page-staff.php',
            'content' => '<!-- wp:heading {"level":2} -->
<h2>私たちがお手伝いします</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>ビルズホームのスタッフは全員が不動産のプロフェッショナル。川崎市多摩区を知り尽くした地元のスペシャリストが、お客様の大切な住まい選びを全力でサポートいたします。</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>一ノ瀬 諒</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><strong>代表取締役 / 宅地建物取引士</strong></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>川崎市多摩区で生まれ育ち、この街の魅力を知り尽くしています。2024年にビルズホームを設立し、「当たり前の豊かさを追求し、創造し続ける」をモットーに、お客様一人ひとりのライフスタイルに合った最適な住まいをご提案しています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>趣味はランニングと地元のカフェ巡り。休日は多摩川沿いを走っています。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>スタッフ A</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><strong>営業担当 / 宅地建物取引士</strong></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>不動産業界で10年以上の経験を持ち、中古マンション・戸建の売買を数多く手がけてきました。物件のご案内からローン相談まで、お客様に寄り添ったサポートを心がけています。</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p>小さなお子様がいるご家族の住まい選びが得意分野です。学校区や公園情報にも詳しいので、何でもご相談ください。</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->',
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
            'content' => '<!-- wp:heading {"level":2,"textAlign":"center"} -->
<h2 class="has-text-align-center">当たり前の豊かさを追求し、創造し続ける</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:table -->
<figure class="wp-block-table"><table><tbody>
<tr><th>会社名</th><td>株式会社ビルズホーム</td></tr>
<tr><th>代表取締役</th><td>一ノ瀬 諒</td></tr>
<tr><th>所在地</th><td>〒214-0001 神奈川県川崎市多摩区菅1丁目9-21 東和稲田堤第三ビル102</td></tr>
<tr><th>TEL</th><td>044-400-0562</td></tr>
<tr><th>FAX</th><td>044-400-0561</td></tr>
<tr><th>E-mail</th><td>info@builds-home.com</td></tr>
<tr><th>設立</th><td>2024年6月12日</td></tr>
<tr><th>資本金</th><td>250万円</td></tr>
<tr><th>事業内容</th><td>不動産の取得、売買、管理及び仲介事業</td></tr>
<tr><th>免許番号</th><td>神奈川県知事免許(1)第32690号</td></tr>
<tr><th>加盟団体</th><td>（公社）神奈川県宅地建物取引業協会</td></tr>
</tbody></table></figure>
<!-- /wp:table -->

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
            'content' => '<!-- wp:heading {"level":2} -->
<h2>ご挨拶</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>この度は、株式会社ビルズホームのウェブサイトをご覧いただき、誠にありがとうございます。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>当社は「当たり前の豊かさを追求し、創造し続ける」をミッションに掲げ、2024年に設立いたしました。川崎市多摩区を中心としたエリアで、不動産の売買・仲介事業を展開しております。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>住まいは、人生において最も大きな買い物の一つです。だからこそ、お客様一人ひとりのご希望やライフスタイルに寄り添い、最適な住まいをご提案することを大切にしています。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>私自身、川崎市多摩区で生まれ育ちました。この街の良さ——穏やかな住環境、都心へのアクセスの良さ、多摩川の豊かな自然——を誰よりも理解しているからこそ、地域に根差した提案ができると自負しております。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>大手不動産会社では見落とされがちな「あと一歩の気配り」を大切に、物件探しからローン相談、契約手続き、そしてお引渡し後のアフターフォローまで、一貫したサポートを提供いたします。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>皆様のお住まい探しに、少しでもお力添えできれば幸いです。どうぞお気軽にご相談ください。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>株式会社ビルズホーム<br>代表取締役 一ノ瀬 諒</strong></p>
<!-- /wp:paragraph -->',
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
        // 同じスラッグのページが既にあればスキップ
        $existing = get_page_by_path($page['slug']);
        if ($existing) {
            // テンプレートだけ設定
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
            // 物件一覧（カスタムリンク）
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'  => '物件一覧',
                'menu-item-url'    => home_url('/property/'),
                'menu-item-status' => 'publish',
                'menu-item-type'   => 'custom',
            ]);

            // 固定ページメニュー項目
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

            // お問い合わせ
            if (isset($menu_items['contact'])) {
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'     => 'お問い合わせ',
                    'menu-item-object-id' => $menu_items['contact'],
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-classes'   => ['menu-cta'],
                ]);
            }

            // メニューをロケーションに割り当て
            $locations = get_theme_mod('nav_menu_locations', []);
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    update_option('bh_sample_pages_created', true);
}
add_action('after_switch_theme', 'builds_home_create_sample_pages');

// 管理画面からも手動実行できるようにする
function builds_home_admin_init_sample_pages() {
    if (!get_option('bh_sample_pages_created') && current_user_can('manage_options')) {
        builds_home_create_sample_pages();
    }
}
add_action('admin_init', 'builds_home_admin_init_sample_pages');
