<?php
   
// Script to double check if the user exist in the database 

//Variables for the connection to the database.
$hostName = "localhost";
$username = "ma301ma";
$password = "wahid92";
$dbName = "ma301ma_...test";

//Connecting to the host and database.
$connection = mysql_connect($hostName, $username, $password, $dbName);



//Checking if the connection has worked.
if(!mysql_select_db($dbName))
{
	//Printing out the error.
	echo "failed to connect to the database, please try again!";


}







// display the message for the user to enter 
$message = "Please enter your login details";

$destination = "login.php";
// first check if the user has submitted the form 
if(isset($_POST['submit'])){
// if the user has forget to enter username or password then display warning message
 if(empty($_POST['username']) || empty($_POST['student_id'])) {
	 // send the variable to display the warning message
	$message = "You must enter both USERNAME and ID!";
}

/// if the user has entered something, 
// then carry out the credential process to verify if the user login is valid or not
else{
	

// Start loading the sessions so i can pass sessions valriables
session_start();

	
	  $Username = $_POST['username'];
	  $ID =  $_POST['student_id'];
	
	
/*  The String variable called query will contain sql query that checks if the user login details exists inside the database. 
    This sql query string  is concatenated username and password with sha1 function, the string value will send it to the mysql database
	to check if the user login details match. I am using the sha1 function again that will convert the password as hash code and match against the database
	*/
$query="SELECT id,firstName,lastName, nfc, student_id, username FROM studentDetails where username='".$Username."'AND student_id= '".$ID."'";
// perform the sql query against with the database 
$result=mysql_query($query);
// intialising the empty array variable, this variable will collect values from the associate array
$rows = array();
// rowcount will store number rows from the databse query
$rowcount=mysql_num_rows($result);
	

/*
if the username and password match against the sql query it should return the correct data. 
 The rowcount should return rowcount value of 1,  which means there is a row that contains data of the user detail 
*/	
if($rowcount==1){
	// once everything is success, start fetching data of the user login 
	// using the while loop to fetch data until everything has been collected 
	while($row=mysql_fetch_array($result)){
	// set the session variables for user login details 
	// so i can pass them to multiple pages 
// i will need the user's id to help me identify the editor's blog post
// passing along with users firstanme and lastname 		

 $_SESSION['firstName']=$row['firstName'];
 $_SESSION['lastName']=$row['lastName'];
 $_SESSION['student_id'] = $row['student_id'];
 $_SESSION['nfc']=$row['nfc'];
 $_SESSION['username'] = $row['username'];



}	

/// diect back to the user 
	header( 'Location: calendar_new/calendar.php' ) ;	
}
	
	// if it does not return value of 1, this means the user details does not exists 
	// send warning message to the user
else{
$message = "Invalid login, Please try again!";
}
	
}
}
?>