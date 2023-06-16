<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    
    <?php wp_head(); ?>
    
	<link rel='stylesheet' href="<?php echo get_stylesheet_directory_uri(); ?>/css/style_sp.css" media='all and (max-width:460px)'>
	<link rel='stylesheet' href="<?php echo get_stylesheet_directory_uri(); ?>/css/style_tab.css" media='all and (min-width:460px) and (max-width:768px)'>
	<link rel='stylesheet' href="<?php echo get_stylesheet_directory_uri(); ?>/css/style_pc.css" media='all and (min-width:768px)'>

    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="<?php echo ww_get_slug(); ?>">

    <div class="topmost_message">エラーの修正や小さなプログラムの相談、社内システムのリビルド等、お仕事の依頼やシステムのご相談は<a href="<?php echo esc_url(home_url('/')); ?>contact.html">お問い合わせフォーム</a>にお願いします。</div>

    <header class="header <?php if (get_theme_mod('ww_header-total-position') === 'fixed') echo 'header--fixed';/* 上部固定 */ ?>"
        style="<?php if (get_theme_mod('ww_header-total-bgcolor')) echo 'background:' . esc_attr(get_theme_mod('ww_header-total-bgcolor')) . ';';/* 背景色 */ ?>">
        <div class="header__inner">
            <!-- サイトロゴ or サイトタイトル -->
            <a class="site_ttl" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                <?php if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
                } ?>
            </a>

            <?php
            // グローバルメニュー（ヘッダーナビゲーション（キービジュアル下））
            if (has_nav_menu('header02--nav'))
                wp_nav_menu(array(
                    'theme_location'    => 'header02--nav',
                    'container'         => 'nav',
                    'items_wrap'        => '<ul id="globalmenu--header02" class="headermenu">%3$s</ul>'
                ));

            // グローバルメニュー（ヘッダーナビゲーション（キービジュアル上））
            if (has_nav_menu('header01--nav')) {
                wp_nav_menu(array(
                    'theme_location'    => 'header01--nav',
                    'container'         => 'nav',
                    'items_wrap'        => '<ul id="globalmenu--header01" class="globalmenu">%3$s</ul>'
                ));
            }
            ?>
            <div class="header__hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <div id="container">
