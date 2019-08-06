<?php

//検索入力画面のPHPファイル
$page_title = "検索結果 | 掲示板";
include "header.php";


//検索結果を表示するファイル

$error = false;
$message = "";
$keyword = "";

if (
    isset($_POST["keyword"]) &&
    !empty($_POST["keyword"])
) {
    //コメントの検査
    $keyword = $_POST["keyword"];
} else {
    $error = true;
    $message = "検索ワードを入力してください";
}

if (!$error) {
    try {
        $pdo = new PDO(
        "mysql:dbname=bbs;host=localhost;charaset=utf8;",
        "root", // ユーザー名
        "root" // パスワード
    );

        // POSTテーブルから検索した投稿を表示
        // SQLの実行
        $stmt = $pdo->prepare(
        'SELECT * FROM post WHERE name LIKE ? OR comment LIKE ?'
    );

        //SELECT [カラム名,カラム名 or *] FROM テーブル名 WHERE 条件
        //nameにひらのと書かれた投稿を検索する
        //SLECT * FROM post WHERE name LIKE = '%ひらの%';
        //ひらの%だと「ひらのちゃん、ひらのくん、ひらのさん」、%ひらのだと「ちゃんひらの」が引っかかる

        $stmt->execute(["%$keyword%","%$keyword%"]);
    } catch (PDOException $e) {
        $error = true;
        $message = "データベースのエラー" . $e->getMessage();
    }
}

if ($error) {
    // エラー画面を表示
  ?>
  <h2>エラーが発生しました</h2>
  <p><?= $message ?></p>
  <?php
} else {
      ?>
<section class="section">
  <div class="container">

    <h1>検索結果</h1>
      <p class="subtitle"><strong><?= $keyword ?></strong>の検索結果一覧</p>

<?php
// データを読み込む
while ($row = $stmt->fetch()) {
    // 投稿ごとのHTMLの出力
?>
    <div class="box">
      <article class="media">
          <div class="media-left">
              <figure class="image is-64x64">
                  <img src=<?= $row["url"] ?> alt="Image">
              </figure>
          </div>
          <div class="media-content">
              <div class="content">
                  <p>
                      <strong><?= $row["name"] ?></strong>
                      <br>
                      <?= $row["comment"] ?>
                  </p>
              </div>
          </div>
      </article>
    </div>

<?php
}
  }
 ?>

</div>
</section>
