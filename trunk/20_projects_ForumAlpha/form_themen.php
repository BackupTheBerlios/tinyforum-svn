<?php
say("<h3>Anfang form_themen.php</h3>", 0);
echo '<font face="Lucida Fax", color=#00C0C0>';
echo "<h2>FORM_THEMEN wird angezeigt</h2>";
echo '</font>';
//Table aus DB erstellen
//if ($_POST["themen"] OR $_POST["showThemeListe"])
//{
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
//}
if ($_POST["showBeitraege"])
{

	$result = @ mysql_query("SELECT beitragsnr, nickname, text, b_zeitpunkt FROM beitraege WHERE thema = '" . $_POST["thema"] . "'");
	if ($result)
	{
		echo "<h3> Beiträge</h3>";
		echo "<table border=1>";
		while ($row = mysql_fetch_assoc($result))
		{
			echo "<form name=records action=" . "index.php" . " method=post>";
			echo "<tr>";
			echo "<td><input size=40 type=text name=betragsnr value=" . $row['beitragsnr'] . "></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><input size=40 type=text name=nickname value=" . $row['nickname'] . "></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><input size=40 type=text name=text value=" . $row['b_zeitpunkt'] . "></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><textarea name=text rows=10 cols=50 wrap=off>" . $row['text'] . "</textarea></td>";
			echo "</tr>";
			echo "</form>";

		}
		echo "</table>";

	} else
	{
		echo "Keine Beiträge zu diesem Thema vorhanden";
	}

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

  
  
 
  
  
  
  

  