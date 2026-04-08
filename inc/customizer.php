<?php
/**
 * WordPress カスタマイザー設定
 * ACF PRO なしでもトップページを管理画面から編集可能にする
 */

function builds_home_customize_register($wp_customize) {

    // ========================================
    // パネル: トップページ設定
    // ========================================
    $wp_customize->add_panel('bh_front_page', [
        'title'    => 'トップページ設定',
        'priority' => 30,
    ]);

    // ----------------------------------------
    // セクション: ヒーロー
    // ----------------------------------------
    $wp_customize->add_section('bh_hero', [
        'title' => 'ヒーローセクション',
        'panel' => 'bh_front_page',
    ]);

    // 背景タイプ
    $wp_customize->add_setting('bh_hero_bg_type', ['default' => 'gradient', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_hero_bg_type', [
        'label'   => '背景タイプ',
        'section' => 'bh_hero',
        'type'    => 'select',
        'choices' => ['gradient' => 'グラデーション', 'image' => '画像'],
    ]);

    // 背景画像
    $wp_customize->add_setting('bh_hero_bg_image', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bh_hero_bg_image', [
        'label'   => '背景画像',
        'section' => 'bh_hero',
        'description' => '推奨: 1920x1080px以上。暗いオーバーレイが自動適用されます。',
    ]));

    // オーバーレイ濃度
    $wp_customize->add_setting('bh_hero_overlay', ['default' => 55, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('bh_hero_overlay', [
        'label'       => 'オーバーレイ濃度（%）',
        'section'     => 'bh_hero',
        'type'        => 'range',
        'input_attrs' => ['min' => 0, 'max' => 100, 'step' => 5],
        'description' => '0=透明 / 100=真っ黒',
    ]);

    // サブタイトル
    $wp_customize->add_setting('bh_hero_subtitle', ['default' => 'Builds Home — 川崎・多摩エリアの不動産', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_hero_subtitle', [
        'label'   => 'サブタイトル',
        'section' => 'bh_hero',
        'type'    => 'text',
    ]);

    // メインコピー
    $wp_customize->add_setting('bh_hero_title', ['default' => "当たり前の豊かさを追求し、\n創造し続ける", 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('bh_hero_title', [
        'label'   => 'メインコピー',
        'section' => 'bh_hero',
        'type'    => 'textarea',
        'description' => '改行はそのまま反映されます。',
    ]);

    // 説明文
    $wp_customize->add_setting('bh_hero_desc', ['default' => '不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。', 'sanitize_callback' => 'sanitize_textarea_field']);
    $wp_customize->add_control('bh_hero_desc', [
        'label'   => '説明文',
        'section' => 'bh_hero',
        'type'    => 'textarea',
    ]);

    // CTA1
    $wp_customize->add_setting('bh_hero_cta1_text', ['default' => '物件を探す', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_hero_cta1_text', [
        'label'   => 'ボタン1 テキスト',
        'section' => 'bh_hero',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('bh_hero_cta1_url', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('bh_hero_cta1_url', [
        'label'   => 'ボタン1 リンク先',
        'section' => 'bh_hero',
        'type'    => 'url',
        'description' => '空欄 → /property/',
    ]);

    // CTA2
    $wp_customize->add_setting('bh_hero_cta2_text', ['default' => 'ご相談はこちら', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_hero_cta2_text', [
        'label'   => 'ボタン2 テキスト',
        'section' => 'bh_hero',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('bh_hero_cta2_url', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('bh_hero_cta2_url', [
        'label'   => 'ボタン2 リンク先',
        'section' => 'bh_hero',
        'type'    => 'url',
        'description' => '空欄 → /contact/',
    ]);

    // ----------------------------------------
    // セクション: 表示 ON/OFF
    // ----------------------------------------
    $wp_customize->add_section('bh_sections_toggle', [
        'title' => 'セクション表示切替',
        'panel' => 'bh_front_page',
    ]);

    $sections_list = [
        'property' => '新着・おすすめ物件',
        'reason'   => '選ばれる理由',
        'loan'     => 'ローンシミュレーション',
        'voice'    => 'お客様の声',
        'column'   => 'コラム最新記事',
        'cta'      => 'お問い合わせCTA',
    ];
    foreach ($sections_list as $key => $label) {
        $wp_customize->add_setting("bh_show_{$key}", ['default' => true, 'sanitize_callback' => 'builds_home_sanitize_bool']);
        $wp_customize->add_control("bh_show_{$key}", [
            'label'   => $label,
            'section' => 'bh_sections_toggle',
            'type'    => 'checkbox',
        ]);
    }

    // ----------------------------------------
    // セクション: 選ばれる理由 (3つ)
    // ----------------------------------------
    $wp_customize->add_section('bh_reasons', [
        'title'       => '選ばれる理由',
        'panel'       => 'bh_front_page',
        'description' => '空欄の場合はデフォルトテキストが表示されます。',
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("bh_reason_{$i}_title", ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("bh_reason_{$i}_title", [
            'label'   => "理由{$i}: タイトル",
            'section' => 'bh_reasons',
            'type'    => 'textarea',
        ]);
        $wp_customize->add_setting("bh_reason_{$i}_text", ['default' => '', 'sanitize_callback' => 'sanitize_textarea_field']);
        $wp_customize->add_control("bh_reason_{$i}_text", [
            'label'   => "理由{$i}: 説明文",
            'section' => 'bh_reasons',
            'type'    => 'textarea',
        ]);
        $wp_customize->add_setting("bh_reason_{$i}_icon", ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "bh_reason_{$i}_icon", [
            'label'   => "理由{$i}: アイコン画像（任意）",
            'section' => 'bh_reasons',
        ]));
    }

    // ----------------------------------------
    // セクション: CTAバナー
    // ----------------------------------------
    $wp_customize->add_section('bh_cta_banner', [
        'title' => 'CTAバナー',
        'panel' => 'bh_front_page',
    ]);

    $wp_customize->add_setting('bh_cta_text', ['default' => '物件のご相談・売却査定・その他お気軽にお問い合わせください', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_cta_text', [
        'label'   => 'テキスト',
        'section' => 'bh_cta_banner',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bh_cta_btn_text', ['default' => 'お問い合わせはこちら', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_cta_btn_text', [
        'label'   => 'ボタンテキスト',
        'section' => 'bh_cta_banner',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bh_cta_btn_url', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('bh_cta_btn_url', [
        'label'       => 'ボタンリンク先',
        'section'     => 'bh_cta_banner',
        'type'        => 'url',
        'description' => '空欄 → /contact/',
    ]);

    // ----------------------------------------
    // セクション: 会社情報
    // ----------------------------------------
    $wp_customize->add_section('bh_company_info', [
        'title'    => '会社情報',
        'priority' => 35,
    ]);

    $wp_customize->add_setting('bh_tel', ['default' => '044-400-0562', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_tel', [
        'label'   => '電話番号',
        'section' => 'bh_company_info',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bh_line_url', ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_control('bh_line_url', [
        'label'       => 'LINE公式アカウントURL',
        'section'     => 'bh_company_info',
        'type'        => 'url',
        'description' => 'フローティングCTAと物件詳細のLINEボタンに使用',
    ]);
}
add_action('customize_register', 'builds_home_customize_register');

// Boolean sanitize helper
function builds_home_sanitize_bool($val) {
    return (bool) $val;
}

// ── ヘルパー: カスタマイザー値を安全に取得 ──
function bh_get($key, $default = '') {
    $val = get_theme_mod($key, $default);
    return ($val !== '' && $val !== false) ? $val : $default;
}
