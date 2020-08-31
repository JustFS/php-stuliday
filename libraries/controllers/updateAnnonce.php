<?php

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
  $id = $_GET['id'];

  $sth = $model->update($id);

  $sth->bindValue(':title', $title);
  $sth->bindValue(':start_date', $start_date);
  $sth->bindValue(':end_date', $end_date);
  $sth->bindValue(':description', $description);
  $sth->bindValue(':address_article', $address_article);
  $sth->bindValue(':city', $city);
  $sth->bindValue(':category', $category);
  $sth->bindValue(':price', $price);
  $sth->bindValue(':image_url', $img_name);

  $sth->execute();

  header('Location: ../views/profile.php');
};
