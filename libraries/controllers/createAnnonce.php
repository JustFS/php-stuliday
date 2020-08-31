<?php

require_once '../config/session.php';
require_once '../config/database.php';
require_once '../models/Annonces.php';

$model = new Annonces();

if (
	!empty($_POST['title'])
	&& !empty($_POST['start_date'])
	&& !empty($_POST['end_date'])
	&& !empty($_POST['description'])
	&& !empty($_POST['city'])
	&& !empty($_POST['address_article'])
	&& !empty($_POST['category'])
	&& !empty($_POST['price'])
) {
	$title = htmlspecialchars($_POST['title']);
	$start_date = htmlspecialchars($_POST['start_date']);
	$end_date = htmlspecialchars($_POST['end_date']);
	$description = htmlspecialchars($_POST['description']);
	$city = htmlspecialchars($_POST['city']);
	$address_article = htmlspecialchars($_POST['address_article']);
	$category = htmlspecialchars($_POST['category']);
	$price = htmlspecialchars($_POST['price']);
	$user_id = $_SESSION['id'];
	$file = $_FILES['image_url'];

	if ($file['size'] <= 1000000) {
		$valid_ext = array('jpg', 'jpeg', 'gif', 'png');
		$check_ext = strtolower(substr(strrchr($file['name'], '.'), 1));

		if (in_array($check_ext, $valid_ext)) {
			$img_name = uniqid() . '_' . $file['name'];
			$upload_dir = '../../assets/uploads/';
			$upload_name = $upload_dir . $img_name;
			$move_result = move_uploaded_file($file['tmp_name'], $upload_name);

			if ($move_result) {

        $sth = $model->create();

				$sth->bindValue(':title', $title);
				$sth->bindValue(':start_date', $start_date);
				$sth->bindValue(':end_date', $end_date);
				$sth->bindValue(':description', $description);
				$sth->bindValue(':address_article', $address_article);
				$sth->bindValue(':city', $city);
				$sth->bindValue(':category', $category);
				$sth->bindValue(':price', $price);
				$sth->bindValue(':author_article', $user_id);
				$sth->bindValue(':image_url', $img_name);

				$sth->execute();

        header('Location: ../../index.php');
			} else {
				echo 'empty';
			}
		} else {
			echo 'mauvais format';
		}
	} else {
		echo 'trop volumineux';
	}
}
