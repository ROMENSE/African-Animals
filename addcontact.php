<?php
include('usheader.php');

?>



<div id="templatemo_content_right">
        
        	<div class="right_column_section">
            	

	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form" method="post"  style= "background-image: url(img/foot.png)">
          <fieldset >
            <legend class="text-center">Contact us</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name" >Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
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
        </div>
      </div>
	</div>
</div>
	</div>
	 <?php 
	if($_POST['submit']){
		include('define.php');


		$name=$_POST['name'];
		$email = $_POST['email'];
		$message=$_POST['message'];

		$conn = mysqli_connect(hostname,DBuser,DBpassword,DBname);
		$query = "insert into `contact` (`name` ,`email`,`message`) values ('".$name."' , '".$email."','".$message."');";
		mysqli_query($conn,$query);
		echo mysqli_error($conn);
	}
	?>



<?php
include('footer.php');

?>


