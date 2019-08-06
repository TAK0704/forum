<?php
//サイドバーを表示するPHP
//掲示板の投稿ジャンルを標示する
//ジャンルの一覧を配列に格納する。

$genre = array(
  //'ジャンル名' => "URL" ,
  // 'ショー' => "#",
  // 'パレード' => "#",
  // 'キャラクター' => "#",
  // 'アトラクション' => "#",
  // 'レストラン' => "#",
  // 'グリーティング' => "#",
  "パレード" => array(
    'ドリーミング・アップ！' => "#",
    'スプーキーBoo！パレード' => "#",
  ),
  "ショー" => array(
    'ドナルドのホット・ジャングル・サマー' => "#",
    'パイレーツ・サマー2019' => "#",
  ),
  "キャラクター" => array(
    'ミッキー&フレンズ' => "#",
    'ディズニープリンセス' => "#",
    'ディズニーヴィランズ' => "#",
  ),
);
?>

<nav class="sidebar">
  <h2>【投稿ジャンル一覧】</h2>

    <?php
    foreach ($genre as $name => $small_genre) {
      echo "<input type=\"checkbox\" id=\"check_$name\">";
      echo "<label class=\"sidebar-label\" for=\"check_$name\">$name</label>";

      echo "<ul id=\"list_$name\">";
      foreach ($small_genre as $s_name => $s_url) {
        echo "<li><a href=\"$s_url\">$s_name</a></li>";
      }
      echo "</ul>";

    }
    ?>

</nav>
