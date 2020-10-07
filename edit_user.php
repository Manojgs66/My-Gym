<?php 

include ("includes/db.php");

if (isset($_GET['edit_user'])) {
	$edit_user_id=$_GET['edit_user'];

	$sel_user="SELECT * FROM user WHERE user_id='$edit_user_id'";
	$run_user=mysqli_query($con, $sel_user);
	$row_user=mysqli_fetch_array($run_user);
	$user_up_id=$row_user['user_id'];
	$user_name=$row_user['user_name'];
	$user_email=$row_user['user_email'];
	$user_amount=$row_user['user_amount'];
	$user_age=$row_user['user_age'];
	$user_contact=$row_user['user_contact'];
}

?>
<html>
<head>
	<title>MyGym | Update Users</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Update or Edit Users</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of User</b></td>
				<td><input type="text" name="user_name" value="<?php echo $user_name; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>User Email</b></td>
				<td><input type="text" name="user_email" value="<?php echo $user_email; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>User Amount</b></td>
				<td><input type="text" name="user_amount" value="<?php echo $user_amount; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>User Age</b></td>
				<td><input type="text" name="user_age" value="<?php echo $user_age; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>User Contact</b></td>
				<td><input type="text" name="user_contact" value="<?php echo $user_contact; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_user" value="Update User"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['update_user']))
	{

		//Text Data Variables
		$user_name= $_POST['user_name'];
		$user_email= $_POST['user_emailer'];
		$user_amount= $_POST['user_amount'];
		$user_age= $_POST['user_age'];
		$user_contact= $_POST['user_contact'];

		//Validations
		if($user_name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($user_email=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($user_amount=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($user_age=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($user_contact=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			//Query For Inserting New User Into Database.....
			$update_user = "UPDATE user SET user_name='$user_name',user_email='$user_email',user_amount='$user_amount',user_age='$user_age',user_contact='$user_contact' WHERE user_id='$user_up_id'";
			$run_update = mysqli_query($con, $update_user);
			if ($run_update) {
				echo "<script>alert('Data Updated Successfully')</script>";
				echo "<script>window.open('index.php?view_users','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>