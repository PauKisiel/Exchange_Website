<?php
	session_start();
	unset($_SESSION['zalogowany']);
	unset($_SESSION['id_uzy']);
    unset($_SESSION['nazwisko']);
    unset($_SESSION['imie']);
    unset($_SESSION['data_ur']);
    unset($_SESSION['plec']);
    unset($_SESSION['admin']);
    unset($_SESSION['mail']);
    unset($_SESSION['mail']);

	echo 'Wylogowanie przebiegło prawidłowo<br/>'; 


?>
<a href="./index.php">Powrót do strony głównej</a> 