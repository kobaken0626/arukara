<?php
/*!
@file index.php
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
		$dir = 'images/place/'; //ここでディレクトリ指定
  $images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

  // インジケーター生成
  echo '<div id="topCarousel" class="carousel slide mb-4" data-bs-ride="carousel">';
  echo '<div class="carousel-indicators">';
  foreach ($images as $index => $img) {
    $active = ($index === 0) ? 'class="active"' : '';
    echo '<button type="button" data-bs-target="#topCarousel" data-bs-slide-to="' . $index . '" ' . $active . ' aria-label="スライド' . ($index + 1) . '"></button>';
  }
  echo '</div>';

  // スライド画像本体
  echo '<div class="carousel-inner">';
  $active = 'active';
  foreach ($images as $img) {
    echo '<div class="carousel-item ' . $active . '">';
    echo '<img src="' . $img . '" class="d-block w-100" alt="スライド画像">';
    echo '</div>';
    $active = '';
  }
  echo '</div>';

  // 左右ナビゲーション
  echo '<button class="carousel-control-prev" type="button" data-bs-target="#topCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">前へ</span>
        </button>';
  echo '<button class="carousel-control-next" type="button" data-bs-target="#topCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">次へ</span>
        </button>';
  echo '</div>';

  $echo_str = <<< END_BLOCK

<!-- コンテンツ　-->

<body>

$carousel_html

<div class="PageText">
	<h5>最近話題の聖地</h5>
</div>
<div class="image-row">
  <div class="image-item">
    <img src="images/place/Sample1.png" alt="画像1">
    <p class="caption">みてください。おれです。</p>
  </div>
  <div class="image-item">
    <img src="images/place/Sample2.png" alt="画像2">
    <p class="caption">おれです。</p>
  </div>
  <div class="image-item">
    <img src="images/place/Sample3.png" alt="画像3">
    <p class="caption">推しとのツーショット</p>
  </div>
</div>
<div class="PageText">
	<h5>ページ一覧</h5>
</div>

	<div class="contents border-bottom text-center">
  <ul class="custom-list">
    <li><a href="prefecture_list.php" class="nav-link">当サイトについて</a></li>
    <li><a href="member_list.php" class="nav-link">聖地人気ランキング</a></li>
  </ul>
</div>

<!-- Bootstrap JS 読み込み（headの下かbodyの末尾に） -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
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
