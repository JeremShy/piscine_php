#!/usr/bin/php
<?php
function handle_link($arr)
{
	$ret = "<a".$arr[1];
	$arr[2] = preg_replace_callback("~(.*<[^>]*title=\")([^\"]*)(\".*)~", function ($arr) {return ($arr[1].strtoupper($arr[2]).$arr[3]);}, $arr[2]);
	$ret = $ret.preg_replace_callback("~(^[^<]*)|>[^<]*~", function ($arr) {return (strtoupper($arr[0]));}, $arr[2]);
	return ($ret."</a>");
}

if ($argc == 1)
	exit();
$str = file_get_contents($argv[1]);
$str = preg_replace_callback('~<a( ?[a-z]*=\"[^\"]*">|[^>]*>)(.*)</a>~', 'handle_link', $str);
$str = preg_replace_callback('~(<a[^>]*title=\")([^\"]*)(.*)~', function ($arr){return ($arr[1].strtoupper($arr[2]).$arr[3]);}, $str);
echo "$str";
?>
