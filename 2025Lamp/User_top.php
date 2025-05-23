<?php
/*!
@file User_top.php
@brief メインメニュー
@copyright Copyright (c) 2024 Yamanoi Yasushi.
*/

//ライブラリをインクルード
require_once("common/libs.php");

//--------------------------------------------------------------------------------------
///	本体ノード
//--------------------------------------------------------------------------------------
class cmain_node extends cnode {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	構築時の処理(継承して使用)
	@return	なし
	*/
	//--------------------------------------------------------------------------------------
	public function create(){
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief  表示(継承して使用)
	@return なし
	*/
	//--------------------------------------------------------------------------------------
	public function display(){

		$echo_str = <<< END_BLOCK


<!-- コンテンツ　-->

<div class="contents">
<link rel="stylesheet" href="css/style.css">
<h5><strong>トップページ</strong></h5>
<table class="table table-bordered">
<thead>
<tr>
</tr>
</thead>
<tbody>
<tr>
<td><a href="prefecture_list.php" class="nav-link link-success">ユーザー</a></td>
</tr>
<tr>
<td><a href="member_list.php" class="nav-link link-success">聖地人気ランキング</a></td>
</tr>
<tr>
<td><a href="member_list_custom.php" class="nav-link link-success">メンバー管理（カスタムノード）</a></td>
</tr>
<tr>
<td><a href="hinagata.php" class="nav-link link-success">雛形ファイル</a></td>
</tr>
</tbody>
</table>
</div>
<!-- /コンテンツ　-->
END_BLOCK;
		echo $echo_str;

	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//ページを作成
$page_obj = new cnode();
//ヘッダ追加
$page_obj->add_child(cutil::create('cheader'));
//本体追加
$page_obj->add_child(cutil::create('cmain_node'));
//フッタ追加
$page_obj->add_child(cutil::create('cfooter'));
//構築時処理
$page_obj->create();
//ページ全体を表示
$page_obj->display();


?>
