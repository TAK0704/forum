<?php

//ログインの確認をする
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: login-input.php");
  exit();
}

//検索入力画面のPHPファイル
$page_title = "検索画面｜掲示板システム";
include "header.php";
?>

<section class="section">
    <div class="container">

<h1 class="search_title">検索画面</h1>
<p class="subtitle">掲示板に書き込まれた名前、メッセージから、<br>該当する投稿を表示します。</p>

<form action="search.php" method="post">
  <div class="field">
    <div class="control">
      <input type="text" name="keyword" placeholder="keyword" class="input">
    </div>
  </div>
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">
        検索
      </button>
    </div>
  </div>
</form>

</div>
</section>

<?php
include "footer.php";
 ?>
