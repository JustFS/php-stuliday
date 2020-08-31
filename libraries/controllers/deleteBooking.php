<?php

$id = $_GET['id'];

require_once '../models/Annonces.php';
$model = new Annonces();
$model->delete('reservations', $id);

header('Location: ../views/profile.php');

?>