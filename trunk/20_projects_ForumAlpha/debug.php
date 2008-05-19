<?php
/**
 * Autoren: Edenhofer, Ragg
 * 
 * Diese Funktion wird zum Debuggen benutzt.(Da PHP Debugger nicht funktionierte)
 * Mit Hilfe dieser Methode können wir unseren Ablauf aufzeichnen und somit auch nachverfolgen
 */
function say($str_message, $int_level)
{
	echo "<font color=".'"'."#999999".'"'.">";

	for ($i = 1; $i <= $int_level; $i++)
	{
		echo '~~~~'; // int level entscheidet, wieviele punkte ausgegeben werden.
	}
	echo $str_message;
	echo "</font>";
	echo "<br>";
}
?>
