<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>



<body>
   

    <form action='' method='post'>


        <div class='container  p-3 m-8 border-2 border-bottom border-success '>
            <div class='row'>
                <div class='col-9'>
                    <h3>Product List </h3>
                </div>
                <div class='col'>
                    <input type="submit" class='btn btn-card border-2 btn-primary' name='Add' value="ADD">
                    <!-- <a class='btn btn-card border-2 btn-primary' href="App\View\AddView.php" value="">ADD</a> -->
                </div>
                <div class='col'>
                    <input type="submit" name='delete' id='delete-product-btn' class="btn btn-card border-2 btn-danger" value="MASS DELETE">
                </div>
            </div>
        </div>
        <div class='row'>



            <div class='col'>
                <div class="box">
                    <div class="container">
                        <div class="row">
                            <?php
                            foreach ($books as $row) { ?>
                                <div class="col-md-3">
                                    <div class="container border border-success m-2 " style="width:250px;height:200px">
                                        <input class="delete-checkbox" name='bookbox[]' type="checkbox" value="<?= $row['book_id'] ?>" id="flexCheckDefault">
                                        <div class="container  ">
                                            <input type="hidden" name="book" value="1">
                                            <div class=" text-center">
                                                <h5>Name : <?= $row['book_name'] ?></h5>
                                            </div>
                                            <div class=" text-center ">
                                                <h5>SKU : <?= $row['book_SKU'] ?></h5>
                                            </div>
                                            <div class=" text-center">
                                                <h5>Price : <?= $row['book_price'] ?></h5>
                                            </div>

                                            <div class=" text-center">
                                                <h5>Weight: <?= $row['weight'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <?php
                            foreach ($discs as $col) { ?>
                                <div class="col-md-3">
                                    <div class="container border border-success m-2 " style="width:250px;height:200px">
                                        <input type="hidden" name="disc" value="2">
                                        <input class="delete-checkbox" name='checkbox[]' type="checkbox" value="<?= $col['disc_id'] ?>">
                                        <div class="container ">
                                            <div class=" text-center">
                                                <h5>Name : <?= $col['disc_name'] ?></h5>
                                            </div>
                                            <div class=" text-center ">
                                                <h5>SKU : <?= $col['disc_SKU'] ?></h5>
                                            </div>
                                            <div class=" text-center">
                                                <h5>Price : <?= $col['disc_price'] ?></h5>
                                            </div>

                                            <div class=" text-center">
                                                <h5>Size: <?= $col['size'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>

                        <div class="row overflow-auto">
                            <?php
                            foreach ($furns as $sub) { ?>
                                <div class="col-md-3 overflow-auto">
                                    <div class="container border border-success m-2 overflow-auto" style="width:250px;height:200px">
                                        <input type="hidden" name="furniture" value="2">
                                        <input class="delete-checkbox" name='checkbox[]' type="checkbox" value="<?= $sub['furniture_id'] ?>">
                                        <div class="container-fluid overflow-hidden" id="content">
                                            <div class="content row">
                                                <div class=" text-center">
                                                    <h5>Name : <?= $sub['furniture_name'] ?></h5>
                                                </div>
                                                <div class=" text-center ">
                                                    <h5>SKU : <?= $sub['furniture_SKU'] ?></h5>
                                                </div>
                                                <div class=" text-center">
                                                    <h5>Price : <?= $sub['furniture_price'] ?></h5>
                                                </div>

                                                <div class=" text-center">
                                                    <h5>Width: <?= $sub['width'] ?></h5>
                                                </div>

                                                <div class=" text-center">
                                                    <h5>Height: <?= $sub['height'] ?></h5>
                                                </div>

                                                <div class=" text-center">
                                                    <h5>Length: <?= $sub['length'] ?></h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>

</body>

<div class="navbar-fixed-bottom row-fluid border-top border-success">
    <div class="navbar-inner">
        <div class="container">
            <p class='text-center'>ScandiWeb Task Assighnent</p>
        </div>
    </div>
</div>


</html>