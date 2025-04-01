<?php
namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
        //zmienne do obliczen
        private $licz_mies; 
        private $mies_oproc;

	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	

	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->lata = getFromRequest('lata');
		$this->form->proc = getFromRequest('proc');
	}
	
	public function validate() {
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lata ) && isset ( $this->form->proc ))) {
			$this->msgs->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów.');
                        return false;
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu.');
		}
		if ($this->form->lata == "") {
			getMessages()->addError('Nie podano liczby lat.');
		}
                if ($this->form->proc == "") {
			getMessages()->addError('Nie podano wartości oprocentowania.');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->lata )) {
				getMessages()->addError('Druga wartość nie jest liczbą całkowitą');
			}
                        if (! is_numeric ( $this->form->proc )) {
				getMessages()->addError('Trzecia wartość nie jest liczbą całkowitą');
			}
                        //sprawdzenie czy parametry mają poprawne wartosći
                        if ($this->form->kwota <= 0){
                           getMessages()->addError('Kwota kredytu musi być większa od zera.');
                        }
                        if ($this->form->lata <= 0){
                            getMessages()->addError('Liczba lat musi być większa od zera.');
                        }
                        if ($this->form->proc < 0){
                           getMessages()->addError('Wartość oprocentowania musi być liczbą nieujemną.');
                        }
		}
		
		return !getMessages()->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
			$this->form->kwota = intval($this->form->kwota);
			$this->form->lata = intval($this->form->lata);
                        $this->form->proc = floatval($this->form->proc);
			getMessages()->addInfo('Wprowadzono parametry');
				
			//obliczenia
                        
                        $this->licz_mies = ($this->form->lata)*12;
                        $this->mies_oproc = (($this->form->proc)/100)/12;
	
                        if($this->mies_oproc == 0){
                        $this->result->result= round(($this->form->kwota)/($this->licz_mies), 2);}
                        else{
                        $this->result->result = round(($this->form->kwota) * (($this->mies_oproc) / (1- pow(1 + ($this->mies_oproc), -($this->licz_mies)))), 2);}
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
                else{$this->result->result = null;}
		
		$this->generateView();
	}
	
	
	public function generateView(){
                	
		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_description','Oblicz miesięczną ratę swojego kredytu.');
		getSmarty()->assign('page_header','Kalkulator kredytowy');
					
		getSmarty()->assign('form',$this->form);
                getSmarty()->assign('result',$this->result);
                
		
		getSmarty()->display('CalcView.html');
	}
}
