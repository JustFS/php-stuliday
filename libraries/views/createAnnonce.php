<?php

$page = 'Créer une annonces';
require_once '../config/session.php';
require_once '../config/database.php';
require_once '../models/Annonces.php';
require_once '../controllers/createAnnonce.php';

require_once '../utils.php';
render('templates/displayCreateAnnonce', '');

?>
