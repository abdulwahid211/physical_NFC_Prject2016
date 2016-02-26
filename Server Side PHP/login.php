<?php


require("checkLogin.php"); 
//import the login script for login procedure
// using the require method helps me save space and organise my code 

?>

<!DOCTYPE html>
<html>
		<head>
		<h1>  User Login </h1>
		</head>
<body>

	
	<p> <?php echo $message; ?></P>	
<form action=<?php echo $destination; ?>  method="post" id="login">
 Student Username: <input type="text" name="username"><br>
  Student ID: <input type="password" name="student_id"><br>
</form>

<button type="submit" form="login" name ="submit" value="Submit">Login In</button>
<br>
<button onclick="location.href='register.php'">
     Register</button>


</body>
</html>
