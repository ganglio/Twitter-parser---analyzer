#!/usr/bin/php
<?php

function head($title="Test KML File",$descr="Simple Description") {
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<kml xmlns=\"http://earth.google.com/kml/2.0\">
<Document>
	<name>$title</name>
	<description>$descr</description>\n";
}
 
function placemark($lon=0, $lat=0,$name="P",$descr="P") { 
echo "<Placemark>
	<name>$name</name>
	<description>$descr</description>
	<Point>
		<coordinates>$lat,$lon</coordinates>
	</Point>
</Placemark>\n";
}

function footer() {
echo "</Document>
</kml>";
}

head();
$data=file("data.csv");
foreach ($data as $loc) {
	$loc=explode(" ",trim($loc));
	placemark($loc[0],$loc[1],"","");
}
footer();
?>
