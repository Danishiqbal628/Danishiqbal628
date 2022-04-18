<?php
	session_start();
	include"includes/conn.php";
	if(isset($_SESSION["admin_id"])||isset($_COOKIE["admin_id"])){
		header("location:home.php");
	}
	$msg="";
	if(isset($_POST['submit'])){
		$userName=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
	$query=mysqli_query($con,"select * from admin where (userName='$userName' or email='$userName' and password='$password')")
	or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);
		if(mysqli_affected_rows($con)>0){
			if(password_verify($password,$row['password'])){
			$_SESSION['admin_id']=$row['id'];
			header ("location:home.php");
			if(isset($_POST['remmber'])){
			setcookie("admin_id",$row['id'],time()+(86400*30));
			}
			
			
		}
			else{
				$msg="<div class='alert alert-danger'>You have enter incrrocet password data</div>";

			}
		}
		else{
			$msg="<div class='alert alert-danger'>You have enter incrrocet user name data</div>";
		}	
	}
		include"includes/inner.php";
?>  
  <div class="coustom-log">
        <div class="coustom-login">
		<?php
			echo $msg;
		?>
            <form method="post" action="" enctype="multipart/form-data">
                <img src="images/logo.png" alt="" />
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name1" type="text" name="username" class="validate">
                        <label for="first_name1">User Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="last_name" type="password" name="password" class="validate">
                        <label for="last_name">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input type="submit"  class="btn-large wave-effect  form-control" value="LogIn" name="submit">
                    </div>
                </div>
                <a href="forgot.html" class="for-pass">Forgot Password?</a>
            </form>
        </div>
    </div>
<?php
	include"includes/footer.php";
?>