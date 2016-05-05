 <?php
include('usheader.php');








require_once('define.php'); 
$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
$sqli="SELECT * FROM  news order by id desc limit 2";
$result = mysqli_query( $conn,$sqli);



while($row = mysqli_fetch_array($result)) {?>
<div id="templatemo_content_center"  class="col-lg-12"  >
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="container" >


<div class="row">
		<div class="col-md-12" align = "left">
			<div class="panel-group" id="panel-609320">
				<div class="panel panel-default" >
					<div class="panel-heading" style="background-color:rgb(190,137,48)">
						 <a  class="panel-title" data-toggle="collapse" data-parent="#panel-609320" href="#panel-element-225401"><?php echo $row['title'];?></a>
					</div>
					<div id="panel-element-225401" class="panel-collapse collapse in">
						<div class="panel-body">
							
					    <div class="col-lg-8">
						   <?php echo $row['description'];?>
						</div>
						<div class="view col-lg-4" >
								<img alt="news image" src="img/rubon10.png">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 



}

include('footer.php');

?>

