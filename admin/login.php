<?php

    session_start();

        // Połączenie z bazą
        $link = mysqli_connect("localhost", "root", "gitarasiema", "fura_zarcia");

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
                
                // Jesli wyslano formularz dodawania pozycji w menu
                if(isset($_POST['dodanie_pozycji'])) {
                    
                    $query = 'INSERT INTO menu (nazwa, sklad, cena, pozycja)
                    VALUES ("'.$_POST['nazwa'].'", "'.$_POST['sklad'].'", "'.$_POST['cena'].'", "'.$_POST['pozycja'].'")';

                    $result = mysqli_query($link, $query);

                    var_dump($result);
                    die();


                }




            }

        }
?>

<link rel="stylesheet" href="../css/bootstrap.min.css">

<p>Hello <?php echo $_SESSION['user']; ?> </p>
<a href="logout.php">Log Out</a>

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
          </tr>
        </thead>

        <tbody>


        <?php
            $query = "SELECT * FROM menu";  

            $result = mysqli_query($link, $query);

            while($row = mysqli_fetch_array($result)) {
                
                echo '
                <tr>
                    <th scope="row">'.$row['id_menu'].'</th>
                    <td>'.$row['nazwa'].'</td>
                    <td>'.$row['sklad'].'</td>
                    <td>'.$row['cena'].'</td>
                    <td>'.$row['pozycja'].'</td>
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
