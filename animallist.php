<?php
include('header.php');








require_once('define.php'); 
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
$sqli="SELECT * FROM  africananimals";
$result = mysqli_query( $conn,$sqli);?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="container">
<table class="table">
<?php
echo "<table  border='5' align='center' >";// start a table tag in the HTML

echo "<tr>";
echo "<td><h3>Name</h3></td>";
echo "<td><h3>picture</h3></td>";

echo "<td><h3>Information</h3></td>";
echo "<td><h3>Rights</h3></td>";
echo "<td><h3>Operation</h3></td>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
	//Creates a loop to loop through results
echo "<tr><td><h5><font color='green'>" . $row['name'] . "</font></h5></td><td><font color='green'><h5>" . $row['picture'] . "</h5></font></td><td><font color='green'><h5>".$row['information']."</h5></font></td><td><font color='green'><h5>".$row['rights']."</h5></font></td><td><font color='green'><h5> <a href='editanimal.php?id=".$row['id']."'>Edit</a><h5><font color='green'><h5> <a href='delete_animal.php?id=".$row['id']."'>Delete</a><h5></td></tr>";  //$row['index'] the index here is a field name



}
echo "</table>";
include('footer.php');

?>
