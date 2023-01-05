<!DOCTYPE html>
<html>
<head>
    <title>Ann's DVD Collection</title>
	
    <link href="resources/index.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
	
</head>
<body>
    <div class="header">
		<div class="loginsignup">
			<a href='login.php'><button>Login</button></a>
		<button>Sign Up</button>
		</div>
		<h1>&#128253 Ann's DVD Collection &#128253 </h1>
		<h2>Welcome to Ann's DVD Collection! We play movies daily and rotate through a collection of curated DVDs for your enjoyment.</h2>
    </div>
	
	<div style="margin-top: 200px;">
		<form style="display:flex; justify-content: space-evenly; align-items:center;"onSubmit="return submitMe(this)" action="makeUsers.php" method="POST">
			<label for="firstName">First Name</label>
			<input type="text" name="firstName" id="firstName"></input>
			
			<label for="lastName">Last Name</label>
			<input type="text" name="lastName" id="lastName"></input>
			
			<label for="email">Email</label>
			<input type="text" name="email" id="email" class="existEmail"></input>
			
			<label for="password">Password</label>
			<input type="password" name="password" id="password"></input>
			
			<input type="submit"></input>
		</form>
	</div>
	
	<p>Only people with SNC emails can sign up.</p>
	<p>Please do not enter a password you normally use!</p>
<script type = "text/javascript" src="loginValidator.js"></script>
</body>
</html>

<?php
	if(!empty($_GET['message']))
	{
		$message = $_GET['message'];
		if($message = 'invalid')
		{
			echo "The email you entered is already taken. 
			Please enter a different email.";
		}
	}
?>

