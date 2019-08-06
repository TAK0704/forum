<?php
include "./common/env.php";
 ?>

  </div><!-- flex-container -->

  <footer>

    <nav>
      <ul>
        <?php foreach ($menu as $name => $url) { ?>
          <li><a href="<?= $url ?>"><?= $name ?></a></li>
        <?php } ?>
      </ul>
      <ul>
        <?php foreach ($help as $name => $url) { ?>
          <li><a href="<?= $url ?>"><?= $name ?></a></li>
        <?php } ?>
      </ul>
    </nav>

    <small class="copyright">copyright 2019 HIRANO</small>

  </footer>

  </div><!-- container -->

</body>
</html>
