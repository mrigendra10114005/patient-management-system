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
	include("../dbcon.php");
	$sid=$_GET['sid'];
	$sql="SELECT * FROM `patient` WHERE id='$sid'";
	$run=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($run);
?>
<form method="post" action="deletedata.php" enctype="multipart/form-data">
	<table border="1" style="width:50%" align="center">
		
		
		<tr>
				<th>name</th>
				<td><input type="text" name="name" value=<?php echo $data['name'];?>  required></td>
		</tr>
		<tr>
				<th>city</th>
				<td><input type="text" name="city" value=<?php echo $data['city'];?> required></td>
		</tr>
		<tr>
				<th>parent contact</th>
				<td><input type="text" name="pcon" value=<?php echo $data['parentContact'];?>  required></td>
		</tr>
		<tr>
				<th>age</th>
				<td><input type="number" name="age" value=<?php echo $data['age'];?>  required></td>
		</tr>
		<tr>
				<th>Disease</th>
				<td><input type="text" name="Disease" value=<?php echo $data['Disease'];?> required></td>
		</tr>
		<tr>
				<th>Medicine</th>
				<td><input type="text" name="Medicine" value=<?php echo $data['Medicine'];?> required></td>
		</tr>
		<tr>
				<th>Checkup</th>
				<td><input type="text" name="Checkup" value="<?php echo $data['Checkup'];?>" required></td>
		</tr>
	
		<tr>
			<td colspan="2" align="center">
			<input type="hidden" name="sid" value="<?php echo $data['id'];?>"/>
			<input type="submit" name="submit" value="submit">
			</td>
		</tr>
	</table>
	<table align="center">
			<tr>
				<th>image</th>
				<?php if(isset($data['image']) && strlen($data['image']) > 1){?>
				<td><img src="<?php echo "../".$data['image'];?>" style="width:200px;height:200px;"></td>
				<?php }else{?>
				<td><input type="file" name="image" value=<?php echo $data['image'];?> required></td>
				<?php }?>
		</tr>
	</table>
</form>
</body>
</html>