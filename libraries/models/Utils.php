<?php

require_once 'Model.php';

class Utils extends Model
{

  function counter(string $table,  string $target)
  {
    $sql = $this->pdo->prepare("SELECT COUNT(*) FROM $table WHERE `$target`=$this->idSession");

    $sql->execute();
    $data_array = $sql->fetchColumn();

    return $data_array;
  }
}
?>