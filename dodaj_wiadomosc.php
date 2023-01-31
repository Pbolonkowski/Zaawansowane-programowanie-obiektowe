<?php

session_start();

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
 // header('Location: dodaj_wiadomosc.php');
  
}
else{
  header('Location: dodaj_wiadomosc.php');
}

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $wiadomosc = $_POST['wiadomosc'];
    $id = $_SESSION['id'];
    $id_do_kogo = $_POST['przycisk'];

            
    $sql = "INSERT INTO wiadomosci(`id_wiadomosci`, `tekst`, `id_wysylajacego`, `id_odbiorcy`) VALUES ('','$wiadomosc','$id', '$id_do_kogo')";
    $result = $polaczenie->query($sql);

    mysqli_close($polaczenie);

    header('Location: dodano_wiadomosc.php');

}
      
?>

