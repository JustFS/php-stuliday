<section>
  <div class="container">
    <div class="row">
      <div class="col s12 12">
        <h2 class="py-4">Mon profil :</h2>
      </div>

      <div class="col s6 6">
        <form action="<?= '../controllers/updateUser.php' ?>" method="post">

          <?php
          $user = new User();
          $sql = $user->info();

          while ($user = $sql->fetch()) {
          ?>
            <div class="form-group">
              <label for="lastName">Nom</label>
              <input type="text" name="lastName" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Renseigner votre nom" value="<?= $user['lastName']; ?>">
            </div>
            <div class="form-group">
              <label for="firstName">Prénom</label>
              <input type="text" name="firstName" id="exampleInputPassword" placeholder="Renseigner votre prénom" value="<?= $user['firstName']; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="exampleInputEmail" placeholder="Renseigner votre Email" aria-describedby="emailHelp" value="<?= $user['email']; ?>">
            </div>
          <?php
          }
          ?>

          <input type="submit" name="submit_update" class="btn cyan accent-3" value="Mettre à jour">
        </form>
      </div>

      <div class="col s6 6">
        <a href="<?= 'createAnnonce.php' ?>" class="btn cyan accent-3 col s12 12">Publier une nouvelle annonce</a><br /><br />

        <a href="#modalAnn" class="modal-trigger btn cyan accent-3 col s12 12 
          <?php         
            $model = new Utils();
            $count1 = $model->counter('annonces', 'author_article');
            if ($count1 < 1) {echo 'disabled'; } 
          ?>">
            Voir mes annonces 
            <span class="badge"><?= $count1 ?></span>
        </a><br /><br />

        <a href="#modalResa" class="btn cyan accent-3 col s12 12" 
          <?php 
            $count2 = $model->counter('reservations', 'id_user');
            if ($count2 < 1) {echo 'disabled';} 
          ?>>
            Voir mes réservations
          <span class="badge"><?= $count2 ?></span>
        </a><br /><br /><br />

        <a href="<?= 'annonces.php' ?>" class="btn cyan accent-3 col s12 12">Retour aux annonces</a>
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
      <?php

      $user = new User();
      $sql = $user->annonces();
      while ($annonces = $sql->fetch()) {
      ?>
        <tr>
          <td><?= $annonces['title'] ?></td>
          <td><?= date('d-m-Y', strtotime($annonces['start_date'])); ?></td>
          <td><?= date('d-m-Y', strtotime($annonces['end_date'])); ?></td>
          <td><?= $annonces['active'] == 1 ? 'Non' : 'Oui' ?></td>
          <td>
            <a href="/php-stuliday/libraries/views/updateAnnonce.php?id=<?= $annonces['id'] ?>" class="btn btn cyan accent-3">Modifier</a></td>
          <td>
            <a href="/php-stuliday/libraries/controllers/deleteAnnonce.php?id=<?= $annonces['id'] ?>" class="btn btn cyan accent-3">Supprimer</a>            
          </td>
        </tr>

      <?php
      };
      ?>
    </tbody>
    <a href="#" style="font-size: 1.5rem; position: absolute; right: 1rem; top: 5px">&#10006;</a>
  </table>
</div>

<!-- MODAL RESERVATIONS -->
<div id="modalResa" class="modal" style="position: relative; padding: 2rem 3rem; width: 68%; margin-bottom: 40px">
  <h5>Vos réservations</h5>
  <table class="highlight responsive-table">
    <thead>
      <tr>
        <th>Date début</th>
        <th>Date fin</th>
      </tr>
    </thead>

    <tbody>
      <?php 
      
      $user = new User();
      $sql = $user->bookings();

      while ($bookings = $sql->fetch()) {
      ?>
        <tr>
          <td><?= date('d-m-Y', strtotime($bookings['start_date'])); ?></td>
          <td><?= date('d-m-Y', strtotime($bookings['end_date'])); ?></td>
          <td>
            <a href="/php-stuliday/libraries/controllers/deleteBooking.php?id=<?= $bookings['id'] ?>" class="btn btn cyan accent-3">
              Annuler réservation
            </a>
          </td>
        </tr>

      <?php
      } ?>
    </tbody>
    <a href="#" style="font-size: 1.5rem; position: absolute; right: 1rem; top: 5px">&#10006;</a>
  </table>
</div>

<style>
  .modal:target {
  display: block !important;
}
</style>