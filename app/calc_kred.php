<?php

require_once dirname(__FILE__).'/../config.php';

$kwota =$_REQUEST ['kwota'] ?? null;
$lata =$_REQUEST ['lata'] ?? null;
$proc =$_REQUEST ['proc'] ?? null;


if ( ! (isset($kwota) && isset($lata) && isset($proc))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $kwota == "") {$messages [] = 'Nie podano kwoty kredytu.';}
if ( $kwota <= 0) {$messages [] = 'Kwota kredytu nie może być liczbą ujemną.';}
if ( $lata == "") {$messages [] = 'Nie podano liczby lat.';}
if ( $lata <= 0) {$messages [] = 'Liczba lat nie może być liczbą ujemną.';}
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
		$rata = $kwota/$licz_mies;
	else
		$rata = $kwota * ($mies_oproc / (1- pow(1 + $mies_oproc, -$licz_mies)));
}

include 'calc_kred_view.php';
