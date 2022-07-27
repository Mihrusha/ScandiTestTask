<?php

namespace App\Model;

use App\Core\Database;

 abstract class Product

{
     public abstract function Get();
    
     public function check_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        } 

     public  abstract function Check($data);

}

