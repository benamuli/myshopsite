<?php
include ('../includes/connection.php');
if(isset($_POST['Insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_status ='true';
   
    // accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    // storing images
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    // check if fields are empty
    if($product_title=='' || $product_description=='' ||$product_keyword==''|| $product_category==''|| $product_brand==''|| $product_image1==''|| $product_image2==''|| $product_image3==''|| $product_price==''){
        echo"<script>alert('please fill all fields')</script>";
        echo (mysqli_error($con));
        exit;
    }else{
move_uploaded_file($temp_image1,"./product_img/$product_image1");
move_uploaded_file($temp_image2,"./product_img/$product_image2");
move_uploaded_file($temp_image3,"./product_img/$product_image3");
//inserting to database
$sql="INSERT INTO products (product_title,product_description,product_keyword,cat_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
$result=mysqli_query($con,$sql);
if($result){
    echo"<script>alert('product inserted successfully')</script>";
}else{
    echo(mysqli_error($con));
    echo"<script>alert('Error occured,Product not inserted')</script>";
}
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container mt-3 ">
        <h1 class="text-center">INSERT PRODUCT</h1>
       <button class="btn btn-info"><a href="index.php">BACK</a></button>
        <form action=" " enctype="multipart/form-data" method="POST">
            <!-- title -->
            <div class="form-outline w-50 mb-4  m-auto">
                <label for="" class="form-label">Product title</label>
                <input class="form-control" type="text" name="product_title" id="product_title" placeholder="Enter product title" autocomplete="off">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">product_description</label>
                <input class="form-control" type="text" name="product_description" id="product_description" placeholder="Enter product_description" autocomplete="off">
            </div>
            <!-- product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product_keyword</label>
                <input class="form-control" type="text" name="product_keyword" id="product_keyword" placeholder="Enter product_keyword" autocomplete="off">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                <option value="">Select a category</option>
                    <?php
                    $sql="select * from categories";
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $cat_title =$row['cat_title'];
                        $cat_id = $row['id'];
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                <option value="">Select a brand</option>
                <?php
                    $sql="select * from brands";
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $brand_title =$row['brand_title'];
                        $brand_id = $row['id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <!--images -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product_image1</label>
                <input class="form-control" type="file" name="product_image1" id="product_image1"  autocomplete="off">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product_image2</label>
                <input class="form-control" type="file" name="product_image2" id="product_image2"  autocomplete="off">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product_image3</label>
                <input class="form-control" type="file" name="product_image3" id="product_image3"  autocomplete="off">
            </div>
            <!-- product price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product_price</label>
                <input class="form-control" type="text" name="product_price" id="product_price" placeholder="Enter product_price" autocomplete="off">
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input class="btn btn-info mb-2 px-3C" type="submit" name="Insert_product" value="Insert_product">
            </div>
        </form>
    </div>

</body>

</html>