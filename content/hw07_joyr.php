<?php
	require_once('../templates/header.php');
			$db_server = new mysqli($db_hostname, $db_username, $db_password, $db_database);
			
			if ($db_server->connect_error) die($db_server->connect_error);

			//receives update info from hw07_update_joyr.php form
			if(isset($_POST['updateConfirmed']))
			{
				$oldTitle   = get_post($db_server, 'oldTitle');
				$oldPlatform  = get_post($db_server, 'oldPlatform');
				$title   = get_post($db_server, 'title');
				$company    = get_post($db_server, 'company');
				$genre = get_post($db_server, 'genre');
				$platform     = get_post($db_server, 'platform');
				$ageRating     = get_post($db_server, 'ageRating');
				$yearReleased     = get_post($db_server, 'yearReleased');
				$price     = get_post($db_server, 'price');
				$gameRating     = get_post($db_server, 'gameRating');
				$updateRecord  = "UPDATE videogames set title = '$title', company = '$company', genre = '$genre', platform = '$platform'," 
				. " ageRating = '$ageRating', yearReleased = '$yearReleased', price = '$price', gameRating = '$gameRating' where "
				. "title = '$oldTitle' and platform = '$oldPlatform';";
				
				echo $updateRecord . "<br>";
				$updateRecord_result = $db_server->query($updateRecord);
				if($updateRecord_result)
				{
					echo "update successful<br>";
				}				
			}
			
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
			isset($_POST['gameRating']) && isset($_POST['add']))
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
			
			$filter = 1;
			if(isset($_POST['filter']) && (isset($_POST['company']) || isset($_POST['platform'])))
			{
				$compFilter = '';
				$platformFilter = '';
				if(isset($_POST['company']) && isset($_POST['platform'])&& get_post($db_server, 'company') != '' && get_post($db_server, 'platform') != '')
				{
						$compFilter = "company = '" . get_post($db_server, 'company') . "'";
						$platformFilter = "platform = '" . get_post($db_server, 'platform') . "'";
						$filter = $compFilter . ' and ' . $platformFilter;
				}
				
				else if(isset($_POST['platform']) && get_post($db_server, 'platform') != '')
				{
					$platformFilter = "platform = '" . get_post($db_server, 'platform') . "'";
					$filter = $platformFilter;
				}
				
				else if(get_post($db_server, 'company') != '')
				{
					$compFilter = "company = '" . get_post($db_server, 'company') . "'";
					$filter = $compFilter;
				}
			}
			
		?>
	
		<form action="hw07_joyr.php" method="post">
			<label>Title</label>
			<input type="text" name="title" required = "TRUE">
			<label>Company</label>
			<input type="text" name="company">
			<label>Genre</label>
			<input type="text" name="genre">
			<label>Platform</label>
			<input type="text" name="platform" required = "TRUE">
			<br>
			<label>Age Rating</label>
			<input type="text" name="ageRating">
			<label>Year Released</label>
			<input type="text" name="yearReleased" step = "1" min = "1900" max = "2199">
			<label>Price</label>
			<input type="text" name="price" min = "0.00" step = ".01" max = "200.00">
			<label>Game Rating</label>
			<input type="text" name="gameRating" min = "0.0" max = "10.0" step = ".1">
			<input type = "hidden" name = "add" value = "yes">
			<input type = "submit" value="ADD RECORD">
		</form>
	
		<form action = "hw07_joyr.php" method = "post">
			Company <input type="text" name="company" >
			Platform <input type="text" name ="platform">
			<input type = "hidden" name = "filter" value = "yes">
			<input type = "submit" value = "FILTER LIST">
		</form>

		<?php
			$query = "SELECT * FROM videogames where $filter;";
			$result = mysqli_query($db_server, $query);
			if (!$result) die ("Database access failed: " . mysqli_error()); 
		?>
		<!--table formatting-->
		<div class="Table">
			<div class="Title">
				<p>My Videogames</p>
			</div>
			<div class="Heading">
				<div class="Cell">
					<p>Title</p>
				</div>
				<div class="Cell">
					<p>Company</p>
				</div>
				<div class="Cell">
					<p>Genre</p>
				</div>
				<div class="Cell">
					<p>Platform</p>
				</div>
				<div class="Cell">
					<p>Age</p>
				</div>
				<div class="Cell">
					<p>Release Year</p>
				</div>
				<div class="Cell">
					<p>Price</p>
				</div>
				<div class="Cell">
					<p>Rating</p>
				</div>
			</div><!--End of Heading div-->		
			
			<?php
				$num_rows = mysqli_num_rows($result);
				for ($j = 0 ; $j < $num_rows; ++$j)
				{
					mysqli_data_seek($result, $j);
					$row = mysqli_fetch_assoc($result);
					//echo "made it here<br>";
			?>
			<div class="Row">
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['title'];?>
					</p>
				</div>
				<div class = "Cell CellNormal">
					<p>
					<?php echo $row['company'];?>
					</p>
				</div>
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['genre'];?>
					</p>
				</div>
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['platform'];?>
					</p>
				</div>
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['ageRating'];?>
					</p>
				</div>
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['yearReleased'];?>
					</p>
				</div>
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['price'];?>
					</p>
				</div>
				<div class="Cell CellNormal">
					<p>
					<?php echo $row['gameRating'];?>
					</p>
				</div><!--end of row data-->
				
				<!--delete button and update buttons for the form-->
				<div class = "Cell CellFormButton"> <!--delete button--> 
				<!--title and platform will be submitted for fetching data (since games are released across multiple platforms usually)-->
					<form action = "hw07_joyr.php" method = "post">
						<input type="hidden" name="delete" value="yes">
						<input type="hidden" name="title" value="<?php echo $row['title'];?>">
						<input type="hidden" name="platform" value="<?php echo $row['platform'];?>">
						<input type="submit" value="DELETE RECORD">
					</form>
				</div> <!--end of delete button-->
				
				<div class = "Cell CellFormButton"> <!--update button-->
					<form action = "hw07_update_joyr.php" method = "post">
						<input type="hidden" name="update" value="yes">
						<input type="hidden" name="title" value="<?php echo $row['title'];?>">
						<input type="hidden" name="platform" value="<?php echo $row['platform'];?>">
						<input style="border:none; border-radius:8px; background-color:#008CBA;" type="submit" value="UPDATE RECORD">
					</form>
				</div> <!--end of update button-->
			</div><!--end of row-->
		<?php
			}
		?>
		</div> <!--end of table-->
		<?php
			$result->close();
			$db_server->close();
  
			function get_post($db_server, $var)
			{
				return $db_server->real_escape_string($_POST[$var]);
			}
			require_once("../templates/footer.php");
		?>