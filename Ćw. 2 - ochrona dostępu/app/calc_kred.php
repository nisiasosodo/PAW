<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota,&$lata,&$proc){
    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
    $proc = isset($_REQUEST['proc']) ? $_REQUEST['proc'] : null;	
}

function validate(&$kwota,&$lata,&$proc,&$messages){

	if ( ! (isset($kwota) && isset($lata) && isset($proc))) {
		return false;
	}
        if ( $kwota == "" || $lata == "" || $proc == "") {
		$messages [] = 'Należy wypełnić wszystkie pola.';
	}
        if (count ( $messages ) != 0) {return false;}

	if (!is_numeric( $kwota )) {$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą.';}	
	if (!is_numeric( $lata )) {$messages [] = 'Druga wartość nie jest liczbą całkowitą.';}
        if (!is_numeric( $proc )) {$messages [] = 'Trzecia wartość nie jest liczbą.';}
        
        if ($kwota <= 0 || $lata <= 0) {
            $messages [] = "Wartość kwoty kredytu i liczba lat muszą być większe od 0.";
            return false;
        }
        if($proc < 0){
            $messages [] = "Wartość oprocentowania musi być liczbą nieujemną.";
            return false;      
        }
        if (count ( $messages ) != 0) {return false;}
        else {return true;}
}


function process(&$kwota,&$lata,&$proc,&$rata){
	$kwota = intval($kwota);
	$lata = intval($lata);
	$proc = floatval($proc);
	
	$licz_mies = $lata*12;
	$mies_oproc = ($proc/100)/12;
	
	if($mies_oproc == 0){
        $rata = $kwota/$licz_mies;}
	else{
	$rata = $kwota * ($mies_oproc / (1- pow(1 + $mies_oproc, -$licz_mies)));
        }
}
$kwota = null;
$lata = null;
$proc = null;
$rata = null;
$messages = array();

getParams($kwota,$lata,$proc);
if ( validate($kwota,$lata,$proc,$messages) ) { // gdy brak błędów
	process($kwota,$lata,$proc,$messages,$rata);
}

include _ROOT_PATH . '/app/calc_kred_view.php';
