<?php
/**
 * Instagram Basic Display API 連携
 * Transient API で6時間キャッシュ
 */

function builds_home_get_instagram_posts($count = 8) {
    $transient_key = 'bh_instagram_posts';
    $cached = get_transient($transient_key);

    if ($cached !== false) {
        return array_slice($cached, 0, $count);
    }

    $access_token = get_theme_mod('bh_instagram_token', '');
    if (empty($access_token)) {
        return [];
    }

    $url = "https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,thumbnail_url,permalink,timestamp&access_token={$access_token}&limit=20";

    $response = wp_remote_get($url, ['timeout' => 10]);
    if (is_wp_error($response)) {
        return [];
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);
    if (empty($body['data'])) {
        return [];
    }

    $posts = array_map(function ($item) {
        return [
            'id'        => $item['id'],
            'caption'   => $item['caption'] ?? '',
            'media_url' => $item['media_type'] === 'VIDEO'
                           ? ($item['thumbnail_url'] ?? $item['media_url'])
                           : $item['media_url'],
            'permalink' => $item['permalink'],
            'timestamp' => $item['timestamp'],
        ];
    }, $body['data']);

    set_transient($transient_key, $posts, 6 * HOUR_IN_SECONDS);

    return array_slice($posts, 0, $count);
}

// トークン自動更新（50日ごと）
function builds_home_refresh_instagram_token() {
    $access_token = get_theme_mod('bh_instagram_token', '');
    if (empty($access_token)) return;

    $url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token={$access_token}";
    $response = wp_remote_get($url);

    if (!is_wp_error($response)) {
        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (!empty($body['access_token'])) {
            set_theme_mod('bh_instagram_token', $body['access_token']);
            delete_transient('bh_instagram_posts');
        }
    }
}

if (!wp_next_scheduled('bh_refresh_instagram_token')) {
    wp_schedule_event(time(), 'bh_50days', 'bh_refresh_instagram_token');
}
add_action('bh_refresh_instagram_token', 'builds_home_refresh_instagram_token');

add_filter('cron_schedules', function ($schedules) {
    $schedules['bh_50days'] = [
        'interval' => 50 * DAY_IN_SECONDS,
        'display'  => '50日ごと',
    ];
    return $schedules;
});
