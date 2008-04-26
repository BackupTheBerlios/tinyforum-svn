<?php
				echo "&bull;FUNCTIONS.php # registriere die Functions...<br>";

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
		session_unregister("nickname");
		session_unregister("passwort");
		session_destroy();
}
?>
