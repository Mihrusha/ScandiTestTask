<?php

namespace App;

use App\Controller\Controller;
use App\Model\Book;




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

    <form action='' method='post' id=product_form>

        <header>
            <div class='container  p-3 m-8 border-2 border-bottom border-success '>
                <div class='row'>
                    <div class='col-9'>
                        <h3>Product Add </h3>
                    </div>
                    <div class='col'>
                        <input type="hidden" value="">
                        <input type="submit" name='Save' id='delete-product-btn' class="btn btn-card border-2 btn-danger" value="SAVE">

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
                <div class="col-1"><input type="text" class="form-control m-1" id="sku" name="SKU" aria-label="SKU"></div>
            </div>
            <div class="row">
                <div class="col-1 m-1">Name</div>
                <div class="col-1"><input type="text" class="form-control m-1" id="name" name="name" aria-label="Name"></div>
            </div>
            <div class="row">
                <div class="col-1 m-1">Price</div>
                <div class="col-1"><input type="text" class="form-control m-1" id="price" name="price" aria-label="Price"></div>

            </div>

            <select class="custom-select custom-select-lg mb-3 ml-4 pl-6" id="productType" name="Type">
                <option selected>Swith Type</option>
                <option id="Disc" name='Disc' value="Disc">Disc</option>

                <option id="Furniture" name='Furniture' value="Furniture">Furniture</option>
                <option id="Book" name='Book' value="Book">Book</option>
            </select>
        </div>
        <div class="container">



            <div class="container border border-success" id="Size" style="width:250px; margin-left:5px; display:none">
                <input type="hidden" class="form-control" name="disc" value="Disc">
                <div class="row">
                    <div class="col-5 m-2">Sise(MB):</div>
                    <div class="col-5  m-2"><input type="text" class="form-control" placeholder="#size" name="size" aria-label="Size"></div>
                </div>
                <div class="row">
                    <h5>Please put Size in MB</h5>
                </div>
            </div>

            <div class="container border border-success" id="Weight" style="width:250px; margin-left:5px;  display:none">
                <input type="hidden" class="form-control" name="book" value="Book">
                <div class="row">
                    <div class="col-5 m-2">Weight(KG):</div>
                    <div class="col-5 m-2"><input type="text" class="form-control" placeholder="#weight" name="weight" aria-label="Weight"></div>
                </div>
                <div class="row">
                    <h5>Please put Weight in KG</h5>
                </div>
            </div>

            <div class="container border border-success" id="Dimentions" style="width:350px; margin-left:5px; display:none">
                <input type="hidden" class="form-control" name="furniture" value="Furniture">
                <div class="row">
                    <div class="col-5 m-2">Height(CM):</div>
                    <div class="col-5"><input type="text" class="form-control m-1" placeholder="#height" name="height" aria-label="Height"></div>
                </div>
                <div class="row">
                    <div class="col-5 m-2">Width(CM):</div>
                    <div class="col-5"><input type="text" class="form-control m-1" placeholder="#width" name="width" aria-label="Width"></div>
                </div>
                <div class="row">
                    <div class="col-5 m-2">Lenght(CM):</div>
                    <div class="col-5"><input type="text" class="form-control m-1" placeholder="#length" name="length" aria-label="Lenght"></div>
                </div>
                <div class="row">
                    <h5>Please provide dimension in H*W*L format</h5>
                </div>
            </div>



            
        </div>


    </form>


    <script>
        let choose = document.getElementById('productType');
        let disc = document.getElementById('Size');
        let book = document.getElementById('Weight');
        let furniture = document.getElementById('Dimentions');


        choose.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'Disc') {
                disc.style.display = 'block';
            } else {
                disc.style.display = 'none';
            }

            if (event.target.value === 'Book') {
                book.style.display = 'block';
            } else {
                book.style.display = 'none';
            }

            if (event.target.value === 'Furniture') {
                furniture.style.display = 'block';
            } else {
                furniture.style.display = 'none';
            }

        });
    </script>

</body>

<footer>
    <div class='container border-top border-success   position-absolute bottom-0 start-50 end-50 translate-middle'>

        <p class='text-center'>ScandiWeb Task Assighnent</p>

    </div>
</footer>

</html>