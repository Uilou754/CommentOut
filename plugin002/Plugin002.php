<?php
/*
Plugin Name: Plugin002
Plugin URI: https://comment-out.net/
Description: ショートコード追加プラグイン
Author: Uilou
Version: 1.0
Author URI: https://comment-out.net/
*/

class Plugin002 {
    // インスタンス
    static $instance = null;

    // コンストラクター
    private function __construct() {
        add_shortcode('url', array($this, 'SiteUrlFunc'));
        add_shortcode('t-url', array($this, 'ThemeUrlFunc'));
        add_shortcode('u-url', array($this, 'UploadsUrlFunc'));
    }

    // サイトURLを取得
    // 使い方：[url]
    public function SiteUrlFunc() {
        return esc_url( home_url( '/' ) );;
    }

    // 使用中のテーマディレクトリまでのパスを取得
    // 使い方：[u-url]
    public function ThemeUrlFunc() {
        return get_stylesheet_directory_uri();
    }

    // Uploadsディレクトリまでのパスを取得
    // 使い方：[u-url]
    public function UploadsUrlFunc() {
        return wp_upload_dir();
    }

    // インスタンス取得メソッド
    public function getInst() {
        if (self::$instance === null) {
            self::$instance = new Plugin002();
        }

        return self::$instance;
    }
}

$Plugin002 = Plugin002::getInst();
?>