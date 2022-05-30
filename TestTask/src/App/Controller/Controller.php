<?php 
namespace App\Controller;
use App\Model\ProductModel\product;
use App\Model\DiscModel\Disc;
use App\Model\BookModel\Book;
use App\Model\FurnitureModel\Furniture;

class Controller
{
    
    
    public function __construct()
    {   
        // $this->prod=new Product();
        $this->book=new Book();
        $this->disc=new Disc();
        $this->furniture=new Furniture();
    }
    
    

    public function getAll($conn)
    {
       
        $disc= $this->disc->getAllitems($conn);
        $book= $this->book->getAllitems($conn);
        $furniture= $this->furniture->getAllitems($conn);
        $this->Delete($conn);
        include_once ('src\App\View\MainView.php');
        // return $items;
    }

    public function Delete($conn)
    {
       
        if (isset($_POST["delete"]) ) {
            $items = $this->disc->Delete($conn,$_POST["check"]);
            header("Location: index.php");
        }
    }

    function Type($method)
    {
       
        if($method=='Disc')
        {
             echo '<div class="container border border-success" style="width:250px; margin-left:5px;">';
             echo'<div class="row"><div class="col-5 m-2">Sise(MB):</div><div class="col-5  m-2"><input type="text" class="form-control"  id="#size"name="size"aria-label="Size"></div></div>';
             echo'<div class="row"><h5>Please put Size in MB</h5></div>';
             echo '</div>';
        }
        if($method=='Book')
        {
            echo '<div class="container border border-success" style="width:250px; margin-left:5px;">';
            echo'<div class="row"><div class="col-5 m-2">Weight(KG):</div><div class="col-5 m-2"><input type="text" class="form-control"  id="#weight" name="weight"aria-label="Weight"></div></div>';
            echo'<div class="row"><h5>Please put Weight in KG</h5></div>';
            echo '</div>';
        }
        if($method=='Furniture')
        {
            echo '<div class="container border border-success" style="width:350px; margin-left:5px;">';
            echo'<div class="row"><div class="col-5 m-2">Height(CM):</div><div class="col-5"><input type="text" class="form-control m-1"  id="#height" name="dim1"aria-label="Height"></div></div>';
            echo'<div class="row"><div class="col-5 m-2">Width(CM):</div><div class="col-5"><input type="text" class="form-control m-1"  id="#width"name="dim2"aria-label="Width"></div></div>';
            echo'<div class="row"><div class="col-5 m-2">Lenght(CM):</div><div class="col-5"><input type="text" class="form-control m-1"  id="#lenght" name="dim3"aria-label="Lenght"></div></div>';
            echo'<div class="row"><h5>Please provide dimension in H*W*L format</h5></div>';
            echo '</div>';

        }
       
    }

    function Add($conn,$method,$category)
    {
        if (isset($method) && !empty($method)&& !empty($category)) {
            //$this->disc->Add($conn);
            //$this->disc->AddDisc($conn);
            
            if (isset($category)=='Book')
            {
                $this->book->Add($conn);
            }
            if (isset($category)=='Disc')
            {
                $this->disc->Add($conn);
            }
           if (isset($category)=='Furniture')
            {
                $this->furniture->Add($conn);
            }
            
            echo '<script type="text/javascript">';
            echo ' window.location = "/TestTask/index.php"';  //not showing an alert box.
            echo '</script>';
        }
    }


}


?>