<?php
        session_start();
		if(isset($_SESSION['uid']))
		{
			echo "";
		}
		else
		{
			header('location: ../login.php');
		}
		
		?>
		
<?php
	include("header.php");
?>
	
	<div class="doctortitle" >
	<h4><a href="Logout.php" style="float:right; margin-right:30px;">Logout</a></h4>
	<h1 align="center">Welcome to doctor dashboard</h1>
	</div>
	<div class="dashbaord" >
		<table border="1" style="width:50%;" align="center">
			<tr>
				<td>1.</td><td><a href="addpatient.php">Insert patient details</a></td>
			</tr>
			<tr>
				<td>2.</td><td><a href="updatepatient.php">update patient details</a></td>
			</tr>
			<tr>
				<td>3.</td><td><a href="deletepatient.php">delete patient details</a></td>
			</tr>
			<tr>
				<td>4.</td><td><a href="History.php">History of  patient details</a></td>
			</tr>
				<tr>
				<td>5.</td><td><a href="detail.php">doctor nurse details</a></td>
			</tr>
		</table>
	</div>


</body>
</html>