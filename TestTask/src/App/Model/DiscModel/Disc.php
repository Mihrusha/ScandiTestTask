<?php

namespace App\Model\DiscModel;

use App\Model\ProductModel\Product;

class Disc extends Product
{
    public $size;
    
    public function __construct($id = null, $name = null, $SKU = null, $price = null,$size=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->SKU = $SKU;
        $this->price = $price;
        $this->size=$size;
    }
   
    public function Hello()
    {
        echo'Hello';
    }

    function Add($conn)
    {
        if (!empty($_POST["name"])) {
           
            $name = $conn->quote($_POST["name"]);
            $SKU = $conn->quote($_POST["SKU"]);
            $price = $conn->quote($_POST["price"]);
            $size = $conn->quote($_POST["size"]);
            $category_name=$conn->quote($_POST["category"]);
            $sql = "INSERT INTO items (name, SKU, price,size,category_name) VALUES ($name, $SKU, $price,$size,$category_name)";
            $stmt = $conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
            }
            // header('C:\xampp\htdocs\TestTask\index.php');

            $conn = null;
        }
    }

    function getAllitems($conn)
    {
        $word='Disc';
        $sql = "SELECT*FROM items where category_name = '$word'" ;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $items = $stmt->fetchAll();
        } else {
            $items = 0;
        }

        return $items;
    }

    

}
?>