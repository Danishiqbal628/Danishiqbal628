<?php
	include "includes/conn.php";
	include "includes/header.php";
	$msg="";
	$id=$_SESSION["admin_id"];
	if(isset($_POST['submit'])){
		if($_FILES['image']['name']!==""){
		$dir="images/uploads";
		$file_name=$dir."/".uniqid().basename($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],$file_name);
		$query1=mysqli_query($con,"update admin set image='$file_name' where id=$id")or die(mysqli_error($con));
		}
		if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Your profile has updated Successfuly</div>";
		}	
		else{
			$msg="<div class='alert alert-danger'>You profile does not updated!</div>";
		}	
		$userName=mysqli_real_escape_string($con,$_POST['username']);
		$Name=mysqli_real_escape_string($con,$_POST['Name']);
		$sName=mysqli_real_escape_string($con,$_POST['sName']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$query=mysqli_query($con,"update admin set userName='$userName',name='$Name',sname='$sName',email='$email' where id=$id ")or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Your profile has updated Successfuly</div>";
		}	
		else{
			$msg="<div class='alert alert-danger'>You profile does not updated!</div>";
		}		
  }
$query=mysqli_query($con,"select * from admin where id=$id");
$edit=mysqli_fetch_array($query);
include "includes/sidebar.php";
?>
<div class="col-md-12 sp-top-30">
		<div class="box-inn-sp">
			<div class="inn-title">
				<h4>The Right Way To Start A Short Break Holiday</h4>
			</div>
		<div class="tab-inn">
		<br>
			<?php	
			echo $msg;
			?>
			<form action="" method="post" data-toggle="validator" enctype="multipart/form-data">
				<div class="row">
					<div class="input-field col s6 form-group">
						<input id="User_name" type="text" name="username" value="<?php echo $edit['userName'];?>" class="validate" required>
						<label for="User_name">User Name</label>
						<div class="help-block with-errors"></div>
					</div>
					<div class="input-field col s6 form-group">
						<input id="User_name" type="text" name="Name" value="<?php echo $edit['name'];?>" class="validate" required>
						<label for="User_name">Name</label>
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 form-group">
						<input id="User_name" type="text" name="sName" value="<?php echo $edit['sname'];?>" class="validate" required>
						<label for="User_name">Last Name</label>
						<div class="help-block with-errors"></div>
					</div>
					<div class="input-field col s6 form-group">
						<input id="User_name" type="email" name="email" value="<?php echo $edit['email'];?>" class="validate" required>
						<label for="User_name">Email</label>
						<div class="help-block with-errors"></div>
					</div>
					</div>
					<div class="row">
                        <div class="tab-inn">
							<div class="file-field input-field">
                               <!-- <div class="btn">
                               <span>File</span>-->
                               <input type="file" id="imgInp" class="sty" name="image">
								<img src="<?php echo $edit['image'];?>" id="blah" name="image"   height="75px" width="75px" style="border-radius:40px;" class="img" alt="Add Picture here">
                                </div>
                            </div>
					<div class="input-field col s12">
						<input id="submit6" type="submit" name="submit" value="Update" class="btn btn-submit">
					</div>
					</div>
			</form>
		</div>
	</div>	
</div>		
<?php
	include "includes/footer.php";
?>