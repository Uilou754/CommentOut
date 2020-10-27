<?php
/*
Plugin Name: UilouEmmet
Plugin URI: https://ikel.co.jp/
Description: Wordpressテキストエディタのタグ自動整形機能を無効化し、任意のテキスト整形を自動で行うようにするプラグインです。
Author: Uilou
Version: 1.0.0
Author URI: https://ikel.co.jp/
License: GPL2
*/

class UilouEmmet {
     static $inst = NULL;

     // コンストラクター
     private function __construct() {
          /**********************************************************************
           *   フックを設定
           **********************************************************************/
          // 記事や固定ページの本文表示時にフォーマット処理をかける（データベース上の文字は置き換わらず、表示する時に加工を加えているイメージ）
          add_filter('the_content', array($this, 'content_formatter'));
          // 記事や固定ページの本文の原文にフォーマット処理をかける（データベース上の文字が置き換わるイメージ）
          add_filter('the_editor_content', array($this, 'content_replacer'));
     }

     // インスタンスの呼び出し
     public static function getInst() {
          if (self::$inst === NULL) {
               self::$inst = new self();
          }
          return self::$inst;
     }


     /************************************************************************
      * 編集画面の設定変更
      ************************************************************************/

     // フィルターフック（CallBack）により、記事・固定ページの本文を表示する前に、下記メソッドが処理される
     // 引　数：$content = データベースから取得した本文
     // 戻り値：$content = HTMLに表示する本文
     // 解　説：記事・固定ページの本文をデータベースに問合せ、画面に表示する前にこのメソッドが呼ばれる。
     // 　　　　この特性上、データベース上の原文は変更せず、画面に表示する時だけ変えたい時に、下記記述をすること。
     public function content_formatter( $content ) {

          // 投稿記事か？
          if (is_single()) {
               // *** 投稿記事のみに適応するルールを記述 ***
               if (get_option(self::FORMAT_CONTENTS.self::POST)) {     // フラグが立っている
               }
          }

          // 固定ページか？
          if (is_page()) {
               // *** 固定ページのみに適応するルールを記述 ***
               if (get_option(self::FORMAT_CONTENTS.self::PAGE)) {     // フラグが立っている
               }
          }

          return $content;
     }


     // フィルターフック（CallBack）により、記事・固定ページの編集ページで本文を取得した時に下記メソッドが処理される
     // 引　数：$content = 取得した本文
     // 戻り値：$content = 編集ページに表示する本文
     // 解　説：記事・固定ページの編集する際、テキストをデータベースに問合せ、テキストエディタに表示する前に
     // 　　　　このメソッドが呼ばれる。この特性上、恒久的なフォーマットルールを下記に記述すること。
     public function content_replacer( $content ) {

          // 投稿記事か？
          if (is_single()) {
               // *** 投稿記事のみに適応するルールを記述 ***
               if (get_option(self::FORMAT_CONTENTS.self::POST)) {     // フラグが立っている
                    // <br>を<br/>に変換する
                    $content = str_replace('<br>', '<br/>', $content);
               }
          }

          // 固定ページか？
          if (is_page()) {
               // *** 固定ページのみに適応するルールを記述 ***
               if (get_option(self::FORMAT_CONTENTS.self::PAGE)) {     // フラグが立っている
                    // <br>を<br/>に変換する
                    $content = str_replace('<br>', '<br/>', $content);
                    // <img >を<img />に直す
                    /*$content = preg_replace('/<img(.*?)[^/]>/', '/<img$1\/>/', $content);*/
               }
          }

          return $content;
     }
}

// クラスをインスタンス化
$UilouEmmet = UilouEmmet::getInst();

?>
