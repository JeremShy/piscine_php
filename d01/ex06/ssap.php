#!/usr/bin/php
<?php
function epur_array ($tab)
{
	$array = explode(' ', $tab);
	$espace = TRUE;
	foreach ($array as $val)
	{
		if (!empty($val))
		{
			if ($espace == FALSE)
				$ret = $ret." ";
			$ret = $ret.$val;
			$espace = FALSE;
		}
	}
	return ($ret);
}

function ft_split($str)
{
	$array = explode(' ', $str);
	sort($array, 2);
	foreach ($array as $i => $var)
	{
		if (empty($var))
			unset($array[$i]);
	}
	return array_values($array);
}

if ($argc == 1)
	exit();
$espace = TRUE;
foreach ($argv as $i => $val) {
	if ($i > 0)
	{
		if ($espace == FALSE)
			$ar = $ar." ";
		$ar = $ar.epur_array($val);
		$espace = FALSE;
	}
}
foreach (ft_split($ar) as $val) {
	echo $val."\n";
}
?>
