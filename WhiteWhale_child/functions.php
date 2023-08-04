<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/style.css', array('parent-style'));

    // jQuery読み込み
    //wp_enqueue_script('jquery-mini', 'https://code.jquery.com/jquery-3.6.0.min.js', false, false, true);
});

if ( function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
    set_post_thumbnail_size(280, 280); // 初期設定の投稿サムネイル値
}
add_image_size('thumb100', 100, 100, true);
add_image_size('thumb280', 280, 280, true);
add_image_size('thumb640', 640, 360, true);