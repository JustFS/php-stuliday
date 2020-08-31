<?php

if (!isset($_POST['start_date']) && !isset($_POST['end_date'])) {

  $startDate = htmlspecialchars($_POST['start_date']);
  $endDate = htmlspecialchars($_POST['end_date']);
  $userId = $_SESSION['id'];
  $annonceId = htmlspecialchars($_GET['annonceId']);

  $model = new Annonces();
  $sth = $model->validateAnnonceBooked();

  $sth->bindValue(':start_date', $startDate);
  $sth->bindValue(':end_date', $endDate);
  $sth->bindValue(':id_user', $userId);
  $sth->bindValue(':id_annonce', $annonceId);

  $sth->execute();

  header('Location: ../views/profile.php');
} else {
  echo 'something went wrong';
}
