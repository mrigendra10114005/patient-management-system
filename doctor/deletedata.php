<?php

include('../dbcon.php');
/*$patientnumber=$_POST['patientnumber'];*/
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$age=$_POST['age'];
		$id=$_POST['sid'];
		$imagename=$_FILES['image']['name'];
		$tempname=$_FILES['image']['tmp_name'];
		move_uploaded_file($tempname,"../dataimage/$imagename");
		$Medicine=$_POST['Medicine'];
		$Checkup=$_POST['Checkup'];
		echo $id;
		
		$qry="DELETE FROM patient  WHERE id='$id'";
		$run=mysqli_query($con,$qry);
		echo $run;
		if($run==true) 
		{
                 
				?>
				<script>
			
				alert ('data deleted successfully');
				window.open('doctordash.php?sid=<?php echo $id;?>','_self');
				
		       </script>
			   <?php
		}
		?>