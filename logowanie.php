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
session_start();

require_once('./baza.php');

$baza = new Baza();

if(isset($_POST['mail']))
    $mail=$_POST['mail'];
if(isset($_POST['haslo']))
    $haslo=($_POST['haslo']);

$sql = 'select * from uzytkownicy where e_mail=? AND haslo=?';
$zapytanie = $baza->klient->prepare($sql);	
$zapytanie->execute([$mail,$haslo]);

$ilosc = $zapytanie->rowCount();

if($ilosc==1){
    $dane=$zapytanie->fetch();
    $_SESSION['zalogowany']=true;
    $_SESSION['id_uzy']=$dane['id_uzytkownika'];
    $_SESSION['nazwisko']=$dane['nazwisko'];
    $_SESSION['imie']=$dane['imie'];
    $_SESSION['data_ur']=$dane['data_ur'];
    $_SESSION['plec']=$dane['plec'];
    $_SESSION['admin']=$dane['czy_admin'];
    $_SESSION['mail']=$dane['e_mail'];
    $_SESSION['mail']=$dane['telefon'];
    header('Location: index.php');
}
else {
    echo "<div class='container '>
                    <div class='row h-50 justify-content-center align-items-center'>
                        <div class='col-sm-8'>
                            <h3 style='text-align:center'>Nieprawidłowy login lub hasło!</h3>
                            <a href='index.php' class='btn btn-info btn-lg btn-block' role='button'>Powrót do logowania</a>
                        </div>
                    </div>      
                </div>";            
        }
    

?>


</body>
</html>

