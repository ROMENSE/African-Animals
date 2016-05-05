<?php
include('header.php');
?>



<form  method="post" enctype="multipart/form-data" >
<fieldset>


<div class="container">
  <h2>Add animals</h2>
<div class="form-group">
      <label for="name">Name</label>
<br>
      <input type="text" class="form-control" id="name" name="name">
    </div>
     <div class="form-group">
      <label for="comment">Information</label>
<br>
      <textarea class="form-control" rows="5" id="inf" name="inf"></textarea>
    </div>
      <div class="form-group">
      <label for="comment">Rights</label>
<br>
      <textarea class="form-control" rows="5" id="ri" name="ri"></textarea>
    </div>
 <input type="file" name="image" value="Select image" /> 
    <input type="submit" class="btn btn-default" name="submit" value="submit">
   

</div>
</fieldset>

</form>



<?php

if($_POST['submit']){

include('define.php');

echo $infomation;
if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 1048576){
         $errors[]='File size must be excately 1MB';
      }
      $n_up = "uploads/".$file_name;
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }


	$infomation=$_POST["inf"];
	$rights = $_POST["ri"];
$name=$_POST["name"];
	echo $Fname ;
	$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
	$query = "insert into `africananimals` (`name`,`information`, `rights`,`picture`) values ('".$name."','".$infomation."' , '".$rights."','".$n_up."');";
	mysqli_query($conn,$query);
	echo mysqli_error($conn);
}
?>

<center><a href="animallist.php">View list</a></center>
<?php
include('footer.php');
?>

