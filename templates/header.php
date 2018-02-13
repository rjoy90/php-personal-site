<!DOCTYPE html>
<html>
    <head>
        <title>
            Ryan Joy's Videogames Collection
        </title>
		 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="../css/layout.css">
     </head>

    <body>
		<div id ="MyName">
			<h1>
			Ryan Joy CS340-1 <?php echo date("m/d/Y", time());?>
			</h1>
		</div>
		<?php
			require_once '../content/login.php';
			$db_server = new mysqli($db_hostname, $db_username, $db_password, $db_database);  
		?>
		<nav>
			<ul>
				<li><a href="../content/home.php">Home</a></li>
				<li>
					<a href = "#">Programming Examples <span class = "caret"></span></a>
					<div>
						<ul>
							<li><a href = "../content/java_examples.php">Java</a></li>
							<li><a href = "../content/hw01_joyr.php">CS340 - Homework 1</a></li>
							<li><a href = "../content/hw02_joyr.php">CS340 - Homework 2</a></li>
							<li><a href = "#">CS340 - HW03 + Screens<span class = "caret"></span></a>
								<div>
									<ul>
										<li><a href = "../content/hw03_joyr.php">CS340 - Homework 3</a></li>
										<li><a target="_blank" href = "../images/hw03 backup and restore.png">CS340 - Backup and Restore</a></li>
									</ul>
								</div>
							<li><a href = "#">CS340 - HW04 + Screens<span class = "caret"></span></a>
								<div>
									<ul>
										<li><a href = "../content/hw04_joyr.php">CS340 - Homework 4</a></li>
										<li><a target="_blank" href = "../images/hw04 before.png">CS340 - HW04 before update</a></li>
										<li><a target="_blank" href = "../images/hw04 after.png">CS340 - HW04 after update</a></li>
									</ul>
								</div>
							<li><a href = "../content/hw05_joyr.php">CS340 - Homework 5</a></li>
							<li><a href = "../content/hw07_joyr.php">CS340 - Homework 7</a></li>
						</ul>
					</div>
				<li><a href="../content/about.php">About</a></li>
				<li><a href="../content/academics.php">Academics</a></li>
				<li><a href="../content/recognitions.php">Recognitions</a></li>
				<!--<li><a href="../content/contact.php">Contact</a></li>-->	
			</ul>
		</nav>
		
		<style>
		h2
		{	
			text-decoration: underline;
		}
		</style>
		<script src="../js/currentPage.js"></script>
		<div id ="MainContent">
			<a style="margin-bottom:20px;" href="../misc/workready - resume.docx" class="btn btn-info btn-lg btn-block" 
			role ="button" download>Click Me For Resume</a>