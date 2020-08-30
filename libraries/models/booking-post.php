<?php
require_once 'connect.php';

if (!empty($_POST['start_date']) && !empty($_POST['end_date'])) {

  $startDate = htmlspecialchars($_POST['start_date']);
  $endDate = htmlspecialchars($_POST['end_date']);
  $userId = $_SESSION['id'];
  $annonceId = htmlspecialchars($_GET['annonceId']);
  
  $sth = $db->prepare("INSERT INTO reservations (start_date, end_date, id_user, id_annonce) VALUES (:start_date, :end_date, :id_user, :id_annonce)");

  $sth->bindValue(':start_date', $startDate);
  $sth->bindValue(':end_date', $endDate);
  $sth->bindValue(':id_user', $userId);
  $sth->bindValue(':id_annonce', $annonceId);

  $sth->execute();

  header('Location: ../views/profile.php');
};
