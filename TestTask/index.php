<?php

namespace App;
require_once __DIR__.'/vendor/autoload.php';
include 'C:\xampp\htdocs\TestTask\src\App\Core\database_connection.php';

use App\Controller\Controller;

$prod=new Controller;
// $prod->disc->Hello();

 $prod->getAll($conn);

?>