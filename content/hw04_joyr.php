<?php
	require_once('../templates/header.php');
			$createOrig = "CREATE DATABASE joyr_cs340;";
			$createOrig_result = $db_server->query($createOrig);
			if(!$createOrig_result)
			{
				//echo "database joyr_cs340 already exists on " . $db_hostname . "<br>";
			}
			
			else
			{
				//echo "database joyr_cs340 created successfully.<br>";
			}
			
			$restoreCmd = "..\\mysql\\bin\\mysql -u $db_username $db_database < ..\\mysql\\bin\\videogames.sql";
			$restoreResult = shell_exec($restoreCmd);
			echo $restoreResult . "<br>";
			
			if($restoreResult)
			{
				echo "videogames restored to $db_username successfully<br>";
			}
			
			$query = "SELECT * FROM joyr_cs340.videogames;";
			$result = $db_server->query($query);
			if (!$result) die ("Database access failed: " . mysqli_error()); 
            
			echo '<div class="Table">
					<div class="Title">
						<p>My Videogames Before Update</p>
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
							<p>AgeRating</p>
						</div>
						<div class="Cell">
							<p>YearReleased</p>
						</div>
						<div class="Cell">
							<p>Price</p>
						</div>
						<div class="Cell">
							<p>GameRating</p>
						</div>
					</div>';//closes the heading div		
			
			$num_rows = mysqli_num_rows($result);
			
           for ($j=0; $j < $num_rows;++$j)
            {
				$result->data_seek($j);
				$row = $result->fetch_assoc();
                echo'<div class="Row">
						<div class="Cell CellNormal">';
				echo '<p>' . $row['title'] . '</p></div><div class = "Cell CellNormal"><p>' . $row['company'] . '</p></div><div class="Cell CellNormal"><p>'
				. $row['genre'] .'</p></div><div class="Cell CellNormal"><p>' . $row['platform'] . '</p></div><div class="Cell CellNormal"><p>' . $row['ageRating']
				. '</p></div><div class="Cell CellNormal"><p>' . $row['yearReleased'] . '</p></div><div class="Cell CellNormal"><p>' . $row['price'] 
				. '</p></div><div class="Cell CellNormal"><p>' . $row['gameRating'] . '</p></div>';
                
                echo'</div>';//closes the row div
            }

            echo'</div>';//closes the table div
           
 			$createBackup = "CREATE DATABASE hw04bk;";
			$createBK_result = $db_server->query($createBackup);
			if(!$createBK_result)
			{
				echo "database hw04bk already exists on " . $db_hostname . "<br>";
			}
			
			else
			{
				echo "database hw04bk created successfully.<br>";
			}
			
			$dropBK = "DROP TABLE IF EXISTS hw04bk.videogames;";
			$db_server->query($dropBK);
		
			$createTable = "CREATE TABLE hw04bk.videogames
							(
								title varchar(50), 
								company varchar(50), 
								genre varchar(30),
								platform varchar(30),
								ageRating char(4),
								yearReleased year(4),
								price dec(5,2),
								gameRating dec(5,2),
								PRIMARY KEY(title, platform)
							) ENGINE MyISAM;";
			$createTB_result = $db_server->query($createTable);
			if($createTB_result)
			{
				echo "table created successful<br>";
			}
				
			else
			{
				echo $createTB_result . "<br>";
			}	
				
			$insertCopy = "insert into hw04bk.videogames select * from joyr_cs340.videogames;";
			$result = $db_server->query($insertCopy);
			if($result)
			{
				echo "copy successful<br>";
			}
			
			$dropTable = "drop table joyr_cs340.videogames;";
			$dropTB_result = $db_server->query($dropTable);
				
			if($dropTB_result)
				echo "deleted videogames from joyr_cs340 successfully<br>";
				
			$newInsert1 ="insert into hw04bk.videogames values('Destiny','Bungie Studios','1st person shooter','Playstation 4','T',
				2014,60.00,8.1);";
			$db_server->query($newInsert1);
				
			$newInsert2 ="insert into hw04bk.videogames values('Far Cry 4','Ubisoft','1st person shooter','Playstation 4','T',
				2014,60.00,9.0);";
			$db_server->query($newInsert2);
				
			$newInsert3 ="insert into hw04bk.videogames values('Splinter Cell Blacklist','Ubisoft','3rd person shooter','Playstation 3','M',
				2013,40.00,8.7);";
			$db_server->query($newInsert3);
				
			$newInsert4 ="insert into hw04bk.videogames values('The Crew','Ubisoft','racing','Playstation 4','T',
				2014,60.00,7.5);";
			$db_server->query($newInsert4);
				
			$newInsert5 ="insert into hw04bk.videogames values('Call of Duty Advanced Warfare','Activision','1st person shooter',
				'Playstation 4','T',2014,60.00,7.7);";	
			$db_server->query($newInsert5);
				
			echo "all inserts successful<br>";
			
			$recreateTable = "CREATE TABLE joyr_cs340.videogames
							(
								title varchar(50), 
								company varchar(50), 
								genre varchar(30),
								platform varchar(30),
								ageRating char(4),
								yearReleased year(4),
								price dec(5,2),
								gameRating dec(5,2),
								PRIMARY KEY(title, platform)
							) ENGINE MyISAM;";
			$recreateTB_result = $db_server->query($recreateTable);
			if($recreateTB_result)
			{
				echo "table videogames recreated successfully in joyr_cs340<br>";
			}
				
			$update = "insert into joyr_cs340.videogames select * from hw04bk.videogames;";
			$updateResult = $db_server->query($update);
			
			if($updateResult)
			{
				echo "joyr_cs340 videogames table updated successful<br>";
			}
			
				$query = "SELECT * FROM joyr_cs340.videogames;";
				$result = $db_server->query($query);
				if (!$result) die ("Database access failed: " . mysqli_error()); 
            
			echo '<div class="Table">
					<div class="Title">
						<p>My Videogames After Update</p>
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
							<p>AgeRating</p>
						</div>
						<div class="Cell">
							<p>YearReleased</p>
						</div>
						<div class="Cell">
							<p>Price</p>
						</div>
						<div class="Cell">
							<p>GameRating</p>
						</div>
					</div>';//closes the heading div		
			
			$num_rows = mysqli_num_rows($result);
			
           for ($j=0; $j < $num_rows;++$j)
            {
				$result->data_seek($j);
				$row = $result->fetch_assoc();
                echo'<div class="Row">
						<div class="Cell CellNormal">';
				echo '<p>' . $row['title'] . '</p></div><div class = "Cell CellNormal"><p>' . $row['company'] . '</p></div><div class="Cell CellNormal"><p>'
				. $row['genre'] .'</p></div><div class="Cell CellNormal"><p>' . $row['platform'] . '</p></div><div class="Cell CellNormal"><p>' . $row['ageRating']
				. '</p></div><div class="Cell CellNormal"><p>' . $row['yearReleased'] . '</p></div><div class="Cell CellNormal"><p>' . $row['price'] 
				. '</p></div><div class="Cell CellNormal"><p>' . $row['gameRating'] . '</p></div>';
                
                echo'</div>';//closes the row div
            }
            echo'</div>';//closes the table div 
			require_once("../templates/footer.php");
        ?>
