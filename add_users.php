<?php 

include ("includes/db.php");

?>
<html>
<head>
	<title>MyGym | Add Users</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="add_users.php" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Add New user</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of User</b></td>
				<td><input type="text" name="user_name"></td>
			</tr>
			<tr>
				<td align="right"><b>User Email</b></td>
				<td><input type="text" name="user_email"></td>
			</tr>
			<tr>
				<td align="right"><b>User Amount</b></td>
				<td><input type="text" name="user_amount"></td>
			</tr>
			<tr>
				<td align="right"><b>User Age</b></td>
				<td><input type="text" name="user_age"></td>
			</tr>
			<tr>
				<td align="right"><b>User Contact</b></td>
				<td><input type="text" name="user_contact"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="add_user" value="Add User"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['add_user']))
	{

		//Text Data Variables
		$user_name= $_POST['user_name'];
		$user_email= $_POST['user_email'];
		$user_amount=$_POST['user_amount'];
		$user_age=$_POST['user_age'];
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
			$insert_user = "insert into users(user_name,user_email,user_amount,user_age,user_contact) values('$user_name','$user_email','$user_amount','$user_age','$user_contact')";
			$run_user = mysqli_query($con, $insert_user);
			if ($run_user) {
				echo "<script>alert('1 New User Added Successfully')</script>";
				echo "<script>window.open('index.php?add_users','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>