<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	echo "edit.php";
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE students SET name='$name',age=$age,email='$email',image='$image' WHERE id=$id");
		echo $result;
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM students WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
	$image = $res['image'];
}
?>
<html>
<head>	
<link rel="stylesheet" href="styles.css">

	<title>Edit Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>

<body>
	<a href="index.php" class="btn btn-link">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="number" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Image</td>
				<td><input type="text" name="image" value="<?php echo $image;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update" class="btn btn-info"></td>
			</tr>
		</table>
	</form>
</body>
</html>
