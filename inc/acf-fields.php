<?php
/**
 * ACF フィールドグループ登録
 * ACF PRO がインストールされている場合にフィールドを自動登録
 */

if (!function_exists('acf_add_local_field_group')) return;

// 物件情報フィールドグループ
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
