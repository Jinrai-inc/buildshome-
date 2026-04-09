<?php
/**
 * TikTok / YouTube URL パース関数
 */

function builds_home_extract_tiktok_id($url) {
    if (preg_match('/\/video\/(\d+)/', $url, $matches)) {
        return $matches[1];
    }
    return '';
}

function builds_home_extract_youtube_id($url) {
    $patterns = [
        '/youtube\.com\/watch\?v=([^\&\?\/]+)/',
        '/youtu\.be\/([^\&\?\/]+)/',
        '/youtube\.com\/embed\/([^\&\?\/]+)/',
        '/youtube\.com\/shorts\/([^\&\?\/]+)/',
    ];
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
    }
    return '';
}
