<?php get_header(); ?>

<article id="content" class="post not-found">
    <div class="inner">
        <header class="header">
            <h1 class="entry-title"><?php esc_html_e('Not Found', 'whitewhale'); ?></h1>
        </header>

        <div class="entry-content">
            <p><?php esc_html_e('Nothing found for the requested page. Try a search instead?', 'whitewhale'); ?></p>
            <?php get_search_form(); ?>
        </div>

        <!-- サイドバー -->
        <?php //get_sidebar(); ?>
    </div>
</article>

<?php get_footer(); ?>