<?php
session_start();
var_dump($_SESSION);
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
			<a href='login.php'><button>Login</button></a>
		<button>Sign Up</button>
		</div>
		<a href="https://compsci04.snc.edu/~loziac/csci322/annDVDs/"><h1>&#128253 Ann's DVD Collection &#128253 </h1></a>
		<h2>Welcome to Ann's DVD Collection! We play movies daily and rotate through a collection of curated DVDs for your enjoyment.</h2>
    </div>
</body>
<div style="margin-top:200px;">
<?php
if(!isset($_SESSION['firstName']))
{
	header("Location: https://compsci04.snc.edu/~loziac/csci322/annDVDs/login.php");
	exit;
}
// one.php ... creates an object via assignment and 
// and encodes as JSON, and writes to students.txt
require('seatingChart.php');
//$seatFile = $_POST["seatFile"];
if(is_null($_POST["seatFile"]))
{
	echo "seatFile is empty";
	exit;
}

var_dump($_POST);
$fileName = trim($_POST["seatFile"]);

$fp = fopen($fileName, "r+"); //need trim(), for some reason has spaces before and after fileName
if (!$fp) { echo "<b> could not open file<p>"; exit; }

$temp = fgets($fp);
$data = json_decode($temp, true);

$seatsToFile = $_POST["seatsToFile"];
$seatsToRemove = $_POST["seatsToRemove"];

foreach($data['seats'] as $key => $entry) {
	$seat = $entry['table'].$entry['seatNumber'];
	echo "<br>";
	
	if(empty($seat) || strpos($seatsToFile, $seat) !== false) //if seat matches in seatsToFile
	{
		
		echo "<b>";
		echo $seat." ".$entry['guest'];
		echo "</b>";
		$data['seats'][$key]['guest'] = $_SESSION['firstName'];
	}
	else if(strpos($seatsToRemove, $seat) !== false) //if seat matches in seatsToRemove
	{
		echo "<b>";
		echo $seat." ".$entry['guest'];
		echo "</b>";
		$data['seats'][$key]['guest'] = 'none';
	}
	else {
		echo $seat." ".$entry['guest'];
	}
}

$newJsonString = json_encode($data);
echo $newJsonString;
file_put_contents($fileName, $newJsonString);

 fclose($fp);
 
 header("Location: https://compsci04.snc.edu/~loziac/csci322/annDVDs/profile.php");
 exit;
 ?>
 </div>