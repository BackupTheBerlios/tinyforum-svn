<?php
$result = @ mysql_query("SELECT beitragsnr, nickname, text, b_zeitpunkt FROM beitraege WHERE thema = '" . $_POST["ShowThema"] . "' AND beitragsnr = ". $_POST["Showbeitragsnr"]);

	if($result)
	{
	echo "<hr>";
		echo "<h3> Bearbeite Beitrag </h3>";
		echo "<table border=1>";
		while($row = mysql_fetch_assoc($result))
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
			echo "<td><textarea name=text rows=10 cols=50 wrap=off>" . $row['text'] . "</textarea></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><input name=BeitragSichern type=submit value=Sichern>";
			echo "</tr>";
			echo "<input size=40 type=hidden name=Editbeitragsnr value=" . $row['beitragsnr'] . ">";
			echo "<input size=40 type=hidden name=EditThema value=" .$_POST["ShowThema"] . ">";
			echo "</form>";
			echo "<br>";
		}
		echo "</table>";
	}
?>
