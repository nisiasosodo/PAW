<?php
require_once dirname(__FILE__) . "/../config.php";
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head> 
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/newcss.css">
</head>
<body>

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Kalkulator kredytowy</h2>
      <h4 class="animation a2">Oblicz miesięczną ratę swojego kredytu.</h4>
    </div>
    <div class="form">
        <form action="<?php print(_APP_URL);?>/app/calc_kred.php" method="post">
      
      <input id="id_kwota" type="text" name="kwota" class="form-field animation a3" placeholder="Kwota kredytu" value="<?php out($kwota) ?>">
      <input id="id_lata" type="text" name="lata" class="form-field animation a4" placeholder="Liczba lat" value="<?php out($lata) ?>">
      <input id="id_proc" type="text" name="proc" class="form-field animation a5" placeholder="Oprocentowanie" value="<?php out($proc) ?>"><br>
              <button type="submit" class="animation a6">Oblicz</button> <br>
      </form>
      </div> 
  

<?php
    if (isset($messages)) {
        if (count ( $messages ) > 0){
	echo '<ol style="margin: 20px; margin-left: 0px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #F9F; width:100%; opacity: 0.8;">';
	foreach ( $messages as $key => $msg ) { 
	echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
	}
    }
?>

<?php if (!empty($rata)){ ?>
    <div style="margin: 20px; margin-left: 0px; padding: 10px; border-radius: 5px; background-color: #cc99cc; width:100%; opacity: 1; color: white">
    <?php echo 'Miesięczna rata kredytu: '.$rata; ?>
    <?php echo ' zł '; ?>      
    <?php } ?>
    </div>
      
<?php if(!isset($rata)){?>
<div class="right"></div>   
<?php } ?>           
</div>  
    
<?php if(isset($rata)){?>
<div class="right"></div>   
<?php } ?>
    
</div> 
   

</body>
</html>
