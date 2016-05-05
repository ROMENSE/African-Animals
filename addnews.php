<?php
include('header.php');

?>





          <form class="form-horizontal" action="addnews.php" method="post">
          <fieldset>
            <legend class="text-center">Add_News</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-lg-3 control-label" for="name" >title</label>
              <div class="col-md-6">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
             
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">description</label>
              <div class="col-md-6">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary btn-lg" value="Submit" name="submit">
              </div>
            </div>
          </fieldset>
          </form>
       
	 <?php 
	if($_POST['submit']){
		include('define.php');


		$name=$_POST['name'];
				$message=$_POST['message']; 

$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
		$query = "insert into `news` (`description` ,`title`) values ('".$message."' ,'".$name."');";
		mysqli_query($conn,$query);
		echo mysqli_error($conn);
	}
	?>

<center><a href="list_news.php">View</a></center>

<?php
include('footer.php');

?>


