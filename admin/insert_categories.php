<?php
include_once('../includes/connection.php');
if(isset($_POST["insert_cat"])){
$cat_title = $_POST['cat_title'];
$select_query = "select * from categories where cat_title= ('$cat_title')";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('Category already exists') </script>";
  }else{
$sql = "INSERT into categories (cat_title) values ('$cat_title')";
$result = mysqli_query($con,$sql);
// success message
if($result){
  echo "<script>alert('category added succesfully') </script>";
}
}
}
?>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="insert category" >
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-info border-0 p-2 my-2" name="insert_cat" value="insert category">
<!-- <button class="bg-info p-3 border-0">Insert category</button> -->
</div>
</form>