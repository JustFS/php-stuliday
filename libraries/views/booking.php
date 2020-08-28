<?php
$page = 'booking';

require('../views/templates/header.php');
require('../views/templates/nav.php');
require_once('../models/connect.php');

global $db;
$annonceId = $_GET['annonceId'];
$userId = $_SESSION['id'];

$sql = $db->query("SELECT * FROM annonces WHERE id=$annonceId");
$sql->setFetchMode(PDO::FETCH_ASSOC);

while ($annonce = $sql->fetch()) {
?>
  <div class="container">
    <h3>Réserver votre séjour</h3>
    <div class="row">
      <div class="col s12 m12">
        <form action="../models/booking-post.php" method="post">
          <div class="card-panel hoverable">
            <div class="" style="display: flex; justify-content: space-between">
              <div class="card-image center-align">
                <img src="<?= $annonce['image_url'] ? '../../assets/uploads/' . $annonce['image_url'] : '../../assets/img/test.jpg' ?>" alt="photo-du-bien" class="responsive-img circle z-depth-2" style="height: 200px;">
              </div>
              <div class="right-align">
                <h4 style="text-transform: uppercase" class="cyan-text"><?= $annonce['title']; ?></h4>
                <h4><?= $annonce['price'] ?> € / nuit</h4>
              </div>
            </div>
            <br /><br />

            <div class="input-field col s6">
              <input id="start_date" value="<?= $annonce['start_date'] ?>" name="start_date" type="date" required class="validate">
            </div>

            <div class="input-field col s6">
              <input id="end_date" value="<?= $annonce['end_date'] ?>" name="end_date" type="date" required class="validate">
            </div>

            <div class="card-action right-align">
              <input type="submit" value="Valider ma réservation" class="btn btn cyan accent-3">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php
};
?>