<?php

session_start();

if (empty($_SESSION) && $page == 'annonce' || empty($_SESSION) && $page == 'single-annonce') {
	header('Location: login.php');
	exit;
}
if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: index.php');
}
