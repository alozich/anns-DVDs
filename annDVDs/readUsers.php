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
		<a href='index.php'><h1>&#128253 Ann's DVD Collection &#128253 </h1></a>
		<h2>Welcome to Ann's DVD Collection! We play movies daily and rotate through a collection of curated DVDs for your enjoyment.</h2>
    </div>
</body>

<div style="margin-top: 200px;">
<?php
// This file will read a file with dated stored using JSON

require('user.php');

@$fp = fopen("users.txt",'rb');
if (!$fp)
{
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}
//var_dump($_POST);

$count=0;
$message = "Email not found.";
while (!feof($fp))
{
    $temp = fgets($fp, 999);
	//echo $temp."<br>";  // testing purposes only ... show me what was just read from the file
	$s1 = new User();
    $s1->fillFromJSON($temp);
	if ($s1->email == ($_POST["email"]))
	{
		if($s1->password == $_POST["password"])
		{
			$message = "Login successful.";
			$_SESSION['firstName'] = $s1->firstName;
			$_SESSION['email'] = $s1->email;
			echo $_SESSION['firstName'];
		}
		else
		{
			$message = "Password does not match email found.";
		}
	}
	
	$all[$count]=$s1;
	$count += 1;
}

echo "<p>".$message."</p>";

fclose($fp);
// FOR TESTING ONLY
/*foreach ($all as $s) {
	echo $s->firstName."  ";
	echo $s->lastName." ";
	echo $s->email."  ";
	echo $s->password."<p>";
}
*/

header("Location: https://compsci04.snc.edu/~loziac/csci322/annDVDs/");
exit;

var_dump($_SESSION);
echo 'session id: '.session_id();
?>
</div>
