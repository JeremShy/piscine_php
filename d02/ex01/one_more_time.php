#!/usr/bin/php
<?php

if ($argc == 1)
	exit();
$array = array();
if (!preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([1-9]|[1-2][0-9]|3[01]) ([Jj]anvier|[Ff][ée]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[ûu]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre) ([1-2][0-9]{3}) (0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $argv[1], $array))
	{
		echo "Wrong Format\n";
		exit();
	}

if (preg_match("/[Aa]vril|[Jj]uin|[Ss]eptembre|[Nn]ovembre/", $array[3]))
{
	if (intval($array[2]) == 31)
	{
		echo "Wrong Format\n";
		exit();
	}
}

if (preg_match("/[Ff][eé]vrier/", $array[3]))
{
	if (intval($array[4]) % 4 == 0)
	{
		if (intval($array[2]) > 29)
		{
			echo "Wrong Format\n";
			exit();
		}
	}
	else
	{
		if (intval($array[2] > 28))
		{
			echo "Wrong Format\n";
			exit();
		}
	}
}

$str = $array[2];
$m = $array[3];

$add = strtolower(substr($m, 0, 3));

if (preg_match("/[Ff][eé]vrier/", $m))
	$add = "feb";
else if (preg_match("/[Aa]vril/", $m))
	$add = "apr";
else if (preg_match("/[Mm]ai/", $m))
	$add = "may";
else if (preg_match("/[Jj]uin/", $m))
	$add = "jun";
else if (preg_match("/[Jj]uillet/", $m))
	$add = "jul";
else if (preg_match("/[Aa]o[ûu]t/", $m))
	$add = "aug";

$str = $str."/".$add."/".$array[4].":";
$str = $str.$array[5].":".$array[6].":".$array[7]." GMT+01:00";
date_default_timezone_set('Europe/Paris');
if ((	$timestamp = strtotime($str)) === false)
{
	echo "Wrong Format\n";
	exit();
}
else
	echo "$timestamp\n";
?>
