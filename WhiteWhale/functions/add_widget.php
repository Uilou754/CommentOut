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

    //WidgetをWordPressに登録する
    //register_widget('ImageLinkWidget');
});

// ウィジェットクラス
/*class ImageLinkWidget extends WP_Widget{
	/**
	 * Widgetを登録する
	 */
	/*function __construct() {
		parent::__construct(
			'image_link_widget', // Base ID
			'画像リンク', // Name
			array('description' => '画像リンクを追加します。バナー広告などを掲載するときにどうぞ',) // Args
		);
	}

	/** 表側の Widget を出力する
	 * @param array $args      'register_sidebar'で設定した「before_title, after_title, before_widget, after_widget」が入る
	 * @param array $instance  Widgetの設定項目
	 */
	/*public function widget( $args, $instance ) {
        $link_url = $instance['link_url'];
        $img_path = $instance['img_path'];
		echo $args['before_widget'];
        echo "<a href='${link_url}'><img src='${img_path}' /></a>";
        echo $args['after_widget'];
	}

    /** Widget管理画面を出力する
     * @param array $instance 設定項目
     * @return string|void
     */
    /*public function form( $instance ){
        $link_url = $instance['link_url'];
        $link_url_name = $this->get_field_name('link_url');
        $link_url_id = $this->get_field_id('link_url');
        $img_path = $instance['img_path'];
        $img_path_name = $this->get_field_name('img_path');
        $img_path_id = $this->get_field_id('img_path');
        ?>
        <p>
            <label for="<?php echo $link_url_id; ?>">リンク先URL:</label>
            <input class="widefat" id="<?php echo $link_url_id; ?>" name="<?php echo $link_url_name; ?>" type="text" value="<?php echo esc_attr($link_url); ?>">
            <label for="<?php echo $img_path_id; ?>">画像PATH:</label>
            <input class="widefat" id="<?php echo $img_path_id; ?>" name="<?php echo $img_path_name; ?>" type="text" value="<?php echo esc_attr($img_path); ?>">
        </p>
        <?php
    }

    /** 新しい設定データが適切なデータかどうかをチェックする。
     * 必ず$instanceを返す。さもなければ設定データは保存（更新）されない。
     *
     * @param array $new_instance  form()から入力された新しい設定データ
     * @param array $old_instance  前回の設定データ
     * @return array               保存（更新）する設定データ。falseを返すと更新しない。
     */
    /*function update($new_instance, $old_instance) {
        if(!filter_var($new_instance['link_url'],FILTER_VALIDATE_URL)){
            return false;
        }
        if(!filter_var($new_instance['img_path'],FILTER_VALIDATE_URL)){
            return false;
        }
        return $new_instance;
    }
}*/