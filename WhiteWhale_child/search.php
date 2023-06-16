<?php get_header(); ?>

<article id="content" class="category">
    <div class="inner">
        <div class="single-flex">
            <!-- コンテンツ左側 // -->
            <div class="single-flex__contents">
                <h1 class="entry-title">『<?php the_search_query(); ?>』の検索結果</h1>

                <?php
                if (have_posts() && get_search_query()):
                    while (have_posts()): the_post();
                        get_template_part('template/category_block');
                    endwhile;
                endif; ?>

                <!-- ページネーション -->
                <?php the_posts_pagination(array(
                    'mid_size' => 1,
                    'prev_text' => '&lt;&lt;前へ',
                    'next_text' => '次へ&gt;&gt;',
                    'screen_reader_text' => ' ',
                )); ?>
            </div>
            <!-- // コンテンツ左側 -->

            <!-- コンテンツ右側 // -->
            <div class="single-flex__side">
                <!-- サイドバー -->
                <?php get_sidebar(); ?>
            </div>
            <!-- // コンテンツ右側 -->
        </div>
    </div>
</article>

<?php get_footer(); ?>