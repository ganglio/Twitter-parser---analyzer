#!/usr/bin/php
<?php

require_once("lib/Phirehose.php");

class MyStream extends Phirehose {
	private $my_count;
	
	public function enqueueStatus($status) {
		$data=json_decode($status, TRUE);
		if (is_array($data) && isset($data['geo']["coordinates"])) {
			echo $data["geo"]["coordinates"][0]." ".$data["geo"]["coordinates"][1]." ".strtotime($data["created_at"])." ".$data["user"]["followers_count"]."\n";
			$this->my_count++;
			//if ($this->my_count==1000) die();
		}
	}
}

$stream = new MyStream('<username>', '<password>', Phirehose::METHOD_FILTER);
$stream->setLocationsByCircle(array(
	//array(14.2, 40.966667, 25),   // Aversa 10km radius
	array(-0.1262, 51.5176, 12),   // London 10km radius
));
$stream->consume();

?>
