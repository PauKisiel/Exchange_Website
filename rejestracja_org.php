<?php
include './bazamysqli.php';
if(isset($_POST['nazwa']))
	$Nazwa=$_POST['kraj'];
if(isset($_POST['kraj']))
	$Kraj=$_POST['kraj'];
if(isset($_POST['e_mail']))
	$Email=$_POST['e_mail'];
if(isset($_POST['telefon']))
	$Telefon=$_POST['telefon'];
if(isset($_POST['haslo'])){
	$Haslo=$_POST['haslo'];
if(isset($_POST['opis'])){
	$Opis=$_POST['opis'];

	if(!empty($Nazwa) && !empty($Kraj) && !empty($Email) && !empty($Telefon) && !empty($Haslo) && !empty($Opis)){ // podwójne zabezpieczenie przed b³êdem

		$host = "localhost";
		$db_user = "root";
		$db_password = "";
		$db_name = "wymiany_ue";	
		
		$polaczenie = new mysqli(HOST,DB_USER,DB_PASSWORD,DB_NAME);
		
		
		if(mysqli_connect_error()){
			
			die('Brak polaczenia('.mysqli_connect_erno().')'.mysqli());
		}else {
			$SELECT ="SELECT e_mail from organizacje where e_mail=? Limit 1 ";
			$INSERT= "INSERT INTO organizacje (nazwa,kraj,e_mail,telefon,opis,haslo,czy_aktywna) values(?,?,?,?,?,?,?)";
			
			$stmt=$polaczenie->prepare($SELECT);
			$stmt->bind_param("s",$Email);
			$stmt->execute();
			$stmt->bind_result($Email);
			$stmt->store_result();
			$rnum=$stmt->num_rows;
			
			if ($rnum==0) {
		  $stmt->close();
		  $stmt = $polaczenie->prepare($INSERT);
				$Czy_aktywna=1;
				$stmt->bind_param("ssssssi",$Nazwa,$Kraj,$Email,$Telefon,$Opis, $Haslo,$Czy_aktywna);
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
	




}