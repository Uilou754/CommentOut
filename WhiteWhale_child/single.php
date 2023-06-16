<?php get_header(); ?>

<article id="single">
    <div class="inner">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>

            <!-- アイキャッチ -->
            <div class="eyecatch">
                <img
                    class="back"
                    src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>"
                    alt="<?php echo get_the_title(); ?>"/>
                <img
                    class="front"
                    src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>"
                    alt="<?php echo get_the_title(); ?>"/>
            </div>

            <!-- 記事タイトル -->
            <h1 class="single__ttl"><?php the_title(); ?></h1>

            <!-- 公開日・更新日 -->
            <div class='date'>
                公開日：<time class='publish_date' datetime='<?php the_time('c'); ?>'><?php the_time('Y/m/d'); ?></time>&emsp;
                最終更新日：<time class='modified_date' datetime='<?php the_modified_date('c'); ?>'><?php the_modified_date('Y/m/d'); ?></time>
            </div>

            <div class="single-flex">
                <div class="single-flex__contents">
                    <!-- AdSense // -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6675900840665799"
                        crossorigin="anonymous"></script>
                    <!-- アイキャッチ下広告 -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-6675900840665799"
                        data-ad-slot="2470578370"
                        data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <!-- // AdSense -->

                    <div class="contents">
                        <?php the_content(); ?>
                    </div>

                    <!-- AdSense // -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6675900840665799"
                        crossorigin="anonymous"></script>
                    <!-- 記事下部 -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="autorelaxed"
                        data-ad-client="ca-pub-6675900840665799"
                        data-ad-slot="9104267506"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <!-- // AdSense -->

                    <!-- 筆者紹介エリア -->
                    <div class="author_block">
                        <div class="author_block--left">
                            <p class="author_block__caption">この記事を書いた人</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/AdminImage.jpg" alt="uilou"/>
                        </div>
                        <div class="author_block--right">
                            <p class="author_block__name">uilou</p>
                            <p class="author_block__job">プログラマー</p>
                            <p class="author_block__greeting">
                                基本的に、自分自身の備忘録のつもりでブログを書いています。
                                自分と同じ所で詰まった人の助けになれば良いかなと思います。
                                システムのリファクタリングを得意としており、バックエンド、フロントエンド、アプリケーション、SQLなど幅広い知識と経験があります。
                                広いだけでなく、知識をもっと深堀りしていきたいですね。
                            </p>
                        </div>
                    </div>

                    <!-- コメントエリア -->
                    <?php if (comments_open() && !post_password_required()) comments_template('', true); ?>
                </div>

                <div class="single-flex__side">
                    <!-- サイドバー -->
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</article>
               

<aside class="inner">
    <div class="col">
        <div class="pc_50 tab_50 sp_100">
            <!-- 新着記事 -->
            <h2 class="section-ttl">新着記事</h2>
            <div class="related_post">
                <?php
                $result = new WP_Query(array(
                    'post_status' 	    => 'publish',
                    'post_type'         => 'post',
                    'category__not_in'  => get_category_by_slug('news')->term_id,
                    'posts_per_page'    => 5,
                    'orderby' 		    => 'date',
                    'order'			    => 'DESC'
                ));
                if ($result->have_posts()):
                    while ($result->have_posts()): $result->the_post(); ?>
                        <div class='related_post_block'>
                            <a href='<?php echo get_the_permalink(); ?>'>
                                <div class='date'>
                                    <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                        <?php the_time('Y/m/d'); ?>
                                    </time>
                                    <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                        <i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?>
                                    </time>
                                </div>
                                <h2><?php echo get_the_title(); ?></h2>
                                <div class='categories'>
                                    <?php $categories = get_the_category();
                                    foreach ($categories as $category): ?>
                                        <div class='cat_block'><?php echo $category->cat_name; ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="related_post_block">
                        <p>新しい記事はありません</p>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); // 投稿データをリセット ?>
            </div>
            <!-- 新着記事 -->
        </div>
        <div class="pc_50 tab_50 sp_100">
            <!-- 関連記事 -->
            <h2 class="section-ttl">同じカテゴリーの記事</h2>
            <div class="related_post">
                <?php
                $result = new WP_Query(array(
                    'post_status' 	    => 'publish',
                    'post_type'         => 'post',
                    'category__in'      => get_the_category()[0]->cat_ID,
                    'category__not_in'  => get_category_by_slug('news')->term_id,
                    'posts_per_page'    => 5,
                    'orderby' 		    => 'rand',
                    'order'			    => 'DESC'
                ));
                if ($result->have_posts()):
                    while ($result->have_posts()): $result->the_post(); ?>
                        <div class='related_post_block'>
                            <a href='<?php echo get_the_permalink(); ?>'>
                                <div class='date'>
                                    <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                        <?php the_time('Y/m/d'); ?>
                                    </time>
                                    <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                        <i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?>
                                    </time>
                                </div>
                                <h2><?php echo get_the_title(); ?></h2>
                                <div class='categories'>
                                    <?php $categories = get_the_category();
                                    foreach ($categories as $category): ?>
                                        <div class='cat_block'><?php echo $category->cat_name; ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="related_post_block">
                        <p>新しい記事はありません</p>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); // 投稿データをリセット ?>
            </div>
            <!-- 関連記事 -->
        </div>
    </div>
</aside>


<?php get_footer(); ?>