<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/forms-min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/buttons-min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
    <fieldset>	
        <p style="font-family:Montserrat"><b><legend>Logowanie</legend></b><br>
        <label for="id_login">Login:</label>
        <input id="id_login" type="text" placeholder="Login" value="<?php out($form['login']); ?>" class="pure-input-rounded"/>
        <label for="id_pass">Password:</label>
        <input id="id_pass" type="password" placeholder="Password" value="<?php out($form['pass']); ?>" class="pure-input-rounded"/><br>
	<button type="submit" class="pure-button pure-button-primary">Zaloguj</button>
        </p>
     </fieldset>
</form>	
    
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
</div>

</body>
</html>
