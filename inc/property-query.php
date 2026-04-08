<?php
/**
 * 物件検索用 pre_get_posts フック
 */

function builds_home_property_filter_query($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (!is_post_type_archive('property') && !is_tax('property_type') && !is_tax('property_area')) {
        return;
    }

    $query->set('posts_per_page', 12);

    $meta_query = [];
    $tax_query  = [];

    // 物件種別フィルター
    if (!empty($_GET['property_type'])) {
        $tax_query[] = [
            'taxonomy' => 'property_type',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_GET['property_type']),
        ];
    }

    // エリアフィルター
    if (!empty($_GET['area'])) {
        $tax_query[] = [
            'taxonomy' => 'property_area',
            'field'    => 'slug',
            'terms'    => sanitize_text_field($_GET['area']),
        ];
    }

    // 間取りフィルター
    if (!empty($_GET['rooms'])) {
        $meta_query[] = [
            'key'   => 'property_rooms',
            'value' => sanitize_text_field($_GET['rooms']),
        ];
    }

    // 価格下限
    if (!empty($_GET['price_min'])) {
        $meta_query[] = [
            'key'     => 'property_price_number',
            'value'   => intval($_GET['price_min']),
            'compare' => '>=',
            'type'    => 'NUMERIC',
        ];
    }

    // 価格上限
    if (!empty($_GET['price_max'])) {
        $meta_query[] = [
            'key'     => 'property_price_number',
            'value'   => intval($_GET['price_max']),
            'compare' => '<=',
            'type'    => 'NUMERIC',
        ];
    }

    // 駅徒歩フィルター
    if (!empty($_GET['walk'])) {
        $meta_query[] = [
            'key'     => 'property_walk_minutes',
            'value'   => intval($_GET['walk']),
            'compare' => '<=',
            'type'    => 'NUMERIC',
        ];
    }

    if (!empty($tax_query)) {
        $tax_query['relation'] = 'AND';
        $query->set('tax_query', $tax_query);
    }

    if (!empty($meta_query)) {
        $meta_query['relation'] = 'AND';
        $query->set('meta_query', $meta_query);
    }

    // 成約済・非公開を除外
    $status_query = [
        'relation' => 'OR',
        [
            'key'     => 'property_status',
            'value'   => ['公開中', '商談中'],
            'compare' => 'IN',
        ],
        [
            'key'     => 'property_status',
            'compare' => 'NOT EXISTS',
        ],
    ];

    $existing_meta = $query->get('meta_query');
    if (!empty($existing_meta)) {
        $query->set('meta_query', [
            'relation' => 'AND',
            $existing_meta,
            $status_query,
        ]);
    } else {
        $query->set('meta_query', $status_query);
    }
}
add_action('pre_get_posts', 'builds_home_property_filter_query');
