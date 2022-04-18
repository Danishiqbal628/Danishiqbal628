<?php
include "includes/conn.php";
	$msg="";	
	if( isset($_POST['submit'])){
		$tourists=mysqli_real_escape_string($con,$_POST['tourists_id']);
		$tour=mysqli_real_escape_string($con,$_POST['tour']);
		$guest=mysqli_real_escape_string($con,$_POST['guest']);
		$feedback=mysqli_real_escape_string($con,$_POST['feedback']);
	$query=mysqli_query($con,"insert into trips(tourists_id,tours_id,guest,feedback) values('$tourists','$tour','$guest','$feedback')")or
	die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Package is added</div>";
		}
		else{
			$msg="<div class='alert alert-danger'>Package is not added!</div>";
	
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
                        <label>Select Tourist </label>
                        <div class="input-field col s12">
                                <select class="select2" name="tourists_id" required>
                                    <?php
										$query=mysqli_query($con,"select * from tourists")or die (mysqli_error($con));
										while($row=mysqli_fetch_array($query)){	
									?>
										<option value="<?php echo $row['id'];?>">
										<?php echo $row['firstname'];?>
										</option>
										
									<?php
										}
									?>
                                </select>
							<div class="help-block with-errors"></div>	
                        </div>
					</div>	
					<div class="row">
                          <label>Select Tour</label>
                        <div class="input-field col s12">
							<select class="select2" name="tour" required>
								<?php
									$query=mysqli_query($con,"select * from tours")or die (mysqli_error($con));
									while($row=mysqli_fetch_array($query)){	
								?>
									<option value="<?php echo $row['id'];?>">
									<?php echo $row['tour'];?>
									</option>
								<?php
									}
								?>
							</select>
						<div class="help-block with-errors"></div>
						</div>
                    </div>
					<div class="row">
						<div class="input-field col s6 form-group">
                            <input  type="text" name="feedback" class="validate"required>
                            <label for="last_name2">Feedback</label>
							<div class="help-block with-errors"></div>
                        </div>
						<div class="input-field col s6 form-group">
                            <input id="last_name2" type="number" name="guest" class="validate" required>
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
<?php
include "includes/footer.php";
?>					