<?php

session_start();

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
 // header('Location: dodaj.php');
  
}
else{
  header('Location: dodaj.php');
}

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{

    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    $cena = $_POST['cena'];
    $obraz = $_POST['obraz'];
    $kat = $_POST['kategoria'];

    $id = $_SESSION['id'];
    $data=date("Y-m-d");
    $czas=date("H:i:s");


    $sql = "INSERT INTO produkty(ID_produktu, nazwa, opis, cena, obraz, data_dodania, data_sprzedazy, id_sprzedajacego, id_kupujacego, kategoria) VALUES ('','$nazwa','$opis','$cena','$obraz','$data $czas','','$id','-1','$kat')";
    $result = $polaczenie->query($sql);

    mysqli_close($polaczenie);

    header('Location: dodano.php');

}
      
?>

