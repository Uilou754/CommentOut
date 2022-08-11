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
                            <time class='publish_date' datetime='<?php the_time('c'); ?>'><?php the_time('Y/m/d'); ?></time>
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
                                    <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                        <?php the_time('Y/m/d'); ?>
                                    </time>
                                    <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                        <i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?>
                                    </time>
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


    <div class="inner">
        <div class="col">
            <div class="pc_75 tab_66 sp_100">
                <?php
                //====================================================================
                //  1グループ
                //====================================================================
                $category_list01 = [
                    ['name'=>'HTML & CSS',          'slug'=>'htmlcss',          'class'=>'active'],
                    ['name'=>'Javascript & jQuery', 'slug'=>'javascriptjquery', 'class'=>''],
                    ['name'=>'PHP',                 'slug'=>'php',              'class'=>''],
                    ['name'=>'WordPress',           'slug'=>'wordpress',        'class'=>''],
                ]; ?>
                <!-- // タブキャプション // -->
                <div class="tab_captions tab_captions01">
                    <?php foreach ($category_list01 as $cate): ?>
                        <button class="<?php echo $cate['class']; ?>" data-caption="<?php echo $cate['slug']; ?>">
                            <?php echo $cate['name']; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <!-- // タブコンテンツ // -->
                <div class="tab_contents tab_contents01">
                    <?php foreach ($category_list01 as $cate): ?>
                        <div class="<?php echo $cate['class']; ?>" data-content="<?php echo $cate['slug']; ?>">
                            <?php
                            $result = new WP_Query(array(
                                'post_status' 	    => 'publish',
                                'post_type'         => 'post',
                                'cat'               => get_category_by_slug($cate['slug'])->term_id,
                                'posts_per_page'    => 6,
                                'orderby' 		    => 'date',
                                'order'			    => 'DESC'
                            ));
                            if ($result->have_posts()):
                                while ($result->have_posts()): $result->the_post(); ?>
                                    <div class='post_block'>
                                        <a href='<?php echo get_the_permalink(); ?>'>
                                            <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>'>
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
                                                <p class="content"><?php
                                                $content = wp_trim_words(strip_shortcodes(strip_tags(get_the_content())), 300, '...');
                                                echo $content;
                                                ?></p>
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
                                <div class='post_block'>
                                    <p>新しい記事はありません</p>
                                </div>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); // 投稿データをリセット ?>
                        </div>
                    <?php endforeach; ?>
                </div>


                <?php
                //====================================================================
                //  2グループ
                //====================================================================
                $category_list02 = [
                    ['name'=>'アルゴリズム',         'slug'=>'algorithm',        'class'=>'active'],
                    ['name'=>'インフラ関係',         'slug'=>'server',           'class'=>''],
                    ['name'=>'セキュリティ',         'slug'=>'security',         'class'=>''],
                ]; ?>
                <!-- // タブキャプション // -->
                <div class="tab_captions tab_captions02">
                    <?php foreach ($category_list02 as $cate): ?>
                        <button class="<?php echo $cate['class']; ?>" data-caption="<?php echo $cate['slug']; ?>">
                            <?php echo $cate['name']; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <!-- // タブコンテンツ // -->
                <div class="tab_contents tab_contents02">
                    <?php foreach ($category_list02 as $cate): ?>
                        <div class="<?php echo $cate['class']; ?>" data-content="<?php echo $cate['slug']; ?>">
                            <?php
                            $result = new WP_Query(array(
                                'post_status' 	    => 'publish',
                                'post_type'         => 'post',
                                'cat'               => get_category_by_slug($cate['slug'])->term_id,
                                'posts_per_page'    => 6,
                                'orderby' 		    => 'date',
                                'order'			    => 'DESC'
                            ));
                            if ($result->have_posts()):
                                while ($result->have_posts()): $result->the_post(); ?>
                                    <div class='post_block'>
                                        <a href='<?php echo get_the_permalink(); ?>'>
                                            <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>'>
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
                                                <p class="content"><?php
                                                $content = wp_trim_words(strip_shortcodes(strip_tags(get_the_content())), 300, '...');
                                                echo $content;
                                                ?></p>
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
                                <div class='post_block'>
                                    <p>新しい記事はありません</p>
                                </div>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); // 投稿データをリセット ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="pc_25 tab_33 sp_100">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6675900840665799"
                    crossorigin="anonymous"></script>
                <!-- サイドバー -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-6675900840665799"
                    data-ad-slot="4206144562"
                    data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>

                <p>※業務システムの開発や既存システムのリプレイス、ホームページの技術的なサポート等のお仕事のご依頼や取材、掲載依頼等は<a href="/contact.html">お問い合わせ</a>からご連絡ください。一人で運営しております都合上、お返事が遅くなることがありますが、ご了承くださいませ。</p>

                <!-- サイドバー -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</article>


<?php get_footer(); ?>