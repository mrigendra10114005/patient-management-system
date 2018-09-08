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
	include("titlehead.php");
?>
<table align="center">
<form action="History.php" method="post" >
	<tr>
		<th>Enter patient Name</th>
		<td><input type="text" name="name" placeholder="Enter patient number" required="required"></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="search"></td>
	</tr>

</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr>
		<th>No</th>
		<th>patientName</th>
		<th>DoctorName</th>
		<th>Medicine</th>
		<th>Disease</th>
		<th>Checkup</th>
		<th>Date</th>
	
	</tr>
	<?php
	
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		
		$name = $_POST['name'];
		
		$sql="SELECT * FROM `histroy` WHERE Patientname='$name'";
		
		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)<1)
			{
				echo "<tr><td colspan='5'>No record found</td></tr>";
			
			}
			else
			{
				$count=0;
				while($data=mysqli_fetch_assoc($run))
				{
				$count++;
				?>
					<tr>
		                <td><?php echo $count; ?></td>
		                <td><?php echo $data['Patientname'];?> </td>
		                <td><?php echo $data['Doctorname'];?> </td>
		                <td><?php echo $data['Medicine'];?></td>
						<td><?php echo $data['Disease'];?></td>
						<td><?php echo $data['Checkup'];?></td>
						<td><?php echo $data['Date'];?></td>
	
	                </tr>
				<?php
				}
			
			}
	
	}





?>

	</table>
