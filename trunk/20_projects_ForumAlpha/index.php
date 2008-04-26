<?php
echo "INDEX.php # start<br><br>";

echo "INDEX.php # includen von session.php<br>";
include "session.php";
echo "INDEX.php # fertig mit includen von session.php<br><br>";

echo "INDEX.php # includen von functions.php<br>";
include "functions.php";
echo "INDEX.php # fertig mit includen von functions.php<br><br>";

echo "INDEX.php # includen von form_login.php<br>";
include "form_login.php";
echo "INDEX.php # fertig mit includen von form_login.php<br><br>";

echo "INDEX.php # schaue nach ob istEingeloggt():<br>";
if (istEingeloggt() == true)
{
	echo "true<br>";
	echo 'INDEX.php # schaue nach ob isset ($_POST["abmelden"]):<br>';

	// WURDE DER ABMELDE_BUTTON ANGEKLICKT ?
	if (isset ($_POST["abmelden"]))
	{
		zerstoereSession();
	}
	else
	{
		//TODO: dieser button muss ganz unten angezeigt werden!
		include "form_abmeldebutton.php";
	}

	// WURDE DER THEMEN_BUTTON ANGEKLICKT ?
	if (isset ($_POST["themen"]))
	{
		include "form_themen.php";
	}

	// WURDE DER BENUTZER_BUTTON ANGEKLICKT ?
	else
		if (isset ($_POST["benutzer"]))
		{
			include "form_benutzer.php";
		}
}
else
{
	echo "false<br>";
}
echo "INDEX.php # ende<br>";

//ZUM DEBUGGEN:
echo "@@@ POST:<br>";
print_r($_POST);
echo "<br>@@@ SESSION:<br>";
print_r($_SESSION);
?>
<!-- hier werden zu testzwecken buttons definiert:-->

<form action="index.php" method="post">
  <input type="submit" name="benutzer" value="benutzerbearbeiten"/>
  <input type="submit" name="themen" value="Themenliste anzeigen"/>
</form>
 

















