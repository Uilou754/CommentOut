<?php get_header(); ?>

<article <?php post_class(); ?>>
    <div class="inner">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <h2 class="entry-title"><?php the_title(); ?></h2> <?php edit_post_link(); ?>

            <?php if (has_post_thumbnail()) the_post_thumbnail(); ?>

            <?php the_content(); ?>

            <div class="entry-links"><?php wp_link_pages(); ?></div>

            <?php if(comments_open() && !post_password_required()) comments_template('', true); ?>
        <?php endwhile; endif; ?>

        <!-- サイドバー -->
        <?php //get_sidebar(); ?>
    </div>
</article>

<?php get_footer(); ?>