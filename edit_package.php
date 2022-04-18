<?php
include "includes/conn.php";
	$msg="";	
	$id=mysqli_real_escape_string($con,$_GET['id']);
		if( isset($_POST['submit'])){
			$tourists=mysqli_real_escape_string($con,$_POST['tourists_id']);
			$tour=mysqli_real_escape_string($con,$_POST['tour']);
			$guest=mysqli_real_escape_string($con,$_POST['guest']);
			$feedback=mysqli_real_escape_string($con,$_POST['feedback']);
	$query=mysqli_query($con,"update trips set tourists_id='$tourists',tours_id='$tour',guest='$guest',feedback='$feedback' where id=$id")or
	die(mysqli_error($con));
	if(mysqli_affected_rows($con)>0){
		$msg="<div class='alert alert-success'>Package is edited Successfuly</div>";
	}
	else{
		$msg="<div class='alert alert-danger'>Package is not edited!</div>";
	}
}
	$query=mysqli_query($con,"select * from trips where id=$id") or die(mysqli_error($con));
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
                        <div class="input-field col s12">
                           <div class="tab-inn select-pos">
                                <div class="input-field col s12">
                                    <select name="tourists_id">
                                        <?php
											$query=mysqli_query($con,"select * from tourists")or die (mysqli_error($con));
											while($row=mysqli_fetch_array($query)){	
											$select=$row['id']==$edit['tourists_id']?"selected":"";
										?>
											<option value="<?php echo $row['id'];?>" <?php echo $select;?>>
											<?php echo $row['firstname'];?>
											</option>
										<?php
											}
										?>
                                    </select>
                                    <label>Select Tourist </label>
                                </div>
							</div>			
                        </div>
					<div class="row">
                        <div class="input-field col s12">
                           <div class="tab-inn select-pos">
                                <div class="input-field col s12">
                                    <select name="tour">
                                        <?php
											$query=mysqli_query($con,"select * from tours")or die (mysqli_error($con));
											while($row=mysqli_fetch_array($query)){	
											$select=$row['id']==$edit['tours_id']?"selected":"";
										?>
											<option value="<?php echo $row['id'];?>" <?php echo $select;?>>
											<?php echo $row['tour'];?>
											</option>
										<?php
											}
										?>
                                    </select>
                                    <label>Select Tour</label>
                                </div>
							</div>			
                        </div>
                    </div>
					<div class="row">
						<div class="input-field col s6 form-group">
                            <input id="last_name2" type="text" name="feedback" value="<?php echo $edit['feedback']?>" class="validate" required>
                            <label for="last_name2">Feedback</label>
							<div class="help-block with-errors"></div>
                        </div>
						<div class="input-field col s6 form-group">
                            <input id="last_name2" type="number" name="guest" value="<?php echo $edit['guest']?>" class="validate" required>
                            <label for="last_name2">Guests</label>
							<div class="help-block with-errors"></div>
                        </div>
					</div>
				<div class="row">
					<div class="input-field col s12">
                        <input id="submit6" type="submit" name="submit" class="btn btn-submit">
					</div>
				</div>
				</div>					
			</div>					
		</div>					
	</div>
<?php
include "includes/footer.php";
?>					