<?php
// This file will read a file with dated stored using JSON

require('event.php');
@$fp = fopen("/home/loziac/public_html/csci322/annDVDs/theEvents.txt",'rb');
if (!$fp)
{
	echo "<p>UNABLE TO OPEN FILE<p>";
	exit;
}
$count=0;
while (!feof($fp))
{
    $temp = fgets($fp, 999); //fgets grabs one line
	//echo $temp."<br>";  // testing purposes only ... show me what was just read from the file
	$s1 = new Event();
    $s1->fillFromJSON($temp);
	$all[$count]=$s1;
	$count += 1;
    // echo "from two.php ". $s1->name."<p>";
}
fclose($fp);

?>

<div class="movielist" style="margin-top: 190px;">
<?php
foreach ($all as $s) {
	echo '<a style=\'margin: 40px;\'href=\'readSeatingChart.php?movie='.$s->title.'&seatFile='.$s->seatFile.'\'>';
	echo '
			<div class="movie" onClick="readSeatingChart.php">
				<img src="'.$s->imgFile.'"/>
				<p class="movietitle">'.$s->title.'</p>
				<p>'.$s->theDate.'</p>
				<p>Featuring Tim Curry</p>
			</div>
			</a>'
			;
// FOR TESTING ONLY
	//echo $s->title."  ";
	//echo $s->theDate." ";
	//echo $s->seatFile."<p> ";
	
}
?>
</div>
	
