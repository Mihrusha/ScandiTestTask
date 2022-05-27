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

}
?>