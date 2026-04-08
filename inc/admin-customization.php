<?php
/**
 * 管理画面カスタマイズ
 */

// 物件一覧のカラムカスタマイズ
function builds_home_property_columns($columns) {
    $new_columns = [];
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = 'サムネイル';
    $new_columns['title'] = $columns['title'];
    $new_columns['property_type_col'] = '物件種別';
    $new_columns['price'] = '価格';
    $new_columns['rooms'] = '間取り';
    $new_columns['property_area_col'] = 'エリア';
    $new_columns['status'] = 'ステータス';
    $new_columns['reins_id'] = 'レインズ番号';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_property_posts_columns', 'builds_home_property_columns');

function builds_home_property_column_content($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, [60, 40]);
            } else {
                echo '<span style="color:#999;">--</span>';
            }
            break;
        case 'property_type_col':
            $terms = get_the_terms($post_id, 'property_type');
            echo $terms ? esc_html($terms[0]->name) : '--';
            break;
        case 'price':
            $price = get_field('property_price_display', $post_id);
            echo $price ? esc_html($price) : '--';
            break;
        case 'rooms':
            $rooms = get_field('property_rooms', $post_id);
            echo $rooms ? esc_html($rooms) : '--';
            break;
        case 'property_area_col':
            $terms = get_the_terms($post_id, 'property_area');
            echo $terms ? esc_html($terms[0]->name) : '--';
            break;
        case 'status':
            $status = get_field('property_status', $post_id);
            if ($status) {
                $class = '';
                if ($status === '商談中') $class = 'color: #e65100;';
                if ($status === '成約済') $class = 'color: #999;';
                if ($status === '公開中') $class = 'color: #2e7d32;';
                echo '<span style="font-weight:600;' . $class . '">' . esc_html($status) . '</span>';
            } else {
                echo '<span style="color:#2e7d32;font-weight:600;">公開中</span>';
            }
            break;
        case 'reins_id':
            $reins = get_field('property_reins_id', $post_id);
            echo $reins ? esc_html($reins) : '--';
            break;
    }
}
add_action('manage_property_posts_custom_column', 'builds_home_property_column_content', 10, 2);

// 管理画面にCSVインポートリンク追加
function builds_home_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=property',
        'CSVインポート',
        'CSVインポート',
        'manage_options',
        'property-csv-import',
        'builds_home_csv_import_redirect'
    );
}
add_action('admin_menu', 'builds_home_admin_menu');

function builds_home_csv_import_redirect() {
    $url = admin_url('admin.php?page=pmxi-admin-import');
    echo '<script>window.location.href="' . esc_url($url) . '";</script>';
    echo '<p>WP All Import へ移動中... <a href="' . esc_url($url) . '">こちらをクリック</a></p>';
}

// ダッシュボードウィジェット
function builds_home_dashboard_widget() {
    wp_add_dashboard_widget(
        'builds_home_property_stats',
        '物件管理 概要',
        'builds_home_property_stats_display'
    );
}
add_action('wp_dashboard_setup', 'builds_home_dashboard_widget');

function builds_home_property_stats_display() {
    $total = wp_count_posts('property');
    $published = $total->publish ?? 0;

    echo '<ul style="margin:0;padding:0;">';
    echo '<li style="padding:8px 0;border-bottom:1px solid #eee;">公開中の物件: <strong>' . intval($published) . '件</strong></li>';

    // 種別ごとのカウント
    $types = get_terms(['taxonomy' => 'property_type', 'hide_empty' => false]);
    if (!is_wp_error($types)) {
        foreach ($types as $type) {
            echo '<li style="padding:4px 0 4px 16px;font-size:13px;">' . esc_html($type->name) . ': ' . intval($type->count) . '件</li>';
        }
    }
    echo '</ul>';
    echo '<p style="margin-top:12px;"><a href="' . admin_url('edit.php?post_type=property') . '" class="button">物件一覧を見る</a></p>';
}
