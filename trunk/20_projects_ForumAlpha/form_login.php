<?php
say("FORM_LOGIN.php # start", 1);
session_start();

$zeigeloginform = true;

say("FORM_LOGIN.php # ist der user eingeloggt?", 1);
if (istEingeloggt() == true)
{
	say("ja", 1);

	$zeigeloginform = false;
}
else
{
	say("nein", 1);
	say('FORM_LOGIN.php # ist nickname und passwort im request?', 1);
	if (isset ($_POST["login_nickname"]) and isset ($_POST["login_passwort"]))
	{
		say("ja", 1);
		say('FORM_LOGIN.php # ist nickname und passwort korrekt?', 1);
		if (loginOk($_POST["login_nickname"], $_POST["login_passwort"]))
		{
			say("ja", 1);

			say('FORM_LOGIN.php # SCHREIBE NN UND PW IN DIE SESSION. ', 1);
			session_register("nickname");
			$_SESSION["nickname"] = $_POST["login_nickname"];
			session_register("passwort");
			$_SESSION["passwort"] = $_POST["login_passwort"];
			say('FORM_LOGIN.php # verhindere das anzeigen der loginform', 1);
			$zeigeloginform = false;
		}
		else
		{
			say("nein", 1);
			say('FORM_LOGIN.php # ZERSTÖRE DIE SESSION.', 1);
			//			zerstoereSession();
		}
	}
	else
	{
		say("nein", 1);
		$zeigeloginform = true;
	}

	say('FORM_LOGIN.php # soll die loginform angezeigt werden?', 1);
	if ($zeigeloginform == true)
	{
		say("ja", 1);
		include "form_anmeldebutton.php";
	}
	else
	{
		say("nein", 1);
	}

}

function loginOk($nickname, $passwort)
{
	@ mysql_pconnect('localhost', 'root', '');
	mysql_select_db('phpforum');

	$result = @ mysql_query("SELECT * FROM benutzer WHERE nickname = '" .
	$nickname .
	"' and passwort = sha1('" .
	$passwort .
	"') and aktiviert = 1");

	if (mysql_num_rows($result) == 1)
	{
		//ein ergebnis wurde gefunden!
		return true;
	}
	else
	{
		// es konnte kein entsprechender datensatz gefunden werden!
		return false;
	}
}
say("FORM_LOGIN.php # ende", 1);
?>
