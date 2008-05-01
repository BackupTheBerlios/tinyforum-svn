<?php
include "debug.php";

session_start();

say("INDEX.php # start", 0);

say("INDEX.php # includen von session.php", 0);
include "session.php";

say("<br>INDEX.php # includen von functions.php", 0);
include "functions.php";

say("<br>INDEX.php # includen von form_login.php", 0);
include "form_login.php";

say("<br><br>INDEX.php # ist der user eingeloggt?", 0);
if (istEingeloggt() == true)
{
	say("ja<br>", 0);
	say('INDEX.php # schaue nach ob isset ($_POST["abmelden"]):', 0);

	// WURDE DER ABMELDE_BUTTON ANGEKLICKT ?
	say('INDEX.php # wurde der ABMELDE_BUTTON geklickt?', 0);
	if (isset ($_POST["abmelden"]))
	{
		say("ja", 0);
		zerstoereSession();
	}
	else
	{
		//TODO: dieser button muss ganz unten angezeigt werden!
		say("nein", 0);
		include "form_abmeldebutton.php";
	}

	// WURDE DER THEMEN_BUTTON ANGEKLICKT ?
	say('INDEX.php # wurde der THEMEN_BUTTON geklickt?', 0);
	if (isset ($_POST["themen"]))
	{
		say("ja", 0);
		include "form_themen.php";
	}
	else
	{
		say("nein", 0);
	}

	// WURDE DER BENUTZER_BUTTON ANGEKLICKT ?
	say('INDEX.php # wurde der BENUTZER_BUTTON geklickt?<br>', 0);
	if (isset ($_POST["benutzer"]))
	{
		say("nein", 0);
		include "form_benutzer.php";
	}
	else
	{
		say("nein", 0);
	}
}
else
{
	say("nein", 0);
}
say("INDEX.php # ende", 0);

//ZUM DEBUGGEN:
say("<br>@@@@@@@@@@@@@@@@@@@@@@@@@@<br><br>POST:<br>", 0);
print_r($_POST);
say("<br><br>SESSION:<br>", 0);
print_r($_SESSION);
?>
<!-- hier werden zu testzwecken buttons definiert:-->

<form action="index.php" method="post">
  <input type="submit" name="benutzer" value="benutzerbearbeiten"/>
  <input type="submit" name="themen" value="Themenliste anzeigen"/>
</form>
 

















