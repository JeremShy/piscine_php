#!/usr/bin/php
<?php

function is_nbr($a)
{
	$ord = ord($a);
	if ($ord >= ord('0') && $ord <= ord('9'))
		return (TRUE);
	else {
		return (FALSE);
	}
}

function is_op($a)
{
	if ($a == '+' || $a == '-' || $a == '*' || $a == '/' || $a == '%')
		return (TRUE);
	else
		return (FALSE);
}

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}

$i = 0;
$start = -1;
while (isset($argv[1][$i]))
{
	if ($argv[1][$i] == '-' && $start == -1 && !(isset($p1) && !isset($pop)))
		$start = $i;
	else if (is_nbr($argv[1][$i]) && $start == -1)
		$start = $i;
	else if ($argv[1][$i] == ' ' && $start != -1 && !isset($p1))
	{
		$s1 = substr($argv[1], 0, $i);
		if (!is_numeric($s1))
		{
			echo "Syntax Error\n";
			exit();
		}
		$p1 = intval($s1);
		$start = -1;
	}
	else if (is_op($argv[1][$i]))
	{
		if (!isset($p1))
		{
			if ($start != -1)
			{
				$s1 = substr($argv[1], 0, $i);
				if (!is_numeric($s1))
				{
					echo "Syntax Error\n";
					exit();
				}
				$p1 = intval($s1);
				$start = -1;
			}
			else
			{
				echo "Syntax Error\n";
				exit();
			}
		}
		$pop = $argv[1][$i];
	}
	else if ($argv[1][$i] == ' ' && $start != -1 && isset($p1) && !isset($p2))
	{
		$s2 = substr($argv[1], $start, $i - $start);
		if (!is_numeric($s2))
		{
			echo "Syntax Error\n";
			exit();
		}
		$p2 = intval($s2);
	}
	else if ($argv[1][$i] == ' ');
	else if (is_nbr($argv[1][$i]) && (!isset($p1) || !isset($p2)));
	else
	{
		echo "Syntax Error\n";
		exit();
	}
	$i++;
}

if (!isset($p2) && start != -1 && isset($p1))
{
	$s2 = substr($argv[1], $start, $i - $start);
	if (!is_numeric($s2))
	{
		echo "Syntax Error\n";
		exit();
	}
	$p2 = intval($s2);
}

//echo "\p1 : $p1, \pop : $pop, \p2 : $p2 and \start : $start\n";
if (!isset($p1) || !isset($pop) || !isset ($p2))
{
	echo "Syntax Error\n";
	exit();
}

switch (trim($pop))
{
	case "+":
		$result = $p1 + $p2;
		break;
	case "-":
		$result = $p1 - $p2;
		break;
	case "*":
		$result = $p1 * $p2;
		break;
	case "/":
		$result = $p1 / $p2;
		break;
	case "%":
		$result = $p1 % $p2;
		break;
}

echo $result."\n";

?>
