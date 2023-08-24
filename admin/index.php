<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <style>
        .admin{
    width: 100px;
    object-fit: contain;
}
.footer{
    position:absolute;
    bottom: 0;
}
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="logo" src="../my logo.jpg" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </nav>
        <div class="bg-light">
                    <p class="text-center">Home of Quality Furniture</p>
                </div>
                <div class="row">
                    <div class="col-md-12 bg-secondary p-1 d-flex">
                        
                        <div class="p-3">
                        <a href="#"><img src="../my logo.jpg" alt="" class="admin"></a>
                            <p class="text-center text-light">Admin Name</p>
                        </div>
                        <div class="button text-center">
                            <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">insert product</a></button>
                            <button><a href="#" class="nav-link text-light bg-info my-1">view products</a></button>
                            <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">insert brand</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">view brands</a></button>
                            <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">insert categories</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">view categories</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">List of Users</a></button>
                            <button><a href="" class="nav-link text-light bg-info my-1">logout</a></button>
                        </div>
                    </div>
                </div>
    </div>
<div class="container my-5">
<?php
if(isset($_GET["insert_categories"])){
    include('insert_categories.php');
}
if(isset($_GET['insert_brand'])){
    include('insert_brand.php');
}
?>
</div>
    <?php
    include_once("../footer.php");
    ?>
    </div>
     <!-- javascript files -->
     <script src="../js/bootstrap/bundle.js"></script>
    <script src="../fontawesome/js/all.js"></script>
</body>

</html>