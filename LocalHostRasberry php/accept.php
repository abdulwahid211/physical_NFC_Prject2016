<?php

// we ensure the door lock is opened for the user to access 
// as the correct NFC and time slot has been verified from the server 
//we seted up the GPIO pin 21 as the outout for the switch lock 
$setmode17 = shell_exec("gpio -g mode 20 out"); 

//  send 1 value to the GPIO pin 21 to open the door lock 
$gpio_on = shell_exec("gpio -g write 20 1");


// url link from the server 
$url ="http://doc.gold.ac.uk/~ma301ma/phpProg6/ServerService.php";
$fields = array(
	'accept_details' => 'accept_details'
);
//url-ify the data for the POST
foreach($fields as $key=>$value) 
{ $fields_string .= $key.'='.$value.'&'; }
//rtrim($fields_string, '&');
//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data to the server
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
$result = curl_exec($ch);
echo "<h1>Welcome the door is Opened! ;) </h1>";
echo $result;
//close connection
curl_close($ch);
?>
<!DOCTYPE html>
<html>
<body bgcolor="7DC15B">
<form action="register.php" method="post" id="register">
 
</form>
<button onclick="location.href='register.php'">Go Back!</button>
</body>
</html>