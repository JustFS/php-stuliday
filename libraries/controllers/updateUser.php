<?php

require_once '../config/session.php';
require_once '../config/database.php';
require_once '../models/Users.php';
require_once '../controllers/updateUser.php';

$user = new User();

if (!empty($_POST['lastName']) || !empty($_POST['firstName']) || !empty($_POST['email'])) {

  $lastName = htmlspecialchars($_POST['lastName']);
  $firstName = htmlspecialchars($_POST['firstName']);
  $email = htmlspecialchars($_POST['email']);
  $id = $_SESSION['id'];

  $sth = $user->update($id);

  $sth->bindValue(':lastName', $lastName);
  $sth->bindValue(':firstName', $firstName);
  $sth->bindValue(':email', $email);

  $sth->execute();

  header('Location: /php-stuliday/index.php');
}
