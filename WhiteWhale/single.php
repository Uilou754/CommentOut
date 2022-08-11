<?php get_header(); ?>

<article id="single">
    <div class="inner--mini">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h1 class="single__ttl"><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <!-- コメントエリア -->
            <?php if (comments_open() && !post_password_required()) comments_template('', true); ?>
        <?php endwhile; endif; ?>

        <!-- サイドバー -->
        <?php get_sidebar(); ?>
    </div>
</article>

<?php get_footer(); ?>