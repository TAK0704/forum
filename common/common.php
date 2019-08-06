<?php

//ナビゲーションを取ってくる関数
function getNav() {
  include "./common/env.php";
  include "./common/nav.php";
}

function get_post_cell($row)
{
    $post_name = $row["name"];
    $post_comment = $row["comment"];
    $post_image_url = $row["url"];
    $is_self = isset($_SESSION["email"]) && $row["email"] == $_SESSION["email"];
    include "./common/post-cell.php";
}


?>
