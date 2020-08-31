<?php

$id = $_GET['id'];

require_once '../models/Annonces.php';
$model = new Annonces();
$model->delete('annonces', $id);

// header('Location: ../views/profile.php');

?>