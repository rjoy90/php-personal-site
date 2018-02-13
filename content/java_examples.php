<?php require_once('../templates/header.php');?>
			<div class="container text-center">
				<h1>Java Examples</h1>
			</div>
		<div style="overflow:hidden;">
			<h2>FreeCell - A remake of a card game</h2>
			<p>
			The purpose of the project was to help us learn as much
		as we could about the swing graphics libraries.  It was 
		fun and challenging getting the graphics to work and look 
		how I wanted them to.  The program shuffles the deck and uses
		stacks to hold the columns and the results piles (top-right).
		Once the user clicks out of the window, they are thanked for playing (in the console).</p>
		<button type="button" class="btn btn-success btn-block" onclick="showRules()">Click Me for general rules of FreeCell.</button>
		<p id ="rules" style ="display:none">The gameplay of FreeCell is very similar to Solitaire.
		The objective is to build the results piles with stacks of each suit from
		Ace to King.  Cards can be moved to different columns, as long as 
		they are in a valid sequence, which is rotating colors and in 
		descending order.  If too many cards are attempted to be moved,
		or the sequence would become invalid, they will be returned to their original column.  
		The top-left corner free spaces can hold any one card at a time.</p>
		
		<p>I developed this project following the Model-View-Presenter
		pattern as a guide.  Click the demo below to see in full size.
		(note that the multi-colors were for debugging purposes):</p>
			<a target ="_blank" href="../images/FreeCellDemo.PNG">
				<img border="0" src="../images/FreeCellDemo.PNG" title ="FreeCell Demo" alt="FreeCell Demo" 
				width="400" height="300">
			</a>
			<script>
				function showRules()
				{
					var rulesParagraph = document.getElementById("rules");
					rulesParagraph.style.display='block';
				}
			</script>
			<h2>Maze generator - an upgraded book example</h2>
				<p>For this project, one of my classmates recommended that I add more
				features to a book example about recursion.  The goal in the example 
				was for the program to navigate a square maze made up of 0s and 1s.
				(it is only one set size and hard-coded maze).
				A 0 represents walls and a 1 represents pathways.  It must start from
				the top-left corner and work its way to the bottom-right corner by going
				up, down, left, or right 1 cell at a time.
				Once solved, the program labels parts of the found solution path with 7s.<p>
				<p>To extend off of this, I changed the program around to generate mazes of
				different sizes, in the 10X10 to 15X15 range.  It also has teleporters
				(represented by a 2), villains (represented by 4s), and allies (represented by 5s).
				However, for debugging purposes, the allies and villains can only be seen when the
				program is testing the maze, since there is the possibility of it failing to solve a maze.
				It keeps a track of where it has already tried (marked by a 3), and if it reaches
				a dead-end, it will mark that spot with a 9.  Also, an X is placed to the right
				of the AI's location.  The following snapshot is a sample maze (feel free to click for full size):</p>
				<a target ="_blank" href="../images/MazeGen_sampleMaze.PNG">
				<img border="0" src="../images/MazeGen_sampleMaze.PNG" title ="Sample Maze" alt="Sample Maze" 
				width="400" height="300">
				</a>
				<p>Once a maze has been successfully navigated by the program, the user sees it and is prompted to play.
				During each move they are reminded of the maze layout and prompted for a direction.  If an invalid direction
				is chosen, the program will show them the valid directions and ask again.  The following is the user making a move
				(Note the 3 for their current location, and feel free to click for full size):
				</p>
				<a target ="_blank" href="../images/MazeGen_userInMaze.PNG">
				<img border="0" src="../images/MazeGen_userInMaze.PNG" title ="User in maze" alt="User in maze" 
				width="400" height="300">
				</a>
				<p>The user also has the option to not play, and will then be given the option to
				view the solution (found by the AI), and then if they want to see a new maze.
				If the user says no to this, they are thanked for playing.</p>
				
		</div>
		
<?php require_once('../templates/footer.php');?>
