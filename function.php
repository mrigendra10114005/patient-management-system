<?php
							include('header1.php');
							include('dbcon.php');
							$id=$_POST['id'];
							$sql="SELECT * FROM patient WHERE id='$id'";  
							$run=mysqli_query($con,$sql);
							$data=mysqli_fetch_assoc($run);
	

 
?>
<!DOCTYPE HTML>
<html lang="en_us">
<body>

<form method="post" action="index.php" enctype="multipart/form-data">
	<table border="1" style="width:50%" align="center">
		
		<tr>
				<th>name</th>
				<td><input type="text" name="name" value=<?php echo $data['name'];?>  required readonly></td>
		</tr>
		<tr>
				<th>city</th>
				<td><input type="text" name="city" value=<?php echo $data['city'];?> required readonly></td>
		</tr>
		<tr>
				<th>parent contact</th>
				<td><input type="text" name="pcon" value=<?php echo $data['parentContact'];?>  required readonly></td>
		</tr>
		<tr>
				<th>age</th>
				<td><input type="number" name="age" value=<?php echo $data['age'];?>  required readonly></td>
		</tr>
		<tr>
				<th>Disease</th>
				<td><input type="text" name="Disease" value=<?php echo $data['Disease'];?>  required readonly></td>
		</tr>
		<tr>
				<th>Medicine</th>
				<td><input type="text" name="Medicine" value="<?php echo $data['Medicine'];?>"  required readonly></td>
		</tr>
		<tr>
				<th>Checkup</th>
				<td><input type="text" name="Checkup" value="<?php echo $data['Checkup'];?>"  required readonly></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="ok"></td>
		</tr>
			</table>
			<table align="center">
			<tr>
				<th>image</th>
				<?php if(isset($data['image']) && strlen($data['image']) > 1){?>
				<td><img src="<?php echo $data['image'];?>" style="width:200px;height:200px;"></td>
				<?php }else{?>
				<td><input type="file" name="image" value=<?php echo $data['image'];?> required></td>
				<?php }?>
		</tr>
	</table>
</form>
</body>
</html>