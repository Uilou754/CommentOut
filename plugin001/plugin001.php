<?php
/*
Plugin Name: Plugin001
Plugin URI: https://comment-out.net/
Description: 何もしないプラグイン
Author: Uilou
Version: 1.0
Author URI: https://comment-out.net/
*/

class Plugin001 {
    // インスタンス
    static $instance = null;

    // コンストラクター
    private function __construct() {}

    // インスタンス取得メソッド
    public function getInst() {
        if (self::$instance === null) {
            self::$instance = new Plugin001();
        }

        return self::$instance;
    }
}

$Plugin001 = Plugin001::getInst();
?>