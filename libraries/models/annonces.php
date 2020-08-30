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
            <img src="<?= $annonces['image_url'] ? '../../assets/uploads/' . $annonces['image_url'] : '../../assets/img/test.jpg' ?>" alt="photo-du-bien" class="responsive-img">
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
    <div id="modal<?= $annonces['id'] ?>" class="modal card-panel" style="top: 100px; width: 75%; padding: 10px 1rem; max-height: 85%">
      <a href="#" style="font-size: 1.5rem; position: absolute; right: 1rem; top: 5px">&#10006;</a>
      <div class="modal-content">
        <h5 style="text-transform: uppercase" class="center-align"><?= $annonces['title']; ?></h5>

        <div class="row valign-wrapper">
          <p class="col s12 m4"><?= $annonces['city'] ?></p>
          <p class="col s12 m4"><?= $annonces['address_article'] ?></p>
          <p class="col s12 m4 cyan-text accent-3 right-align" style="font-size: 2rem"><?= $annonces['price'] ?> €</p>
        </div>

        <div class="row">
          <div class="col s12 m6">Date de début : <?= date('d-m-Y', strtotime($annonces['start_date'])); ?></div>
          <div class="col s12 m6">Date de fin : <?= date('d-m-Y', strtotime($annonces['end_date'])); ?></div>
        </div>

        <div class="">
          <p><?= $annonces['description'] ?></p>
        </div>

        <div class="">
          <img style="width: 25%; " src="<?= $annonces['image_url'] ? '../../assets/uploads/' . $annonces['image_url'] : '../../assets/img/test.jpg' ?>" class="img-responsive" alt="">
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn blue accent-2">Revenir à la liste</a>
        <a href="../views/booking.php?annonceId=<?= $annonces['id'] ?>" class="btn cyan accent-3">Réserver</a>
      </div>
    </div>

  <?php
  }
};

function displayUserAnnonces()
{
  global $db;
  $id = $_SESSION['id'];

  $sql = $db->query("SELECT * FROM annonces WHERE author_article=$id");
  $sql->setFetchMode(PDO::FETCH_ASSOC);

  while ($annonces = $sql->fetch()) {
  ?>
    <tr>
      <td><?= $annonces['title'] ?></td>
      <td><?= date('d-m-Y', strtotime($annonces['start_date'])); ?></td>
      <td><?= date('d-m-Y', strtotime($annonces['end_date'])); ?></td>
      <td><?= $annonces['active'] == 1 ? 'Non' : 'Oui' ?></td>
      <td>
        <a href="/php-stuliday/libraries/models/update-annonce.php?id=<?= $annonces['id'] ?>" class="btn btn cyan accent-3">Modifier</a></td>
      <td>
        <form action="/php-stuliday/libraries/models/delete-annonce.php?id=<?= $annonces['id'] ?>" method="get">
          <input type="submit" value="supprimer" class="btn btn cyan accent-3"></input>
        </form>
      </td>
    </tr>

  <?php
  }
};

function displayUserBookings()
{
  global $db;
  $id = $_SESSION['id'];

  $sql = $db->query("SELECT * FROM reservations WHERE id_user=$id");
  $sql->setFetchMode(PDO::FETCH_ASSOC);

  while ($bookings = $sql->fetch()) {
  ?>
    <tr>
      <td><?= date('d-m-Y', strtotime($bookings['start_date'])); ?></td>
      <td><?= date('d-m-Y', strtotime($bookings['end_date'])); ?></td>
      <td>
        <form action="/php-stuliday/libraries/models/delete-annonce.php?id=<?= $bookings['id'] ?>" method="get">
          <input type="submit" value="Annuler" class="btn btn cyan accent-3"></input>
        </form>
      </td>
    </tr>

<?php
  }
};
