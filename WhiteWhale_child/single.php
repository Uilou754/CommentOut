<?php get_header(); ?>

<article id="single">
    <div class="inner--mini">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h1 class="single__ttl"><?php the_title(); ?></h1>

            <div class='date'>
                公開日：<time class='publish_date' datetime='<?php the_time('c'); ?>'><?php the_time('Y/m/d'); ?></time>&emsp;
                最終更新日<time class='modified_date' datetime='<?php the_modified_date('c'); ?>'><?php the_modified_date('Y/m/d'); ?></time>
            </div>

            <div class="eyecatch">
                <img class="back" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
                <img class="front" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
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
        <?php get_sidebar(); ?>
    </div>
</article>

<?php get_footer(); ?>