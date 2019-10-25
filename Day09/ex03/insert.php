<?php
	$fd = fopen("list.csv", "c+");
	flock($fd, LOCK_SH | LOCK_EX);
	$csv = fgetcsv($fd);
	$file = array($_GET['index'], $_GET['val']);
	file_put_contents("test", $csv);
	fputcsv($fd, $file);
    flock($fd, LOCK_UN);
?>