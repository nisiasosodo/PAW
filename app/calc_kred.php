<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów
$kwota =$_REQUEST ['kwota'] ?? null;
$lata =$_REQUEST ['lata'] ?? null;
$proc =$_REQUEST ['proc'] ?? null;

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($kwota) && isset($lata) && isset($proc))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $kwota == "") {$messages [] = 'Nie podano kwoty kredytu.';}
if ( $kwota <= 0) {$messages [] = 'Kwota kredytu nie może być liczbą ujemną.';}
if ( $lata == "") {$messages [] = 'Nie podano liczby lat.';}
if ( $lata <= 0) {$messages [] = 'Liczba lat nie może być liczbą ujemną.';}
if ( $proc == "") {$messages [] = 'Nie podano wartości oprocentowania.';}
if ( $proc < 0 ) {$messages [] = 'Wartość oprocentowania musi być liczbą nieujemną.';}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
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

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota = intval($kwota);
	$lata = intval($lata);
	$proc = floatval($proc);
	
	//wykonanie operacji
	$licz_mies = $lata*12;
	$mies_oproc = ($proc/100)/12;
	
	if($mies_oproc == 0)
		$rata = $kwota/$licz_mies;
	else
		$rata = $kwota * ($mies_oproc / (1- pow(1 + $mies_oproc, -$licz_mies)));
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_kred_view.php';