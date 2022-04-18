<?php
	include "includes/conn.php";
	$msg="";
	$image=false;
	$id=mysqli_real_escape_string($con,$_GET['id']);
	if(isset($_POST['submit'])){
		if($_FILES['image']['name']!==""){
			$dir="images/uploads";
			$file_name=$dir."/".uniqid().basename($_FILES['image']['name']);
			$extesion=pathinfo($file_name,PATHINFO_EXTENSION);
			if($extesion=="jpg"||$extesion=="png"){
			$size=$_FILES['image']['size'];
			if($size<2000000){
				move_uploaded_file($_FILES['image']['tmp_name'],$file_name);
				$image=true;
				$query1=mysqli_query($con,"update tours set file='$file_name' where id=$id")or die(mysqli_error($con));
				if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Tours edit Successfuly</div>";
		}
		else{
			$msg="<div class='alert alert-danger'>Tours is not edited!</div>";
		}
				}
			else{
				$msg="<div class='alert alert-danger'>Image size is not acceptable</div>";
			}
			}
			else{
			$msg="<div class='alert alert-danger'>Image format is not acceptable</div>";
			}	
		}
		$tour=mysqli_real_escape_string($con,$_POST['tour']);
		$cost=mysqli_real_escape_string($con,$_POST['cost']);
		$query=mysqli_query($con,"update tours set tour='$tour',cost='$cost' where id=$id")or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Tours edit Successfuly</div>";
		}
		else{
			$msg="<div class='alert alert-danger'>Tours is not edited!</div>";
		}
	}	
	$query=mysqli_query($con,"select * from tours where id=$id") or die(mysqli_error($con));
	$edit=mysqli_fetch_array($query);	
	include "includes/header.php";
	include "includes/sidebar.php";
?>
    <div class="col-md-12 sp-top-30">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Here Some packages for you</h4>
            </div>
            <div class="tab-inn">
			<br>
			<?php
				echo $msg;
			?>
                <form action="" method="POST" data-toggle="validator" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
						<div class="form-group">
                            <input id="first_name" type="text" name="tour" value="<?php echo $edit['tour'];?>" class="validate" required>
                            <label for="first_name">Tours</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                        <div class="input-field col s6">
						<div class="form-group">
                            <input id="last_name2" type="text" name="cost" value="<?php echo $edit['cost'];?>" class="validate" required>
                            <label for="last_name2">Cost</label>
							<div class="help-block with-errors"></div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                       <!-- <div class="box-inn-sp box-second-inn">
                            <div class="inn-title">
                                <h4>File Uploads & File Input</h4>
                            </div>--->
                            <div class="tab-inn">
							<div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="image" value="<?php echo $edit['file'];?>">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
								<img src="<?php echo $edit['file'];?> "width="150px">
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
<?php
	include "includes/footer.php";
?>	