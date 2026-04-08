<?php
/**
 * カスタム投稿タイプ・タクソノミー登録
 */

function builds_home_register_post_types() {
    // 物件 CPT
    register_post_type('property', [
        'labels' => [
            'name'          => '物件',
            'singular_name' => '物件',
            'add_new'       => '物件を新規登録',
            'add_new_item'  => '物件を新規登録',
            'edit_item'     => '物件を編集',
            'new_item'      => '新しい物件',
            'view_item'     => '物件を表示',
            'search_items'  => '物件を検索',
            'not_found'     => '物件が見つかりません',
            'menu_name'     => '物件管理',
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'property'],
        'supports'     => ['title', 'editor', 'thumbnail'],
        'menu_icon'    => 'dashicons-building',
        'show_in_rest' => true,
        'menu_position' => 5,
    ]);

    // 物件種別タクソノミー
    register_taxonomy('property_type', 'property', [
        'labels' => [
            'name'          => '物件種別',
            'singular_name' => '物件種別',
            'add_new_item'  => '物件種別を追加',
            'menu_name'     => '物件種別',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'property-type'],
        'show_in_rest' => true,
    ]);

    // エリアタクソノミー
    register_taxonomy('property_area', 'property', [
        'labels' => [
            'name'          => 'エリア',
            'singular_name' => 'エリア',
            'add_new_item'  => 'エリアを追加',
            'menu_name'     => 'エリア',
        ],
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'area'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'builds_home_register_post_types');

// 初期タームの登録
function builds_home_register_default_terms() {
    // 物件種別
    $property_types = [
        '中古マンション', '中古戸建', '新築戸建', '新築マンション',
        '土地', '収益物件', '事業用',
    ];
    foreach ($property_types as $term) {
        if (!term_exists($term, 'property_type')) {
            wp_insert_term($term, 'property_type');
        }
    }

    // エリア
    $areas = [
        '川崎市多摩区', '川崎市高津区', '川崎市宮前区',
        '川崎市麻生区', '稲城市', '調布市',
    ];
    foreach ($areas as $term) {
        if (!term_exists($term, 'property_area')) {
            wp_insert_term($term, 'property_area');
        }
    }
}
add_action('init', 'builds_home_register_default_terms');
