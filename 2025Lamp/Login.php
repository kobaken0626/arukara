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

<h5><html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #fff; }
        .login-box { background: #ccc; padding: 40px; text-align: center; }
        input { display: block; margin: 10px auto; padding: 10px; width: 80%; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>ログイン画面</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>
        <form method="POST">
            <input type="email" name="email" placeholder="メールアドレス" required>
            <input type="password" name="password" placeholder="password" required>
            <p><a href="register.php">新規登録はこちら</a></p>
            <button type="submit">ログイン</button>
        </form>
    </div>
</body>
</html></h5>


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
