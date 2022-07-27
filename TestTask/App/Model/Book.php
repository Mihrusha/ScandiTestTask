<?php

namespace App\Model;

use App\Core\Database;

class Book extends Product
{
    public const TABLE = 'books';

    public $weight;

    public function Get()
    {
        $db = new Database;
        $sql = "SELECT book_id,book_name,book_SKU,book_price,weight FROM books";
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

        $sql = "DELETE FROM books WHERE book_id IN($extract)";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();

    }


    function AddBook($name,$SKU,$price,$weight)
    {
        $db = new Database;
        $disc=new Disc;
        $furn = new Furniture;
        
  
        if($name==''||$SKU==''||$price==''){
           
            $massage='error';
            header("Location: App\View\AddView.php?$massage='Please, submit required data'&''");
        }

         else if (($disc->Check($SKU)>0)||($furn->Check($SKU)>0)||$this->Check($SKU)>0)
        {
            $massage='error';
            header("Location: App\View\AddView.php?$massage='Error Already Exist'&''");
           
        }

        else

            $name = $db->conn->quote($name);
            $SKU = $db->conn->quote($SKU);
            $price = $db->conn->quote($price);
            $weight = $db->conn->quote($weight);

            $name=$this->check_input($name);
            $SKU=$this->check_input($SKU);
            $price=$this->check_input($price);
            $weight=$this->check_input($weight);

            $sql = "INSERT INTO books (book_name, book_SKU, book_price,weight,category_id) VALUES ($name, $SKU, $price,$weight,1)";
            $stmt = $db->conn->prepare($sql);
            if ($sql != null) {
                $stmt->execute();
                header( "Location:index.php");
            }
            
              
    }


    public function Check($SKU)
    {
        $db = new Database;
        $stmt = $db->conn->prepare("SELECT book_SKU FROM books WHERE book_SKU = '$SKU'");
        $stmt->bindParam('book_SKU', $SKU);
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
