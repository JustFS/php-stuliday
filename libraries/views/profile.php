<?php
$page = 'profile';

require_once('../models/connect.php');
require('templates/header.php');
require('templates/nav.php');
require('../models/users.php');
require('../models/annonces.php');

?>
<section>
  <div class="container">
    <div class="row">
      <div class="col s12 12">
        <h2 class="py-4">Mon profil :</h2>
      </div>

      <div class="col s6 6">
        <form action="<?= '../models/users.php' ?>" method="post">

          <?= displayUserInfo() ?>

          <input type="submit" name="submit_update" class="btn cyan accent-3" value="Mettre à jour">
        </form>
      </div>

      <div class="col s6 6">
        <a href="<?= URLROOT . '/libraries/views/create-annonce.php' ?>" class="btn cyan accent-3 col s12 12">Publier une nouvelle annonce</a><br /><br />

        <a href="#modalAnn" class="modal-trigger btn cyan accent-3 col s12 12 
          <?php if (counter() < 1) {
            echo 'disabled';
          } ?>" data-toggle="modal" data-target="#listingAnnonces">
          Voir mes annonces
          <span class="badge badge-primary badge-pill"><?= counter() ?></span>
        </a><br /><br />

        <a href="#modalRes" class="btn cyan accent-3 col s12 12 
          <?php if ($count2 < 1) {
            echo 'disabled';
          } ?>" data-toggle="modal" data-target="#listingResa">Voir mes réservations
          <span class="badge badge-primary badge-pill">10</span>
        </a><br /><br /><br />

        <a href="<?= URLROOT . '/libraries/views/annonces.php' ?>" class="btn cyan accent-3 col s12 12">Retour aux annonces</a>
      </div>
    </div>
  </div>
</section>

<!-- MODAL ANNONCES -->
<div id="modalAnn" class="modal" style="position: relative; padding: 2rem 3rem; width: 68%; margin-bottom: 40px">
  <h5>Vos annonces publiées</h5>
  <table class="highlight responsive-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Date début</th>
        <th>Date fin</th>
        <th>Réservé</th>
      </tr>
    </thead>

    <tbody>
      <?= displayUserAnnonces(); ?>
    </tbody>
    <a href="#" style="font-size: 1.5rem; position: absolute; right: 1rem; top: 5px">&#10006;</a>
  </table>
</div>

<?php require('templates/footer.php'); ?>