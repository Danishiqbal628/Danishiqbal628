<?php
	include "includes/conn.php";
	$msg="";
	if(isset($_POST['submit'])){
		$userName=mysqli_real_escape_string($con,$_POST['username']);
		$Name=mysqli_real_escape_string($con,$_POST['Name']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
	$query=mysqli_query($con,"insert into admin (userName,name,email) values('$userName','$Name','$email')")
	or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>0){
		$msg="<div class='alert alert-success'>Admin has updated Successfuly</div>";
	}	
	else{
		$msg="<div class='alert alert-danger'>Admin`s data not changed</div>";
	}		
  }
  	include "includes/header.php";
  	include "includes/sidebar.php";
?>
		<div class="col-md-12 sp-top-30">
			<div class="box-inn-sp">
				<div class="inn-title">
					<h4>The Right Way To Start A Short Break Holiday</h4>
				</div>
				<div class="tab-inn">
					<?php	
						echo $msg;
					?>
					<form action="" method="POST" data-toggle="validator" enctype="multipart/form-data">
						<div class="row">
							<div class="input-field col s6">
							<div class="form-group">
								<input id="User_name" type="text" name="username" class="validate" required>
								<label for="User_name">User Name</label>
								<div class="help-block with-errors"></div>
							</div>
							</div>	
							<div class="input-field col s6">
							<div class="form-group">
								<input id="Name" type="text" name="Name" class="validate" required>
								<label for="Name">Name</label>
								<div class="help-block with-errors"></div>
							</div>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 form-group">
								<input id="Email3" type="email" name="email" class="validate" required>
								<label for="Email3">Email</label>
								<div class="help-block with-errors"></div>
						</div>
							</div>
						
						<div class="input-field col s12">
								<input id="submit6" type="submit" name="submit" class="btn btn-submit">
						</div>
				</div>
					</form>
			</div>
		</div>
<?php
	include "includes/footer.php";
?>
