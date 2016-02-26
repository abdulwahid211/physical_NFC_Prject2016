<?php
$nfc_code ="scan son";
$url ="http://doc.gold.ac.uk/~ma301ma/phpProg6/ServerService.php";
if (isset($_POST['submit']) ) {
$nfc_code = shell_exec("sudo python read.py");
$nfc_mode = shell_exec("^c");





$fields = array(
	'NFC' => $nfc_code
);
//url-ify the data for the POST
foreach($fields as $key=>$value) 
{ $fields_string .= $key.'='.$value.'&'; }
//rtrim($fields_string, '&');
//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
//execute post
$result = curl_exec($ch);
} // end submit 
//close connection




$datatopost = array("Value" => "http://doc.gold.ac.uk/~ma301ma/phpProg6/ServerService.php" );
$ch= curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datatopost);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$returndata = curl_exec($ch);
echo $returndata ." Hello from other side";
curl_close($ch);
curl_close($ch);










?>
<!DOCTYPE html>
<html>
<body>
<p> 
<?php 
// print out any message for the user 
echo "Please place your NFC tag?"; ?> </p>
<form action="register.php" method="post" id="register">
  NFC code: <input type="text" name="nfc" value= <?php echo  $nfc_code; ?>    ><br>
</form>
<button type="submit" form="register" name ="submit" value="Submit">Scan NFC</button>
<button onclick="location.href='checkNfc.php'">Verify NFC</button>
<button onclick="location.href='register.php'">Refresh</button>
</body>
</html>