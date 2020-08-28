<?php 

  require_once('connect.php');

  global $db;
  $id = $_GET['id'];

  $sql = $db->query("DELETE FROM annonces WHERE id=$id");

  header('Location: ../views/profile.php');

  ?>