        </div>

        <footer class="footer <?php if (get_theme_mod('ww_footer-total-position') === 'fixed') echo 'footer--fixed';/* 下部固定 */ ?>"
            style="<?php if (get_theme_mod('ww_footer-total-bgcolor')) echo 'background:' . esc_attr(get_theme_mod('ww_footer-total-bgcolor')) . ';';/* 背景色 */ ?>">
            <div class="footer__inner">
                <ul class="col">
                    <li class="pc_40 tab_35 sp_100">
                        <div class="footer_logo"><?php bloginfo('name'); ?></div>
                    </li>
                    <li class="pc_35 tab_35 sp_100">
                        <!-- グローバルメニュー -->
                        <ul class="col">
                            <li class="pc_50 tab_50 sp_100">
                                <?php
                                wp_nav_menu(array(
                                    'menu'          => 'FooterMenuLeft',
                                    'container'     => 'nav',
                                    'items_wrap'    => '<ul id="globalmenu--footer_left" class="globalmenu">%3$s</ul>'
                                )); ?>
                            </li>
                            <li class="pc_50 tab_50 sp_100">
                                <?php
                                wp_nav_menu(array(
                                    'menu'          => 'FooterMenuRight',
                                    'container'     => 'nav',
                                    'items_wrap'    => '<ul id="globalmenu--footer_right" class="globalmenu">%3$s</ul>'
                                ));
                                ?>
                            </li>
                        </ul>
                    </li>
                    <li class="pc_25 tab_30 sp_100">
                        <!-- イメージグリッド // -->
                        <div class="img_grid">
                            <?php
                            $result = new WP_Query(array(
                                'post_status' 	    => 'publish',
                                'post_type'         => 'post',
                                'category__not_in'  => array(
                                    get_category_by_slug('news')->term_id,
                                ),
                                'posts_per_page'    => 9,
                                'orderby' 		    => 'date',
                                'order'			    => 'DESC'
                            ));
                            if ($result->have_posts()): while ($result->have_posts()): $result->the_post(); ?>
                                <a class='img_grid_block' href='<?php echo get_the_permalink(); ?>'>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>">
                                </a>
                            <?php endwhile; endif;
                            // 投稿データをリセット
                            wp_reset_postdata();
                            ?>
                        </div>
                        <!-- // イメージグリッド -->
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