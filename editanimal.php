<?php
include('header.php');

include('define.php');
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
if (isset($_GET['id']) && is_numeric($_GET['id'])){
	$id =$_GET['id'];
	$sql = "select * from africananimals where id='".$id."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>

<form  method="post" enctype="multipart/form-data" action="editanimal.php">
<fieldset>


<div class="container">
  <h2>Edit Animals</h2>
<div class="form-group">
      <label for="name">Name</label>
<br>
	<input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>">
    </div>
     <div class="form-group">
      <label for="comment">Information</label>
<br>
      <textarea class="form-control" rows="5" id="inf" name="inf"><?php echo $row['information'];?></textarea>
    </div>
      <div class="form-group">
      <label for="comment">Rights</label>
<br>
      <textarea class="form-control" rows="5" id="ri" name="ri"><?php echo $row['rights'];?></textarea>
    </div>
 <input type="file" name="image" />
    <input type="submit" class="btn btn-default" name="submit" value="Submit">
   

</div>
</fieldset>

</form>

<?php
}else {
	if($_POST['submit']){
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
		$id = $_POST['id'];
		$infomation=$_POST["inf"];
		$rights = $_POST["ri"];
		$name=$_POST["name"];
		$query = "UPDATE `africananimals` SET`name`='".$name."',`information`='".$infomation."',`rights`='".$rights."'
	,`picture`='".$n_up."'WHERE `id`='".$id."';";
		mysqli_query($conn,$query);
		echo mysqli_error($conn);

}
}
?>
<center><a href="animallist.php">View list</a></center>
<?php
include('footer.php');
?>




