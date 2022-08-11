<?php get_header(); ?>

<main id="content">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <a href="<?php echo get_the_parmalink(); ?>">
            <?php the_title(); ?>
        </a>
        <?php the_content(); ?>

        <?php comments_template(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>