<?php get_header();?>


<article id="home">
    <!-- コンテンツブロック：最新のお知らせを1件表示 // -->
    <section class="news">
        <div class="inner">
            <?php
            $result = new WP_Query(array(
                'post_status' 	    => 'publish',
                'post_type'         => 'post',
                'cat'               => get_category_by_slug('news')->term_id,
                'posts_per_page'    => 1,
                'orderby' 		    => 'date',
                'order'			    => 'DESC'
            ));
            if ($result->have_posts()):
                while ($result->have_posts()): $result->the_post(); ?>
                    <div class='news_block'>
                        <a href='<?php echo get_the_permalink(); ?>'>
                            <time class='publish_date'><?php the_time('Y/m/d'); ?></time>
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                <?php endwhile;
            else: ?>
                <div class='news_block'>
                    <p>新着のお知らせはありません</p>
                </div>
            <?php endif;
            // 投稿データをリセット
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <!-- // コンテンツブロック：最新のお知らせを1件表示 -->

    <!-- コンテンツブロック：先頭記事4件 // -->
    <section class="latest_post">
        <div class="inner">
            <?php
            $result = new WP_Query(array(
                'post_status' 	    => 'publish',
                'post_type'         => 'post',
                'category__not_in'  => array(
                    get_category_by_slug('news')->term_id,
                ),
                'posts_per_page'    => 4,
                'orderby' 		    => 'date',
                'order'			    => 'DESC'
            ));
            if ($result->have_posts()) {
                while ($result->have_posts()): $result->the_post(); ?>
                    <div class='latest_post_block'>
                        <a href='<?php echo get_the_permalink(); ?>'>
                            <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>'>
                            <div class='latest_post_block__text'>
                                <div class='date'>
                                    <time class='publish_date'><?php the_time('Y/m/d'); ?></time>
                                    <time class='modified_date'><i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?></time>
                                </div>
                                <div class='categories'>
                                    <?php $categories = get_the_category();
                                    foreach ($categories as $category): ?>
                                        <div class='cat_block'><?php echo $category->cat_name; ?></div>
                                    <?php endforeach; ?>
                                </div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
            } else {
                echo "
                    <div>
                        <p>新しい記事はありません</p>
                    </div>";
            }
            // 投稿データをリセット
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <!-- // コンテンツブロック：先頭記事4件 -->


    <div class="col">
        <div class="pc_75 tab_66 sp_100">
            <!-- コンテンツブロック：コンテンツ部分 // -->
            <!-- // コンテンツブロック： -->
        </div>
        <div class="pc_25 tab_33 sp_100">
            <!-- サイドバー -->
            <?php get_sidebar(); ?>
        </div>
    </div>


    <!-- コンテンツブロック：お知らせ一覧 // -->
    <section class="news">
        <div class="inner">
            <h2 class="ttl">お知らせ</h2>
            <ul>
                <?php
                $result = new WP_Query(array(
                    'post_status' 	=> 'publish',
                    'post_type'     => 'post',
                    'posts_per_page'=> 10,
                    'orderby' 		=> 'date',
                    'order'			=> 'DESC'
                ));
                if ($result->have_posts()) {
                    while ($result->have_posts()) {
                        $result->the_post();
                        echo '
                            <li>
                                <a href="' . get_the_permalink() . '">
                                    <span class="publish_date">' . get_the_time('Y年m月d日' ) . '</span>
                                    ' . get_the_title() . '
                                </a>
                            </li>';
                    }
                } else {
                    echo '<li><p>新しい記事はありません</p>';
                }
                // 投稿データをリセット
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </section>
    <!-- // コンテンツブロック：お知らせ一覧 -->
</article>


<?php get_footer(); ?>