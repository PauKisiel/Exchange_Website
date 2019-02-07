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
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  require('bootstrap')
  </script>

  <title>O stronie</title>
</head>



<body>
	

<?php
    if (!isset($_SESSION['zalogowany'])) { 
?>

<div class = "container">
  <div class = "row">  
    <div class="col-sm-12">
  	<nav class="navbar navbar-expand-sm navbar-light bg-light">
    	
      <a class="navbar-brand" href="index.php">
        <img src="dom_ikona.png" width="30" height="30" alt="">
      </a>
    

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
          
          </ul>
            <form class="form-inline my-2 my-lg-0" action='logowanie.php' method='POST'>
            	
              <input class="form-control mr-sm-2" name="mail" type="text" display:"inline-block" placeholder="E-mail" aria-label="E-mail" required>
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




<div class = "container">
  <div class='row'>
    <div class='col-sm-12'>
        <img class='img-fluid' src='o_str_g.png' alt='Zdj?cie'> 
        <h2 class="zdj_top">O stronie</h2>
    </div>      
  </div>
  <div class = "row justify-content-center">
    <div class = "row justify-content-center">
      <div class = "col-sm-9 py-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et tortor tempus, hendrerit metus at, convallis lorem. Nullam sodales orci consectetur, rhoncus mauris eget, faucibus urna. Etiam ut convallis mauris, ut porta felis. Maecenas elit felis, interdum eu efficitur eget, accumsan in arcu. Aenean hendrerit quam vitae orci tincidunt tempus. Sed quis lobortis justo. In lacinia sem a aliquam egestas. Duis facilisis sapien non tellus blandit tempor. Integer pellentesque eros nec arcu volutpat molestie. Donec non odio a risus mollis malesuada eu non velit. Praesent at libero ante. Maecenas a diam augue.</p>
      </div>
    </div>
    <div class="row justify-content-center ">
      <div class = "col-sm-10">
        <img src="https://cdn.pixabay.com/photo/2014/04/03/11/51/circle-312343_960_720.png" class="img-fluid">
      </div>
    </div>




  </div>
</div>

</body>
</html>