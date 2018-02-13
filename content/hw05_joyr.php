<?php
	require_once('../templates/header.php');
			$db_server = new mysqli($db_hostname, $db_username, $db_password, $db_database);
			
			if ($db_server->connect_error) die($db_server->connect_error);

			if (isset($_POST['delete']) && isset($_POST['title']) && isset($_POST['platform']))
			{
				$title   = get_post($db_server, 'title');
				$platform = get_post($db_server, 'platform');
				$query  = "DELETE FROM videogames WHERE title='$title' AND platform='$platform';";
				$result = $db_server->query($query);
				if (!$result) echo "DELETE failed: $query<br>" .
				$db_server->error . "<br><br>";
			}
									  						
			if (isset($_POST['title'])   &&
			isset($_POST['company'])    &&
			isset($_POST['genre']) &&
			isset($_POST['platform'])     &&
			isset($_POST['ageRating'])     &&
			isset($_POST['yearReleased'])     &&
			isset($_POST['price'])     &&
			isset($_POST['gameRating']))
			{
				$title   = get_post($db_server, 'title');
				$company    = get_post($db_server, 'company');
				$genre = get_post($db_server, 'genre');
				$platform     = get_post($db_server, 'platform');
				$ageRating     = get_post($db_server, 'ageRating');
				$yearReleased     = get_post($db_server, 'yearReleased');
				$price     = get_post($db_server, 'price');
				$gameRating     = get_post($db_server, 'gameRating');
				$query    = "INSERT INTO videogames VALUES" .
				"('$title', '$company', '$genre', '$platform', '$ageRating', '$yearReleased', '$price', '$gameRating');";
				$result   = $db_server->query($query);
				if (!$result) 
					echo "INSERT failed: $query<br>" . $db_server->error . "<br><br>";
			}
			
			echo <<<_END
					<form action="hw05_joyr.php" method="post"><pre>
					Title <input type="text" name="title" required = "TRUE">
					Company <input type="text" name="company">
					Genre <input type="text" name="genre">
					Platform <input type="text" name="platform" required = "TRUE">
					Age Rating <input type="text" name="ageRating">
					Year Released <input type="text" name="yearReleased" step = "1" min = "1900" max = "2199">
					Price <input type="text" name="price" min = "0.00" step = ".01" max = "200.00" >
					Game Rating <input type="text" name="gameRating" min = "0.0" max = "10.0" step = ".1">
					<input type="submit" value="ADD RECORD">
					</pre></form>
_END;

			$query = "SELECT * FROM videogames;";
			$result = $db_server->query($query);
			if (!$result) die ("Database access failed: " . mysqli_error()); 
			
			$num_rows = mysqli_num_rows($result);
			for ($j = 0 ; $j < $num_rows; ++$j)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_NUM);
				//echo "made it here<br>";

				echo <<<_END
						<pre>
							Title $row[0]
							Company $row[1]
							Genre $row[2]
							Platform $row[3]
							Age Rating $row[4]
							Year Released $row[5]
							Price $row[6]
							Game Rating $row[7]
						</pre>
						<form action = "hw05_joyr.php" method = "post">
							<input type="hidden" name="delete" value="yes">
							<input type="hidden" name="title" value="$row[0]">
							<input type="hidden" name="platform" value="$row[3]">
							<input type="submit" value="DELETE RECORD">
						</form>
_END;
			}
  
  $result->close();
  $db_server->close();
  
  function get_post($db_server, $var)
  {
    return $db_server->real_escape_string($_POST[$var]);
  }
  
  require_once("../templates/footer.php");
	?>
