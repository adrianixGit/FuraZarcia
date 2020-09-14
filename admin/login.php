<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styleLogin.css">
    <title>Panel Administratora</title>

  </head>
  <body>
    

<?php

    session_start();

        // Połączenie z bazą
        $link = mysqli_connect("localhost", "root", "", "fura_zarcia");

            // Jeśli sie nie udalo polaczyc z baza
            if (mysqli_connect_error()) {

                die("Błąd bazy");

            }


            
        // Jesli wpisano login i haslo
        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            
            // Pobieramy wiersz z bazy o loginie takim, jaki wpisal uzytkownik
            $query = "SELECT * FROM users WHERE login = '".$_POST['login']."'";  

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_array($result);

            // Jesli udalo sie znalezc uzytkownika o tym loginie
            if (isset($row)) {

                // Haszujemy jego haslo
                $hashedpassword = md5($_POST['password']);

                // Sprawdzamy czy wpisane haslo zgadza sie z haslem zapisanym w bazie
                if ($hashedpassword == $row['password']) {

                    // Jesli wszystko sie zgadza to zapisujemy login w sesji
                    $_SESSION['user'] = $_POST['login'];


                // Jesli haslo sie nie zgadza
                } else {

                    header("Location: index.php");

                }

            // Jesli nie znaleziono uzytkownika o tym loginie
            } else {

                header("Location: index.php");

            }
        
        // Jesli nie podano loginu i haslo w poscie
        } else {

            // Jesli uzytkownik nie logowal sie wczesniej to nie ma jego nazwy zapisanej w sesji
            // Wtedy robimy przekierowanie
            if(!isset($_SESSION['user'])) {
                header("Location: index.php");

            // Jesli jego nazwa byla w sesji to znaczy, ze byl juz zalogowany i mozemy robic inne akcje
            } else {
                
 ///////////////////////////////////DODAWANIE DO MENU//////////////////////////

                // Jesli wyslano formularz dodawania pozycji w menu
                if(isset($_POST['dodanie_pozycji'])) {
                    
                    // Kwerenda dodawania do tabeli menu. Warto zrobic zabezpieczenia
                    $query = 'INSERT INTO menu (nazwa, sklad, cena, pozycja)
                    VALUES ("'.$_POST['nazwa'].'", "'.$_POST['sklad'].'", "'.$_POST['cena'].'", "'.$_POST['pozycja'].'")';

                    // Wykonanie kwerendy
                    $result = mysqli_query($link, $query);
                    
                    // Jesli udalo sie wykonac kwerende
                    if($result) {
                        echo '<div class="alert alert-success" role="alert">
                            Poprawnie dodano pozycje w menu
                        </div>';
                    } else {
                        // Jesli nie udalo sie wykona kwerendy
                        echo '<div class="alert alert-danger" role="alert">
                            Nie dodano pozycji w menu
                        </div>';
                    }

                }

                // Jesli wyslano formularz usuwania pozycji w menu
                if(isset($_POST['usun_poyzcje_menu'])) {
                    
                    // Kwerenda usuwajaca pozycje z menu
                    $query = 'DELETE FROM menu WHERE id_menu = '.$_POST['id_menu'];
                    
                    // wykonanie kwerendy
                    $result = mysqli_query($link, $query);

                    // Jesli udalo sie wykonac kwerende
                    if($result) {
                        echo '<div class="alert alert-success" role="alert">
                            Usunieto pozycje
                        </div>';
                    } else {
                        // Jesli nie udalo sie wykona kwerendy
                        echo '<div class="alert alert-danger" role="alert">
                            Nie usunieto pozycji
                        </div>';
                    }

                }


               ///////////////////////////////////DODAWANIE DO AKTUALNOSCI//////////////////////////

               if(isset($_POST['dodanie_aktualnosci'])) {

                    $query = 'INSERT INTO aktualnosci (naglowek, tresc, pozycja) 
                                VALUES("'.$_POST['naglowek'].'", "'.$_POST['tresc'].'", "'.$_POST['pozycja'].'")';

                    $result = mysqli_query($link, $query);

                    if($result) {
                        echo '<div class="alert alert-success" role="alert">
                            Poprawnie dodano pozycje w aktualnosci
                        </div>';
                    } else {
                        // Jesli nie udalo sie wykona kwerendy
                        echo '<div class="alert alert-danger" role="alert">
                            Nie dodano pozycji w aktualnosci
                        </div>';
                    }

                }

                if(isset($_POST['usun_poyzcje_aktualnosci'])) {

                    $query = 'DELETE FROM aktualnosci WHERE id_aktualnosci = "'.$_POST['id_aktualnosci'].'"';

                    $result = mysqli_query($link, $query);

                    if ($result) {
                            echo '<div class="alert alert-success" role="alert">
                                    Usunieto pozycje
                                    </div>';


                    }else {
                        echo '<div class="alert alert-danger" role="alert">
                                Nie usunieto pozycji
                                </div>';


                    }

                }

                ///////////////////////////////////DODAWANIE DO WYDARZENIA//////////////////////////

               if(isset($_POST['dodanie_wydarzenia'])) {

                $query = 'INSERT INTO wydarzenia (naglowek, tresc, pozycja) 
                            VALUES("'.$_POST['naglowek'].'", "'.$_POST['tresc'].'", "'.$_POST['pozycja'].'")';

                $result = mysqli_query($link, $query);

                if($result) {
                    echo '<div class="alert alert-success" role="alert">
                        Poprawnie dodano pozycje w wydarzenia
                    </div>';
                } else {
                    // Jesli nie udalo sie wykona kwerendy
                    echo '<div class="alert alert-danger" role="alert">
                        Nie dodano pozycji w wydarzenia
                    </div>';
                }

            }

            if (isset($_POST['usun_pozycje_wydarzenia'])) {

                $query = 'DELETE FROM wydarzenia WHERE id_wydarzenia = "'.$_POST['id_wydarzenia'].'"';

                    $result = mysqli_query($link, $query);

                    if ($result) {
                            echo '<div class="alert alert-success" role="alert">
                                    Usunieto pozycje
                                    </div>';


                    }else {
                            echo '<div class="alert alert-danger" role="alert">
                                    Nie usunieto pozycji
                                    </div>';


                    }
                


            }

            

            

                    /////////////////////////DODAWANIE DO LOKALIZACJI//////////////////////////

            
            if(isset($_POST['dodanie_lokalizacja'])) { 

                // sprawdza czy baza jest pusta, jesli tak doda nowa wartosc wpisana

                $query = 'SELECT * FROM lokalizacja';

                $result = mysqli_query($link, $query);

                $row = mysqli_fetch_array($result);

                if(!isset($row)){

                    $query = 'INSERT INTO lokalizacja (lokalizacja)  VALUES ("'.$_POST['lokalizacja'].'")';

                    $result = mysqli_query($link, $query);

                        if($result) {
                            echo '<div class="alert alert-success" role="alert">
                                Poprawnie dodano pozycje w lokalizacja
                            </div>';
                        } else {
                            // Jesli nie udalo sie wykona kwerendy
                            echo '<div class="alert alert-danger" role="alert">
                                Nie dodano pozycji w lokalizacja
                            </div>';
                        }


                } else { // jesli nie jest pusta to tylko zamieni wartosc


                $query = 'UPDATE lokalizacja SET lokalizacja =  "'.$_POST['lokalizacja'].'"';
                            

                $result = mysqli_query($link, $query);

                if($result) {
                    echo '<div class="alert alert-success" role="alert">
                        Poprawnie dodano pozycje w lokalizacja
                    </div>';
                } else {
                    // Jesli nie udalo sie wykona kwerendy
                    echo '<div class="alert alert-danger" role="alert">
                        Nie dodano pozycji w lokalizacja
                    </div>';
                }
            }

        }
                
        }

    }
?>

<div class="container-fluid">

    <button type="button" class="btn btn-success" id="logoutbutton"><a href="logout.php">Log Out</a></button>
    <h5 >Witaj w Panelu Administratora: <span><?php echo $_SESSION['user']; ?></span> </h5>
</div>


                                                    <!-- KONTENER OD MENU -->


<div class="container">
<h1>Menu</h1>
<div class="table-responsive-sm">

    <table class="table table-sm table-dark">
        <thead>
          <tr class="bg-primary">
            <th scope="col">ID</th>
            <th scope="col">Nzwa</th>
            <th scope="col">Skład</th>
            <th scope="col">Cena</th>
            <th scope="col">Pozycja</th>
            <th scope="col">Usuń</th>
          </tr>
        </thead>

        <tbody>


        <?php

            // kwerenda pobieranie wszystkiego z tabeli menu
            $query = "SELECT * FROM menu";  

            // Wykonanie kwerendy
            $result = mysqli_query($link, $query);

            // Dla wszystkich wierszy wyswietlamy tabele
            while($row = mysqli_fetch_array($result)) {
                
                echo '
                <tr>
                    <th scope="row">'.$row['id_menu'].'</th>
                    <td>'.$row['nazwa'].'</td>
                    <td>'.$row['sklad'].'</td>
                    <td>'.$row['cena'].'</td>
                    <td>'.$row['pozycja'].'</td>
                    <td>
                        <form method="POST">
                            <input name="id_menu" type="hidden" value="'.$row['id_menu'].'" />
                            <button name="usun_poyzcje_menu" type="submit" >X</button>
                        </form>
                    </td>
                </tr>
                ';
            }

        ?>
        </tbody>
    </table>
</div>



    <h1>Dodaj pozycje w menu</h1>
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nazwa</label>
            <input type="text" name="nazwa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Skład</label>
            <input type="text" name="sklad" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Cena</label>
            <input type="text" name="cena" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Pozycja</label>
            <input type="text" name="pozycja" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        </div>
        <button name="dodanie_pozycji" type="submit" class="btn btn-primary">Dodaj</button>
    </form>

   


</div>

<hr>                                          <!-- KONTENER OD AKTUALNOSCI -->

 <div class="container"> 


 <h1>Aktualności</h1>
    <div class="table-responsive-sm ">
    

    <table class="table table-sm table-dark">
        <thead>
            <tr class="bg-primary">
            <th scope="col">Id</th>
            <th scope="col">Naglowek</th>
            <th scope="col">Tresc</th>
            <th scope="col">Pozycja</th>
            <th scope="col">Usuń</th>
            </tr>
        </thead>
        <tbody>

            <?php 

                $query = "SELECT * FROM aktualnosci";
                
                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_array($result)) {

                    echo '
                        <tr>
                        <th scope="row">'.$row['id_aktualnosci'].'</th>
                        <td>'.$row['naglowek'].'</td>
                        <td>'.$row['tresc'].'</td>
                        <td>'.$row['pozycja'].'</td>
                        <td>
                            <form method="POST">
                                <input name="id_aktualnosci" type="hidden" value="'.$row['id_aktualnosci'].'" /> 
                                <button name="usun_poyzcje_aktualnosci" type="submit" >X</button>
                            </form>
                        </td>
                        </tr>
                    
                    
                    ';


                }

            ?>
            
        </tbody>
    </table>
 </div>

    <h1> Uzupełnij aktualnośći!</h1>  

        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Naglówek</label>
                <input type="text" name="naglowek" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Treść</label>
                <textarea class="form-control" name="tresc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Pozycja</label>
                <input type="text" name="pozycja" class="form-control" id="exampleFormControlInput1" >
            </div>

            <button name="dodanie_aktualnosci" type="submit" class="btn btn-primary">Dodaj</button> 
            
        </form>  
    



 </div>

                                    <!-- KONTENER OD WYDARZENIA -->
<hr>

<div class="container">
<h1> Wydarzenia </h1>
 <div class="table-responsive-sm">

    <table class="table table-sm table-dark">
        <thead >
            <tr class="bg-primary">
            <th scope="col">Id</th>
            <th scope="col">Naglowek</th>
            <th scope="col">Tresc</th>
            <th scope="col">Pozycja</th>
            <th scope="col">Usuń</th>
            </tr>
        </thead>
        <tbody>

            <?php 

                $query = "SELECT * FROM wydarzenia";
                
                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_array($result)) {

                    echo '
                        <tr>
                        <th scope="row">'.$row['id_wydarzenia'].'</th>
                        <td>'.$row['naglowek'].'</td>
                        <td>'.$row['tresc'].'</td>
                        <td>'.$row['pozycja'].'</td>
                        <td>
                            <form method="POST">
                                <input name="id_wydarzenia" type="hidden" value="'.$row['id_wydarzenia'].'" /> 
                                <button name="usun_pozycje_wydarzenia" type="submit" >X</button>
                            </form>
                        </td>
                        </tr>
                    
                    
                    ';


                }

            ?>
            
        </tbody>
    </table>
</div>
    <h1> Uzupełnij wydarzenia!</h1>  

        <form method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Naglówek</label>
                <input type="text" name="naglowek" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Treść</label>
                <textarea class="form-control" name="tresc" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Pozycja</label>
                <input type="text" name="pozycja" class="form-control" id="exampleFormControlInput1" >
            </div>

            <button name="dodanie_wydarzenia" type="submit" class="btn btn-primary">Dodaj</button> 
            
        </form>  


</div>

<hr> 
                                  <!-- KONTENER LOKALIZACJA -->
<div class="container">

<h1> Zmień Lokalizacje</h1>  

    <form method="POST">
    <div class="form-group">
                <label for="exampleFormControlInput1">Lokalizacja</label>
                <input type="text" name="lokalizacja" class="form-control" id="exampleFormControlInput1" >
                <p>Aby dodać lokalizacje trzeba pobrać link lokalizacji z Google Maps: Podajemy adres/udostępnij/umieszczanie mapy.
                    Kopjujemy link do formularza i wysyłamy go w takiej formie jak poniżej:
                    
                       <p class="table-responsive-sm"> https://www.google.com/maps/embed?pb=!
                           1m18!1m12!1m3!1d39043.
                           70636411347!2d17.8322706
                           0155836!3d52.29364987150649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                           1!3m3!1m2!1s0x4704c600
                           c3408c55%3A0x159b488d38a7ad65!2zU8WCdXBjYQ!5e0!3m2!1spl!2spl
                           !4v1599723857793!5m2!1spl!2spl </p>
                     
                    </p>
            </div>

        <button name="dodanie_lokalizacja" type="submit" class="btn btn-primary">Udostępnij</button> 
    </form>


</div>

<hr>

<div class="container">

<h1> Dodaj zdjęcie</h1>

                

    <?php
        $directory="../images/galeria";  // folder ze zdjeciami
        $dir=opendir($directory); // otwieranie folderu ze zdjeciami
        $file_list="<ul>";// bedzie wypisywanie w ul
        while($file_name=readdir($dir)) // ma wypisywac dopoki nie wypisze wszytskiego 
            {
            if(($file_name!=".")&&($file_name!=".."))
                {
                $file_list.="<li><a href='usun.php?plik=$file_name'>USUŃ</a> $file_name</li>"; // wypisuje nazwe zdjecia i linkuje kazde z nich do usun.php
                }
            }
        $file_list.="</ul>"; // przypisuje zamykanie ul do zmiennej
        closedir($dir); // zamyka folder
        echo "
            Lista zdjęć w katalogu $directory: 
            $file_list";
    ?>

<form enctype="multipart/form-data" action="plik.php" method="post" >
<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
<input type="file" name="obrazek" />
<input type="submit" value="wyślij" class="btn btn-primary" />
</form>


</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>