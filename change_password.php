<?php
	include "includes/conn.php";
	include "includes/header.php";
	$msg="";
	$id=$_SESSION["admin_id"];
	if(isset($_POST['submit'])){
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$Npassword=mysqli_real_escape_string($con,$_POST['Npassword']);
		$Cpassword=mysqli_real_escape_string($con,$_POST['Cpassword']);
		$query=mysqli_query($con,"select * from admin where id=$id")or die (mysqli_error($con));
		$edit=mysqli_fetch_array($query);
		if(password_verify($password,$edit['password'])){
		if($Npassword=$Cpassword){
			$Npassword=password_hash($Npassword,PASSWORD_DEFAULT);
			$query2=mysqli_query($con,"update admin set password='$Npassword'")or die(mysqli_error($con));
			$msg="<div class='alert alert-success'>Your Password has updated Sucessfuly</div>";
		}
		else{
			$msg="<div class='alert alert-danger'>Your Current Password and New Password doesnot match!</div>";
		}
		}
		else{
			$msg="<div class='alert alert-danger'>Your old password does not match</div>";
		}
	}
	include "includes/sidebar.php";
		
?>
<div class="blog-login">
        <div class="blog-login-in">
		<?php echo $msg;?>
            <form method="post" action="" data-toggle="validator" enctype="multipart/form-data">
                <img src="images/logo.png" alt="" />
                <div class="row">
                    <div class="input-field col s12 form-group">
                        <input id="first_name1" type="text" name="password" class="validate" required>
                        <label for="first_name1">Current Password</label>
						<div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 form-group">
                        <input id="last_name" type="text" name="Npassword" class="validate" required>
                        <label for="last_name">New Password</label>
						<div class="help-block with-errors"></div>
                    </div>
					<div class="input-field col s12 form-group">
                        <input  type="text" name="Cpassword" class="validate" required>
                        <label for="last_name">Confirm Password</label>
						<div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                       <button type="submit" name="submit"<a class="waves-effect waves-light btn-large btn-log-in">Change</a>
					   </button>
                    </div>
                </div>
                <a href="forgot.html" class="for-pass">Forgot Password?</a>
            </form>
        </div>
    </div>
	
<?php
	include "includes/footer.php";
?>