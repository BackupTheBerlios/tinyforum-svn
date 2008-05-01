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

	say( 'SESSION ZERSTÖRT!!!!!!!!!!!!!!!!!!!',2);
	session_unregister("nickname");
	session_unregister("passwort");
	session_unset();
}

function benutzerbutton()
{
	echo '	<form action="index.php" method="post">
  				<input type="submit" name="benutzer" value="benutzerbearbeiten"/>
			</form>';
}


function themenbutton()
{
	echo '	<form action="index.php" method="post">
  				<input type="submit" name="themen" value="Themenliste anzeigen"/>
			</form>';
}
?>
