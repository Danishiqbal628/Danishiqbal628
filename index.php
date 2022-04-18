<?php
	include "includes/conn.php";
	 // $msg="";
	// if(isset($_POST['submit'])){
		// $firstname=mysqli_real_escape_string($con,$_POST['firstname']);
		// $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
		// $email=mysqli_real_escape_string($con,$_POST['email']);
		// $cnic=mysqli_real_escape_string($con,$_POST['cnic']);
		// $gender=mysqli_real_escape_string($con,$_POST['gender']);
		// $age=mysqli_real_escape_string($con,$_POST['age']);
		// $city=mysqli_real_escape_string($con,$_POST['city']);
		// $adress=mysqli_real_escape_string($con,$_POST['adress']);
	// $query=mysqli_query($con,"insert into tourist(firstname,lastname,email,cnic,gender,age,city,adress) values('$firstname','$lastname','$email','$cnic',
	// '$gender',$age',$city',$adress')") or die(mysqli_error($con));
	// if(mysqli_affected_rows($con)>0){
			// $msg="<div class='alert alert-success'>Data is successfully enter</div>";
		// }
		// else{
			// $msg="<div class='alert alert-success'>Data is not successfully enter</div>";
		// }
	include "includes/header.php";
	include "includes/sidebar.php";
	
?>	
   <!--<div class="col-md-6 sp-top-30">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Normal Form Fields (Half)</h4>
                <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
            </div>
            <div class="tab-inn">
                <form>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name2" type="text" class="validate">
                            <label for="last_name2">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="phone3" type="number" class="validate">
                            <label for="phone3">Mobile</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="cphone4" type="number" class="validate">
                            <label for="cphone4">Mobile</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="password4" type="password" class="validate">
                            <label for="password4">Password</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="password1" type="password" class="validate">
                            <label for="password1">Confirm Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email5" type="email" class="validate">
                            <label for="email5">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="email6" type="email" class="validate">
                            <label for="email6">Alternate Email</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>-->
<?php
	include "includes/footer.php";
?>	