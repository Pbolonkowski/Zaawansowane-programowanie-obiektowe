<?php

    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login=htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo=htmlentities($haslo, ENT_QUOTES, "UTF-8");   
//sql injection        

        if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
        mysqli_real_escape_string($polaczenie,$login),
        mysqli_real_escape_string($polaczenie,$haslo))))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $_SESSION['zalogowany'] = true;

                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['user'];

                unset($_SESSION['blad']);
                $rezultat->free_result();
                header('Location: glowna.php');
                header('Location: o_stronie_2.php');
                //lokacje podstron dodajemy przy logowaniu. jak jestesmy na glownej i zalogujemy sie to bedziemy na glownej, itd.
                
            
            }
            else{
                // $komunikat = 'Nieprawidłowy login lub hasło';
                $_SESSION['blad'] = '<span id="komunikat" style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location:login.php');
                
                // echo 'Zle hasło <br> <a href="login.php">Powrot</a>';
           
            }
            
        }
        // session_reset();
       
        $polaczenie->close();

    }


?>