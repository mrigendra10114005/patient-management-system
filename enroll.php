

</head>
<body background=" dataimage/doct1">
		<a href="index.php" style="float:left; margin-right:30px;" >back to Homepage</a>
			<h1 align="right">Nurse Registration</h1>
		<form action="enroll.php" method="post">
		<table align="right">
		<tr>
				<td>nurseName</td><td><input type="text" name="nurseName" required></td>
			</tr>
			<tr>
				<td>age</td><td><input type="text" name="age" required></td>
			</tr>
			<tr>
				<td>contactNumber</td><td><input type="text" name="contactNumber" required</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="enroll" value="enroll"</td>
			</tr>
				
		
		</table>
		

</body>
</html>



<?php
include('dbcon.php');
if(isset($_POST['enroll']))
	{
		$nurseName=$_POST['nurseName'];
		$age=$_POST['age'];
		$contactNumber=$_POST['contactNumber'];
		$qry1="INSERT INTO nurse(`Name`,`age`,`contactNumber`)VALUES('$nurseName','$age','$contactNumber')";
		$run1=mysqli_query($con,$qry1);
		if($run1==true)
		{
			echo 'Data insert successfully';
		}
	}
	?>

