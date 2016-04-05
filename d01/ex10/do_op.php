#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}
$p1 = intval($argv[1]);
$p2 = intval($argv[3]);
switch (trim($argv[2]))
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
	default :
		$result = "";
		break;
}
echo $result."\n";
?>
