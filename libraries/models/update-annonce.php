<?php
$page = 'update';

require_once('connect.php');
require('../views/templates/header.php');
require('../views/templates/nav.php');


global $db;
$id = $_GET['id'];

$sql = $db->query("SELECT * FROM annonces WHERE id=$id");
$sql->setFetchMode(PDO::FETCH_ASSOC);

while ($annonces = $sql->fetch()) {
?>
  <div class="container">
    <h2>Editez votre annonce</h2>
    <div class="row center-align">
      <form action="update-annonce-post.php?id=<?= $id ?>" method="post" class="col s12" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s12">
            <input id="title" name="title" type="text" value="<?= $annonces['title'] ?>" required class="validate">
          </div>

          <div class="input-field col s6">
            <input id="start_date" value="<?= $annonces['start_date'] ?>" name="start_date" type="date" required class="validate">
          </div>

          <div class="input-field col s6">
            <input id="end_date" value="<?= $annonces['end_date'] ?>" name="end_date" type="date" required class="validate">
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
            </>

      </form>
    </div>
  </div>

<?php
};

?>