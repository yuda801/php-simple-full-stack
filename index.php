<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM students ORDER BY name DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM students ORDER BY name"); // using mysqli_query instead
?>

<html>
<head>	
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<title>Homepage</title>
</head>

<body>
<a href="add.html" class="btn btn-link">Add New Data</a><br/><br/>

	<table width='80%' class="table">

	<tr>
		<td scope="col">Name</td>
		<td scope="col">Age</td>
		<td scope="col">Email</td>
		<td scope="col">Image</td>
		<td scope="col">Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 
		$filepath = $res["image"];		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td>" . 
		"<img style='hight: 70px;;width:90px;' src=$filepath alt=`error loading`>"
		."</td>";	
		echo "<td><a 
		href=\"edit.php?id=$res[id]\" class=`btn btn-link`>Edit</a> | <a href=\"delete.php?id=$res[id]\" 
		class=`btn btn-link`
		onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
