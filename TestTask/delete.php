<?php

include 'database_connection.php';

if(isset($_POST["id"]))
{
   
    $userid = $conn->quote($_POST["id"]);
    $sql = "DELETE FROM pokidky WHERE id = $userid";
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