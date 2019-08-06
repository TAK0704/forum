<?php

//ログインの確認をする
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: login-input.php");
  exit();
}

//検索入力画面のPHPファイル
$page_title = "入力画面 | 掲示板";
include "header.php";

?>

    <section class="section">
        <div class="container">
            <h1>
                入力フォーム
            </h1>
            <p class="subtitle">
                名前かコメントは必須です。書き込み一覧は<a href="list.php">こちら</a>
            </p>
            <form action="write.php" method="post">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input name="name" class="input" type="text" placeholder="お名前">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Image URL</label>
                    <div class="control">
                        <input name="url" class="input" type="url" placeholder="画像URL">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea name="comment" class="textarea" placeholder="メッセージ"></textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">送る</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php
    include "footer.php";
     ?>
