<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="<?= $row["url"] ?>" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?= $row["name"] ?></strong>
                    <small><?= $row["date"] ?></small>
                    <br>
                    <?= $row["comment"] ?>
                    <br>
                </p>
                <nav class="level is-mobile">
                  <div class="level-left">

                    <a class="cell-link level-item" aria-label="like">
                      <span class="icon is-small">
                        <i class="far fa-heart" aria-hidden="true"></i>
                      </span>
                      Like
                    </a>

                    <?php
                    // echo $row["email"];
                    if (isset($_SESSION["email"]) &&
                      $row["email"] == $_SESSION["email"]) { ?>
                        <a class="cell-link level-item" aria-label="like">
                          <span class="icon is-small">
                            <i class="far fa-edit" aria-hidden="true"></i>
                          </span>
                          Edit
                        </a>
                        <a class="cell-link level-item" aria-label="like">
                          <span class="icon is-small">
                            <i class="far fa-trash-alt" aria-hidden="true"></i>
                          </span>
                          Trash
                        </a>
                    <?php } ?>

                  </div>
                </nav>
            </div>
        </div>
    </article>
</div>
