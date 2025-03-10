<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head> 
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc_kred.php" method="get">
	<label for="id_kwota">Kwota kredytu : </label> </br> 
	<input id="id_kwota" type="text" name="kwota" value="<?php if (isset($kwota))  echo($kwota); ?>" /><br /> 
	<label for="id_lata">Liczba lat : </label> </br>
	<input id="id_lata" type="text" name="lata" value="<?php if (isset($lata))  echo($lata); ?>" /><br />
	<label for="id_proc">Wartość oprocentowania: </label> </br>
	<input id="id_proc" type="text" name="proc" value="<?php if (isset($proc)) echo($proc); ?>" /><br /> </br>
	<input type="submit" value="Oblicz ratę" />
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

</body>
</html>