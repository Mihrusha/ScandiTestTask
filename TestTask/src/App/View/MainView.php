<?php
include 'C:\xampp\htdocs\TestTask\src\App\Core\database_connection.php';
// include_once './Controlls\UserController.php';
// use App\Model\DiscModel\Disc;
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


<header>
    <div class='container  p-3 m-8 border-2 border-bottom border-success '>
        <div class='row'>
            <div class='col-9'>
                <h3>Product List </h3>
            </div>
            <div class='col'>
                <form action='' method='post'>
                    <input type='hidden' name='name' value='<?= $row['id'] ?> ' />
                    <!-- <input type='hidden' name='read' value='read' /> -->
                    <input type="submit" name='read' id='add-product-btn' class="btn btn-card border-2 btn-primary" value="ADD">

                </form>
            </div>
            <div class='col'>
                <form action='' method='post'>
                    <input type='hidden' name='id' value='<?= $row['id'] ?>' />
                    <!-- <input type='hidden' name='read' value='read' /> -->
                    <input type="submit" name='delete' id='delete-product-btn' class="btn btn-card border-2 btn-danger" value="MASS DELETE">

                </form>
            </div>

        </div>
    </div>
</header>



<body>


    <div class='row'>



        <div class='col-md-10'>
            <section class="details-card">
                <div class="container border border-success">

                    <div class="row">
                        <?php
                        foreach ($items as $row) { ?>

                            <div class="col-md-3">
                                <form action='' method='post' >
                                <input class="delete-checkbox" type="checkbox" name="check"value=""checked id="flexCheckDefault" >
                                    <div class="card-content ">
                                        <div class="card-desc">
                                            <h3> <?= $row['name'] ?></h3>
                                            <?= $row['id'] ?>
                                            <?= $row['size'] ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>



            </section>
        </div>


    </div>
    <div class='comtainer justify-content-center m-4'>


    </div>






</body>



</html>