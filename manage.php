


<!DOCTYPE HTML>
<html lang="en_US">
<head>



	<meta charset="UTF-8">
	<title>Management</title>
	
</head>
<body background=" dataimage/doct1">
	<h1 align="center">Management</h1>
	<form action="manage.php" method="post">
		<table align="center">
			<tr>
				<td>Username</td><td><input type="text" name="uname" required></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" name="pass" required</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="login" value="login"</td>
			</tr>
		
		</table>
		

</body>
</html>
<?php
	include('dbcon.php');
	if(isset($_POST['login']))
	{
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$qry="SELECT * FROM `admin` WHERE userName='$username' AND password='$password'";
	$run=mysqli_query($con,$qry);

	$row = mysqli_num_rows($run);
	if($row<1)
	{
	?>
	<script>
	alert('username or password not match!!');
	window.open('login.php','_self');
	</script>
	<?php
	
	}
	else
	{
	$data=mysqli_fetch_assoc($run);
	$id=$data['id'];
	session_start();
	$_SESSION['uid']=$id;
	header('location: admin/admindash.php');
	}
	}


	?>