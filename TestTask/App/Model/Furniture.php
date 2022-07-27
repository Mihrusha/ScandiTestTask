<?php

namespace App\Model;

use App\Core\Database;

class Furniture extends Product
{
    public function Get()
    {
        $db = new Database;
        $sql = "SELECT furniture_id,furniture_name,furniture_SKU,furniture_price,width,height,length FROM furniture";
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


    public  function Delete($id=null)
    {
        $db = new Database;

        $checkbox = $id;
        $extract = implode(',', $checkbox);

        $sql = "DELETE FROM furniture WHERE furniture_id IN($extract)";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();

       
    }



    function AddFurniture($name,$SKU,$price,$width,$height,$length)
    {
        $db = new Database;
        $disc=new Disc;
        $book = new book;
        if(($book->Check($SKU)>0)||($disc->Check($SKU)>0)||($this->Check($SKU)>0))
        {
            $massage='error';
            header("Location: App\View\AddView.php?$massage='Error Already Exist'&''");
           
        }

        elseif($name==''||$SKU==''||$price==''){
            $massage='error';
            header("Location: App\View\AddView.php?$massage='Please, submit required data'&''");
           
        }

        else
            $name = $db->conn->quote($name);
            $SKU = $db->conn->quote($SKU);
            $price = $db->conn->quote($price);
            $width = $db->conn->quote($width);
            $height = $db->conn->quote($height);
            $length=$db->conn->quote($length);

            $name=$this->check_input($name);
            $SKU=$this->check_input($SKU);
            $price=$this->check_input($price);
            $width=$this->check_input($width);
            $height=$this->check_input($height);
            $length=$this->check_input($length);
           
            $sql = "INSERT INTO furniture (furniture_name, furniture_SKU, furniture_price,width,height,length,category_id) VALUES ($name, $SKU, $price,$width,$height,$length,3)";
            $stmt = $db->conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
                header( "Location:index.php");
            }
           
    }

    public function Check($SKU)
    {
        $db = new Database;
        $stmt = $db->conn->prepare("SELECT furniture_SKU FROM furniture WHERE furniture_SKU = '$SKU'");
        $stmt->bindParam('furniture_SKU', $SKU);
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
