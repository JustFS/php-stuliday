
<nav class="row">
  <div class="nav-wrapper cyan accent-3">
    <a class="brand-logo" href="<?= '/index.php' ?>">Stuliday</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li class="">
        <a class="" href="<?= URLROOT . 'libraries/views/annonces.php' ?>">Annonces</a>
      </li>
      <?php
      if (empty($_SESSION)) {
      ?>
        <li class="">
          <a class="" href="libraries/views/login.php">Login</a>
        </li>
      <?php
      }
      ?>

      <?php
      if (isset($_SESSION['email'])) {
      ?>
        <li class="">
          <a href="<?=  'views/profile.php' ?>" class="nav-link">Mon compte</a>
        </li>
        <li class="">
          <a href="?logout" class="nav-link">Se déconnecter</a>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>
</nav>