<?php

session_start();

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
  header('Location: ogloszenie.php');
  exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My test page</title>
    <link rel="stylesheet" href="global.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display-swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  </head>
  <body>
    <section class="main">
      <nav>
      
          <form action="zarejestruj.php"><button name="zarejestruj" class="button">Zarejestruj</button></form>
          <form action= "login.php" ><button name="zaloguj" class="button">Zaloguj</button> </form>
          <input class="menu-btn" type="checkbox" id="menu-btn">
        <label class="menu-icon" for="menu-btn">
          <span class="nav-icon"></span>
</label>
        <br>
        <br>
        <br>


        <ul class="menu">
          <li><img src="eneba2.png" id ="obraz" alt="obraz"></li>
          <li><a href="index.php" >Strona główna</a></li>
          <li><a href="ogloszenie_2.php" class="active">dodaj ogłoszenie</a></li>
          <li><a href="przegladaj.php">przeglądaj</a></li>
          <li><a href="#">Kontakt</a></li>
          <li><a href="o_stronie.php">O stronie</a></li>
        </ul>
        

      </nav>
      <div class="header-content">
        <div class="header-text">
          <h1>Musisz się zalogować, aby dodać ogłoszenie!</h1>
          <a href="login.php" class="header-btn">Zaloguj</a>
        </div>
      </div>
      
    </section>
    <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
       <div class="footer-col">
  	 			<h4>FGK</h4>
  	 			<ul>
  	 			 <li><img src="eneba2.png" alt="obraz"></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Firma</h4>
  	 			<ul>
  	 				<li><a href="o_stronie.php">O nas</a></li>
  	 				<li><a href="#">Adres</a></li>
  	 				<li><a href="przegladaj.php">Nasze produkty</a></li>
  	 				<li><a href="#">Polityka prywatności</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Pomoc</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">Regulamin</a></li>
  	 				<li><a href="#">Preferencje ciasteczek</a></li>
  	 				
  	 			
  	 			</ul>
  	 		</div>
  	 		
  	 		<div class="footer-col">
  	 			<h4>Obserwuj </h4>
  	 			<div class="social-links">
                  	 		  	<a href="https://www.facebook.com/profile.php?id=100088987863698&is_tour_dismissed=true" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  	 				<a href="https://twitter.com/FGK__REAL" target="_blank"><i class="fab fa-twitter"></i></a>
                  	 				<a href="https://www.instagram.com/games_books_films_series/" target="_blank"><i class="fab fa-instagram"></i></a>
                  	 				<a href="https://www.linkedin.com/in/piotr-bo%C5%82onkowski-28703225b/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  	 			</div>

  	 		  </div>
  	 	
        </div>
       <br>
       <hr id="linia">
       <br>
      <div class="copyright"> <p> Copyright © 2022 FGK. Wszelkie prawa zastrzeżone</p>
</div>
  	 </div>

  </footer>
   
  </body>
</html>