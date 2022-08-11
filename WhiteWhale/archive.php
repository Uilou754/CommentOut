<?php get_header(); ?>

<article id="content">
    <div class="inner">
        <header class="header">
            <h1 class="entry-title"><?php single_term_title(); ?></h1>
            
            <div class="archive-meta">
                <?php if ('' != the_archive_description()) echo esc_html(the_archive_description()); ?>
            </div>
        </header>

        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <a href="<?php echo get_the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
        
        <!-- サイドバー -->
        <?php //get_sidebar(); ?>
    </div>
</article>


<?php get_footer(); ?>