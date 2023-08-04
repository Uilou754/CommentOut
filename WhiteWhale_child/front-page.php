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
                            <img
                                src='<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'thumb640'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>'
                                alt='<?php echo get_the_title(); ?>' />
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
                    ['name'=>'すべて',              'slug'=>'all',              'class'=>'red'],
                    ['name'=>'HTML & CSS',          'slug'=>'htmlcss',          'class'=>'yellow'],
                    ['name'=>'Javascript & jQuery', 'slug'=>'javascriptjquery', 'class'=>'green'],
                    ['name'=>'PHP',                 'slug'=>'php',              'class'=>'red'],
                    ['name'=>'WordPress',           'slug'=>'wordpress',        'class'=>'blue'],
                    ['name'=>'アルゴリズム',         'slug'=>'algorithm',        'class'=>'yellow'],
                    ['name'=>'インフラ関係',         'slug'=>'server',           'class'=>'blue'],
                    ['name'=>'セキュリティ',         'slug'=>'security',         'class'=>'green'],
                ]; ?>
                <div class="tabs">
                    <!-- カテゴリーキャプション // -->
                    <?php foreach ($category_list as $cate): ?>
                        <div
                            class="category_caption <?php if ($cate['slug'] == 'all') echo "category_caption--open"; ?>"
                            name="<?php echo $cate['slug']; ?>"><?php echo $cate['name']; ?></div>
                    <?php endforeach; ?>
                    <!-- // カテゴリーキャプション -->

                    <!-- カテゴリーコンテンツ // -->
                    <div class="category_content">
                        <?php
                        $result = new WP_Query(array(
                            'post_status' 	    => 'publish',
                            'post_type'         => 'post',
                            'category__not_in'  => array(
                                get_category_by_slug('news')->term_id,
                            ),
                            'posts_per_page'    => 8,
                            'orderby' 		    => 'date',
                            'order'			    => 'DESC'
                        ));
                        if ($result->have_posts()): while ($result->have_posts()): $result->the_post(); ?>
                            <div class='post_block'>
                                <a class="post_block__thumbnail" href='<?php echo get_the_permalink(); ?>'>
                                    <img
                                        src='<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'thumb280'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>'
                                        alt='<?php echo get_the_title(); ?>' loading="lazy" />
                                </a>
                                <div class='post_block__text'>
                                    <a href='<?php echo get_the_permalink(); ?>'>
                                        <h2><?php echo get_the_title(); ?></h2>
                                        <div class='date'>
                                            <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                                                <?php the_time('Y/m/d'); ?>
                                            </time>
                                            <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                                                <i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?>
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
                        <?php endwhile; else: ?>
                            <div class='post_block'>
                                <p>新しい記事はありません</p>
                            </div>
                        <?php endif; wp_reset_postdata(); // 投稿データをリセット ?>
                    </div>
                    <!-- // カテゴリーコンテンツ -->
                </div>
            </div>
            <!-- // コンテンツ左側 -->

            <!-- コンテンツ右側 // -->
            <div class="single-flex__side">
                <div class="sidebar_profile">
                    <div class="sidebar_profile__title">管理人について</div>
                    <img class="sidebar_profile__background" src="<?php echo get_stylesheet_directory_uri(); ?>/img/profile_background.jpg" loading="lazy" />
                    <div class="sidebar_profile__contents">
                        <img class="sidebar_profile__img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/AdminImage.jpg" loading="lazy" />
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