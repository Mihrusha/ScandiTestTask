<?php

namespace App\Model\ProductModel;

 abstract class Product
{
    public $id;
    public $name;
    public $SKU;
    public $price;
    public $category_name;

    public function __construct($id = null, $name = null, $SKU = null, $price = null,$category_name=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->SKU = $SKU;
        $this->price = $price;
        $this->category_name=$category_name;
    }
   
   
    

   abstract function getAllitems($conn);
    // {

        // $sql = "SELECT*FROM items" ;
        // $stmt = $conn->prepare($sql);
        // $stmt->execute();
        // if ($stmt->rowCount() > 0) {
        //     $items = $stmt->fetchAll();
        // } else {
        //     $items = 0;
        // }

        // return $items;
    // }

   

    function Delete($conn,$method)
    {
        $userid = $conn->quote($method);
        $sql = "DELETE FROM items WHERE id = $userid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;
       
    }

    abstract function Add($conn);
    // {
    //     // if (!empty($_POST["name"])) {
           
    //     //     $name = $conn->quote($_POST["name"]);
    //     //     $SKU = $conn->quote($_POST["SKU"]);
    //     //     $price = $conn->quote($_POST["price"]);
    //     //     $weight = $conn->quote($_POST["weight"]);
    //     //     $size = $conn->quote($_POST["size"]);
    //     //     $height=$conn->quote($_POST["dim1"]);
    //     //     $width=$conn->quote($_POST["dim2"]);
    //     //     $leght=$conn->quote($_POST["dim3"]);
    //     //     $category_name=$conn->quote($_POST["category"]);
    //     //     $sql = "INSERT INTO items (name, SKU, price,weight,size,dim1,dim2,dim3,category_name) VALUES ($name, $SKU, $price,$weight,$size,$height,$width,$leght,$category_name)";
    //     //     $stmt = $conn->prepare($sql);
    //     //     if ($sql != null) {
    //     //         $stmt->execute();
    //     //     }
    //     //     // header('C:\xampp\htdocs\TestTask\index.php');

    //     //     $conn = null;
    //     // }
    // }



}


?>