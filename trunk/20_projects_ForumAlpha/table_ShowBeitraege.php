<?php
/**
 * Autoren: Edenhofer, Ragg
 * 
 * Diese Tabelle wird im form_themen.php verwendet. Es zeigt alle Beiträge eines bestimmten Themas an.
 * 
 */
 //DB Zugriff
$result = @ mysql_query("SELECT beitragsnr, nickname, text, b_zeitpunkt FROM beitraege WHERE thema = '" . $_POST["thema"] . "'");
	if ($result)
	{
		echo "<hr>";
		echo "<h3> Beiträge</h3>";
		echo "<table border=1>";
		while ($row = mysql_fetch_assoc($result))
		{
			echo "<form name=beitraege action=" . "index.php" . " method=post>";
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
			echo "<input name=beitragLoeschen type=submit value=Löschen></td>";
			echo "</tr>";
			echo "<input size=40 type=hidden name=Showbeitragsnr value=" . $row['beitragsnr'] . ">";
			echo "<input size=40 type=hidden name=ShowThema value=" .$_POST["thema"] . ">";
			echo "</form>";
			echo "<br>";

		}
		echo "</table>";
		echo "<form name=neueBeitraege action=" . "index.php" . " method=post>";
		//Thema wird mitgegeben ansonten kann kein neuer eintrag in die DB eingefügt werden, denn es wäre
		//keine Themenzuordnung möglich
		echo "<input size=40 type=hidden name=neuThema value=" .$_POST["thema"] . ">";
		echo "<input name=neuenBeitrag type=submit value='Neuer Beitrag'></td>";
		echo "</form>";

	} else
	{
		echo "<h4>Keine Beiträge zu diesem Thema vorhanden</h4>";
	}
?>
