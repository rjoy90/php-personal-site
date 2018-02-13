<?php
	require_once('../templates/header.php');
            $query = "SELECT * FROM videogames";
			$result = $db_server->query($query);
			if (!$result) die ("Database access failed: " . mysqli_error()); 
            
            $fo = fopen("hw03out.txt", 'w') or die ("failed to create out file");

           echo '<div class="Table">
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
				echo '<p>' . $row['title'] . '</p></div><div class = "Cell CellNormal"><p>' . $row['company'] . '</p></div><div class="Cell CellNormal Cell"><p>'
				. $row['genre'] .'</p></div><div class="Cell CellNormal"><p>' . $row['platform'] . '</p></div><div class="Cell CellNormal"><p>' . $row['ageRating']
				. '</p></div><div class="Cell CellNormal"><p>' . $row['yearReleased'] . '</p></div><div class="Cell CellNormal"><p>' . $row['price'] 
				. '</p></div><div class="Cell CellNormal"><p>' . $row['gameRating'] . '</p></div>';
                
                echo'</div>';//closes the row div
            }

            echo'</div>';//closes the table div
           // fclose($fh);
            fclose($fo);
		require_once("templates/footer.php");	
        ?>