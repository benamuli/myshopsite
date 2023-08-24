<?php
include_once('../includes/connection.php');
if(isset($_POST["insert_brand"])){
  $brand_title = $_POST['brand'];
  $select_query = "select * from brands where brand_title= ('$brand_title')";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('Brand already exists') </script>";
  } else{
  $sql = "INSERT into brands (brand_title) values ('$brand_title')";
  $result = mysqli_query($con,$sql);
  // success message
  if($result){
    echo "<script>alert('Brand added succesfully') </script>";
  }
}
}
?>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand" placeholder="insert brand" >
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-info p-2 my-3" name="insert_brand" value="insert brand" >
<!-- <button class="bg-info p-3 border-0">Insert brand</button> -->
</div>
</form>