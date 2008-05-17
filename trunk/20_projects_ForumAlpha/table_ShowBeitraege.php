<?php
$result = @ mysql_query("SELECT beitragsnr, nickname, text, b_zeitpunkt FROM beitraege WHERE thema = '" . $_POST["thema"] . "'");
	if ($result)
	{

		echo "<h3> Beiträge</h3>";
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
			echo "<input name=beitragLoeschen type=submit value=Löschen></td>";
			echo "</tr>";
			echo "<input size=40 type=hidden name=Showbeitragsnr value=" . $row['beitragsnr'] . ">";
			echo "<input size=40 type=hidden name=ShowThema value=" .$_POST["thema"] . ">";
			echo "</form>";
			echo "<br>";

		}
		echo "</table>";

	} else
	{
		echo "Keine Beiträge zu diesem Thema vorhanden";
	}
?>
