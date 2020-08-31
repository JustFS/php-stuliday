<?php

$page = 'Login';

require_once '../config/session.php';
require_once '../config/database.php';
require_once '../models/Login.php';
require_once '../controllers/login.php';

require_once '../utils.php';
render('templates/login', '');

?>