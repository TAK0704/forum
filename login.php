<?php
//ログイン処理するphp

//セッション処理開始
session_start();

//エラーメッセージ
$message = "エラーが発生しました";

//メールアドレスの取得
$email = "";
if (isset($_POST["email"])) {
    //もしemailが送られているなら変数の中に入れる
    $email = $_POST["email"];
} else {
    $message = "メールアドレスを入力してください";
}

//パスワードの取得
$password = "";
if (isset($_POST["password"])) {
    //もしemailが送られているなら変数の中に入れる
    $password = $_POST["password"];
} else {
    $message = "パスワードを入力してください";
}

//emailとpasswordがDBに入っている値とあっているかどうか？

if (empty($password) || empty($email)) {
    //どちらかが空の場合
  //セッションにメールアドレスの値が残っている場合はログインしているとみなす
} else {
    //どちらも空じゃない場合
    $pdo = new PDO(
      "mysql:dbname=bbs;host=localhost;charaset=utf8",
      "root", //ユーザー名
    "root" //パスワード
  );

    //DBから特定の条件（メール、パスワード）でデータがあるか調べる
    //$pdo->prepare(SQLの文);
    //WHERE ~ で条件を選択する
    $stmt = $pdo->prepare("SELECT count(*) FROM user WHERE email=:email AND password=:password");

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $flag = $stmt->execute();
    if ($flag) {
        //emailとpasswordの組み合わせがあっていた場合
        //セッションの処理
        //ログイン状態の維持
        $_SESSION["email"] = $email;

        //一覧ページに飛ばす処理
        header("Location: list.php");
        exit();
    } else {
        //パスワードかメールアドレスが間違っていた場合
        $message = "メールアドレスかパスワードが間違っています";
    }
}

 ?>

 <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メッセージ</title>
</head>
<body>
    <h1>エラー</h1>
    <p><?= $message ?></p>
</body>
</html>
