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
<form action="updatepatient.php" method="post" >
	<tr>
		<th>Enter patient id</th>
		<td><input type="number" name="id" placeholder="Enter patient number" required="required"></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="search"></td>
	</tr>

</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr>
		<th>No</th>
		<th>name</th>
		<th>city</th>
		<th>parentContact</th>
		<th>Disease</th>
		<th>Medicine</th>
		<th>Checkup</th>
		<th>image</th>
		<th>edit</th>
	
	</tr>
	<?php

	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		$id = $_POST['id'];
		
		$sql="SELECT * FROM `patient` WHERE id='$id'";
		
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
		                <td><?php echo $data['name'];?> </td>
		                <td><?php echo $data['city'];?> </td>
		                <td><?php echo $data['parentContact'];?></td>
						<td><?php echo $data['Disease'];?></td>
						<td><?php echo $data['Medicine'];?></td>
						<td><?php echo $data['Checkup'];?></td>
						<td><?php echo $data['image'];?></td>
		                <td><a href="updateform.php? sid=<?php echo $data['id'];?>">edit</td>
	
	                </tr>
				<?php
				}
			
			}
	
	}





?>



</table>

	