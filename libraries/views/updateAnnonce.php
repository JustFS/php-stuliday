<?php

$page = 'Mise à jour';
require_once '../config/session.php';
require_once '../config/database.php';
require_once '../models/Annonces.php';
require_once '../controllers/updateAnnonce.php';

require_once '../utils.php';
render('templates/displayUpdateAnnonce', '');

?>
