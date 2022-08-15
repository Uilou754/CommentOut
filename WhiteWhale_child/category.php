<?php get_header(); ?>

<article id="content" class="category">
    <div class="inner">
        <h1 class="entry-title"><?php single_term_title(); ?></h1>

        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="post_block">
                <a href="<?php echo get_the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
                <div class='date'>
                    <time class='publish_date' datetime='<?php the_time('c'); ?>'>
                        <?php the_time('Y/m/d'); ?>
                    </time>
                    <time class='modified_date' datetime='<?php the_modified_date('c'); ?>'>
                        <i class="fas fa-redo-alt"></i><?php the_modified_date('Y/m/d'); ?>
                    </time>
                </div>
                <div class="col">
                    <div class="pc_40 tab_45 sp_100">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <img src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>"/>
                        </a>
                    </div>
                    <div class="pc_60 tab_55 sp_100">
                        <p><?php
                        $content = wp_trim_words(strip_shortcodes(strip_tags(get_the_content())), 600, '...');
                        echo $content;
                        ?></p>
                        <div class='categories'>
                            <?php $categories = get_the_category();
                            foreach ($categories as $category): ?>
                                <div class='cat_block'><?php echo $category->cat_name; ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>

        <!-- サイドバー -->
        <?php //get_sidebar(); ?>
    </div>
</article>

<?php get_footer(); ?>