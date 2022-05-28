<?php

include 'C:\xampp\htdocs\TestTask\src\App\Core\database_connection.php';

if(isset($_POST["check"])==true)
{
   
  
    $sql = "DELETE FROM items";
    $stmt = $conn->prepare($sql);
    //$stmt->execute([$userid]);
    if($conn->query($sql)){
         
        header("Location: admin.php");
    }
    else{
        echo "Ошибка: " . $conn->error;
    }
    $conn= null;  
}
?>