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
<form action="detail.php" method="post" >
	<tr>
		<th>Enter doctor id</th>
		<td><input type="number" name="id" placeholder="Enter doctor id" required="required"></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="search"></td>
	</tr>

</form>
</table>
<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr>
		<th>No</th>
		<th>nurseName</th>
		<th>age</th>
		<th>contactNumber</th>
		
	
	</tr>
	<?php
	
	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
		
		$Did = $_POST['id'];
		
		$sql="SELECT * FROM nurse JOIN doctnurse on nurse.Nid=doctnurse.Nid WHERE doctnurse.Did='$Did'";
		
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
		                <td><?php echo $data['Name'];?> </td>
		                <td><?php echo $data['Age'];?> </td>
		                <td><?php echo $data['contactNumber'];?></td>
						
	
	                </tr>
				<?php
				}
			
			}
	
	}





?>

	</table>
