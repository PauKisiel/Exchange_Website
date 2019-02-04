<?php
session_start();

require_once('./baza.php');
$baza = new Baza();
?>


<html>
<head>
	<meta charset="utf-8">

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
          <li class="nav-item ">
            <a class="nav-link" href="wymiany.php">Wymiany <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="organizacje.php">Organizacje</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="o_stronie.html">O stronie</a>
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
            <li class="nav-item active">
              <a class="nav-link" href="organizacje.php">Organizacje</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="o_stronie.html">O stronie</a>
            </li>
          </ul>
          <ul class="navbar-nav mr-end">
            <li class="nav-item active">
              <a class="nav-link" href="#">Moje wymiany</a>
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

  </div>
</div>


<!-- slider --> 
    <div id="slider" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/08/16/00/59/panorama-2646143_1280.jpg" alt="Pierwszy slajd">
          <div class="carousel-caption">
            <h5>Regensburg</h5>
            <p>Niemcy</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2016/05/20/20/40/london-1405911_1280.jpg" alt="Drugi slajd">
          <div class="carousel-caption">
            <h5>Londyn</h5>
            <p>Wielka Brytania</p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/12/04/14/07/vienna-2997032_1280.jpg" alt="Trzeci slajd">
          <div class="carousel-caption">
            <h5>Wiedeń</h5>
            <p>Austria</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

<!-- lista wymian do przeglądania --> 
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
            <img class='d-block w-100' src='{$dane['plik']}' alt='Zdjęcie wymiany'>
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
            Rozpoczęcie: {$dane['data_roz']}
          </div>
          
          <div class='col-sm-6'>
            Zakończenie: {$dane['data_zak']}
          </div>
        </div>

        <div class='row justify-content-end'>
          <div class='col-sm-6'>
            Termin zgłoszenia: {$dane['data_zgloszenia']}
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
            <p>{$dane['opis']}</p>
          </div>
        </div>
      </div>
    </div>";

    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)) { 

   echo"
    <div class='row justify-content-end'>
      <div class='col-sm-5'>
        <a href='zapis_na_wymiane.php' class='btn btn-success' role='button'>
          Zgloś się na wymianę!
        </a>
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