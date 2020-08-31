<?php

session_start();

if (empty($_SESSION) && $page == 'Annonces' || empty($_SESSION) && $page == 'Annonce') {
	header('Location: login.php');
	exit;
}
if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: index.php');
}
