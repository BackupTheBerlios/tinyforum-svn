<?php
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

//Hidden Felder verwenden. If Abfrage �ber Buttons Bearbeiten und l�schen. Wenn bearbeiten dann andere Table mit
//input feldern anzeigen. Nur g�ltig wenn User in Session gleich erstelluser ist. Genau so wie mit L�schen.
//Wenn falscher User soll fehlermeldung angezeigt werden. Neue Flags vielleicht N�tig um wieder zu LabelTable
//Darstellung gelangt.
if ($_POST["showBeitraege"])
{
	//Maybe in ein Include mit den Namen LabelTableBeitrag (no nid fix)
	$result = @ mysql_query("SELECT beitragsnr, nickname, text, b_zeitpunkt FROM beitraege WHERE thema = '" . $_POST["thema"] . "'");
	if ($result)
	{

		echo "<h3> Beitr�ge</h3>";
		echo "<table border=1>";
		while ($row = mysql_fetch_assoc($result))
		{
			echo "<form name=records action=" . "index.php" . " method=post>";
			echo "<tr>";
			echo "<td><label>" . $row['beitragsnr'] . "</label></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>" . $row['nickname'] . "</label></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><label>" . $row['b_zeitpunkt'] . "</label></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><textarea name=text rows=10 cols=50 wrap=off readonly>" . $row['text'] . "</textarea></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><input name=beitragBearbeiten type=submit value=Bearbeiten>";
			echo "<input name=loeschen type=submit value=L�schen></td>";
			echo "</tr>";
			echo "<input size=40 type=hidden name=Showbetragsnr value=" . $row['beitragsnr'] . ">";
			echo "<input size=40 type=hidden name=Shownickname value=" . $row['nickname'] . ">";
			echo "<input size=40 type=hidden name=Showtext value=" . $row['b_zeitpunkt'] . ">";
			echo "</form>";
			echo "<br>";

		}
		echo "</table>";

	} else
	{
		echo "Keine Beitr�ge zu diesem Thema vorhanden";
	}
	//m�glicher inlcude ende

}
elseif ($_POST["beitragBearbeiten"])
{
	
	echo $_POST["beitragsnr"];
	$result2 = @ mysql_query("SELECT beitragsnr, nickname, text, b_zeitpunkt FROM beitraege WHERE thema = '" . $_POST["thema"] . "' AND beitragsnr = ". $_POST["beitragsnr"]);
	if ($result2)
	{

		echo "<h3> Beitr�ge</h3>";
		echo "<table border=1>";
		while ($row = mysql_fetch_assoc($result2))
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
			echo "<tr>";
			echo "<td><input name=beitragBearbeiten type=submit value=Bearbeiten>";
			echo "<input name=loeschen type=submit value=L�schen></td>";
			echo "</tr>";
			echo "</form>";
			echo "<br>";

		}
		echo "</table>";
	}
}
//wenn dieser Button gedr�ckt wird, wird im Index das L�SCHEN des ThemenFlags veranlasst
echo '	<form action="index.php" method="post">
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

  
  
 
  
  
  
  

  