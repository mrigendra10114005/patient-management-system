<!DOCTYPE HTML>
<html lang="en_us">
<head>
     <meta charset="UTF-8">
	 <title>patient management system</title>
</head>
<body background="dataimage/doctorpt">

<h1 align="center">welcome to patient management system</h1>

<h3 align="left" style="margin-right:20px;"><a href="registration.php">Doctor Registration</a></h3>
<h3 align="left" style="margin-right:20px;"><a href="enroll.php">Nurse Enrollment</a></h3>
<h3 align="left" style="margin-right:20px;"><a href="manage.php"> Doctor Nurse management</a></h3>
<h3 align="left" style="margin-right:20px;"><a href="login.php">Doctor login</a></h3>
<form method="post" action="function.php">
<table style="width:30%" align="center" border="1" >
	<tr>
		<td colspan="2" align="center" font-size=150%>patient Information</td>
	</tr> 
	<tr>
		<td align="left"> Patient Id</td>
		<td><input type="text" name="id"</td>
	
		<td colspan="2" align="center"><input type="submit" name="submit" value="show Detail"></td>
	</tr>


</table>
</form>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/* Style the buttons */
.btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
}

.btn:hover {
    background-color: #ddd;
}

.btn.active {
    background-color: #666;
    color: white;
}
</style>
</head>
<body>

<h2>List of Doctor Available</h2>



<div id="btnContainer">
<button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
<button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>

<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Dr Harikesh Patel</h2>
    <p>Neuro surgeon</p>
	<p>MS FROM AIIMS DELHI</p>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Dr Suchit Kumar</h2>
    <p>Orthopedic</p>
	<p>UNIVERSITY OF HARVARD </p>
  </div>
</div>

<div class="row">
  <div class="column" style="background-color:#ccc;">
    <h2>Dr Ravi</h2>
    <p>civil Surgeon</p>
	<p>UNIVERSITY OF CAMBRIDGE</p>
  </div>
  <div class="column" style="background-color:#ddd;">
    <h2>Dr Linga</h2>
	<p>Cardiologists. </p>
    <p>UNIVERSITY OF OXFORD</p>
  </div>
</div>

<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
    for (i = 0; i < elements.length; i++) {
        elements[i].style.width = "100%";
    }
}

// Grid View
function gridView() {
    for (i = 0; i < elements.length; i++) {
        elements[i].style.width = "50%";
    }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
</html>



