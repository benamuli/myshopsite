<?php
include('includes/connection.php');
include('functions/functions.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="my logo.jpg" alt="" class="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contacts</a>
                        </li>
                        <li class="nav-item">
                            <!-- <a class="nav-link" href="cart.php">cart <sup><?php cart_items ()?></sup></a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">total price: <?php cart_total_price ()?> /-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="Search_product">
                        <input class="btn btn-outline-success" type="submit" value="Search" name="search_data">
                    </form>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>

        </nav>
        <div class="bg-light">
            <p class="text-center">Home of Quality Furniture</p>
        </div>
        <?php
        cart();
        ?>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <?php

                    getproducts();
                    get_unique_categories();
                    get_unique_brand();
                    //                     $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip; 
                    ?>
                    <!-- cards -->

                </div>
            </div>
            <!-- sidebar -->
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>delivery brands</h4>
                        </a>
                    </li>
                    <?php
                    getbrands();
                    ?>
                </ul>
                <!-- categories -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    getcategories();
                    ?>
                </ul>

            </div>
        </div>

        <?php
        include_once("footer.php")
        ?>
        <!-- javascript files -->
        <script src="js/bootstrap.min.js"></script>
        <script src="fontawesome/js/all.js"></script>
    </div>

</body>

</html>