#!/usr/bin/php
<?php
function ft_is_sort($ar)
{
	$last_val = $ar[0];
	foreach ($ar as $val)
	{
		if ($last_val > $val)
			return (FALSE);
		$last_val = $val;
	}
	return (TRUE);
}
?>
