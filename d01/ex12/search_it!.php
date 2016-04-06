#!/usr/bin/php
<?php

if ($argc == 1 || $argc == 2)
	exit();
foreach ($argv as $i => $val)
{
	if ($i == 0);
	else if ($i == 1)
		$to_search = $val;
	else {
		if (strstr($val, ":") != FALSE)
		{
			$array = explode(":", $val);
			if ($array[0] == $to_search)
				$ans = $array[1];
		}
	}
}
if (isset($ans))
	echo $ans."\n";
?>
