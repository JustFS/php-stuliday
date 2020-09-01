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
    $sql = $this->pdo->query("SELECT * FROM users WHERE id=$this->idSession");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    return $sql;
  }

  function annonces()
  {
    $sql = $this->pdo->query("SELECT * FROM annonces WHERE author_article=$this->idSession");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    return $sql;
  }

  function bookings()
  {
    $sql = $this->pdo->query("SELECT r.*, a.id as aid, a.title, a.image_url FROM reservations r LEFT JOIN annonces a ON r.id_annonce=a.id WHERE id_user=$this->idSession");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    return $sql;
  }
};
