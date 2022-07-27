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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div id='msg' style="background-color:darksalmon"></div>
    <form action='' method='post' id=product_form>
        <header>
            <div class='col'>
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php } ?>
                <div class='container  p-3 m-8 border-2 border-bottom border-success '>
                    <div class='form-control'>
                        <div class='row'>
                            <div class='col-9'>
                                <h3>Product Add </h3>
                            </div>
                            <div class='col'>
                                <input type="submit" name='Save' id='delete-product-btn' class="btn btn-card border-2 btn-danger" value="SAVE">
                            </div>
                            <div class='col'>
                                <a class='btn btn-card border-2 btn-primary' href="/TestTask/index.php" value="">CANCEL</a>
                            </div>
                        </div>
                    </div>
                </div>
        </header>


        <div class="container">
            <div class='form-control'>
                <div class="row mt-4">
                    <div class="col-1 m-1">SKU</div>
                    <div class="col-3"><input type="text" class="form-control m-1" id="sku" name="SKU" aria-label="SKU" required pattern="[a-zA-Z0-9'-'\s]*" title="Only A-z and 0-9"></div>
                </div>

                <div class="row">
                    <div class="col-1 m-1">Name</div>
                    <div class="col-3"><input type="text" class="form-control m-1" id="name" name="name" aria-label="Name" required pattern="^[a-zA-Z0-9._]+$" title="Only A-z and 0-9"></div>
                </div>

                <div class="row">
                    <div class="col-1 m-1">Price</div>
                    <div class="col-3"><input type="text" class="form-control m-1" id="price" name="price" aria-label="Price" required pattern="^[0-9]*[.,]?[0-9]+$" title="need numbers"></div>
                </div>


                <select class="custom-select custom-select-lg mb-3 ml-4 pl-6" id="productType" name="Type">
                    <option selected name='switch' >Swith Type</option>
                    <option id="Disc" name='Disc' value="Disc">Disc</option>
                    <option id="Furniture" name='Furniture' value="Furniture">Furniture</option>
                    <option id="Book" name='Book' value="Book">Book</option>
                </select>
            </div>

            <div class='form-container mt-2'>
                <div class="container border border-success" id="Size" style="width:250px; margin-left:5px; display:none">
                    <input type="hidden" class="form-control" name="disc" value="Disc">
                    <div class="row">
                        <div class="col-5 m-2">Sise(MB):</div>
                        <div class="col-5  m-2"><input type="text" class="form-control" placeholder="#size" id='size'name="size" aria-label="Size" pattern="^[0-9]*[.,]?[0-9]+$" title="need numbers"></div>
                    </div>
                    <div class="row">
                        <h5>Please put Size in MB</h5>
                    </div>
                </div>

                <div class="container border border-success" id="Weight" style="width:250px; margin-left:5px;  display:none">
                    <input type="hidden" class="form-control" name="book" value="Book">
                    <div class="row">
                        <div class="col-5 m-2">Weight(KG):</div>
                        <div class="col-5 m-2"><input type="text" class="form-control" placeholder="#weight" id='weight' name="weight" aria-label="Weight" pattern="^[0-9]*[.,]?[0-9]+$" title="need numbers"></div>
                    </div>
                    <div class="row">
                        <h5>Please put Weight in KG</h5>
                    </div>
                </div>

                <div class="container border border-success" id="Dimentions" style="width:350px; margin-left:5px; display:none">
                    <input type="hidden" class="form-control" name="furniture" value="Furniture">
                    <div class="row">
                        <div class="col-5 m-2">Height(CM):</div>
                        <div class="col-5"><input type="text" class="form-control m-1" placeholder="#height" id='height' name="height" aria-label="Height" pattern="^[0-9]*[.,]?[0-9]+$" title="need numbers"></div>
                    </div>
                    <div class="row">
                        <div class="col-5 m-2">Width(CM):</div>
                        <div class="col-5"><input type="text" class="form-control m-1" placeholder="#width" id='width' name="width" aria-label="Width" pattern="^[0-9]*[.,]?[0-9]+$" title="need numbers"></div>
                    </div>
                    <div class="row">
                        <div class="col-5 m-2">Lenght(CM):</div>
                        <div class="col-5"><input type="text" class="form-control m-1" placeholder="#length"  id='lenght'name="length" aria-label="Lenght" pattern="^[0-9]*[.,]?[0-9]+$" title="need numbers"></div>
                    </div>
                    <div class="row">
                        <h5>Please provide dimension in H*W*L format</h5>
                    </div>
                </div>
            </div>
        </div>



    </form>


    <script>
        $(document).ready(function() {
            $("#delete-product-btn").click(function(){
                let selector = $('#productType').val();
                switch(selector){
                    case 'Swith Type': $('#msg').html('Choose product');
                    break;
                    case 'Disc':
                        if($('#size').val()=='')
                        {
                            $('#msg').html('write size');
                            
                        }
                    break;

                    case 'Book':
                        if($('#weight').val()=='')
                        {
                            $('#msg').html('write weight');
                            
                        }
                    break;

                    case 'Furniture':
                        if($('#width').val()=='')
                        {
                            $('#msg').html('write width');
                            
                        }

                        if($('#height').val()=='')
                        {
                            $('#msg').html('write height');
                            
                        }

                        if($('#lenght').val()=='')
                        {
                            $('#msg').html('write lenght');
                            
                        }
                    break;
                   
                        
                  
                }
                
                // if($('#productType').val()=='Disc'){

                // }
                
            })
            $('#msg').html('');
        })
         


        let choose = document.getElementById('productType');
        let error = document.getElementById('switch');
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

<div class="fixed-bottom  border-top border-success  w-75 mx-auto">
            <div class="navbar-inner">
                <div class="container">
                    <p class='text-center'>ScandiWeb Task Assighnent</p>
                </div>
            </div>
        </div>

</body>




</html>