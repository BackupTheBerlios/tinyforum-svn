<?php
				echo "&bull;FUNCTIONS.php # registriere die Functions...<br>";
session_start();
function istEingeloggt()
{
	if(		isset($_SESSION["nickname"]) 
		and isset($_SESSION["passwort"])	)
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

		echo 'SESSION ZERST�RT!!!!!!!!!!!!!!!!!!!';
		session_unregister("nickname");
		session_unregister("passwort");
		session_unset();
}
?>
