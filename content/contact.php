<?php
	require_once('../templates/header.php');
?>
		<style>
input
{
display:inline-block;
}	

input[type=text], select, textarea 
{
    
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

label {
   width: 200px;
   display: inline-block;
   text-align: right;
   vertical-align:center;
}

#formDiv {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:auto;
}
</style>
		<div id="formDiv" class="container text-center">
			<h1>Contact Form</h1>
			<p>Hello again!  Please feel free to contact me via the form below,
			or by email.  I look foward to hearing from you!</p>
			<form action="" method="post">
				<div class = "FormField">
					<label for="fname">First Name:</label>
					<input type="text" id="fname" name="firstname" placeholder="Your name.." required = "TRUE">
				</div>
				
				<div class = "FormField">
					<label for="lname">First Name:</label>
					<input type="text" id="lname" name="lastname" placeholder="Your last name.." required = "TRUE">
				</div>
				
				<div class = "FormField">
					<label>Email:</label>
					<input type="text" name="email" placeholder="Your email.." required ="TRUE">
				</div>
				
				<div class="FormField">
					<label for="comment" style ="vertical-align:top;">Comment:</label>
					<textarea id="comment" name="comment" placeholder="Write something.."></textarea>
				</div>
				<input type="submit" value="Submit">	
			</form>
		</div>
	<?php require_once('../templates/footer.php');
	