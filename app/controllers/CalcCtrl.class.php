<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
        //zmienne do obliczen
        private $licz_mies; 
        private $mies_oproc;

	public function __construct(){

		$this->msgs = new Messages();
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
			$this->msgs->addError('Nie podano kwoty kredytu.');
		}
		if ($this->form->lata == "") {
			$this->msgs->addError('Nie podano liczby lat.');
		}
                if ($this->form->proc == "") {
			$this->msgs->addError('Nie podano wartości oprocentowania.');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->kwota )) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			if (! is_numeric ( $this->form->lata )) {
				$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
			}
                        if (! is_numeric ( $this->form->proc )) {
				$this->msgs->addError('Trzecia wartość nie jest liczbą całkowitą');
			}
                        //sprawdzenie czy parametry mają poprawne wartosći
                        if ($this->form->kwota <= 0){
                            $this->msgs->addError('Kwota kredytu musi być większa od zera.');
                        }
                        if ($this->form->lata <= 0){
                            $this->msgs->addError('Liczba lat musi być większa od zera.');
                        }
                        if ($this->form->proc < 0){
                            $this->msgs->addError('Wartość oprocentowania musi być liczbą nieujemną.');
                        }
		}
		
		return !$this->msgs->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
			$this->form->kwota = intval($this->form->kwota);
			$this->form->lata = intval($this->form->lata);
                        $this->form->proc = floatval($this->form->proc);
			$this->msgs->addInfo('Wprowadzono parametry');
				
			//obliczenia
                        
                        $this->licz_mies = ($this->form->lata)*12;
                        $this->mies_oproc = (($this->form->proc)/100)/12;
	
                        if($this->mies_oproc == 0){
                        $this->result->result= round(($this->form->kwota)/($this->licz_mies), 2);}
                        else{
                        $this->result->result = round(($this->form->kwota) * (($this->mies_oproc) / (1- pow(1 + ($this->mies_oproc), -($this->licz_mies)))), 2);}
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
                else{$this->result->result = null;}
		
		$this->generateView();
	}
	
	
	public function generateView(){
                
                //var_dump($this->result); // Sprawdzi, co jest w zmiennej
                //error_log(print_r($this->result, true)); // Sprawdzi, co jest w logach serwera
                //die();		
		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_description','Oblicz miesięczną ratę swojego kredytu.');
		getSmarty()->assign('page_header','Kalkulator kredytowy');
					
		getSmarty()->assign('msgs',$this->msgs);
		getSmarty()->assign('form',$this->form);
                getSmarty()->assign('result',$this->result);
                
		
		getSmarty()->display('CalcView.html');
	}
}
