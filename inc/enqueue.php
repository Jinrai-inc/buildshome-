<?php
/**
 * CSS/JS エンキュー
 */

function builds_home_enqueue_assets() {
    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    // Google Fonts preconnect
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

    // CSS
    $css_files = [
        'foundation'      => 'assets/css/foundation.css',
        'header'          => 'assets/css/header.css',
        'footer'          => 'assets/css/footer.css',
        'hero'            => 'assets/css/hero.css',
        'property-card'   => 'assets/css/property-card.css',
        'property-filter' => 'assets/css/property-filter.css',
        'property-detail' => 'assets/css/property-detail.css',
        'loan-simulator'  => 'assets/css/loan-simulator.css',
        'sections'        => 'assets/css/sections.css',
        'forms'           => 'assets/css/forms.css',
        'floating-cta'    => 'assets/css/floating-cta.css',
        'sns'             => 'assets/css/sns.css',
        'responsive'      => 'assets/css/responsive.css',
    ];

    foreach ($css_files as $handle => $path) {
        if (file_exists($theme_dir . '/' . $path)) {
            wp_enqueue_style(
                'bh-' . $handle,
                $theme_uri . '/' . $path,
                $handle === 'foundation' ? [] : ['bh-foundation'],
                filemtime($theme_dir . '/' . $path)
            );
        }
    }

    // JS
    $js_files = [
        'header-scroll'   => 'assets/js/header-scroll.js',
        'smooth-scroll'   => 'assets/js/smooth-scroll.js',
        'mobile-menu'     => 'assets/js/mobile-menu.js',
        'animations'      => 'assets/js/animations.js',
        'favorites'       => 'assets/js/favorites.js',
        'accordion'       => 'assets/js/accordion.js',
    ];

    foreach ($js_files as $handle => $path) {
        if (file_exists($theme_dir . '/' . $path)) {
            wp_enqueue_script(
                'bh-' . $handle,
                $theme_uri . '/' . $path,
                [],
                filemtime($theme_dir . '/' . $path),
                true
            );
        }
    }

    // Loan calculator (conditional)
    if (is_front_page() || is_page_template('page-loan.php') || is_singular('property')) {
        if (file_exists($theme_dir . '/assets/js/loan-calculator.js')) {
            wp_enqueue_script(
                'bh-loan-calculator',
                $theme_uri . '/assets/js/loan-calculator.js',
                [],
                filemtime($theme_dir . '/assets/js/loan-calculator.js'),
                true
            );
        }
    }

    // Property filter JS (conditional)
    if (is_post_type_archive('property')) {
        if (file_exists($theme_dir . '/assets/js/property-filter.js')) {
            wp_enqueue_script(
                'bh-property-filter',
                $theme_uri . '/assets/js/property-filter.js',
                [],
                filemtime($theme_dir . '/assets/js/property-filter.js'),
                true
            );
        }
    }
    // Instagram embed script (front page)
    if (is_front_page()) {
        wp_enqueue_script('instagram-embed', 'https://www.instagram.com/embed.js', [], null, true);
    }

    // TikTok embed script (property detail with TikTok URL)
    if (is_singular('property')) {
        $tiktok_url = get_post_meta(get_the_ID(), 'property_tiktok_url', true);
        if ($tiktok_url) {
            wp_enqueue_script('tiktok-embed', 'https://www.tiktok.com/embed.js', [], null, true);
        }
    }
}
add_action('wp_enqueue_scripts', 'builds_home_enqueue_assets');

// Preconnect for Google Fonts
function builds_home_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'builds_home_preconnect', 1);
