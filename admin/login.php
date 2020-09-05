<?php

    session_start();

        $link = mysqli_connect("localhost", "root", "", "admin");

            if (mysqli_connect_error()) {

                die("Błąd bazy");

            }


            

        if (!empty($_POST['login']) && !empty($_POST['password'])) {

            

            $query = "SELECT * FROM `admin` WHERE login = '".mysqli_real_escape_string($link, $_POST['login'])."'";  

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

<p>Hello <?php echo $_SESSION['user']; ?> </p>
<a href="logout.php">Log Out</a>
