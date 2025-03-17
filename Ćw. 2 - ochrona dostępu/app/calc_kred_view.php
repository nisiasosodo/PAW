<?php
require_once dirname(__FILE__) . "/../config.php";
include_once _ROOT_PATH . "/app/security/check.php";
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head> 
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    
<div style="width:90%; margin: 2em auto;">    
    <a class="pure-button pure-button-primary" href="<?php print(_APP_ROOT); ?>/app/security/logout.php">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">
<form action="<?php print(_APP_URL);?>/app/calc_kred.php" method="post">
	<label for="id_kwota">Kwota kredytu : </label> </br> 
        <input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota))  {echo($kwota);} ?>" /><br /> 
	<label for="id_lata">Liczba lat : </label> </br>
        <input id="id_lata" type="text" name="lata" value="<?php if (isset($lata))  {echo($lata);} ?>" /><br />
	<label for="id_proc">Wartość oprocentowania: </label> </br>
        <input id="id_proc" type="text" name="proc" value="<?php if (isset($proc)) {echo($proc);} ?>" /><br /> </br>
	 <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>	

<?php

if (isset($messages)) {
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #F9F; width:300px;">';

	foreach ( $messages as $key => $msg ) { 
	echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
	}
?>

<?php if (isset($rata)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #BFFF00; width:300px;">
<?php echo 'Miesięczna rata kredytu: '.$rata; ?>
</div>
<?php } ?>
    
</div>

</body>
</html>
