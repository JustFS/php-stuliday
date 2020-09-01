<?php

/**
 * Passe la réservation dans la DB et passe la valeur active à 0
 */

require_once '../config/session.php';
require_once '../models/Annonces.php';

$model = new Annonces();

if (!empty($_POST['start_date']) && !empty($_POST['end_date'])) {

  $startDate = htmlspecialchars($_POST['start_date']);
  $endDate = htmlspecialchars($_POST['end_date']);
  $userId = htmlspecialchars($_SESSION['id']);
  $annonceId = htmlspecialchars($_GET['annonceId']);

  $sth = $model->validateAnnonceBooked();

  $sth->bindValue(':start_date', $startDate);
  $sth->bindValue(':end_date', $endDate);
  $sth->bindValue(':id_user', $userId);
  $sth->bindValue(':id_annonce', $annonceId);

  $sth->execute();

  // switch booked value
  $sql = $model->switchAnnonceBooked($annonceId);
  $sql->bindValue(':active', 0);
  $sql->execute();

  header('Location: ../views/profile.php');
} else {
  echo 'Date mal remplies';
};
