<?php
session_start();

require_once('./baza.php');
$baza = new Baza();
?>

<html>
<head>
	<meta charset="ANSI">
	
	<link rel="stylesheet" href="plik.css" type="text/css">
  <link rel="stylesheet" href="styl.css" type="text/css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>  <!-- ten np był potrzebny do przewijania slajdów --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  require('bootstrap')
  </script>

	<title>Organizacje</title>
</head>



<body>
<?php
    if (!isset($_SESSION['zalogowany'])) { 
?>

<div class = "container">
  <div class = "row">  
    <div class="col-sm-12">
  	<nav class="navbar navbar-expand-sm navbar-light bg-light">
    	<!--<a class="navbar-brand" href="index.php">Główna</a>-->
      <a class="navbar-brand" href="index.php">
        <img src="dom_ikona.png" width="30" height="30" alt="">
      </a>
    <!--
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>/-->

      <div class="collapse navbar-collapse" id="podstrony">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item">
            <a class="nav-link" href="wymiany.php">Wymiany</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organizacje.php">Organizacje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="o_stronie.php">O stronie</a>
          </li>
          <!--
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li> 
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->
          </ul>
            <form class="form-inline my-2 my-lg-0" action='logowanie.php' method='POST'>
            	<!--
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
              <input class="form-control mr-sm-2" name="mail" type="text" display:"inline-block" placeholder="E-mail" aria-label="E-mail" requirde>
              <input class="form-control mr-sm-2" name="haslo" type="password" placeholder="Hasło" aria-label="Hasło" required>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Zaloguj</button> 
            </form>
        <ul class="navbar-nav mb-1">
          <li class="nav-item px-2">
            <a href="rejestracja.html" class"mx=2">Nie masz konta? Zarejestruj się!</a>
          </li>
        </ul>
    	</div>    
    </nav>
  </div>
</div>
</div>
<?php
}
?>


<!-- pasek dla zalogowanych--> 
<?php
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) { 
?>

<!--&& $_SESSION['uprwanienia']==1)--> 
<div class = "container">
  <div class = "row">  
    <div class="col-sm-12">
      <nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="index.php">
          <img src="dom_ikona.png" width="30" height="30" alt="">
        </a>
        <div class="collapse navbar-collapse" id="podstrony">
          <ul class="navbar-nav mr-auto ">
            <li class="nav-item ">
              <a class="nav-link" href="wymiany.php">Wymiany <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="organizacje.php">Organizacje</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="o_stronie.php">O stronie</a>
            </li>
          </ul>
          <ul class="navbar-nav mr-end">
            <li class="nav-item">
              <a class="nav-link" href="moje_wymiany.php">Moje wymiany</a>
            </li>
          </ul>
        <a href='wyloguj.php' class='btn btn-outline-success my-2 my-sm-0 mx-2' role='button'>
          Wyloguj
        </a>
      </nav>
    </div>
<?php
  }
?>


<!--zdjecie -->

<!--<div class='container '>
  <div class='row '>
    <div class='col-sm '>
      <img class='img-fluid' src='organizacje_g.png' alt='Zdjęcie'> 
        <div class=" col-sm-12  carousel-caption">
          <h1>Organizacje</h1>
        </div>
    </div>      
  </div>
</div>-->

<div class='container '>
  <div class='row'>
    <div class='col-sm-12'>
        <img class='img-fluid' src='org_g.png' alt='Zdj?cie'> 
        <h2 class="zdj_top">Organizacje</h2>
    </div>      
  </div>
</div>



<!-- LISTA ORGANIZACJI - 
      spr czy aktywna -->
<?php
  $sql='select * from organizacje';
    $zapytanie=$baza->klient->query($sql);
 
    $ilosc=$zapytanie->rowCount();


if ($ilosc>0) {
    while ($dane=$zapytanie->fetch()){

echo"
<div class='container py-4'>
  <div class='row align-items-center'>
    <div class='col-sm-2'>
      <img class='d-block w-100' src='{$dane['logo']}' alt='Zdjęcie wymiany'>
    </div>
    <div class='col-sm-10'>
      <div class='row'>
        <div class='col-sm-6'>
          <h2>{$dane['nazwa']}</h2>
        </div>
      </div>
      <div class='row'>
        <div class='col-sm-6'>
          <h3>{$dane['kraj']}</h3>
        </div>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='col-sm'>
      <p>{$dane['opis']}</p>
    </div>
  </div>
  <div class='row justify-content-center'>
    <div class='col-sm-auto'>
      <h4>Kontakt:</h4>
    </div>
  </div>
  <div class='row justify-content-center'>
    <div class='col-sm-auto'>
      Telefon: {$dane['telefon']}
    </div>
  </div>
  <div class='row justify-content-center'>
    <div class='col-sm-auto'>
      E-mail: {$dane['e_mail']}
    </div>
  </div>  
</div>";
}
}
?>


</body>
</html>