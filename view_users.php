<html>
<head>
	<title>MyGym | View Users</title>
<style type="text/css">
	table{
		background-color: darkgrey;
	}
	tr,th{
		border: 2px solid white;
	}
</style>
</head>
<body>
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All User</h2><br></td>
		</tr>
		<tr>
			<th>User No</th>
			<th>User Name</th>
			<th>User Email</th>
			<th>User Amount</th>
			<th>User Age</th>
			<th>User Contact</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_user="SELECT * FROM users";
			$run_user=mysqli_query($con, $sel_user);
			while ($row_user=mysqli_fetch_array($run_user)) {
				$user_id=$row_user['user_id'];
				$user_name=$row_user['user_name'];
				$user_email=$row_user['user_email'];
				$user_amount=$row_user['user_amount'];
				$user_age=$row_user['user_age'];
				$user_contact=$row_user['user_contact'];

				$i++;
			
		?>

		
		
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_email; ?></td>
			<td><?php echo $user_amount; ?></td>
			<td><?php echo $user_age; ?></td>
			<td><?php echo $user_contact; ?></td>
			<td><a href="index.php?edit_user=<?php echo $user_id; ?>">Edit</a></td>
			<td><a href="index.php?delete_user=<?php echo $user_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
		
		
				<?php
		$db_host="localhost";
		$db_name="mygym";
		$db_user="root";
		$db_pass="";
		$con = mysqli_connect("$db_host","$db_name","$db_user","$db_pass") or die("could not connect");
		mysqli_select_db($con,'mygym') or die(mysqli_error($con));
		$p0=mysqli_query($con,"call total_amount(@out);");
		$rs=mysqli_query($con,'SELECt @out');
		      while($arr=mysqli_fetch_row($rs))
			  {
				  echo 'total amount is=Rs.  '.$arr[0];
			  }
			  mysqli_close($con);
			  
			  ?>
		
		
	</table>
</body>
</html>