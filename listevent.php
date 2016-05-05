
<?php
include('header.php');





require_once('define.php'); 
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
$sqli="SELECT * FROM  event";
$result = mysqli_query( $conn,$sqli);

echo "<table border='5' align='center' >";// start a table tag in the HTML
echo "<tr>";
echo "<td><h2>Picture</h2></td>";
echo "<td><h2>Description</h2></td>";
echo "<td><h2>Date</h2></td>";
echo "<td><h2>Operation</h2></td>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
	//Creates a loop to loop through results
echo "<tr><td><h5><font color='green'>" . $row['picture'] . "</font></td><td><font color='green'><h5>" . $row['description'] . "</h5></font></td><td><font color='green'><h5>".$row['date']."</h5></font></td><td><font color='green'><h5> <a href='delete_event.php?id=".$row['id']."'>Delete</a><h5></td><td><font color='green'><h5> <a href='edit_event.php?id=".$row['id']."'>Edit</a><h5></td></tr>";  //$row['index'] the index here is a field name



}
echo "</table>";
include('footer.php');

?>
