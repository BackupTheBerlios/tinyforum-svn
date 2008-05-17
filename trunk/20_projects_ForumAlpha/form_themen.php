<?php
session_start();
say("<h3>Anfang form_themen.php</h3>", 0);
echo '<font face="Lucida Fax", color=#00C0C0>';
echo "<h2>FORM_THEMEN wird angezeigt</h2>";
echo '</font>';

@ mysql_pconnect('localhost', 'root', '');
mysql_select_db('phpforum');

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
		echo "<form name=records action=" . "index.php" . " method=post>";
		echo "<td><input size=40 type=text name=thema value=" . $row['thema'] . "></td>";
		echo "<td><input size=40 type=text name=zugriffe value=" . $row['zugriffe'] . "></td>";
		echo "<td><input size=40 type=text name=t_zeitpunkt value=" . $row['t_zeitpunkt'] . "></td>";
		echo "<td><input type=submit name=showBeitraege value=Show></td>";
		echo "</form>";
		echo "</tr>";
	}
	echo "</table>";

	echo "<br>";
	echo "<br>";
	echo "<br>";
}

//Hidden Felder verwenden. If Abfrage über Buttons Bearbeiten und löschen. Wenn bearbeiten dann andere Table mit
//input feldern anzeigen. Nur gültig wenn User in Session gleich erstelluser ist. Genau so wie mit Löschen.
//Wenn falscher User soll fehlermeldung angezeigt werden. Neue Flags vielleicht Nötig um wieder zu LabelTable
//Darstellung gelangt.
if ($_POST["showBeitraege"])
{
	include "table_ShowBeitraege.php";
}

//Post(beitragBearbeiten) wird in table_ShowBeitrage gesetzt
elseif ($_POST["beitragBearbeiten"])
{
	include "table_EditBeitrag.php";
}

//Post(BeitragSichern) wird in table_EditBeitrag gesetzt
elseif($_POST["BeitragSichern"])
{
	mysql_query("UPDATE beitraege SET text='".$_POST["text"]."' WHERE beitragsnr=".$_POST["Editbeitragsnr"]." AND thema='".$_POST["EditThema"]."'");
	echo "<h4>Beitrag wurde geändert</h4>";
}

//Post(beitragLoeschen) wird in table_ShowBeitrage gesetzt
elseif($_POST["beitragLoeschen"])
{

	mysql_query("DELETE FROM beitraege WHERE beitragsnr=".$_POST["Showbeitragsnr"]." AND thema='".$_POST["ShowThema"]."'");
	echo "<h4>Beitrag wurde gelöscht</h4>";
}
//Post(neuenBeitrag) wird in table_ShowBeitrage gesetzt
elseif($_POST["neuenBeitrag"])
{
	echo "<h4>Neuer Beitrag</h4><br>";
	echo "<form name=records action=" . "index.php" . " method=post>";
			echo "<tr>";
			echo "<td><textarea name=text rows=10 cols=50 wrap=off></textarea></td>";
			echo "</tr>";
			echo "<tr>";
			//Mitgeliefertes Thema(von unteren Form in table_showBeiträge) wird wieder mitgeben da wenn auf sicher 
			//geklickt wird, erst die Speicherung erfolgt und dort das Thema benötigt wird.
			echo "<input size=40 type=hidden name=currentThema value=" .$_POST["neuThema"] . ">";
			echo "<td><input name=neuenBeitragSpeichern type=submit value=Sichern>";
			echo "</tr>";
}
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

//wenn dieser Button gedrückt wird, wird im Index das LÖSCHEN des ThemenFlags veranlasst
echo '	<form action="index.php" method="post">
	  				<input type="submit" name="fromthemabacktoindex" value="zurück zur Startseite"/>
				</form>';

//Für Ablauf wichtig. Siehe Index und themenFlag.txt
//bei zurück zum start bzw wenn verwaltungbutton gedrückt wird, wird variable gelöscht
session_start();
say("ThemenFlag wurde gesetzt", 1);
session_register("themenFlag");
$_SESSION["themenFlag"] = true;
say("<h3>ENDE form_themen.php</h3>", 0);

//repäsentiert button der zurück leiten soll, ermöglicht das wechseln der Themen und Benutzer view
//vielleicht post die benutzer var zeigen, somit wird benutzer angezeigt, button selben namen wie im index also kein zurück sondern auch ein Benutzer
//sollte auch benutzer flag setzen
?>

  
  
 
  
  
  
  

  