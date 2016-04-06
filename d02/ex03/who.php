#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");
$str = file_get_contents("/var/run/utmpx");
$str = substr($str, 1256);
$array = array();
$i = 0;
while ($str) {
	$array[$i] = unpack("A256user/A4id/A32tty/ipid_t/ientry/I2time/a256host/I16rest", $str);
	$str = substr($str, 628);
	$i++;
}

sort ($array);
$i = 0;
while (isset($array[$i]))
{
	if ($array[$i]['entry'] == 7)
	{
		echo $array[$i]['user']."   ";
		echo $array[$i]['tty']."  ";
		echo date("M  j H:i", $array[$i]['time1'])."\n";
	}
		$i++;
}

?>
