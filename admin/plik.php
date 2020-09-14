<?php

$link = mysqli_connect("localhost", "root", "", "fura_zarcia");

if (mysqli_connect_error()) {

	die("Błąd bazy");

}




function sprawdz_bledy()
{
  if ($_FILES['obrazek']['error'] > 0)
  {
    echo 'problem: ';
    switch ($_FILES['obrazek']['error'])
    {
      // jest większy niż domyślny maksymalny rozmiar,
      // podany w pliku konfiguracyjnym
      case 1: {echo 'Rozmiar pliku jest zbyt duży.'; break;} 

      // jest większy niż wartość pola formularza 
      // MAX_FILE_SIZE
      case 2: {echo 'Rozmiar pliku jest zbyt duży.'; break;}

      // plik nie został wysłany w całości
      case 3: {echo 'Plik wysłany tylko częściowo.'; break;}

      // plik nie został wysłany
      case 4: {echo 'Nie wysłano żadnego pliku.'; break;}

      // pozostałe błędy
      default: {echo 'Wystąpił błąd podczas wysyłania.';
        break;}
    }
    return false;
  }
  return true;
}


function sprawdz_typ()
{
	if ($_FILES['obrazek']['type'] != 'image/jpeg')
		return false;
	return true;
}




  $lokalizacja = '../images/galeria/';

  if(move_uploaded_file($_FILES['obrazek']['tmp_name'], $lokalizacja.$_FILES['obrazek']['name'])){ // move_uploaded_file odpowiada za dodanie pliku

          echo("Plik zosał załadowany.");

          ////////// dodanie do tablicy nazwy obrazka //////

          $query = 'INSERT INTO galeria (zdjecie) VALUES ("'.$_FILES['obrazek']['name'].'")';

          mysqli_query($link, $query);

         header("Location:login.php");

        }

        else{
            echo("Plik nie został załadowany.");
        }

        

     



?>