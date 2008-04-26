<?php
echo "INDEX.php # start<br><br>";

echo "INDEX.php # includen von session.php<br>";
include "session.php";

echo "<br>INDEX.php # includen von functions.php<br>";
include "functions.php";

echo "<br>INDEX.php # includen von form_login.php<br>";
include "form_login.php";

echo "<br><br>INDEX.php # ist der user eingeloggt?<br>";
if (istEingeloggt() == true)
{
	echo "ja<br>";
	echo 'INDEX.php # schaue nach ob isset ($_POST["abmelden"]):<br>';

	// WURDE DER ABMELDE_BUTTON ANGEKLICKT ?
	echo 'INDEX.php # wurde der ABMELDE_BUTTON geklickt?<br>';
	if (isset ($_POST["abmelden"]))
	{
		echo "ja<br>";
		zerstoereSession();
	}
	else
	{
		//TODO: dieser button muss ganz unten angezeigt werden!
		echo "nein<br>";
		include "form_abmeldebutton.php";
	}

	// WURDE DER THEMEN_BUTTON ANGEKLICKT ?
	echo 'INDEX.php # wurde der THEMEN_BUTTON geklickt?<br>';
	if (isset ($_POST["themen"]))
	{
		echo "ja<br>";
		include "form_themen.php";
	}
	else
	{
		echo "nein<br>";
	}

	// WURDE DER BENUTZER_BUTTON ANGEKLICKT ?
	echo 'INDEX.php # wurde der BENUTZER_BUTTON geklickt?<br>';
	if (isset ($_POST["benutzer"]))
	{
		echo "nein<br>";
		include "form_benutzer.php";
	}
	else
	{
		echo "nein<br>";
	}
}
else
{
	echo "nein<br>";
}
echo "INDEX.php # ende<br>";

//ZUM DEBUGGEN:
echo "<br>@@@@@@@@@@@@@@@@@@@@@@@@@@<br><br>POST:<br>";
print_r($_POST);
echo "<br><br>SESSION:<br>";
print_r($_SESSION);
?>
<!-- hier werden zu testzwecken buttons definiert:-->

<form action="index.php" method="post">
  <input type="submit" name="benutzer" value="benutzerbearbeiten"/>
  <input type="submit" name="themen" value="Themenliste anzeigen"/>
</form>
 

















