<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
  # server name
  private $sName = "localhost";
  # user name
  private $uName = "root";
  # password
  private $pass = "";

  # database name
  private $db_name = "products";

  public $conn;

  public function __construct()
  {

    try {
      $this->conn = new PDO(
        "mysql:host=$this->sName;dbname=$this->db_name",
        $this->uName,
        $this->pass
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed : " . $e->getMessage();
    }
  }

  public function Query($sql, $data = [], $class)
  {
    $sth = $this->conn->prepare($sql);
    $sth->execute($data);
    
    if ($sth->rowCount() > 0) {
      $items = $sth->fetchAll();
      } else {
          $items = 0;
       }

      return $items;
  }
}
