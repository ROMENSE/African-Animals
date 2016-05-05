<?php
include('define.php');
include('header.php');

$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
 if (isset($_GET['id']) && is_numeric($_GET['id'])){
 $id =$_GET['id'];
$sql = "select * from news where id='".$id."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<p class="dbody">&nbsp;</p>
<form method="post" action="edit_news.php" >
<table>
<tr>
<tr>
              <td>title</td>
             	<input type = "hidden" value ="<?php echo $id;?>" name = "id">
              <td><input type="text" name="title" value="<?php echo $row['title'];?>">
		
                <!--<span class="selectRequiredMsg">Please select an item.</span></span></td>-->
            </tr>

  <tr><td> Description:</td><td>  <textarea  name="description"><?php echo $row['description'];?></textarea></td></tr>
  
</tr>

             <td><input type="submit" value="send" name="submit"></td>
</table>
</form><br>
<?php
}else if($_POST['submit']){
	$title=$_POST["title"];
        $description=$_POST["description"];
	$id = $_POST["id"];
	$get_query = "select title from news;";
	$res = mysqli_query($conn,$get_query);
	while($row = mysqli_fetch_assoc($res)){
		if($row['title'] != $title){
			$flag = true;	
		}else{
			
			$flag = false;
			break;
		}
		
	}
if ( $flag == true){
		$query="UPDATE `news` SET `title` = '".$title."',`description` = '".$description."' WHERE `id` =$id;";
			mysqli_query($conn,$query);
			header("Location: list_news.php");
			}else{
				echo $row['title']." exists";
				echo "<script>alert('this type already exist');</script>";
				header("Location: list_news.php");
			}
	
}else{
					echo "<script>alert('Select proper data');</script>";
			header("Location: list_news.php");
}

?>
<?php
include('footer.php');
?>
