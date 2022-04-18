<?php
// die("USMA");
	include "includes/conn.php";
	$msg="";
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if(isset($_POST['submit'])){
		$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
		$lastname=mysqli_real_escape_string($con,$_POST['lastname']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$cnic=mysqli_real_escape_string($con,$_POST['cnic']);
		$gender=mysqli_real_escape_string($con,$_POST['gender']);
		$age=mysqli_real_escape_string($con,$_POST['age']);
		$city=mysqli_real_escape_string($con,$_POST['city']);
		$adress=mysqli_real_escape_string($con,$_POST['adress']);
	$query=mysqli_query($con,"update tourists set firstname='$firstname',lastname='$lastname',email='$email',cnic='$cnic',gender='$gender',age='$age',city='$city',adress='$adress' where id=$id")or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Tourists data is edited</div>";
		}
		else{
			$msg="<div class='alert alert-success'>Tourists data is not edited</div>";
		}
	}
	$query=mysqli_query($con,"select * from tourists where id=$id") or die(mysqli_error($con));
	$edit=mysqli_fetch_array($query);
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
                            <input id="first_name" type="text" value="<?php echo $edit['firstname']; ?>" name="firstname" class="validate" required>
                            <label for="first_name">First Name</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="input-field col s6">
							<div class="form-group">
                            <input id="last_name2" type="text" value="<?php echo $edit['lastname']; ?>" name="lastname" class="validate" required>
                            <label for="last_name2">Last Name</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
						<div class="form-group">
                            <input id="phone3" type="email" value="<?php echo $edit['email']; ?>" name="email" class="validate" required>
                            <label for="phone3">Email</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="input-field col s6">
						<div class="form-group">
                            <input id="cphone4" type="number" value="<?php echo $edit['cnic']; ?>" name="cnic" class="validate" required>
                            <label for="cphone4">CNIC</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="input-field col s6">
							<div class="form-group">
							<p>
                               <input name="gender" type="radio" id="test1" value="Male" <?php echo $edit['gender']=="Male"?"checked":""; ?> required>
                               <label for="test1">Male</label>
							   <div class="help-block with-errors"></div>
							</p>
							</div>
							<div class="form-group">
							<p>
                               <input name="gender" type="radio" id="test2" value="Female" <?php echo $edit['gender']=="Female"? "checked":""; ?> required>
                               <label for="test2">Female</label>
							   <div class="help-block with-errors"></div>
							</p>
                        </div>
                        </div>
                        <div class="input-field col s6">
						<div class="form-group">
                            <input id="password1" type="number" value="<?php echo $edit['age']; ?>" name="age" class="validate" required>
                            <label for="password1">Age</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
								<div class="form-group">
                                    <select name="city" required>
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="Islamabad" <?php echo $edit['city']=="Islamabad"?"selected":""; ?>>Islamabad</option>
                                        <option value="Lahore" <?php echo $edit['city']=="Lahore"?"selected":""; ?>>Lahore</option>
                                        <option value="Peshawar" <?php echo $edit['city']=="Peshawar"?"selected":""; ?>>Peshawar</option>
                                        <option value="Quetta" <?php echo $edit['city']=="Quetta"?"selected":""; ?>>Quetta</option>
                                        <option value="Karachi" <?php echo $edit['city']=="Karachi"?"selected":""; ?>>Karachi</option>
                                    </select >
                                    <label>Choose City</label>
									<div class="help-block with-errors"></div>
                                </div>
                            
									
                        </div>
                    </div>
					<div class="row">
                        <div class="input-field col s12">
						<div class="form-group">
                            <input id="email6" type="text" name="adress" value="<?php echo $edit['adress']; ?>" class="validate" required>
                            <label for="email6">Adress</label>
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
    </div>
<?php
	include "includes/footer.php";
?>	