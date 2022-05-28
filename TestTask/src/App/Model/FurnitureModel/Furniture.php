<?php

namespace App\Model\FurnitureModel;

use App\Model\ProductModel\Product;

class Furniture extends Product
{

    
    public function __construct($id = null, $name = null, $SKU = null, $price = null,$height=null,$width=null,$lenght=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->SKU = $SKU;
        $this->price = $price;
        $this->height=$height;
        $this->width=$width;
        $this->lenght=$lenght;

    }
   
   

    function AddFurniture($conn)
    {
        if (!empty($_POST["name"])) {
           
                $name = $conn->quote($_POST["name"]);
                $SKU = $conn->quote($_POST["SKU"]);
                $price = $conn->quote($_POST["price"]);
               
                $height=$conn->quote($_POST["dim1"]);
                $width=$conn->quote($_POST["dim2"]);
                $lenght=$conn->quote($_POST["dim3"]);
                $category_name=$conn->quote($_POST["category"]);
                $sql = "INSERT INTO items (name, SKU, price,dim1,dim2,dim3,category_name) VALUES ($name, $SKU, $price,$height,$width,$lenght,$category_name)";
                $stmt = $conn->prepare($sql);
                if ($sql != null) {
                    $stmt->execute();
                }
                // header('C:\xampp\htdocs\TestTask\index.php');
    
                $conn = null;
            }
    }

}
?>