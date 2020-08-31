<?php

require_once 'Model.php';

class User extends Model
{

  function update($id)
  {
    $sth = $this->pdo->prepare("UPDATE users SET lastName=:lastName, firstName=:firstName, email=:email WHERE id=$id");

    return $sth;
  }

  function info()
  {
    $id = $_SESSION['id'];
    $sql = $this->pdo->query("SELECT * FROM users WHERE id=$id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    return $sql;
  }

  function annonces()
  {
    $id = $_SESSION['id'];

    $sql = $this->pdo->query("SELECT * FROM annonces WHERE author_article=$id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    return $sql;
  }

  function bookings()
  {
    $id = $_SESSION['id'];

    $sql = $this->pdo->query("SELECT * FROM reservations WHERE id_user=$id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    return $sql;
  }
};
