<?php

session_start();

if(isset($_POST['email']))
  {
    $wszystko_OK=true;

    $nick=$_POST['nick'];

    if(strlen($nick)<3 || (strlen($nick)>20))
    {
      $wszystko_OK=false;
      $_SESSION['e_nick']="Nazwa użytkownika musi posiadać od 3 do 20 znaków!";

    }
    if(ctype_alnum($nick)==false)
    {
      $wszystko_OK=false;
      $_SESSION['e_nick']="Nazwa użytkownika może składać się tylko z liter i cyfr";
      
    }

    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$email))
    {
      $wszystko_OK=false;
      $_SESSION['e_email']= "Podaj poprawny adres e-mail";
    }

      //poprawnosc hasła
      $haslo1 = $_POST['haslo1'];
      $haslo2 = $_POST['haslo2'];

      if(strlen($haslo1)<5 || (strlen($haslo1)>20))
      {
        $wszystko_OK=false;
        $_SESSION['e_haslo']= "Hasło musi posiadać od 5 do 20 znaków!";

      }
      if($haslo1!=$haslo2){
        $wszystko_OK=false;
        $_SESSION['e_haslo']= "Podane hasła nie są identyczne!";
      }

      require_once "connect.php";
      mysqli_report(MYSQLI_REPORT_STRICT);

      try
      {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else{
      
      $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

      if(!$rezultat) throw new Exception($polaczenie->error);

      $ile_takich_maili = $rezultat->num_rows;
      if($ile_takich_maili>0)
      {
        $wszystko_OK=false;
        $_SESSION['e_email']= "Istnieje już konto przypisane do tego adresu e-mail!";
      }

      //cyz nick zarejestrowany
      $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

      if(!$rezultat) throw new Exception($polaczenie->error);

      $ile_takich_nickow = $rezultat->num_rows;
      if($ile_takich_nickow>0)
      {
        $wszystko_OK=false;
        $_SESSION['e_nick']= "Istnieje już użytkownik o takim nazwie! Wybierz inny";
      }

      if ($wszystko_OK==true)
      {
        
        if($polaczenie->query("INSERT INTO uzytkownicy VALUES ('', '$nick','$haslo1','$email')"))
        {
          $_SESSION['udanarejestracja']=true;
          header('Location: witamy.php');
        }
        else
        {
          throw new Exception($polaczenie->error);
          echo "blad";
        }
        exit();
      }

      $polaczenie->close();
    }
      }
      catch(Exception $e)
        {
          echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestracje w innym terminie!</span>';
          echo '<br> Informacja developerska: '.$e;
        }

  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FGK - załóż darmowe konto!</title>
    <link rel="stylesheet" href="global.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display-swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
      .error{
    color:#DF0000 ;
    margin-top: 10px;
    margin-bottom: 10px;
    }
    .formularz_rejestracji{
      color:white;
      font-size: 1.2rem;
      width:27%;
      height:29%;
      background-color:#2f1479;
       float:left;
     

      border-top-right-radius: 100px;
      border-bottom-right-radius: 100px;
     
       background:linear-gradient(-535deg, #2f1479,black );
  
      box-shadow: 10px 2px 40px rgba(0, 0, 0, 0.514);
      

      border-bottom-left-radius: 100px;
   
      align:center;
      position: absolute;
       left: 20%;
       top: 10%;

       padding:40px;
   
    }
    .przycisk{
      padding:20px;
      width: 59%;
      height: 60%;
      font-size: 1.2vw;
     border-style: outset;
     border-color:gray;
     background-color:#69D6CB;

      text-transform: uppercase;
    }
    .przycisk:hover{
     
      background-color:#5cfdb2;
      box-shadow: 2px 2px 20px rgba(1, 141, 83, 0.753);
    }
    .rubryczki{
    
      width:39%;
      
      font-size:1.1rem;
      border-style: outset;
      letter-spacing: 1px;
     
      margin:4px;
    }
    @media (max-width:1650px){
        .przycisk{
        font-size:12px;
        }
        }
    @media (max-width:1000px){
    .przycisk{
    font-size:10px;
    padding:0;}}
}
      </style>
  </head>
  <body>
    <section class="main2">
      <nav>
      
          <form action ="zarejestruj.php"><button name="zarejestruj" class="active">Zarejestruj</button></form>
          <form action= "login.php" ><button name="zaloguj" class="button">Zaloguj</button> </form>
          <input class="menu-btn" type="checkbox" id="menu-btn">
        <label class="menu-icon" for="menu-btn">
          <span class="nav-icon"></span>
</label>
        
        <br><br><br>


        <ul class="menu">
          <li><img src="eneba2.png" id ="obraz" alt="obraz"></li>
          <li><a href="index.php">Strona główna</a></li>
          <li><a href="ogloszenie_2.php">dodaj ogłoszenie</a></li>
          <li><a href="przegladaj.php">przeglądaj</a></li>
          <li><a href="#" >Kontakt</a></li>
          <li><a href="o_stronie.php" >O stronie</a></li>
        </ul>
        

      </nav>
      <div class="formularz_rejestracji">
        <form method="post">
          Nazwa użytkownika: <br><input class="rubryczki" type="text" name="nick"/><br>
         
          <?php 
            if(isset($_SESSION['e_nick']))
            {
              echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
              unset($_SESSION['e_nick']);
            }
           
          ?>
         

          E-mail: <br><input class="rubryczki" type="text" name="email"/><br>

          <?php 
            if(isset($_SESSION['e_email']))
            {
              echo '<div class="error">'.$_SESSION['e_email'].'</div>';
              unset($_SESSION['e_email']);
            }
           
          ?>
          Hasło: <br><input type="password" class="rubryczki" name="haslo1"/><br>

          <?php 
            if(isset($_SESSION['e_haslo']))
            {
              echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
              unset($_SESSION['e_haslo']);
            }
           
          ?>
          Powtórz Hasło: <br><input type="password" class="rubryczki" name="haslo2"/><br>
          <label>
          <input type="checkbox" name="regulamin"/> Akceptuję regulamin<br>
          </label>
          <br>
          <input type="submit" class="przycisk" value="Zarejestruj się"/>
        </form>
      </div>
      <!-- <div class="header-text">
        <div class="header-dolacz">
      <h1>  Dołącz do naszej społeczności!</h1>
          </div> -->
      
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