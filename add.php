<html>
<head>
	<title>Add Data</title>
	
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)|| empty($image)) {
				
		if(empty($name)) {
			echo "<font>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font>Email field is empty.</font><br/>";
		}
		if(empty($image)) {
			echo "<font>Image field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO students(name,age,email,image) 
		VALUES('$name',$age,'$email','$image')");
		echo $result;
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
