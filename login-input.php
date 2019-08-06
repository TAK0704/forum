<?php
//ログイン画面を表示するPHP

//ログインしていたら一覧ページに飛ばす
session_start();
if (isset($_SESSION["email"])) {
    //ログイン状態である
    header("Location: list.php");
    //処理をここで終わらせる
    exit();
}

//検索入力画面のPHPファイル
$page_title = "ログイン | 掲示板";
include "header.php";

 ?>

     <section class="section">
         <div class="container">
           <h1>ログインしてください</h1>
             <form action="login.php" method="post">
                 <div class="field">
                     <div class="control">
                         メールアドレス：<input name="email" type="text" placeholder="email" class="input">
                     </div>
                 </div>
                 <div class="field">
                     <div class="control">
                         パスワード：<input name="password" placeholder="password" class="input">
                     </div>
                 </div>
                 <div class="field">
                     <div class="control">
                       <button type="submit" name="button" class="button is-link">
                         ログイン
                       </button>
                     </div>
                 </div>
             </form>
         </div>
     </section>
     
     <?php
     include "footer.php";
      ?>
