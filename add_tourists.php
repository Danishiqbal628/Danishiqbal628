<?php
	include "includes/conn.php";
	$msg="";
	if(isset($_POST['submit'])){
		$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
		$lastname=mysqli_real_escape_string($con,$_POST['lastname']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$cnic=mysqli_real_escape_string($con,$_POST['cnic']);
		$gender=mysqli_real_escape_string($con,$_POST['gender']);
		$age=mysqli_real_escape_string($con,$_POST['age']);
		$city=mysqli_real_escape_string($con,$_POST['city']);
		$adress=mysqli_real_escape_string($con,$_POST['adress']);
	$query=mysqli_query($con,"insert into tourists(firstname,lastname,email,cnic,gender,age,city,adress) values('$firstname','$lastname','$email','$cnic','$gender','$age','$city','$adress')")or die(mysqli_error($con));
	if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Tourists data is added</div>";
		}
		else{
			$msg="<div class='alert alert-alert'>Tourists data is added</div>";
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
                            <input id="first_name" type="text" name="firstname" class="validate" required>
                            <label for="first_name">First Name</label>
							<div class="help-block with-errors"></div>
                        </div>
						</div>
                        <div class="input-field col s6">
							<div class="form-group">
                            <input id="last_name2" type="text" name="lastname" class="validate" required>
                            <label for="last_name2">Last Name</label>
							<div class="help-block with-errors"></div>
                        </div>
						</div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
							<div class="form-group">
                            <input id="phone3" type="email" name="email" class="validate" required>
                            <label for="phone3">Email</label>
							<div class="help-block with-errors"></div>
                        </div>
						</div>
                        <div class="input-field col s6">
							<div class="form-group">
                            <input id="cphone4" type="number" name="cnic" class="validate" required>
                            <label for="cphone4">CNIC</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="input-field col s6">
							<div class="form-group">
							<p>
                               <input name="gender" type="radio"  id="test1" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male" class="validate" required>
                               <label for="test1">Male</label>
							   <div class="help-block with-errors"></div>
							</p>
							</div>
							<div class="form-group">
							<p>
                               <input name="gender" type="radio"  id="test2" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female" class="validate" required>
                               <label for="test2">Female</label>
							   <div class="help-block with-errors"></div>
							</p>
							</div>
                        </div>
                        <div class="input-field col s6">
							<div class="form-group">
                            <input id="password1" type="number" name="age" class="validate" required>
							<div class="help-block with-errors"></div>
                            <label for="password1">Age</label>
                        </div>
						</div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 form-group">
                           <div class="tab-inn select-pos">
                                <div class="input-field col s12">
                                    <select name="city" class="material" required>
                                        <option  disabled selected>Choose Your City</option>
                                        <option>Islamabad</option>
                                        <option>Lahore</option>
                                        <option>Peshawar</option>
                                        <option>Quetta</option>
                                        <option>Karachi</option>
                                    </select>
									 <label>Select City</label>
							<div class="help-block with-errors"></div>
                                </div>
							</div>			
                        </div>
                    </div>
					<div class="row">
                            <label for="email6">Adress</label>
                        <div class="input-field col s12">
							<div class="form-group">
                            <textarea name="adress" placeholder="Enter your current adress" required>  </textarea>
							<div class="help-block with-errors"></div>
                        </div>
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