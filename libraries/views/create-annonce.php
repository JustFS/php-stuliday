<?php

require('templates/header.php');
require('templates/nav.php');


?>
<div class="container">
  <h2>Déposer une annonce</h2>

  <div class="row center-align">
    <form action="../models/create-annonce-post.php" method="post" class="col s12" enctype="multitype/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input id="title" name="title" type="text" required class="validate">
          <label for="title">Titre de l'annonce</label>
        </div>

        <div class="input-field col s6">
          <input id="start_date" name="start_date" type="date" required class="validate">
          <label for="start_date">Date de début</label>
        </div>

        <div class="input-field col s6">
          <input id="end_date" name="end_date" type="date" required class="validate">
          <label for="end_date">Date de fin</label>
        </div>

        <div class="input-field col s12">
          <textarea id="description" name="description" required class="materialize-textarea"></textarea>
          <label for="description">Description du logement</label>
        </div>

        <div class="input-field col s12">
          <input id="city" type="text" name="city" required class="validate">
          <label for="city">Ville</label>
        </div>

        <div class="input-field col s12">
          <input id="address_article" name="address_article" required type="text" class="validate">
          <label for="address_article">Adresse</label>
        </div>

        <div class="input-field col s4">
          <input id="category" type="text" name="category" required class="validate">
          <label for="category">Type de logement</label>
        </div>

        <div class="input-field col s4">
          <input id="price" type="text" name="price" required class="validate">
          <label for="price">Prix</label>
        </div>

        <div class="input-field col s4">
          <span>Télécharger une photo</span>
          <input type="file" id="image_url" name="image_url" class="">
        </div>

        <div>
          <input type="submit" class="btn cyan accent-3 col s6" />
        </div>

    </form>
  </div>
</div>


<?php require('templates/footer.php'); ?>