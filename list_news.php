<?php
include('header.php');



require_once('define.php');  
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
$sql="select * from news";
$result = mysqli_query($conn,$sql);
echo "<div id='templatemo_content_right'>";
echo "<table class='table table-bordered table-hover'>";// start a table tag in the HTML
echo "<tr>";
echo "<td>Title</td>";
echo "<td>Description</td>";
echo "<td>operations</td>";
echo "</tr>";
while($row = mysqli_fetch_array($result)) {

echo "<tr><td>" . $row['title'] . "</td><td>".$row['description'] ."</td><td><a href='edit_news.php?id=" . $row['id'] . "'>Edit</a> &nbsp;  <a href='delete_news.php?id=".$row['id']."'>Delete</a></td></tr>";  //$row['index'] the index here is a field name



}
echo "</table></div>";


include('footer.php');
?>



