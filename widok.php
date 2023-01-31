<?php

    echo "produkuty";
    
    session_start();


    require_once "connect2.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {

        $produkty = mysqli_query($baza,"SELECT * FROM produkty");
        $result=mysql_query($produkty);

        $num=mysql_numrows($result);

        $i=0;
        while ($i < $num) {
        
            //$ID=mysql_result($result,$i,"ID_produktu");
            $nazwa=mysql_result($result,$i,"nazwa");
            $opis=mysql_result($result,$i,"opis");
            $cena=mysql_result($result,$i,"cena");
            $dd=mysql_result($result,$i,"data_dodania");
            //$ds=mysql_result($result,$i,"data_sprzedazy");
            //$id_sp=mysql_result($result,$i,"id_sprzedajacego");
            //$id_kp=mysql_result($result,$i,"id_kupujacego");

            echo "<b>$nazwa</b><br>Opis: $opis<br>Cena: $cena<br>dd: $dd<br>";
        
        $i++;
        }

        mysqli_close($baza);

    }

    

    


?>