




<!DOCTYPE HTML>
<html lang="en_US">
<head>
	<meta charset="UTF-8">
	<title>Doctor login</title>
	
</head>
<body background=" dataimage/doct1">
	<h1 align="center">Doctor Registration</h1>
		<a href="index.php" style="float:left; margin-right:30px;" >back to Homepage</a>

	<form action="registration.php" method="post">
		<table align="center">
		<tr>
				<td>Name</td><td><input type="text" name="name" required></td>
			</tr>
			<tr>
				<td>Username</td><td><input type="text" name="uname" required></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" name="pass" required</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="register" value="register"</td>
			</tr>
			
		
		
		</table>
		

</body>
</html>
<?php
	include('dbcon.php');
	
require_once('settings.php');
require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);

		echo '<pre>';print_r($user_info['emails'][0]['value']); echo '</pre>';

		// Now that the user is logged in you may want to start some session variables
		$_SESSION['logged_in'] = 1;

		// You may now want to redirect the user to the home page of your website
		// header('Location: home.php');
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}else{

	if(isset($_POST['register']))
	{
	$name=$_POST['name'];
	$username=$_POST['uname'];
	$password=$_POST['pass'];
    $qry="INSERT INTO doctor( `username`, `password`,`Doctorname`) VALUES ('$username','$password','$name')";
	$run=mysqli_query($con,$qry);
	if($run==true) 
		{

			
				echo 'data inserted successfully';
		
		}
	}
	
	}
	
	?>
	
	<a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>">Login with Google</a>





