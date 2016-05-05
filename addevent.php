<?php
include('header.php');
?>
<?php
include('leftside.php');
?>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<form class="form-horizontal" method= "post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">picture</label>  
  <div class="col-md-5">
    <input type="file" name="image" id="fileToUpload">
 <span class="help-block"></span>  
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="description">default text</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">date</label>  
  <div class="col-md-4">
  <input id="datepicker" name="date" placeholder="placeholder" class="form-control input-md" required="" type="text">

  </div>
</div>
	<div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary btn-lg" value="Submit" name="submit">
              </div>
</fieldset>


</form>
<?php
if($_POST['submit']){
include('define.php');
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


	$date = $_POST['date'];
        $description = $_POST['description'];
	$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
	$query = "insert into `event` (`picture`, `description`,`date`) values ('".$n_up."' , '".$description."','".$date."');";
	mysqli_query($conn,$query);
	echo mysqli_error($conn);
}
?>
<a href="listevent.php">listevent</a>
<?php
include('footer.php');
?>
<script>
	$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
       dateFormat: 'yy-mm-dd' 
    });
  }

);
</script>


سس
