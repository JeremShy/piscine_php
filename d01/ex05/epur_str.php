#!/usr/bin/php
<?php
	if ($argc != 2)
		exit();
	$array = explode(' ', $argv[1]);
	$espace = TRUE;
	foreach ($array as $val)
	{
		if (!empty($val))
		{
			if ($espace == FALSE)
				echo " ";
			echo $val;
			$espace = FALSE;
		}
	}
	echo "\n";
?>
