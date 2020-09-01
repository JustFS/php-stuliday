<section>
  <?php

  /**
   * Partie réservation s'affiche avant les annonces sur l'utilisateur souhaite réserver
   */
  if (isset($_GET['annonceId'])) {
    $annonceId = $_GET['annonceId'];

    $model = new Annonces();
    $sql = $model->annonceToBook($annonceId);

    while ($annonce = $sql->fetch()) {
  ?>
      <div class="container">
        <h3>Réserver votre séjour</h3>
        <div class="row">
          <div class="col s10 m10">
            <form action="../controllers/bookingPost.php?annonceId=<?= $annonceId ?>" method="post">
              <div class="card-panel hoverable">
                <div class="" style="display: flex; justify-content: space-between">
                  <div class="card-image center-align">
                    <img src="<?= $annonce['image_url'] ? '../../assets/uploads/' . $annonce['image_url'] : '../../assets/img/test.jpg' ?>" alt="photo-du-bien" class="responsive-img z-depth-2" style="height: 200px; border-radius: 10px">
                  </div>
                  <div class="right-align">
                    <h4 style="text-transform: uppercase" class="cyan-text"><?= $annonce['title']; ?></h4>
                    <h6><span id="nightPrice"><?= $annonce['price'] ?></span> € / nuit</h6><br />
                    <h4>Total : <span id="totalDays"></span> €</h4>
                  </div>
                </div>
                <br /><br />

                <div class="input-field col s6">
                  <input id="start_date" min=<?= $annonce['start_date'] ?> value="<?= $annonce['start_date'] ?>" name="start_date" type="date" required class="validate">
                </div>

                <div class="input-field col s6">
                  <input id="end_date" min=<?= $annonce['start_date'] ?> value="<?= $annonce['end_date'] ?>" name="end_date" type="date" required class="validate">
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
    }
  };
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Liste des annonces</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $model = new Annonces();
      $sql = $model->list();

      while ($annonces = $sql->fetch()) {
      ?>
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
                <p style="color: #222; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 4; overflow: hidden; text-align: justify;"><?= $annonces['description'] ?></p>
              </div>
              <div class="card-action">
                <a href="#modal<?= $annonces['id'] ?>" class="btn cyan accent-3">En savoir plus</a>
              </div>
            </div>
          </a>
        </div>



        <!-- Modal Structure -->
        <div id="modal<?= $annonces['id'] ?>" class="modal card-panel" style="top: 100px; width: 75%; padding: 10px 1rem; max-height: 85%; :target{display: block};">
          <a href="#" style="font-size: 1.5rem; position: absolute; right: 1rem; top: 5px">&#10006;</a>
          <div class="">
            <br>
            <h5 style="text-transform: uppercase" class="center-align"><?= $annonces['title']; ?></h5>
            <br><hr>

            <br/>
            <div class="col s6 m6">
              <div><strong><?= $annonces['city'] ?></strong></div>
              <div>Adresse : <?= $annonces['address_article'] ?></div>
              <div>Date de début : <?= date('d-m-Y', strtotime($annonces['start_date'])); ?></div>
              <div>Date de fin : <?= date('d-m-Y', strtotime($annonces['end_date'])); ?></div>
            </div>

            <div class="col s6 m6">
              <p class="cyan-text accent-3 right-align" style="font-size: 3rem; margin: 1rem"><?= $annonces['price'] ?> €</p>
            </div>

            <div class="col s6 m6">
              <p style='text-align: justify;'><?= $annonces['description'] ?></p>
            </div>

            <div>
              <img style="width: 25%; border-radius: 15px; margin: 1.5rem 2.5rem" src="<?= $annonces['image_url'] ? '../../assets/uploads/' . $annonces['image_url'] : '../../assets/img/test.jpg' ?>" class="img-responsive z-depth-1">
            </div>
          </div>
          <div class="modal-footer">
            <a href="../views/annonces.php?annonceId=<?= $annonces['id'] ?>" class="btn cyan accent-3">Réserver</a>
          </div>
        </div>
      <?php
      };
      ?>
    </div>
  </div>
</section>

<style>
  .modal:target {
    display: block !important;
  }
</style>