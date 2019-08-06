<nav class="head_menu">
  <ul>
    <?php
    foreach ($menu as $name => $url) { ?>
      <li><a href="<?= $url ?>">
        <?= $name ?>
      </a></li>
      <?php } ?>
  </ul>
</nav>
