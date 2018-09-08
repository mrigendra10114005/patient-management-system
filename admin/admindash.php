<?php
        session_start();
		if(isset($_SESSION['uid']))
		{
			echo "";
		}
		else
		{
			header('location: ../admin.php');
		}
		
		?>
		
<?php
	include("header2.php");
?>
	
	<div class="doctortitle" >
	<h4><a href="Logout1.php" style="float:right; margin-right:30px;">Logout</a></h4>
	<h1 align="center">Welcome to Admin dashboard</h1>
	</div>
	<div class="dashbaord" >
		<table border="1" style="width:50%;" align="center">
			<tr>
				<td>1.</td><td><a href="addnurse.php">Insert nurse doctor details</a></td>
			</tr>
			
		</table>
	</div>


</body>
</html>

