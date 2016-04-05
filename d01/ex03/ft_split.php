#!/usr/bin/php
<?php
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
?>
