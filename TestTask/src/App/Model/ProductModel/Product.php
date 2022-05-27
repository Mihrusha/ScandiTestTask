<?php

namespace App\Model\ProductModel;

abstract class Product
{
    public $id;
    public $name;
    public $SKU;
    public $price;
    public $size;

    public function __construct($id = null, $name = null, $SKU = null, $price = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->SKU = $SKU;
        $this->price = $price;
    }
   
    abstract public function Hello();
    

    function get_all_items($conn)
    {

        $sql = "SELECT*FROM items ORDER by id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $items = $stmt->fetchAll();
        } else {
            $items = 0;
        }

        return $items;
    }

    function delete($conn,$method)
    {
        $userid = $conn->quote($method);
        $sql = "DELETE FROM items WHERE id = $userid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        $conn = null;
    }


}


?>