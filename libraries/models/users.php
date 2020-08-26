<?php


function displayAllUsers() {
  global $db;
  $sql = $db->query("SELECT * FROM users");
  $sql->setFetchMode(PDO::FETCH_ASSOC);

  while($user = $sql->fetch()){
    ?>
    <div class="card">
      <h2>User n° <?= $user['id']; ?></h2>
      <p><?= $user['email']; ?></p>
    </div>
  <?php
  }
};