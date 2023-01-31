<?php 

session_start();

if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
 // header('Location: o_stronie_2.php');
  
}
else{
  header('Location: o_stronie.php');
}
?>

    <?php


    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
      try{
        $s = $_POST["zatwierdz"];
        $sql = "UPDATE `produkty` SET `id_kupujacego`='-2'WHERE ID_produktu = $s";
        $result = $polaczenie->query($sql);
      }
      catch (Exception $e)
    {

      $d = $_POST["odrzuc"];
        $sql = "UPDATE `produkty` SET `id_kupujacego`='-3'WHERE ID_produktu = $d";
        $result = $polaczenie->query($sql);
    }
    

    


    $produkty = "SELECT * FROM produkty";
    $result=$polaczenie->query($produkty);

    
    $num=mysqli_num_rows($result);

    

   


    mysqli_close($polaczenie);

    header('Location: zgloszenia.php');
    }
?>
