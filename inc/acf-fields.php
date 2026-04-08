<?php
/**
 * ACF フィールドグループ登録
 * ACF PRO がインストールされている場合にフィールドを自動登録
 */

if (!function_exists('acf_add_local_field_group')) return;

// ========================================
// トップページ設定フィールドグループ
// ========================================
acf_add_local_field_group([
    'key' => 'group_front_page_settings',
    'title' => 'トップページ設定',
    'fields' => [

        // ── ヒーローセクション ──
        [
            'key' => 'field_hero_tab',
            'label' => 'ヒーローセクション',
            'name' => '',
            'type' => 'tab',
        ],
        [
            'key' => 'field_hero_bg_type',
            'label' => '背景タイプ',
            'name' => 'hero_bg_type',
            'type' => 'select',
            'default_value' => 'gradient',
            'choices' => [
                'gradient' => 'グラデーション（デフォルト）',
                'image'    => '画像',
                'video'    => '動画（将来対応）',
            ],
            'instructions' => '「画像」を選ぶと下の背景画像がヒーローに表示されます。',
        ],
        [
            'key' => 'field_hero_bg_image',
            'label' => '背景画像',
            'name' => 'hero_bg_image',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'instructions' => '推奨サイズ: 1920x1080px 以上。暗めのオーバーレイが自動適用されます。',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_hero_bg_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_hero_overlay_opacity',
            'label' => 'オーバーレイ濃度（%）',
            'name' => 'hero_overlay_opacity',
            'type' => 'number',
            'default_value' => 55,
            'min' => 0,
            'max' => 100,
            'step' => 5,
            'instructions' => '背景画像の上に乗る暗いオーバーレイの濃さ。0=透明、100=真っ黒',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_hero_bg_type',
                        'operator' => '==',
                        'value' => 'image',
                    ],
                ],
            ],
        ],
        [
            'key' => 'field_hero_subtitle',
            'label' => 'サブタイトル',
            'name' => 'hero_subtitle',
            'type' => 'text',
            'default_value' => 'Builds Home — 川崎・多摩エリアの不動産',
            'placeholder' => '例: Builds Home — 川崎・多摩エリアの不動産',
        ],
        [
            'key' => 'field_hero_title',
            'label' => 'メインコピー',
            'name' => 'hero_title',
            'type' => 'textarea',
            'rows' => 2,
            'default_value' => '当たり前の豊かさを追求し、創造し続ける',
            'instructions' => '改行はそのまま反映されます。',
        ],
        [
            'key' => 'field_hero_description',
            'label' => '説明文',
            'name' => 'hero_description',
            'type' => 'textarea',
            'rows' => 3,
            'default_value' => '不動産を通じて、人々が安心して暮らせる空間と心地よい生活を提供することをお約束します。',
        ],
        [
            'key' => 'field_hero_cta1_text',
            'label' => 'CTAボタン1 テキスト',
            'name' => 'hero_cta1_text',
            'type' => 'text',
            'default_value' => '物件を探す',
        ],
        [
            'key' => 'field_hero_cta1_url',
            'label' => 'CTAボタン1 リンク先',
            'name' => 'hero_cta1_url',
            'type' => 'url',
            'default_value' => '',
            'placeholder' => '空欄の場合は /property/ にリンク',
        ],
        [
            'key' => 'field_hero_cta2_text',
            'label' => 'CTAボタン2 テキスト',
            'name' => 'hero_cta2_text',
            'type' => 'text',
            'default_value' => 'ご相談はこちら',
        ],
        [
            'key' => 'field_hero_cta2_url',
            'label' => 'CTAボタン2 リンク先',
            'name' => 'hero_cta2_url',
            'type' => 'url',
            'default_value' => '',
            'placeholder' => '空欄の場合は /contact/ にリンク',
        ],

        // ── セクション表示設定 ──
        [
            'key' => 'field_sections_tab',
            'label' => 'セクション表示設定',
            'name' => '',
            'type' => 'tab',
        ],
        [
            'key' => 'field_show_property_section',
            'label' => '新着・おすすめ物件セクション',
            'name' => 'show_property_section',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '表示',
            'ui_off_text' => '非表示',
        ],
        [
            'key' => 'field_show_reason_section',
            'label' => '選ばれる理由セクション',
            'name' => 'show_reason_section',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '表示',
            'ui_off_text' => '非表示',
        ],
        [
            'key' => 'field_show_loan_section',
            'label' => 'ローンシミュレーションセクション',
            'name' => 'show_loan_section',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '表示',
            'ui_off_text' => '非表示',
        ],
        [
            'key' => 'field_show_voice_section',
            'label' => 'お客様の声セクション',
            'name' => 'show_voice_section',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '表示',
            'ui_off_text' => '非表示',
        ],
        [
            'key' => 'field_show_column_section',
            'label' => 'コラム最新記事セクション',
            'name' => 'show_column_section',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '表示',
            'ui_off_text' => '非表示',
        ],
        [
            'key' => 'field_show_cta_section',
            'label' => 'お問い合わせCTAセクション',
            'name' => 'show_cta_section',
            'type' => 'true_false',
            'default_value' => 1,
            'ui' => 1,
            'ui_on_text' => '表示',
            'ui_off_text' => '非表示',
        ],

        // ── 選ばれる理由 ──
        [
            'key' => 'field_reasons_tab',
            'label' => '選ばれる理由',
            'name' => '',
            'type' => 'tab',
        ],
        [
            'key' => 'field_reasons_repeater',
            'label' => '理由カード',
            'name' => 'reasons_list',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => '理由を追加',
            'instructions' => '空の場合はデフォルトの3つが表示されます。',
            'sub_fields' => [
                [
                    'key' => 'field_reason_title',
                    'label' => 'タイトル',
                    'name' => 'reason_title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_reason_text',
                    'label' => '説明文',
                    'name' => 'reason_text',
                    'type' => 'textarea',
                    'rows' => 3,
                ],
                [
                    'key' => 'field_reason_icon',
                    'label' => 'アイコン画像（任意）',
                    'name' => 'reason_icon',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ],
            ],
        ],

        // ── お客様の声（トップ表示用） ──
        [
            'key' => 'field_voice_top_tab',
            'label' => 'お客様の声（トップ表示）',
            'name' => '',
            'type' => 'tab',
        ],
        [
            'key' => 'field_voice_top_repeater',
            'label' => 'お客様の声（トップページ用）',
            'name' => 'voice_top_list',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'お客様の声を追加',
            'instructions' => '空の場合はサンプルデータが表示されます。「お客様の声」ページとは独立して管理できます。',
            'sub_fields' => [
                [
                    'key' => 'field_voice_top_name',
                    'label' => 'お客様名',
                    'name' => 'voice_customer_name',
                    'type' => 'text',
                    'placeholder' => '例: T.S 様',
                ],
                [
                    'key' => 'field_voice_top_type',
                    'label' => '取引種別',
                    'name' => 'voice_transaction_type',
                    'type' => 'text',
                    'placeholder' => '例: 中古マンション購入',
                ],
                [
                    'key' => 'field_voice_top_area',
                    'label' => 'エリア',
                    'name' => 'voice_area',
                    'type' => 'text',
                    'placeholder' => '例: 川崎市多摩区',
                ],
                [
                    'key' => 'field_voice_top_rating',
                    'label' => '評価（星）',
                    'name' => 'voice_rating',
                    'type' => 'number',
                    'min' => 1,
                    'max' => 5,
                    'default_value' => 5,
                ],
                [
                    'key' => 'field_voice_top_comment',
                    'label' => 'コメント',
                    'name' => 'voice_comment',
                    'type' => 'textarea',
                ],
            ],
        ],

        // ── CTA バナー ──
        [
            'key' => 'field_cta_tab',
            'label' => 'CTAバナー',
            'name' => '',
            'type' => 'tab',
        ],
        [
            'key' => 'field_cta_text',
            'label' => 'CTAバナー テキスト',
            'name' => 'cta_banner_text',
            'type' => 'text',
            'default_value' => '物件のご相談・売却査定・その他お気軽にお問い合わせください',
        ],
        [
            'key' => 'field_cta_button_text',
            'label' => 'CTAボタン テキスト',
            'name' => 'cta_button_text',
            'type' => 'text',
            'default_value' => 'お問い合わせはこちら',
        ],
        [
            'key' => 'field_cta_button_url',
            'label' => 'CTAボタン リンク先',
            'name' => 'cta_button_url',
            'type' => 'url',
            'placeholder' => '空欄の場合は /contact/ にリンク',
        ],

        // ── フリーセクション ──
        [
            'key' => 'field_free_sections_tab',
            'label' => 'フリーセクション',
            'name' => '',
            'type' => 'tab',
        ],
        [
            'key' => 'field_free_sections',
            'label' => '追加セクション',
            'name' => 'free_sections',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'セクションを追加',
            'instructions' => 'CTAバナーの上に自由なセクションを追加できます。',
            'sub_fields' => [
                [
                    'key' => 'field_free_section_title_en',
                    'label' => '英語ラベル',
                    'name' => 'section_title_en',
                    'type' => 'text',
                    'placeholder' => '例: Service',
                ],
                [
                    'key' => 'field_free_section_title_ja',
                    'label' => '日本語タイトル',
                    'name' => 'section_title_ja',
                    'type' => 'text',
                    'placeholder' => '例: サービス紹介',
                ],
                [
                    'key' => 'field_free_section_content',
                    'label' => '内容',
                    'name' => 'section_content',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ],
                [
                    'key' => 'field_free_section_bg',
                    'label' => '背景色',
                    'name' => 'section_bg',
                    'type' => 'select',
                    'choices' => [
                        'white' => '白',
                        'alt'   => 'ベージュ',
                    ],
                    'default_value' => 'white',
                ],
            ],
        ],
    ],
    'location' => [
        [
            [
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
]);

// ========================================
// 物件情報フィールドグループ
// ========================================
acf_add_local_field_group([
    'key' => 'group_property_info',
    'title' => '物件情報',
    'fields' => [
        [
            'key' => 'field_property_price_display',
            'label' => '価格（表示用）',
            'name' => 'property_price_display',
            'type' => 'text',
            'required' => 1,
            'placeholder' => '例: 2,480万円',
        ],
        [
            'key' => 'field_property_price_number',
            'label' => '価格（数値・万円単位）',
            'name' => 'property_price_number',
            'type' => 'number',
            'required' => 1,
            'placeholder' => '例: 2480',
        ],
        [
            'key' => 'field_property_rooms',
            'label' => '間取り',
            'name' => 'property_rooms',
            'type' => 'select',
            'required' => 1,
            'choices' => [
                '1R' => '1R', '1K' => '1K', '1DK' => '1DK', '1LDK' => '1LDK',
                '2K' => '2K', '2DK' => '2DK', '2LDK' => '2LDK',
                '3K' => '3K', '3DK' => '3DK', '3LDK' => '3LDK',
                '4LDK' => '4LDK', '4LDK以上' => '4LDK以上',
            ],
        ],
        [
            'key' => 'field_property_area_size',
            'label' => '面積',
            'name' => 'property_area_size',
            'type' => 'text',
            'required' => 1,
            'placeholder' => '例: 65.4㎡',
        ],
        [
            'key' => 'field_property_address',
            'label' => '所在地',
            'name' => 'property_address',
            'type' => 'text',
            'required' => 1,
            'placeholder' => '例: 川崎市多摩区菅1丁目',
        ],
        [
            'key' => 'field_property_station',
            'label' => '最寄駅・徒歩',
            'name' => 'property_station',
            'type' => 'text',
            'required' => 1,
            'placeholder' => '例: 稲田堤駅 徒歩8分',
        ],
        [
            'key' => 'field_property_walk_minutes',
            'label' => '駅徒歩（数値・分）',
            'name' => 'property_walk_minutes',
            'type' => 'number',
            'placeholder' => '例: 8',
        ],
        [
            'key' => 'field_property_age',
            'label' => '築年',
            'name' => 'property_age',
            'type' => 'text',
            'placeholder' => '例: 築18年',
        ],
        [
            'key' => 'field_property_structure',
            'label' => '構造',
            'name' => 'property_structure',
            'type' => 'select',
            'choices' => [
                '' => '選択してください',
                'RC造' => 'RC造', 'SRC造' => 'SRC造', 'S造' => 'S造',
                '木造' => '木造', '鉄骨造' => '鉄骨造', 'その他' => 'その他',
            ],
        ],
        [
            'key' => 'field_property_floor',
            'label' => '階数',
            'name' => 'property_floor',
            'type' => 'text',
            'placeholder' => '例: 5階/8階建',
        ],
        [
            'key' => 'field_property_parking',
            'label' => '駐車場',
            'name' => 'property_parking',
            'type' => 'text',
            'placeholder' => '例: 有（月額8,000円）',
        ],
        [
            'key' => 'field_property_balcony',
            'label' => 'バルコニー',
            'name' => 'property_balcony',
            'type' => 'text',
            'placeholder' => '例: 8.2㎡',
        ],
        [
            'key' => 'field_property_land_area',
            'label' => '土地面積',
            'name' => 'property_land_area',
            'type' => 'text',
            'placeholder' => '例: 120.5㎡',
        ],
        [
            'key' => 'field_property_building_area',
            'label' => '建物面積',
            'name' => 'property_building_area',
            'type' => 'text',
            'placeholder' => '例: 98.2㎡',
        ],
        [
            'key' => 'field_property_management_fee',
            'label' => '管理費',
            'name' => 'property_management_fee',
            'type' => 'text',
            'placeholder' => '例: 月額12,000円',
        ],
        [
            'key' => 'field_property_repair_fund',
            'label' => '修繕積立金',
            'name' => 'property_repair_fund',
            'type' => 'text',
            'placeholder' => '例: 月額8,500円',
        ],
        [
            'key' => 'field_property_delivery',
            'label' => '引渡時期',
            'name' => 'property_delivery',
            'type' => 'text',
            'placeholder' => '例: 即入居可',
        ],
        [
            'key' => 'field_property_transaction_type',
            'label' => '取引態様',
            'name' => 'property_transaction_type',
            'type' => 'select',
            'choices' => [
                '' => '選択してください',
                '媒介' => '媒介', '専任媒介' => '専任媒介',
                '専属専任媒介' => '専属専任媒介', '代理' => '代理', '売主' => '売主',
            ],
        ],
        [
            'key' => 'field_property_features',
            'label' => '物件特徴タグ',
            'name' => 'property_features',
            'type' => 'textarea',
            'rows' => 2,
            'placeholder' => '読点区切り。例: 角部屋、南向き、リフォーム済',
        ],
        [
            'key' => 'field_property_description',
            'label' => '物件紹介文',
            'name' => 'property_description',
            'type' => 'textarea',
            'rows' => 4,
        ],
        [
            'key' => 'field_property_gallery',
            'label' => '物件画像ギャラリー',
            'name' => 'property_gallery',
            'type' => 'gallery',
            'return_format' => 'array',
            'preview_size' => 'medium',
        ],
        [
            'key' => 'field_property_floorplan',
            'label' => '間取り図',
            'name' => 'property_floorplan',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
        ],
        [
            'key' => 'field_property_map_embed',
            'label' => 'Googleマップ埋め込み',
            'name' => 'property_map_embed',
            'type' => 'textarea',
            'rows' => 3,
            'placeholder' => 'iframeコードを貼り付け',
        ],
        [
            'key' => 'field_property_status',
            'label' => '公開ステータス',
            'name' => 'property_status',
            'type' => 'select',
            'default_value' => '公開中',
            'choices' => [
                '公開中' => '公開中', '商談中' => '商談中',
                '成約済' => '成約済', '非公開' => '非公開',
            ],
        ],
        [
            'key' => 'field_property_reins_id',
            'label' => 'レインズ番号',
            'name' => 'property_reins_id',
            'type' => 'text',
        ],
        [
            'key' => 'field_property_is_new',
            'label' => 'NEW バッジ表示',
            'name' => 'property_is_new',
            'type' => 'true_false',
            'ui' => 1,
        ],
        [
            'key' => 'field_property_is_featured',
            'label' => 'おすすめ',
            'name' => 'property_is_featured',
            'type' => 'true_false',
            'ui' => 1,
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'property',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
]);

// スタッフ情報フィールドグループ
acf_add_local_field_group([
    'key' => 'group_staff_info',
    'title' => 'スタッフ情報',
    'fields' => [
        [
            'key' => 'field_staff_repeater',
            'label' => 'スタッフ一覧',
            'name' => 'staff_list',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => [
                [
                    'key' => 'field_staff_name',
                    'label' => 'スタッフ名',
                    'name' => 'staff_name',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_staff_role',
                    'label' => '役職',
                    'name' => 'staff_role',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_staff_license',
                    'label' => '資格',
                    'name' => 'staff_license',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_staff_description',
                    'label' => '自己紹介文',
                    'name' => 'staff_description',
                    'type' => 'textarea',
                ],
                [
                    'key' => 'field_staff_photo',
                    'label' => '顔写真',
                    'name' => 'staff_photo',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ],
            ],
        ],
    ],
    'location' => [
        [
            [
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-staff.php',
            ],
        ],
    ],
]);

// お客様の声フィールドグループ
acf_add_local_field_group([
    'key' => 'group_voice_info',
    'title' => 'お客様の声',
    'fields' => [
        [
            'key' => 'field_voice_repeater',
            'label' => 'お客様の声一覧',
            'name' => 'voice_list',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => [
                [
                    'key' => 'field_voice_customer_name',
                    'label' => 'お客様名（匿名）',
                    'name' => 'voice_customer_name',
                    'type' => 'text',
                    'placeholder' => '例: T.S 様',
                ],
                [
                    'key' => 'field_voice_transaction_type',
                    'label' => '取引種別',
                    'name' => 'voice_transaction_type',
                    'type' => 'text',
                    'placeholder' => '例: 中古マンション購入',
                ],
                [
                    'key' => 'field_voice_area',
                    'label' => 'エリア',
                    'name' => 'voice_area',
                    'type' => 'text',
                    'placeholder' => '例: 川崎市多摩区',
                ],
                [
                    'key' => 'field_voice_rating',
                    'label' => '評価（星）',
                    'name' => 'voice_rating',
                    'type' => 'number',
                    'min' => 1,
                    'max' => 5,
                    'default_value' => 5,
                ],
                [
                    'key' => 'field_voice_comment',
                    'label' => 'コメント',
                    'name' => 'voice_comment',
                    'type' => 'textarea',
                ],
            ],
        ],
    ],
    'location' => [
        [
            [
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-voice.php',
            ],
        ],
    ],
]);
