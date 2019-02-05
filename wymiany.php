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
  
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>  <!-- ten np by? potrzebny do przewijania slajd?w --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  require('bootstrap')
  </script>

	<title>Wymiany</title>
</head>



<body>


<?php
    if (!isset($_SESSION['zalogowany'])) { 
?>

<div class = "container">
  <div class = "row">  
    <div class="col-sm-12">
  	<nav class="navbar navbar-expand-sm navbar-light bg-light">
    	<!--<a class="navbar-brand" href="index.php">G??wna</a>-->
      <a class="navbar-brand" href="index.php">
        <img src="dom_ikona.png" width="30" height="30" alt="">
      </a>
    <!--
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>/-->

      <div class="collapse navbar-collapse" id="podstrony">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item disabled">
            <a class="nav-link" href="#">Wymiany</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="organizacje.php">Organizacje</a>
          </li>
          <li class="nav-item active">
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
              <input class="form-control mr-sm-2" name="haslo" type="password" placeholder="Has?o" aria-label="Has?o" required>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Zaloguj</button> 
            </form>
        <ul class="navbar-nav mb-1">
          <li class="nav-item px-2">
            <a href="rejestracja.html" class"mx=2">Nie masz konta? Zarejestruj si?!</a>
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
            <li class="nav-item disabled">
              <a class="nav-link" href="#">Wymiany <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="organizacje.php">Organizacje</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="o_stronie.php">O stronie</a>
            </li>
          </ul>
          <ul class="navbar-nav mr-end">
            <li class="nav-item active">
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

<div class='container '>
  <div class='row'>
    <div class='col-sm-12'>
        <img class='img-fluid' src='wymiany_g.png' alt='Zdj?cie'> 
        <h2 class="zdj_top">Wymiany</h2>
    </div>      
  </div>
</div>






<!-- lista wymian do przegl?dania --> 
<!--wymiana-organizacja -->
<?php
  $sql='select * from wymiana';
    $zapytanie=$baza->klient->query($sql);
 
    $ilosc=$zapytanie->rowCount();

    $sql_org='select nazwa from wymiana w join organizacje o on w.id_organizacji = o.id_organizacji where w.id_organizacji = o.id_organizacji';
    $zapytanie2=$baza->klient->query($sql_org);
	


if ($ilosc>0) {
    while ($dane=$zapytanie->fetch()){
      $dane2=$zapytanie2->fetch(); {
  echo 
  "<div class='container my-4'>
    <div class='row'>

      <div class='col-sm-4 align-self-center'>
        <div class='row justify-content-center'>
          <div class='col-sm-10'>
            <img class='d-block w-100' src='{$dane['plik']}' alt='Zdj?cie wymiany'>
          </div>
        </div>
      </div>

      <div class='col-sm-8'>
        <div class='row' id='tytul'>
          <div class='col-sm'>
            <h3>{$dane['tytul']}</h3>
          </div>
        </div>

        <div class='row'>
          <div class='col-sm'>
            <h4>{$dane['tematyka']}</h4>
          </div>
        </div>

        <div class='row'>
          <div class='col-sm-6'>
            Rozpocz?cie: {$dane['data_roz']}
          </div>
          
          <div class='col-sm-6'>
            Zako?czenie: {$dane['data_zak']}
          </div>
        </div>

        <div class='row justify-content-end'>
          <div class='col-sm-6'>
            Termin zg?oszenia: {$dane['data_zgloszenia']}
          </div>
        </div>

        <div class='row'>
          <div class='col-sm-auto'>
            Organizacja: {$dane2['nazwa']}
          </div>
        </div>

        <div class='row'>
          <div class='col-sm-auto'>
            Miejsce: {$dane['kraj']}, {$dane['miasto']}
          </div>
        </div>
        
        <div class='row'>
          <div class='col-sm'>
            <p>{$dane['opis']} </p>
          </div>
        </div>
      </div>
    </div>";

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) { 

   echo"
    <div class='row justify-content-end'>
      <div class='col-sm-5'>
        <form class='' action='zapis_na_wymiane.php' method='POST'>
          <input  name='id_wymianyP' type='hidden' value='{$dane['id_wymiany']}'/>
	        
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Zapisz</button> 
        </form>    
      </div>
    </div>
  </div>
</div>";
}
}
}
}
?>


</body>
</html>
