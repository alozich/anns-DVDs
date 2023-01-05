<?php
// one.php ... creates an object via assignment and 
// and encodes as JSON, and writes to students.txt
require('seatingChart.php');
$eventTitle = "greatestShow1225.txt";
$fp = fopen("/home/mcvebm/public_html/csci322/forClientServer/".$eventTitle, 'wb');
if (!$fp) { echo "<b> could not open file<p>"; exit; }

$s = new SeatingChart();
$s->name = "The Greatest Show on Earth";
$s->seats = array();
$i = 0;
for ($t = 'A'; $t <= 'D'; $t++)
{
	for ($n = 1; $n <=6; $n++) {
		//$seats[$i] = new Seat();
	   // $seats[$i]->table = $t;
		//$seats[$i]->seatNumber = $n;
		//$seats[$i]->isOpen = "none";
		$x = new Seat();
		$x->table = $t;
		$x->seatNumber = $n;
	 	if ($t=='B' && $n == 3)		{
	 		$x->guest = "Ellie";
	 	}
	 	else{
			$x->guest = "none";
	 	}
		//$i++;
		$s->seats[] = $x;
	}
}

$json = json_encode($s);
fwrite ($fp, $json, strlen($json));
fwrite($fp, "\n", 1);
// echo $json;

fclose($fp);

?>
