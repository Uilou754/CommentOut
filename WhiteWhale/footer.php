        </div>

        <footer class="footer <?php if (get_theme_mod('ww_footer-total-position') === 'fixed') echo 'footer--fixed';/* 下部固定 */ ?>"
            style="<?php if (get_theme_mod('ww_footer-total-bgcolor')) echo 'background:' . esc_attr(get_theme_mod('ww_footer-total-bgcolor')) . ';';/* 背景色 */ ?>">
            <div class="footer__inner">
                <!-- グローバルメニュー（フッターナビゲーション） -->
                <?php
                if (has_nav_menu('footer--nav')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer--nav',
                        'container' => 'nav',
                        'items_wrap' => '<ul id="globalmenu--footer" class="globalmenu">%3$s</ul>'
                    ));
                } ?>

                <!-- フッターカラム -->
                <ul class="col">
                    <!-- 1カラム目 -->
                    <li class="<?php switch (get_theme_mod('ww_footer-total-column')) {
                        case '1': echo 'pc_100 tab_100 sp_100'; break;
                        case '72': echo 'pc_75 tab_75 sp_100'; break;
                        case '64': echo 'pc_60 tab_60 sp_100'; break;
                        case '55': echo 'pc_50 tab_50 sp_100'; break;
                        case '46': echo 'pc_40 tab_40 sp_100'; break;
                        case '27': echo 'pc_25 tab_25 sp_100'; break;
                        case '333': echo 'pc_33 tab_33 sp_100'; break;
                    } ?>">
                        <?php if (is_active_sidebar('ww_footer_first_column')) dynamic_sidebar('ww_footer_first_column'); ?>
                    </li>
                    <!-- 2カラム目 -->
                    <li class="<?php switch (get_theme_mod('ww_footer-total-column')) {
                        case '1': echo 'pc_off tab_off sp_off'; break;
                        case '72': echo 'pc_25 tab_25 sp_100'; break;
                        case '64': echo 'pc_40 tab_40 sp_100'; break;
                        case '55': echo 'pc_50 tab_50 sp_100'; break;
                        case '46': echo 'pc_60 tab_60 sp_100'; break;
                        case '27': echo 'pc_75 tab_75 sp_100'; break;
                        case '333': echo 'pc_33 tab_33 sp_100'; break;
                    } ?>">
                        <?php if (is_active_sidebar('ww_footer_two_column')) dynamic_sidebar('ww_footer_two_column'); ?>
                    </li>
                    <!-- 3カラム目 -->
                    <li class="<?php switch (get_theme_mod('ww_footer-total-column')) {
                        case '1': echo 'pc_off tab_off sp_off'; break;
                        case '72': echo 'pc_off tab_off sp_off'; break;
                        case '64': echo 'pc_off tab_off sp_off'; break;
                        case '55': echo 'pc_off tab_off sp_off'; break;
                        case '46': echo 'pc_off tab_off sp_off'; break;
                        case '27': echo 'pc_off tab_off sp_off'; break;
                        case '333': echo 'pc_33 tab_33 sp_100'; break;
                    } ?>">
                        <?php if (is_active_sidebar('ww_footer_three_column')) dynamic_sidebar('ww_footer_three_column'); ?>
                    </li>
                </ul>
            </div>
        </footer>

        <div id="copyright" style="<?php
            if (get_theme_mod('ww_footer-copyright-bgcolor')) echo 'background: '.esc_attr(get_theme_mod('ww_footer-copyright-bgcolor')).';';/*背景色*/ ?>">
            <div class="footer__inner" style="<?php
                if (get_theme_mod('ww_footer-copyright-fcolor')) echo 'color: '.esc_attr(get_theme_mod('ww_footer-copyright-fcolor')).';';/*文字色*/
                if (get_theme_mod('ww_footer-copyright-fsize')) echo 'font-size: '.esc_attr(get_theme_mod('ww_footer-copyright-fsize')).'px;';/*文字サイズ*/ ?>">
                &copy; <?php echo esc_html(get_bloginfo('name')); ?>
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>