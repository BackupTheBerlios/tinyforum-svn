<?php
say( "FUNCTIONS.php # registriere die Functions",1);
session_start();
function istEingeloggt()
{
	if (isset ($_SESSION["nickname"]) and isset ($_SESSION["passwort"]))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function zerstoereSession()
{

	say(  'SESSION ZERST�RT!!!!!!!!!!!!!!!!!!!',2);
	session_unregister("nickname");
	session_unregister("passwort");
	session_unset();
}
?>
