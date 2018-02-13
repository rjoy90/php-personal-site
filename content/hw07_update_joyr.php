<?php
	require_once('../templates/header.php');
	$db_server = new mysqli($db_hostname, $db_username, $db_password, $db_database);
	
	if ($db_server->connect_error) 
		echo "unable to connect<br>";
	else
		echo "connection successful<br>";
	
	if(isset($_POST['update']))
	{
		$oldTitle = get_post($db_server, 'title');
		$oldPlatform = get_post($db_server, 'platform');
		$query = "SELECT * FROM videogames where title = '$oldTitle' and platform = '$oldPlatform'; ";
		echo $query . "<br>";
		$result = mysqli_query($db_server,$query);
	
		$num_rows = mysqli_num_rows($result);
		echo $num_rows . "<br>";
		$row = mysqli_fetch_assoc($result);
		echo $row['title'] . '<br>';
			
		echo '<form action="hw07_joyr.php" method="post">
			Title <input type="text" name="title" value = "' . $row['title'] . '" required = "TRUE">
			Company <input type="text" name="company" value = "' . $row['company'] . '">
			Genre <input type="text" name="genre" value = "' . $row['genre'] . '">
			Platform <input type="text" name="platform" value = "' . $row['platform'] . '" required = "TRUE">
			Age Rating <input type="text" name="ageRating" value = "' . $row['ageRating'] . '">
			Year Released <input type="number" name="yearReleased" value = "' . $row['yearReleased'] . '" step = "1" min = "1900" max = "2199"> 
			Price <input type="text" name="price" value = "' . $row['price'] . '" min = "0.00" step = ".01" max = "200.00">
			Game Rating <input type="text" name="gameRating" value = "' . $row['gameRating'] . '" min = "0.0" max = "10.0" step = ".1" >
			<input type = "hidden" name = "oldTitle" value = "' . $oldTitle . '">
			<input type = "hidden" name = "oldPlatform" value = "' . $oldPlatform . '">
			<input type="submit" name = "updateConfirmed" value="Update">
		</form>';
				$result->close();
		}

  $db_server->close();
  
  function get_post($db_server, $var)
  {
    return $db_server->real_escape_string($_POST[$var]);
  }
	?>
    </body>
</html>