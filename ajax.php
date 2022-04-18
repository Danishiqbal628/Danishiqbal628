<?php
	session_start();
	$res=array();
	
	include "includes/conn.php";
	if(!isset($_SESSION['admin_id'])){
		die("Access denied");
	}
	if(isset($_POST['action'])&& $_POST['action']=="deletetourists"){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$query=mysqli_query($con,"delete from tourists where id=$id") or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="Tourists data is Deleted ";
		}
		else{
			$msg="Tourists is not Deleted!";
		}
		$res['msg']=$msg;
			echo json_encode($res);
	}
	if(isset($_POST['action'])&& $_POST['action']=="deleteadmin"){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$query=mysqli_query($con,"delete from admin where id=$id") or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="Admin is Deleted successfully!";
		}
		else{
			$msg="Admin is not Deleted!</div>";
		}
		$res['msg']=$msg;
			echo json_encode($res);
	}
	if(isset($_POST['action'])&& $_POST['action']=="deletetours"){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$query=mysqli_query($con,"delete from tours where id=$id") or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg=")Tours data is Deleted successfully!";
		}
		else{
			$msg="Tours is not Deleted!";
		}
		$res['msg']=$msg;
			echo json_encode($res);
	}
	if(isset($_POST['action'])&& $_POST['action']=="deletepackage"){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$query=mysqli_query($con,"delete from trips where id=$id") or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="Package is Deleted successfully!";
		}
		else{
			$msg="Package is not Deleted!";
		}
		$res['msg']=$msg;
			echo json_encode($res);
	}	
	if(isset($_POST['action'])&& $_POST['action']=="addproduct"){
		$id=mysqli_real_escape_string($con,$_POST['id']);
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$quantity=mysqli_real_escape_string($con,$_POST['quantity']);
		$price=mysqli_real_escape_string($con,$_POST['price']);
		// $coustomer=mysqli_real_escape_string($con,$_POST['coustomer']);
		$query=mysqli_query($con,"insert into orders(price) values('$price')") or die(mysqli_error($con));
		$last_id=mysqli_insert_id($con);
		$query=mysqli_query($con,"insert into order_line_items (products_id,orders_id,product_name,price,quantity) values('$id','$last_id','$name','$price','$quantity')") or die(mysqli_error($con));
		if(mysqli_affected_rows($con)>0){
			$msg="Order done!";
		}
		else{
			$msg="FAILD";
		}
		$res['msg']=$msg;
			echo json_encode($res);
	}	
	
$msg="";
	if(isset($_POST['action'])&& $_POST['action']=="filter"){
		$date1=mysqli_real_escape_string($con,$_POST['date1']);
		$date2=mysqli_real_escape_string($con,$_POST['date2']);
		$date1=strtotime($date1);
		$date2=strtotime($date2);
		$query=mysqli_query($con,"select * from tourists where UNIX_TIMESTAMP(addedOn) BETWEEN '".$date1."' and '".$date2."'")or die(mysqli_error($con));
			foreach($query as $row)
			{
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['firstname']."</td>";
				echo "<td>".$row['lastname']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['cnic']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['city']."</td>";
				echo "<td>".$row['adress']."</td>";
				echo "<td>".$row['addedOn']."</td>";	
				echo "<td></td>";	
				echo "</tr>";
				
			}
		if(mysqli_affected_rows($con)>0){
			// $msg="Data has been filterd successfully";
		}
		else{
			$msg="Data has not filterd successfully";
		}
				
	}
	echo $msg;
?>