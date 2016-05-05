<?php
include('usheader.php');








require_once('define.php'); 
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
$sqli="SELECT * FROM  event";
$result = mysqli_query( $conn,$sqli);
// start a table tag in the HTML
?>
<div id="templatemo_content_center"  class="col-lg-12" >
<?php

while($row = mysqli_fetch_assoc($result)) {
?>
	
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="container">

<table  class="table"  align="left"  >
            	
 <?php
echo "<tr><td>".$row['name']."</td>"; ?>
<td><img src="<?php echo $row['picture'];
?>" alt='image'>
                   <p> <?php echo "<td>".$row['description']."</td>";?></p>
                        <p><?php echo "<td>".$row['date']."</td></tr>";?></p>
                 
</div>

<?php


}
?>
</table>
</div>


<?php
include('footer.php');
?>

