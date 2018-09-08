




<!DOCTYPE HTML>
<html lang="en_US">
<head>



	<meta charset="UTF-8">
	<title>Doctor login</title>
	
</head>
<body background=" dataimage/doct1">
	<h1 align="center">Doctor login</h1>
	<form action="login.php" method="post">
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
	$qry="SELECT * FROM `doctor` WHERE username='$username' AND password='$password'";
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
	header('location: doctor/doctordash.php');
	}
	}


	?>
	<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	zoomEnabled: true,
	title: {
		text: "Bitcoin Price - 2017"
	},
	axisY: {
		title: "Price in USD",
		titleFontSize: 24,
		prefix: "$"
	},
	data: [{
		type: "line",
		yValueFormatString: "$#,##0.00",
		dataPoints: dataPoints
	}]
});
 
function addData(data) {
	var dps = data.price_usd;
	for (var i = 0; i < dps.length; i++) {
		dataPoints.push({
			x: new Date(dps[i][0]),
			y: dps[i][1]
		});
	}
	chart.render();
}
 
$.getJSON("https://canvasjs.com/data/gallery/php/bitcoin-price.json", addData);
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
	

