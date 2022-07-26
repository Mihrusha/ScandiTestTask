<?php
namespace App\Model;

use App\Core\Database;
use App\Model\Product;

class Disc extends Product
{

    public function GetDisc()
    {
        $db = new Database;
        $sql = "SELECT disc_id,disc_name,disc_SKU,disc_price,size from discs";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $items = $stmt->fetchAll();
        } else {
            $items = 0;
        }

        return $items;
        header( "Location:index.php");

    }

    function AddDisc($name,$SKU,$price,$size)
    {
        $db = new Database;
        $furn=new Furniture;
        $book = new book;
        if(($book->Check($SKU)>0)||($furn->Check($SKU)>0))
        {
            echo "Error.Already Exist";
           
        }


         else if (!empty($size)&& ($this->Check($SKU)==0)){

            $name = $db->conn->quote($name);
            $SKU = $db->conn->quote($SKU);
            $price = $db->conn->quote($price);
            $size = $db->conn->quote($size);

            $name=$this->check_input($name);
            $SKU=$this->check_input($SKU);
            $price=$this->check_input($price);
            $size=$this->check_input($size);
           
            $sql = "INSERT INTO discs (disc_name, disc_SKU, disc_price,size,category_id) VALUES ($name, $SKU, $price,$size,2)";
            $stmt = $db->conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
            }
            // header('C:\xampp\htdocs\TestTask\index.php');

            header( "Location:index.php");


        }
    }
    public  function Delete($id)
    {
        $db = new Database;

        $checkbox = $id;
        $extract = implode(',', $checkbox);

        $sql = "DELETE FROM discs WHERE disc_id IN($extract)";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();

       
    }

    public function Check($SKU)
    {
        $db = new Database;
        $stmt = $db->conn->prepare("SELECT disc_SKU FROM discs WHERE disc_SKU = '$SKU'");
        $stmt->bindParam('disc_SKU', $SKU);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Error exists!";
            return 1;
        } else {
            //echo "non existant";
            return 0;
        }
    }
   
}

?>