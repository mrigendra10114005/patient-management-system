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
	include("header2.php");
	include("titlehead2.php");
?>
<form method="post" action="addnurse.php" enctype="multipart/form-data">
	<table border="1" style="width:50%" align="center"   >
		
	
		<tr>
				<th>nurse id</th>
				<td><input type="number" name="Nid" placeholder="enter nurse id" required></td>
		</tr>
		<tr>
				<th>doctor id</th>
				<td><input type="number" name="Did" placeholder="enter doctor id" required></td>
		</tr>
		
	
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
		</tr>
		

	</table>
</form>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		
		include('../dbcon.php');
		/*$patientnumber=$_POST['patientnumber'];*/
		$Nid=$_POST['Nid'];
		$Did=$_POST['Did'];
		
		$qry="INSERT INTO doctnurse( `Nid`, `Did`) VALUES ('$Nid','$Did')";
		echo $qry;
		$run=mysqli_query($con,$qry);
		
		
		
		
		if($run==true) 
		{

			
				echo 'data inserted successfully';
		
		}
	}
	?>