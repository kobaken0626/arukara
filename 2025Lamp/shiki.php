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


<h5><html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #fff; }
        .form-box { background: #ccc; padding: 40px; text-align: center; }
		.doui input{ float: left; clear: left; margin-right:10px padding: 10px, 0px}
		.a{ padding: 10px}
        .user input { display: block; margin: 10px; padding: 10px; width: 80%; }
        .back-btn { position: absolute; top: 20px; left: 20px; }
        .error { color: red; }
    </style>
</head>
<body>
    <a href="home.php" class="back-btn">← 戻る</a>
    <div class="form-box">
        <h2>新規登録</h2>

        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $e) echo "<p>$e</p>
            </div>
        <?php endif; ?>

        <form method="POST">
		<div class = "user">
			<input type="text" name="nickname" placeholder="氏名" required>
            <input type="text" name="nickname" placeholder="ニックネーム" required>
            <input type="email" name="email" placeholder="メールアドレス" required>
            <input type="email" name="email_confirm" placeholder="確認メールアドレス" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="password" name="password_confirm" placeholder="確認password" required>
		</div>
			<div class = "doui">
			<input type ="checkbox" name = "check" value = "プライバシーポリシ"><a href = "">プライバシーポリシ</a></br>
			<input type ="checkbox" name = "check" value = "利用規約"><a href = "">利用規約</a></br>
            <button type="submit">変更</button>
			</div>
        </form>
    </div>
</body>
</html></h5>


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
