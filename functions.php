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
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

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
require_once get_template_directory() . '/inc/customizer-sns.php';
require_once get_template_directory() . '/inc/video-helpers.php';

// Instagram API 方式を使用する場合のみ
if (get_theme_mod('bh_instagram_token', '')) {
    require_once get_template_directory() . '/inc/instagram-api.php';
}

// ACF PRO がある場合のみフィールド登録（オプション）
if (function_exists('acf_add_local_field_group') && file_exists(get_template_directory() . '/inc/acf-fields.php')) {
    require_once get_template_directory() . '/inc/acf-fields.php';
}

// ── 物件カスタムフィールド用メタボックス（ACF なし環境用）──
require_once get_template_directory() . '/inc/property-metabox.php';

// ── サンプルページ自動生成 ──
require_once get_template_directory() . '/inc/sample-pages.php';

// ── ブロックパターン登録 ──
require_once get_template_directory() . '/inc/block-patterns.php';

// ── メニュー未設定時のフォールバック ──
function builds_home_fallback_menu() {
    echo '<ul class="site-header__menu">';
    echo '<li><a href="' . esc_url(home_url('/property/')) . '">物件一覧</a></li>';
    echo '<li><a href="' . esc_url(home_url('/reason/')) . '">選ばれる理由</a></li>';
    echo '<li><a href="' . esc_url(home_url('/staff/')) . '">スタッフ</a></li>';
    echo '<li><a href="' . esc_url(home_url('/voice/')) . '">お客様の声</a></li>';
    echo '<li><a href="' . esc_url(home_url('/company/')) . '">会社概要</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '" class="btn btn--primary btn--sm site-header__cta">お問い合わせ</a></li>';
    echo '</ul>';
}

function builds_home_fallback_menu_mobile() {
    echo '<ul class="mobile-menu__list">';
    echo '<li><a href="' . esc_url(home_url('/property/')) . '">物件一覧</a></li>';
    echo '<li><a href="' . esc_url(home_url('/reason/')) . '">選ばれる理由</a></li>';
    echo '<li><a href="' . esc_url(home_url('/staff/')) . '">スタッフ</a></li>';
    echo '<li><a href="' . esc_url(home_url('/voice/')) . '">お客様の声</a></li>';
    echo '<li><a href="' . esc_url(home_url('/company/')) . '">会社概要</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '" class="btn btn--primary">お問い合わせ</a></li>';
    echo '</ul>';
}

// ── wp_nav_menu の「お問い合わせ」にCTAクラスを付与 ──
function builds_home_nav_menu_css_class($classes, $item) {
    if (in_array('menu-cta', $classes) || strpos($item->title, 'お問い合わせ') !== false) {
        $classes[] = 'menu-item-cta';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'builds_home_nav_menu_css_class', 10, 2);

function builds_home_nav_menu_link_attributes($atts, $item) {
    if (in_array('menu-item-cta', $item->classes ?? []) || strpos($item->title, 'お問い合わせ') !== false) {
        $existing = $atts['class'] ?? '';
        $atts['class'] = trim($existing . ' btn btn--primary btn--sm site-header__cta');
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'builds_home_nav_menu_link_attributes', 10, 2);
