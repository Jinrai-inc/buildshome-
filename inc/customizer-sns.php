<?php
/**
 * カスタマイザー SNS設定パネル
 */

function builds_home_customize_sns($wp_customize) {

    // ========================================
    // パネル: SNS設定
    // ========================================
    $wp_customize->add_section('bh_sns', [
        'title'    => 'SNS設定',
        'priority' => 36,
    ]);

    $sns_fields = [
        'bh_sns_instagram' => ['label' => 'Instagram URL',          'desc' => 'プロフィールURL'],
        'bh_sns_tiktok'    => ['label' => 'TikTok URL',             'desc' => 'プロフィールURL'],
        'bh_sns_youtube'   => ['label' => 'YouTube チャンネルURL',   'desc' => '空欄で非表示'],
        'bh_sns_line'      => ['label' => 'LINE 友だち追加URL',      'desc' => 'フローティングCTA・フッターに使用'],
    ];
    foreach ($sns_fields as $key => $f) {
        $wp_customize->add_setting($key, ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control($key, [
            'label'       => $f['label'],
            'section'     => 'bh_sns',
            'type'        => 'url',
            'description' => $f['desc'],
        ]);
    }

    // Instagram API トークン
    $wp_customize->add_setting('bh_instagram_token', ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
    $wp_customize->add_control('bh_instagram_token', [
        'label'       => 'Instagram アクセストークン',
        'section'     => 'bh_sns',
        'type'        => 'text',
        'description' => 'API方式の場合のみ。Smash Balloonプラグイン使用時は空欄でOK。',
    ]);

    // Instagram表示件数
    $wp_customize->add_setting('bh_instagram_count', ['default' => 8, 'sanitize_callback' => 'absint']);
    $wp_customize->add_control('bh_instagram_count', [
        'label'   => 'Instagramフィード表示件数',
        'section' => 'bh_sns',
        'type'    => 'number',
        'input_attrs' => ['min' => 2, 'max' => 12, 'step' => 1],
    ]);

    // TikTok表示 (カスタマイザーで最大6件の動画を登録)
    $wp_customize->add_section('bh_tiktok_gallery', [
        'title' => 'TikTokギャラリー',
        'panel' => 'bh_front_page',
    ]);

    for ($t = 1; $t <= 6; $t++) {
        $wp_customize->add_setting("bh_tiktok_url_{$t}", ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control("bh_tiktok_url_{$t}", [
            'label'   => "TikTok動画URL {$t}",
            'section' => 'bh_tiktok_gallery',
            'type'    => 'url',
            'description' => '例: https://www.tiktok.com/@user/video/123...',
        ]);
        $wp_customize->add_setting("bh_tiktok_thumb_{$t}", ['default' => '', 'sanitize_callback' => 'esc_url_raw']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "bh_tiktok_thumb_{$t}", [
            'label'   => "サムネイル画像 {$t}",
            'section' => 'bh_tiktok_gallery',
            'description' => 'TikTokのスクリーンショットを使用',
        ]));
        $wp_customize->add_setting("bh_tiktok_title_{$t}", ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control("bh_tiktok_title_{$t}", [
            'label'   => "タイトル {$t}",
            'section' => 'bh_tiktok_gallery',
            'type'    => 'text',
        ]);
    }
}
add_action('customize_register', 'builds_home_customize_sns');
