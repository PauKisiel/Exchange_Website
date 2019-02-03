<?php 

class Baza {
	const DSN ='mysql:host=localhost; dbname=wymiany_ue; charset=UTF8'; //konwencja nazwy stałych zawsze piszemy wielką literą 
	const UZYTKOWNIK = 'root';  // do definiowania stałych jest też funkcja define(), ale nie można definiować nią stałych klasowych 
	const HASLO = '';

	public $klient;

	function __construct() {
		$this->polacz();
	}

	function polacz () {
		try {
			$this->klient = new PDO(self::DSN, self::UZYTKOWNIK, self::HASLO);

		}
		catch (PDOEXception $e) {
			die ("Błąd połaczenia z bazą: " .$e->getMessage());
		}
	}

}
?> 