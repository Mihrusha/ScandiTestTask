<?php
include 'C:\xampp\htdocs\TestTask\src\App\Core\database_connection.php';
// include_once './Controlls\UserController.php';

// $item=new Disc;
// $items=$item->get_all_items($conn);

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


    <form action='' method='post'>


        <div class='container  p-3 m-8 border-2 border-bottom border-success '>
            <div class='row'>
                <div class='col-9'>
                    <h3>Product List </h3>
                </div>
                <div class='col'>
                    <a class='btn btn-card border-2 btn-primary' href="src\App\View\AddView.php" value="">ADD</a>
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
                            foreach ($items as $row) { ?>
                                <div class="col-md-3">
                                    <div class="container border border-success m-2 " style="width:250px;height:200px">
                                        <input class="delete-checkbox" name='check' type="checkbox" value="<?= $row['id'] ?>" id="flexCheckDefault">
                                        <div class="container m-2 ">
                                            <div class=" text-center" ><h5>Name : <?= $row['name'] ?></h5></div>
                                            <div class=" text-center " ><h5>SKU : <?= $row['SKU'] ?></h5></div>
                                            <div class=" text-center" ><h5>Price : <?= $row['price'] ?></h5></div>
                                            <?php if ($row['category_name'] == "Disc") { ?>
                                                <div class=" text-center" ><h5>Size: <?= $row['size'] ?></h5> </div>
                                            <?php  } ?>

                                            <?php if ($row['category_name'] == "Book") { ?>
                                                <div class=" text-center" ><h5>Weight: <?= $row['weight'] ?></h5> </div>
                                            <?php  } ?>
                                            <?php if ($row['category_name'] == "Furniture") { ?>
                                                <div class=" text-center" ><h5>Dimensions: <?= $row['dim1'] ?>*<?= $row['dim2'] ?>*<?= $row['dim3'] ?></h5> </div>
                                            <?php  } ?>
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

<footer>
    <div class='container border-top border-success   position-absolute bottom-0 start-50 end-50 translate-middle'>
    <p class='text-center'>ScandiWeb Task Assighnent</p>
    </div>
</footer>

</html>