<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

<?php
$db_server = new mysqli('localhost','root', '', 'testdb');

if($db_server)
{
     echo 'connection successful<br>';
}

for($x =1; $x <=5; $x++)
{
	$pass = 'pass' . $x;
	//$update = "update users set password = '$pass' where userID = $x";
    $update = "update users set password = '" . password_hash($pass,PASSWORD_DEFAULT) . "' where userID = $x";
    $result = $db_server->query($update);
    if($result)
    {
		echo "update successful<br>";
    }	
}

?>
</body>
</html>