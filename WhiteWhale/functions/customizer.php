<?php
//================================
// カスタマイザーを加工するPHP
//================================

function ww_customize($wp_customize) {
    //================================
    //  ヘッダー
    //================================
    $wp_customize->add_panel(
        'ww_header',
        array(
            'title'     => 'ヘッダー',
            'priority'  => 61,
        )
    );

    // 全体（セクション）
    $wp_customize->add_section(
        'ww_header-total',
        array(
            'title'     => '全体',
            'panel'     => 'ww_header',
            'priority'  => 1,
        )
    );

    // 配置（セッティング＆コントロール）
    $wp_customize->add_setting('ww_header-total-position');
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'ww_header-total-position-control',
            array(
                'label'     => '配置',
                'section'   => 'ww_header-total',
                'settings'  => 'ww_header-total-position',
                'type'      => 'radio',
                'choices'   => array(
                    'free'  => 'ヘッダーを上部固定しない',
                    'fixed' => 'ヘッダーを上部固定する',
                ),
                'priority'  => 1,
            )
        )
    );

    // 背景色（セッティング＆コントロール）
    $wp_customize->add_setting('ww_header-total-bgcolor');
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ww_header-total-bgcolor-control',
            array(
                'label'     => '背景色',
                'section'   => 'ww_header-total',
                'settings'  => 'ww_header-total-bgcolor',
                'priority'  => 2,
            )
        )
    );

    
    //================================
    //  フッター
    //================================
    $wp_customize->add_panel(
        'ww_footer',
        array(
            'title'     => 'フッター',
            'priority'  => 101,
        )
    );

    // コピーライト（セクション）
    $wp_customize->add_section(
        'ww_footer-total',
        array(
            'title'     => '全体',
            'panel'     => 'ww_footer',
            'priority'  => 1,
        )
    );

    // 配置（セッティング＆コントロール）
    $wp_customize->add_setting('ww_footer-total-position');
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'ww_footer-total-position-control',
            array(
                'label'     => '配置',
                'section'   => 'ww_footer-total',
                'settings'  => 'ww_footer-total-position',
                'type'      => 'radio',
                'choices'   => array(
                    'free'  => 'フッターを下部固定しない',
                    'fixed' => 'フッターを下部固定する',
                ),
                'priority'  => 1,
            )
        )
    );

    // 背景色（セッティング＆コントロール）
    $wp_customize->add_setting('ww_footer-total-bgcolor');
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ww_footer-total-bgcolor-control',
            array(
                'label'     => '背景色',
                'section'   => 'ww_footer-total',
                'settings'  => 'ww_footer-total-bgcolor',
                'priority'  => 2,
            )
        )
    );

    // フッターエリア分割（セッティング＆コントロール）
    $wp_customize->add_setting('ww_footer-total-column');
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'ww_footer-total-column-control',
            array(
                'label'     => 'フッターエリア分割',
                'section'   => 'ww_footer-total',
                'settings'  => 'ww_footer-total-column',
                'type'      => 'radio',
                'choices'   => array(
                    '1'     => '100%',
                    '72'    => '75% : 25%',
                    '64'    => '60% : 40%',
                    '55'    => '50% : 50%',
                    '46'    => '40% : 60%',
                    '27'    => '25% : 75%',
                    '333'   => '33% : 33% : 33%',
                ),
                'priority'  => 3,
            )
        )
    );

    // コピーライト（セクション）
    $wp_customize->add_section(
        'ww_footer-copyright',
        array(
            'title'     => 'コピーライト',
            'panel'     => 'ww_footer',
            'priority'  => 2,
        )
    );

    // 文字色（セッティング＆コントロール）
    $wp_customize->add_setting('ww_footer-copyright-fcolor');
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ww_footer-copyright-fcolor-control',
            array(
                'label'     => '文字色',
                'section'   => 'ww_footer-copyright',
                'settings'  => 'ww_footer-copyright-fcolor',
                'priority'  => 1,
            )
        )
    );

    // 文字サイズ（セッティング＆コントロール）
    $wp_customize->add_setting('ww_footer-copyright-fsize');
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'ww_footer-copyright-fsize-control',
            array(
                'label'     => '文字サイズ',
                'section'   => 'ww_footer-copyright',
                'settings'  => 'ww_footer-copyright-fsize',
                'type'      => 'number',
                'priority'  => 2,
            )
        )
    );

    // 背景色（セッティング＆コントロール）
    $wp_customize->add_setting('ww_footer-copyright-bgcolor');
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'ww_footer-copyright-bgcolor-control',
            array(
                'label'     => '背景色',
                'section'   => 'ww_footer-copyright',
                'settings'  => 'ww_footer-copyright-bgcolor',
                'priority'  => 3,
            )
        )
    );
}
add_action('customize_register', 'ww_customize');