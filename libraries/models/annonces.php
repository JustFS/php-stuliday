<?php


function displayAnnonces()
{
  global $db;
  $sql = $db->query("SELECT * FROM annonces");
  $sql->setFetchMode(PDO::FETCH_ASSOC);

  while ($annonces = $sql->fetch()) {
?>
    <link href="../../assets/css/main.css" type="text/css" rel="stylesheet">

    <div class="col s12 m6">
      <a href="#modal<?= $annonces['id'] ?>">
        <div class="card-panel hoverable">
          <div class="card-image">
            <img src="<?= $annonces['image_url'] ? '../../assets/uploads/' .$annonces['image_url'] : '../../assets/img/test.jpg' ?>" alt="photo-du-bien" class="responsive-img">
            <h5 style="text-transform: uppercase"><?= $annonces['title']; ?></h5>
            <div class="">
              <p><?= $annonces['price'] ?> €</p>
            </div>
          </div>
          <div class="card-content">
            <p style="color: #222; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 4; overflow: hidden"><?= $annonces['description'] ?></p>
          </div>
          <div class="card-action">
            <a href="#modal<?= $annonces['id'] ?>" class="btn cyan accent-3">En savoir plus</a>
          </div>
        </div>
      </a>
    </div>


    <!-- Modal Structure -->
    <div id="modal<?= $annonces['id'] ?>" class="modal card-panel">
      <div class="modal-content">
        <h5 style="text-transform: uppercase" class="center-align"><?= $annonces['title']; ?></h5>

        <div class="row valign-wrapper">
          <p class="col s12 m4"><?= $annonces['price'] ?> €</p>
          <p class="col s12 m4"><?= $annonces['city'] ?></p>
          <span class="col s12 m4"><?= $annonces['address_article'] ?></span>
        </div>

        <div class="row">
          <div class="col s12 m6">Date de début : <?= $annonces['start_date'] ?></div>
          <div class="col s12 m6">Date de fin :<?= $annonces['end_date'] ?></div>
        </div>

        <div class="">
          <p><?= $annonces['description'] ?></p>
        </div>

        <div class="container">
          <img style="width: 100%; " class="center-align" src="<?= $annonces['image_url'] ? '../../assets/uploads/' .$annonces['image_url'] : '../../assets/img/test.jpg' ?>" class="img-responsive" alt="">
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn blue accent-2">Revenir à la liste</a>
        <a href="" class="btn cyan accent-3">Réserver</a>
      </div>
    </div>

<?php
  }
};
