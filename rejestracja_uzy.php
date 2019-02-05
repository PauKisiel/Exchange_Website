<?php
include './bazamysqli.php';
if(isset($_POST['imie']))
	$Imie=$_POST['imie'];
if(isset($_POST['nazwisko']))
	$Nazwisko=$_POST['nazwisko'];
if(isset($_POST['data_ur']))
	$Data_ur=$_POST['data_ur'];
if(isset($_POST['plec']))
	$Plec=$_POST['plec'];
if(isset($_POST['e_mail']))
	$Email=$_POST['e_mail'];
if(isset($_POST['telefon']))
	$Telefon=$_POST['telefon'];
if(isset($_POST['haslo'])){
	$Haslo=$_POST['haslo'];

	if(!empty($Imie) && !empty($Nazwisko) && !empty($Data_ur) && !empty($Telefon) && !empty($Plec) && !empty($Email) && !empty($Haslo)){ // podwójne zabezpieczenie przed b³êdem

		$host = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "wymiany_ue";	
		
		$polaczenie = new mysqli(HOST,DB_USER,DB_PASSWORD,DB_NAME);
		
		
		if(mysqli_connect_error()){
			
			die('Brak polaczenia('.mysqli_connect_erno().')'.mysqli());
		}else {
			$SELECT ="SELECT e_mail from uzytkownicy where e_mail=? Limit 1 ";
			$INSERT= "INSERT INTO uzytkownicy (nazwisko,imie,data_ur,plec,e_mail,haslo,telefon,czy_admin) values(?,?,?,?,?,?,?,?)";
			
			$stmt=$polaczenie->prepare($SELECT);
			$stmt->bind_param("s",$Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
			
			if ($rnum==0) {
		  $stmt->close();
		  $stmt = $polaczenie->prepare($INSERT);
				$Czy_admin=0;
				$stmt->bind_param("sssssssi",$Nazwisko,$Imie,$Data_ur,$Plec,$Email, $Haslo,$Telefon,$Czy_admin);
				$stmt->execute();
				
				echo "Rejestracja przebieg³a pomyœlnie!";
				echo "<a href='index.php'>Wróæ do ekranu logowania</a>";
			} else{
				echo "Ktoœ siê ju¿ zarejestrowa³ korzystaj¹c z tego loginu";
				
			}
			$stmt->close();
			$polaczenie->close();
		}
			 
		}else {			
			echo "Wype³nij wszystkie pola!";			
		}

}
	




