<?php
	require_once('../templates/header.php');
            class Videogame
            {
                public $title, $company, $genre, $platform;
                public $ageRating, $price, $gameRating;
                public $yearReleased;
        
                public function __construct($title, $company, $genre, $platform, $ageRating, $yearReleased, $price, $gameRating)
                {
                    $this->title = $title;
                    $this->company = $company;
                    $this->genre = $genre;
                    $this->platform = $platform;
                    $this->ageRating = $ageRating;
                    $this->yearReleased = $yearReleased;
					$this->price = $price;
                    $this->gameRating = $gameRating;
                }
            }

            $fh = fopen("../misc/gameInput.txt", 'r') or die("File does not exist or you lack permission to open it");
            $fo = fopen("../misc/hw02out.txt", 'w') or die ("failed to create out file");

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
					
            for ($j=0; $j<21;++$j)
            {
                $line=fgets($fh);
                echo'<div class="Row">
						<div class="Cell CellNormal">';
                //echo $line .'<br>';
                $temp = explode('_',$line);
                //print_r($temp);
                $object1 = new Videogame ($temp[0],$temp[1],$temp[2],$temp[3],$temp[4], $temp[5], $temp[6], $temp[7]);
                //$object1->first=$temp[0];
                //print_r($object1);
                echo '<p>' . $object1->title . '</p></div><div class="Cell CellNormal"><p>' . $object1->company . '</p></div><div class="Cell CellNormal"><p>' 
				. $object1->genre .'</p></div><div class="Cell CellNormal"><p>' .$object1->platform . '</p></div><div class="Cell CellNormal"><p>' 
				. $object1->ageRating . '</p></div><div class="Cell CellNormal"><p>' . $object1->yearReleased . '</p></div><div class="Cell CellNormal"><p>' 
				. $object1->price . '</p></div><div class="Cell CellNormal"><p>' . $object1->gameRating . '</p></div>';
              
                echo'</div>';//closes the row div
            }

            echo'</div>';//closes the table div

            fclose($fh);
            fclose($fo);
			require_once("../templates/footer.php");
        ?>
