<?php

require_once 'Model.php';

class Annonces extends Model
{
 
  public function list()
  {
    $sql = $this->pdo->query("SELECT * FROM annonces ORDER BY publish_date DESC");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    
    return $sql;
  }
  
  function create()
  {
    
    $sth = $this->pdo->prepare("INSERT INTO annonces (title, start_date, end_date,description, address_article, city, category,price, image_url, author_article) VALUES (:title, :start_date, :end_date,:description, :address_article, :city, :category,:price, :image_url, :author_article)");
    
    return $sth;
  }
  
  function update($id)
  {
    $sth = $this->pdo->prepare("UPDATE annonces SET title=:title, start_date=:start_date, end_date=:end_date,description=:description, address_article=:address_article, city=:city, category=:category,price=:price, image_url=:image_url WHERE id=$id");
    
    return $sth;
  }

  function delete($type, $id)
  {
    $sql = $this->pdo->query("DELETE FROM $type WHERE id='$id'");

    return $sql;
  }
  
  function getAnnonce()
  {
    $id = $_GET['id'];
    $sql = $this->pdo->query("SELECT * FROM annonces WHERE id=$id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    
    return $sql;
  }
  
  function annonceToBook($annonceId)
  {
    $sql = $this->pdo->query("SELECT * FROM annonces WHERE id=$annonceId");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    
    return $sql;
  }

  function validateAnnonceBooked()
  {
    $sth = $this->pdo->prepare("INSERT INTO reservations (start_date, end_date, id_user, id_annonce) VALUES (:start_date, :end_date, :id_user, :id_annonce)");

    return $sth;
  }
};
  