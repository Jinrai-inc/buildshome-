<?php
/**
 * 物件カスタムフィールド用メタボックス（ACF なし環境用）
 * ACF PRO がインストールされている場合は acf-fields.php が優先される
 */

// ACF がある場合はスキップ
if (function_exists('get_field')) return;

function builds_home_add_property_metaboxes() {
    add_meta_box(
        'property_info_metabox',
        '物件情報',
        'builds_home_property_metabox_html',
        'property',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'builds_home_add_property_metaboxes');

function builds_home_property_metabox_html($post) {
    wp_nonce_field('bh_property_save', 'bh_property_nonce');

    $fields = [
        ['key' => 'property_price_display',    'label' => '価格（表示用）',     'type' => 'text',     'placeholder' => '例: 2,480万円'],
        ['key' => 'property_price_number',     'label' => '価格（万円・数値）',  'type' => 'number',   'placeholder' => '例: 2480'],
        ['key' => 'property_rooms',            'label' => '間取り',            'type' => 'select',   'options' => ['','1R','1K','1DK','1LDK','2K','2DK','2LDK','3K','3DK','3LDK','4LDK','4LDK以上']],
        ['key' => 'property_area_size',        'label' => '面積',              'type' => 'text',     'placeholder' => '例: 65.4㎡'],
        ['key' => 'property_address',          'label' => '所在地',            'type' => 'text',     'placeholder' => '例: 川崎市多摩区菅1丁目'],
        ['key' => 'property_station',          'label' => '最寄駅・徒歩',      'type' => 'text',     'placeholder' => '例: 稲田堤駅 徒歩8分'],
        ['key' => 'property_walk_minutes',     'label' => '駅徒歩（分・数値）', 'type' => 'number',   'placeholder' => '例: 8'],
        ['key' => 'property_age',              'label' => '築年',              'type' => 'text',     'placeholder' => '例: 築18年'],
        ['key' => 'property_structure',        'label' => '構造',              'type' => 'select',   'options' => ['','RC造','SRC造','S造','木造','鉄骨造','その他']],
        ['key' => 'property_floor',            'label' => '階数',              'type' => 'text',     'placeholder' => '例: 5階/8階建'],
        ['key' => 'property_parking',          'label' => '駐車場',            'type' => 'text',     'placeholder' => '例: 有（月額8,000円）'],
        ['key' => 'property_balcony',          'label' => 'バルコニー',         'type' => 'text',     'placeholder' => '例: 8.2㎡'],
        ['key' => 'property_land_area',        'label' => '土地面積',           'type' => 'text',     'placeholder' => '例: 120.5㎡'],
        ['key' => 'property_building_area',    'label' => '建物面積',           'type' => 'text',     'placeholder' => '例: 98.2㎡'],
        ['key' => 'property_management_fee',   'label' => '管理費',            'type' => 'text',     'placeholder' => '例: 月額12,000円'],
        ['key' => 'property_repair_fund',      'label' => '修繕積立金',         'type' => 'text',     'placeholder' => '例: 月額8,500円'],
        ['key' => 'property_delivery',         'label' => '引渡時期',           'type' => 'text',     'placeholder' => '例: 即入居可'],
        ['key' => 'property_transaction_type', 'label' => '取引態様',           'type' => 'select',   'options' => ['','媒介','専任媒介','専属専任媒介','代理','売主']],
        ['key' => 'property_features',         'label' => '物件特徴タグ',       'type' => 'textarea', 'placeholder' => '読点区切り。例: 角部屋、南向き、リフォーム済'],
        ['key' => 'property_description',      'label' => '物件紹介文',         'type' => 'textarea', 'placeholder' => ''],
        ['key' => 'property_map_embed',        'label' => 'Googleマップ iframe', 'type' => 'textarea', 'placeholder' => 'iframeコードを貼り付け'],
        ['key' => 'property_status',           'label' => '公開ステータス',      'type' => 'select',   'options' => ['公開中','商談中','成約済','非公開']],
        ['key' => 'property_reins_id',         'label' => 'レインズ番号',        'type' => 'text',     'placeholder' => ''],
        ['key' => 'property_tiktok_url',       'label' => 'TikTok動画URL',      'type' => 'text',     'placeholder' => 'https://www.tiktok.com/@user/video/123...'],
        ['key' => 'property_youtube_url',      'label' => 'YouTube動画URL',     'type' => 'text',     'placeholder' => 'https://www.youtube.com/watch?v=...'],
        ['key' => 'property_video_title',      'label' => '動画タイトル',         'type' => 'text',     'placeholder' => '空欄時は「物件紹介動画」'],
        ['key' => 'property_is_new',           'label' => 'NEW バッジ',         'type' => 'checkbox'],
        ['key' => 'property_is_featured',      'label' => 'おすすめ',           'type' => 'checkbox'],
    ];

    echo '<table class="form-table"><tbody>';
    foreach ($fields as $f) {
        $val = get_post_meta($post->ID, $f['key'], true);
        echo '<tr><th><label for="' . esc_attr($f['key']) . '">' . esc_html($f['label']) . '</label></th><td>';

        if ($f['type'] === 'select') {
            echo '<select name="' . esc_attr($f['key']) . '" id="' . esc_attr($f['key']) . '" style="min-width:200px;">';
            foreach ($f['options'] as $opt) {
                echo '<option value="' . esc_attr($opt) . '"' . selected($val, $opt, false) . '>' . esc_html($opt ?: '選択してください') . '</option>';
            }
            echo '</select>';
        } elseif ($f['type'] === 'textarea') {
            echo '<textarea name="' . esc_attr($f['key']) . '" id="' . esc_attr($f['key']) . '" rows="3" class="large-text" placeholder="' . esc_attr($f['placeholder'] ?? '') . '">' . esc_textarea($val) . '</textarea>';
        } elseif ($f['type'] === 'checkbox') {
            echo '<input type="checkbox" name="' . esc_attr($f['key']) . '" id="' . esc_attr($f['key']) . '" value="1"' . checked($val, '1', false) . '>';
        } else {
            echo '<input type="' . esc_attr($f['type']) . '" name="' . esc_attr($f['key']) . '" id="' . esc_attr($f['key']) . '" value="' . esc_attr($val) . '" class="regular-text" placeholder="' . esc_attr($f['placeholder'] ?? '') . '">';
        }

        echo '</td></tr>';
    }
    echo '</tbody></table>';
}

function builds_home_save_property_meta($post_id) {
    if (!isset($_POST['bh_property_nonce']) || !wp_verify_nonce($_POST['bh_property_nonce'], 'bh_property_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $text_fields = [
        'property_price_display', 'property_price_number', 'property_rooms',
        'property_area_size', 'property_address', 'property_station',
        'property_walk_minutes', 'property_age', 'property_structure',
        'property_floor', 'property_parking', 'property_balcony',
        'property_land_area', 'property_building_area', 'property_management_fee',
        'property_repair_fund', 'property_delivery', 'property_transaction_type',
        'property_status', 'property_reins_id',
        'property_tiktok_url', 'property_youtube_url', 'property_video_title',
    ];
    foreach ($text_fields as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, $key, sanitize_text_field($_POST[$key]));
        }
    }

    $textarea_fields = ['property_features', 'property_description', 'property_map_embed'];
    foreach ($textarea_fields as $key) {
        if (isset($_POST[$key])) {
            update_post_meta($post_id, $key, sanitize_textarea_field($_POST[$key]));
        }
    }

    $checkbox_fields = ['property_is_new', 'property_is_featured'];
    foreach ($checkbox_fields as $key) {
        update_post_meta($post_id, $key, isset($_POST[$key]) ? '1' : '0');
    }
}
add_action('save_post_property', 'builds_home_save_property_meta');

// ========================================
// お客様の声メタボックス
// ========================================
function builds_home_add_voice_metaboxes() {
    add_meta_box('voice_info_metabox', 'お客様情報', 'builds_home_voice_metabox_html', 'voice', 'normal', 'high');
}
add_action('add_meta_boxes', 'builds_home_add_voice_metaboxes');

function builds_home_voice_metabox_html($post) {
    wp_nonce_field('bh_voice_save', 'bh_voice_nonce');
    $fields = [
        ['key' => 'voice_customer_name',    'label' => 'お客様名（匿名）', 'placeholder' => '例: T.S 様'],
        ['key' => 'voice_transaction_type', 'label' => '取引種別',        'placeholder' => '例: 中古マンション購入'],
        ['key' => 'voice_area',             'label' => 'エリア',          'placeholder' => '例: 川崎市多摩区'],
    ];
    echo '<table class="form-table"><tbody>';
    foreach ($fields as $f) {
        $val = get_post_meta($post->ID, $f['key'], true);
        echo '<tr><th><label for="' . esc_attr($f['key']) . '">' . esc_html($f['label']) . '</label></th>';
        echo '<td><input type="text" name="' . esc_attr($f['key']) . '" id="' . esc_attr($f['key']) . '" value="' . esc_attr($val) . '" class="regular-text" placeholder="' . esc_attr($f['placeholder']) . '"></td></tr>';
    }
    // 星評価
    $rating = get_post_meta($post->ID, 'voice_rating', true) ?: 5;
    echo '<tr><th><label for="voice_rating">評価（星 1〜5）</label></th>';
    echo '<td><select name="voice_rating" id="voice_rating">';
    for ($s = 1; $s <= 5; $s++) {
        echo '<option value="' . $s . '"' . selected($rating, $s, false) . '>' . $s . '</option>';
    }
    echo '</select></td></tr>';
    echo '</tbody></table>';
    echo '<p class="description">コメント本文は上の「エディター」欄に入力してください。</p>';
}

function builds_home_save_voice_meta($post_id) {
    if (!isset($_POST['bh_voice_nonce']) || !wp_verify_nonce($_POST['bh_voice_nonce'], 'bh_voice_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    foreach (['voice_customer_name', 'voice_transaction_type', 'voice_area'] as $key) {
        if (isset($_POST[$key])) update_post_meta($post_id, $key, sanitize_text_field($_POST[$key]));
    }
    if (isset($_POST['voice_rating'])) update_post_meta($post_id, 'voice_rating', intval($_POST['voice_rating']));
}
add_action('save_post_voice', 'builds_home_save_voice_meta');

// ── ACF互換ヘルパー ──
// get_field() が存在しない場合、post_meta からフォールバック取得
if (!function_exists('get_field')) {
    function get_field($key, $post_id = null) {
        if (!$post_id) $post_id = get_the_ID();
        $val = get_post_meta($post_id, $key, true);
        return $val !== '' ? $val : null;
    }
}
