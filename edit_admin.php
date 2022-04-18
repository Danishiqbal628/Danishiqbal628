<?php
	include "includes/conn.php";
	$msg="";
	// session_start();
	// $id=$_SESSION["admin_id"];
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if(isset($_POST['submit'])){	
		$userName=mysqli_real_escape_string($con,$_POST['username']);
		$Name=mysqli_real_escape_string($con,$_POST['Name']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
	$query=mysqli_query($con,"update admin set userName='$userName',name='$Name',email='$email' where id=$id")
	or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>0){
		$msg="<div class='alert alert-success'>Admin`s data edited Successfuly</div>";
	}	
	else{
		$msg="<div class='alert alert-danger'>Admin`s data is not edited!</div>";
	}		
  }
$query=mysqli_query($con,"select * from admin where id=$id");
	include "includes/header.php";
	include "includes/sidebar.php";
$edit=mysqli_fetch_array($query);
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
							<div class="input-field col s6 form-group">
								<input id="User_name" type="text" name="username" value="<?php echo $edit['userName']?>" class="validate" required>
								<label for="User_name">User Name</label>
								<div class="help-block with-errors"></div>
							</div>
							<div class="input-field col s6 form-group">
								<input id="Name" type="text" name="Name" value="<?php echo $edit['name']?>" class="validate" required>
								<label for="Name">Name</label>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 form-group">
								<input id="Email3" type="email" name="email" value="<?php echo $edit['email'] ?>" class="validate" required>
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
	   
