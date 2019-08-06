<?php

//ログアウトするPHP

session_start();

unset($_SESSION["email"]);

//ログインページに飛ばす処理
header("Location: login-input.php");
exit();


 ?>
