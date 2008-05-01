<?php
say('FORM_LOGIN.php # ZEIGE DIE LOGINFORM.', 2);
		echo '
		<form action="index.php" method="post">
		  <table>
		    <tr>
		      <td>Nickname:</td>
		      <td>
		 			<input type="text" name="login_nickname" value="" size="20" maxlength="12"/>
		 	  </td>
		    </tr>
		    <tr>
		      <td>Passwort:</td>
		      <td>
		  			<input type="password" name="login_passwort" size="20"/>
		   	  </td>
		    </tr>   
		    <tr>
		    	<td colspan="2">	
		  			<input type="submit" name="" value="Einloggen"/>
		    	</td>
		    </tr>
		  </table>
		</form>';
?>
