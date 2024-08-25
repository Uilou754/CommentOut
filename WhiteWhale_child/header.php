<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    
    <?php wp_head(); ?>

    <!-- Preconnect -->
    <link rel="preconnect" href="https://www.google.com"/>
    <link rel="preconnect" href="https://www.googletagmanager.com"/>
    <link rel="preconnect" href="https://googleads.g.doubleclick.net"/>
    <link rel="preconnect" href="https://fundingchoicesmessages.google.com"/>
    <link rel="preconnect" href="https://www.gstatic.com"/>
    <link rel="preconnect" href="https://pagead2.googlesyndication.com"/>
    <link rel="preconnect" href="https://cpwebassets.codepen.io"/>
    <link rel="preconnect" href="https://mtwidget03.affiliate.ashiato.rakuten.co.jp"/>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com"/>

    <!-- Preload CSS -->
    <link rel="preload" href="https://comment-out.net/wp-content/cache/autoptimize/css/autoptimize_single_c85e670108251e4032d716a95a57c616.css" as="style"/>

    <!-- Preload Script -->
    <link rel="preload" href="https://comment-out.net/wp-includes/js/jquery/jquery.min.js" as="script"/>
    <link rel="preload" href="https://comment-out.net/wp-includes/js/jquery/jquery-migrate.min.js" as="script"/>
    <link rel="preload" href="https://www.googletagmanager.com/gtag/js?id=G-GYEGJWW3TN&l=dataLayer&cx=c" as="script"/>
    <link rel="preload" href="https://www.googletagmanager.com/gtm.js?id=GTM-NGZZTPD" as="script"/>
    <link rel="preload" href="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6675900840665799" as="script"/>
    <link rel="preload" href="https://fundingchoicesmessages.google.com/i/ca-pub-6675900840665799?href=https%3A%2F%2Fcomment-out.net&ers=2" as="script"/>

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NGZZTPD');
    </script>
    <!-- End Google Tag Manager -->
</head>
<body class="<?php echo ww_get_slug(); ?>">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGZZTPD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
