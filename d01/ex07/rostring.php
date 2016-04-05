#!/usr/bin/php
<?php

function str_to_array($str, $space = ' ')
{
	$array = explode($space, $str);
	foreach ($array as $i => $var)
	{
		if (empty($var))
			unset($array[$i]);
	}
	return array_values($array);
}

function array_to_str($array)
{
	$espace = TRUE;
	foreach ($array as $i => $val) {
		if ($espace == FALSE)
			$ar = $ar." ";
		$ar = $ar.$val;
		$espace = FALSE;
	}
	return ($ar);
}

if ($argc == 1)
	exit();
$array = str_to_array($argv[1]);
$array[] = $array[0];
unset($array[0]);
echo array_to_str(array_values($array))."\n";
?>
