#!/usr/bin/php
<?php
	echo "Entrez un nombre: ";
	$line = fgets(STDIN);
 	while ($line != FALSE)
	{
		$line = trim($line);
		if (!is_numeric($line))
				echo "'".$line."' n'est pas un chiffre\n";
		else
		{
			if ($line % 2 == 0)
				echo "Le chiffre ".$line." est Pair\n";
			else
				echo "Le chiffre ".$line." est Impair\n";
			}
		echo "Entrez un nombre: ";
		$line = fgets(STDIN);
	}
?>
