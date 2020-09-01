<?php

$id = $_GET['id'];

$model = new Annonces();
$sql = $model->getAnnonce();
while ($annonces = $sql->fetch()) {
?>
  <div class="container">
    <h2>Editez votre annonce</h2>
    <div class="row center-align">
      <form action="../controllers/updateAnnonce.php?id=<?= $id ?>" method="post" class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <input id="title" name="title" type="text" value="<?= $annonces['title'] ?>" class="validate">
          </div>

          <div class="input-field col s6">
            <input id="start_date" min=<?= $annonces['start_date'] ?> value="<?= $annonces['start_date'] ?>" name="start_date" type="date" class="validate">
          </div>

          <div class="input-field col s6">
            <input id="end_date" min=<?= $annonces['start_date'] ?> value="<?= $annonces['end_date'] ?>" name="end_date" type="date" class="validate">
          </div>

          <div class="input-field col s12">
            <input id="description" value="<?= $annonces['description'] ?>" name="description" required class="materialize-textarea"></input>
          </div>

          <div class="input-field col s12">
            <input id="city" type="text" value="<?= $annonces['city'] ?>" name="city" required class="validate">
          </div>

          <div class="input-field col s12">
            <input id="address_article" value="<?= $annonces['address_article'] ?>" name="address_article" required type="text" class="validate">
          </div>

          <div class="input-field col s4">
            <input id="category" type="text" value="<?= $annonces['category'] ?>" name="category" required class="validate">
          </div>

          <div class="input-field col s4">
            <input id="price" type="text" value="<?= $annonces['price'] ?>" name="price" required class="validate">
          </div>

          <div>
            <input type="submit" value="Valider modifications" class="btn cyan accent-3 col s6" />
          </div>
      </form>
    </div>
  </div>

<?php
};

?>