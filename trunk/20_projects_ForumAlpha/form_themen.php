<?php 
echo"<h2>FORM_THEMEN wird angezeigt</h2>";
//F�r Ablauf wichtig. Siehe Index und themenFlag.txt
//bei zur�ck zum start bzw wenn verwaltungbutton gedr�ckt wird, wird variable gel�scht
session_start();
session_register("themenFlag");
$_SESSION["themenFlag"] = true;


//rep�sentiert button der zur�ck leiten soll, erm�glicht das wechseln der Themen und Benutzer view
//vielleicht post die benutzer var zeigen, somit wird benutzer angezeigt, button selben namen wie im index also kein zur�ck sondern auch ein Benutzer
//sollte auch benutzer flag setzen
session_unregister("themenFlag");
?>
