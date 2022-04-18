<?php
include"includes/conn.php";
	$msg="";	
	if(isset($_GET['action'])){
		$id=mysqli_real_escape_string($con,$_GET['id']);	
		$query=mysqli_query($con,"delete from products where id=$id") or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="<div class='alert alert-success'>Package is Deleted successfully</div>";
		}
		else{
			$msg="<div class='alert alert-danger'>Package is not Deleted!</div>";

		}
	}
	$query=mysqli_query($con,"select * from products");
	$row=mysqli_fetch_array($query);
include"includes/header.php";
include"includes/sidebar.php";
?>
	<div class="box-inn-sp">
		<div class="inn-title">
			<h4>The Right Way To Start A Short Break Holiday</h4>
		</div>
	<div class="tab-inn">
	<table id="example" class="display table table-hover nowrap" style="width:100%">
			<thead>
				<tr>
					<th>id</th>
					<th>Product Category</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach($query as $row){	
			?>
			
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['price'];?></td>
					<td><?php echo $row['quantity'];?></td>
					<td><img src='<?php echo $row['image']?>' width="150px"></td>
					<td>
						<a href="edit_tours.php?id=<?php echo $row['id'];?>"  data-edit="<?php echo $row['id'];?>" data-e="edittours" class="btn btn-info edit"><i class="fa fa-edit"></i>Edit</a><br>
						<a href="#"  data-id="<?php echo $row['id'];?>" data-page="deletetours" class="btn btn-danger delete"><i class="fa fa-remove"></i>Delete</a>
					</td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>	
	</div>	
</div>	
<?php
include"includes/footer.php";
?>