<?php
/**
 * Autoren: Edenhofer, Ragg
 * 
 * Dieses Formular wird im form_themen.php verwendet. 
 * Es dient für die Erstellung eines neuen Themenbeitrags.
 */
echo "<hr>";
echo "<h4>Neuer Beitrag</h4><br>";
	echo "<table border=1>";
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
	echo "</form>";
	echo "</table>";
?>
