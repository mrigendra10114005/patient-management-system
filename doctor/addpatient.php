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
<form method="post" action="addpatient.php" enctype="multipart/form-data">
	<table border="1" style="width:50%" align="center"   >
		
	
		<tr>
				<th>name</th>
				<td><input type="text" name="name" placeholder="enter name" required></td>
		</tr>
		<tr>
				<th>city</th>
				<td><input type="text" name="city" placeholder="enter city" required></td>
		</tr>
		<tr>
				<th>parent contact</th>
				<td><input type="text" name="pcon" placeholder="enter parent's contact" required ></td>
		</tr>
		<tr>
				<th>age</th>
				<td><input type="number" name="age" placeholder="enter your age" required></td>
		</tr>
		<tr>
				<th>Disease</th>
				<td><input type="text" name="Disease" placeholder="enter the name of disease" required></td>
		</tr>
		<tr>
				<th>image</th>
				<td><input <input type="file" accept="image/*" capture="camera" name="image"  required></td>
		</tr>
		<tr>
				<th>Medicine</th>
				<td ><input type="text" name="Medicine" placeholder="enter the name of Medicine" required></td>
		</tr>
		<tr>		

				<th>Checkup</th>
				<td><input type="text" name="Checkup" placeholder="enter the name of checkups" required ></td>
	
		</tr>
			<tr>		

				<th>Username</th>
				<td><input type="text" name="Doctor" placeholder="enter the username of Doctor" required></td>
	
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
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$age=$_POST['age'];
		$Disease=$_POST['Disease'];
		$imagename=$_FILES['image']['name'];
		$image=$_FILES['image']['tmp_name'];
		$Username=$_POST['Doctor'];
		move_uploaded_file($image,"../dataimage/$imagename");
		$Medicine=$_POST['Medicine'];
		$Checkup=$_POST['Checkup'];
		
		$qry="INSERT INTO patient( `name`, `city`, `parentContact`,`Disease`, `age`,`image`,`Medicine`,`Checkup`) VALUES ('$name','$city','$pcon','$Disease','$age','/dataimage/$imagename','$Medicine','$Checkup')";
		$run=mysqli_query($con,$qry);
		
		
		$sql="SELECT * FROM `doctor` WHERE username='$Username'";
		$run1=mysqli_query($con,$sql);
		$data1=mysqli_fetch_assoc($run1);
		
		
		$sql1="SELECT id FROM `patient` WHERE name='$name' AND Disease='$Disease' ";
		$run2=mysqli_query($con,$sql1);
		$data2=mysqli_fetch_assoc($run2);
		
		$DName=$data1['Doctorname'];
		$Did=$data1['id'];
		$Pid=$data2['id'];
		$qry1="INSERT INTO histroy( `patientid`, `doctorid`,`Date`,`Checkup`,`Medicine`, `Disease`,`Patientname`,`Doctorname`) VALUES ('$Pid','$Did',now(),'$Checkup','$Medicine','$Disease','$name','$DName')";
		/*echo $qry1;*/
		$run3=mysqli_query($con,$qry1);
		
		
		if($run==true) 
		{

			
				echo 'data inserted successfully';
		
		}
	}
	?>