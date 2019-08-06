<?php

//ログインの確認をする
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: login-input.php");
  exit();
}

//検索入力画面のPHPファイル
$page_title = "投稿一覧";
include "header.php";

//CSS確認のため、一時的にfocusするジャンルを指定する
$focus = "ショー";

include "sidebar.php";

$page_count = 1;
if (
  isset($_GET["page_count"]) &&
  !empty($_GET["page_count"])
) {
  $page_count = intval($_GET["page_count"]);
} else {
  $page_count = 1;
}
// データベースに接続
include "./common/dbconfig.php";
try {
// DBの設定をするオブジェクト
$pdo = new PDO(
  $dbconfig["dsn"],
  $dbconfig["user"],
  $dbconfig["password"]
);

  $stmt = $pdo->query(
    "SELECT COUNT(*) as count FROM post"
  );
  $row = $stmt->fetch();
  // 全ての件数の取得
  $all_count = intval($row["count"]);
  /*
  1ページ目 1-5件目
  2ページ目 6-10件目
  3ページ目 11-15件目
  4ページ目 16-20件目
  5ページ目 21-25件目
  6ページ目 26-30件目
  */
  // POSTテーブルから投稿一覧を表示
  // SQLの実行
  $count = 5; //表示件数
  $offset = ($page_count - 1) * $count;
  ?>

<section class="section">
  <div class="container">
      <h1>書き込み一覧</h1>

<?php

  include "./common/breadcrumb.php";

  include "./common/swiper.php";
  ?>

<div class="box_wrap">

  <?php

  if ($all_count >  $offset) {
    $stmt =  $pdo->query(
            "SELECT * FROM post
            ORDER BY id
            LIMIT  $count OFFSET  $offset"
          );
    // データを読み込む
    while ($row = $stmt->fetch()) {
      // 投稿ごとのHTMLの出力
      get_post_cell($row);
  }

  ?>
  <div class="buttons  is-centered">

  <?php
  for ($i = 1; $i <= ceil($all_count / $count); $i++) {
    //変数名 = (条件式) ? 条件文がTrueだった時に入れる値:falseだった時に入れる値
      $disabled = ($i == $page_count) ? "disabled" : "" ;
      $href = ($i == $page_count) ? "" : "href=\"./list.php?page_count=$i\"";
      echo "<a $href class=\"button\" $disabled>$i</a>";
  }
  ?>

  </div>

  </div><!-- box_wrap -->

  </div><!-- container -->

</section>

    <?php
    } else {
      echo "<p>投稿はありません。</p>";
    }
      echo "</div>";
    } catch (PDOException $e) {
      $error = true;
      $message = "データベースのエラー" . $e->getMessage();
    }


    include "footer.php";
     ?>
