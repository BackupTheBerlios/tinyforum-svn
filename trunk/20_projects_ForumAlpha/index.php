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
	if (isset ($_POST["abmelden"]))
	{
		zerstoereSession();				
	} else
	{

		include "form_abmeldebutton.php";
	}
	
	//Userverwaltung
	if(true)
	{
		
	}
	//Themenliste
	else if(true)
	{
		
	}
	
	
}
else{
							echo "false<br>";
}
							echo "INDEX.php # ende<br>";
?>
