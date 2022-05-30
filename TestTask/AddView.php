<?php

namespace App;

include 'C:\xampp\htdocs\TestTask\src\App\Core\database_connection.php';
require_once 'C:\xampp\htdocs\TestTask\vendor\autoload.php';

use App\Controller\Controller;

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">
</head>



<body>


    <form action='' method='post' id=#product_form>

        <header>
            <div class='container  p-3 m-8 border-2 border-bottom border-success '>
                <div class='row'>
                    <div class='col-9'>
                        <h3>Product Add </h3>
                    </div>
                    <div class='col'>


                        <input type="submit" name='save' id='delete-product-btn' class="btn btn-card border-2 btn-danger" value="SAVE">



                    </div>
                    <div class='col'>

                        <a class='btn btn-card border-2 btn-primary' href="/TestTask/index.php" value="">CANCEL</a>


                    </div>

                </div>
            </div>
        </header>


        <div class="container">
            <div class="row mt-4">
                <div class="col-1 m-1">SKU</div>
                <div class="col-1"><input type="text" class="form-control m-1" id="#sku"  name="SKU" aria-label="SKU"></div>
            </div>
            <div class="row">
                <div class="col-1 m-1">Name</div>
                <div class="col-1"><input type="text" class="form-control m-1" id="#name"  name="name" aria-label="Name"></div>
            </div>
            <div class="row">
                <div class="col-1 m-1">Price</div>
                <div class="col-1"><input type="text" class="form-control m-1" id="#price"  name="price" aria-label="Price"></div>
                
            </div>
            
            <select class="custom-select custom-select-lg mb-3 ml-4 pl-6" id = "productType" name="Type" onchange="this.form.submit()">
                <option selected>Swith Type</option>
                <option id="#Disc" name='value'value="Disc">Disc</option>
                
                <option id="#Furniture" name='value'value="Furniture">Furniture</option>
                <option id="#Book" name='value'value="Book">Book</option>
            </select>
        </div>
        <div class="container">
            <?php
            // echo $_POST['Type'];
           
            $item = new Controller;
            $item->Type($_POST['Type']);
            $item->Add($conn, $_POST['save'],$_POST['Type']);
            ?>
            <input type="hidden" class="form-control m-1" placeholder="#price" name="category" aria-label="Price" value=<?= $_POST['Type'] ?>>
        </div>


    </form>

</body>

<footer>
    <div class='container border-top border-success   position-absolute bottom-0 start-50 end-50 translate-middle'>
        
            <p class='text-center'>ScandiWeb Task Assighnent</p>
       
    </div>
</footer>

</html>