<?php
$file_name = $_GET['plik']; // pobiera nazwe zdjecia po kliknieciu w USUN przy nazwie



         if( unlink("../images/galeria/".$file_name )  ) { // usuwa zdjecie o pobranej nazwie

            $link = mysqli_connect("localhost", "root", "gitarasiema", "fura_zarcia");

            if (mysqli_connect_error()) {

	        die("Błąd bazy");

                }

                // jezeli usunie z serwera wtedy usuwa rowniez nazwe z bazy:
            
            $query = 'DELETE FROM galeria WHERE zdjecie = "'.$file_name.'"';
            mysqli_query($link, $query);

         header("Location: login.php");
         } else {
         echo 'NIE skasowano';
         };
?>