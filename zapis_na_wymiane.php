<?php
session_start();

require_once('./bazamysqli.php');
$host = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "wymiany_ue";
		$Id_wymiany=;
		$Id_uzytkownika=$_SESSION['id_uzy'];
		$Data_zapisu=date('Y-m-d');
		$Czy_zatwierdzony=1;
		$polaczenie = new mysqli(HOST,DB_USER,DB_PASSWORD,DB_NAME);
	  $INSERT= "INSERT INTO zapis (id_uzytkownika,id_wymiany,data_zapisu,czy_zatwierdzony) values(?,?,?,?)";
	  $stmt = $polaczenie->prepare($INSERT);
				$Czy_zatwierdzony=1;
				$stmt->bind_param("iisi",$Id_uzytkownika,$Id_wymiany, $Data_zapisu,$Czy_zatwierdzony);
				$stmt->execute();
				echo "Zgłoszono na wymianę!"
				echo "<a href='index.php'>Wróć do strony głównej</a>";
				
	  ?>
