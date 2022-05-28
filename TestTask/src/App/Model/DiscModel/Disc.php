<?php

namespace App\Model\DiscModel;

use App\Model\ProductModel\Product;

class Disc extends Product
{

    
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

    function AddDisc($conn2)
    {
        if (!empty($_POST["name"])) {
           
            $name = $conn2->quote($_POST["name"]);
            $SKU = $conn2->quote($_POST["SKU"]);
            $price = $conn2->quote($_POST["price"]);
            $size = $conn2->quote($_POST["size"]);
            $category_name=$conn2->quote($_POST["category"]);
            $sql2 = "INSERT INTO items (name, SKU, price,size,category_name) VALUES ($name, $SKU, $price,$size,$category_name)";
            $stmt2 = $conn2->prepare($sql2);
            if ($sql2 != null) {
                $stmt2->execute();
            }
            // header('C:\xampp\htdocs\TestTask\index.php');

            $conn = null;
        }
    }

}
?>