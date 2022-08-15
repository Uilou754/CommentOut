<?php get_header(); ?>

<article id="single">
    <div class="inner--mini">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h1 class="single__ttl"><?php the_title(); ?></h1>

            <div class='date'>
                公開日：<time class='publish_date' datetime='<?php the_time('c'); ?>'><?php the_time('Y/m/d'); ?></time>&emsp;
                最終更新日：<time class='modified_date' datetime='<?php the_modified_date('c'); ?>'><?php the_modified_date('Y/m/d'); ?></time>
            </div>

            <div class="eyecatch">
                <img class="back" src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>">
                <img class="front" src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>">
            </div>
            
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

            <?php the_content(); ?>

            <!-- AdSense // -->
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6675900840665799"
                crossorigin="anonymous"></script>
            <!-- 記事下部 -->
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-client="ca-pub-6675900840665799"
                data-ad-slot="8173309730"
                data-ad-format="auto"
                data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <!-- // AdSense -->

            <!-- コメントエリア -->
            <?php if (comments_open() && !post_password_required()) comments_template('', true); ?>
        <?php endwhile; endif; ?>

        <!-- サイドバー -->
        <?php //get_sidebar(); ?>
    </div>
</article>


<aside class="inner--mini">
    <!-- 関連記事 -->
    <div class="related_post">
        <?php
        $result = new WP_Query(array(
            'post_status' 	    => 'publish',
            'post_type'         => 'post',
            'category__not_in'  => get_category_by_slug('news')->term_id,
            'posts_per_page'    => 8,
            'orderby' 		    => 'rand',
            'order'			    => 'DESC'
        ));
        if ($result->have_posts()):
            while ($result->have_posts()): $result->the_post(); ?>
                <div class='related_post_block'>
                    <a href='<?php echo get_the_permalink(); ?>'>
                        <img src='<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>'>
                        <div class='post_block__text'>
                            <div class='date'>
                                <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                    <?php the_time('Y/m/d'); ?>
                                </time>
                                <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                    <i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?>
                                </time>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <div class='categories'>
                                <?php $categories = get_the_category();
                                foreach ($categories as $category): ?>
                                    <div class='cat_block'><?php echo $category->cat_name; ?></div>
                                <?php endforeach; ?>
                            </div>
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
</aside>


<?php get_footer(); ?>