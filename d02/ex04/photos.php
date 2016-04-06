#!/usr/bin/php
<?php

function ft_rmdir($dir)
{
	$obj = scandir($dir);
	foreach ($obj as $object)
	{
		if ($object != "." && $object != "..")
			unlink($dir."/".$object);
	}
	rmdir($dir);
}

if ($argc == 1)
	exit();
$curl = curl_init($argv[1]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
if (($str = curl_exec($curl)) == FALSE)
{
	echo "Curl exec failed with parameter ".$argv[1].".\n";
	exit();
}
curl_close($curl);
if (preg_match("~[^:]*://([^/]*)~", $argv[1], $array) === FALSE || empty($array[1]))
{
	echo "The given website is invalid\n";
	exit();
}
$argv[1] = $array[1];
if (file_exists($argv[1]))
	ft_rmdir($argv[1]);
mkdir($argv[1], 0755);
if (( $i = preg_match_all("~<img(?: ?[^\"\'>\/\=]+=\"[^\"]*\")* ?src=\"([^\"]*)\"~", $str, $tab)) == 0)
	exit();
foreach ($tab[1] as $val)
{
	if (strrchr($val, "/") !== FALSE)
		$name = strrchr($val, "/");
	else
		$name = $val;
	$file_path = $argv[1]."/".$name;
	$curl = curl_init($val);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$str = curl_exec($curl);
	$file = fopen($file_path, "w");
	fwrite($file, $str);
	fclose($file);
	curl_close($curl);
}
?>
