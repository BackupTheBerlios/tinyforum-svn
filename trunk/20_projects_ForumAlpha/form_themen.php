<?php 
echo"<h2>FORM_THEMEN wird angezeigt</h2>";
//Für Ablauf wichtig. Siehe Index und themenFlag.txt
//bei zurück zum start bzw wenn verwaltungbutton gedrückt wird, wird variable gelöscht
session_start();
session_register("themenFlag");
$_SESSION["themenFlag"] = true;


//repäsentiert button der zurück leiten soll, ermöglicht das wechseln der Themen und Benutzer view
//vielleicht post die benutzer var zeigen, somit wird benutzer angezeigt, button selben namen wie im index also kein zurück sondern auch ein Benutzer
//sollte auch benutzer flag setzen
session_unregister("themenFlag");
?>
