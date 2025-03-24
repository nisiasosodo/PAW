<?php

require_once dirname(__FILE__).'/../config.php';

$kwota =isset($_REQUEST['kwota']) ? $_REQUEST ['kwota'] : '';
$lata =isset($_REQUEST['lata']) ? $_REQUEST ['lata'] : '';
$proc =isset($_REQUEST['proc']) ? $_REQUEST ['proc'] : '';

if ( isset($_REQUEST['kwota']) && isset($_REQUEST['lata']) && isset($_REQUEST['proc']) ) {
    
    if ( ! (isset($kwota) && isset($lata) && isset($proc))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
    }


if ( $kwota == "") {$messages [] = 'Nie podano kwoty kredytu.';}
if ( $kwota <= 0) {$messages [] = 'Kwota kredytu musi być większa od zera.';}
if ( $lata == "") {$messages [] = 'Nie podano liczby lat.';}
if ( $lata <= 0) {$messages [] = 'Liczba lat musi być większa od zera.';}
if ( $proc == "") {$messages [] = 'Nie podano wartości oprocentowania.';}
if ( $proc < 0 ) {$messages [] = 'Wartość oprocentowania musi być liczbą nieujemną.';}


if (empty( $messages )) {	

	if (! is_numeric( $kwota )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $lata )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $proc )) {
		$messages [] = 'Trzecia wartość nie jest liczbą.';
	}
}


if (empty ( $messages )) { 
	
	$kwota = intval($kwota);
	$lata = intval($lata);
	$proc = floatval($proc);
	
	$licz_mies = $lata*12;
	$mies_oproc = ($proc/100)/12;
	
	if($mies_oproc == 0)
		$rata = round($kwota/$licz_mies, 2);
	else
		$rata = round($kwota * ($mies_oproc / (1- pow(1 + $mies_oproc, -$licz_mies))), 2);
}
}
include 'calc_kred_view.php';