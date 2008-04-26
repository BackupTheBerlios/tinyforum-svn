<?php
echo "true<br>";
							echo "INDEX.php # DEREGISTRIEREN DER SESSION...<br>";
		session_unregister("nickname");
		session_unregister("passwort");
		session_destroy();
?>
