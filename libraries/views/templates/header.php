<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/php-stuliday/config/config.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/php-stuliday/config/session.php'); 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Stuliday - Créez et gérez vos réservations de vacances en ligne !</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="<?= URLROOT . '/assets/css/main.css'?>" type="text/css" rel="stylesheet">
</head>

<body style="background: rgb(246, 246, 246)">