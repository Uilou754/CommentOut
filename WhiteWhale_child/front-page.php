<?php get_header();?>


<article id="home">

    <!-- コンテンツブロック：先頭記事4件 // -->
    <section class="latest_post">
        <div class="inner">
            <?php
            $result = new WP_Query(array(
                'post_status' 	    => 'publish',
                'post_type'         => 'post',
                'category__not_in'  => array(
                    get_category_by_slug('news')->term_id,  // お知らせ以外を表示
                ),
                'posts_per_page'    => 4,
                'orderby' 		    => 'date',
                'order'			    => 'DESC'
            ));
            if ($result->have_posts()) {
                while ($result->have_posts()): $result->the_post(); ?>
                    <div class='latest_post_block'>
                        <a href='<?php echo get_the_permalink(); ?>'>
                            <picture>
                                <source media="(min-width: 768px)" srcset="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'thumb640'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>"/>
                                <img
                                    fetchpriolity="high" loading="lazy"
                                    src='<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'medium'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>'
                                    alt='<?php echo get_the_title(); ?>' />
                            </picture>
                            <div class='latest_post_block__text'>
                                <div class='date'>
                                    <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                        投稿：<?php the_time('Y/m/d'); ?>
                                    </time>
                                    <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                        最終更新：<?php the_modified_date('Y/m/d'); ?>
                                    </time>
                                </div>
                                <div class='categories'>
                                    <?php $categories = get_the_category();
                                    foreach ($categories as $category): ?>
                                        <div class='cat_block'><?php echo $category->cat_name; ?></div>
                                    <?php endforeach; ?>
                                </div>
                                <h2><?php echo get_the_title(); ?></h2>
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
        <div class="single-flex">
            <!-- コンテンツ左側 // -->
            <div class="single-flex__contents">
                <?php
                $category_list = [
                    ['slug'=>'all',              'class'=>'red',    'name'=>'すべて'],
                    ['slug'=>'htmlcss',          'class'=>'yellow', 'name'=>'HTML & CSS'],
                    ['slug'=>'javascriptjquery', 'class'=>'green',  'name'=>'Javascript & jQuery'],
                    ['slug'=>'php',              'class'=>'red',    'name'=>'PHP'],
                    ['slug'=>'wordpress',        'class'=>'blue',   'name'=>'WordPress'],
                    ['slug'=>'algorithm',        'class'=>'yellow', 'name'=>'アルゴリズム'],
                    ['slug'=>'server',           'class'=>'blue',   'name'=>'インフラ関係'],
                    ['slug'=>'security',         'class'=>'green',  'name'=>'セキュリティ'],
                ];
                foreach ($category_list as $cate): ?>
                    <h3 class="category_caption"><?php echo $cate['name']; ?></h3>
                    
                    <?php
                    $result = new WP_Query(array(
                        'post_status' 	    => 'publish',
                        'post_type'         => 'post',
                        'category_name'     => ($cate['slug'] == 'all')? '': $cate['slug'],
                        'category__not_in'  => array(
                            get_category_by_slug('news')->term_id,
                        ),
                        'posts_per_page'    => 3,
                        'orderby' 		    => 'date',
                        'order'			    => 'DESC'
                    ));
                    if ($result->have_posts()): ?>
                        <div class="category_content">
                            <?php while ($result->have_posts()): $result->the_post(); ?>
                                <div class='post_block'>
                                    <a class="post_block__thumbnail" href='<?php echo get_the_permalink(); ?>'>
                                        <picture>
                                            <source media="(min-width: 768px)" srcset="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'thumb280'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>"/>
                                            <img loading="lazy"
                                                src='<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>'
                                                alt='<?php echo get_the_title(); ?>'/>
                                        </picture>
                                    </a>
                                    <div class='post_block__text'>
                                        <a href='<?php echo get_the_permalink(); ?>'>
                                            <h2><?php echo get_the_title(); ?></h2>
                                            <div class='date'>
                                                <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                                    投稿：<?php the_time('Y/m/d'); ?>
                                                </time>
                                                <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                                    最終更新：<?php the_modified_date('Y/m/d'); ?>
                                                </time>
                                            </div>
                                            <p class="content">
                                                <?php echo wp_trim_words(strip_shortcodes(strip_tags(get_the_content())), 300, '...'); ?>
                                            </p>
                                        </a>
                                        <div class='categories'>
                                            <?php $categories = get_the_category();
                                            foreach ($categories as $category): ?>
                                                <div class='cat_block'><?php echo $category->cat_name; ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class='post_block'>
                            <p>新しい記事はありません</p>
                        </div>
                    <?php endif; wp_reset_postdata(); // 投稿データをリセット ?>
                <?php endforeach; ?>
            </div>
            <!-- // コンテンツ左側 -->

            <!-- コンテンツ右側 // -->
            <div class="single-flex__side">
                <!-- MAF Rakuten Widget FROM HERE -->
                <script type="text/javascript">
                    MafRakutenWidgetParam = function() {
                        return {
                            size: '300x250',
                            design: 'slide',
                            recommend: 'on',
                            auto_mode: 'on',
                            a_id: '4145423',
                            border: 'off'
                        };
                    }
                </script>
                <script type="text/javascript" src="//image.moshimo.com/static/publish/af/rakuten/widget.js"></script>
                <!-- MAF Rakuten Widget TO HERE -->

                <div class="sidebar_profile">
                    <div class="sidebar_profile__title">管理人について</div>
                    <img loading="lazy" class="sidebar_profile__background" src="<?php echo get_stylesheet_directory_uri(); ?>/img/profile_background.jpg"/>
                    <div class="sidebar_profile__contents">
                        <img loading="lazy" class="sidebar_profile__img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/AdminImage.jpg"/>
                        <div class="sidebar_profile__name">uilou</div>
                        <div class="sidebar_profile__job">プログラマー</div>
                        <p class="sidebar_profile__text">基本的に、自分自身の備忘録のつもりでブログを書いています。自分と同じ所で詰まった人の助けになれば良いかなと思います。システムのリファクタリングを得意としており、バックエンド、フロントエンド、アプリケーション、SQLなど幅広い知識と経験があります。広いだけでなく、知識をもっと深堀りしていきたいですね。</p>
                        <div class="col">
                            <div class="pc_50 tab_50 sp_100">
                                <a class="sidebar_profile__contact_btn" href="/about.html">PROFILE</a>
                            </div>
                            <div class="pc_50 tab_50 sp_100">
                                <a class="sidebar_profile__contact_btn" href="/contact.html">CONTACT</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- サイドバー -->
                <?php get_sidebar(); ?>
                
                <p>※業務システムの開発や既存システムのリプレイス、ホームページの技術的なサポート等のお仕事のご依頼や取材、掲載依頼等は<a href="/contact.html">お問い合わせ</a>からご連絡ください。一人で運営しております都合上、お返事が遅くなることがありますが、ご了承くださいませ。</p>
            </div>
            <!-- // コンテンツ右側 -->
        </div>
    </div>
</article>


<?php get_footer(); ?>