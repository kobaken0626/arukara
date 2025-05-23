<?php
/*!
@file Login.php
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

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #fff; }
        .login-box { background: #ccc; padding: 40px; text-align: center; }
        .hikain { display: block; margin: 20px ; padding: 20px; width: 80px; justify-content: center;}
        .error { color: red; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>新規登録</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>
        <form method="POST">
		<div class="hikakin">
			<input type="name" name="name" placeholder="氏名" required></br>
			<input type="name" name="c-name" placeholder="ニックネーム" required></br>
            <input type="email" name="email" placeholder="メールアドレス" required></br>
			<input type="email" name="c-email" placeholder="確認用メールアドレス" required></br>
            <input type="password" name="password" placeholder="パスワード" required></br>
			<input type="password" name="c-password" placeholder="確認用パスワード" required></br>
			</div>
			<div class= "yamanoi">
			<input type="checkbox" class="seikin" name="kiyaku" value="kiyaku" required><a href="kiyaku.html">利用規約</a>
			<div>
			<div class="yasushi">
			<input type="checkbox" class="seikin" name="policy" value="policy" required><a href="policy.html">プライバシーポリシ</a>
			<div>
            <button type="submit">登録してください</button>
        </form>
    </div>
</body>
</html>


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
//本体追加
$page_obj->add_child(cutil::create('cmain_node'));
//フッタ追加
$page_obj->add_child(cutil::create('cfooter'));
//構築時処理
$page_obj->create();
//ページ全体を表示
$page_obj->display();


?>
