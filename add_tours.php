<?php
	include "includes/conn.php";
	$msg="";
	$image=false;
	if(isset($_POST['submit'])){
		if($_FILES['image']['name']!==""){
			$dir="images/uploads";
			$file_name=$dir."/".uniqid().basename($_FILES['image']['name']);
			$extesion=pathinfo($file_name,PATHINFO_EXTENSION);
		$tour=mysqli_real_escape_string($con,$_POST['tour']);
		$cost=mysqli_real_escape_string($con,$_POST['cost']);
		if($extesion=="jpg"||$extesion=="png"){
			$size=$_FILES['image']['size'];
			if($size<2000000){
				move_uploaded_file($_FILES['image']['tmp_name'],$file_name);
				$image=true;
			$query=mysqli_query($con,"insert into tours(tour,cost,file) values('$tour','$cost','$file_name')")
			or die(mysqli_error($con));
			}
			else{
				$msg="<div class='alert alert-danger'>Image size is not acceptable</div>";
			}
		}	
			else{
				$msg="<div class='alert alert-danger'>Image format is not acceptable</div>";
			}	
		}
		if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Tour data is added</div>";
		}
		else{
			$msg="<div class='alert alert-danger'>Tour data is not added</div>";
		}
	}	
	include "includes/header.php";
	include "includes/sidebar.php";
?>	
    <div class="col-md-12 sp-top-30">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Here Some packages for you</h4>
            </div>
            <div class="tab-inn">
			<?php
				echo $msg;
			?>
                <form action="" method="POST" data-toggle="validator" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
						<div class="form-group">
                            <input id="first_name" type="text" name="tour" class="validate" required>
                            <label for="first_name">Tours</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="input-field col s6">
							<div class="form-group">
                            <input id="last_name2" type="text" name="cost" class="validate" required>
                            <label for="last_name2">Cost</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="box-inn-sp box-second-inn">
                            <div class="inn-title">
                                <h4>File Uploads & File Input</h4>
                            </div>-->
                            <div class="tab-inn">
							<div class="file-field input-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input type="file" name="image" required>
                                        </div>
										<div class="help-block with-errors"></div>	
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                            </div>
					</div>
						<div class="input-field col s12">
                            <input id="submit6" type="submit" name="submit" class="btn btn-submit">
                        </div>
						
                </form>
              </div>
           </div>
        </div>
<?php
	include "includes/footer.php";
?>	