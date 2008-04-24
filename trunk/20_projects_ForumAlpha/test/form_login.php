<?php
					echo "&bull;FORM_LOGIN.php # start<br>";

$zeigeloginform = true;

					echo "&bull;FORM_LOGIN.php # schaue ob istEingeloggt()<br>";
if (istEingeloggt() == true)
{
					echo "&bull;true<br>";

	$zeigeloginform = false;
} else
{
					echo "&bull;false<br>";
					echo '&bull;FORM_LOGIN.php # schaue ob isset ($_POST["login_nickname"]) and isset ($_POST["login_passwort"])<br>';
	if (isset ($_POST["login_nickname"]) and isset ($_POST["login_passwort"]))
	{
					echo "&bull;true<br>";
					echo '&bull;FORM_LOGIN.php # schaue ob loginOk($_POST["login_nickname"], $_POST["login_passwort"])<br>';
		if (loginOk($_POST["login_nickname"], $_POST["login_passwort"]))
		{
					echo "&bull;true<br>";
					
					echo '&bull;FORM_LOGIN.php # setze $_SESSION["nickname"] und $_SESSION["passwort"] <br>';
			session_register("nickname");
			$_SESSION["nickname"] = $_POST["login_nickname"];
			session_register("passwort");
			$_SESSION["passwort"] = $_POST["login_passwort"];
					echo '&bull;FORM_LOGIN.php # setze $zeigeloginform = false <br>';
			$zeigeloginform = false;
		} else
		{
					echo "&bull;false<br>";
					echo '&bull;FORM_LOGIN.php # ZERSTÖRE DIE SESSION...<br>';
					
			session_unregister("nickname");
			session_unregister("passwort");
			session_destroy();
		}
	} else {
					echo "&bull;false<br>";
	}
	
	
					echo '&bull;FORM_LOGIN.php # schaue nach ob $zeigeloginform==true<br>';
	if($zeigeloginform==true)
	{
					echo "&bull;true<br>";
					echo '&bull;FORM_LOGIN.php # ZEIGE DIE LOGINFORM...<br>';
?>

<form action="index.php" method="post">
  <table>
    <tr>
      <td>Nickname:</td>
      <td>
 			<input type="text" name="login_nickname" value="" size="20" maxlength="12"/>
 	  </td>
    </tr>
    <tr>
      <td>Passwort:</td>
      <td>
  			<input type="password" name="login_passwort" size="20"/>
   	  </td>
    </tr>   
    <tr>
    	<td colspan="2">	
  			<input type="submit" name="" value="Einloggen"/>
    	</td>
    </tr>
  </table>
</form>

<?


	}
	else{
					echo "&bull;false<br>";
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
	} else
	{
		// es konnte kein entsprechender datensatz gefunden werden!
		return false;
	}
}
					echo "&bull;FORM_LOGIN.php # ende<br>";
?>
