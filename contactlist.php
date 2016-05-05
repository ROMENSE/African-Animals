









<?php
include('header.php');








require_once('define.php'); 
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
$sqli="SELECT * FROM  contact";
$result = mysqli_query( $conn,$sqli);

echo "<table border='5' align='center' >";// start a table tag in the HTML
echo "<tr>";
echo "<td><h2>Name</h2></td>";
echo "<td><h2>Email</h2></td>";
echo "<td><h2>Message</h2></td>";
echo "<td><h2>Operation</h2></td>";
echo "</tr>";

while($row = mysqli_fetch_array($result)) {
	//Creates a loop to loop through results
echo "<tr><td><h3><font color='green'>" . $row['name'] . "</font></h3></td><td><font color='green'><h3>" . $row['email'] . "</h3></font></td><td><font color='green'><h3>".$row['message']."</h3></font></td><td><font color='green'><h3> <a href='delete_contact.php?id=".$row['id']."'>Delete</a><h3></td></tr>";  //$row['index'] the index here is a field name



}
echo "</table>";
include('footer.php');

?>


