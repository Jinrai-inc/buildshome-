<?php
/**
 * Builds Home Theme Functions
 *
 * @package builds-home
 */

// ── テーマセットアップ
function builds_home_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo');

    register_nav_menus([
        'primary' => 'メインメニュー',
        'footer'  => 'フッターメニュー',
    ]);

    // アイキャッチ画像サイズ
    add_image_size('property-card', 400, 250, true);
    add_image_size('property-detail', 800, 500, true);
    add_image_size('property-thumb', 120, 80, true);
}
add_action('after_setup_theme', 'builds_home_setup');

// ── インクルード
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/property-query.php';
require_once get_template_directory() . '/inc/admin-customization.php';
require_once get_template_directory() . '/inc/breadcrumb.php';
require_once get_template_directory() . '/inc/customizer.php';

// ACF PRO がある場合のみフィールド登録（オプション）
if (function_exists('acf_add_local_field_group') && file_exists(get_template_directory() . '/inc/acf-fields.php')) {
    require_once get_template_directory() . '/inc/acf-fields.php';
}

// ── 物件カスタムフィールド用メタボックス（ACF なし環境用）──
require_once get_template_directory() . '/inc/property-metabox.php';
