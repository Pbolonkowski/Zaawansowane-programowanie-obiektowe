<?php 

session_start();

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
 // header('Location: o_stronie_2.php');
  
}
else{
  header('Location: o_stronie.php');
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
    <section class="main2">
      <nav>
      <input class="menu-btn" type="checkbox" id="menu-btn">
        <label class="menu-icon" for="menu-btn">
          <span class="nav-icon"></span>
</label>
          <?php
   echo  '<a href="logout.php"><button name="wyloguj" class="button">Wyloguj</button><a href="wiadomosci.php"><button name="wiadomosci" class="button">Wiadomości </button> </a> ';
   if ($_SESSION['id'] == 1) {
     echo '<a href="zgloszenia.php"><button name="zgloszenia" class="active" class="button" >Zgłoszenia</button></a>';
   }
   if ($_SESSION['id'] != 1) {
     echo '<a href="konto.php"><button name="konto" class="active" class="button">Panel użytkownika</button></a>';
   }
   echo '<p class="testowy"> Witaj '.$_SESSION['user'].'! </p>';
    ?> 
    <!-- <button name="zaloguj">Zaloguj</button> -->
        
        <br><br><br>


        <ul class="menu">
          <li><img src="eneba2.png" id ="obraz" alt="obraz"></li>
          <li><a href="index.php">Strona główna</a></li>
          <li><a href="ogloszenie.php">dodaj ogłoszenie</a></li>
          <li><a href="przegladaj_2.php" >przeglądaj</a></li>
          <li><a href="kontakt.php?zmienna='1'">Kontakt</a></li>
          <li><a href="o_stronie_2.php">O stronie</a></li>
        </ul>
        
      </nav>

   



      <?php

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{

    $produkty = "SELECT * FROM produkty";
    $result=$polaczenie->query($produkty);

    $num=mysqli_num_rows($result);

    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo "<br><br>";
    echo '<div id="oferta">'; 
    echo "Moje aktywne ogłoszenia:";
    echo "</div>";
    echo "<br>";


        
    $i=0;

    while ($i < $num) {
      
        $row = $result->fetch_assoc();

        if(($row["id_sprzedajacego"] == $_SESSION['id']) && ($row["data_sprzedazy"] == '0000-00-00 00:00:00') && ($row["id_kupujacego"] == '-2'))
        {
        echo '<div id="oferta">'; 
        echo "<form action='zatwierdz.php'  method='post' novalidate>";
        echo "<b>".$row["nazwa"]."</b>";
        echo "<br>Opis: ".$row["opis"];
        echo "<br>Cena: ".$row["cena"];
        echo "<br>Data dodania ogłoszenia: ".$row["data_dodania"];
        echo "<br>Kategoria: ".$row["kategoria"];
        echo "<br>";
        echo "</form>";
        echo "</div>";
//         echo "<br><br>";
        echo "<br><br>";      
        
        $i++;
        }
        else
        {
          $i++;
        }
    }

    
    mysqli_close($polaczenie);

    }
      
      ?>
             
      
    </section>
    <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
       <div class="footer-col">
  	 			<h4>FGK</h4>
  	 			<ul>
  	 			<li><img src="eneba2.png" alt="obraz"></li>
  	 			</ul>

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
</div>
  </footer>
    

  </body>
</html>