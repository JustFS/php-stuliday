<?php

require_once 'Model.php';

class Utils extends Model
{

  function counter(string $table,  string $target)
  {
    $id = $_SESSION['id'];
    $sql = $this->pdo->prepare("SELECT COUNT(*) FROM $table WHERE `$target`=$id");

    $sql->execute();
    $data_array = $sql->fetchColumn();
    var_dump($data_array);
    return $data_array;
  }
}
?>