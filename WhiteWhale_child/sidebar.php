<aside id="sidebar">
    <!-- グローバルメニュー（サイドナビゲーション） -->
    <?php if (has_nav_menu('sidebar--nav')) wp_nav_menu(array(
        'theme_location' => 'sidebar--nav',
        'container' => 'nav',
        'items_wrap' => '<ul id="globalmenu--sidebar" class="globalmenu">%3$s</ul>'
    )); ?>

    <?php if (is_active_sidebar('primary-widget-area')): ?>
        <?php dynamic_sidebar('primary-widget-area'); ?>
    <?php endif; ?>
</aside>