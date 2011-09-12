<?php

$old_error_handler = set_error_handler("pippo");

$file=file("data.csv");

$minx=181;
$maxx=-181;
$miny=91;
$maxy=-91;

foreach ($file as $dd) {
	$row=explode(" ",trim($dd));
	$data[]=$row;
	
	try {
		$minx=($minx>$row[1]?$row[1]:$minx);
		$maxx=($maxx<$row[1]?$row[1]:$maxx);
	
		$miny=($miny>$row[0]?$row[0]:$miny);
		$maxy=($maxy<$row[0]?$row[0]:$maxy);
	} catch (Exception $e) {
		die($dd);
	}
}
echo "$minx $miny $maxx $maxy\n";

function pippo($errno, $errstr, $errfile, $errline) {
	global $dd, $data;
	echo count($data);
	die($dd);
}
?>
