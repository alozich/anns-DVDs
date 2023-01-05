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
				$name = $_SESSION['firstName'];
				echo "<p style=\"width: max-content; display: inline-block;\">Hi $name!</p>";
			?>
			<a href='signout.php'><button>Sign Out</button></a>
		</div>
		<a href="https://compsci04.snc.edu/~loziac/csci322/annDVDs/"><h1>&#128253 Ann's DVD Collection &#128253 </h1></a>
		<h2>Welcome to Ann's DVD Collection! We play movies daily and rotate through a collection of curated DVDs for your enjoyment.</h2>
    </div>
</body>

<div style="margin-top: 200px;"></div>

<h2 style="justify-content:center; display:flex;">My Reservations</h2>
<?php
// This file will read a file with dated stored using JSON

require('event.php');
@$fp = fopen("/home/loziac/public_html/csci322/annDVDs/theEvents.txt",'rb');
if (!$fp)
{
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}

//putting all events from theEvents.txt into array
$count = 0;
while (!feof($fp))
{
    $temp = fgets($fp, 999); //fgets grabs one line
	$s1 = new Event();
    $s1->fillFromJSON($temp);
	$all[$count]=$s1;
	$count += 1;
	$fileName = $s->seatFile;
}
fclose($fp);

//putting all seatingCharts into array
require('seatingChart.php');

?>

<div class="reservations">

<?php
foreach($all as $s)
{
	echo '<div class=\'reservation\'>';
	$fileName = $s->seatFile;
	echo '<br>';
	
	@$sfp = fopen($fileName,'rb');
	if (!$sfp)
	{
		echo "<p>UNABLE TO OPEN FILE<p>";
		exit;
	}
	
	$temp = fgets($sfp, 3000);
	$s1 = new SeatingChart();
	$s1->fillFromJSON($temp);  //in file seatChart.php
	echo '<a style=\'width: 100%;\' href=\'readSeatingChart.php?movie='.$s->title.'&seatFile='.$s->seatFile.'\'><h3>'.$s->title.'</h3></a>';
	foreach($s1->seats as $x)
	{
		if($x->guest == $_SESSION['firstName'])
			echo $x->table.$x->seatNumber.'<br>';
	}
	fclose($sfp);
	echo '</div>';
}



?>

</div>

</html>
