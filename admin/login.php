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

            
            if(isset($_POST['dodanie_lokalizacja'])) {

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
?>

<link rel="stylesheet" href="../css/bootstrap.min.css">

<p>Hello <?php echo $_SESSION['user']; ?> </p>
<a href="logout.php">Log Out</a>


                                                    <!-- KONTENER OD MENU -->


<div class="container">
    
<h1>menu</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nzwa</th>
            <th scope="col">Skład</th>
            <th scope="col">Cena</th>
            <th scope="col">Pozycja</th>
            <th scope="col">Operacje</th>
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

                                           <!-- KONTENER OD AKTUALNOSCI -->

 <div class="container"> 


 
    <h1> AKTUALNOŚCI </h1>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Naglowek</th>
            <th scope="col">Tresc</th>
            <th scope="col">Pozycja</th>
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


<div class="container">
 <h1> WYDARZENIA </h1>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Naglowek</th>
            <th scope="col">Tresc</th>
            <th scope="col">Pozycja</th>
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

<div class="container">

<h1> Zmień Lokalizacje</h1>  

    <form method="POST">
    <div class="form-group">
                <label for="exampleFormControlInput1">Lokalizacja</label>
                <input type="text" name="lokalizacja" class="form-control" id="exampleFormControlInput1" >
            </div>

        <button name="dodanie_lokalizacja" type="submit" class="btn btn-primary">Dodaj</button> 
    </form>


</div>
