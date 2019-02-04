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
    echo 'Nieprawidłowy login lub hasło <br/>';
    echo '<a href="'.$_SERVER['HTTP_REFERER'].'">Powrót do panelu logowania</a>';
    
}
?>



