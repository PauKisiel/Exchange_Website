<html>
<head>
	<meta charset="ANSI">

	<link rel="stylesheet" href="plik.css" type="text/css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>  <!-- ten np był potrzebny do przewijania slajdów --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
	require('bootstrap')
	</script>
	<title>Strona główna</title>
</head>


<body>

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
				
			echo"<div class='container'>
    				<div class='row h-50 justify-content-center align-items-center'>
      					<div class='col-sm-8'>
      						<h4 style='text-align:center'>Rejestracja przebiegła pomyślnie</h4>
        					<a href='index.php' class='btn btn-info btn-lg btn-block' role='button'>Przejdź do logowania</a>
      					</div>
      				</div>		
    			</div>";
			} else {
			echo"<div class='container'>
    				<div class='row h-50 justify-content-center align-items-center'>
      					<div class='col-sm-8'>
      						<h4 style='text-align:center'>Podany przez ciebie login został już użyty</h4>
        					<a href='index.php' class='btn btn-info btn-lg btn-block' role='button'>Wypełnij formularz ponownie</a>
      					</div>
      				</div>		
    			</div>";
				
			}
			$stmt->close();
			$polaczenie->close();
		}
			 
		}else {			
			echo "<div class='container '>
    				<div class='row h-50 justify-content-center align-items-center'>
      					<div class='col-sm-8'>
      						<h3 style='text-align:center'> Wypełnij wszystkie pola formularza!</h3>
        					<a href='rejestracja_org.html' class='btn btn-info btn-lg btn-block' role='button'>Powrót do formularza</a>
        					<a href='index.php' class='btn btn-info btn-lg btn-block' role='button'>Powrót do strony głownej</a>
      					</div>
      				</div>		
    			</div>";			
		}
}
} 
?>
</body>
</html>