<?php
session_start();

require_once('./bazamysqli.php');

$host = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "wymiany_ue";
		$Id_wymiany=$_POST['id_wymianyP'];
		$Id_uzytkownika=$_SESSION['id_uzy'];
		$Data_zapisu=date('Y-m-d');
		$Czy_zatwierdzony=1;
		$polaczenie = new mysqli(HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$select='select id_wymiany from zapis where id_wymiany=? and id_uzytkownika=? LIMIT 1';
        $stmt=$polaczenie->prepare($select);
			$stmt->bind_param("ii",$Id_wymiany,$_SESSION['id_uzy']);
			$stmt->execute();
			$stmt->bind_result($Id_wymiany);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
if ($rnum==0){
	  $INSERT= "INSERT INTO zapis (id_uzytkownika,id_wymiany,data_zapisu,czy_zatwierdzony) values(?,?,?,?)";
	  $stmt = $polaczenie->prepare($INSERT);
				$Czy_zatwierdzony=1;
				$stmt->bind_param("iisi",$Id_uzytkownika,$Id_wymiany, $Data_zapisu,$Czy_zatwierdzony);
				$stmt->execute();
				echo "Zgłoszono na wymianę!";
				echo "<a href='index.php'>Wróć do strony głównej</a>";
			}
			else {echo "Jesteś już zapisany <br/>";
			echo "<a href='index.php'>Wróć do strony głównej</a>";
		}

				
	  ?>
