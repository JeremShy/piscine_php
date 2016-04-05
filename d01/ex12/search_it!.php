#!/usr/bin/php
<?php

if ($argc == 1)
	exit();
$espace = FALSE;
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
			{
				if ($espace)
					echo " ";
				echo $array[1];
				$espace = TRUE;
			}
		}
	}
}
echo "\n";
?>
