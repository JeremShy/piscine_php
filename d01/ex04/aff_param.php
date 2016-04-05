#!/usr/bin/php
<?php
if ($argc == 1)
	exit();
$i = 0;
foreach ($argv as $val)
{
	if ($i > 0)
		echo $val."\n";
	$i++;
}
?>
