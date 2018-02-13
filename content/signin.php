<html>
    <head>
        <title>
            Bed Registry Sign-in
        </title>
		<script src="sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
		<link rel = "stylesheet" type = "text/css" href = "../layout-styles.css">
     </head>
    
    <body>
	<h1>Bed Registry Login</h1>
	
	<?php
	$db_hostname = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_database ="test";
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	
	if(isset($_POST['hospitals']) && isset($_POST['username']) && isset($_POST['password']))
	{ 
		$hospital = get_post($db_server, 'hospitals');
		$user = get_post($db_server, 'username'); 
		$pass = get_post($db_server, 'password');
		
		$checkUser = "SELECT userName, password, siteLink FROM users u join hospitals h on u.hospID = h.ID WHERE userName = '$user' AND name = '$hospital';";
		$result = mysqli_query($db_server, $checkUser);
		
		//no user found 
		if(mysqli_num_rows($result) == 0)
		{	
			echo '<script language="javascript">';
			echo 'swal("Login error!","User ' . $user . ' was not found for ' . $hospital. '", "error")';
			echo '</script>';
		}
		
		else
		{
			//verifying hash password in db against hash of password entered
			$row = mysqli_fetch_assoc($result);
			$passHash = $row['password'];
			
			if(!password_verify($pass, $passHash))
			{
				echo '<script language="javascript">';
				echo 'swal("Login error!", "You entered an incorrect password.","error")';
				echo '</script>';
			}
			
			else
			{
				if(!isset($_COOKIE['bedregistry.org_' .$user]))
				{
					setcookie('bedregistry.org_user', $user, time() + 3600);
				}
				//checking password for rehash
				if(password_needs_rehash($passHash, PASSWORD_DEFAULT))
				{
					$newPassHash = password_hash($pass, PASSWORD_DEFAULT);
					//update query to database if determined to be necessary
					$update = "update users set password = '$newPassHash' where userName = '$user' and password = '$hash';";
					mysqli_query($update);
				}
				
				//redirecting user to selected hospitals homepage
				$siteLink = $row['siteLink'];
				header('Location: ' . $siteLink);
			}
		}
	}
	
	//grabbing list of hospitals
	$hospitalList = "SELECT name FROM hospitals;";
	$list = mysqli_query($db_server,$hospitalList);
	$num_rows = mysqli_num_rows($list);

	//form with drop-down of hospitals, user field and pass field
	echo '<form name = "loginSubmit" action = "signin.php" method = "post">';
	echo 'Choose hospital:<br><select name = "hospitals" size = "1">';
	
	//populating drop-down for form
	for($x = 0; $x < $num_rows; $x++)
	{
		$list->data_seek($x);
		$row = $list->fetch_assoc();
		echo '<option value = "' . $row['name'] . '">' .$row['name'] .'</option>';
	}
	
	echo '</select><br><br>';
	//sets up input fields
	echo 'Username: <br><input type="text" name="username" required = "TRUE"><br><br>';
	echo 'Password: <br><input type="password" name="password" required = "TRUE"><br><br>';
	echo '<input type="submit" value="Login">';
	echo '</form>';

	//kill connection
	 $list->close();
	 $db_server->close();

	//grabs post information
	function get_post($db_server, $var)
	{
		return $db_server->real_escape_string($_POST[$var]);
	}
	
	?>
	
	</body>
</html>