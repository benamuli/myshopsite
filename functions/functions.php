<?php
include('./includes/connection.php');
//displaying products
function getproducts()
{
    global $con;
    //checking if condition isset or not
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brand'])) {
            $sql = "select * from products order by rand() LIMIT 0,9";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $cat_id = $row['cat_id'];
                $brand_id = $row['brand_id'];
                echo "  <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='admin/product_img/$product_image1' class='card-img-top' alt='...' style='height:200px ;'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text' id='x'>$product_description</p>
                <p class='card-text'>Ksh $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
            </div>
        </div>
    </div> ";
            }
        }
    }
}
// getting all products
function get_all_products()
{
    global $con;
    //checking if condition isset or not
    if (!isset($_GET['categories'])) {
        if (!isset($_GET['brand'])) {
            $sql = "select * from products order by rand() ";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $cat_id = $row['cat_id'];
                $brand_id = $row['brand_id'];
                echo "  <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='admin/product_img/$product_image1' class='card-img-top' alt='...' style='height:200px ;'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text' id='x'>$product_description</p>
                <p class='card-text'>Ksh $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
            </div>
        </div>
    </div> ";
            }
        }
    }
}
// getting unique categories
function get_unique_categories()
{
    global $con;
    if (isset($_GET['categories'])) {
        $category_id = $_GET['categories'];
        $sql = "SELECT * from products where cat_id = $category_id";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 0) {
            echo "<h2 class='text-center text-danger'>out of stock</h2>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $cat_id = $row['cat_id'];
            $brand_id = $row['brand_id'];
            echo "  <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='admin/product_img/$product_image1' class='card-img-top' alt='...' style='height:200px ;'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text' id='x'>$product_description</p>
                <p class='card-text'>Ksh $product_price</p>
                <a href='index.php?add_to_cart =$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
            </div>
        </div>
    </div> ";
        }
    }
}
// getting unique brand
function get_unique_brand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $sql = "SELECT * from products where brand_id = $brand_id";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 0) {
            echo "<h2 class='text-center text-danger'>out of stock</h2>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $cat_id = $row['cat_id'];
            $brand_id = $row['brand_id'];
            echo "  <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='admin/product_img/$product_image1' class='card-img-top' alt='...' style='height:200px ;'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text' id='x'>$product_description</p>
                <p class='card-text'>Ksh $product_price</p>
                <a href='index.php?add_to_cart =$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
            </div>
        </div>
    </div> ";
        }
    }
}
// displaying brands in sidebar
function getbrands()
{
    global $con;
    $sql = "select * from brands order by rand()";
    $result = mysqli_query($con, $sql);
    while ($row_data = mysqli_fetch_assoc($result)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['id'];
        echo " <li class='nav-item'>
                    <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title</a>
                </li>";
    }
}
// getting categories in sidebar
function getcategories()
{
    global $con;
    $sql = "select * from categories order by rand()";
    $result = mysqli_query($con, $sql);
    while ($row_data = mysqli_fetch_assoc($result)) {
        $cat_title = $row_data['cat_title'];
        $cat_id = $row_data['id'];
        echo " <li class='nav-item'>
        <a href='index.php?categories=$cat_id' class='nav-link text-light'> $cat_title</a>
    </li>";
    }
}
//search products
function search_products()
{
    global $con;
    if (isset($_GET['search_data'])) {
        $data_value = $_GET['Search_product'];
        $sql = "SELECT * from products where product_keyword like '%$data_value%' ";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 0) {
            echo "<h2 class='text-center text-danger'>No such product available</h2>";
        }
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $cat_id = $row['cat_id'];
            $brand_id = $row['brand_id'];
            echo "  <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='admin/product_img/$product_image1' class='card-img-top' alt='...' style='height:200px ;'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text' id='x'>$product_description</p>
                <p class='card-text'>Ksh $product_price</p>
                <a href='index.php?add_to_cart =$product_id' class='btn btn-primary'>Add to cart</a>
                <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
            </div>
        </div>
    </div> ";
        }
    }
}
// view more product details
function view_product_details()
{
    global $con;
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        //checking if condition isset or not
        if (!isset($_GET['categories'])) {
            if (!isset($_GET['brand'])) {
                $sql = "select * from products where id=$product_id";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $product_price = $row['product_price'];
                    $cat_id = $row['cat_id'];
                    $brand_id = $row['brand_id'];
                    echo "  <div class='col-md-4 mb-2'>
                    <!-- card -->
                    <div class='card'>
                        <img src='admin/product_img/$product_image1' class='card-img-top' alt='...' style='height:200px ;'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text' id='x'>$product_description</p>
                            <p class='card-text'>Ksh $product_price</p>
                            <a href='index.php?add_to_cart =$product_id' class='btn btn-primary'>Add to cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go home</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h2 class='text-center text-info'>Related Products</h2>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <img src='admin/product_img/$product_image2' class='card-img-top' alt='...' style='height:200px ;'>
                        </div>
                        <div class='col-md-6'>
                            <img src='admin/product_img/$product_image3' class='card-img-top' alt='...' style='height:200px ;'>
                        </div>
                    </div>

                </div> ";
                }
            }
        }
    }
}
// getting ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
// adding item to cart
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        $product_id = $_GET['add_to_cart'];
        $sql = "SELECT * from cart_details where ip_address='$get_ip_address' and product_id=  $product_id ";
        $result = mysqli_query($con, $sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            echo "<script>alert('item already exists in cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $sql = "INSERT into cart_details (product_id,ip_address,quantity) values ($product_id,'$get_ip_address',0)";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('item added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
}
// getting count of cart items
// function cart_items()
// {
//     if (isset($_GET['add_to_cart'])) {
//         global $con;
//         $get_ip_address = getIPAddress();
//         $sql = "SELECT * from cart_details where ip_address='$get_ip_address'";
//         $result = mysqli_query($con, $sql);
//         $count_rows = mysqli_num_rows($result);
//     } else {
//         global $con;
//         $get_ip_address = getIPAddress();
//         $sql = "SELECT * from cart_details where ip_address='$get_ip_address'";
//         $result = mysqli_query($con, $sql);
//         $count_rows = mysqli_num_rows($result);
//     }
//     echo"$count_rows";
// }
// total cart items price
function cart_total_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total_price=0;
    $sql_ip="select * from cart_details where ip_address='$get_ip_address'";
    $result= mysqli_query($con, $sql_ip);
    while($row=mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $sql_price="select * from products where id='$product_id'";
        $result= mysqli_query($con, $sql_price);
        while($row_product_price=mysqli_fetch_array($result)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price +=$product_values;

        }
    }
echo $total_price;
}
