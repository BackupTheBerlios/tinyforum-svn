<?php
/**
 * Autoren: Edenhofer, Ragg 4AKDVK
 * 
 * Dies ist der Themen- und Beitragbereich
 * Hier k�nnen neue Themen hinzugef�gt werden. Diesen Themen k�nnen Beitr�ge hinzugef�gt werden. Diese Beitr�ge k�nnen gel�scht
 * und bearbeitet werden.
 * 
 * Mit If-Abfragen wird entschieden, welche Teile der Seite angezeigt werden. In den If-Abfrage werden die gedr�ckten Buttons abgefragt.
 * z.b: showBeitraege. Wenn diese Bedingung true ergibt wird die das php-File table_ShowBeitrage.pho eingebunden.
 * 
 * 
 * 
 */
 
 
 
 
session_start();
say("<h3>Anfang form_themen.php</h3>", 0);
echo '<font face="Lucida Fax", color=#00C0C0>';
echo "<h2>FORM_THEMEN wird angezeigt</h2>";
echo '</font>';

//Datenbankverbindung
@ mysql_pconnect('localhost', 'root', '');
mysql_select_db('phpforum');

//Thementabelle
$result = @ mysql_query("SELECT thema,zugriffe, t_zeitpunkt FROM themen");
echo "<table>";
echo "<tr>";
echo "  <th>Thema</th>";
echo "  <th>Zugriffe</th>";
echo "  <th>Erstellung am</th>";
echo "  <th></th>";
echo "</tr>";
if ($result)
{

	while ($row = mysql_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<form name=themen action=" . "index.php" . " method=post>";
		echo "<td><input size=40 type=text name=thema value=" . $row['thema'] . "></td>";
		echo "<td><input size=40 type=text name=zugriffe value=" . $row['zugriffe'] . "></td>";
		echo "<td><input size=40 type=text name=t_zeitpunkt value=" . $row['t_zeitpunkt'] . "></td>";
		echo "<td><input type=submit name=showBeitraege value=Show></td>";
		echo "</form>";
		echo "</tr>";
	}
	echo "</table>";
	
	echo "<br>";
	echo "<form name=neuesThema action=". "index.php" . " method=post>";
	echo "<input type=text name=neuerThemenTitel>";
	echo "<input type=submit name=neuesThema value='Neues Thema erstellen'>";
	echo "<br>";
	echo "<br>";
}

//Zeigt Beitr�ge f�r das gew�schte Thema an
if ($_POST["showBeitraege"])
{
	$result = @ mysql_query("SELECT zugriffe, FROM themen WHERE thema = '".$_POST["thema"]."'");
	$row = mysql_fetch_assoc($result);
	$zugriffcount = $row['zugriffe'];
	$zugriffcount = $zugriffcount+1;
	
	mysql_query("UPDATE themen SET zugriffe=".$zugriffcount." WHERE thema = '".$_POST["thema"]."'");
	include "table_ShowBeitraege.php";
}

//Zeigt Form f�r die Bearbeitung eines bestimmten ausgew�hlten Beitrags an
//Post(beitragBearbeiten) wird in table_ShowBeitrage gesetzt
elseif ($_POST["beitragBearbeiten"])
{
	include "table_EditBeitrag.php";
}

//F�hrt die Speicherung des ge�nderten Beitrags aus
//Post(BeitragSichern) wird in table_EditBeitrag gesetzt
elseif($_POST["BeitragSichern"])
{
	mysql_query("UPDATE beitraege SET text='".$_POST["text"]."' WHERE beitragsnr=".$_POST["Editbeitragsnr"]." AND thema='".$_POST["EditThema"]."'");
	echo "<h4>Beitrag wurde ge�ndert</h4>";
}

//F�hrt die L�schung des gew�nschten Beitrags aus
//Post(beitragLoeschen) wird in table_ShowBeitrage gesetzt
elseif($_POST["beitragLoeschen"])
{

	mysql_query("DELETE FROM beitraege WHERE beitragsnr=".$_POST["Showbeitragsnr"]." AND thema='".$_POST["ShowThema"]."'");
	echo "<h4>Beitrag wurde gel�scht</h4>";
}
//Zeigt Form f�r neuen Beitrag an
//Post(neuenBeitrag) wird in table_ShowBeitrage gesetzt
elseif($_POST["neuenBeitrag"])
{
	include "table_NeuerBeitrag.php";
}

//Speichert den neuen Beitrag
elseif($_POST["neuenBeitragSpeichern"])
{
	$result = mysql_query("SELECT MAX(beitragsnr) as max FROM beitraege");
	$row = mysql_fetch_assoc($result);
	$nextId = $row['max']+1;
	$currentDate = date("Y-m-j H:i:s");
	$currentThema = $_POST["currentThema"];
	$nick = $_SESSION["nickname"];
	$btext = $_POST["text"];
	mysql_query("INSERT INTO beitraege (beitragsnr, thema, nickname, text, b_zeitpunkt) VALUES (".$nextId.", '".$currentThema."', '".$nick."', '".$btext."', '".$currentDate."')");
	echo "Beitrag wurde gespeichert";
	

}
//Speichert ein neues Thema
elseif($_POST["neuesThema"])
{
	$currentThemenDate = date("Y-m-j H:i:s");
	mysql_query("INSERT INTO themen (thema, zugriffe, t_zeitpunkt) VALUES ('".$_POST["neuerThemenTitel"]."', 0, '".$currentThemenDate."')");
	echo "<br><br><h3>Thema wurde gespeichert</h3>";
	echo "<form action="."index.php". " method=post>";
	echo "<input type=submit value=OK>";
	echo "</form>";
	

}

//wenn dieser Button gedr�ckt wird, wird im Index das L�SCHEN des ThemenFlags veranlasst
echo '<br><br>	<form action="index.php" method="post">
	  				<input type="submit" name="fromthemabacktoindex" value="zur�ck zur Startseite"/>
				</form>';

//F�r Ablauf wichtig. Siehe Index und themenFlag.txt
//bei zur�ck zum start bzw wenn verwaltungbutton gedr�ckt wird, wird variable gel�scht
session_start();
say("ThemenFlag wurde gesetzt", 1);
session_register("themenFlag");
$_SESSION["themenFlag"] = true;
say("<h3>ENDE form_themen.php</h3>", 0);

//rep�sentiert button der zur�ck leiten soll, erm�glicht das wechseln der Themen und Benutzer view
//vielleicht post die benutzer var zeigen, somit wird benutzer angezeigt, button selben namen wie im index also kein zur�ck sondern auch ein Benutzer
//sollte auch benutzer flag setzen
?>

  
  
 
  
  
  
  

  