<?php

include('../dbcon.php');
		/*$patientnumber=$_POST['patientnumber'];*/
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$age=$_POST['age'];
		$id=$_POST['sid'];
		$Disease=$_POST['Disease'];
		$Medicine=$_POST['Medicine'];
		$Checkup=$_POST['Checkup'];
		
		
		
		$qry="UPDATE patient SET  name='$name', city='$city', parentContact='$pcon', age='$age',Disease='$Disease',Medicine='$Medicine',Checkup='$Checkup' WHERE id='$id'";
		$run=mysqli_query($con,$qry);
		
		
		$sql="SELECT id FROM `histroy`WHERE Patientname='$name' AND Disease='$Disease'";
		$run1=mysqli_query($con,$sql);
		$data1=mysqli_fetch_assoc($run1);
		$Did=$data1['id'];
		$qry1="UPDATE histroy SET Disease='$Disease',Medicine='$Medicine',Checkup='$Checkup' WHERE id='$Did'";
		$run2=mysqli_query($con,$qry1);
		
		
		
		if($run==true&&$run2==true) 
		{
                 
				?>
				<script>
			
				alert ('data inserted successfully');
				window.open('doctordash.php?sid=<?php echo $id;?>','_self');
				
		       </script>
			   <?php
		}
		?>
