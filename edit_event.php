<?php
include('header.php');
include('define.php');
 $conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
 if (isset($_GET['id']) && is_numeric($_GET['id'])){
 $id =$_GET['id'];
$sql = "select * from event where id='".$id."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<p class="dbody">&nbsp;</p>
<form method="post" action="edit_event.php" >
<table>
<tr>
<tr>
              <td>picture</td>
             	<input type = "hidden" value ="<?php echo $id;?>" name = "id">
              <td><input type="varchar(255)" name="picture" value="<?php echo $row['picture'];?>">
		
                <!--<span class="selectRequiredMsg">Please select an item.</span></span></td>-->
            </tr>

  <tr><td> Description:</td><td>  <textarea  name="description"><?php echo $row['description'];?></textarea></td></tr>
    <tr><td> Date:</td><td>  <textarea  name="date"><?php echo $row['date'];?></textarea></td></tr>
</tr>

             <td><input type="submit" value="send" name="submit"></td>
</table>
</form><br>
<?php
}else if($_POST['submit']){
	$picture=$_POST["picture"];
        $description=$_POST["description"];
	$date=$_POST["date"];
	$id = $_POST["id"];
	$get_query = "select picture from event;";
	$res = mysqli_query($conn,$get_query);
	while($row = mysqli_fetch_assoc($res)){
		if($row['picture'] != $picture){
			$flag = true;	
		}else{
			
			$flag = false;
			break;
		}
		
	}
if ( $flag == true){
		$query="UPDATE `event` SET `picture` = '".$picture."',`Description` = '".$description."',`Date` = '".$date."' WHERE `id` =$id;";
			mysqli_query($conn,$query);
			header("Location: listevent.php");
			}else{
				echo $row['picture']." exists";
				echo "<script>alert('this type already exist');</script>";
				header("Location: listevent.php");
			}
	
}else{
					echo "<script>alert('Select proper data');</script>";
			header("Location: listevent.php");
}

?>
<?php
include('footer.php');
?>


