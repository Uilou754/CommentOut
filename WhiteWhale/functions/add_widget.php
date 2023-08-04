<?php

add_action('widgets_init', function () {
    // サイドバーエリアを追加する
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'ww_sidebar'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

	register_sidebar(array(
		'name'          => 'サイドバー(上部)',
		'id'            => 'my_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

	register_sidebar(array(
		'name'          => 'フッター1カラム目',
		'id'            => 'ww_footer_first_column',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

	register_sidebar(array(
		'name'          => 'フッター2カラム目',
		'id'            => 'ww_footer_two_column',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));

	register_sidebar(array(
		'name'          => 'フッター3カラム目',
		'id'            => 'ww_footer_three_column',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	));
});
