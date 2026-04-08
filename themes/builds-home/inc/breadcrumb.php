<?php
/**
 * パンくずリスト関数
 */

function builds_home_breadcrumb() {
    if (is_front_page()) return;

    $items = [];
    $items[] = ['url' => home_url('/'), 'name' => 'ホーム'];

    if (is_singular('property')) {
        $items[] = ['url' => get_post_type_archive_link('property'), 'name' => '物件一覧'];
        $items[] = ['url' => '', 'name' => get_the_title()];
    } elseif (is_post_type_archive('property')) {
        $items[] = ['url' => '', 'name' => '物件一覧'];
    } elseif (is_singular('post')) {
        $items[] = ['url' => home_url('/column/'), 'name' => 'コラム'];
        $items[] = ['url' => '', 'name' => get_the_title()];
    } elseif (is_home() || is_category()) {
        $items[] = ['url' => '', 'name' => 'コラム'];
    } elseif (is_page()) {
        $items[] = ['url' => '', 'name' => get_the_title()];
    } elseif (is_tax('property_type')) {
        $items[] = ['url' => get_post_type_archive_link('property'), 'name' => '物件一覧'];
        $items[] = ['url' => '', 'name' => single_term_title('', false)];
    } elseif (is_tax('property_area')) {
        $items[] = ['url' => get_post_type_archive_link('property'), 'name' => '物件一覧'];
        $items[] = ['url' => '', 'name' => single_term_title('', false)];
    } elseif (is_search()) {
        $items[] = ['url' => '', 'name' => '検索結果'];
    } elseif (is_404()) {
        $items[] = ['url' => '', 'name' => 'ページが見つかりません'];
    }

    // HTML output
    echo '<nav class="breadcrumb" aria-label="パンくずリスト">';
    echo '<ol class="breadcrumb__list container">';
    foreach ($items as $i => $item) {
        $is_last = ($i === count($items) - 1);
        echo '<li class="breadcrumb__item">';
        if (!$is_last && $item['url']) {
            echo '<a href="' . esc_url($item['url']) . '">' . esc_html($item['name']) . '</a>';
        } else {
            echo '<span aria-current="page">' . esc_html($item['name']) . '</span>';
        }
        echo '</li>';
    }
    echo '</ol>';
    echo '</nav>';

    // JSON-LD
    echo '<script type="application/ld+json">';
    $json_items = [];
    foreach ($items as $i => $item) {
        $json_items[] = [
            '@type' => 'ListItem',
            'position' => $i + 1,
            'name' => $item['name'],
            'item' => $item['url'] ?: get_permalink(),
        ];
    }
    echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $json_items,
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    echo '</script>';
}
