<?php

/**
 * Autoren: Edenhofer, Ragg
 * 
 * Die index.php ist unserer Steuerseite. Diese wird von jedem Formular aufgerufen. Anhand des assoziativen PostArray oder anhand der Flags 
 * wird der Ablauf bestimmt. Um ein besseres Verständnis für den Ablauf zu bekommen, liegt unser Ablaufdiagramm bei.
 */

include "debug.php";

session_start();

say("INDEX.php # start", 0);

say("INDEX.php # includen von session.php", 0);
include "session.php";

say("<br>INDEX.php # includen von functions.php", 0);
include "functions.php";

say("<br>INDEX.php # includen von form_login.php", 0);
include "form_login.php";

say("<br>INDEX.php # ist der user eingeloggt?", 0);
if (istEingeloggt() == true)
{
	say("ja, prüfe session-parameter", 1);

	// WURDE DER ABMELDE_BUTTON ANGEKLICKT ? 
	say('INDEX.php # wurde der ABMELDE_BUTTON geklickt?', 1);
	if (isset ($_POST["abmelden"]))
	{
		say("ja, zerstöre session und zeige anmeldebutton", 2);
		zerstoereSession();
		include "form_anmeldebutton.php";
	}
	else
	{
		//TODO: dieser button muss ganz unten angezeigt werden!
		say("nein, zeige form_abmeldebutton.php", 2);
		include "form_abmeldebutton.php";

		say("INDEX.php # Soll themenFlag gelöscht werden?",1);
		//Überprüft ob der User zurück auf die Startseite will.
		//NOCH NICHT IM ABLAUFDIAGRAMM
		if(isset($_POST["fromthemabacktoindex"]) OR isset($_POST["benutzer"]))
		{
			say("ja, lösche themenflag",2);
			session_unregister("themenFlag");
		}
		else
		{
			say("nein<br>",2);
		}
		say('INDEX.php # wurde der THEMEN_BUTTON geklickt oder ThemenFlag = true?', 1);
		// WURDE DER THEMEN_BUTTON ANGEKLICKT ? ODER WURDE Sessionvar(themenflag) im form_thema gesetzt?
		//Noch nicht im Ablaufdiagramm erneuert
		if (isset ($_POST["themen"]) OR isset($_SESSION["themenFlag"]))
		{
			say("ja, zeige form_themen.php", 2);
			echo '<hr>';
			include "form_themen.php";
			echo '<hr>';
		}
		else
		{
			say("nein, zeige den themenbutton", 2);
			themenbutton();
		}

		// WURDE DER BENUTZER_BUTTON ANGEKLICKT ?
		say('INDEX.php # wurde der BENUTZER_BUTTON geklickt?', 1); 
		if (isset ($_POST["benutzer"])) 
		{
			//Damit wird ThemenModus beendet
			say("nein, zeige form_benutzer.php", 2);
			include "form_benutzer.php";
		}
		else
		{
			say("nein, zeige den benutzerbutton", 2);
			benutzerbutton();
		}
	}
}
else
{
	say("nein, nichts wird gemacht", 1);
}
say("INDEX.php # ende", 0);

//ZUM DEBUGGEN:
say("<br>@@@@@@@@@@@@@@@@@@@@@@@@@@<br><br>POST:<br>", 0);
print_r($_POST);
say("<br><br>SESSION:<br>", 0);
print_r($_SESSION);
?>

















