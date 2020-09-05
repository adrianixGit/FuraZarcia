<?php

    session_start();

        $link = mysqli_connect("localhost", "root", "gitarasiema", "fura_zarcia");

            if (mysqli_connect_error()) {

                die("Błąd bazy");

            }


            

        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            

            $query = "SELECT * FROM users WHERE login = '".$_POST['login']."'";  

            $result = mysqli_query($link, $query);

            $row = mysqli_fetch_array($result);

            if (isset($row)) {

                $hashedpassword = md5($_POST['password']);

                if ($hashedpassword == $row['password']) {

                    $_SESSION['user'] = $_POST['login'];

                    

                } else {

                    header("Location: index.php");

                }


            } else {

                header("Location: index.php");

            }

            



            

            

        } else {

            header("Location: index.php");

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



</div>
