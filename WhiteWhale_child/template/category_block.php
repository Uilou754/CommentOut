
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
    <div class='categories'>
        <?php $categories = get_the_category();
        foreach ($categories as $category): ?>
            <div class='cat_block'><?php echo $category->cat_name; ?></div>
        <?php endforeach; ?>
    </div>
    <div class="col">
        <div class="pc_35 tab_45 sp_100">
            <a href="<?php echo get_the_permalink(); ?>">
                <img class="eyecatch_img" src="<?php echo (has_post_thumbnail())? get_the_post_thumbnail_url(get_the_ID(), 'full'): get_stylesheet_directory_uri()."/img/NoImage.png"; ?>"
                    alt="<?php echo get_the_title(); ?>" loading="lazy"/>
            </a>
        </div>
        <div class="pc_65 tab_55 sp_100">
            <p class="excerpt"><?php echo wp_trim_words(strip_shortcodes(strip_tags(get_the_content())), 240, '...'); ?></p>
        </div>
    </div>
</div>