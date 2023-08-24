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
                            <a class="nav-link" href="cart.php">cart <sup><?php cart_items()?></sup></a>
                        </li>
                    </ul>
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
        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product_image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan="2">Operation</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        global $con;
                        $get_ip_address = getIPAddress();
                        $total_price = 0;
                        $sql_ip = "select * from cart_details where ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $sql_ip);
                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $sql_price = "select * from products where id='$product_id'";
                            $result = mysqli_query($con, $sql_price);
                            while ($row_product_price = mysqli_fetch_array($result)) {
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price += $product_values;
                                
                        ?>
                                <tr>
                                    <td><?php $product_title ?></td>
                                    <td> <img src="<?php $product_image1 ?>" alt=""></td>
                                    <td><input type="text"></td>
                                    <td><?php $price_table ?></td>
                                    <td><input type="checkbox"></td>
                                    <td> <button class="btn mx-3 btn-info">update</button><button class="btn mx-3 btn-info">Remove</button></td>
                                </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
                <div class="d-flex my-3">
                    <h4><strong>SubTotal:2355</strong></h4>
                    <a href="index.php"><button class="btn mx-5 btn-info">continue shopping</button></a>
                    <a href="#"><button class="btn  btn-secondary">CheckOut</button></a>
                </div>

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