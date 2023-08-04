<?php

add_action('after_setup_theme', function () {
    // head内にタイトルタグを自動挿入
    add_theme_support( 'title-tag' );
    // head内にRSS等用のフィードを自動挿入
    add_theme_support( 'automatic-feed-links' );
    // カスタムロゴを有効化
    add_theme_support( 'custom-logo' ); 
    // アイキャッチをサムネイルとして表示
    add_theme_support( 'post-thumbnails' );
    // 検索窓を表示
    add_theme_support( 'html5', array( 'search-form' ) );

    // カスタマイザーのカスタムロゴを有効化
    add_theme_support( 'custom-logo' ); 

    global $content_width;
    if (!isset($content_width)) $content_width = 1920;

    // メニューの位置を設定
    register_nav_menus(array(
        'header01--nav' => 'ヘッダーナビゲーション（キービジュアル上）',
        'header02--nav' => 'ヘッダーナビゲーション（キービジュアル下）',
        'sidebar--nav' => 'サイドナビゲーション',
        'footer--nav' => 'フッターナビゲーション',
    ));
});


// 基本のCSSとjQueryを読み込む処理
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('ww-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
});

add_filter('document_title_separator', function ($sep) {
    $sep = '|';
    return $sep;
});

add_filter('the_title', function ($title) {
    return ($title == '')? '...': $title;
});

add_filter('the_content_more_link', function () {
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
});

add_filter('excerpt_more', function ($more) {
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
});

add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    unset($sizes['medium_large']);
    return $sizes;
});

add_action('wp_head', function () {
    if (is_singular() && pings_open()) printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
});

add_action('comment_form_before', function () {
    if (get_option('thread_comments')) wp_enqueue_script('comment-reply');
});

function ww_custom_pings($comment) {
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

add_filter('get_comments_number', function ($count) {
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}, 0);

// スラッグ名を取得
function ww_get_slug() {
    $post_obj =  $GLOBALS['wp_the_query']->get_queried_object();
    $slug = '';

    if(is_home() || is_front_page()) {       // フロントページの場合
        $slug = 'home';
        if(is_page() && get_post( get_the_ID() )->post_name) $slug = $post_obj->post_name;
    } elseif (is_category()) {  // カテゴリーの場合
        $slug = 'cat-' . $post_obj->category_nicename;
    } elseif (is_tag()) {       // タグの場合
        $slug = 'tag-' . $post_obj->slug;
    } elseif (is_singular()) {  // 投稿の場合
        $slug = $post_obj->post_type . '-' . $post_obj->post_name;
    } elseif (is_search()) {    // 検索画面の場合
        $slug  = $GLOBALS['wp_the_query']->posts ? 'search-results' : 'search-no-results';
    } elseif (is_404()) {       // 404ページの場合
        $slug = 'error404';
    } 

    // 取得したスラッグ名を返す
    return esc_attr($slug);
}

// テーマを有効化した時に実行される
add_action('after_switch_theme', function() {
    require_once(ABSPATH.'/wp-admin/includes/taxonomy.php');

    // 登録しようとしているカテゴリーが登録済みか確認する
    $cat_name = 'お知らせ';
    $cat_id = get_cat_ID($cat_name);
    if ($cat_id != 0 || !$cat_id) {
        $cat_id = wp_insert_category(array(
            'cat_name'              => $cat_name,
            'category_description'  => '',
            'category_nicename'     => 'news',
            'category_parent'       => ''
        ));
    }

    // 登録しようとしているカテゴリーが登録済みか確認する
    $cat_name = 'コラム';
    $cat_id = get_cat_ID($cat_name);
    if ($cat_id != 0 || !$cat_id) {
        $cat_id = wp_insert_category(array(
            'cat_name'              => $cat_name,
            'category_description'  => '',
            'category_nicename'     => 'column',
            'category_parent'       => ''
        ));
    }
});


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//	追加functionの読み込み
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// カスタマイザー
require_once get_template_directory() . '/functions/customizer.php';
// 追加ウィジェット
require_once get_template_directory() . '/functions/add_widget.php';