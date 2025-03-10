
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head> 
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
	<label for="id_x">Liczba 1: </label> <!etykieta>
	<input id="id_x" type="text" name="x" value="<?php if (isset($x))  print($x); ?>" /><br /> <!pole wejsciowe>
	<label for="id_op">Operacja: </label>
	<select name="op">
		<option value="plus" <?php if (isset($operation) && $operation == 'plus') echo ('selected');?> >+</option>
		<option value="minus" <?php if (isset($operation) && $operation == 'minus') echo ('selected');?> >-</option>
		<option value="times" <?php if (isset($operation) && $operation == 'times') echo ('selected');?> >*</option>
		<option value="div" <?php if (isset($operation) && $operation == 'div') echo ('selected');?> >/</option>
	</select> <!select pozwala wybrac uzytkownikowi>
	<br />
	<label for="id_y">Liczba 2: </label>
	<input id="id_y" type="text" name="y" value="<?php if (isset($x)) print($y); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) { 
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>