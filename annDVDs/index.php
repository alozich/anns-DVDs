<?php 
	session_start();
?>
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
			<?php
				if(!empty($_SESSION['firstName']))
				{
					$name = $_SESSION['firstName'];
					echo '<p class="greeting">Hi '.$name.'!</p>';
					echo '<a href=\'signout.php\'><button>Sign Out</button></a>';
					echo '<a href=\'profile.php\'><button>Profile</button></a>';
				}
				else
				{
					echo '<a href=\'login.php\'><button>Login</button></a>
						<a href=\'signup.php\'><button>Sign Up</button></a>';
				}
			?>
			
		</div>
		<h1>&#128253 Ann's DVD Collection &#128253</h1>
		<h2>Welcome to Ann's DVD Collection! We play movies daily and rotate through a collection of curated DVDs for your enjoyment.</h2>
    </div>
	
<?php
	include 'readEvents.php';
?>
</body>
</html>

