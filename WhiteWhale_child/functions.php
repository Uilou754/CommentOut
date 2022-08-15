<?php

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/style.css', array('parent-style'));

    // jQuery読み込み
    wp_enqueue_script('jquery-mini', 'https://code.jquery.com/jquery-3.6.0.min.js', false, false, true);
    // ハンバーガーメニュー
    wp_enqueue_script('hamburger_scripts', get_stylesheet_directory_uri().'/js/hamburger.js', array('jquery'), false, true);
});
