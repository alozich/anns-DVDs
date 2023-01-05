<?php
	session_start();
?>

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
</body>
</html>


<?php
// This file will read a file with dated stored using JSON
require('seatingChart.php');
$movie = $_GET["movie"];
$seatFile = $_GET["seatFile"];

@$fp = fopen($seatFile,'rb');
if (!$fp)
{
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}
// Only one seating chart per file ... no loop needed 
    $temp = fgets($fp, 3000);
	//echo $temp."<br>";  // testing purposes only ... show me what was just read from the file
	$s1 = new SeatingChart();
    $s1->fillFromJSON($temp);  //in file seatChart.php
 
fclose($fp);
// show what we got!

$letter = $s1->seats[0]->table; //grab the first row
echo '<ul>'; //start a new row
	foreach ($s1->seats as $x)
	{
		if($letter != $x->table)
		{
			echo '</ul>';
			$letter = $x->table;
			echo '<ul>';
		}
		echo '<li>';
		
		echo '<div class="square';
		if($x->guest == "none")
			echo ' available"';
		else if($x->guest == $_SESSION['firstName'])
			echo ' mine"';
		else
			echo ' occupied"';
		echo '>'.$x->table.$x->seatNumber.'</div>';
		echo '</li>';
	}
echo '</ul>';	
echo "<p>";

?>

<ul>
	<li>
		<label for="available">
			<div class="square available example" text-align="center"></div>
		</label>
		<div name="available">Available</div>
	</li>
	<li>
		<label for="occupied">
			<div class="square occupied example" display="inline-block"></div>
		</label>
		<div name="occupied">Occupied</div>
	</li>
	<li>
		<label for="mine">
			<div class="square mine example" display="inline-block"></div>
		</label>
		<div name="mine">Selected</div>
	</li>
</ul>

<p id="seatCounter">Seats Selected: 0</p>
<p id="seatsselected">Seats Selected: </p>

<form style="display:flex; justify-content: center;" action="editSeatingChart.php" method="POST">
	<input type="hidden" id="seatFile" name="seatFile" value="
	<?php echo $_GET["seatFile"]; ?>
	">
	<input type="hidden" id="seatsToFile" name="seatsToFile" value="">
	<input type="hidden" id="seatsToRemove" name="seatsToRemove" value="">
	<input type="submit">
</form>

<script type = "text/javascript" src="movieSelection.js"></script>


