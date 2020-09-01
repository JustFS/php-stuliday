<?php

require_once '../models/Annonces.php';

$table = htmlspecialchars($_GET['table']);
$id = htmlspecialchars($_GET['id']);
$aid = htmlspecialchars($_GET['aid']);

$model = new Annonces();
$model->delete($table, $id);

// switch active sur 1 pour remettre l'annonce dans le fil
if ($table == 'reservations'){
  $sql = $model->switchAnnonceBooked($aid);
  $sql->bindValue(':active', 1);
  $sql->execute();
}

header('Location: ../views/profile.php');

?>