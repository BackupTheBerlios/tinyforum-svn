<?php
function say($str_message, $int_level)
{
	for ($i = 1; $i <= $int_level; $i++)
	{
		echo '~~~~'; // int level entscheidet, wieviele punkte ausgegeben werden.
	}
	echo $str_message;
	echo "<br>";
}
?>
