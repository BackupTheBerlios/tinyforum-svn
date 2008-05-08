<?php

/*
 * beschreibung, authors, etc
 * 
 * 
 * 
 * */

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

	// WURDE DER ABMELDE_BUTTON ANGEKLICKT ?
	say('INDEX.php # wurde der ABMELDE_BUTTON geklickt?', 0);
	if (isset ($_POST["abmelden"]))
	{
		say("ja", 0);
		zerstoereSession();
		include "form_anmeldebutton.php";
	}
	else
	{
		//TODO: dieser button muss ganz unten angezeigt werden!
		say("nein", 0);
		include "form_abmeldebutton.php";

		say("Soll themenFlag gelöscht werden?",0);
		//Überprüft ob der User zurück auf die Startseite will.
		//NOCH NICHT IM ABLAUFDIAGRAMM
		if(isset($_POST["fromthemabacktoindex"]) OR isset($_POST["benutzer"]))
		{
			say("ThemenFlag wurde gelöscht", 1);
			session_unregister("themenFlag");
			say("ja<br><br>",1);
		}
		else
		{
			say("nein<br><br>",1);
		}
		say('INDEX.php # wurde der THEMEN_BUTTON geklickt oder ThemenFlag = true?', 0);
		// WURDE DER THEMEN_BUTTON ANGEKLICKT ? ODER WURDE Sessionvar(themenflag) im form_thema gesetzt?
		//Noch nicht im Ablaufdiagramm erneuert
		if (isset ($_POST["themen"]) OR isset($_SESSION["themenFlag"]))
		{
			say("ja", 0);
			echo '<hr>';
			include "form_themen.php";
			echo '<hr>';
		}
		else
		{
			say("nein", 0);
			themenbutton();
		}

		// WURDE DER BENUTZER_BUTTON ANGEKLICKT ?
		say('INDEX.php # wurde der BENUTZER_BUTTON geklickt?', 0); 
		if (isset ($_POST["benutzer"])) 
		{
			//Damit wird ThemenModus beendet
			say("nein", 0);
			include "form_benutzer.php";
		}
		else
		{
			say("nein", 0);
			benutzerbutton();
		}
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

















