<?php

require_once 'Model.php';

class Login extends Model
{

  function countAlreadyExists($user_email)
  {
    if ($sql = $this->pdo->query("SELECT * FROM users WHERE email = '$user_email'")) {
      $counter = $sql->rowCount();

      return $counter;
    }
  }

  function signUp()
  {
    $sth = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");

    return $sth;
  }

  function signIn($user_email)
  {
    $sql = $this->pdo->query("SELECT * FROM users WHERE email = '$user_email'");
    
    return $sql;
  }
}
