<?php
/**
 * Functions.php
 *
 * @since 1.0.0
 */

// 定数の設定
define('VITE_URL', 'http://localhost:5173/wp-content/themes/smiron-hp/public/dist/');

// Viteの開発モード時のhotファイルが存在するかどうかを返す
if (!function_exists('isViteHotFileExists')) {
    function isViteHotFileExists() {
        return file_exists(get_template_directory() . '/public/hot');
    }
}

// テーマのCSS・JSを読み込む
if (!function_exists('addThemeAssets')) {
    function addThemeAssets($cssPath = null, $jsPath = null) {
        // Viteのhotファイルが存在する場合は、Viteのクライアントを読み込む
        if (isViteHotFileExists()) {

            // Viteのクライアントを追加
            add_action('wp_head', function() { echo '<script type="module" src="' . VITE_URL . '@vite/client"></script>'; }, 99);

            // Viteの開発モード時のhotファイルが存在する場合は、Viteの開発モードでCSS・JSを読み込む
            add_action('wp_enqueue_scripts', function() use ($cssPath, $jsPath) {
                if (!empty($cssPath)) {
                    if (is_array($cssPath)) {
                        foreach ($cssPath as $key => $path) {
                            wp_enqueue_style('vite' . $key, VITE_URL . $path, '', false, 'all');
                        }
                    } else {
                        wp_enqueue_style('vite', VITE_URL . $cssPath, '', false, 'all');
                    }
                }

                if (!empty($jsPath)) {
                    if (is_array($jsPath)) {
                        foreach ($jsPath as $key => $path) {
                            wp_enqueue_script('theme' . $key, VITE_URL . $path, '', false, true);
                        }
                    } else {
                        wp_enqueue_script('theme', VITE_URL . $jsPath, '', false, true);
                    }
                }
            }, 99);
        }
        else {
            // Viteのhotファイルが存在しない場合は、manifest.jsonからCSS・JSのパスを取得して読み込む
            $manifest = json_decode(file_get_contents(get_template_directory() . '/public/dist/manifest.json'), true);

            add_action('wp_enqueue_scripts', function() use ($manifest, $cssPath, $jsPath) {
                if (!empty($cssPath)) {
                    if (is_array($cssPath)) {
                        foreach ($cssPath as $key => $path) {
                            wp_enqueue_style('theme' . $key, get_template_directory_uri() . '/public/dist/' . $manifest[$path]['file'], '', false, 'all');
                        }
                    } else {
                        wp_enqueue_style('theme', get_template_directory_uri() . '/public/dist/' . $manifest[$cssPath]['file'], '', false, 'all');
                    }
                }
    
                if (!empty($jsPath)) {
                    if (is_array($jsPath)) {
                        foreach ($jsPath as $key => $path) {
                            wp_enqueue_script('theme' . $key, get_template_directory_uri() . '/public/dist/' . $manifest[$path]['file'], '', false, true);
                        }
                    } else {
                        wp_enqueue_script('theme', get_template_directory_uri() . '/public/dist/' . $manifest[$jsPath]['file'], '', false, true);
                    }
                }
            }, 99);
            
        }
    }
}