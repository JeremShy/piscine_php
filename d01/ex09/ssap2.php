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

function is_char($a)
{
	$ord = ord($a);
	if (($ord >= ord('A') && $ord <= ord('Z')) || ($ord >= ord('a') && $ord <= ord('z')))
		return (TRUE);
	else {
		return (FALSE);
	}
}

function is_nbr($a)
{
	$ord = ord($a);
	if ($ord >= ord('0') && $ord <= ord('9'))
		return (TRUE);
	else {
		return (FALSE);
	}
}

function compare($a, $b)
{
	$a = strtoupper($a);
	$b = strtoupper($b);
	$i = 0;
	while (isset($a[$i]) && isset($b[$i]) && $a[$i] == $b[$i])
		$i++;
	$val = $a[$i];
	if (is_char($val) || is_char($b[$i]))
	{
		if (is_char($val) && is_char($b[$i]))
			return (ord($val) - ord($b[$i]));
		else if (is_char($val))
			return (-1);
		else
			return (1);
	}
	else if (is_nbr($val) || is_nbr($b[$i]))
	{
		if (is_nbr($val) && is_nbr($b[$i]))
			return ($val - $b[$i]);
		else if (is_nbr($val))
			return (-1);
		else
		return (1);
	}
	else
	return (ord($val) - ord($b[$i]));
}

function ft_split($str)
{
	$array = explode(' ', $str);
	usort($array, compare);
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

/*if (compare($argv[1], $argv[2]) > 0)
echo $argv[1]." est superieur a ".$argv[2].".\n";
else if (compare($argv[1], $argv[2]) < 0)
echo $argv[2]." est superieur a ".$argv[1].".\n";
else
echo "Les deux sont egaux.\n";
*/
?>
