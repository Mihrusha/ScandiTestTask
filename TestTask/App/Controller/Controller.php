<?php

namespace App\Controller;

use App\Model\Book;
use App\Model\Disc;
use App\Model\Furniture;
use App\View\View;

class Controller
{

    public function __construct()
    {
        $book = new Book;
        $view = new View;
    }

    public function Add(){
        $veiw = new View;
       
        $veiw->Change();
    }

    public function Main(){

        if(isset($_POST['Add'])){
           $this->Add();
            exit();
          }
        $this->AddBook();
        $this->AddDisc();
        $this->AddFurniture();
        //$this->AddDisc();
        $this->DeleteBook();
        $this->DeleteDisc();
        $this->DeleteFurniture();
        $veiw = new View;
        $book = new Book;
        $disc = new Disc;
        $furniture = new Furniture;
        $books = $book->GetBook();
        $discs = $disc->GetDisc();
        $furns = $furniture->GetFurniture();
        $veiw->Show($books,$discs,$furns);
        
    }

    public function AddBook(){
        $book = new Book;
        if(isset($_POST['Save'])){
            $name=$_POST['name'];
            $SKU = $_POST['SKU'];
            $price=$_POST['price'];
            $weight=$_POST['weight'];
            $book->AddBook($name,$SKU,$price,$weight);
           
        }
        
    }

    public function AddDisc(){
        $disc = new Disc;
        if(isset($_POST['Save'])){
            $name=$_POST['name'];
            $SKU = $_POST['SKU'];
            $price=$_POST['price'];
            $size=$_POST['size'];
            $disc->AddDisc($name,$SKU,$price,$size);
            
        }
        
    }

    public function AddFurniture(){
        $disc = new Furniture;
        if(isset($_POST['Save'])){
            $name=$_POST['name'];
            $SKU = $_POST['SKU'];
            $price=$_POST['price'];
            $width=$_POST['width'];
            $height=$_POST['height'];
            $length=$_POST['length'];
            $disc->AddFurniture($name,$SKU,$price,$width,$height,$length);
            
        }
        
    }

    public function DeleteBook(){
        $book = new Book;
        if(isset($_POST['bookbox'])){
           $id=$_POST['bookbox'];
            $book->Delete($id);
        }
       
    }

    public function DeleteDisc(){
        $disc = new Disc;
       
        if(isset($_POST['checkbox'])){
           $id=$_POST['checkbox'];
            $disc->Delete($id);
           
        }
        
    }

    public function DeleteFurniture(){
        $furniture = new Furniture;
       
        if(isset($_POST['checkbox'])){
           $id=$_POST['checkbox'];
            $furniture->Delete($id);
           
        }
        
    }

}
